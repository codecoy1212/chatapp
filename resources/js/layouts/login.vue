<template>
    <h4 class="font-weight-bolder text-white text-center">Sign In</h4>
   <div class="card-body">
     <span v-if="loginError" class="text-theme-6 mb-2 text-bold text-center">Credentail Not Matched!</span>
                                <div id="login-form">
                                  
                                    <div class="mb-3">
                                        <input type="email" class="form-control form-control-lg" name="email" id="email"
                                             placeholder="Email" aria-label="Email" autofocus required
                                            v-model="admin.email"
                                            />
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            placeholder="Password" name="password" autocomplete="current-password"
                                            aria-label="Password" required
                                            v-model="admin.password"
                                            >
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"  @click="loginAdmin"
                                            class="btn btn-lg bg-white  btn-lg  mt-2 mb-0">
                                              <div v-if="clicked" class="spinner-border" role="status">
  <span class="sr-only ">Loading...</span>
</div>
<span v-else >Sign In</span>
                                            </button>
                                    </div>
                                </div>
                            </div>
</template>

<script>
import {
  loginAdmin
} from "../firebase.js";

export default {
  name: "app",
  data() {
    return {
      admin: {
       email:"",
      password:""
      },
      loginError:false,
      submitted: false,
      clicked:false
    };
  },
  methods: {
    loginAdmin() {
      var data = {
        email: this.admin.email,
        password: this.admin.password,
      };

      loginAdmin()
     
        .then((res) => {

            this.submitted = true;
            this.clicked=true;
              axios.post('/login_admin',{admin: this.admin,doc:res.data()})
                .then((response)=>{
               //   console.log(response.data);
               //   this.$swal('Hello Vue world!!!');
                
             if(response.data){
              this.loginError=false;
            window.location.href="/";

             }else{
             // this.loginError=true;
              this.clicked=false;
                  this.$swal.fire({
  icon: 'error',
  title: 'Credentials Not Matched!',
   toast: true,
  position: 'top-right',
  showConfirmButton: false,
  timer: 2500,
  timerProgressBar: true
 
})
             }
             

                })
        })
        .catch(e => {
          console.log(e);
        });
    },
    
   
  }
};
</script>

<style>
.submit-form {
  max-width: 300px;
  margin: auto;
}
</style>
