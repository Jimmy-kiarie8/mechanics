<template>
  <div>
    <v-content>
      <div v-show="loader" style="text-align: center; width: 100%;">
        <v-progress-circular :width="3" indeterminate color="red" style="margin: 1rem"></v-progress-circular>
      </div>
      <v-container fluid fill-height v-show="!loader">
        <v-layout justify-center align-center>
          <!-- <v-layout row wrap> -->

            <!-- User Form -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Edit Profile</h4>
                      <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                <v-snackbar
                v-model="snackbar"
                absolute
                top
                right
                color="black"
                >
                <span>Details updated</span>
                <v-icon dark>check_circle</v-icon>
              </v-snackbar>
              <v-form ref="form" @submit.prevent="submit">
                <v-container grid-list-xl fluid>
                  <v-layout wrap>
                    <v-flex xs12 sm6>
                      <v-text-field
                      v-model="user.name"
                      :rules="rules.name"
                      color="purple darken-2"
                      label="Full name"
                      required
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                      <v-text-field
                      v-model="user.email"
                      :rules="emailRules"
                      color="blue darken-2"
                      label="Email"
                      required
                      ></v-text-field>
                    </v-flex>
                    <v-flex  xs12 sm6>
                      <v-text-field
                      :append-icon="e1 ? 'visibility_off' : 'visibility'"
                      :append-icon-cb="() => (e1 = !e1)"
                      :type="e1 ? 'password' : 'text'"
                      v-model="user.password"
                      name="input-10-2"
                      label="Enter your password"
                      hint="At least 8 characters"
                      min="8"
                      value=""
                      class="input-group--focused"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                      <v-text-field
                      v-model="user.address"
                      :rules="rules.name"
                      color="blue darken-2"
                      label="Address"
                      required
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                      <v-text-field
                      v-model="user.city"
                      :rules="rules.name"
                      color="blue darken-2"
                      label="City"
                      required
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                      <v-text-field
                      v-model="user.country"
                      :rules="rules.name"
                      color="blue darken-2"
                      label="Country"
                      required
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                      <v-text-field
                      v-model="user.phone"
                      :rules="rules.name"
                      color="blue darken-2"
                      label="Phone"
                      required
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                       <v-slider
                         v-model="user.age"
                         :rules="rules.age"
                         color="orange"
                         label="Age"
                         hint="Be honest"
                         min="1"
                         max="100"
                         thumb-label
                       ></v-slider>
                     </v-flex>
                    <!-- <div class="form-group bmd-form-group">
                      <vue-google-autocomplete
                      ref="address"
                      id="map"
                      classname="form-control"
                      placeholder="Please type your address"
                      v-on:placechanged="getAddressData"
                      country="ke"
                      ></vue-google-autocomplete>
                    </div> -->
                  </v-layout>
                </v-container>
                <v-card-actions>
                  <v-btn flat @click="resetForm">reset</v-btn>
                  <v-spacer></v-spacer>
                  <v-btn
                  :disabled="!formIsValid"
                  flat
                  color="primary"
                  @click="update"
                  >Submit</v-btn>
                </v-card-actions>
              </v-form>
            </div>
          </div>
        </div>
            <!-- </v-card> -->
          <!-- </v-flex> -->


          <!-- <v-flex xs12 sm4> -->

            <!-- <v-card> -->
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="#pablo">
                      <img class="img" src="/storage/profile/1528876796bg-archea.jpg">
                    </a>
                  </div>
                  <div class="card-body">
              
              <v-divider></v-divider>
              <h6 class="text-center card-category text-gray" color="green">Admin</h6>
              <h4 class="card-title">{{user.name}}</h4>
              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
              <button class="btn btn-primary btn-round" @click="onPickFile">Update Picture<div class="ripple-container"></div></button>
              <!-- <v-btn color="red" darken-1 raised @click="onPickFile" style="color: #fff;">Upload</v-btn> -->
              <!-- <input type="file" @change="Getimage" accept="image/*"> -->
              <input type="file" @change="Getimage" accept="image/*" style="display: none" ref="fileInput">
              <!-- <img v-show="imagePlaced" :src="avatar" style="width: 300px; height: 240px;"> -->
              <img v-show="imagePlaced" :src="avatar" style="width: 200px; height: 200px;">
              <v-btn @click="upload" flat v-show="imagePlaced">Upload</v-btn>
              <v-btn @click="cancle" flat v-show="imagePlaced">Cancle</v-btn>
            <!-- </v-card>
          </v-flex> -->
        </div>
      </div>
    </div>
  </div>
</div>

          <!-- User Form -->
        </v-layout>
      <!-- </v-layout> -->
    </v-container>
  </v-content>
</div>
</template>

<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete'
export default {
  props: ['user'],
  components: {
    VueGoogleAutocomplete
  },
  data () {
    const defaultForm = Object.freeze({
      name: '',
      password: '',
      email: '',
      phone: null,
    })
    return {
      address: '',
      imagePlaced: false,
      defaultForm,
      avatar: '',
      e1: true,
      snackbar: false,
      loader: false,
      form: Object.assign({}, defaultForm),
      emailRules: [
        v => {
          return !!v || 'E-mail is required'
        },
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      age: [
        val => val < 10 || `I don't believe you!`
      ],
      rules: {
        name: [val => (val || '').length > 0 || 'This field is required']
      },
    }
  },
  methods: {
    // Image Upload
    onPickFile() {
      this.$refs.fileInput.click()
    },
    onFilePicked(event) {
      this.imagePlaced = true
      const files = event.target.files
      let filename = files[0].name
      if (filename.lastIndexOf('.') <= 0) {
        return alert('please upload a valid image')
      }
      const fileReader = new FileReader()
      fileReader.addEventListener('load', () => {
        this.avatar = fileReader.result
      })
      fileReader.readAsDataURL(files[0])
      this.image = files[0]
    },
    Getimage(e) {
      let image = e.target.files[0];
      // this.read(image);
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        this.form.avatar = e.target.result
      }
      this.imagePlaced = true
      let form = new FormData();
      form.append('image', image);
      this.file = form
      console.log(e.target.files);
    },

    upload() {
      axios.post(`/profile/${this.user.id}`, this.file)
      .then((response) => {
        console.log(response);
        this.imagePlaced = false;
        this.color = 'black';
        this.text = 'Profile image updated';
        this.snackbar = true;
        // this.close()
      })
    },
    cancle() {
      this.avatar = this.user.profile;
      this.imagePlaced = false;
    },
    resetForm () {
        this.user = Object.assign({}, this.defaultForm)
        this.$refs.user.reset()
      },
    update() {
        axios.post('/userUpdate', {user: this.user,  location: this.address}).
        then((response) => {
          // console.log(response);
              this.loader=false
              this.close;
              this.resetForm();
              this.$emit('closeRequest');
              this.$emit('alertRequest');

        })
        .catch((error) => {
        this.errors = error.response.data.errors
        this.loader=false
      })
    },

    getAddressData: function (addressData, placeResultData, id) {
      this.address = addressData;
    },
  },

  computed: {
   formIsValid () {
     return (
       this.user.name 
     )
   },
 },
}
</script>