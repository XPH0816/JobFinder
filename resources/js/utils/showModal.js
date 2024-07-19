import Modal from "../components/Modal.vue";
import MessageModal from "../components/MessageModal.vue";
import { Modal as BModal } from "bootstrap";
import { createApp } from "vue";
import axios from "axios";
export async function showModal(title, message, instance, submit = async () => { }) {
    let data = (await (axios.get("/services"))).data;
    const modal = createApp(Modal, {
        title,
        message,
        data,
        instance,
        submit
    });
    const div = document.createElement("div");
    document.body.appendChild(div);
    modal.mount(div);
    const modalEl = document.getElementById("modal");
    const modalInstance = new BModal(modalEl);
    modalInstance.show();
    $("#modal").on("hidden.bs.modal", function () {
        modal.unmount();
        div.remove();
    });
}

export function showMessageModal(title, message) {
    const modal = createApp(MessageModal, {
        title,
        message,
        data,
        instance,
        submit
    });
    const div = document.createElement("div");
    document.body.appendChild(div);
    modal.mount(div);
    const modalEl = document.getElementById("messageModal");
    const modalInstance = new BModal(modalEl);
    modalInstance.show();
    $("#messageModal").on("hidden.bs.modal", function () {
        modal.unmount();
        div.remove();
    });
}
