<template>
   <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto ml-2" >
        List of Users
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <button @click="downloadFile()" class="button text-white bg-theme-42 shadow-md mr-2">Export to excel</button>
        <button class="button text-white bg-theme-42 shadow-md mr-2"><a  href="javascript:;" data-toggle="modal" data-target="#addmodal">CSV
                Import</a></button>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
       
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <button class="button text-white bg-theme-42 shadow-md mr-2"><a href="add_user">Add
                New</a></button>
    <div class="modal" id="addmodal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <div class="text-3xl mt-5">Add File</div>

            </div>
            <div class="px-5 pb-8 ">
             
                
                    <div class="intro-y col-span-12 sm:col-span-6 px-2">
                        <div class="mb-2 mt-3"> CSV File*</div>
                        <input class="input w-full border flex-1" type="file" ref="file" id="file" name="file" accept=".csv" required>
                        <span class="text-theme-6 hidden">
                          File is required
                        </span>
                    </div>
                    <div class="text-center">
                        <button type="button" data-dismiss="modal"
                            class="button w-24 border text-gray-700 mr-1 mt-5">Cancel</button>
                        <button @click="importFile" class="button w-24 bg-theme-42 text-white  pl-5 pr-5">
                          <div v-if="clicked">
  <svg width="20" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(30, 41, 59)" class="w-6 h-6 m-auto">
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
               
            </div>
        </div>
    </div>
    </div>
</div>
<div class="intro-y  box p-5 mt-5 myclass" >                     
    <table class="" id="myTable">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Status</th>
                <th class="border-b-2 whitespace-no-wrap">Last Seen</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Days Last Seen</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Administrator</th>
                <th class="border-b-2 whitespace-no-wrap">User</th>
                <th class="border-b-2 whitespace-no-wrap">ID Number</th>
                <th class="border-b-2 whitespace-no-wrap">DOB(date Of Birth)</th>
                <th class="border-b-2 whitespace-no-wrap">Username</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Password</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Mobile</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Imei</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Division</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Province</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Business</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Area</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Active</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Photo Upload</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
            
            </tr>
        </thead>
        <tbody>
      

        </tbody>
    </table>
  </div> 
</template>

<script>
import {
  getData,checkOrg,saveOrg,saveUser,updateOrg,getOrg,getOrgByid
} from "../firebase.js";

import * as XLSX from "xlsx";
import exportFromJSON from "export-from-json";
export default {
  name: "app",
  data() {
    return {
      listLenght:0,
      curentIndex:0,
      clicked:false,
    userList:[],
    exportList:[],
    file:File,
    arrayBuffer:null,
    fileList:null,
    orgList:[],
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
      organization:{
        image:"",
        org_id:"",
        org_name:""
      },
      impList:[]
    };
  },
  mounted(){
   this.updatePage();
    },

  methods: {
    updatePage(){
      this.testOpt=[];
      this.userList=[];
      getOrg()
 .then((res) => {
  res.forEach((doc) => { 
this.testOpt.push({
title:doc.data().org_name,
value:doc.data().id
})
  }
     )
     console.log(this.testOpt); 
})
        .catch(e => {
          console.log(e);
        });
  	getData()
 .then((res) => {
  console.log(res);
 	res.forEach((doc) => {
    var lastseen="-";
    var diff="-";
 	if(doc.data().last_seen!="-"){
    var t1=doc.data().last_seen.seconds*1000;
    var date=new Date(t1);
     lastseen=date.getDate()+
          "/"+(date.getMonth()+1)+
          "/"+date.getFullYear()+
          " "+date.getHours()+
          ":"+date.getMinutes()+
          ":"+date.getSeconds();
         var t2=new Date();
          diff= Math.ceil((t2-t1) / (1000 * 3600 * 24));

  }
    this.userList.push({
    	status:(doc.data().online)?'<div class="dot  mx-3 " ></div>':'-',
    	last_seen:lastseen,
    	last_days:diff,
    	name:doc.data().user_name,
    	user_id:doc.data().user_id,
    	administrator:doc.data().administrator,
    	user_id:doc.data().user_id,
    	dob:doc.data().user_dob,
    	user_name:doc.data().user_name,
    	user_password:doc.data().user_password,
    	user_mobile:doc.data().user_mobile,
    	user_imei:doc.data().user_imei,
    	user_email:doc.data().user_email,
    	user_division:doc.data().user_division,
    	user_bussiness:doc.data().user_bussiness,
    	user_province:doc.data().user_province,
    	user_area:doc.data().user_area,
    	user_active:doc.data().user_active,
    	user_image:(doc.data().user_image)?'yes':'no',
    	organization_id:doc.data().organization_id,
    	user_edit:'<a class="button bg-theme-1 mt-2" href="edit_user/'+doc.id+'" >Edit</a> <button class="button bg-theme-6 mt-3" @click="deleteUser('+doc.id+')"  >Delete</button>',
    });
    this.exportList.push({
      Administrator:doc.data().administrator,
      User:doc.data().user,
      user_id:doc.data().user_id,
    	Username:doc.data().user_name,
    	Password:doc.data().user_password,
    	Mobile:doc.data().user_mobile,
      Imei:doc.data().user_imei,
    	Email:doc.data().user_email,
      Division:doc.data().user_division,
      Business:doc.data().user_business,
    	Province:doc.data().user_province,
    	Area:doc.data().user_area,
    });
    // this.updateorgname(doc.data().organization_id);
  });
  $('#myTable').DataTable().destroy();
  // console.log(this.userList);
 	 $('#myTable').DataTable({
 	data:this.userList,
 	 buttons: [
        'copy', 'excel', 'pdf'
    ],
        	columns: [
            { data: 'status' },
            { data: 'last_seen' },
            { data: 'last_days' },
            { data: 'administrator' },
            { data: 'user_name' },
            { data: 'user_id' },
            { data: 'dob' },
            { data: 'user_name' },
            { data: 'user_password' },
            { data: 'user_mobile' },
            { data: 'user_imei' },
            { data: 'user_email' },
            { data: 'user_division' },
            { data: 'user_province' },
            { data: 'user_bussiness' },
            { data: 'user_area' },
            { data: 'user_active' },
            { data: 'user_image' },
            { data: 'user_edit' },
            
        ],
        });
 	
 	})
        .catch(e => {
          console.log(e);
        });
    },
    loginAdmin() {
     
     }
,
downloadFile() {
      const data = this.exportList;
      const fileName = "export_data";
      const exportType = exportFromJSON.types.csv;

      if (data) exportFromJSON({ data, fileName, exportType });
    },
     setDataTable(){
 $('#myTable').DataTable({
 	data:this.userList,
        	responsive:true
        });
     }
         
    ,
    importFile(){
    this.file = this.$refs.file.files[0];
  let fileReader = new FileReader();
   fileReader.readAsArrayBuffer(this.file);
  fileReader.onload = (e) => {
    this.arrayBuffer = fileReader.result;
    var data = new Uint8Array(this.arrayBuffer);
    var arr = new Array();
    this.impList=[];
    this.orgList=[];
    for (var i = 0; i != data.length; ++i)
      arr[i] = String.fromCharCode(data[i]);
    var bstr = arr.join("");
    var workbook = XLSX.read(bstr, { type: "binary" });
    var first_sheet_name = workbook.SheetNames[0];
    var worksheet = workbook.Sheets[first_sheet_name];
   // console.log(XLSX.utils.sheet_to_json(worksheet, { raw: true }));
    var arraylist = XLSX.utils.sheet_to_json(worksheet, { raw: true });
    this.listLenght=arraylist.length;
    
    arraylist.forEach((data)=>{
      this.user.administrator=data['Administrator'];
      this.user.user=data['User'];
      this.user.user_id=data['ID Number'];
      this.user.user_name=data['Username'];
      this.user.user_password=data['Password'];
      this.user.user_mobile=data['Mobile Number'];
      this.user.user_imei=data['IMEI Number'];
      this.user.user_email=data['Email'];
      this.user.user_division=data['Devision'];
      this.user.user_bussiness=data['Business Unit'];
      this.user.user_province=data['Province'];
      this.user.user_area=data['Area'];
      this.organization.org_name=data['Organization'];
      //console.log(data['Organization']);
      if(!this.orgList.includes(data['Organization'])){
        this.orgList.push(data['Organization']);
      }
      this.impList.push({
        user:this.user,
        org:{
        org_name:data['Organization']
      }
      });

      ///imp list data
    //   {user:{ administrator:data['Administrator'],
    //   user:data['User'],
    //   user_id:data['ID Number'],
    //   user_name:data['Username'],
    //   user_password:data['Password'],
    //   user_mobile:data['Mobile Number'],
    //   user_imei:data['IMEI Number'],
    //   user_email:data['Email'],
    //   user_division:data['Devision'],
    //   user_bussiness:data['Business Unit'],
    //   user_province:data['Province'],
    //   user_area:data['Area']
    //     },
    //   org:{
    //     org_name:data['Organization']
    //   }

    // }
      ///

       
//       checkOrg(data['Organization'])
//         .then((res) => {
// if(res.empty){
// console.log('no');
//   // saveOrg(this.organization)
//   //       .then((res) => { 
//   //         console.log('save');
//   //       })
//   //       .catch(e => {
//   //         console.log(e);
//   //       });

//         }else{
// console.log(res.data());
           
// }
//         })
//         .catch(e => {
//           console.log(e);
//         });
//     });
//     this.impList.map((userData)=>{
// console.log(userData);
       })
       
   // console.log(this.impList);
   
  };
  //console.log(this.orgList);
//list start  

 this.orgList.map((orgname)=>{
 this.saveOrg(orgname);
}) 
// for(var j=0; j<this.orgList.length; j++){
//   console.log(this.orgList[j]);
// }  




// listend

this.impList.map( (userData)=>{
 this.addUser(userData);
   })

//window.location.reload();
// this.updatePage();

if(this.listLenght>0){
      this.clicked=true;
    }
   },
    addUser(userData){
     checkOrg(userData.org.org_name)
        .then((res) => {
if(res.empty){
console.log('user not added');
userData.user.organization_id="";
        }else{
          res.forEach((doc) => {
   // console.log(doc.id, ' => ', doc.data());
userData.user.organization_id=doc.id;
});     

}
saveUser(userData.user).then((res)=>{
  this.curentIndex++;
  console.log(this.curentIndex);
  if(this.impList.length>0 && this.impList.length==this.curentIndex){
  $('#addmodal').modal('hide');
  this.$refs.file.value=null;
  this.updatePage();
  this.clicked=false;
  //window.location.reload();
}
})

        })
        .catch(e => {
          console.log(e);
        });
   }
  ,
   saveOrg(name){
    checkOrg(name)
        .then((res) => {
if(res.empty){
   saveOrg(name)
        .then((res) => { 
        this.update(res.id);
          console.log(name);
        })
        .catch(e => {
          console.log(e);
        });

        }else{
          res.forEach((doc) => {
    console.log(doc.id, ' => ', doc.data());

});     


}
        })
        .catch(e => {
          console.log(e);
        });
  }
,
updateorgname(id){
  getOrgByid(id).then((res)=>{
console.log(res);
  }) .catch(e => {
          console.log(e);
        });
  
},
update(id){
  const data={
    org_id:id
  }
updateOrg(id,data);
},
deleteUser(id){
  alert();
}
  
  }

};

</script>

<style>
.submit-form {
  max-width: 300px;
  margin: auto;
}
</style>
