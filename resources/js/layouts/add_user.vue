<template>


<div class="px-5 sm:px-20 mt-2 pt-10 border-gray-200">
        <form @submit="addUser"  class="validate-form grid grid-cols-12" >
          
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input type="text" name="username" class="input w-full border-b flex-1 " style=" border-color:#246EE9;" 
                placeholder="Username*" required
                    v-model="user.user_name">
            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input type="text" name="user" class="input w-full border-b flex-1 " style=" border-color:#246EE9;" 
                      placeholder="User*" required
                    v-model="user.user"
                    >
            </div>
            <br>
           
            
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input type="email" name="email" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                     placeholder="Email*" required
                     v-model="user.user_email"
                     >
            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input type="password" name="password" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                      placeholder="Password*" required
                      v-model="user.user_password"
                      >
            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input type="number" name="mobile" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                      placeholder="Mobile Number*" required
                    v-model="user.user_mobile"
                      >
            </div>
            <br>
    
    <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
       
        <input type="text" name="id_number" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
           v-model="user.user_id"
             placeholder="Id Number*" required>
    </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input type="text" name="administrator" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                     placeholder="Administrator*" required
                     v-model="user.administrator"
                     >
            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
           
                <input type="text" name="dob" class="input w-full border-b flex-1 datepicker" style=" border-color:#246EE9;" 
                   v-model="user.user_dob"
                     placeholder="Date of Birth*" required>
            </div>
           
           
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
       
        <input type="text" name="imei" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
           v-model="user.user_imei" placeholder="IMEI Number*" required>
    </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
             
                <select type="text" name="organization" class="select2 input w-full border-b flex-1 " style=" border-color:#246EE9;" 
                      placeholder="Organization*" v-model="user.organization_id" >
                   <option selected disabled>Select Organization</option>
                   <option v-for="(item , index) in testOpt" v-bind:key="index" :selected= "item.value == user.organization_id" v-bind:value="item.value">
            {{item.title}}
       </option>
</select>
            </div>

            
            <br>
              <div class="intro-y col-span-12 sm:col-span-2 px-2 my-4">

                <input type="text" name="province" class="input w-full border-b flex-1" placeholder="Province" style=" border-color:#246EE9;" required
v-model="user.user_province"
                >
                
                
            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-2 px-2 my-4">
           
                <input type="text" name="area" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                    v-model="user.user_area"
                      placeholder="Area*" required>
            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-2 px-2 my-4">

                <input type="text" name="bussiness" class="input w-full border-b flex-1" placeholder="Business" style=" border-color:#246EE9;" required
                v-model="user.user_bussiness"
                >
                

            </div>
            <br>
            <div class="intro-y col-span-12 sm:col-span-2 px-2 my-4">
               
               <input type="text" name="division" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                   v-model="user.user_division"
                    placeholder="Division*" required>
           </div>
            
        
            
           
           
            <br>
           
          
            <div class="intro-y col-span-12 sm:col-span-5 px-2 my-4">
                <input  accept="image/*" type="file" id="file" ref="file" v-on:change="submitFile()" class="input w-full border-b flex-1" style=" border-color:#246EE9;" 
                   
                      placeholder="Upload Image*" >

            </div>
            <br>
            <div class="intro-y col-span-6 sm:col-span-3 px-2 my-4">
              <div v-if="uploding">
  <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(30, 41, 59)" class="w-8 h-8">
                        <g fill="none" fill-rule="evenodd">
                            <g transform="translate(1 1)" stroke-width="4">
                                <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                                <path d="M36 18c0-9.94-8.06-18-18-18">
                                    <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                                </path>
                            </g>
                        </g>
                    </svg>
</div>
     <img v-else :src="filePrev" class="img-fluid"  />

   </div>
          

            <div class="intro-y col-span-12 items-center justify-center sm:justify-end mt-5">

                <button  class="button w-30 justify-center block bg-theme-42 text-white ml-2"> 
   <div v-if="clicked">
  <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(30, 41, 59)" class="w-8 h-8">
                        <g fill="none" fill-rule="evenodd">
                            <g transform="translate(1 1)" stroke-width="4">
                                <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                                <path d="M36 18c0-9.94-8.06-18-18-18">
                                    <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                                </path>
                            </g>
                        </g>
                    </svg>
</div>
<span v-else>Save</span>
                </button>
            </div>
        </form>
    </div>
  
  
</template>

<script>
import {
  saveUser,getOrg,getUser,updateUser
} from "../firebase.js";

export default {
  name: "app",
  data() {
    return {
      uploding:false,
      filePrev:'',
      file:'',
      currentOpt:'',
      testOpt:[],
      user: {
        last_seen:'-',
        online:false,
        organization_id:'',
      user_name:"",
user:"",
user_email:"",
user_password:"",
user_mobile:"",
user_id:"",
administrator:"",
user_dob:"",
user_imei:"",
user_bio:"-",
user_token:"-",
user_province:"",
user_area:"",
user_bussiness:"",
user_division:"",
user_image:"",
user_active:true
      },
      user_id:'',
      loginError:false,
      submitted: false,
      clicked:false
    };
  },
  mounted(){
   
      this.user_id=$('#orgid').val();
    if(this.user_id){
      this.getUserDetails(this.user_id);
    }
    getOrg()
 .then((res) => {
  res.forEach((doc) => { 
this.testOpt.push({
title:doc.data().org_name,
value:doc.id
})
  }
     ) 
})
        .catch(e => {
          console.log(e);
        });

  },
  methods: {
     handleFileUpload(){
       

      },
      getUserDetails(userid){
        getUser(userid)
 .then((res) => {
  console.log(res);
  this.user.last_seen=res.data().last_seen;
  this.user.online=res.data().online;
  this.user.user_bio=res.data().user_bio;
  this.user.user_name=res.data().user_name;
  this.user.organization_id=res.data().organization_id;
this.user.user=res.data().user;
this.user.user_email=res.data().user_email;
this.user.user_password=res.data().user_password;
this.user.user_mobile=res.data().user_mobile;
this.user.user_id=res.data().user_id;
this.user.administrator=res.data().administrator;
this.user.user_dob=res.data().user_dob;
this.user.user_imei=res.data().user_imei;
this.user.user_province=res.data().user_province;
this.user.user_area=res.data().user_area;
this.user.user_bussiness=res.data().user_bussiness;
this.user.user_division=res.data().user_division;
this.user.user_image=res.data().user_image;
})
        .catch(e => {
          console.log(e);
        });
      },
    submitFile(){
          this.uploding=true;
           this.file = this.$refs.file.files[0];
            let formData = new FormData();

            /*
                Add the form data we need to submit
            */
            formData.append('file',this.file );

        /*
          Make the request to the POST /single-file URL
        */
            axios.post( '/uplaod-pic',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            )
            .then((response)=>{
          if(response.data.status){
this.user.user_image=response.data.path;
   this.uploding=false;
          }else{
          
     this.picError();

                }
        })
        .catch(e =>{
          this.picError();
        });
      },

      picError(){
       this.uploding=false;
       this.$refs.file.value=null;
                           this.$swal.fire({
  icon: 'error',
  title: 'Image Not Uploaded!',
   toast: true,
  position: 'top-right',
  showConfirmButton: false,
  timer: 2500,
  timerProgressBar: true
 
})
      },
            pickFile () {

        let input = this.$refs.file

        let file = input.files

        if (file && file[0]) {

          let reader = new FileReader

          reader.onload = e => {

            this.filePrev = e.target.result

          }

          reader.readAsDataURL(file[0])

          this.$emit('input', file[0])

        }

        this.uploding=false;

      }
,
    addUser(e) {
        e.preventDefault();
        this.clicked=true;
if(this.user_id){
  updateUser(this.user_id,this.user)
        .then((res) => {

console.log(res);
            this.submitted = true;
            
               this.$swal.fire({
  icon: 'success',
  title: 'User Updated!',
   toast: true,
  position: 'top-right',
  showConfirmButton: false,
  timer: 2500,
  timerProgressBar: true
 
})
this.clicked=false;
        })
        .catch(e => {
          console.log(e);
        });
}else{
    // console.log();
      saveUser(this.user)
        .then((res) => {
if(res.empty){
alert('empty');
}else{
console.log(res);
            this.submitted = true;
            this.clicked=false;
               this.$swal.fire({
  icon: 'success',
  title: 'New User Added!',
   toast: true,
  position: 'top-right',
  showConfirmButton: false,
  timer: 2500,
  timerProgressBar: true
 
})
}
        })
        .catch(e => {
          console.log(e);
        });

      }
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
