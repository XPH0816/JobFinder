<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::truncate();

        $users = User::factory(30)->create();
        foreach ($users as $user) {
            if ($user->user_type === 'seeker') {
                Profile::factory()->count(1)->recycle($user)->create();
            }
            if ($user->user_type === 'employer') {
                $company = Company::factory(1)->recycle($user)->create();
                Job::factory()->count(5)->recycle($company)->recycle($user)->create();
            }
        }
        Post::factory(10)->create();
        Testimonial::factory(1)->create();

        $categories = [
            'Healthcare',
            'Medical Services',
            'Technology',
            'Software Development',
            'Education',
            'Engineering',
            'Creative and Design',
            'Research and Development',
            'Hospitality and Tourism',
            'Business and Management',
            'Finance and Accounting',
            'Sales and Marketing',
            'Legal Services',
            'Media and Communication',
            'Manufacturing and Production',
            'Transportation and Logistics',
            'Environmental Services',
            'Social Services',
            'Agriculture and Farming',
            'Construction and Skilled Trades'
        ];

        foreach ($categories as $category) {
            Category::create(
                [
                    'name' => $category,
                    'slug' => Str::slug($category),
                    'status' => '1'
                ]
            );
        }

        $services = [
            'Resume Writing' => 20,
            'Resume Photo Capturing' => 20,
            'Customised Resume Design' => 30,
            'Suit Renting' => 50,
            'Makeup and Hair Styling' => 40,
        ];

        foreach ($services as $service => $price) {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $result = $stripe->prices->create(
                [
                    'currency' => 'myr',
                    'unit_amount' => $price * 100,
                    'product_data' => ['name' => $service],
                ]
            );
            Service::create(
                [
                    'name' => $service,
                    'price' => $price,
                    'price_id' => $result->id
                ]
            );
        }

        Role::truncate();
        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'nababurdev@gmail.com',
            'user_type' => 'admin',
            'status' => '1',
            'password' => bcrypt('admin'),
            'email_verified_at' => NOW()
        ]);

        $admin->roles()->attach($adminRole);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
