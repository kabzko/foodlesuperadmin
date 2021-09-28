<template>
    <section>
        <div class="container my-3">
            <router-link to="/fare">
                <button type="button" class="btn btn-primary">Fares</button>
            </router-link>
            <router-link to="/store_list">
                <button type="button" class="btn btn-primary">Stores</button>
            </router-link>
            <router-link to="/rider_list">
                <button type="button" class="btn btn-primary">Riders</button>
            </router-link>
            <router-link to="/active_orders_list">
                <button type="button" class="btn btn-primary">Active Orders</button>
            </router-link>
            <router-link to="/chat_support">
                <button type="button" class="btn btn-primary">Chat Support</button>
            </router-link>
            <button type="button" class="btn btn-danger" @click="refreshToken()">Logout</button>
        </div>
    </section>
</template>
<script>
export default {
    methods: {
        refreshToken() {
            axios.post("/refreshToken", {}).then(res => {
                this.logout(res.data);
            });
        },
        logout(csrf) {
            axios.post("/logout", {
                _token: csrf
            }).then(() => {
                this.$router.push('/login');
            })
        }
    },
}
</script>
<style lang="scss" scoped>
    
</style>