<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your password</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .btn1 {
        width: 100%;
        height: 100vh;
        display: grid;
        place-items: center;
        background-color: rgba(97, 104, 118, 0.16);
    }

    .formdiv {
        /* margin-top:-30px; */
        padding: 20px;
    }

    .formcontent {
        max-width: 480px;
        background-color: white;
        box-shadow: 0 0 4px rgba(29, 39, 59, 0.04);
        border: 1px solid #e6e7e9;
        padding: 40px;
        display: grid;
        place-items: center;
    }

    .forgotform h2 {
        text-align:center;
        margin-bottom: 35px;
    }

    .forgotform p {
        text-align: justify;
        margin-bottom: 15px;
    }

    .input-field {
        width: 100%;
        padding: 10px 0px;
        margin-top: 23px;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 2px solid black;
        outline: none;
        background: transparent;
        font-size: 17px;
        text-indent: 5px;
    }

    .submit-btn {
        width: 100%;
        border-radius: 5px;
        border: none;
        padding: 10px 30px;
        display: block;
        margin-top: 60px;
        cursor: pointer;
        color: white;
        background-color: #0000FF;
        font-size:15px;
        font-weight:bold;
    }

    .branding{
        display:flex;
        align-items:center;
        justify-content:center;
        margin-bottom:40px;
    }


    /*  logo animation */

.logoan {
    /* content: ''; */
    background-color: rgba(0,64,255,1);
    height: 200px;
    width: 200px;
    position: absolute;
    transform: rotate(45deg);
    top: 40px;
    left: -170px;
    transition: 0.8s;
    z-index: -1;
}

.logocon:hover .logoan{
     transform: rotate(45deg);
     left: -100%;
     top:-100%;
     transition-delay:0.3s;
     /* background-color: yellow; */
}


.logocon:before{
    content:'';
    position: absolute;
    top: 0;
    right: 0;
    width: 10px;
    height:10px;
    border-top: 2px solid #0040FF;
    border-right: 2px solid #0040FF;
    transition:0.5s;
    transition-delay: 0.4s;
}

.logocon:hover:before{
    width: 95%;
    height: 95%;
    transition-delay: 0.1s;
}

.logocon:after{
    content:'';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 10px;
    height:10px;
    border-bottom: 2px solid #0040FF;
    border-left: 2px solid #0040FF;
    transition:0.5s;
    transition-delay: 0.4s;
}

.logocon:hover:after{
    width: 95%;
    height: 95%;
    transition-delay: 0.1s;
}


.logocon{
      text-align: center;
      position: relative;
      padding:10px 0;
      transition: .5s ease-out;
      overflow: hidden;
    } 

.logocon:hover h3{
    color:white;
    transition-delay: 0.5s;
}

.logocon:hover .cg{
    color:black;
    transition-delay: 0.5s;
}

.logocon h3{
    padding:0 15px;
    transition-delay: 0.3s;
}

.logocon .cg{
    color:#0000FF;
    transition-delay: 0.5s;
}


.logoname p{
    font-size:19px;
    font-weight:bold;
    margin-left:30px;
}

   /* code for error div */

   .error{
        width:100%;
        text-align:center;
        padding-top:30px;
        position:absolute;
    }


    </style>
</head>

<body>
    <?php
$alert=false;
$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "./db/config.php";

    $email=$_POST['resetmail'];
    $pass=$_POST['resetpass'];
    $cpass=$_POST['cresetpass'];


    $existuser="SELECT * FROM `crbpusers` WHERE email='$email'";
    $result=mysqli_query($conn,$existuser);
    $numrow=mysqli_num_rows($result);

    if($numrow > 0){
        
        if(strlen($pass) < 8){
            $alert=true;
            $error="Enter more than 8 charactes !";
        }
        elseif(strlen($pass) > 20){
            $alert=true;
            $error="Enter less than 20 charactes !";
        }
        elseif($pass==$cpass){
            $hash=password_hash($pass, PASSWORD_DEFAULT);
            $query="UPDATE crbpusers SET password='$hash' WHERE email='$email'";
            $result=mysqli_query($conn,$query);
            header("Location: sign.php?success");
          }
          else{
             $alert=true;
             $error="Passwords donot match !";
             
          }
    }
    else{
        $alert=true;
        $error="Invalid email address !";    
    }

}



if($alert){

    echo'<div class="error" id="error">
                    <h2 style="color:red;">'.$error.'</h2>
   </div>';
}

?>
    <!-- work for forget password feature -->
    <div id="btns" class="btn1">
        <div class="formdiv">
            <div class="branding">
            <div class="logocon">
                <div class="logoan"></div>
                <h3>R<span class="cg">G</span></h3>
            </div>
            <div class="logoname">
              <p>Resume Generator</p>   
            </div>
            </div>
            <div class="formcontent">
                <form action="resetpass.php" class="forgotform" method="post">
                    <h2>Reset your password</h2>
                    <p>Enter your email address that you used to register and enter your password.</p>

                    <input type="email" class="input-field" name="resetmail" id="resetmail" placeholder="Email Address"
                        required>
                    <input type="password" class="input-field" name="resetpass" id="resetpass" placeholder="Your password"
                        required>
                    <input type="password" class="input-field" name="cresetpass" id="cresetpass" placeholder="confirm your password"
                        required>
                    <div class="btnmodalgrid">
                        <button type="submit" name="forgotsub" class="submit-btn">Send Password Rest Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php

if($alert){
    echo'
<script>


setInterval(function() {
        var div = document.getElementById("error");
            div.style.display = "none";
    }, 3000);
</script>';
}

?>

</body>

</html>