 // js code for clickable resume and cover-letter links

 function navdropdown() {
    document.getElementById("mydrop").classList.toggle("show");
}

function navdropdown2() {
    document.getElementById("mydrop1").classList.toggle("show1");
}

document.onclick = function (e) {
    if (e.target.className !== 'resumehover' && e.target.className !== 'cvhover') {
        let dropdown1 = document.querySelector(".dropdown-content");
        let dropdown2 = document.querySelector(".cdropdown-content");
        if (dropdown1.classList.contains('show')) {
            dropdown1.classList.remove('show');
        }
        else if (dropdown2.classList.contains('show1')) {
            dropdown2.classList.remove('show1');
        }
    }
}

/* js code for responsive navbar button */

 function showx(){
 let menubar=document.getElementById("menubar");
  let cross=document.getElementById("cross");
  cross.style.display="block";
  menubar.style.display="none";
 }
 
 function showb(){
 let menubar=document.getElementById("menubar");
 let cross=document.getElementById("cross");
 cross.style.display="none";
 menubar.style.display="block";
 }

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


// js for sign in modal

var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
var btntxt = document.getElementsByClassName("toggle-btn");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
    if (window.innerWidth<350) {
        y.style.left = "36px";
    }
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
    if (window.innerWidth<350) {
        x.style.left = "36px";
    }
}



// let modal = document.getElementById("btns");

// let openm = document.getElementById("mbtn");

// let closem = document.getElementsByClassName("close")[0];

// let loginform=document.getElementById("login");

// let registerform=document.getElementById("register");


// openm.onclick = function () {
//     modal.style.zIndex = "110000";
//     document.body.style.overflow = "hidden";
//     modal.style.display = "block";
// }

// closem.onclick = function () {
//     modal.style.display = "none";
//     document.body.style.overflow = "scroll";
// }


// registerform.addEventListener('submit', function(event) {
//     event.preventDefault(); // prevent the form from submitting normally
  
//     const email=document.getElementById("remail").value;

//     const pass=document.getElementById("rpassword").value;
  
//     // TODO: Perform additional validation on the email and password fields if needed
  
//     // Make an AJAX request to the server to validate the user's credentials
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', 'loginregistermodal.php');
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onload = function() {
//       if (xhr.status === 200) {
//         const response = JSON.parse(xhr.responseText);
//         if (response.success) {
//           // Login was successful, update the page as needed
//         } else {
//           // Login failed, display an error message to the user
//           const errorMessage = document.getElementById('register-error');
//           errorMessage.innerHTML = 'Invalid email or password.';
//           errorMessage.style.display = 'block';
//         }
//       } else {
//         // There was an error making the AJAX request
//         console.error('Error:', xhr.statusText);
//       }
//     };
//     xhr.onerror = function() {
//       // There was a network error
//       console.error('Error:', xhr.statusText);
//     };
//     xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
//   });












