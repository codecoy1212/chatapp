// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.2/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
import {
  getFirestore,
  collection,
  getDocs,
  onSnapshot,
  addDoc,
  deleteDoc,
  doc,
  getDoc,
  updateDoc,
  where,
  query,
  setDoc
} from "https://www.gstatic.com/firebasejs/9.6.2/firebase-firestore.js";

// Your web app's Firebase configuration
const firebaseConfig ={
  apiKey: "AIzaSyCidDHAWyV1Q8qtXugBlwQpyRepx0MEUAw",
  authDomain: "chatapp-faeba.firebaseapp.com",
  projectId: "chatapp-faeba",
  storageBucket: "chatapp-faeba.appspot.com",
  messagingSenderId: "824873785456",
  appId: "1:824873785456:web:0c61c22954a621bb2bfcb5",
  measurementId: "G-FP0S5HBRC4"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);

export const db = getFirestore();

/**
 * Save a New Task in Firestore
 * @param {string} title the title of the Task
 * @param {string} description the description of the Task
 */

export const checkUser = (data)=>{
  const userRef = collection(db,'users2');
  const q=query(userRef,where("user_id","==",data.user_id));
   const querySnapshot = getDocs(q);
  return querySnapshot;
}
export const checkOrg = (org_name)=>{
  const userRef = collection(db,'organizations');
  const q=query(userRef,where("org_name","==",org_name));
   const querySnapshot = getDocs(q);
  return querySnapshot;
}
export const saveOrg = (data) =>{

  const org={
    org_id:"",
    image:"",
    org_name:data
  }
   const docRef =  addDoc(collection(db, "organizations"), org);

// To update age and favorite color:
//  updateDoc(docRef, {
//     "org_id": docRef.id
// });
return docRef;
  }

  export const updateOrg = (id, newFields) =>
  updateDoc(doc(db, "organizations", id), newFields);

export const saveUser = (data) =>{
return addDoc(collection(db, "users2"), data);
}

  export const loginAdmin=() => getDoc(doc(db, "Admin", '26b59145de834a488796'));


export const onGetTasks = (callback) =>
  onSnapshot(collection(db, "tasks"), callback);

/**
 *
 * @param {string} id Task ID
 */
export const deleteTask = (id) => deleteDoc(doc(db, "tasks", id));
export const delOrg = (id) => deleteDoc(doc(db, "organizations", id));

export const getTask = (id) => getDoc(doc(db, "tasks", id));
export const getUser = (id) => getDoc(doc(db, "users2", id));

export const updateTask = (id, newFields) =>
  updateDoc(doc(db, "tasks", id), newFields);
  
  export const updateUser = (id, newFields) =>{
  const res =updateDoc(doc(db, "users2", id), newFields);
console.log(res);
return res;
  }

export const getData = () =>{
  return getDocs(collection(db,'users2'));

}

export const getOrg = () => getDocs(collection(db, "organizations"));
export const getOrgByid = (id) => getDoc(collection(db, "organizations",id));
