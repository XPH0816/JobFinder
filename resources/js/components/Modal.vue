<script setup>
import { ref, getCurrentInstance } from 'vue';
import { showPaymentModal } from '../utils/showPaymentModal';

const props = defineProps(["title", "message", "data", "instance", "submit"]);
const services = ref([]);
const instance = getCurrentInstance();
const formSubmit = async (e) => {
    e.preventDefault();
    if (services.value.length > 0) {
        showPaymentModal(props.instance, services.value);
    } else {
        await props.submit(services.value);
        props.instance.show = false;
    }
    $(instance.vnode.el).modal("hide");
};
</script>

<template>
    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ message }}</p>
                    <form @submit="formSubmit" class="d-flex flex-column gap-2">
                        <div id="services" class="form-group">
                            <label for="services"><b>Select Add On Services</b></label>
                            <div v-for="service in data" class="form-check pl-5">
                                <input type="checkbox" class="form-check-input" :value="service.id" v-model="services"
                                    :id="service.name" />
                                <label class="form-check-label" :for="service.name">{{ service.name }} - RM{{
                                    service.price }}</label>
                            </div>
                        </div>
                        <button type="submit" class="w-100 btn btn-success">
                            Apply Job
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
