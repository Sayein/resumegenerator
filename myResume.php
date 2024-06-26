<?php
session_start();
if(isset($_POST['edit'])){
    $edittemplate=$_POST['edit'];
    $_SESSION['edittemplate']=$edittemplate;

    header("Location: Editor.php?edit");
}

if(isset($_POST['del'])){
    include "db/config.php";
    $templateid=$_POST['del'];
    $sql="DELETE FROM crbpdata WHERE templateid = '$templateid'";
    $result=mysqli_query($conn,$sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Resume</title>
    <script src="https://kit.fontawesome.com/5e725f22df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="allresumetemplates.css">
    <style>
    .content {
        width: 100%;
    }

@media (max-width:500px) {
        #dfname,
        #dlname,
        #cont1,
        #cont2,
        #cont3,
        #cont4,
        #cont5,
        #sclyr,
        #degree,
        #fostdy,
        #scln,
        #sclloc,
        #skls,
        #lnk,
        #dlang{
            width:70px;
            display: block;
            overflow-wrap: break-word;
        }

        #hob{
            width: 54px;
            display: block;
            overflow-wrap: break-word;
        }

        #profsumry,#cpn,#jbt,#jbsmry{
            width: 309px;
            display: block;
            overflow-wrap: break-word;
        }
}

    /*css for unautorized users sign in button*/

    .btngrid {
        display: grid;
        width: 100%;
        justify-content: center;
        padding-top: 40px;
    }

    .herobtn{
        font-size: 15px;
        font-weight: bolder;
        letter-spacing: 1px;
        padding:12px 50px !important;
    }

    .btngrid a {
        text-decoration: none;

    }

    .tempgrid {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(2, 1fr);
        place-items: center;
        justify-content: center;
        grid-gap: 70px;
        /* padding: 80px 10px 200px 10px; */
        padding: 80px 20px 80px 20px;
    }

    .tempcontainer {
        position: relative;
        width: 519px;
        /* height: 934px; */
        border: 2px solid gray;
        overflow: hidden;
    }

    .overlay {
        opacity: 0;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        transition: 0.5s all ease-in-out;
    }

    .tempcontainer:hover .overlay {
        opacity: 1;
    }

    .ctext {
        display: flex;
        width: 100%;
        justify-content: space-evenly;
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: white;
    }

    .ctext button {
        /* padding: 9px 20px; */
        padding: 9px 10px;
        cursor: pointer;
        outline: none;
        border: none;
        background-color: white;
    }

    .ctext button:hover {
        /* background-color: #3586ff; */
        /* background-color: rgba(0,0,0,0.1);
        border:1px solid black; */
        background-color: lightgray;
        /* border:1px solid black;   border for hover effect is shifting the layout*/
        /* border:1px solid gray; */
        color:white;
        border-radius: 10px;


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

    @media (max-width:370px) {
        .tempcontainer {
            transform: scale(0.6);
        }


    }

    @media (max-width:330px) {
        .tempcontainer {
            transform: scale(0.5);
        }


    }


    @media (max-width:1350px) {
        .tempgrid {
            grid-template-columns: repeat(2, 1fr);

        }
    }

    @media (max-width:1150px) {
        .tempgrid {
            grid-template-columns: repeat(1, 1fr);

        }
    }

    /* css for template  */
    </style>
</head>

<body>
     <!-- navbar -->
     <?php
       include("headfoot/navbar.php");
    ?>
    <!-- content -->
    <div class="content">
      <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        include "db/config.php";

       
        $userid=$_SESSION['user_id'];
        $sql="SELECT templateno,templateid FROM crbpdata WHERE user_id = '$userid'";
        $result=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0){
            echo ' <h1 style="text-align:center;">My Resumes</h1>
            <div class="tempgrid">';
             while($row=mysqli_fetch_assoc($result)){
                $template=$row['templateno'];
                $templateid = $row['templateid'];

                if($_SESSION['user_id']==$userid){

                     echo '
                            <div class="tempcontainer" id="frame'.$templateid.'">
                                <div class="templatediv">';
                                    include "templates/template".$template.".php";
                                    echo '
                                </div>
                                 <!---<img class="tempimg" src="images/resumeTemplateimg/resume'.$template.'.png" alt="resume1" />--->
                                <div class="overlay">
                                    <div class="ctext">
                                    
                                    <form action="myResume.php" method="post">
                                    <button name="edit" value="'.$templateid.'"><div class="editwalabtn"> <img src="images/icons/edit.png" alt="Edit" width="30px" height="30px"> </div></button>
                                    </form>

                                    <button id="dwnldpdf'.$templateid.'" class="downloadButton'.$template.' downloadbtncount" data-templateno="'.$template.'"><div class="downloadwalabtn"> <img src="images/icons/download.svg" alt="Download" width="30px" height="30px"> </div></button>  
                                    
                                    <form action="myResume.php" method="post">
                                    <button name="del" value="'.$templateid.'" onclick="deletebtn"><div class="deletewalabtn"> <img src="images/icons/delete.png" alt="Delete" width="30px" height="30px"> </div></button>
                                    </form>
                                   
                                    </div>
                                </div>
                            </div>
                                ';        
                        }  
                    }           
                } 
                else{
                    echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
                            <div>     
                                <h1 style="text-align:center; max-width:700px; padding:0 20px 0 20px;">You have no resumes yet please create your resume.</h1>
                                <div class="btngrid" id="mbtn"><a href="resumeTemplate.php" class="herobtn">Create your resume</a></div>
                            </div>
                        </div>';
                    }  
                        
                
                
                echo '</div>

        </div>';        
    
    
       
        //  include "db/config.php";
         $sql = "SELECT * FROM crbpdata WHERE user_id = '$userid' ORDER BY templateno";
         $result = mysqli_query($conn, $sql);
         
         //  $data = array();
         
         if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_assoc($result)){

                $templateno = $row['templateno'];
                $templateid = $row['templateid'];

                $fname = $row['fname'];
                $lname = $row['lname'];
                $phonenumber = $row['phonenumber'];
                $email = $row['email'];
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
                $hobbies = explode(',', $hobby);

                $link = $row['link'];
                $links = explode(',', $link);
                    


                 $data[$templateno][] =array(

                    'fname' => $fname,
                    'lname' => $lname,
                    'phonenumber' => $phonenumber,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'profile' => $profile,
                    // 'language' => $language,
                    'language' => $languages,
                    // 'schoolname' => $schoolname,
                    'schoolname' => $schoolnames,
                    // 'schoollocation' => $schoollocation,
                    'schoollocation' => $schoollocations,
                    // 'degree' => $degree,
                    'degree' => $degrees,
                    // 'year' => $year,
                    'year' => $years,
                    // 'fieldofstudy' => $fieldofstudy,
                    'fieldofstudy' => $fieldofstudys,
                    // 'jobtitle' => $jobtitle,
                    'jobtitle' => $jobtitles,
                    // 'employer' => $employer,
                    'employer' => $employers,
                    // 'startyear' => $startyear,
                    'startyear' => $startyears,
                    // 'endyear' => $endyear,
                    'endyear' => $endyears,
                    // 'jobsummary' => $jobsummary,
                    'jobsummary' => $jobsummarys,
                    // 'skill' => $skill,
                    'skill' => $skills,
                    // 'skillperncentage' => $skillperncentage,
                    'skillperncentage' => $skillperncentages,
                    // 'hobby' => $hobby,
                    'hobby' => $hobbies,                    
                    // 'link' => $link
                    'link' => $links
                ); 
             
                
                 
                 $dataid[] = $templateid; 
             }


             echo "
             <script>
              let dwnldpdf=document.getElementById('dwnldpdf');
              const templateBtns = document.querySelectorAll('.template-btn');
             </script>
             ";
             foreach($data as $templateno => $details) { 
                

                 $encfname=json_encode($details);
 
                //  echo '<pre>';
                //  echo $encfname;

 
                 if($_SESSION['user_id'] == $userid){
 
                     echo "
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js'
                        integrity='sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=='
                        crossorigin='anonymous' referrerpolicy='no-referrer' defer></script>
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js'
                        integrity='sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=='
                        crossorigin='anonymous' referrerpolicy='no-referrer' defer></script>
                        
                        <script>
                            function adddata() {
                                let details =JSON.parse('$encfname');
                                let dfname = document.querySelectorAll('.cdfname$templateno');
                                let dlname = document.querySelectorAll('.cdlname$templateno');
                                let dphn = document.querySelectorAll('.cdphn$templateno');
                                let deml = document.querySelectorAll('.cdeml$templateno');
                                let dcity = document.querySelectorAll('.cdcity$templateno');
                                let dstate = document.querySelectorAll('.cdstate$templateno');
                                let dcountry = document.querySelectorAll('.cdcountry$templateno');
                            
                                let dyear = document.querySelectorAll('.cdyear$templateno');
                                let ddegree = document.querySelectorAll('.cddegree$templateno');
                                let dfos = document.querySelectorAll('.cdfos$templateno');
                                let dsclname = document.querySelectorAll('.cdsclname$templateno');
                                let dsclloc = document.querySelectorAll('.cdsclloc$templateno');
                                
                                let dprofile = document.querySelectorAll('.cdprofile$templateno');
                                let dstrtyear = document.querySelectorAll('.cdstrtyear$templateno');
                                let dendyear = document.querySelectorAll('.cdendyear$templateno');
                                let dcompanyname = document.querySelectorAll('.cdcnp$templateno');
                                let djobtitle = document.querySelectorAll('.cdjbt$templateno');
                                let djobsummary = document.querySelectorAll('.cdjbsmry$templateno');

                                let dskill = document.querySelectorAll('.cdskl$templateno');
                                let dskillpercentage = document.querySelectorAll('.cdsklp$templateno');
                                let dlink = document.querySelectorAll('.cdlnk$templateno');
                                let dhobby = document.querySelectorAll('.cdhob$templateno');
                                // let dlang = document.querySelectorAll('.cdlang$templateno');


                               // creation add data insertion of langugae section.
                                let templateLanguageContainer = document.querySelectorAll(`#templatelanguages`); 
                                templateLanguageContainer.forEach((e, i) => {
                                        e.setAttribute('class', `languagecount\${i+1}`);    
                                });

                                details.forEach((template, index) => {
                                    let templateLanguageContainer = document.querySelector(`.languagecount\${index + 1}`);

                                    if (templateLanguageContainer) {
                                        // Clear previous language fields
                                        templateLanguageContainer.innerHTML = '';

                                        template.language.forEach(lang => {
                                            let newLanguageNode = `<li><span class='cdlang1 text' id='dlang'>\${lang}</span></li>`;
                                            templateLanguageContainer.insertAdjacentHTML('beforeend', newLanguageNode);
                                        });
                                    } 
                                    else {
                                        console.error(`Element with id languagecount\${index + 1} not found`);
                                    }
                                });


                                // creation add data insertion of hobby section.
                                let templateHobbyContainer = document.querySelectorAll(`#templatehobby`); 
                                templateHobbyContainer.forEach((e, i) => {
                                        e.setAttribute('class', `hobbycount\${i+1}`);    
                                });

                                details.forEach((template, index) => {
                                    let templateHobbyContainer = document.querySelector(`.hobbycount\${index + 1}`);

                                    if (templateHobbyContainer) {
                                        // Clear previous language fields
                                        templateHobbyContainer.innerHTML = '';

                                        template.hobby.forEach(hobby => {
                                            let newtemplatehobbynode = `<li id='hob' class='cdhob1'>\${hobby}</li>`;
                                            templateHobbyContainer.insertAdjacentHTML('beforeend', newtemplatehobbynode);
                                        });
                                    } 
                                    else {
                                        console.error(`Element with id hobbycount\${index + 1} not found`);
                                    }
                                });


                                // creation add data insertion of links section.
                                let templateLinkContainer = document.querySelectorAll(`#templatelinks`); 
                                templateLinkContainer.forEach((e, i) => {
                                        e.setAttribute('class', `linkcount\${i+1}`);    
                                });

                                details.forEach((template, index) => {
                                    let templateLinkContainer = document.querySelector(`.linkcount\${index + 1}`);

                                    if (templateLinkContainer) {
                                        // Clear previous language fields
                                        templateLinkContainer.innerHTML = '';

                                        template.link.forEach(links => {
                                            let newtemplatelinksnode = `<li id='lnk' class='cdlnk1'>\${links}</li>`;
                                            templateLinkContainer.insertAdjacentHTML('beforeend', newtemplatelinksnode);
                                        });
                                    } 
                                    else {
                                        console.error(`Element with id linkcount\${index + 1} not found`);
                                    }
                                });


                                // creation add data insertion of skills section.
                                document.querySelectorAll('.dummyskilltext').forEach(e => e.remove());
                                let templateSkillContainer = document.querySelectorAll(`#templateskillcontainer`); 
                                templateSkillContainer.forEach((e, i) => {
                                        e.setAttribute('class', `skillcount\${i+1}`);    
                                });

                                details.forEach((template, index) => {
                                    let templateSkillContainer = document.querySelector(`.skillcount\${index + 1}`);
                                    let skillPercentageValues=template.skillperncentage;

                                    if (templateSkillContainer) {
                                        // Clear previous language fields
                                        templateSkillContainer.innerHTML = '';

                                        template.skill.forEach((skills, skillIndex) => {
                                            let newtemplateskillnode = `
                                                        <div class='box'>
                                                            <h4 id='skls' class='cdskl1'>\${skills}</h4>
                                                            <div class='percent'>
                                                                <div id='sklprtg' class='cdsklp1' style='width:\${skillPercentageValues[skillIndex]}%;'></div>
                                                            </div>
                                                        </div>
                                            `;
                                            templateSkillContainer.insertAdjacentHTML('beforeend', newtemplateskillnode);
                                        });
                                    } 
                                    else {
                                        console.error(`Element with id skillcount\${index + 1} not found`);
                                    }
                                });


                                // creation add data insertion of experience section.
                                document.querySelectorAll('.dummyexperincetext').forEach(e => e.remove());
                                let templateExperienceContainer = document.querySelectorAll(`#templatexperiencecontainer`); 
                                templateExperienceContainer.forEach((e, i) => {
                                        e.setAttribute('class', `expirencecount\${i+1}`);    
                                });

                                details.forEach((template, index) => {
                                    let templateExperienceContainer = document.querySelector(`.expirencecount\${index + 1}`);
                                    let endYearValues=template.endyear;
                                    let employerValues=template.employer;
                                    let jobTitleValues=template.jobtitle;
                                    let jobSummryValues=template.jobsummary;
                                     
                                    if (templateExperienceContainer) {
                                        // Clear previous language fields
                                        templateExperienceContainer.innerHTML = '';

                                        template.startyear.forEach((startyear, experienceindex) => {
                                            let newtemplatexperiencenode = `
                                                    <div class='box'>
                                                        <div class='yearcompany'>
                                                            <h5><span id='strtyr' class='cdstrtyear1'>\${startyear} </span> - <span id='endyr' class='cdendyear1'>\${endYearValues[experienceindex]}</span></h5>
                                                            <h5 id='cpn' class='cdcnp1'>\${employerValues[experienceindex]}</h5>
                                                        </div>
                                                        <div class='text'>
                                                            <h4 id='jbt' class='cdjbt1'>\${jobTitleValues[experienceindex]}</h4>
                                                            <p id='jbsmry'  class='cdjbsmry1'>\${jobSummryValues[experienceindex]}</p>
                                                        </div>
                                                   </div>
                                            `;
                                            templateExperienceContainer.insertAdjacentHTML('beforeend', newtemplatexperiencenode);
                                        });
                                    } 
                                    else {
                                        console.error(`Element with id expirencecount\${index + 1} not found`);
                                    }
                                });


                                // creation add data insertion of education section.
                                document.querySelectorAll('.dummyeducationtext').forEach(e => e.remove());
                                let templateEducationContainer = document.querySelectorAll(`#templateducation`); 
                                templateEducationContainer.forEach((e, i) => {
                                        e.setAttribute('class', `educationcount\${i+1}`);    
                                });

                                details.forEach((template, index) => {
                                    let templateEducationContainer = document.querySelector(`.educationcount\${index + 1}`);
                                    let schoolLocationValues=template.schoollocation;
                                    let fieldOfStudyValues=template.fieldofstudy;
                                    let degreeValues=template.degree;
                                    let yearValues=template.year;
                                     
                                    if (templateEducationContainer) {
                                        // Clear previous language fields
                                        templateEducationContainer.innerHTML = '';

                                        template.schoolname.forEach((schoolname, educationindex) => {
                                               let newtemplateducationode = `
                                                        <li>
                                                            <h5 class='cdyear1' id='sclyr'>\${yearValues[educationindex]}</h5>
                                                            <h4 class='cddegree1' id='degree1'>\${degreeValues[educationindex]}</h4>
                                                            <h4 class='cdfos1' id='fostdy'>\${fieldOfStudyValues[educationindex]}</h4>
                                                            <h4 class='cdsclname1' id='scln'>\${schoolname}</h4>
                                                            <h4 class='cdsclloc1' id='sclloc'>\${schoolLocationValues[educationindex]}</h4>
                                                        </li>
                                                `;
                                                templateEducationContainer.insertAdjacentHTML('beforeend', newtemplateducationode);
                                        });
                                    } 
                                    else {
                                        console.error(`Element with id educationcount\${index + 1} not found`);
                                    }
                                });
                                   
                            



                                for (var i = 0; i < details.length; i++) { 
                                
                                        dfname[i].innerHTML = details[i]['fname'];                
                                        dlname[i].innerHTML = details[i]['lname'];
                                        dphn[i].innerHTML = details[i]['phonenumber'];
                                        deml[i].innerHTML = details[i]['email'];
                                        dcity[i].innerHTML = details[i]['city'];
                                        dstate[i].innerHTML = details[i]['state'];
                                        dcountry[i].innerHTML = details[i]['country'];

                                        // dyear[i].innerHTML = details[i]['year'];
                                        // ddegree[i].innerHTML = details[i]['degree'];
                                        // dfos[i].innerHTML = details[i]['fieldofstudy'];
                                        // dsclname[i].innerHTML = details[i]['schoolname'];
                                        // dsclloc[i].innerHTML = details[i]['schoollocation'];

                                        dprofile[i].innerHTML = details[i]['profile'];
                                        // dstrtyear[i].innerHTML = details[i]['startyear'];
                                        // dendyear[i].innerHTML = details[i]['endyear'];
                                        // dcompanyname[i].innerHTML = details[i]['employer'];
                                        // djobtitle[i].innerHTML = details[i]['jobtitle'];
                                        // djobsummary [i].innerHTML = details[i]['jobsummary'];                    
                                }
  
                        }
                        adddata();
                        </script>
                    ";
                    }
                
                }

              
                    $encfname=json_encode($templateid);
            
                    if($_SESSION['user_id'] == $userid){
            
                      echo " 
                      <script>
                       let downloadBtnCount=document.querySelectorAll('.downloadbtncount');
                       downloadBtnCount.forEach(
                          dbutton =>{
                               dbutton.addEventListener('click', function(event) {

                                        clickedButtonId = this.id;
                                        let templateid=clickedButtonId.replace('dwnldpdf', '');

                                        let fnames =JSON.parse('$encfname');
                                        let frame = document.getElementById(`frame\${templateid}`);                       
                                        html2canvas(frame, {
                                            scale: 3
                                        }).then((canvas) => {
                                            let imgData = canvas.toDataURL('image/jpeg', 1.0);
                                            let pdf = new jsPDF('p', 'px', [canvas.width * 0.99, canvas.height * 0.99]);
                                            let filename = 'resume.pdf';
                                            pdf.addImage(imgData, 'JPEG', 0, 0, canvas.width, canvas.height);
                                            pdf.save(filename);
                                
                                        });
                                
                                    });
                            }
                       ); 
            

                    </script>";   
                            
            }
        
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

     <!-- navbar -->
     <?php
       include("headfoot/footer.php");
    ?>
<script>

    
</script>
<script src="headfoot/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>