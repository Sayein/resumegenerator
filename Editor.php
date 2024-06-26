<?php 
session_start(); 

// echo '<pre>';
// print_r($_POST);

$alert=false;
$error="";

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $userid=$_SESSION['user_id'];
    if (isset($_SESSION['tmp'])) {
        $template = $_SESSION['tmp'];  
      }
      elseif (isset($_SESSION['edittemplate'])) {
        $edittemplate=$_SESSION['edittemplate']; 
      }
      else{
        $alert=true;
        $error="Please select a template";
      }
  }

  if(isset($_POST['complete'])){
    include "db/config.php";

    $tempid=uniqid();
    $_SESSION['tempid']=$tempid;

    $sanetizefname=$_POST['fname'];
    $fname= filter_var($sanetizefname, FILTER_SANITIZE_STRING);

    $sanetizelname=$_POST['lname'];
    $lname= filter_var($sanetizelname, FILTER_SANITIZE_STRING);

    $sanetizephonenumber=$_POST['phonenumber'];
    $phonenumber= filter_var($sanetizephonenumber, FILTER_SANITIZE_STRING);

    $sanetizemail=$_POST['email'];
    $email= filter_var($sanetizemail, FILTER_SANITIZE_EMAIL);

    $sanetizecity=$_POST['city'];
    $city=filter_var($sanetizecity, FILTER_SANITIZE_STRING);
    
    $sanetizestate=$_POST['state'];
    $state=filter_var($sanetizestate, FILTER_SANITIZE_STRING);

    $sanetizecountry=$_POST['country'];
    $country=filter_var($sanetizecountry, FILTER_SANITIZE_STRING);

    $sanetizeprofile=$_POST['profilesummary'];
    $profile=filter_var($sanetizeprofile, FILTER_SANITIZE_STRING);

    $sanetizelanguageArray=$_POST['language'];
    $languageArray=filter_var_array($sanetizelanguageArray, FILTER_SANITIZE_STRING);
    $language = implode(',', $languageArray);

    $sanetizeschoolnameArray=$_POST['schoolname'];
    $schoolnameArray=filter_var_array($sanetizeschoolnameArray, FILTER_SANITIZE_STRING);
    $schoolname=implode(',', $schoolnameArray);

    $sanetizeschoollocationArray=$_POST['schoollocation'];
    $schoollocationArray=filter_var_array($sanetizeschoollocationArray, FILTER_SANITIZE_STRING);
    $schoollocation=implode(',', $schoollocationArray);

    $sanetizedegreeArray=$_POST['degree'];
    $degreeArray=filter_var_array($sanetizedegreeArray, FILTER_SANITIZE_STRING);
    $degree=implode(',', $degreeArray);

    $sanetizeyearArray=$_POST['year'];
    $yearArray=filter_var_array($sanetizeyearArray, FILTER_SANITIZE_STRING);
    $year=implode(',', $yearArray);

    $sanetizefieldofstudyArray=$_POST['fieldofstudy'];
    $fieldofstudyArray=filter_var_array($sanetizefieldofstudyArray, FILTER_SANITIZE_STRING);
    $fieldofstudy=implode(',', $fieldofstudyArray);

    $sanetizejobtitleArray=$_POST['jobtitle'];
    $jobtitleArray=filter_var_array($sanetizejobtitleArray, FILTER_SANITIZE_STRING);
    $jobtitle=implode(',', $jobtitleArray);

    $sanetizeemployerArray=$_POST['employer'];
    $employerArray=filter_var_array($sanetizeemployerArray, FILTER_SANITIZE_STRING);
    $employer=implode(',', $employerArray);

    $sanetizestartyearArray=$_POST['startyear'];
    $startyearArray=filter_var_array($sanetizestartyearArray, FILTER_SANITIZE_STRING);
    $startyear=implode(',', $startyearArray);

    $sanetizeendyearArray=$_POST['endyear'];
    $endyearArray=filter_var_array($sanetizeendyearArray, FILTER_SANITIZE_STRING);
    $endyear=implode(',', $endyearArray);

    $sanetizejobsummaryArray=$_POST['jobsummary'];
    $jobsummaryArray=filter_var_array($sanetizejobsummaryArray, FILTER_SANITIZE_STRING);
    $jobsummary=implode(',', $jobsummaryArray);

    $sanetizeskillArray=$_POST['skl'];
    $skillArray=filter_var_array($sanetizeskillArray, FILTER_SANITIZE_STRING);
    $skill=implode(',', $skillArray);

    $sanetizeskillpercentageArray=$_POST['skillpercentage'];
    $skillpercentageArray=filter_var_array($sanetizeskillpercentageArray, FILTER_SANITIZE_STRING);
    $skillpercentage=implode(',', $skillpercentageArray);

    $sanetizehobbiesArray=$_POST['hobby'];
    $hobbiesArray=filter_var_array($sanetizehobbiesArray, FILTER_SANITIZE_STRING);
    $hobbies=implode(',', $hobbiesArray);

    $sanetizelinkArray=$_POST['links'];
    $linkArray=filter_var_array($sanetizelinkArray, FILTER_SANITIZE_STRING);
    $link=implode(',', $linkArray);
   
     
      $sql="INSERT INTO `crbpdata` (`user_id`, `templateno`, `templateid`, `fname`, `lname`, `phonenumber`, `email`, `city`, `state`, `country`, `profile`, `language`, `schoolname`, `schoollocation`, `degree`, `year`, `fieldofstudy`, `jobtitle`, `employer`, `startyear`, `endyear`, `jobsummary`, `skill`, `skillperncentage`, `hobbies`, `link`, `dt`) VALUES ('$userid','$template', '$tempid', '$fname', '$lname', '$phonenumber', '$email', '$city', '$state', '$country', '$profile', '$language', '$schoolname', '$schoollocation', '$degree', '$year', '$fieldofstudy', '$jobtitle', '$employer', '$startyear', '$endyear', '$jobsummary', ' $skill', ' $skillpercentage', '$hobbies', '$link', current_timestamp())";
      $result=mysqli_query($conn,$sql);
     
      if($result){
          header("Location: complete.php");
      }else{
        //   echo "error".mysqli_error($conn);
          $alert=true;
          $error="Something went wrong, please try after some time";
      }
     
  }


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar -->
    <?php
       include("headfoot/navbar.php");
    ?>



    <?php   

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    
        if(!$alert){
    
        echo '
       <!-- Editor -->
    <div class="row">
      <div class="main">
        <!-- left -->
        <div class="left">
            <!-- personal details -->
            <form action="Editor.php" method="post" onsubmit="formSubmitted()" id="editorForm">
                    <div class="pi">
                        <h1 >Personal Details</h1>
                        <div class="pcentr">

                            <div class="prow">
                                <div class="pcol">
                                    <label for="fname">First name</label><br>
                                    <input type="text" oninput="displayfname()" name="fname" id="fname"
                                        placeholder="e.g. Ramesh">
                                    <div id="error" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                                <div class="pcol">
                                    <label for="lname">Last name</label> <br>
                                    <input type="text" oninput="displaylname()" name="lname" id="lname"
                                        placeholder="e.g. Mishra">
                                    <div id="error1" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                            </div>

                            <div class="prow">
                                <div class="pcol">
                                    <label for="phonenumber">Phone number</label> <br>
                                    <input type="number" oninput="displayphn()" name="phonenumber" id="phonenumber"
                                    max  placeholder="e.g. +91 9867982828">
                                    <div id="error2" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                                <div class="pcol">
                                    <label for="email">Email</label><br>
                                    <input type="text" oninput="displayeml()" name="email" id="email"
                                        placeholder="e.g. ramesh@gmail.com">
                                    <div id="error3" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                            </div>

                            <div class="prow">
                                <div class="pcol">
                                    <label for="city">City</label><br>
                                    <input type="text" oninput="displaycity()" name="city" id="city"
                                        placeholder="e.g. Mumbai">
                                    <div id="error4" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                                <div class="pcol">
                                    <label for="state">State</label><br>
                                    <input type="text" oninput="displaystate()" name="state" id="state"
                                        placeholder="e.g. Maharashtra">
                                    <div id="error5" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                            </div>
                            <div class="ptxtarea">
                                <label for="country">Country</label><br>
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
                                <textarea oninput="displaypfsumry()" name="profilesummary" id="profilesummary"
                                    placeholder="e.g. Quickly learned new skills."></textarea>
                                <div id="error7" style="color:red; font-size:18px; margin-top: 7px;"></div>
                            </div>
                        </div>

                        <h1 style="padding-top:80px;">Languages</h1>
                        <div class="pcentr">
                            <div class="prow addinputlang">
                                    <div class="pcol" id="moveleft">
                                      <!---  <input class="lang addinputlang1" type="text" oninput="displaylang()" name="language[]" id="language"
                                            placeholder="e.g. English">  --->
                                        <input class="lang addinputlang1" type="text" oninput="displayNewAddedLang()" name="language[]" id="language"
                                            placeholder="e.g. English">
                                        <div id="error22" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                        <input type="hidden" class="inside">
                                        </div>
                                    
                            </div>
                            <div class="pcol addlangbtn" id="moveaddbtn">
                                        <div class="addboxdiv" onclick="addnewlang()">
                                            <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                        </div>
                                        <div class="addboxdiv" onclick="removenewlang()">
                                            <img class="removebutton" src="images/icons/removebox.svg" alt="remove button">
                                        </div>
                            </div>
                        </div>

                        <div class="btndiv">
                            <div class="prevnextbtn">
                                <div class="backbtn">
                                    <a id="bk" onclick="toprslinfo()">Back</a>
                                </div>
                                <div class="nextbtn">
                                    <a id="nxt" onclick="toeducation()">Next</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Education -->

                    <div class="ed">
                        <h1 >Education</h1>
                        <div class="pcentr" id="addneweducationfields">
                            <div class="education-fields">
                                <div class="prow">
                                    <div class="pcol">
                                        <label for="schoolname">School name</label><br>
                                        <input type="text" class="schoolnameclass" oninput="displayscln()" name="schoolname[]" id="schoolname"
                                            placeholder="e.g. Saint Xevier">
                                        <div id="error8" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                    <div class="pcol">
                                        <label for="schoollocation">School location</label><br>
                                        <input type="text" class="allschoollocclass" oninput="displaysclloc()" name="schoollocation[]" id="schoollocation"
                                            placeholder="e.g. Maharashtra,mumbai">
                                        <div id="error9" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                </div>

                                <div class="prow">
                                    <div class="pcol">
                                        <label for="degree">Degree</label> <br>
                                        <input type="text" class="degreeclass" oninput="displaydegree()" name="degree[]" id="degree"
                                            placeholder="e.g. Bsc.IT ">
                                        <div id="error10" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                    <div class="pcol">
                                        <label for="year">Year</label> <br>
                                        <input type="text" class="degreeyearclass" oninput="displayyear()" name="year[]" id="year"
                                            placeholder="e.g. 2020-2023">
                                        <div id="error11" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                </div>
                                <input type="hidden" class="inside">
                                <div class="ptxtarea" style="padding-bottom:20px;">
                                    <label for="fieldofstudy">Field of study</label> <br>
                                    <input type="text" class="fieldofstudyclass" oninput="displayfos()" name="fieldofstudy[]" id="fieldofstudy"
                                        placeholder="e.g. Information Tecnology">
                                    <div id="error12" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                             </div>

                                <div class="pcentr" id="addneweducationfieldsafter">
                                    <div class="addbox">
                                        <div class="addboxdiv" onclick="addneweducation()">
                                            <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                        </div>
                                        <div class="addboxdiv" onclick="removeneweducation()">
                                        <img class="removebutton" src="images/icons/removebox.svg" alt="remove button">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btndiv">
                            <div class="prevnextbtn">
                                <div class="backbtn">
                                    <a id="bk" onclick="toprfsumry()">Back</a>
                                </div>
                                <div class="nextbtn">
                                    <a id="nxt" onclick="toexperience()">Next</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Experience -->

                    <div class="exp">
                        <h1 >Experience </h1>
                        <div class="pcentr" id="addnewexperiencefields">
                            <div class="experience-fields">
                                <div class="prow">
                                    <div class="pcol">
                                        <label for="jobtitle">Job title</label><br>
                                        <input type="text" class="jobtitleclass" oninput="displayjt()" name="jobtitle[]" id="jobtitle"
                                            placeholder="e.g. Software Engineer">
                                        <div id="error13" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                    <div class="pcol">
                                        <label for="employer">Employer</label><br>
                                        <input type="text" class="employerclass" oninput="displaycompany()" name="employer[]" id="employer"
                                            placeholder="e.g. Google">
                                        <div id="error14" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                </div>

                                <div class="prow">
                                    <div class="pcol">
                                        <label for="startyear">Start year</label> <br>
                                        <input type="text" class="startyearclass" oninput="displaystrtdt()" name="startyear[]" id="startyear"
                                            placeholder="e.g. 2019" maxlength="4">
                                        <div id="error15" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                    <div class="pcol">
                                        <label for="endyear">End year</label> <br>
                                        <input type="text" class="endyearclass" oninput="displayenddt()" name="endyear[]" id="endyear"
                                            placeholder="e.g. 2023"  maxlength="4">
                                        <div id="error16" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                </div>

                                <div class="ptxtarea" style="padding-bottom:20px;">
                                    <label for="jobsummary">Summary of your job</label><br>
                                    <textarea class="jobsummaryclass" oninput="displaysoyj()" id="jobsummary" name="jobsummary[]"
                                        placeholder="e.g. Experienced PHP Developer"></textarea>
                                    <div id="error17" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>

                                <div class="pcentr" id="addnewexperiencefieldsafter">
                                    <div class="addbox">
                                        <div class="addboxdiv" onclick="addnewexperience()">
                                            <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                        </div>
                                        <div class="addboxdiv" onclick="removenewexperience()">
                                        <img class="removebutton" src="images/icons/removebox.svg" alt="remove button">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btndiv">
                            <div class="prevnextbtn">
                                <div class="backbtn">
                                    <a id="bk" onclick="toeducation()">Back</a>
                                </div>
                                <div class="nextbtn">
                                    <a id="nxt" onclick="toskl()">Next</a>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>

                    <!-- skill -->

                    <div class="skl">
                        <h1 >Skills & Hobbies</h1>
                        <div class="pcentr">
                            <div class="newdiv" id="addnewskillfields">
                                <div class="skill-fields">
                                    <div class="prow">
                                        <div class="pcol">
                                            <label for="skl">Skill</label><br>
                                            <input type="text" class="skillclass" oninput="displayskill()" name="skl[]" id="skl"
                                                placeholder="e.g. Graphic Designer">
                                            <div id="error18" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                        </div>
                                        <div class="pcol">
                                            <label for="skillpercentage">Skill Percentage</label><br>
                                            <input type="number" class="skillpercentageclass" oninput="displayskillp()" name="skillpercentage[]" id="skillpercentage"
                                                placeholder="e.g. 78%">
                                            <div id="error19" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                        </div>
                                    </div>

                                    <div class="pcentr" id="addnewskillfieldsafter">
                                        <div class="addbox">
                                            <div class="addboxdiv" onclick="addnewskill()">
                                                <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                            </div>
                                            <div class="addboxdiv" onclick="removenewskill()">
                                               <img class="removebutton" src="images/icons/removebox.svg" alt="remove button">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="pcentr">
                                <div class="prow" id="addnewinputhobby">
                                    <div>
                                       <label for="hobby">Hobby</label>
                                       <div class="pcol hobby-field" id="moveleft">
                                            <input type="text" class="hobbyclass" oninput="displayhobby()" name="hobby[]" id="hobby"
                                            placeholder="e.g. Reading">
                                            <div id="error21" style="color:red; font-size:18px; margin-top: 7px;"></div>  
                                            
                                        </div>
                                    </div>  
                                    <div id="addnewinputhobbyafter"></div>
                                </div>
                                <div class="pcentr" >
                                        <div class="addbox">
                                            <div class="addboxdiv" onclick="addnewhobby()">
                                                <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                            </div>
                                            <div class="addboxdiv" onclick="removenewhobby()">
                                                <img class="removebutton" src="images/icons/removebox.svg" alt="remove button">
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="pcentr">
                                <div class="prow" id="addnewinputlinks">
                                    <div>
                                       <label for="links">Links</label>
                                        <div class="pcol links-field" id="moveleft">
                                           <input type="text" class="linkclass" oninput="displaylink()" name="links[]" id="links"
                                            placeholder="e.g. Linkd in">
                                            <div id="error20" style="color:red; font-size:18px; margin-top: 7px;"></div>  
                                        </div>
                                    </div>  
                                    <div id="addnewinputlinksafter"></div>
                                </div>
                                <div class="pcentr" >
                                        <div class="addbox">
                                            <div class="addboxdiv" onclick="addnewlink()">
                                                <img class="addbutton" src="images/icons/addbox.png" alt="add button">
                                            </div>
                                            <div class="addboxdiv" onclick="removenewlink()">
                                                <img class="removebutton" src="images/icons/removebox.svg" alt="remove button">
                                            </div>
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

                    // code for edit feature
                    $template_files = [
                        '1' => 'templates/template1.php',
                        '2' => 'templates/template2.php',
                        '3' => 'templates/template3.php',
                    ];
                            
                    if (isset($_GET['edit'])) {
                        include "db/config.php";
                        $edittemplate=$_SESSION['edittemplate'];  

                        $sql = "SELECT * FROM crbpdata WHERE templateid = '$edittemplate' ";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){

                                $templateno=$row['templateno'];
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
                            if (isset($template_files[$templateno])) {
                                include $template_files[$templateno];
                            }
                        }
                    }
                    else{                
                        if (isset($template_files[$template])) {
                            include $template_files[$template];
                        }
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
                <button type="submit" name="complete" onclick="clearLocalStorage()">Complete</button>
                </div> 
            </form> 
            </div>
        </div>
    </div>
       ';
    }
    else{
        echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
                <div>
                <h1 style="text-align:center;">Please Select a Template .</h1>
                <div class="btngrid" id="mbtn"><a href="resumeTemplate.php" class="herobtn">Resume Template</a></div>
                </div> 
             </div>';
        }

 }
    else{
        echo '  <div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
                    <div>
                        <h1 style="text-align:center;">Please Login To Use Editor .</h1>
                        <div class="btngrid" id="mbtn"><a href="resumeTemplate.php" class="herobtn">Log in</a></div>
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
        const phn = document.getElementById('phonenumber'); //for phone number
        let error2 = document.getElementById("error2"); //for phone number error
        const eml = document.getElementById('email'); //for email
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
        const profile = document.getElementById('profilesummary'); //for profile
        let error7 = document.getElementById("error7"); //for profile error
        const lang = document.getElementById('language'); //for language
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
        const scln = document.getElementById('schoolname'); //for school name
        let error8 = document.getElementById("error8"); //for school name error  
        const scloc = document.getElementById('schoollocation'); //for school location    
        let error9 = document.getElementById("error9"); //for school location error
        const degree = document.getElementById('year'); //for degree
        let error10 = document.getElementById("error10"); //for degree error
        const year = document.getElementById('degree'); //for year
        let error11 = document.getElementById("error11"); //for year error
        const fos = document.getElementById('fieldofstudy'); //for field of study 
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
        // const jt = document.getElementById('jobtitle'); //for job title
        // let error13 = document.getElementById("error13"); //for job title error 
        // const emplr = document.getElementById('employer'); //for employer name    
        // let error14 = document.getElementById("error14"); //for employer name error
        const strd = document.getElementById('startyear'); //for start date
        let error15 = document.getElementById("error15"); //for start date error
        const endt = document.getElementById('endyear'); //for end date
        let error16 = document.getElementById("error16"); //for end date error
        // const jd = document.getElementById('jobsummary'); //for summary of your job 
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
        const skilp = document.getElementById('skillpercentage'); //for skill percentage   
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
        completebtn.style.display = "none";
    }


    function editprofile() {
        pi.style.display = "none";
        prfs.style.display = "block";
        ed.style.display = "none";
        exp.style.display = "none";
        skl.style.display = "none";
        editnav.style.display = "none";
        completebtn.style.display = "none";
    }


    function editeducation() {
        pi.style.display = "none";
        ed.style.display = "block";
        exp.style.display = "none";
        skl.style.display = "none";
        editnav.style.display = "none";
        completebtn.style.display = "none";

    }


    function editexperience() {
        pi.style.display = "none";
        ed.style.display = "none";
        exp.style.display = "block";
        skl.style.display = "none";
        editnav.style.display = "none";
        completebtn.style.display = "none";
    }


    function editskl() {
        pi.style.display = "none";
        ed.style.display = "none";
        exp.style.display = "none";
        skl.style.display = "block";
        editnav.style.display = "none";
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
        const phone = document.getElementById('phonenumber').value;
        localStorage.setItem("phone", phone);
        const dphone = localStorage.getItem('phone');
        document.getElementById('cont1').innerHTML = dphone;
    }

    // for email
    function displayeml() {
        const email = document.getElementById('email').value;
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
        const prfsmry = document.getElementById('profilesummary').value;
        localStorage.setItem("profilesummary", prfsmry);
        const dprfsmry = localStorage.getItem('profilesummary');
        document.getElementById('profsumry').innerHTML = dprfsmry;
    }

    // for school name
    function displayscln() {
        const sclname = document.getElementById('schoolname').value;
        localStorage.setItem("sclname", sclname);
        const dsclname = localStorage.getItem('sclname');
        document.getElementById('scln').innerHTML = dsclname;
    }

    // for school location
    function displaysclloc() {
        const sclloc = document.getElementById('schoollocation').value;
        localStorage.setItem("sclloc", sclloc);
        const dsclloc = localStorage.getItem('sclloc');
        document.getElementById('sclloc').innerHTML = dsclloc;
    }

    // for degree
    function displaydegree() {
        const degree = document.getElementById('degree').value;
        localStorage.setItem("degree", degree);
        const ddegree = localStorage.getItem('degree');
        document.getElementById('degree1').innerHTML = ddegree;
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
        const fost = document.getElementById('fieldofstudy').value;
        localStorage.setItem("fost", fost);
        const dfost = localStorage.getItem('fost');
        document.getElementById('fostdy').innerHTML = dfost;
    }

    // for job title
    function displayjt() {
        const jbtl = document.getElementById('jobtitle').value;
        localStorage.setItem("jbtl", jbtl);
        const djbtl = localStorage.getItem('jbtl');
        document.getElementById('jbt').innerHTML = djbtl;
    }

    function displaycompany() {
        const employr = document.getElementById('employer').value;
        localStorage.setItem("employr", employr);
        const demployr = localStorage.getItem('employr');
        document.getElementById('cpn').innerHTML = demployr;
    }

    function displaystrtdt() {
        const strtdate = document.getElementById('startyear').value;
        localStorage.setItem("strtdate", strtdate);
        const dstrtdate = localStorage.getItem('strtdate');
        document.getElementById('strtyr').innerHTML = dstrtdate;
    }

    function displayenddt() {
        const enddate = document.getElementById('endyear').value;
        localStorage.setItem("enddate", enddate);
        const denddate = localStorage.getItem('enddate');
        document.getElementById('endyr').innerHTML = denddate;
    }

    function displaysoyj() {
        const jobsumary = document.getElementById('jobsummary').value;
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
        const skillp = document.getElementById('skillpercentage').value;
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

    // function displaylang() {
    //     const lang = document.getElementById('language').value;
    //     localStorage.setItem("language", lang);
    //     const dlang = localStorage.getItem('language');
    //     document.getElementById('dlang').innerHTML = dlang;
    //     document.querySelectorAll('.dummytext').forEach(element => element.remove());
    // }


    //  addding new fields dynamically 
    let languageInputCount = 0;
    let addlang = document.querySelector('.addinputlang');

    function addnewlang() {

        let languageTextEmptyCheck = document.querySelector('.lang');
        if (languageTextEmptyCheck.value == "") {
            let emptyLanguageError = document.getElementById('error22');
            emptyLanguageError.innerText = "Please enter your language.";
        } else {
            languageInputCount++;
            let newnode = document.createElement('input');
            newnode.classList.add('addinputlang1');
            newnode.setAttribute('placeholder', 'e.g Hindi');
            newnode.setAttribute('oninput', 'displayNewAddedLang()');
            newnode.setAttribute('name', `language[]`);
            newnode.setAttribute('class', `addinputlang1`);
            newnode.setAttribute('id', `lang${languageInputCount}`);
            newnode.setAttribute('type', 'text');
            let addafter = document.querySelector('.inside');
            addlang.append(newnode, addafter);

            let newtemplatelanguagesnode = `<li><span class="cdlang1 text" id="dlang">Hindi</span></li>`;
            let templatelanguages = document.getElementById('templatelanguages');
            templatelanguages.insertAdjacentHTML('beforeend', newtemplatelanguagesnode);
        }

    }

    function displayNewAddedLang() {
        document.querySelectorAll('.dummytext').forEach(element => element.remove());
        const newAddedLang = addlang.querySelectorAll(`.addinputlang1`);
        let languageArray = [];
        newAddedLang.forEach(element => {
            languageArray.push(element.value);
        });
        let dataString = JSON.stringify(languageArray);
        localStorage.setItem(`languages`, dataString);
        let localLanguages = localStorage.getItem('languages');

        let localStorageLanguageArray = JSON.parse(localLanguages);
        let displayLanguageText = document.querySelectorAll('#dlang');
        for (let i = 0; i < localStorageLanguageArray.length; i++) {
            if (displayLanguageText[i]) {
                displayLanguageText[i].textContent = localStorageLanguageArray[i];
            }
        }
    }

    function removenewlang() {
        const inputs = document.querySelectorAll('.addinputlang1');

        if (inputs.length > 1) {
            inputs[inputs.length - 1].remove();
        }

        displayLanguageText = document.querySelectorAll('.cdlang1');
        if (displayLanguageText.length > 1) {
            displayLanguageText[displayLanguageText.length - 1].remove();
        }


        let localLanguages = localStorage.getItem('languages');

        if (localLanguages) {
            // Parse the JSON string into an array
            let localStorageLanguageArray = JSON.parse(localLanguages);

            // Remove the last element from the array
            if (localStorageLanguageArray.length > 1) {
                localStorageLanguageArray.pop();
            }

            // Convert the updated array back to a JSON string
            let updatedLangugaeDataString = JSON.stringify(localStorageLanguageArray);
            localStorage.setItem('languages', updatedLangugaeDataString);

            localLanguages = localStorage.getItem('languages');
            localStorageLanguageArray = JSON.parse(localLanguages);
            let displayLanguageText = document.querySelectorAll('#dlang');
            for (let i = 0; i < localStorageLanguageArray.length; i++) {
                if (displayLanguageText[i]) {
                    displayLanguageText[i].textContent = localStorageLanguageArray[i];
                }
            }

        }
    }


    // code to add new education fields
    let inputCount = 0;

    function addneweducation() {

        let schoolNameTextEmptyCheck = document.querySelector('#schoolname');
        if (schoolNameTextEmptyCheck.value == "") {
            let emptyschoolNameError = document.getElementById('error8');
            emptyschoolNameError.innerText = "Please enter your school name.";
        } else {
        const newEducationFields = `
                <div class="education-fields margintp">
                    <div class="prow">
                        <div class="pcol">
                            <label for="schoolname">School name</label><br>
                            <input type="text" class="schoolnameclass" oninput="displayscln()" name="schoolname[]" id="schoolname${inputCount}" placeholder="e.g. Saint Xevier">
                            <div style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>
                        <div class="pcol">
                            <label for="schoollocation">School location</label><br>
                            <input type="text" class="allschoollocclass" oninput="displaysclloc()" name="schoollocation[]" placeholder="e.g. Maharashtra, Mumbai">
                            <div style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>
                    </div>

                    <div class="prow">
                        <div class="pcol">
                            <label for="degree">Degree</label><br>
                            <input type="text" class="degreeclass" oninput="displaydegree()" name="degree[]" placeholder="e.g. Bsc.IT">
                            <div style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>
                        <div class="pcol">
                            <label for="year">Year</label><br>
                            <input type="text" class="degreeyearclass" oninput="displayyear()" name="year[]" placeholder="e.g. 2020-2023">
                            <div style="color:red; font-size:18px; margin-top: 7px;"></div>
                        </div>
                    </div>
                    <input type="hidden" class="inside">
                    <div class="ptxtarea" style="padding-bottom:20px;">
                        <label for="fieldofstudy">Field of study</label><br>
                        <input type="text" class="fieldofstudyclass" oninput="displayfos()" name="fieldofstudy[]" placeholder="e.g. Information Technology">
                        <div style="color:red; font-size:18px; margin-top: 7px;"></div>
                    </div>
                </div>
            `;
        const $newNode = $(newEducationFields);

        // Insert the new node inside #addneweducationfieldsafter but before #addneweducationfieldsafter
        $('#addneweducationfields #addneweducationfieldsafter').before($newNode);

        let newtemplateducationode = `
                <li class="newtemplateducationcreatednode">
                    <h5 class="cdyear1" id="sclyr">2010-2015</h5>
                    <h4 class="cddegree1" id="degree1">Master Degree</h4>
                    <h4 class="cdfos1" id="fostdy">something</h4>
                    <h4 class="cdsclname1" id="scln">holy cow college</h4>
                    <h4 class="cdsclloc1" id="sclloc">france</h4>
                </li>
        `;
        let templateducation = document.getElementById('templateducation');
        templateducation.insertAdjacentHTML('beforeend', newtemplateducationode);
        }
    }

    function displayscln() {
        let allSchoolNameFields = document.querySelectorAll(".schoolnameclass");
        let schoolNameArray = [];
        allSchoolNameFields.forEach(element => {
            schoolNameArray.push(element.value);
        });
        let dataString = JSON.stringify(schoolNameArray);
        localStorage.setItem(`schoolnames`, dataString);
        const localSchoolnames = localStorage.getItem('schoolnames');
        // document.getElementById('scln').innerHTML = localSchoolnames;
        document.querySelectorAll('.dummyeducationtext').forEach(e => e.remove());

        let localStorageSchoolNameArray = JSON.parse(localSchoolnames);
        let displaySchoolNameText = document.querySelectorAll('#scln');
        for (let i = 0; i < localStorageSchoolNameArray.length; i++) {
            if (displaySchoolNameText[i]) {
                displaySchoolNameText[i].textContent = localStorageSchoolNameArray[i];
            }
        }
    }

    function displaysclloc() {
        let allSchoollocFields = document.querySelectorAll(".allschoollocclass");
        let schoolLocArray = [];
        allSchoollocFields.forEach(element => {
            schoolLocArray.push(element.value);
        });
        let dataString = JSON.stringify(schoolLocArray);
        localStorage.setItem(`schoollocations`, dataString);
        const localSchoolLoc = localStorage.getItem('schoollocations');
        // document.getElementById('sclloc').innerHTML = localSchoolLoc;

        let localStorageSchoolLocationArray = JSON.parse(localSchoolLoc);
        let displaySchoolLocationText = document.querySelectorAll('#sclloc');
        for (let i = 0; i < localStorageSchoolLocationArray.length; i++) {
            if (displaySchoolLocationText[i]) {
                displaySchoolLocationText[i].textContent = localStorageSchoolLocationArray[i];
            }
        }

    }

    function displaydegree() {
        let allDegreeFields = document.querySelectorAll(".degreeclass");
        let degreeArray = [];
        allDegreeFields.forEach(element => {
            degreeArray.push(element.value);
        });
        let dataString = JSON.stringify(degreeArray);
        localStorage.setItem(`degrees`, dataString);
        const localDegrees = localStorage.getItem('degrees');
        // document.getElementById('degree1').innerHTML = localDegrees;

        let localStorageDegreeArray = JSON.parse(localDegrees);
        let displayDegreeText = document.querySelectorAll('#degree1');
        for (let i = 0; i < localStorageDegreeArray.length; i++) {
            if (displayDegreeText[i]) {
                displayDegreeText[i].textContent = localStorageDegreeArray[i];
            }
        }
    }

    function displayyear() {
        let allDegreeYearFields = document.querySelectorAll(".degreeyearclass");
        let degreeYearArray = [];
        allDegreeYearFields.forEach(element => {
            degreeYearArray.push(element.value);
        });
        let dataString = JSON.stringify(degreeYearArray);
        localStorage.setItem(`degreeyears`, dataString);
        const localDegreeYears = localStorage.getItem('degreeyears');
        // document.getElementById('sclyr').innerHTML = localDegreeYears;

        let localStorageDegreeYearsArray = JSON.parse(localDegreeYears);
        let displayDegreeYearsText = document.querySelectorAll('#sclyr');
        for (let i = 0; i < localStorageDegreeYearsArray.length; i++) {
            if (displayDegreeYearsText[i]) {
                displayDegreeYearsText[i].textContent = localStorageDegreeYearsArray[i];
            }
        }
    }

    function displayfos() {
        let allFieldOfStudyFields = document.querySelectorAll(".fieldofstudyclass");
        let fieldOfStudyArray = [];
        allFieldOfStudyFields.forEach(element => {
            fieldOfStudyArray.push(element.value);
        });
        let dataString = JSON.stringify(fieldOfStudyArray);
        localStorage.setItem(`Fieldofstudies`, dataString);
        const localFieldOfStudy = localStorage.getItem('Fieldofstudies');
        // document.getElementById('fostdy').innerHTML = localFieldOfStudy;

        let localStorageFieldOfStudyArray = JSON.parse(localFieldOfStudy);
        let displayFieldOfStudyText = document.querySelectorAll('#fostdy');
        for (let i = 0; i < localStorageFieldOfStudyArray.length; i++) {
            if (displayFieldOfStudyText[i]) {
                displayFieldOfStudyText[i].textContent = localStorageFieldOfStudyArray[i];
            }
        }
    }

    function removeneweducation() {
        // Remove the last .education-fields div but keep the first one intact
        const educationFields = $('#addneweducationfields .education-fields');
        if (educationFields.length > 1) {
            educationFields.last().remove();
        }

        let allneweducationode = document.querySelectorAll('.newtemplateducationcreatednode');
        if (allneweducationode.length > 0) {
            // console.log(allneweducationode[allneweducationode.length - 1]);
            allneweducationode[allneweducationode.length - 1].remove();
        }
    }



    // code to add new exprience fields
    let expinputCount = 0;

    function addnewexperience() {

        let jobTitleTextEmptyCheck = document.querySelector('#jobtitle');
        if (jobTitleTextEmptyCheck.value == "") {
            let emptyjobTitleError = document.getElementById('error13');
            emptyjobTitleError.innerText = "Please enter your Job Title.";
        } 
        else {
            const newExperienceFields = `
                    <div class="experience-fields margintp">
                    <div class="prow">
                                    <div class="pcol">
                                        <label for="jobtitle">Job title</label><br>
                                        <input type="text" class="jobtitleclass" oninput="displayjt()" name="jobtitle[]" id="jobtitle${expinputCount}"
                                            placeholder="e.g. Software Engineer">
                                        <div id="error13" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                    <div class="pcol">
                                        <label for="employer">Employer</label><br>
                                        <input type="text" class="employerclass" oninput="displaycompany()" name="employer[]" id="employer${expinputCount}"
                                            placeholder="e.g. Google">
                                        <div id="error14" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                </div>

                                <div class="prow">
                                    <div class="pcol">
                                        <label for="startyear">Start year</label> <br>
                                        <input type="text" class="startyearclass" oninput="displaystrtdt()" name="startyear[]" id="startyear${expinputCount}"
                                            placeholder="e.g. 2019" maxlength="4">
                                        <div id="error15" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                    <div class="pcol">
                                        <label for="endyear">End year</label> <br>
                                        <input type="text" class="endyearclass" oninput="displayenddt()" name="endyear[]" id="endyear${expinputCount}"
                                            placeholder="e.g. 2023"  maxlength="4">
                                        <div id="error16" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                    </div>
                                </div>

                                <div class="ptxtarea" style="padding-bottom:20px;">
                                    <label for="jobsummary">Summary of your job</label><br>
                                    <textarea class="jobsummaryclass" oninput="displaysoyj()" id="jobsummary${expinputCount}" name="jobsummary[]"
                                        placeholder="e.g. Experienced PHP Developer"></textarea>
                                    <div id="error17" style="color:red; font-size:18px; margin-top: 7px;"></div>
                                </div>
                    </div>
                `;
            const $newNode = $(newExperienceFields);

            // Insert the new node inside #addneweducationfieldsafter but before #addneweducationfieldsafter
            $('#addnewexperiencefields #addnewexperiencefieldsafter').before($newNode);

            let newtemplatexperiencenode = `
                    <div class="box newtemplatexperiencecreatednode">
                        <div class="yearcompany">
                            <h5><span id="strtyr" class="cdstrtyear1">2019 </span> - <span id="endyr" class="cdendyear1"> 2020</span></h5>
                            <h5 id="cpn" class="cdcnp1">Company Name</h5>
                        </div>
                        <div class="text">
                            <h4 id="jbt" class="cdjbt1">Senior UX Designer</h4>
                            <p id="jbsmry"  class="cdjbsmry1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut asperiores
                                eum,
                                quibusdam corporis atque facere minus omnis non. Aliquam, itaque!</p>
                        </div>
                    </div>
            `;
            let templatexperience = document.getElementById('templatexperience');
            templatexperience.insertAdjacentHTML('beforeend', newtemplatexperiencenode);
        }
    }

    function displayjt() {
        let allJobFields = document.querySelectorAll(".jobtitleclass");
        let jobTitleArray = [];
        allJobFields.forEach(element => {
            jobTitleArray.push(element.value);
        });
        let dataString = JSON.stringify(jobTitleArray);
        localStorage.setItem(`jobtitles`, dataString);
        const localjobtitles = localStorage.getItem('jobtitles');
        // document.getElementById('jbt').innerHTML = localjobtitles;
        document.querySelectorAll('.dummyexperincetext').forEach(e => e.remove());

        let localStoragejobtitlesArray = JSON.parse(localjobtitles);
        let displayjobtitlesText = document.querySelectorAll('#jbt');
        for (let i = 0; i < localStoragejobtitlesArray.length; i++) {
            if (displayjobtitlesText[i]) {
                displayjobtitlesText[i].textContent = localStoragejobtitlesArray[i];
            }
        }
    }

    function displaycompany() {
        let allEmployerFields = document.querySelectorAll(".employerclass");
        let employerArray = [];
        allEmployerFields.forEach(element => {
            employerArray.push(element.value);
        });
        let dataString = JSON.stringify(employerArray);
        localStorage.setItem(`employers`, dataString);
        const localemployers = localStorage.getItem('employers');
        // document.getElementById('cpn').innerHTML = localemployers;

        let localStorageEmployersArray = JSON.parse(localemployers);
        let displayEmployersText = document.querySelectorAll('#cpn');
        for (let i = 0; i < localStorageEmployersArray.length; i++) {
            if (displayEmployersText[i]) {
                displayEmployersText[i].textContent = localStorageEmployersArray[i];
            }
        }
    }

    function displaystrtdt() {
        let allStartYearFields = document.querySelectorAll(".startyearclass");
        let startyearArray = [];
        allStartYearFields.forEach(element => {
            startyearArray.push(element.value);
        });
        let dataString = JSON.stringify(startyearArray);
        localStorage.setItem(`startyears`, dataString);
        const localstartyear = localStorage.getItem('startyears');
        // document.getElementById('strtyr').innerHTML = localstartyear;

        let localStorageStartYearArray = JSON.parse(localstartyear);
        let displayStartYearText = document.querySelectorAll('#strtyr');
        for (let i = 0; i < localStorageStartYearArray.length; i++) {
            if (displayStartYearText[i]) {
                displayStartYearText[i].textContent = localStorageStartYearArray[i];
            }
        }
    }

    function displayenddt() {
        let allEndYearFields = document.querySelectorAll(".endyearclass");
        let endYearArray = [];
        allEndYearFields.forEach(element => {
            endYearArray.push(element.value);
        });
        let dataString = JSON.stringify(endYearArray);
        localStorage.setItem(`endyears`, dataString);
        const localendyear = localStorage.getItem('endyears');
        // document.getElementById('endyr').innerHTML = localendyear;

        let localStorageEndYearArray = JSON.parse(localendyear);
        let displayEndYearText = document.querySelectorAll('#endyr');
        for (let i = 0; i < localStorageEndYearArray.length; i++) {
            if (displayEndYearText[i]) {
                displayEndYearText[i].textContent = localStorageEndYearArray[i];
            }
        }
    }

    function displaysoyj() {
        let allJobSummaryFields = document.querySelectorAll(".jobsummaryclass");
        let jobSummaryArray = [];
        allJobSummaryFields.forEach(element => {
            jobSummaryArray.push(element.value);
        });
        let dataString = JSON.stringify(jobSummaryArray);
        localStorage.setItem(`jobsumarys`, dataString);
        const localjobsumary = localStorage.getItem('jobsumarys');
        // document.getElementById('jbsmry').innerHTML = localjobsumary;

        let localStorageJobSumaryArray = JSON.parse(localjobsumary);
        let displayJobSumaryText = document.querySelectorAll('#jbsmry');
        for (let i = 0; i < localStorageJobSumaryArray.length; i++) {
            if (displayJobSumaryText[i]) {
                displayJobSumaryText[i].textContent = localStorageJobSumaryArray[i];
            }
        }
    }

    function removenewexperience() {
        // Remove the last .education-fields div but keep the first one intact
        const experienceFields = $('#addnewexperiencefields .experience-fields');
        if (experienceFields.length > 1) {
            experienceFields.last().remove();
        }
    
        let allnewexperiencenode = document.querySelectorAll('.newtemplatexperiencecreatednode');
        if (allnewexperiencenode.length > 0) {
            // console.log(allneweducationode[allneweducationode.length - 1]);
            allnewexperiencenode[allnewexperiencenode.length - 1].remove();
        }
    
    }


    // code to add new skill fields
    let skillinputCount = 0;

    function addnewskill() {

        let skillTextEmptyCheck = document.querySelector('#skl');
        if (skillTextEmptyCheck.value == "") {
            let emptySkillError = document.getElementById('error18');
            emptySkillError.innerText = "Please enter your skill.";
        } 
        else {
        const newSkillFields = `
            <div class="skill-fields margintp">
                <div class="prow">
                    <div class="pcol">
                        <label for="skl">Skill</label><br>
                        <input type="text" class="skillclass" oninput="displayskill()" name="skl[]" id="skl"
                            placeholder="e.g. Graphic Designer">
                        <div id="error18" style="color:red; font-size:18px; margin-top: 7px;"></div>
                    </div>
                    <div class="pcol">
                        <label for="skillpercentage">Skill Percentage</label><br>
                        <input type="number" class="skillpercentageclass" oninput="displayskillp()" name="skillpercentage[]" id="skillpercentage"
                            placeholder="e.g. 78%">
                        <div id="error19" style="color:red; font-size:18px; margin-top: 7px;"></div>
                    </div>
                </div>
            </div>
            `;
        const $newNode = $(newSkillFields);

        $('#addnewskillfields #addnewskillfieldsafter').before($newNode);

        let newtemplateskillnode = `
                    <div class="box newtemplateskillcreatednode">
                            <h4 id="skls" class="cdskl1">HTML</h4>
                            <div class="percent">
                                <div id="sklprtg" class="cdsklp1"></div>
                            </div>
                    </div>
            `;
            let templateskill = document.getElementById('templateskill');
            templateskill.insertAdjacentHTML('beforeend', newtemplateskillnode);
        }
    }

    function displayskill() {
        document.querySelectorAll('.dummyskilltext').forEach(e => e.remove());
        const allskillFields = document.querySelectorAll('.skillclass');
        let skillArray = [];
        allskillFields.forEach(element => {
            skillArray.push(element.value);
        });
        let dataString = JSON.stringify(skillArray);
        localStorage.setItem("skills", dataString);
        let localskill = localStorage.getItem('skills');
        // document.getElementById('skls').innerHTML = localskill;

        let localStorageSkillArray = JSON.parse(localskill);
        let displaySkillText = document.querySelectorAll('#skls');
        for (let i = 0; i < localStorageSkillArray.length; i++) {
            if (displaySkillText[i]) {
                displaySkillText[i].textContent = localStorageSkillArray[i];
            }
        }
    }


    function displayskillp() {
        const allSkillPercentageFields = document.querySelectorAll('.skillpercentageclass');
        let skillPernectageArray = [];
        allSkillPercentageFields.forEach(element => {
            skillPernectageArray.push(element.value);
        });
        let dataString = JSON.stringify(skillPernectageArray);
        localStorage.setItem("skillpercentage", dataString);
        let localskillpercentage = localStorage.getItem('skillpercentage');
        // document.getElementById('sklprtg').innerHTML = localskillpercentage;
        // let percentage = document.getElementById('sklprtg');
        // width = localskillpercentage + '%';
        // percentage.style.width = width;

        let localStorageSkillPercentageArray = JSON.parse(localskillpercentage);
        let displaySkillPercentageText = document.querySelectorAll('#sklprtg');
        for (let i = 0; i < localStorageSkillPercentageArray.length; i++) {
            if (displaySkillPercentageText[i]) {
                // displaySkillPercentageText[i].textContent = localStorageSkillPercentageArray[i];
                displaySkillPercentageText[i].style.width = localStorageSkillPercentageArray[i]+'%';
            }
        }

    }

    function removenewskill() {
        const skillFields = $('#addnewskillfields .skill-fields');
        if (skillFields.length > 1) {
            skillFields.last().remove();
        }

        let allnewskillnode = document.querySelectorAll('.newtemplateskillcreatednode');
        if (allnewskillnode.length > 0) {
            allnewskillnode[allnewskillnode.length - 1].remove();
        }
    }



    // code to add new hobby fields
    let hobbyinputCount = 0;

    function addnewhobby() {

        let hobbyTextEmptyCheck = document.querySelector('#hobby');
        if (hobbyTextEmptyCheck.value == "") {
            let emptyHobbyError = document.getElementById('error21');
            emptyHobbyError.innerText = "Please enter your hobby.";
        } 
        else {
            const newHobbyFields = `
                <div class="pcol hobby-field" id="moveleft" style="margin-top: 30px;">
                    <input type="text" class="hobbyclass" oninput="displayhobby()" name="hobby[]" id="hobby"
                    placeholder="e.g. Reading">
                    <div id="error21" style="color:red; font-size:18px; margin-top: 7px;"></div>  
                </div>
                `;
            const $newNode = $(newHobbyFields);

            // Insert the new node inside #addneweducationfieldsafter but before #addneweducationfieldsafter
            $('#addnewinputhobby #addnewinputhobbyafter').before($newNode);

            let newtemplatehobbynode = `<li id="hob" class="cdhob1">Reading</li>`;
                let templatehobby = document.getElementById('templatehobby');
                templatehobby.insertAdjacentHTML('beforeend', newtemplatehobbynode);
        }
    }

    function displayhobby() {
        document.querySelectorAll('.dummyhobbytext').forEach(e => e.remove());
        const allhobbyFields = document.querySelectorAll('.hobbyclass');
        let hobbyArray = [];
        allhobbyFields.forEach(element => {
            hobbyArray.push(element.value);
        });
        let dataString = JSON.stringify(hobbyArray);
        localStorage.setItem("hobbies", dataString);
        let localhobbies = localStorage.getItem('hobbies');
        // document.getElementById('hob').innerHTML = localhobbies;

        let localStorageHobbyArray = JSON.parse(localhobbies);
        let displayHobbyText = document.querySelectorAll('#hob');
        for (let i = 0; i < localStorageHobbyArray.length; i++) {
            if (displayHobbyText[i]) {
                displayHobbyText[i].textContent = localStorageHobbyArray[i];
            }
        }
    }

    function removenewhobby() {
        // Remove the last .education-fields div but keep the first one intact
        const hobbyFields = $('#addnewinputhobby .hobby-field');
        if (hobbyFields.length > 1) {
            hobbyFields.last().remove();
        }
        
        displayHobbyText = document.querySelectorAll('.cdhob1');
        if (displayHobbyText.length > 1) {
            displayHobbyText[displayHobbyText.length - 1].remove();
        }

    }

    // code to add new links fields
    let linkinputCount = 0;

    function addnewlink() {

        let linksTextEmptyCheck = document.querySelector('#links');
        if (linksTextEmptyCheck.value == "") {
            let emptyLinksError = document.getElementById('error20');
            emptyLinksError.innerText = "Please enter your links.";
        } 
        else {
            const newLinkFields = `
                <div class="pcol links-field" id="moveleft" style="margin-top: 30px;">
                    <input type="text" class="linkclass" oninput="displaylink()" name="links[]" id="links"
                    placeholder="e.g. Linkd in">
                    <div id="error20" style="color:red; font-size:18px; margin-top: 7px;"></div>  
                </div>
                `;
            const $newNode = $(newLinkFields);

            // Insert the new node inside #addneweducationfieldsafter but before #addneweducationfieldsafter
            $('#addnewinputlinks #addnewinputlinksafter').before($newNode);

            let newtemplatelinksnode = `<li id="lnk" class="cdlnk1">www.LinkedIn.com</li>`;
            let templatelinks = document.getElementById('templatelinks');
            templatelinks.insertAdjacentHTML('beforeend', newtemplatelinksnode);
        }
    }

    function displaylink() {
        document.querySelectorAll('.dummylinkstext').forEach(e => e.remove());
        const allLinksFields = document.querySelectorAll('.linkclass');
        let linksArray = [];
        allLinksFields.forEach(element => {
            linksArray.push(element.value);
        });
        let dataString = JSON.stringify(linksArray);
        localStorage.setItem("links", dataString);
        let localLinks = localStorage.getItem('links');
        // document.getElementById('lnk').innerHTML = localLinks;

        let localStorageLinksArray = JSON.parse(localLinks);
        let displayLinksText = document.querySelectorAll('#lnk');
        for (let i = 0; i < localStorageLinksArray.length; i++) {
            if (displayLinksText[i]) {
                displayLinksText[i].textContent = localStorageLinksArray[i];
            }
        }
    }

    function removenewlink() {
        // Remove the last .education-fields div but keep the first one intact
        const linksFields = $('#addnewinputlinks .links-field');
        if (linksFields.length > 1) {
            linksFields.last().remove();
        }

        // let localLinks = localStorage.getItem('links');

        // if (localLinks) {
        //     // Parse the JSON string into an array
        //     let linkArray = JSON.parse(localLinks);

        //     // Remove the last element from the array
        //     if (linkArray.length > 1) {
        //         linkArray.pop();
        //     }

        //     // Convert the updated array back to a JSON string
        //     let updatedLinksDataString = JSON.stringify(linkArray);
        //     localStorage.setItem('links', updatedLinksDataString);

        //     localLinks = localStorage.getItem('links');
        //     document.getElementById('lnk').innerHTML = localLinks
        // }
        displayLinksText = document.querySelectorAll('.cdlnk1');
        if (displayLinksText.length > 1) {
            displayLinksText[displayLinksText.length - 1].remove();
        }

    }


    // as the string returned from this function will not be displayed in the browser, browser prevents it to display and 
    // browser display their own defult string value.
    //   window.onbeforeunload = function () {
    //         return "Are you sure you want to leave? Any unsaved changes will be lost.";
    //     };

    // Once the form is submitted, remove the beforeunload event listener
    function formSubmitted() {
        window.onbeforeunload = null;
    }

    // window.onload=()=>{
    //     let form=document.getElementById('editorForm');
    //     form.onsubmit=(e)=>{
    //         e.preventDefault();
    //     }
    // }

    <?php 
       if (isset($_GET['edit'])) {
            echo"
            function addeditdata() {
                document.getElementById('dfname').innerHTML =  '$fname';

                document.getElementById('dlname').innerHTML = '$lname';

                document.getElementById('cont1').innerHTML = '$phn';

                document.getElementById('cont2').innerHTML = '$eml';

                document.getElementById('cont3').innerHTML = '$city';

                document.getElementById('cont4').innerHTML = '$state';

                document.getElementById('cont5').innerHTML = '$country';

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
                

                // code to add all the data in respective fields 

                const fname = document.getElementById('fname');
                fname.value='$fname';  
                 
                const lname = document.getElementById('lname');
                lname.value='$lname';

                const phone = document.getElementById('phonenumber');
                phone.value='$phn';

                const email = document.getElementById('email');
                email.value='$eml';

                const city = document.getElementById('city');
                city.value='$city';

                const state = document.getElementById('state');
                state.value='$state';

                const country = document.getElementById('country');
                country.value='$country';

                const prfsmry = document.getElementById('profilesummary');
                prfsmry.value='$profile';

                const sclname = document.getElementById('schoolname');
                sclname.value='$schoolname';
                
                const sclloc = document.getElementById('schoollocation');
                sclloc.value='$schoollocation';

                const degree = document.getElementById('degree');
                degree.value='$degree';

                const sclyer = document.getElementById('year');
                sclyer.value='$year';

                const fost = document.getElementById('fieldofstudy');
                fost.value='$fieldofstudy';

                const jbtl = document.getElementById('jobtitle');
                jbtl.value='$jobtitle';

                const employr = document.getElementById('employer');
                employr.value='$employer';

                const strtdate = document.getElementById('startyear');
                strtdate.value='$startyear';

                const enddate = document.getElementById('endyear');
                enddate.value='$endyear';

                const jobsumary = document.getElementById('jobsummary');
                jobsumary.value='$jobsummary';

                const skill = document.getElementById('skl');
                skill.value='$skill';

                const skillp = document.getElementById('skillpercentage');
                skillp.value='$skillperncentage';

                const hoby = document.getElementById('hobby');
                hoby.value='$hobby';

                const link = document.getElementById('links');
                link.value='$link';

                const lang = document.getElementById('language');
                lang.value='$language';

            }

            const searchParams = new URLSearchParams(window.location.search);
            if (searchParams.has('edit')) {
                addeditdata();
            }";
        }
    ?>

    function clearLocalStorage() {
        localStorage.clear();
    }
    </script>
</body>

</html>