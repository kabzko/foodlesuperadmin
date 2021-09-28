<template>
    <div class="container my-3">
        <router-link to="/">
            <button type="button" class="btn btn-secondary">Back</button>
        </router-link>
        <div>
            <div>
                Users Chat Support
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ticket No.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(ticket, index) of UserTickets" :key="ticket + index">
                        <td>{{ ticket.ticket_number }}</td>
                        <td>{{ ticket.title }}</td>
                        <td>{{ ticket.name }}</td>
                        <td>
                            <router-link :to="'/ticket_detail?id=' + ticket.id + '&type=user'">
                                <button>View ticket</button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div>
                Store Chat Support
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ticket No.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(ticket, index) of StoreTickets" :key="ticket + index">
                        <td>{{ ticket.ticket_number }}</td>
                        <td>{{ ticket.title }}</td>
                        <td>{{ ticket.name }}</td>
                        <td>
                            <router-link :to="'/ticket_detail?id=' + ticket.id + '&type=store'">
                                <button>View ticket</button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div>
                Rider Chat Support
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ticket No.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(ticket, index) of RiderTickets" :key="ticket + index">
                        <td>{{ ticket.ticket_number }}</td>
                        <td>{{ ticket.title }}</td>
                        <td>{{ ticket.name }}</td>
                        <td>
                            <router-link :to="'/ticket_detail?id=' + ticket.id + '&type=rider'">
                                <button>View ticket</button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            UserTickets: [],
            StoreTickets: [],
            RiderTickets: [],
        }
    },
    mounted() {
        this.loadTickets();
    },
    methods: {
        loadTickets() {
            axios.post("/load_tickets", {}).then(res => {
                this.UserTickets = res.data.users;
                this.StoreTickets = res.data.stores;
                this.RiderTickets = res.data.riders;
            });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>