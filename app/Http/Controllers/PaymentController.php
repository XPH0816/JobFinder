<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            auth()->user()->createSetupIntent()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function singleCharge(Request $request, $id)
    {
        $paymentMethod = $request->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $application = Application::find($id);
        foreach ($application->services as $service) {
            $user->tabPrice($service->price_id);
        }
        $invoice = $user->invoice([
            'payment_method' => $paymentMethod,
            'off_session' => true,
        ]);
        $application->invoice_id = $invoice->id;
        $application->save();
        return $user->downloadInvoice($invoice->id);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
