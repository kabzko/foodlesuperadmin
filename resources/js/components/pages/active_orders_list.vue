<template>
    <div class="container my-3">
        <router-link to="/">
            <button type="button" class="btn btn-secondary">Back</button>
        </router-link>
        <div class="row my-2">
            <div class="col" v-for="order, index of ActiveOrders" :key="order + index">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ order.token }}</h4>
                        <h5 class="card-text">{{ order.name }}</h5>
                        <p class="card-text">{{ order.ship_from }}</p>
                        <p class="card-text">{{ order.ship_to }}</p>
                        <p class="card-text">{{ order.when }}</p>
                        <p class="card-text">{{ order.orderstatus }}</p>
                        <p class="card-text">{{ order.datetime }}</p>
                        <hr>
                        <p class="card-text">{{ order.riderfirstname + " " + order.riderlastname }}</p>
                        <p class="card-text">{{ order.ridercode }}</p>
                        <p class="card-text">{{ order.riderstatus }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ActiveOrders: [],
        }
    },
    mounted() {
        this.load_active_orders();
    },
    methods: {
        load_active_orders() {
            axios.post("/load_active_orders", {})
            .then(res => {
                this.ActiveOrders = res.data;
            });
        }
    },
}
</script>

<style lang="scss" scoped>

</style>