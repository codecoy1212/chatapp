import * as firebase from "firebase";
import "firebase/firestore";

let config = {
  apiKey: "AIzaSyCidDHAWyV1Q8qtXugBlwQpyRepx0MEUAw",
  authDomain: "chatapp-faeba.firebaseapp.com",
  projectId: "chatapp-faeba",
  storageBucket: "chatapp-faeba.appspot.com",
  messagingSenderId: "824873785456",
  appId: "1:824873785456:web:0c61c22954a621bb2bfcb5",
  measurementId: "G-FP0S5HBRC4"
};

firebase.initializeApp(config);

export default firebase.firestore();