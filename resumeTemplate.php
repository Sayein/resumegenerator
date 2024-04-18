<?php
session_start();
if(isset($_POST['tmp'])){
    $template=$_POST['tmp'];
    $_SESSION['tmp']=$template;

    header("Location: Editor.php");

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Template</title>
    <script src="https://kit.fontawesome.com/5e725f22df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resumeTemplate.css">
</head>

<body>
    <!-- navbar -->
    <?php
       include("headfoot/navbar.php");
    ?>
    <!-- content -->
<?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

   echo '
   <h1 class="rth">Select a template that fits you.</h1>
   <div class="templatesec">

       <div class="tempgrid">
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/resume1.png" alt="resume1" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="resumeTemplate.php" method="post">
                           <button type="submit" name="tmp" value="1">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/resume2.png" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="resumeTemplate.php" method="post">
                           <button type="submit" name="tmp" value="2">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/temp3.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="resumeTemplate.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/resume1.png" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <!-----<div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>
           <div class="tempcontainer">
               <img class="tempimg" src="images/resumeTemplateimg/simpletemp1.jpg" alt="" />
               <div class="overlay">
                   <div class="ctext">
                       <form action="Editor.php" method="post">
                           <button type="submit" name="tmp" value="3">
                               Use This Template
                           </button>
                       </form>
                   </div>
               </div>
           </div>----->
       </div>
   </div>';

}
else{
 
 echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
        <div>
            <h1 style="text-align:center;">Please Login To Use Templates.</h1>
            <div class="btngrid" id="mbtn"><a href="sign.php" class="herobtn">
           <!---- <button type="submit" class="herobtn">Login in</button>  --->
            Login in
            </a></div>
        </div> 
      </div>';

}
?>
    <!-- Templates Section -->

    


    <!-- footer -->
    <?php
        include("headfoot/footer.php");
    ?>
    <script src="headfoot/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>