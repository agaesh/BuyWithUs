function ShowHideLoginRegister(element){
    let formHeader = document.querySelector("form h2");
    let submitBtn= document.querySelector("input[type=submit]");
    let confirmpass = document.querySelector(".confirmpass");
        if(element.textContent === "Login"){
            formHeader.textContent = "Login"
            confirmpass.style.display ="none"
            submitBtn.value = "Login"
            
        }else{
            formHeader.textContent = "Register Seller Account Here"
           confirmpass.style.display = "block";
           submitBtn.value= "Register"
        }
}
const loginMenuLink = document.querySelector(".login-link");
const RegisterMenuLink = document.querySelector(".register-link");

loginMenuLink.onclick = function() {
    ShowHideLoginRegister(this);
};
RegisterMenuLink.onclick = function() {
    ShowHideLoginRegister(this);
};