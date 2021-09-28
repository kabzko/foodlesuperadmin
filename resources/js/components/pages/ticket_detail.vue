<template>
    <div class="container my-3">
        <button type="button" class="btn btn-secondary" @click="goBack()">Back</button>
        <button type="button" class="btn btn-danger" @click="closeChat()">Close Chat</button>
        <div class="text-center">
            <h4>{{ "(" + TicketNo + ") " + Title }}</h4>
        </div>
        <div v-if="TicketType == 'user'">
            <div class="row" v-for="chat, index of UserChats" :key="chat + index">
                <div class="col text-left" v-if="chat.user_id != null">
                    {{ chat.message }}
                </div>
                <div v-else class="col text-left">

                </div>
                <div class="col text-right" v-if="chat.user_id == null">
                    {{ chat.message }}
                </div>
                <div v-else class="col text-right">

                </div>
            </div>
        </div>
        <div v-if="TicketType == 'store'">
            <div class="row" v-for="chat, index of StoreChats" :key="chat + index">
                <div class="col text-left" v-if="chat.store_id != null">
                    {{ chat.message }}
                </div>
                <div v-else class="col text-left">

                </div>
                <div class="col text-right" v-if="chat.store_id == null">
                    {{ chat.message }}
                </div>
                <div v-else class="col text-right">

                </div>
            </div>
        </div>
        <div v-if="TicketType == 'rider'">
            <div class="row" v-for="chat, index of RiderChats" :key="chat + index">
                <div class="col text-left" v-if="chat.rider_id != null">
                    {{ chat.message }}
                </div>
                <div v-else class="col text-left">

                </div>
                <div class="col text-right" v-if="chat.rider_id == null">
                    {{ chat.message }}
                </div>
                <div v-else class="col text-right">

                </div>
            </div>
        </div>
        <div v-if="Status == 2" class="text-center border bg-primary">
            This conversation has been closed.
        </div>
        <div v-if="Status == 1">
            <input type="text" v-model="Message">
            <button @click="sendMessage()" :disabled="SendBtnStatus">Send</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            UserChats: [],
            StoreChats: [],
            RiderChats: [],
            SendBtnStatus: true,
            LoadStatus: false,
            TicketID: new URL(window.location.href).searchParams.get("id"),
            TicketType: new URL(window.location.href).searchParams.get("type"),
            Title: "",
            Message: "",
            TicketNo: "",
            Interval: "",
            Status: "",
        }
    },
    mounted() {
        this.loadChats();
        setTimeout(() => {
            this.looploadChats();
        }, 1000);
    },
    methods: {
        loadChats() {
            axios.post("/load_chatbox", {
                ticketid: this.TicketID,
            }).then(res => {
                this.UserChats = res.data.user;
                this.StoreChats = res.data.store;
                this.RiderChats = res.data.rider;
                if (this.TicketType == "user") {
                    this.Title = res.data.user[0].title;
                    this.TicketNo = res.data.user[0].ticket_number;
                    this.Status = res.data.user[0].status_id;
                } else if (this.TicketType == "store") {
                    this.Title = res.data.store[0].title;
                    this.TicketNo = res.data.store[0].ticket_number;
                    this.Status = res.data.store[0].status_id;
                } else {
                    this.Title = res.data.rider[0].title;
                    this.TicketNo = res.data.rider[0].ticket_number;
                    this.Status = res.data.rider[0].status_id;
                }
            }).catch(err => {
                console.log(err);
            });
        },
        looploadChats() {
            this.Interval = setInterval(() => {
                if (this.LoadStatus == false) {
                    this.LoadStatus = true;
                    axios.post("/load_chatbox", {
                        ticketid: this.TicketID,
                    }).then(res => {
                        this.UserChats = [];
                        this.StoreChats = [];
                        this.RiderChats = [];
                        this.UserChats = res.data.user;
                        this.StoreChats = res.data.store;
                        this.RiderChats = res.data.rider;
                        if (this.TicketType == "user") {
                            this.Title = res.data.user[0].title;
                            this.TicketNo = res.data.user[0].ticket_number;
                        } else if (this.TicketType == "store") {
                            this.Title = res.data.store[0].title;
                            this.TicketNo = res.data.store[0].ticket_number;
                        } else {
                            this.Title = res.data.rider[0].title;
                            this.TicketNo = res.data.rider[0].ticket_number;
                        }
                        this.LoadStatus = false;
                    }).catch(err => {
                        console.log(err);
                    });
                }
            }, 1000);
        },
        sendMessage() {
            axios.post("/send_message", {
                ticketid: this.TicketID,
                message: this.Message,
            }).then(res => {
                if (res.data == 1) {
                    this.loadChats();
                    this.Message = "";
                }
            }).catch(err => {
                console.log(err);
            });
        },
        closeChat() {
            axios.post("/close_ticket", {
                ticketid: this.TicketID,
            }).then(res => {
                if (res.data == 1) {
                    clearInterval(this.Interval);
                    this.$router.back()
                }
            }).catch(err => {
                console.log(err);
            });
        },
        goBack() {
            clearInterval(this.Interval);
            this.$router.back()
        }
    },
    watch: {
        Message() {
            if (this.Message != "") {
                this.SendBtnStatus = false;
            } else {
                this.SendBtnStatus = true;
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>