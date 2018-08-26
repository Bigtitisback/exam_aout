console.log("introToggle atteint");
// Script for Log-in or Register selection menu

const logButton = document.querySelector(".log-button");
const regButton = document.querySelector(".reg-button");

const logForm = document.querySelector(".log-form");
const regForm = document.querySelector(".reg-form");

logButton.addEventListener('click', function(){

    console.log("hide reg show log");
    if (regForm.classList.contains('visible')) {
        regForm.classList.remove('visible');
    }
    logForm.classList.add('visible');
})


regButton.addEventListener('click', function(){
    
    console.log("hide log show reg");
    if (logForm.classList.contains('visible')) {
        logForm.classList.remove('visible');
    }
    regForm.classList.add('visible');
})