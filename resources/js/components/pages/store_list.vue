<template>
    <div class="container my-3">
        <router-link to="/">
            <button type="button" class="btn btn-secondary">Back</button>
        </router-link>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newstoreModal">
            New Store
        </button>  
        <table class="table table-bordered my-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(store, index) of Stores" :key="store + index">
                    <td>{{ store.name }}</td>
                    <td>
                        <router-link :to="'/store_detail?id=' + store.id">
                            <button type="button" class="btn btn-primary">
                                View store
                            </button>
                        </router-link>
                        <button type="button" @click="resetStorePassword(store.id)" class="btn btn-danger">
                            Reset store password
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="newstoreModal" data-backdrop="static" tabindex="-1" aria-labelledby="newstoreModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Street</label>
                            <input type="text" class="form-control" v-model="Street">
                        </div>
                        <div class="form-group">
                            <label for="">Preparing Time</label>
                            <input type="number" class="form-control" v-model="PreparingTime">
                        </div>
                        <div class="form-group">
                            <label for="">Delivery Type</label>
                            <select class="form-control" v-model="DeliveryType">
                                <option value="Regular">Regular</option>
                                <option value="Express">Express</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Latitude</label>
                                <input type="text" class="form-control" v-model="Latitude">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Longitude</label>
                                <input type="text" class="form-control" v-model="Longitude">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Closing Day</label>
                            <select class="form-control" v-model="CloseDay">
                                <option value="No Close">No Close</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Open Time</label>
                                <input type="time" class="form-control" v-model="OpenTimeA">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Close Time</label>
                                <input type="time" class="form-control" v-model="OpenTimeB">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">TIN</label>
                            <input type="text" class="form-control" v-model="TinNumber">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" v-model="Username">
                        </div>
                        <div>
                            <label for="">Store Thumbnail</label>
                            <div class="storeThumbnail-upload">
                                <div class="storeThumbnail-edit">
                                    <input type="file" id="storeThumbnail" accept="image/*" @change="readURL(3, $event)" />
                                    <label for="storeThumbnail">
                                        <div class="text-center mt-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </label>
                                </div>
                                <div class="storeThumbnail-preview">
                                    <div id="storeThumbnailPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="">Store Banner</label>
                            <div class="storeBanner-upload">
                                <div class="storeBanner-edit">
                                    <input type="file" id="storeBanner" accept="image/*" @change="readURL(1, $event)" />
                                    <label for="storeBanner">
                                        <div class="text-center mt-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </label>
                                </div>
                                <div class="storeBanner-preview">
                                    <div id="storeBannerPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="">Order Banner</label>
                            <div class="orderBanner-upload">
                                <div class="orderBanner-edit">
                                    <input type="file" id="orderBanner" accept="image/*" @change="readURL(2, $event)" />
                                    <label for="orderBanner">
                                        <div class="text-center mt-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </label>
                                </div>
                                <div class="orderBanner-preview">
                                    <div id="orderBannerPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" @click="saveStore()">Save store</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            Stores: [],
            Name: "",
            Street: "",
            PreparingTime: "",
            DeliveryType: "",
            Latitude: "",
            Longitude: "",
            CloseDay: "",
            OpenTimeA: "",
            OpenTimeB: "",
            StoreBanner: "",
            OrderBanner: "",
            StoreThumbnail: "",
            TinNumber: "",
            Username: "",
        }
    },
    mounted() {
        this.loadStores();
    },
    methods: {
        readURL(type, input) {
            if (type == 1) {
                if (input.target.files && input.target.files[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(input.target.files[0]);
                    reader.onload = input => {
                        const image = new Image();
                        image.src = input.target.result;
                        image.onload = res => {
                            if (res.path[0].height == 600 && res.path[0].width == 1078) {
                                this.StoreBanner = document.getElementById("storeBanner").files[0];
                                document.getElementById("storeBannerPreview").style.backgroundImage = "url(" + input.target.result + ")";
                            } else {
                                console.log("Upload image height and width must be 600px and 1078px.");
                            }
                        };
                    }             
                }
            } else if (type == 2) {
                if (input.target.files && input.target.files[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(input.target.files[0]);
                    reader.onload = input => {
                        const image = new Image();
                        image.src = input.target.result;
                        image.onload = res => {
                            if (res.path[0].height == 400 && res.path[0].width == 1600) {
                                this.OrderBanner = document.getElementById("orderBanner").files[0];
                                document.getElementById("orderBannerPreview").style.backgroundImage = "url(" + input.target.result + ")";
                            } else {
                                console.log("Upload image height and width must be 400px and 1600px.");
                            }
                        };
                    }             
                }
            } else {
                if (input.target.files && input.target.files[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(input.target.files[0]);
                    reader.onload = input => {
                        const image = new Image();
                        image.src = input.target.result;
                        image.onload = res => {
                            if (res.path[0].height == 1080 && res.path[0].width == 1080) {
                                this.StoreThumbnail = document.getElementById("storeThumbnail").files[0];
                                document.getElementById("storeThumbnailPreview").style.backgroundImage = "url(" + input.target.result + ")";
                            } else {
                                console.log("Upload image height and width must be 1080px and 1080px.");
                            }
                        };
                    }             
                }
            }
        },
        loadStores() {
            axios.post("/load_stores", {})
            .then(res => {
                this.Stores = res.data;
            });
        },
        saveStore() {
            if (this.Name != "") {
                if (this.Street != "") {
                    if (this.PreparingTime != 0 && this.PreparingTime != "") {
                        if (this.DeliveryType != "") {
                            if (this.Latitude != "" && this.Longitude != "") {
                                if (this.CloseDay != "") {
                                    if (this.OpenTimeA != "" && this.OpenTimeB != "") {
                                        if (this.StoreBanner != "") {
                                            if (this.OrderBanner != "") {
                                                if (this.StoreThumbnail != "") {
                                                    if (this.tinnumber != "") {
                                                        if (this.Username != "") {
                                                            const Data = new FormData();
                                                            Data.append("name", this.Name);
                                                            Data.append("streets", this.Street);
                                                            Data.append("preparingtime", this.PreparingTime);
                                                            Data.append("deliverytype", this.DeliveryType);
                                                            Data.append("latitude", this.Latitude);
                                                            Data.append("longitude", this.Longitude);
                                                            Data.append("closeday", this.CloseDay);
                                                            Data.append("opentimea", this.OpenTimeA);
                                                            Data.append("opentimeb", this.OpenTimeB);
                                                            Data.append("storebanner", this.StoreBanner);
                                                            Data.append("orderbanner", this.OrderBanner);
                                                            Data.append("storethumbnail", this.StoreThumbnail);
                                                            Data.append("tinnumber", this.TinNumber);
                                                            Data.append("username", this.Username);
                                                            Data.append("password", 12345);
                                                            axios.post("/save_new_store", Data).then(res => {
                                                                if (res.data == 1) {
                                                                    this.loadStores();
                                                                    $("#newstoreModal").modal("hide");
                                                                }
                                                            });
                                                        } else {
                                                            console.log("Username field is empty.");
                                                        }
                                                    } else {
                                                        console.log("Tin Number field is empty.");
                                                    }
                                                } else {
                                                    console.log("No store thumbnail uploaded.");
                                                }
                                            } else {
                                                console.log("No order banner uploaded.");
                                            }
                                        } else {
                                            console.log("No store banner uploaded.");
                                        }
                                    } else {
                                        console.log("Opening time field is empty.");
                                    }
                                } else {
                                    console.log("Closing field is empty.");
                                }
                            } else {
                                console.log("Latitude & longitude field is empty.");
                            }
                        } else {
                            console.log("Delivery type field is empty.");
                        }
                    } else {
                        console.log("Preparing time required 5 to 10 mins.");
                    }
                } else {
                    console.log("Street field is empty.");
                }
            } else {
                console.log("Name field is empty.");
            }
        },
        resetStorePassword(id) {
            axios.post("/reset_store_password", {
                storeid: id,
            }).then(res => {
                if (res.data == 1) {
                    alert("Reset password successfully");
                    this.loadStores();
                }
            }).catch(err => {
                console.log(err);
            });
        }
    },
}
</script>
<style lang="scss" scoped>
    .storeBanner-upload, .orderBanner-upload, .storeThumbnail-upload {
        position: relative;
        max-width: 205px;
        margin: 10px auto;
    }
    .storeBanner-upload .storeBanner-edit, .orderBanner-upload .orderBanner-edit, .storeThumbnail-upload .storeThumbnail-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .storeBanner-upload .storeBanner-edit input, .orderBanner-upload .orderBanner-edit input, .storeThumbnail-upload .storeThumbnail-edit input {
        display: none;
    }
    .storeBanner-upload .storeBanner-edit input + label, .orderBanner-upload .orderBanner-edit input + label, .storeThumbnail-upload .storeThumbnail-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 2px;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .storeBanner-upload .storeBanner-edit input + label:hover, .orderBanner-upload .orderBanner-edit input + label:hover, .storeThumbnail-upload .storeThumbnail-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .storeBanner-upload .storeBanner-preview, .orderBanner-upload .orderBanner-preview, .storeThumbnail-upload .storeThumbnail-preview {
        width: 203px;
        height: 192px;
        position: relative;
        border-radius: 2px;
        border: 3px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .storeBanner-upload .storeBanner-preview > div, .orderBanner-upload .orderBanner-preview > div, .storeThumbnail-upload .storeThumbnail-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 2px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }    
</style>