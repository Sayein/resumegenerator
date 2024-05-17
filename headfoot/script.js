/* js code for responsive navbar button */

//  function showx(){
//  let menubar=document.getElementById("menubar");
//   let cross=document.getElementById("cross");
//   cross.style.display="block";
//   menubar.style.display="none";
//  }
 
//  function showb(){
//  let menubar=document.getElementById("menubar");
//  let cross=document.getElementById("cross");
//  cross.style.display="none";
//  menubar.style.display="block";
//  }

/* js to stop background scrolling when navbar is open in responsive version*/

let menu = document.getElementById("menubtn");

menu.addEventListener("click", function () {
    menu.classList.toggle("fad");
    if (menu.classList.contains("fad")) {
        document.body.style.overflow = "hidden";
        
    } else {
        document.body.style.overflow = "scroll";
    }
});


// js for sign up and log in style

var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
var loginBtn = document.getElementById("btn-l");
var signBtn = document.getElementById("btn-s");
var btntxt = document.getElementsByClassName("toggle-btn");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
    signBtn.style.color ="white";
    loginBtn.style.color ="black";
    if (window.innerWidth<350) {
        y.style.left = "36px";
    }
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
    signBtn.style.color ="black";
    loginBtn.style.color ="white";
    if (window.innerWidth<350) {
        x.style.left = "36px";
    }
}















