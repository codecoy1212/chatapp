import * as firebase from "firebase";

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

const db= firebase.firestore();


class DataService {
  getAll() {
    return db;
  }

  create(tutorial) {
    return db.add(tutorial);
  }

  update(id, value) {
    return db.doc(id).update(value);
  }
  checkorg(){
    const cit=db.collection("organizations");
const snapshot = await cit.where('org_name', '==', 'Waqas').get();
if (snapshot.empty) {
  console.log('No matching documents.');
  return false;
}  

snapshot.forEach(doc => {
  console.log(doc.id, '=>', doc.data());
});

return snapshot;

  }

  delete(id) {
    return db.doc(id).delete();
  }
}

export default new TutorialDataService();