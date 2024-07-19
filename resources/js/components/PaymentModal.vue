<script setup>
import axios from 'axios';
import { getCurrentInstance, onMounted, ref } from 'vue';
import { showMessageModal } from '../utils/showModal';

const props = defineProps(["instance", "services"]);
const instance = getCurrentInstance();
let stripe;
const stripeKey = ref(import.meta.env.VITE_STRIPE_KEY);
const stripeLoaded = ref(false);
const pending = ref(false);
let paymentIntent;
const card = ref();
const holder = ref("");
const elms = ref();

onMounted(async () => {
    stripe = Stripe(stripeKey.value);
    paymentIntent = (await axios.post("/payment-intent")).data;
    elms.value = stripe.elements({
        clientSecret: paymentIntent.client_secret
    });
    let style = {
        base: {
            color: "#32325d",
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#32325d",
            },
        },
        invalid: {
            fontFamily: 'Arial, sans-serif',
            color: "#fa755a",
            iconColor: "#fa755a",
        },
    }
    card.value = elms.value.create("card", {
        hidePostalCode: true,
        style
    });
    card.value.mount("#card-element");
    stripeLoaded.value = true;
});

const pay = async () => {
    pending.value = true;
    const {
        setupIntent,
        error
    } = await stripe.confirmCardSetup(
        paymentIntent.client_secret, {
        payment_method: {
            card: card.value,
            billing_details: {
                name: holder.value
            },
        }
    });
    if (error) {
        console.log(error);
        pending.value = false;
        $(instance.vnode.el).on("hidden.bs.modal", () => {
            showMessageModal("Error", "Payment failed. Please try again later.");
        });
        $(instance.vnode.el).modal("hide");
        return;
    }
    let appId = (await axios.post("/applications/" + props.instance.jobid, { services: props.services })).data;
    let res = await axios.post("/payment/" + appId, {
        payment_method: setupIntent.payment_method
    }, {
        responseType: "blob"
    });
    // let href = res.data.invoice_pdf;
    let link = document.createElement("a");
    let url = window.URL.createObjectURL(res.data);
    link.href = url
    link.setAttribute("target", "_blank");
    link.setAttribute("rel", "noopener noreferrer");
    link.setAttribute("download", "Receipt.pdf");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    window.URL.revokeObjectURL(url);
    pending.value = false;
    $(instance.vnode.el).modal("hide");
    props.instance.show = false;
};
</script>

<template>
    <div class="modal fade" id="paymentModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment | Services</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-center flex-column gap-3">
                        <div v-if="stripeLoaded" class="row">
                            <div class="col">
                                <label for="card-holder-name" class="form-label">Card Holder Name : </label>
                            </div>
                            <div class="col">
                                <input id="card-holder-name" type="text" class="form-control"
                                    style="height: calc(2.25rem + 2px);" v-model="holder" />
                            </div>
                        </div>

                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element"></div>


                        <div v-if="pending" class="text-center">
                            Payment processing...
                        </div>

                        <button @click="pay" id="card-button" class="btn btn-primary mt-3"
                            :disabled="!stripeLoaded || pending">
                            Pay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
