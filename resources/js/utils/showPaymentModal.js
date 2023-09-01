import Modal from "../components/PaymentModal.vue";
import { Modal as BModal } from "bootstrap";
import { createApp } from "vue";
export function showPaymentModal(instance, services) {
    const modal = createApp(Modal, {
        instance,
        services,
    });
    const div = document.createElement("div");
    document.body.appendChild(div);
    modal.mount(div);
    const modalEl = document.getElementById("paymentModal");
    const modalInstance = new BModal(modalEl);
    modalInstance.show();
    $("#paymentModal").on("hidden.bs.modal", function () {
        modal.unmount();
        div.remove();
    });
}
