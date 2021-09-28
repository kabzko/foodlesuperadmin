<template>
    <div class="container my-3">
        <router-link to="/rider_list">
            <button type="button" class="btn btn-secondary">Back</button>
        </router-link>
        <button type="button" class="btn btn-primary" @click="updateRider()">
            Update Rider
        </button>
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
</template>

<script>
export default {
    data() {
        return {
            RiderID: new URL(window.location.href).searchParams.get("id"),
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
        this.loadRiderDetail();
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
        loadRiderDetail() {
            axios.post("/load_rider_detail", {
                riderid: this.RiderID
            })
            .then(res => {
                this.Firstname = res.data[0].firstname;
                this.Middlename = res.data[0].middlename;
                this.Lastname = res.data[0].lastname;
                this.Gender = res.data[0].gender;
                this.DateofBirth = res.data[0].dateofbirth;
                this.Email = res.data[0].email;
                this.Cellphone = res.data[0].cellphone;
                this.BirthofPlace = res.data[0].birthofplace;
                this.CivilStatus = res.data[0].civilstatus;
                this.Citizenship = res.data[0].citizenship;
                this.Height = res.data[0].height;
                this.Weight = res.data[0].weight;
                this.Religion = res.data[0].religion;
                this.CityAddress = res.data[0].cityaddress;
                this.ProvincialAddress = res.data[0].provincialaddress;
                this.Elementary = res.data[0].elementary.split(";")[0];
                this.ElementaryYear = res.data[0].elementary.split(";")[1];
                this.HighSchool = res.data[0].highschool.split(";")[0];
                this.HighSchoolYear = res.data[0].highschool.split(";")[1];
                this.College = res.data[0].college.split(";")[0];
                this.CollegeYear = res.data[0].college.split(";")[1];
                this.TinNumber = res.data[0].tin;
                this.RiderIDNumber = res.data[0].rider_code;
                this.Username = res.data[0].username;
                if (res.data[0].nbiclearance != "") {
                    document.getElementById("nbiClearancePreview").style.backgroundImage = "url(" + res.data[0].nbiclearance.replace(/ /g, '%20') + ")";
                }
                if (res.data[0].resume != "") {
                    document.getElementById("resumePreview").style.backgroundImage = "url(" + res.data[0].resume.replace(/ /g, '%20') + ")";
                }
            });
        },
        updateRider() {
            if (this.NbiClearance == "") {
                this.NbiClearance = null;
            }
            if (this.Resume == "") {
                this.Resume = null;
            }
            if (this.Firstname != "") {
                if (this.Middlename != "") {
                    if (this.Lastname != "") {
                        if (this.Gender != "") {
                            if (this.DateofBirth != "") {
                                if (this.Email != "") {
                                    if (this.Cellphone != "") {
                                        if (this.BirthofPlace != "") {
                                            if (this.CivilStatus != "") {
                                                if (this.Citizenship != "") {
                                                    if (this.Height != "") {
                                                        if (this.Weight != "") {
                                                            if (this.Religion != "") {
                                                                if (this.CityAddress != "") {
                                                                    if (this.ProvincialAddress != "") {
                                                                        if (this.Elementary != "") {
                                                                            if (this.ElementaryYear != "") {
                                                                                if (this.HighSchool != "") {
                                                                                    if (this.HighSchoolYear != "") {
                                                                                        if (this.College != "") {
                                                                                            if (this.CollegeYear != "") {
                                                                                                if (this.TinNumber != "") {
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
                                                                                                    Data.append("riderid", this.RiderID);
                                                                                                    axios.post("/update_rider_detail", Data).then(res => {
                                                                                                        if (res.data === 1) {
                                                                                                            this.loadRiderDetail();
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
                                                                                                        }
                                                                                                    });
                                                                                                } else {
                                                                                                    console.log("");
                                                                                                }
                                                                                            } else {
                                                                                                console.log("");
                                                                                            }
                                                                                        } else {
                                                                                            console.log("");
                                                                                        }
                                                                                    } else {
                                                                                        console.log("");
                                                                                    }
                                                                                } else {
                                                                                    console.log("");
                                                                                }
                                                                            } else {
                                                                                console.log("");
                                                                            }
                                                                        } else {
                                                                            console.log("");
                                                                        }
                                                                    } else {
                                                                        console.log("");
                                                                    }
                                                                } else {
                                                                    console.log("");
                                                                }
                                                            } else {
                                                                console.log("");
                                                            }
                                                        } else {
                                                            console.log("");
                                                        }
                                                    } else {
                                                        console.log("");
                                                    }
                                                } else {
                                                    console.log("");
                                                }
                                            } else {
                                                console.log("");
                                            }
                                        } else {
                                            console.log("");
                                        }
                                    } else {
                                        console.log("");
                                    }
                                } else {
                                    console.log("");
                                }
                            } else {
                                console.log("");
                            }
                        } else {
                            console.log("");
                        }
                    } else {
                        console.log("");
                    }   
                } else {
                    console.log("");
                }    
            }
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