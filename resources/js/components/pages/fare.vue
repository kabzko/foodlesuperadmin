<template>
    <div class="container my-3">
        <router-link to="/">
            <button type="button" class="btn btn-secondary">Back</button>
        </router-link>
        <table class="table table-bordered my-2">
            <thead>
                <tr>
                    <th>First Kilometer Charge</th>
                    <th>Exceding Kilometer Charge</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>₱ <input type="text" placeholder="Enter price for distance" v-model="MinimumCharge"> .00</td>
                    <td>₱ <input type="text" placeholder="Enter price for distance" v-model="IncrementCharge"> .00</td>
                    <td><button type="button" class="btn btn-success" @click="UpdateFare()">Update</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    mounted() {
        this.loadAllFare();
    },
    data() {
        return {
            MinimumCharge: "",
            IncrementCharge: "",
        }
    },
    methods: {
        formatPrice(value) {
            const val = (value/1).toFixed(2).replace(",", ".")
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        loadAllFare() {
            axios.post("/all_fares", {}).then(res => {
                this.MinimumCharge = res.data[0].minimum_charge;
                this.IncrementCharge = res.data[0].increment_amount;
            });
        },
        UpdateFare() {
            axios.post("/update_fares", {
                minimumcharge: this.MinimumCharge,
                incrementcharge: this.IncrementCharge,
            }).then(res => {
                if (res.data == 1) {
                    this.loadAllFare();
                }
            });
        }
    },
}
</script>
<style lang="scss" scoped>
    
</style>