import {
    loginAdmin
} from "./firebase.js";

const taskForm = document.getElementById("login-form");

taskForm.addEventListener("submit", async (e) => {
e.preventDefault();

const email = 'admin@admin.com';
const  password= 'admin123';

try {
const doc= await loginAdmin(email,password);
console.log(doc);

} catch (error) {
console.log(error);
}
});