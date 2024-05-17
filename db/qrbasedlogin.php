<?php
   session_start();
   require('config.php');

if (isset($_GET['userid'])) {
    $userid=$_GET['userid'];
    $template=$_GET['tmp'];
    $templateid=$_GET['tempid'];
    $sql="SELECT * FROM `crbpusers` WHERE `user_id` = '$userid'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
     if($num==1){
        $token=$_GET['token'];
        echo $userid;
        while ($row=mysqli_fetch_assoc($result)) {
            if ($userid==$row['user_id'] && $token==$row['token']) {
                $_SESSION['user_id']=$userid;
                $_SESSION['token']=$token;  
                $_SESSION['tmp']=$template;  
                $_SESSION['tempid']=$templateid;  
                $_SESSION['loggedin']=true;
                header('Location: ../complete.php?pdf=download');
            }
            else{
                header("location: ../sign.php?false3=true");
                // invalid user
            }
        }
    }
    else{
        header("location: ../sign.php?false2=true");
        // no user exists
        echo'error';
    }
}
else{
    header("location: ../sign.php");
    // cannot access this page
}


?>