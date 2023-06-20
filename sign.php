<?php
session_start();
$alert=false;
$success=false;
$error="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include "./db/config.php";

  $userid=uniqid();
 
  $email=$_POST['remail'];
  $pass=$_POST['rpassword'];
  $cpass=$_POST['cpassword'];
  
  $existuser="SELECT * FROM `crbpusers` WHERE email='$email'";
  $result=mysqli_query($conn,$existuser);
  $numrow=mysqli_num_rows($result);

  if($numrow > 0){
    $alert=true;
    $error="User already exists !";
    
  }
  else{
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
       $sql="INSERT INTO `crbpusers` (`user_id`, `email`, `password`, `dt`) VALUES ('$userid', '$email', '$hash', current_timestamp())";
       $result=mysqli_query($conn,$sql);
       if($result){
        header("Location: ./sign.php?success2");
       }
     }
     else{
        $alert=true;
        $error="Passwords donot match !";
        
     }

    }
   }

if(isset($_GET['false1']) && $_GET['false1']=="true"){
    $alert=true;
    $error="Email or password is incorrect !";
}
elseif(isset($_GET['false2'])){
    $alert=true;
    $error="User does not exist !";
}
elseif(isset($_GET["success"])){
    $success=true;
    $error="Your password has been reset !";
  }
elseif(isset($_GET["success2"])){
    $success=true;
    $error="You can log in now !";
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/5e725f22df.js" crossorigin="anonymous"></script>
    <style>
    /* css for sign in modal */

    /* form div */
    .form-box {
        max-width: 350px;
        width: 400px;
        height: 480px;
        position: relative;
        /* margin: 6% auto; */
        background: #fff;
        padding: 5px;
        overflow: hidden;
        border-radius: 5px;
        box-shadow: 0px 0px 10px black;
    }

    /* login/reg code */

    .btn-box {
        width: 230px;
        margin: 30px auto;
        position: relative;
        box-shadow: 0px 0px 5px 5px lightgray;
        border-radius: 30px;
    }

    .toggle-btn {
        padding: 9px 35px;
        cursor: pointer;
        background: transparent;
        border: 0;
        outline: none;
        position: relative;
        font-weight: 700;
    }

    #btn {
        top: 0px;
        left: 0px;
        position: absolute;
        padding: 18px 60px;
        background-color: #1d55ff;
        border-radius: 38px;
        transition: 0.5s;
    }

    .input-group {
        /* top:140px; */
        width: 70%;
        position: absolute;
        transition: 0.5s;
    }

    .input-field {
        width: 100%;
        padding: 10px 0px;
        margin-top: 30px;
        margin-left: 8px;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 2px solid black;
        outline: none;
        background: transparent;
        font-size: 17px;
        text-indent: 5px;
    }

    .btnmodalgrid {
        display: grid;
        place-items: center;
    }

    #rgbtn {
        margin-top: 45px;
    }

    .submit-btn {
        font-size: 17px;
        width: 80%;
        border-radius: 10px;
        border: none;
        padding: 10px 30px;
        display: block;
        margin-top: 60px;
        margin-left: 10px;
        cursor: pointer;
        color: white;
        /* background:linear-gradient(to right,#9AFBFA,#D071F9); */
        background-color: #0000FF;
        font-weight: 600;
    }

    #login {
        left: 50px;
    }

    #register {
        left: 450px;
        top: 100px;
    }

    .link {
        color: blue;
        text-decoration: none;
        /* padding-top: 100px; */
        position: relative;
        top: 100%;
        margin-left: 8px;
    }


    /* w3 */
    .btn1 {
        display: grid;
        place-items: center;
        padding: 200px 0 300px 0;
        /* Hidden by default */
        /* position: fixed; */
        /* Stay in place */
        /* z-index: 1; */
        /* Sit on top */
        /* padding-top: 100px; */
        /* Location of the box */
        /* left: 0; */
        /* top: 0; */
        /* width: 100%; */
        /* Full width */
        /* height: 100%; */
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        /* background-color: #fefefe; */
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    /* code for error div */

    .error{
        width:100%;
        text-align:center;
        padding-top:140px;
        position:absolute;
    }

    /* for responsive form element */

    @media(max-width:300px) {
        #login {
            left: 36px;
        }
    }
    </style>
    <title>sign in</title>
</head>

<body>
    <?php
        include("headfoot/navbar.php");
    ?>
    <?php
   if($alert){
   
     echo '<div class="error" id="error">
                    <h2 style="color:red;">'.$error.'</h2>
   </div>' ; 

} 

   if($success){
   
     echo '<div class="error" id="error">
                    <h2 style="color:green;">'.$error.'</h2>
   </div>' ; 

} 

   if($success){
   
     echo '<div class="error" id="error">
                    <h2 style="color:green;">'.$error.'</h2>
   </div>' ; 

} 

//    elseif($login){
//     echo '<div class="error" id="error">
//                     <h2 style="color:red;">'.$showerr.'</h2>
//    </div>' ; 
//    }



   ?>
    <div id="btns" class="btn1">
        <div class="modal-cotent">
            <div class="form-box">
                <div class="btn-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" id="btn-s" class="toggle-btn" onclick="register()">Sign up</button>
                </div>

                <form action="./db/login.php" method="post" class="input-group" id="login">
                    <input type="email" class="input-field" placeholder="Email" name="lemail" required>
                    <input type="password" class="input-field" placeholder="password" name="lpassword" required style="margin-bottom:20px;">
                    <a href="forgotpass.php" class="link">forgot password ?</a>
                    <div class="btnmodalgrid"><button type="submit" name="loginbtn" class="submit-btn">Login</button>
                    </div>
                </form>


                <form action="sign.php" method="post" class="input-group" id="register">
                    <input type="email" class="input-field" placeholder="Email" name="remail" required>
                    <input type="password" class="input-field" placeholder="Password" name="rpassword" required>
                    <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" required>
                    <div class="btnmodalgrid"><button type="submit" class="submit-btn" name="registerbtn"
                            id="rgbtn">Sign up</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

    <script src="headfoot/script.js"></script>
    <?php
        include("headfoot/footer.php");

   
    if($alert || $success){
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
