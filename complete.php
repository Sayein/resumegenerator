<?php
   session_start();
   $alert=false;
   $error="";

   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
     $userid=$_SESSION['user_id'];
     $token=$_SESSION['token']; 
     
     if (isset($_SESSION['tmp'])) {
        $template = $_SESSION['tmp'];  
      }
      elseif (isset($_SESSION['tempid'])) {
        $templateid=$_SESSION['tempid'];
      }
      else{
        $alert=true;
        $error="Please select a template";
      } 
     
    }  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="allresumetemplates.css">
    <title>complete</title>
    <script src="https://kit.fontawesome.com/5e725f22df.js" crossorigin="anonymous"></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .content {
        width: 100%;
        padding:150px 20px 200px 20px;
    }


/* css to print resume */

@media print {
    body * {
        visibility:hidden;
    }

    #frame{
     width:100%; 
     height:100%; 
    }

    #frame,#frame *{
        visibility:visible;
      
    }

    .about .box .yearcompany h5{
       display: flex !important;

    }

    .strtend{
        display: flex !important;
    }

    .tmp6head h1{
        display: flex !important;
        justify-content: center;
    }

    .tmp6flex {
        display: flex !important;
    }

    .tmp6head .ctstat{
        display: flex !important;
        justify-content: space-evenly;
    }

    #dlname{
        padding-left: 7px;
    }

    .tmp6head .ctstat{
        display: grid !important;
       justify-content: center !important;
    }

    .tmp6head .ctstat p{
        display:flex !important;
    }
    

}

    /*css for unautorized users sign in button*/

    .btngrid{
        display: grid;
        width: 100%;
        justify-content: center;
        padding-top:40px;
    }

    .herobtn{
        font-size: 15px;
        font-weight: bolder;
        letter-spacing: 1px;
        padding:12px 50px !important;
    }

    .btngrid a{
        text-decoration: none;

    }

    .tempgrid {
        display: grid;
        justify-content: center;
    }

    .tempcontainer {
        position: relative;
        width: 519px;
        overflow: hidden;
    }

    #frame {
        border: 2px solid grey;
    }

    .centerdiv {
        display: grid;
        justify-content: center;
    }

    .downloadprintbtn {
        max-width: 550px;
        display: flex;
        margin-top: 100px;
        justify-content: space-between;
        gap: 50px;
    }

    .download-scan-print-bt, #downloadpdfbtn {
        padding: 10px;
        width: 192px;
        height: 50px;
        font-size: 17px;
        border: none;
        margin-top: 15px;
        border-radius: 5px;
        background-color: black;
        color: white;
        letter-spacing: 1px;
    }

    .download-scan-print-bt:hover, #downloadpdfbtn:hover{
        background-color: rgba(0, 0, 0, 0.5);
    }

    .qrimagecontainer{
        display:grid;
        place-items:center; 
    }

    #qrimage{
        padding-top:20px;
    }
    

    @media(max-width:767px){
        .qrimagecontainer{
            display:none;
        }

    }

    @media(max-width:985px) {

        .downloadprintbtn {
            display: grid;
            gap: 20px;
        }

    }

/* responsive templates */

@media (max-width:540px) {
#fname {
  font-size: 10px !important;
}

.tempcontainer {
  transform: scale(0.8);
}

}

@media (max-width:500px) {

.tempcontainer {
    transform: scale(0.7);
}

}


@media (max-width:499px){
.content {
    width: 100%;
    padding:50px 20px 300px 20px;
}   

.centerdiv {
    margin-top:-200px;
}

}


@media (max-width:370px) {
.tempcontainer {
    transform: scale(0.6);
}

.centerdiv {
    margin-top:-200px;
}


}

@media (max-width:330px) {
.tempcontainer {
    transform: scale(0.5);
}

.centerdiv {
    margin-top:-250px;
}

}

    </style>
</head>

<body onload="adddata()">

    <?php
     include('headfoot/navbar.php');
     ?>
    <!-- html for resume template and edit section -->
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        include "db/config.php";

        if (!$alert) {      
        $templateid=$_SESSION['tempid'];
        
        $base_url = 'http://192.168.0.105:80/resumegenerator/db/qrbasedlogin.php';
        $qr_data = $base_url . '?userid=' . urlencode($userid) . '&token=' . urlencode($token).'&tmp='.urlencode($template). '&tempid='.urlencode($templateid);
       
        $sql = "SELECT * FROM crbpdata WHERE templateid = '$templateid' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){

                $fname = $row['fname'];
                $lname = $row['lname'];
                $phn = $row['phonenumber'];
                $eml = $row['email'];
                $city = $row['city'];
                $state = $row['state'];
                $country = $row['country'];
                $profile = $row['profile'];
                $language = $row['language'];
                $schoolname = $row['schoolname'];
                $schoollocation = $row['schoollocation'];
                $degree = $row['degree'];
                $year = $row['year'];
                $fieldofstudy = $row['fieldofstudy'];
                $jobtitle = $row['jobtitle'];
                $employer = $row['employer'];
                $startyear = $row['startyear'];
                $endyear = $row['endyear'];
                $jobsummary = $row['jobsummary'];
                $skill = $row['skill'];
                $skillperncentage = $row['skillperncentage'];
                $hobby = $row['hobbies'];
                $link = $row['link'];

            }
        }
            
        echo '
    <div class="content">
        <div class="tempgrid">
            <div class="tempcontainer" id="frame">
               ';
                    
               $template_files = [
                '1' => 'templates/template1.php',
                '2' => 'templates/template2.php',
                '3' => 'templates/template3.php',
            ];

            if (isset($template_files[$template])) {
                include $template_files[$template];
            }               

               echo  '
            </div>
        </div>

        <!-- download and print button -->
        <div class="centerdiv">
            <div class="downloadprintbtn">
                <div class="downlodbtn">
                    <button id="downloadpdfbtn" onclick="downloadpdf()">Download PDF</button>
                </div>

                <div class="printbtn">
                    <button class="download-scan-print-bt" onclick="window.print()">Print</button>
                </div>
            </div>
            <div class="qrimagecontainer">
                <img src="" alt="" id="qrimage">
                <button class="download-scan-print-bt" onclick="generatorQR()">Scan and Download</button>
            </div>
        </div>
    </div>';
    }
    else{
        echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
                <div>
                    <h1 style="text-align:center;">Please select a Template.</h1>
                    <div class="btngrid" id="mbtn"><a href="resumeTemplate.php" class="herobtn">Resume Template</a></div>
                </div> 
              </div>';
        }
}
    else{
        echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
                    <div>
                        <h1 style="text-align:center;">Please login to view your resume.</h1>
                        <div class="btngrid" id="mbtn"><a href="sign.php" class="herobtn">Login in</a></div>
                    </div> 
                </div>';
    }
?>

    <?php
     include('headfoot/footer.php');
?>
    <script src="headfoot/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- jspsdf and html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"
        integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <script>
       
    function downloadpdf() {
        let frame = document.getElementById("frame");


        html2canvas(frame, {
            scale: 5
        }).then((canvas) => {
            let imgData = canvas.toDataURL('image/jpeg', 1.0);
            let pdf = new jsPDF('p', 'px', [canvas.width * 0.99, canvas.height * 0.99]);
            let fname = document.getElementById("dfname").innerHTML;
            let lname = document.getElementById("dlname").innerHTML;
            let filename = `${fname} ${lname}.pdf`;
            pdf.addImage(imgData, 'JPEG', 0, 0, canvas.width, canvas.height);
            pdf.save(filename);

        });
    }

    function generatorQR(){
        let qrimage=document.getElementById('qrimage');
        qrimage.src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($qr_data) ?>";
    }

    const searchParams = new URLSearchParams(window.location.search);
    if (searchParams.has('pdf')) {
        setTimeout(() => {
            downloadpdf();
        }, 1000);
    }
 

    <?php echo"
    function adddata() {
        document.getElementById('dfname').innerHTML =  '$fname';

        document.getElementById('dlname').innerHTML = '$lname';

        document.getElementById('cont1').innerHTML = '$phn';

        document.getElementById('cont2').innerHTML = '$eml';

        document.getElementById('cont3').innerHTML = '$city';

        document.getElementById('cont5').innerHTML = '$state';

        document.getElementById('profsumry').innerHTML = '$profile';

        document.getElementById('scln').innerHTML = '$schoolname';

        document.getElementById('sclloc').innerHTML = '$schoollocation';

        document.getElementById('degree').innerHTML = '$degree';

        document.getElementById('sclyr').innerHTML = '$year';

        document.getElementById('fostdy').innerHTML = '$fieldofstudy';

        document.getElementById('jbt').innerHTML = '$jobtitle';

        document.getElementById('cpn').innerHTML = '$employer';

        document.getElementById('strtyr').innerHTML = '$startyear';

        document.getElementById('endyr').innerHTML = '$endyear';

        document.getElementById('jbsmry').innerHTML = '$jobsummary';

        document.getElementById('skls').innerHTML = '$skill';

        document.getElementById('sklprtg').innerHTML = '$skillperncentage';
        let percentage = document.getElementById('sklprtg');
        width = '$skillperncentage' + '%';
        percentage.style.width = width;


        document.getElementById('hob').innerHTML = '$hobby';

        document.getElementById('lnk').innerHTML = '$link';

        document.getElementById('dlang').innerHTML = '$language';
    }";

    ?>

    </script>
</body>

</html>