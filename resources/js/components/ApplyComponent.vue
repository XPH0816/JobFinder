<template>
    <div>
        <form @submit="formSubmit">
            <button v-if="show" type="submit" class="w-100 btn btn-success">
                Apply Job
            </button>
            <div v-else class="alert alert-success">
                Application sent Successfully.
            </div>
        </form>
    </div>
</template>

<script>
import { showModal } from "../utils/showModal";
export default {
    props: ["jobid"],
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            show: true,
        };
    },

    methods: {
        async formSubmit(e) {
            e.preventDefault();
            await showModal("Apply Job", "Please select the services you want to apply for.", this, async (services) => {
                await axios.post("/applications/" + this.jobid, { services });
                this.show = false;
            });

        },
    },
};
</script>
