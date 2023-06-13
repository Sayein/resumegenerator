<?php
$error1="";
$error2="";
if(isset($_POST['registerbtn'])){
  include('./db/config.php');

  $email=$_POST['remail'];
  $pass=$_POST['rpassword'];
  $cpass=$_POST['cpassword'];
  $exist=false;
  if(($pass==$cpass)){
    //  $sql="insert into `crbpusers` (`email`,`password`, `dt`) values ('$email','$pass',current_timestamp())";
    //  $result=mysqli_query($conn,$sql);
  
    //  if($result){
    //   $error=true;
    //  }
   }
   $_SESSION['loggedIn'] = true;

}

echo '
    <div id="btns" class="btn1">
    <div class="modal-cotent">
        <div class="form-box">
            <span class="close">&times;</span>
            <div class="btn-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" id="btn-s" class="toggle-btn" onclick="register()">Sign up</button>
            </div>
           
            <form  method="post" class="input-group" id="login">
                <input type="text" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="password" name="password" required>
                <a href="" class="link">forget password ?</a>
                <div class="btnmodalgrid"><button type="submit" name="loginbtn" class="submit-btn">Login</button></div>
            </form>

         
            <div style="width:100%; text-align:center; display:none;" id="register-error"><h2 style="color:green;"></h2></div>
            <form  method="post" class="input-group" id="register">
                <input type="text" class="input-field" placeholder="Email" name="remail" required>
                <input type="text" class="input-field" placeholder="Password" name="rpassword" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" required>
                <div class="btnmodalgrid"><button type="submit" class="submit-btn" name="registerbtn" id="rgbtn">Sign up</button>
                </div>
            </form>
        </div>
    </div>
    </div>';


?>