<template>
    <div class="container my-3">
        <router-link to="/">
            <button type="button" class="btn btn-secondary">Back</button>
        </router-link>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newriderModal">
            New Rider
        </button>
        <table class="table table-bordered my-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(rider, index) of Riders" :key="rider + index">
                    <td>{{ rider.firstname + " " + rider.lastname }}</td>
                    <td>
                        <router-link :to="'/rider_detail?id=' + rider.id">
                            <button type="button" class="btn btn-primary">
                                View rider
                            </button>
                        </router-link>
                        <button type="button" @click="resetRiderPassword(rider.id)" class="btn btn-danger">
                            Reset rider password
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="newriderModal" data-backdrop="static" tabindex="-1" aria-labelledby="newriderModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" v-model="Firstname">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Middlename</label>
                                <input type="text" class="form-control" v-model="Middlename">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" v-model="Lastname">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label for="">Gender</label>
                                <select class="form-control" v-model="Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control" v-model="DateofBirth">
                            </div>
                            <div class="form-group col-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" v-model="Email">
                            </div>
                            <div class="form-group col-3">
                                <label for="">Cellphone</label>
                                <input type="text" class="form-control" v-model="Cellphone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="">Birth of Place</label>
                                <input type="text" class="form-control" v-model="BirthofPlace">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Civil Status</label>
                                <input type="text" class="form-control" v-model="CivilStatus">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Citizenship</label>
                                <input type="text" class="form-control" v-model="Citizenship">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="">Height</label>
                                <input type="text" class="form-control" v-model="Height">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Weight</label>
                                <input type="text" class="form-control" v-model="Weight">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Religion</label>
                                <input type="text" class="form-control" v-model="Religion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">City Address</label>
                            <input type="text" class="form-control" v-model="CityAddress">
                        </div>
                        <div class="form-group">
                            <label for="">Provincial Address</label>
                            <input type="text" class="form-control" v-model="ProvincialAddress">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="">Elementary</label>
                                <input type="text" class="form-control" v-model="Elementary">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Graduated Year</label>
                                <input type="text" class="form-control" v-model="ElementaryYear">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="">High School</label>
                                <input type="text" class="form-control" v-model="HighSchool">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Graduated Year</label>
                                <input type="text" class="form-control" v-model="HighSchoolYear">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="">College</label>
                                <input type="text" class="form-control" v-model="College">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Graduated Year</label>
                                <input type="text" class="form-control" v-model="CollegeYear">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="">TIN Number</label>
                                <input type="text" class="form-control" v-model="TinNumber">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Rider ID Number</label>
                                <input type="text" class="form-control" v-model="RiderIDNumber">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Username</label>
                                <input type="text" class="form-control" v-model="Username">
                            </div>
                        </div>
                        <div>
                            <label for="">NBI Clearance</label>
                            <div class="nbiClearance-upload">
                                <div class="nbiClearance-edit">
                                    <input type="file" id="nbiClearance" accept="image/*" @change="readURL(1, $event)" />
                                    <label for="nbiClearance">
                                        <div class="text-center mt-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </label>
                                </div>
                                <div class="nbiClearance-preview">
                                    <div id="nbiClearancePreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="">Resume</label>
                            <div class="resume-upload">
                                <div class="resume-edit">
                                    <input type="file" id="resume" accept="image/*" @change="readURL(2, $event)" />
                                    <label for="resume">
                                        <div class="text-center mt-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </label>
                                </div>
                                <div class="resume-preview">
                                    <div id="resumePreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" @click="saveRider()">Save changes</button>
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
            Riders: [],
            Firstname: "",
            Middlename: "",
            Lastname: "",
            Gender: "",
            DateofBirth: "",
            Email: "",
            Cellphone: "",
            BirthofPlace: "",
            CivilStatus: "",
            Citizenship: "",
            Height: "",
            Weight: "",
            Religion: "",
            CityAddress: "",
            ProvincialAddress: "",
            Elementary: "",
            ElementaryYear: "",
            HighSchool: "",
            HighSchoolYear: "",
            College: "",
            CollegeYear: "",
            TinNumber: "",
            NbiClearance: "",
            Resume: "",
            RiderIDNumber: "",
            Username: "",
        }
    },
    mounted() {
        this.loadriders();
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
                            if (res.path[0].height == 3508 && res.path[0].width == 2480) {
                                this.NbiClearance = document.getElementById("nbiClearance").files[0];
                                document.getElementById("nbiClearancePreview").style.backgroundImage = "url(" + input.target.result + ")";
                            } else {
                                console.log("Upload image height and width must be 3508px and 2480px.");
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
                            if (res.path[0].height == 3508 && res.path[0].width == 2480) {
                                this.Resume = document.getElementById("resume").files[0];
                                document.getElementById("resumePreview").style.backgroundImage = "url(" + input.target.result + ")";
                            } else {
                                console.log("Upload image height and width must be 3508px and 2480px.");
                            }
                        };
                    }             
                }
            }
        },
        loadriders() {
            axios.post("/load_riders", {})
            .then(res => {
                this.Riders = res.data;
            });
        },
        saveRider() {
            if (this.Firstname != "" && this.Middlename != "" && this.Lastname != "" && this.Gender != "" && this.DateofBirth != "" && this.Email != "" && this.Cellphone != "" && this.BirthofPlace != "" && this.CivilStatus != "" && this.Citizenship != "" && this.Height != "" && this.Weight != "" && this.Religion != "" && this.CityAddress != "" && this.ProvincialAddress != "" && this.Elementary != "" && this.ElementaryYear != "" && this.HighSchool != "" && this.HighSchoolYear != "" && this.College != "" && this.CollegeYear != "" && this.TinNumber != "" && this.Username != "" && this.NbiClearance != "" && this.Resume != "") {
                const Data = new FormData();
                Data.append("firstname", this.Firstname);
                Data.append("middlename", this.Middlename);
                Data.append("lastname", this.Lastname);
                Data.append("gender", this.Gender);
                Data.append("dateofbirth", this.DateofBirth);
                Data.append("email", this.Email);
                Data.append("cellphone", this.Cellphone);
                Data.append("birthofplace", this.BirthofPlace);
                Data.append("civilstatus", this.CivilStatus);
                Data.append("citizenship", this.Citizenship);
                Data.append("height", this.Height);
                Data.append("weight", this.Weight);
                Data.append("religion", this.Religion);
                Data.append("cityaddress", this.CityAddress);
                Data.append("provincialaddress", this.ProvincialAddress);
                Data.append("elementary", this.Elementary + ";" + this.ElementaryYear);
                Data.append("highschool", this.HighSchool + ";" + this.HighSchoolYear);
                Data.append("college", this.College + ";" + this.CollegeYear);
                Data.append("tinumber", this.TinNumber);
                Data.append("nbiclearance", this.NbiClearance);
                Data.append("resume", this.Resume);
                Data.append("ridercode", this.RiderIDNumber);
                Data.append("username", this.Username);
                Data.append("password", 12345);
                axios.post("/save_new_rider", Data).then(res => {
                    if (res.data === 1) {
                        this.loadriders();
                        this.Firstname = "";
                        this.Middlename = "";
                        this.Lastname = "";
                        this.Gender = "";
                        this.DateofBirth = "";
                        this.Email = "";
                        this.Cellphone = "";
                        this.BirthofPlace = "";
                        this.CivilStatus = "";
                        this.Citizenship = "";
                        this.Height = "";
                        this.Weight = "";
                        this.Religion = "";
                        this.CityAddress = "";
                        this.ProvincialAddress = "";
                        this.Elementary = "";
                        this.ElementaryYear = "";
                        this.HighSchool = "";
                        this.HighSchoolYear = "";
                        this.College = "";
                        this.CollegeYear = "";
                        this.TinNumber = "";
                        this.NbiClearance = "";
                        this.Resume = "";
                        this.RiderIDNumber = "";
                        this.Username = "";
                        this.Password = "";
                        this.ConfirmPassword = "";
                        $("#newriderModal").modal("hide");
                    }
                });
            } else {
                console.log("Please fill empty fields");
            }
        },
        resetRiderPassword(id) {
            axios.post("/reset_rider_password", {
                riderid: id,
            }).then(res => {
                if (res.data == 1) {
                    alert("Reset password successfully");
                    this.loadriders();
                }
            }).catch(err => {
                console.log(err);
            });
        }
    }
}
</script>
<style lang="scss" scoped>
    .nbiClearance-upload, .resume-upload {
        position: relative;
        max-width: 205px;
        margin: 10px auto;
    }
    .nbiClearance-upload .nbiClearance-edit, .resume-upload .resume-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .nbiClearance-upload .nbiClearance-edit input, .resume-upload .resume-edit input {
        display: none;
    }
    .nbiClearance-upload .nbiClearance-edit input + label, .resume-upload .resume-edit input + label {
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
    .nbiClearance-upload .nbiClearance-edit input + label:hover, .resume-upload .resume-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .nbiClearance-upload .nbiClearance-preview, .resume-upload .resume-preview {
        width: 203px;
        height: 192px;
        position: relative;
        border-radius: 2px;
        border: 3px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .nbiClearance-upload .nbiClearance-preview > div, .resume-upload .resume-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 2px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>