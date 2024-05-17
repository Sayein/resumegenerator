<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "config.php";

    $email=$_POST["lemail"];
    $pass=$_POST["lpassword"];
  
 
     $sql="SELECT * FROM `crbpusers` WHERE `email` ='$email'";
     $result=mysqli_query($conn,$sql);
     $num=mysqli_num_rows($result);
     if($num==1){
        while($row=mysqli_fetch_assoc($result)){
          if(password_verify($pass,$row['password'])){   
            $userid=$row['user_id'];
            $token=$row['token'];
            session_start();
            $_SESSION['loggedin']=true;       
            $_SESSION['email']=$email;
            $_SESSION['user_id']=$userid;
            $_SESSION['token']=$token;
            
            header("location: ../index.php");
          }
          else{
            header("location: ../sign.php?false1=true");
        }
         
        }
       
     }
     else{
       header("location: ../sign.php?false2=true");
  }

}




?>