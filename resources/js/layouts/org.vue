<template>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto ml-2">
        List Of Orgnizations
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="button text-white bg-theme-42 shadow-md mr-2"><a href="javascript:;" data-toggle="modal" data-target="#addmodal">Create new Orgnization</a></button>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

    </div>
</div>
<div class="modal" id="addmodal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <div class="text-3xl mt-5">Add Organization</div>

            </div>
            <div class="px-5 pb-8 ">
             
                
                    <div class="intro-y col-span-12 sm:col-span-6 px-2">
                        <div class="mb-2 mt-3">Organization Name</div>
                        <input class="input w-full border flex-1" v-model="organization.org_name" type="text" id="org_name" name="org_name" required>
                        <span class="text-theme-6 hidden">
                          File is required
                        </span>
                    </div>
                    <div class="text-center">
                        <button type="button" data-dismiss="modal"
                            class="button w-24 border text-gray-700 mr-1 mt-6">Cancel</button>
                        <button @click="addOrg" class="button w-24 bg-theme-42 text-white  pl-5 pr-5">Save</button>
                    </div>
               
            </div>
        </div>
    </div>
<!-- BEGIN: Datatable -->
<div class="intro-y box p-5 mt-5">
    
<div v-for="(item , index) in orgList" v-bind:key="index" class="intro-y flex flex-col sm:flex-row items-center mt-2" >
    <div class="mr-auto">
        <div class="font-bold bg-theme-42 px-5 text-2xl text-white whitespace-no-wrap" >
       {{item.org_name}}
    </div>
    </div>
    <div class="">
<button class="button" @click="deleteOrg(item.org_id)" href="#" >Delete</button>
</div>
</div>
  
</div>
</template>
<script>
    import {
      getOrg,checkOrg,saveOrg,updateOrg,delOrg
    } from "../firebase.js";
    
    import * as XLSX from "xlsx";
    export default {
      name: "app",
      data() {
        return {
        userList:[],
        arrayBuffer:null,
        fileList:null,
        orgList:[],
          organization:{
            image:"",
            org_id:"",
            org_name:""
          }
        };
      },
      mounted(){
      this.updateOrgList();
        },
    
      methods: {
        updateOrgList(){
            getOrg()
     .then((res) => {
      console.log(res);
      this.orgList=[];
         res.forEach((doc) => {
         
        this.orgList.push({
          
            org_id:doc.id,
            org_name:doc.data().org_name,
            
            org_edit:'<a href="#" >Edit</a>',
        });
      });
        // console.log(this.userList);
        //   $('#myTable').DataTable({
        //  data:this.orgList,
        //   buttons: [
        //     'copy', 'excel', 'pdf'
        // ],
        //         columns: [
        //         { data: 'org_name' },
        //         { data: 'org_edit' }
                
                
        //     ],
        //     });
         
         })
            .catch(e => {
              console.log(e);
            });
        },
     
         setDataTable(){
     $('#myTable').DataTable({
         data:this.orgList
            });
         }
             
        ,
       deleteOrg(id){
delOrg(id).then((res)=>{
console.log(res);
this.updateOrgList();
})
.catch(e => {
              console.log(e);
            });
       },
      
       addOrg(){
if(this.organization.org_name!=""){
        checkOrg(this.organization.org_name)
            .then((res) => {
    if(res.empty){
       saveOrg(this.organization.org_name)
            .then((res) => { 
                this.update(res.id);

              console.log(this.organization.org_name);
              this.updateOrgList();
              this.organization.org_name="";
              $('#addmodal').modal('hide');
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
    }

    ,
    update(id){
  const data={
    org_id:id
  }
updateOrg(id,data);
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
    