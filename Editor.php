<?php 
session_start(); 

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $template = $_SESSION['tmp'];  
    $userid=$_SESSION['user_id'];
  }

  $alert=false;
  $error="";
  if(isset($_POST['complete'])){
//   if($_SERVER['REQUEST_METHOD']=="POST"){
    include "db/config.php";

    $tempid=uniqid();
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phn=$_POST['phn'];
    $eml=$_POST['eml'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];

    $profile=$_POST['prfsumry'];
    $language=$_POST['lang'];

    $schoolname=$_POST['sscn'];
    $schoollocation=$_POST['sscl'];
    $degree=$_POST['dgr'];
    $year=$_POST['year'];
    $fieldofstudy=$_POST['fos'];

    $jobtitle=$_POST['jt'];
    $employer=$_POST['emplr'];
    $startyear=$_POST['strd'];
    $endyear=$_POST['endt'];
    $jobsummary=$_POST['soyj'];

    $skill=$_POST['skl'];
    $skillpercentage=$_POST['sklprntg'];
    $hobby=$_POST['hobby'];
    $link=$_POST['links'];
   
     
      $sql="INSERT INTO `crbpdata` (`user_id`, `templateno`, `templateid`, `fname`, `lname`, `phn`, `eml`, `city`, `state`, `country`, `profile`, `language`, `schoolname`, `schoollocation`, `degree`, `year`, `fieldofstudy`, `jobtitle`, `employer`, `startyear`, `endyear`, `jobsummary`, `skill`, `skillperncentage`, `hobbie`, `link`, `dt`) VALUES ('$userid','$template', '$tempid', '$fname', '$lname', '$phn', '$eml', '$city', '$state', '$country', '$profile', '$language', '$schoolname', '$schoollocation', '$degree', '$year', '$fieldofstudy', '$jobtitle', '$employer', '$startyear', '$endyear', '$jobsummary', ' $skill', ' $skillpercentage', '$hobby', '$link', current_timestamp())";
      $result=mysqli_query($conn,$sql);
     
      if($result){
          header("Location: complete.php");
      }else{
          echo "error".mysqli_error($conn);
          $alert=true;
          $error="Something went wrong";
      }
     
  }


?>

<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Editor</title>
    <script src="https://kit.fontawesome.com/5e725f22df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Editor.css">
    <link rel="stylesheet" href="allresumetemplates.css">
</head>

<body>
    <!-- navbar -->
    <?php
       include("headfoot/navbar.php");
    ?>



    <?php   

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
       echo '
       <!-- Editor -->
    <div class="main">';

            if($alert){
        
                echo '<div class="error" id="error">
                               <h2 style="color:red;">'.$error.'</h2>
              </div>' ; 
        
           } 

     echo '<!-- left -->
     <div class="left">
        <!-- personal details -->
        <form action="Editor.php" method="post">
                <div class="pi">
                    <h1 >Personal Details</h1>
                    <div class="pcentr">

                        <div class="prow">
                            <div class="pcol">
                                <label for="First name">First name</label><br>
                                <input type="text" oninput="displayfname()" name="fname" id="fname"
                                    placeholder="e.g. Ramesh">
                                <div id="error" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="Last name">Last name</label> <br>
                                <input type="text" oninput="displaylname()" name="lname" id="lname"
                                    placeholder="e.g. Mishra">
                                <div id="error1" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <div class="prow">
                            <div class="pcol">
                                <label for="Phone number">Phone number</label> <br>
                                <input type="number" oninput="displayphn()" name="phn" id="phn"
                                  max  placeholder="e.g. +91 9867982828">
                                <div id="error2" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="Email">Email</label><br>
                                <input type="text" oninput="displayeml()" name="eml" id="eml"
                                    placeholder="e.g. ramesh@gmail.com">
                                <div id="error3" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <div class="prow">
                            <div class="pcol">
                                <label for="City">City</label><br>
                                <input type="text" oninput="displaycity()" name="city" id="city"
                                    placeholder="e.g. Mumbai">
                                <div id="error4" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="State">State</label><br>
                                <input type="text" oninput="displaystate()" name="state" id="state"
                                    placeholder="e.g. Maharashtra">
                                <div id="error5" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>
                        <div class="ptxtarea">
                            <label for="Country">Country</label><br>
                            <input type="text" id="country" name="country" oninput="displaycountry()"
                                placeholder="e.g. India">
                            <div id="error6" style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>
                    </div>
                    <div class="btndiv">
                        <div class="prevnextbtn">
                            <div class="backbtn">
                                <a id="bk">Back</a>
                            </div>
                            <div class="nextbtn">
                                <a id="nxt" onclick="toprfsumry()">Next</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Professional summary  -->

                <div class="prfsumry">
                    <h1 >Profile</h1>
                    <div class="pcentr">
                        <div class="ptxtarea">
                            <textarea oninput="displaypfsumry()" name="prfsumry" id="prfsumry"
                                placeholder="e.g. Quickly learned new skills."></textarea>
                            <div id="error7" style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>
                    </div>

                    <h1 style="padding-top:80px;">Languages</h1>
                    <div class="pcentr">
                        <div class="prow addinputlang">
                                <div class="pcol" id="moveleft">
                                    <input type="text" oninput="displaylang()" name="lang" id="lang"
                                        placeholder="e.g. English">
                                    <div id="error22" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    <inyput type="hidden" class="inside">
                                    </div>
                                
                        </div>
                        <div class="pcol addlangbtn" onclick="addnewlang()" id="moveaddbtn">
                                    <div class="addboxdiv">
                                        <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                    </div>
                                </div>
                    </div>

                    <div class="prevnextbtn">
                        <div class="backbtn">
                            <a id="bk" onclick="toprslinfo()">Back</a>
                        </div>
                        <div class="nextbtn">
                            <a id="nxt" onclick="toeducation()">Next</a>
                        </div>
                    </div>
                </div>

                <!--Education -->

                <div class="ed">
                    <h1 >Education</h1>
                    <div class="pcentr">

                        <div class="prow">
                            <div class="pcol">
                                <label for="School name">School name</label><br>
                                <input type="text" oninput="displayscln()" name="sscn" id="sscn"
                                    placeholder="e.g. Saint Xevier">
                                <div id="error8" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="School location">School location</label><br>
                                <input type="text" oninput="displaysclloc()" name="sscl" id="sscl"
                                    placeholder="e.g. Maharashtra,mumbai">
                                <div id="error9" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <div class="prow">
                            <div class="pcol">
                                <label for="Degree">Degree</label> <br>
                                <input type="text" oninput="displaydegree()" name="dgr" id="dgr"
                                    placeholder="e.g. Bsc.IT ">
                                <div id="error10" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="Year">Year</label> <br>
                                <input type="text" oninput="displayyear()" name="year" id="year"
                                    placeholder="e.g. 2020-2023">
                                <div id="error11" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <div class="ptxtarea" style="padding-bottom:20px;">
                            <label for="Field of study">Field of study</label> <br>
                            <input type="text" oninput="displayfos()" name="fos" id="fos"
                                placeholder="e.g. Information Tecnology">
                            <div id="error12" style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>

                        <div class="addbox">
                            <div class="addboxdiv">
                                <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                            </div>
                        </div>
                    </div>
                    <div class="prevnextbtn">
                        <div class="backbtn">
                            <a id="bk" onclick="toprfsumry()">Back</a>
                        </div>
                        <div class="nextbtn">
                            <a id="nxt" onclick="toexperience()">Next</a>
                        </div>
                    </div>
                </div>

                <!-- Experience -->

                <div class="exp">
                    <h1 >Experience </h1>
                    <div class="pcentr">

                        <div class="prow">
                            <div class="pcol">
                                <label for="Job title">Job title</label><br>
                                <input type="text" oninput="displayjt()" name="jt" id="jt"
                                    placeholder="e.g. Software Engineer">
                                <div id="error13" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="Employer">Employer</label><br>
                                <input type="text" oninput="displaycompany()" name="emplr" id="emplr"
                                    placeholder="e.g. Google">
                                <div id="error14" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <div class="prow">
                            <div class="pcol">
                                <label for="Start date">Start year</label> <br>
                                <input type="text" oninput="displaystrtdt()" name="strd" id="strd"
                                    placeholder="e.g. 2019" maxlength="4">
                                <div id="error15" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol">
                                <label for="End date">End year</label> <br>
                                <input type="text" oninput="displayenddt()" name="endt" id="endt"
                                    placeholder="e.g. 2023"  maxlength="4">
                                <div id="error16" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <div class="ptxtarea" style="padding-bottom:20px;">
                            <label for="Summary of your job">Summary of your job</label><br>
                            <textarea oninput="displaysoyj()" id="soyj" name="soyj"
                                placeholder="e.g. Experienced PHP Developer"></textarea>
                            <div id="error17" style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>

                        <div class="addbox">
                            <div class="addboxdiv">
                                <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                            </div>
                        </div>
                    </div>
                    <div class="prevnextbtn">
                        <div class="backbtn">
                            <a id="bk" onclick="toeducation()">Back</a>
                        </div>
                        <div class="nextbtn">
                            <a id="nxt" onclick="toskl()">Next</a>
                        </div>
                    </div>
                </div>

                <!-- skill -->

                <div class="skl">
                    <h1 >Skills & Links</h1>
                    <div class="pcentr">

                        <div class="newdiv">
                            <div class="prow">
                                <div class="pcol">
                                    <label for="skill">Skill</label><br>
                                    <input type="text" oninput="displayskill()" name="skl" id="skl"
                                        placeholder="e.g. Graphic Designer">
                                    <div id="error18" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                                <div class="pcol">
                                    <label for="skill percentgae">Skill Percentage</label><br>
                                    <input type="number" oninput="displayskillp()" name="sklprntg" id="sklprntg"
                                        placeholder="e.g. 78%">
                                    <div id="error19" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                            </div>
                            <div class="addbox">
                                <div class="addboxdiv">
                                    <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                </div>
                            </div>
                        </div>

                        <div class="prow">
                            <div class="pcol" id="moveleft">
                                <label for="hobby">Hobby</label> <br>
                                <input type="text" oninput="displayhobby()" name="hobby" id="hobby"
                                    placeholder="e.g. Reading">
                                <div id="error21" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol" id="moveaddbtn">
                                <div class="addboxdiv">
                                    <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                </div>
                            </div>
                        </div>

                        <div class="prow">
                            <div class="pcol" id="moveleft">
                                <label for="links">Links</label> <br>
                                <input type="text" oninput="displaylink()" name="links" id="links"
                                    placeholder="e.g. Linkd in">
                                <div id="error20" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                            <div class="pcol" id="moveaddbtn">
                                <div class="addboxdiv">
                                    <img class="addbutton" onclick="imgclicked()" src="images/icons/addbox.png" alt="add button">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="btndiv">
                        <div class="prevnextbtn">
                            <div class="backbtn">
                                <a id="bk" onclick="toexperience()">Back</a>
                            </div>
                            <div class="nextbtn">
                                <a id="nxt" onclick="complete()">Next</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- editpage section -->

                <div class="rightbaju" style="display:none;">
                  <div class="editbar">
                         <h1 style="padding-bottom:30px;">Resume Sections</h1>
                         <div class="backpagenav">
                             <div class="edbtn"><a id="editlinks" onclick="editprslinfo()">Personal Detail</a></div>
                             <div class="edbtn"><a id="editlinks" onclick="editprofile()">Profile & Languages</a></div>
                             <div class="edbtn"><a id="editlinks" onclick="editeducation()">Education</a></div>
                             <div class="edbtn"><a id="editlinks" onclick="editexperience()">Work Experience</a></div>
                             <div class="edbtn"><a id="editlinks" onclick="editskl()">Skills & Links</a></div>
                         </div>
                    </div>
                </div>
            

        </div>

        <!-- Right -->

        <div class="right">
            <div class="imgdiv" id="frame">
                <div class="rimg">
                
                <!-- resumetemplate -->
                ';


                    if($template == "1"){
                    include 'templates/template1.php';
                    } elseif($template == "2"){
                    include 'templates/template2.php';
                    } elseif($template == "3"){
                    include 'templates/template3.php';
                    }

                

                echo '</div>
            </div>

            <!-- download and print button -->

            <div class="downloadprintbtn" style="display:none;">
                <div class="downlodbtn">
                    <button type="submit" id="downloadpdfbtn">Download PDF</button>
                </div>

                <div class="printbtn">
                    <button onclick="window.print()">Print</button>
                </div>
            </div>

            <!-----complete section --->

              <div class="complete" style="display:none;">
            <button type="submit" name="complete">Complete</button>
            </div> 
         </form> 
        </div>
    </div>
       ';

    }
    else{
        echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
                 <div>
                    <h1 style="text-align:center;">Please Login To Use Editor .</h1>
                    <div class="btngrid"><a href="sign.php"><button type="submit" class="herobtn">Login in</button></a></div>
                 </div> 
              </div>';
    }
 
?>




    <!-- footer -->
    <?php
        include("headfoot/footer.php");
    ?>

    <script src="headfoot/script.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--jspsdf and html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"
        integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <script>
    // js for displaying other sections of editor on click

    let pi = document.querySelector(".pi");
    let prfs = document.querySelector(".prfsumry");
    let ed = document.querySelector(".ed");
    let exp = document.querySelector(".exp");
    let skl = document.querySelector(".skl");
    let right = document.querySelector(".right");
    let left = document.querySelector(".left");
    let editnav = document.querySelector(".rightbaju");
    let imgdiv = document.querySelector(".imgdiv");
    // let downloadprintbtn = document.querySelector(".downloadprintbtn");
    let completebtn = document.querySelector(".complete");


    setInterval(function() {
        error.textContent = "";
        error1.textContent = "";
        error2.textContent = "";
        error3.textContent = "";
        error4.textContent = "";
        error5.textContent = "";
        error6.textContent = "";
        error7.textContent = "";
        error8.textContent = "";
        error9.textContent = "";
        error10.textContent = "";
        error11.textContent = "";
        error12.textContent = "";
        error13.textContent = "";
        error14.textContent = "";
        error15.textContent = "";
        error16.textContent = "";
        error17.textContent = "";
        error18.textContent = "";
        error19.textContent = "";
        error20.textContent = "";
        error21.textContent = "";
        error22.textContent = "";
    }, 4000);



    // code for validation of input fields


    function toprfsumry() {
        const fname = document.getElementById('fname'); //for first name
        let error = document.getElementById("error"); //for first name error 
        const lname = document.getElementById('lname'); //for last name 
        let error1 = document.getElementById("error1"); //for last name error
        const phn = document.getElementById('phn'); //for phone number
        let error2 = document.getElementById("error2"); //for phone number error
        const eml = document.getElementById('eml'); //for email
        let error3 = document.getElementById("error3"); //for email error
        const city = document.getElementById('city'); //for city
        let error4 = document.getElementById("error4"); //for city error
        const state = document.getElementById('state'); //for state
        let error5 = document.getElementById("error5"); //for state error
        const country = document.getElementById('country'); //for country
        let error6 = document.getElementById("error6"); //for country error
        let pattern2 = /^\d{10}$/;
        let emlpattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        //for fname
        // if (fname.value == "" || /^\s*$/.test(fname.value)) {
        //         error.textContent = "Please enter your first name";

        // }
        if (fname.value == "") {
            error.textContent = "Please enter your first name";

        } else if (/^\s*$/.test(fname.value)) {
            error.textContent = "Empty values are not allowed.";
        }

        // for lname
        else if (lname.value == "") {
            error1.textContent = "Please enter your last name";

        } else if (/^\s*$/.test(lname.value)) {
            error1.textContent = "Empty values are not allowed.";

        }

        // for phone no
        else if (!pattern2.test(phn.value)) {
            error2.textContent = "Please enter 10 digit phone number.";
        }


        // for email
        else if (eml.value == "") {
            error3.textContent = "Please enter your email address";

        } else if (/^\s*$/.test(eml.value)) {
            error3.textContent = "Empty values are not allowed.";

        } else if (!emlpattern.test(eml.value)) {
            error3.textContent = "Please enter a valid email address";

        }


        // for city
        else if (city.value == "") {
            error4.textContent = "Please enter your city";

        } else if (/^\s*$/.test(city.value)) {
            error4.textContent = "Empty values are not allowed.";

        }

        // for state
        else if (state.value == "") {
            error5.textContent = "Please enter your state";

        } else if (/^\s*$/.test(state.value)) {
            error5.textContent = "Empty values are not allowed.";

        }

        // for country
        else if (country.value == "") {
            error6.textContent = "Please enter your country";
        } else if (/^\s*$/.test(country.value)) {
            error6.textContent = "Empty values are not allowed.";

        } else {
            error.textContent = "";
            error1.textContent = "";
            error2.textContent = "";
            error3.textContent = "";
            error4.textContent = "";
            error5.textContent = "";
            error6.textContent = "";
            pi.style.display = "none";
            prfs.style.display = "block";
            ed.style.display = "none";
            exp.style.display = "none";
            skl.style.display = "none";
            editnav.style.display = "none";
            //downloadprintbtn.style.display = "none";
            completebtn.style.display = "none";
        }
    }

    function toeducation() {
        const profile = document.getElementById('prfsumry'); //for profile
        let error7 = document.getElementById("error7"); //for profile error
        const lang = document.getElementById('lang'); //for language
        let error22 = document.getElementById("error22"); //for language error

        if (profile.value == "") {
            error7.textContent = "Please write something about your profile.";
        } else if (/^\s*$/.test(profile.value)) {
            error7.textContent = "Empty values are not allowed.";
        } else if (lang.value == "") {
            error22.textContent = "Please enter your language.";
        } else if (/^\s*$/.test(lang.value)) {
            error22.textContent = "Empty values are not allowed.";

        } else {
            error7.textContent = "";
            error22.textContent = "";
            pi.style.display = "none";
            prfs.style.display = "none";
            ed.style.display = "block";
            exp.style.display = "none";
            skl.style.display = "none";
            editnav.style.display = "none";
            //downloadprintbtn.style.display = "none";
            completebtn.style.display = "none";
        }
    }

    function toprslinfo() {
        pi.style.display = "block";
        prfs.style.display = "none";
        ed.style.display = "none";
        exp.style.display = "none";
        skl.style.display = "none";
        editnav.style.display = "none";
        //downloadprintbtn.style.display = "none";
        completebtn.style.display = "none";
    }

    function toexperience() {
        const scln = document.getElementById('sscn'); //for school name
        let error8 = document.getElementById("error8"); //for school name error  
        const scloc = document.getElementById('sscl'); //for school location    
        let error9 = document.getElementById("error9"); //for school location error
        const degree = document.getElementById('year'); //for degree
        let error10 = document.getElementById("error10"); //for degree error
        const year = document.getElementById('dgr'); //for year
        let error11 = document.getElementById("error11"); //for year error
        const fos = document.getElementById('fos'); //for field of study 
        let error12 = document.getElementById("error12"); //for field of study error


        // for schoolname
        if (scln.value == "") {
            error8.textContent = "Please enter your school name.";

        } else if (/^\s*$/.test(scln.value)) {
            error8.textContent = "Empty values are not allowed.";

        }

        // for schoollocation
        else if (scloc.value == "") {
            error9.textContent = "Please enter your school location.";

        } else if (/^\s*$/.test(scloc.value)) {
            error9.textContent = "Empty values are not allowed.";

        }

        // for degree
        else if (degree.value == "") {
            error10.textContent = "Please enter your degree.";

        } else if (/^\s*$/.test(degree.value)) {
            error10.textContent = "Empty values are not allowed.";

        }

        // for year
        else if (year.value == "") {
            error11.textContent = "Please enter your year.";

        } else if (/^\s*$/.test(year.value)) {
            error11.textContent = "Empty values are not allowed.";

        }

        // for field of study
        else if (fos.value == "") {
            error12.textContent = "Please enter your field of study.";

        } else if (/^\s*$/.test(fos.value)) {
            error12.textContent = "Empty values are not allowed.";

        } else {
            error8.textContent = "";
            error9.textContent = "";
            error10.textContent = "";
            error11.textContent = "";
            error12.textContent = "";
            pi.style.display = "none";
            prfs.style.display = "none";
            ed.style.display = "none";
            exp.style.display = "block";
            skl.style.display = "none";
            editnav.style.display = "none";
            //downloadprintbtn.style.display = "none";
            completebtn.style.display = "none";
        }
    }


    function toskl() {
        // const jt = document.getElementById('jt'); //for job title
        // let error13 = document.getElementById("error13"); //for job title error 
        // const emplr = document.getElementById('emplr'); //for employer name    
        // let error14 = document.getElementById("error14"); //for employer name error
        const strd = document.getElementById('strd'); //for start date
        let error15 = document.getElementById("error15"); //for start date error
        const endt = document.getElementById('endt'); //for end date
        let error16 = document.getElementById("error16"); //for end date error
        // const jd = document.getElementById('soyj'); //for summary of your job 
        // let error17 = document.getElementById("error17"); //for summary of your job error

        let pattern2 = /^\d+$/;


        if (!pattern2.test(strd.value)) {
            error15.textContent = "Please enter valid year.";
        } else if (!pattern2.test(endt.value)) {
            error16.textContent = "Please enter valid year.";
        }

        // if (jt.value == "" || emplr.value == "" || strd.value == "" || endt.value == "" || jd.value == "") {
        //     error13.textContent = "Please enter your job title.";
        //     error14.textContent = "Please enter your employer name.";
        //     error15.textContent = "Please enter your start date.";
        //     error16.textContent = "Please enter your end date.";
        //     error17.textContent = "Please enter your summary of job.";
        // } else if (/^\s*$/.test(jt.value) || /^\s*$/.test(emplr.value) || /^\s*$/.test(strd.value) || /^\s*$/.test(endt
        //         .value) || /^\s*$/.test(jd.value)) {
        //     error13.textContent = "Empty values are not allowed.";
        //     error14.textContent = "Empty values are not allowed.";
        //     error15.textContent = "Empty values are not allowed.";
        //     error16.textContent = "Empty values are not allowed.";
        //     error17.textContent = "Empty values are not allowed.";

        // }
        else {
            //    error13.textContent = "";
            //     error14.textContent = "";
            error15.textContent = "";
            error16.textContent = "";
            //     error17.textContent = "";
            pi.style.display = "none";
            prfs.style.display = "none";
            ed.style.display = "none";
            exp.style.display = "none";
            skl.style.display = "block";
            editnav.style.display = "none";
            //downloadprintbtn.style.display = "none";
            completebtn.style.display = "none";
        }
    }


    function complete() {
        const skil = document.getElementById('skl'); //for skill
        let error18 = document.getElementById("error18"); //for skill error 
        const skilp = document.getElementById('sklprntg'); //for skill percentage   
        let error19 = document.getElementById("error19"); //for skill percentage error
        const links = document.getElementById('links'); //for links
        let error20 = document.getElementById("error20"); //for links error
        const hobby = document.getElementById('hobby'); //for hobby
        let error21 = document.getElementById("error21"); //for hobby error


        // for skill
        if (skil.value == "") {
            error18.textContent = "Please enter your skill.";

        } else if (/^\s*$/.test(skil.value)) {
            error18.textContent = "Empty values are not allowed.";

        }

        // for skillpercentage
        else if (skilp.value == "") {
            error19.textContent = "Please enter your skill percentage.";

        } else if (skilp.value >= 101) {
            error19.textContent = "Please enter value below 100%.";

        } else if (/^\s*$/.test(skilp.value)) {
            error19.textContent = "Empty values are not allowed.";

        }

        // for hobby
        else if (hobby.value == "") {
            error21.textContent = "Please enter your hobby.";

        } else if (/^\s*$/.test(hobby.value)) {
            error21.textContent = "Empty values are not allowed.";

        }

        // for links
        else if (links.value == "") {
            error20.textContent = "Please enter your link.";

        } else if (/^\s*$/.test(links.value)) {
            error20.textContent = "Empty values are not allowed.";

        } else {
            error18.textContent = "";
            error19.textContent = "";
            error20.textContent = "";
            error21.textContent = "";
            pi.style.display = "none";
            prfs.style.display = "none";
            ed.style.display = "none";
            exp.style.display = "none";
            skl.style.display = "none";
            editnav.style.display = "block";
            imgdiv.style.width = "100%";
            // right.style.marginRight = "100px";
            // right.style.marginLeft = "-100px";
            //downloadprintbtn.style.display = "flex";
            completebtn.style.display = "grid";
        }
    }


    //js code to add edit functionality

    let remove = document.getElementById('remove');


    function editprslinfo() {
        pi.style.display = "block";
        ed.style.display = "none";
        exp.style.display = "none";
        skl.style.display = "none";
        editnav.style.display = "none";
        // imgdiv.style.width = "85%";
        right.style.marginRight = "10px";
        right.style.marginLeft = "10px";
        //downloadprintbtn.style.display = "none";
        completebtn.style.display = "none";
    }


    function editprofile() {
        pi.style.display = "none";
        prfs.style.display = "block";
        ed.style.display = "none";
        exp.style.display = "none";
        skl.style.display = "none";
        editnav.style.display = "none";
        // imgdiv.style.width = "85%";
        right.style.marginRight = "10px";
        right.style.marginLeft = "10px";
        //downloadprintbtn.style.display = "none";
        completebtn.style.display = "none";
    }


    function editeducation() {
        pi.style.display = "none";
        ed.style.display = "block";
        exp.style.display = "none";
        skl.style.display = "none";
        editnav.style.display = "none";
        // imgdiv.style.width = "85%";
        right.style.marginRight = "10px";
        right.style.marginLeft = "10px"
        //downloadprintbtn.style.display = "none";
        completebtn.style.display = "none";

    }


    function editexperience() {
        pi.style.display = "none";
        ed.style.display = "none";
        exp.style.display = "block";
        skl.style.display = "none";
        editnav.style.display = "none";
        // imgdiv.style.width = "85%";
        right.style.marginRight = "10px";
        right.style.marginLeft = "10px"
        //downloadprintbtn.style.display = "none";
        completebtn.style.display = "none";
    }


    function editskl() {
        pi.style.display = "none";
        ed.style.display = "none";
        exp.style.display = "none";
        skl.style.display = "block";
        editnav.style.display = "none";
        // imgdiv.style.width = "85%";
        right.style.marginRight = "10px";
        right.style.marginLeft = "10px"
        //downloadprintbtn.style.display = "none";
        completebtn.style.display = "none";
    }


    // js for realtime diplay of input value in template



    // for first name
    function displayfname() {
        const fname = document.getElementById('fname').value;
        localStorage.setItem("fname", fname);
        const dfname = localStorage.getItem('fname');
        document.getElementById('dfname').innerHTML = dfname;
    }

    // for last name
    function displaylname() {
        const lname = document.getElementById('lname').value;
        localStorage.setItem("lname", lname);
        const dlname = localStorage.getItem('lname');
        document.getElementById('dlname').innerHTML = dlname;
    }

    // for phone number
    function displayphn() {
        const phone = document.getElementById('phn').value;
        localStorage.setItem("phone", phone);
        const dphone = localStorage.getItem('phone');
        document.getElementById('cont1').innerHTML = dphone;
    }

    // for email
    function displayeml() {
        const email = document.getElementById('eml').value;
        localStorage.setItem("email", email);
        const demail = localStorage.getItem('email');
        document.getElementById('cont2').innerHTML = demail;
    }

    // for city
    function displaycity() {
        const city = document.getElementById('city').value;
        localStorage.setItem("city", city);
        const dcity = localStorage.getItem('city');
        document.getElementById('cont3').innerHTML = dcity;
    }

    // for state
    function displaystate() {
        const state = document.getElementById('state').value;
        localStorage.setItem("state", state);
        const dstate = localStorage.getItem('state');
        document.getElementById('cont4').innerHTML = dstate;
    }

    // for country
    function displaycountry() {
        const country = document.getElementById('country').value;
        localStorage.setItem("country", country);
        const dcountry = localStorage.getItem('country');
        document.getElementById('cont5').innerHTML = dcountry;
    }

    // for profile
    function displaypfsumry() {
        const prfsmry = document.getElementById('prfsumry').value;
        localStorage.setItem("prfsumry", prfsmry);
        const dprfsmry = localStorage.getItem('prfsumry');
        document.getElementById('profsumry').innerHTML = dprfsmry;
    }

    // for school name
    function displayscln() {
        const sclname = document.getElementById('sscn').value;
        localStorage.setItem("sclname", sclname);
        const dsclname = localStorage.getItem('sclname');
        document.getElementById('scln').innerHTML = dsclname;

    }

    // for school location
    function displaysclloc() {
        const sclloc = document.getElementById('sscl').value;
        localStorage.setItem("sclloc", sclloc);
        const dsclloc = localStorage.getItem('sclloc');
        document.getElementById('sclloc').innerHTML = dsclloc;
    }

    // for degree
    function displaydegree() {
        const degree = document.getElementById('dgr').value;
        localStorage.setItem("degree", degree);
        const ddegree = localStorage.getItem('degree');
        document.getElementById('degree').innerHTML = ddegree;
    }

    // for year
    function displayyear() {
        const sclyer = document.getElementById('year').value;
        localStorage.setItem("sclyer", sclyer);
        const dsclyer = localStorage.getItem('sclyer');
        document.getElementById('sclyr').innerHTML = dsclyer;
    }

    // for field of study
    function displayfos() {
        const fost = document.getElementById('fos').value;
        localStorage.setItem("fost", fost);
        const dfost = localStorage.getItem('fost');
        document.getElementById('fostdy').innerHTML = dfost;
    }

    // for job title
    function displayjt() {
        const jbtl = document.getElementById('jt').value;
        localStorage.setItem("jbtl", jbtl);
        const djbtl = localStorage.getItem('jbtl');
        document.getElementById('jbt').innerHTML = djbtl;
    }

    function displaycompany() {
        const employr = document.getElementById('emplr').value;
        localStorage.setItem("employr", employr);
        const demployr = localStorage.getItem('employr');
        document.getElementById('cpn').innerHTML = demployr;
    }

    function displaystrtdt() {
        const strtdate = document.getElementById('strd').value;
        localStorage.setItem("strtdate", strtdate);
        const dstrtdate = localStorage.getItem('strtdate');
        document.getElementById('strtyr').innerHTML = dstrtdate;
    }

    function displayenddt() {
        const enddate = document.getElementById('endt').value;
        localStorage.setItem("enddate", enddate);
        const denddate = localStorage.getItem('enddate');
        document.getElementById('endyr').innerHTML = denddate;
    }

    function displaysoyj() {
        const jobsumary = document.getElementById('soyj').value;
        localStorage.setItem("jobsumary", jobsumary);
        const djobsumary = localStorage.getItem('jobsumary');
        document.getElementById('jbsmry').innerHTML = djobsumary;
    }

    function displayskill() {
        const skill = document.getElementById('skl').value;
        localStorage.setItem("skill", skill);
        const dskill = localStorage.getItem('skill');
        document.getElementById('skls').innerHTML = dskill;
    }

    function displayskillp() {
        // let smpl=document.querySelector('.smpl3');
        const skillp = document.getElementById('sklprntg').value;
        localStorage.setItem("skillp", skillp);
        const dskillp = localStorage.getItem('skillp');
        document.getElementById('sklprtg').innerHTML = dskillp;
        let percentage = document.getElementById('sklprtg');
        width = dskillp + '%';
        // smpl = dskillp + '%';
        percentage.style.width = width;

    }

    function displayhobby() {
        const hoby = document.getElementById('hobby').value;
        localStorage.setItem("hobby", hoby);
        const dhoby = localStorage.getItem('hobby');
        document.getElementById('hob').innerHTML = dhoby;
    }

    function displaylink() {
        const link = document.getElementById('links').value;
        localStorage.setItem("link", link);
        const dlink = localStorage.getItem('link');
        document.getElementById('lnk').innerHTML = dlink;
    }

    function displaylang() {
        const lang = document.getElementById('lang').value;
        localStorage.setItem("lang", lang);
        const dlang = localStorage.getItem('lang');
        document.getElementById('dlang').innerHTML = dlang;
    }


    //  addding new fields dynamically

    function addnewlang() {

        let newnode = document.createElement('input');

        newnode.classList.add('addinputlang');
        newnode.setAttribute('placeholder', 'e.g Hindi');
        newnode.setAttribute('type', 'text');

        let addlang = document.querySelector('.addinputlang');
        let addafter = document.querySelector('.inside');

        addlang.insertBefore(newnode, addafter);


    }
    </script>
</body>

</html>