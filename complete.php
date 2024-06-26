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
                $languages = explode(',', $language);

                $schoolname = $row['schoolname'];
                $schoolnames = explode(',', $schoolname);

                $schoollocation = $row['schoollocation'];
                $schoollocations = explode(',', $schoollocation);

                $degree = $row['degree'];
                $degrees = explode(',', $degree);

                $year = $row['year'];
                $years = explode(',', $year);

                $fieldofstudy = $row['fieldofstudy'];
                $fieldofstudys = explode(',', $fieldofstudy);
                
                $jobtitle = $row['jobtitle'];
                $jobtitles = explode(',', $jobtitle);

                $employer = $row['employer'];
                $employers = explode(',', $employer);

                $startyear = $row['startyear'];
                $startyears = explode(',', $startyear);

                $endyear = $row['endyear'];
                $endyears = explode(',', $endyear);

                $jobsummary = $row['jobsummary'];
                $jobsummarys = explode(',', $jobsummary);

                $skill = $row['skill'];
                $skills = explode(',', $skill);

                $skillperncentage = $row['skillperncentage'];
                $skillperncentages = explode(',', $skillperncentage);

                $hobby = $row['hobbies'];
                $hobbys = explode(',', $hobby);

                $link = $row['link'];
                $links = explode(',', $link);
             
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
 
    // dynamic language data insertion
    let languagesArray=<?php echo json_encode($languages); ?>;
    document.querySelectorAll('.dummytext').forEach(element => element.remove());
    document.querySelectorAll('.cdlang1').forEach(element => element.remove());
    for(let i=0; i<languagesArray.length; i++){
            // let newtemplatelanguagesnode = `<li><span class='cdlang1 text' id='dlang'>Hindi</span></li>`;
            let newtemplatelanguagesnode = `<li><span class='cdlang1 text' id='dlang'>${languagesArray[i]}</span></li>`;
            let templatelanguages = document.getElementById('templatelanguages');
            templatelanguages.insertAdjacentHTML('beforeend', newtemplatelanguagesnode);
        }


    // dynamic education data insertion    
    let schoolnamesArray=<?php echo json_encode($schoolnames); ?>;
    document.querySelectorAll('.dummyeducationtext').forEach(element => element.remove());
    document.querySelectorAll('#templateducation li').forEach(element => element.remove());
    for(let i=0; i<schoolnamesArray.length; i++){
    let newtemplateducationode = `
            <li class="newtemplateducationcreatednode">
                <h5 class="cdyear1" id="sclyr">2010-2015</h5>
                <h4 class="cddegree1" id="degree1">Master Degree</h4>
                <h4 class="cdfos1" id="fostdy">something</h4>
                <h4 class="cdsclname1" id="scln">${schoolnamesArray[i]}e</h4>
                <h4 class="cdsclloc1" id="sclloc">france</h4>
            </li>
    `;
    let templateducation = document.getElementById('templateducation');
    templateducation.insertAdjacentHTML('beforeend', newtemplateducationode);      
    }

    // for school location
    let schoolLocationsArray=<?php echo json_encode($schoollocations); ?>;
    let displaySchoolLocationText = document.querySelectorAll('#sclloc');
    for(let i=0; i<schoolLocationsArray.length; i++){
        displaySchoolLocationText[i].textContent = schoolLocationsArray[i];
    }

    // for degree
    let degreesArray=<?php echo json_encode($degrees); ?>;
    let displayDegreeText = document.querySelectorAll('#degree1');
    for(let i=0; i<degreesArray.length; i++){
        displayDegreeText[i].textContent = degreesArray[i];
    }

    // for year
    let yearsArray=<?php echo json_encode($years); ?>;
    let displayDegreeYearsText = document.querySelectorAll('#sclyr');
    for(let i=0; i<yearsArray.length; i++){
        displayDegreeYearsText[i].textContent = yearsArray[i];
    }

    // for field of study
    let fieldofstudysArray=<?php echo json_encode($fieldofstudys); ?>;
    let displayFieldOfStudyText = document.querySelectorAll('#fostdy');
    for(let i=0; i<fieldofstudysArray.length; i++){
        displayFieldOfStudyText[i].textContent = fieldofstudysArray[i];
    }


    // dynamic experience data insertion
    let jobtitlesArray=<?php echo json_encode($jobtitles); ?>;
    document.querySelectorAll('.dummyexperincetext').forEach(element => element.remove());
    document.querySelectorAll('.box').forEach(element => element.remove());
    for(let i=0; i<jobtitlesArray.length; i++){
        let newtemplatexperiencenode = `
                    <div class="box newtemplatexperiencecreatednode">
                        <div class="yearcompany">
                            <h5><span id="strtyr" class="cdstrtyear1">2019 </span> - <span id="endyr" class="cdendyear1"> 2020</span></h5>
                            <h5 id="cpn" class="cdcnp1">Company Name</h5>
                        </div>
                        <div class="text">
                            <h4 id="jbt" class="cdjbt1">${jobtitlesArray[i]}</h4>
                            <p id="jbsmry"  class="cdjbsmry1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut asperiores
                                eum,
                                quibusdam corporis atque facere minus omnis non. Aliquam, itaque!</p>
                        </div>
                    </div>
            `;
            let templatexperience = document.getElementById('templatexperience');
            templatexperience.insertAdjacentHTML('beforeend', newtemplatexperiencenode);  
    }

    // for employers/ company name
    let employersArray=<?php echo json_encode($employers); ?>;
    let displayEmployersText = document.querySelectorAll('#cpn');
    for(let i=0; i<employersArray.length; i++){
        displayEmployersText[i].textContent = employersArray[i];
    }

    // for start date
    let startyearsArray=<?php echo json_encode($startyears); ?>;
    let displayStartYearText = document.querySelectorAll('#strtyr');
    for(let i=0; i<startyearsArray.length; i++){
        displayStartYearText[i].textContent = startyearsArray[i];
    }

    // for end date
    let endyearsArray=<?php echo json_encode($endyears); ?>;
    let displayEndYearText = document.querySelectorAll('#endyr');
    for(let i=0; i<endyearsArray.length; i++){
        displayEndYearText[i].textContent = endyearsArray[i];
    }

    // for summary of job
    let jobsummarysArray=<?php echo json_encode($jobsummarys); ?>;
    let displayJobSumaryText = document.querySelectorAll('#jbsmry');
    for(let i=0; i<jobsummarysArray.length; i++){
        displayJobSumaryText[i].textContent = jobsummarysArray[i];
    }

    // dynamic skill data insertion
    let skillsArray=<?php echo json_encode($skills); ?>;
    document.querySelectorAll('.dummyskilltext').forEach(element => element.remove());
    // document.querySelectorAll('.box').forEach(element => element.remove());
    for(let i=0; i<skillsArray.length; i++){
        let newtemplateskillnode = `
                    <div class="box newtemplateskillcreatednode">
                            <h4 id="skls" class="cdskl1">${skillsArray[i]}</h4>
                            <div class="percent">
                                <div id="sklprtg" class="cdsklp1"></div>
                            </div>
                    </div>
            `;
            let templateskill = document.getElementById('templateskill');
            templateskill.insertAdjacentHTML('beforeend', newtemplateskillnode);
    }

    // for summary of job
    let skillperncentagesArray=<?php echo json_encode($skillperncentages); ?>;
    let displaySkillPercentageText = document.querySelectorAll('#sklprtg');
    for(let i=0; i<skillperncentagesArray.length; i++){
        displaySkillPercentageText[i].style.width = skillperncentagesArray[i]+'%';
    }


    // for dynamic links data insertion
    let linksArray=<?php echo json_encode($links); ?>;
    document.querySelectorAll('.dummylinkstext').forEach(element => element.remove());
    document.querySelectorAll('.cdlnk1').forEach(element => element.remove());
    for(let i=0; i<linksArray.length; i++){
        let newtemplatelinksnode = `<li id="lnk" class="cdlnk1">${linksArray[i]}</li>`;
            let templatelinks = document.getElementById('templatelinks');
            templatelinks.insertAdjacentHTML('beforeend', newtemplatelinksnode);
    }


    // for dynamic hobby data insertion
    let hobbysArray=<?php echo json_encode($hobbys); ?>;
    document.querySelectorAll('.dummyhobbytext').forEach(element => element.remove());
    document.querySelectorAll('.cdhob1').forEach(element => element.remove());
    for(let i=0; i<hobbysArray.length; i++){
        let newtemplatehobbynode = `<li id="hob" class="cdhob1">${hobbysArray[i]}</li>`;
                let templatehobby = document.getElementById('templatehobby');
                templatehobby.insertAdjacentHTML('beforeend', newtemplatehobbynode);
    }


    <?php echo"
    function adddata() {
        
        document.getElementById('dfname').innerHTML =  '$fname';

        document.getElementById('dlname').innerHTML = '$lname';

        document.getElementById('cont1').innerHTML = '$phn';

        document.getElementById('cont2').innerHTML = '$eml';

        document.getElementById('cont3').innerHTML = '$city';

        document.getElementById('cont4').innerHTML = '$state';

        document.getElementById('cont5').innerHTML = '$country';

        document.getElementById('profsumry').innerHTML = '$profile';

        // document.getElementById('scln').innerHTML = '$schoolname';

        // document.getElementById('sclloc').innerHTML = '$schoollocation';

        // document.getElementById('degree').innerHTML = '$degree';

        // document.getElementById('sclyr').innerHTML = '$year';

        // document.getElementById('fostdy').innerHTML = '$fieldofstudy';

        // document.getElementById('jbt').innerHTML = '$jobtitle';

        // document.getElementById('cpn').innerHTML = '$employer';

        // document.getElementById('strtyr').innerHTML = '$startyear';

        // document.getElementById('endyr').innerHTML = '$endyear';

        // document.getElementById('jbsmry').innerHTML = '$jobsummary';

        // document.getElementById('skls').innerHTML = '$skill';

        // document.getElementById('sklprtg').innerHTML = '$skillperncentage';
        // let percentage = document.getElementById('sklprtg');
        // width = '$skillperncentage' + '%';
        // percentage.style.width = width;



        // document.getElementById('hob').innerHTML = '$hobby';

        // document.getElementById('lnk').innerHTML = '$link';

    }";

    ?>
        
    //    for(let i=0; i<'$languages'.length; i++){
    //        console.log('heelo');
    //    }

        // document.getElementById('dlang').innerHTML = '$language';
    </script>
</body>

</html>