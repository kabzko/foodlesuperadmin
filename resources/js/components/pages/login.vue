<template>
    <div class="container my-3">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" v-model="username">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" v-model="password">
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-primary" @click="login()">Login</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            username: "",
            password: "",
        }
    },
    methods: {
        login() {
            if (this.username != "") {
                if (this.password != "") {
                    axios.post("/login", {
                        username: this.username,
                        password: this.password
                    }).then(res => {
                        if (res !== 0) {
                            this.$router.push('/');
                        }
                    });
                }
            }
        }
    },
}
</script>
<style lang="scss" scoped>
    
</style>