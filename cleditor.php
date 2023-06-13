<?php
  session_start();
  $_SESSION['tmp'] =$_POST['tmp'];
  $template=$_SESSION['tmp'];
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
    <link rel="stylesheet" href="cleditor.css">
</head>

<body>
    <!-- navbar -->
    <?php
       include("headfoot/navbar.php");
    ?>

    <!-- Editor -->
    <div class="main">
        <!-- left -->
        <div class="left">
            <!-- personal details -->
            <form action="cltemplates/cltemplate<?php echo $_POST['tmp']; ?>.php" method="post">
                <!-- <form action="complete.php" method="post"> -->
                <!-- <form action="testdownload.php" method="post"> -->
                <div class="clpi">
                    <h1 style="font-size: 40px;">Personal Details</h1>
                    <div class="clpcentr">

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="First name">First name</label><br>
                                <input type="text" oninput="displayvalue()" name="fname" id="clfname"
                                    placeholder="e.g. Ramesh" maxlength="20">
                            </div>
                            <div class="clpcol">
                                <label for="Last name">Last name</label> <br>
                                <input type="text" oninput="displayvalue()" name="lname" id="cllname"
                                    placeholder="e.g. Mishra" maxlength="20">
                            </div>
                        </div>

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="Phone number">Phone number</label> <br>
                                <input type="text" oninput="displayvalue()" name="phn" id="clphn"
                                    placeholder="e.g. +91 9867982828">
                            </div>
                            <div class="clpcol">
                                <label for="Email">Email</label><br>
                                <input type="text" oninput="displayvalue()" name="eml" id="cleml"
                                    placeholder="e.g. rameshmishra@gmail.com">
                            </div>
                        </div>

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="City">City</label><br>
                                <input type="text" oninput="displayvalue()" name="city" id="clcity"
                                    placeholder="e.g. Mumbai">
                            </div>
                            <div class="clpcol">
                                <label for="State">State</label><br>
                                <input type="text" oninput="displayvalue()" name="state" id="clstate"
                                    placeholder="e.g. Maharashtra">
                            </div>
                        </div>
                        <div class="clptxtarea">
                            <label for="Country">Country</label><br>
                            <input type="text" id="clcountry" name="country" oninput="displayvalue()"
                                placeholder="e.g. India">
                        </div>
                    </div>
                    <div class="prevnextbtn">
                        <div class="backbtn">
                            <a id="bk">Back</a>
                        </div>
                        <div class="nextbtn">
                            <a id="nxt" onclick="toprfsumry()">Next</a>
                        </div>
                    </div>

                </div>

                <!--  Recipient  -->

                <div class="clprfsumry">
                    <h1 style="font-size: 40px;">Recipient</h1>
                    <div class="clpcentr">

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="Date">Date</label><br>
                                <input type="text" oninput="displayvalue()" name="date" id="ccldate"
                                    placeholder="e.g. feb 2 2070">
                            </div>
                            <div class="clpcol">
                                <label for="cmp">Company Name</label><br>
                                <input type="text" oninput="displayvalue()" name="cmp" id="cclcmp"
                                    placeholder="e.g. TCS">
                            </div>
                        </div>

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="First name">First name</label><br>
                                <input type="text" oninput="displayvalue()" name="fname" id="cclfname"
                                    placeholder="e.g. Ramesh" maxlength="20">
                            </div>
                            <div class="clpcol">
                                <label for="Last name">Last name</label> <br>
                                <input type="text" oninput="displayvalue()" name="lname" id="ccllname"
                                    placeholder="e.g. Mishra" maxlength="20">
                            </div>
                        </div>

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="Phone number">Phone number</label> <br>
                                <input type="text" oninput="displayvalue()" name="phn" id="cclphn"
                                    placeholder="e.g. +91 9867982828">
                            </div>
                            <div class="clpcol">
                                <label for="Email">Email</label><br>
                                <input type="text" oninput="displayvalue()" name="eml" id="ccleml"
                                    placeholder="e.g. rameshmishra@gmail.com">
                            </div>
                        </div>

                        <div class="clprow">
                            <div class="clpcol">
                                <label for="City">City</label><br>
                                <input type="text" oninput="displayvalue()" name="city" id="cclcity"
                                    placeholder="e.g. Mumbai">
                            </div>
                            <div class="clpcol">
                                <label for="State">State</label><br>
                                <input type="text" oninput="displayvalue()" name="state" id="cclstate"
                                    placeholder="e.g. Maharashtra">
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

                <!--subject -->

                <div class="cled">
                    <h1 style="font-size: 40px;">Subject</h1>
                    <div class="clpcentr">

                        <div class="clptxtarea">
                            <label for="Subject">Job Title</label><br>
                            <input type="text" oninput="displayvalue()" name="jobt" id="ccljobt"
                                    placeholder="e.g. job title">

                             </div>

                             <!-- <div class="ptxtarea">
                                <label for="Subject"> HR</label><br>
                                <input type="text" oninput="displayvalue()" name="jobt" id="jobt"
                                        placeholder="e.g. Dear[Ms.or Mr.Last Name]">
    
                                 </div> -->
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

                <div class="clexp">
                    <h1 style="font-size: 40px;">Greeting
                     </h1>
                    <div class="clpcentr">
                         
                        <div class="ptxtarea">
                            <label for="Subject"> Mr name</label><br>
                            <input type="text" oninput="displayvalue()" name="jobt" id="cclmrname"
                                    placeholder="e.g. Dear[Ms.or Mr.Last Name]">


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

                <div class="clskl">
                    <h1 style="font-size: 40px;">Opener</h1>
                    <div class="clpcentr">

                        <label for="Summary of your job"></label><br>
                        <textarea oninput="displayvalue()" id="clp1" name="clp1"
                            placeholder="e.g. Experienced PMP with a background in law and 7+ years experience growing revenue"></textarea>
                    

                    </div>

                    <!-- letter body -->
                    <h1 style="font-size: 40px; margin-top: 50px;">Letter Body</h1>
                    <div class="clpcentr">

                        <label for="letter body"></label><br>
                        <textarea oninput="displayvalue()" id="clp2" name="clp2"
                            placeholder="e.g. Experienced PMP with a background in law and 7+ years experience growing revenue"></textarea>
                    

                    </div>

                    <!-- cta -->

                    <h1 style="font-size: 40px;  margin-top: 50px;">Call To Action</h1>
                    <div class="clpcentr">

                        <label for="letter body"></label><br>
                        <textarea oninput="displayvalue()" id="clp3" name="clp3"
                            placeholder="e.g. Experienced PMP with a background in law and 7+ years experience growing revenue"></textarea>
                    

                    </div>

                    


                    <div class="prevnextbtn">
                        <div class="backbtn">
                            <a id="bk" onclick="toexperience()">Back</a>
                        </div>
                        <div class="nextbtn">
                          <a id="nxt" onclick="complete()">Next</a>
                        </div>
                    </div>
                </div>
 
                <!-- editpage section -->

                <div class="rightbaju" style="display:none;">
                    <h1 style="padding-bottom:30px;">Resume Sections</h1>
                    <div class="backpagenav">
                        <div class="edbtn"><a id="editlinks" onclick="editprslinfo()">Personal Detail</a></div>
                        <div class="edbtn"><a id="editlinks" onclick="editprofile()">Recipient</a></div>
                        <div class="edbtn"><a id="editlinks" onclick="editeducation()">Subject</a></div>
                        <div class="edbtn"><a id="editlinks" onclick="editexperience()">Greeting</a></div>
                        <div class="edbtn"><a id="editlinks" onclick="editskl()">About Yourself</a></div>
                    </div>
                </div>



                <!-- closer  -->

                <!-- <div class="closer">
                    <h1 style="font-size: 40px;">Closer</h1>
                    <div class="clpcentr">

                        <label for="letter body"></label><br>
                        <textarea oninput="displayvalue()" id="clp4" name="clp1"
                            placeholder="e.g. Experienced PMP with a background in law and 7+ years experience growing revenue"></textarea>
                    

                    </div>
                    <div class="prevnextbtn">
                        <div class="backbtn">
                            <a id="bk" onclick="tocta()">Back</a>
                        </div>
                        <div class="nextbtn">
                            <a href="complete.php">
                                <input id="nxt" type="submit" name="sub" value="complete">
                                 </a>
                        </div>
                    </div>
                </div> -->
<!--  -->
            </form>
        </div>

        <!-- Right -->

        <div class="right">
            <div class="imgdiv" id="frame">
                <div class="rimg">
                    <!-- resumetemplate -->
                    <?php

                    if($template == "1"){
                    include 'cltemplates/cltemplate1.php';
                    } elseif($template == "2"){
                    include 'cltemplates/cltemplate2.php';
                    } elseif($template == "3"){
                    include 'cltemplates/cltemplate3.php';
                    } elseif($template == "4"){
                    include 'cltemplates/cltemplate4.php';
                    } elseif($template == "5"){
                    include 'cltemplates/cltemplate5.php';
                    } elseif($template == "6"){
                    include 'cltemplates/cltemplate6.php';
                    } elseif($template == "7"){
                    include 'cltemplates/cltemplate7.php';
                    } elseif($template == "8"){
                    include 'cltemplates/cltemplate8.php';
                    } elseif($template == "9"){
                    include 'cltemplates/cltemplate9.php';
                    } elseif($template == "10"){
                    include 'cltemplates/cltemplate10.php';
                    }elseif($template == "11"){
                    include 'cltemplates/cltemplate11.php';
                    }
                    //elseif($template == "8"){
                    //  include 'cltemplates/cltemplate8.php';
                    // }
    
    

                    ?>

                </div>
            </div>

            <!-- download and print button -->

            <div class="downloadprintbtn" style="display:none;">
                <div class="downlodbtn">
                    <button type="submit" onclick="downloadpdf()">Download pdf</button>
                </div>

                <div class="printbtn">
                    <button onclick="window.print()">Print</button>
                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php
                  include("headfoot/footer.php");
                 ?>

    <script src="headfoot/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
    <!--jspsdf and html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    
    <script>

        function downloadpdf(){

                let frame=document.getElementById("frame");
                
                        
                html2canvas(frame,{scale:3}).then((canvas)=>{
                        let imgData = canvas.toDataURL('image/jpeg', 1.0);
                        let pdf = new jsPDF('p', 'px', [canvas.width*0.99,canvas.height*0.99]);
                        pdf.addImage(imgData, 'JPEG', 0, 0, canvas.width,canvas.height);
                        pdf.save('html2canvasjsPDFwithscale.pdf');
                    });
        }

    </script>    
   
   <script>
        // js for displaying other sections of editor on click
        let clpi = document.querySelector(".clpi");
        let clprfs = document.querySelector(".clprfsumry");
        let cled = document.querySelector(".cled");
        let clexp = document.querySelector(".clexp");
        let clskl = document.querySelector(".clskl");
        let right = document.querySelector(".right");
        let left = document.querySelector(".left");
        let editnav = document.querySelector(".rightbaju");
        let imgdiv = document.querySelector(".imgdiv");
        let downloadprintbtn = document.querySelector(".downloadprintbtn");

        function toprfsumry() {
            clpi.style.display = "none";
            clprfs.style.display = "block";
            cled.style.display = "none";
            clexp.style.display = "none";
            clskl.style.display = "none";
            editnav.style.display = "none";
            downloadprintbtn.style.display = "none";
        }

       
        function toeducation() {
            clpi.style.display = "none";
            clprfs.style.display = "none";
            cled.style.display = "block";
            clexp.style.display = "none";
            clskl.style.display = "none";
            editnav.style.display = "none";
            downloadprintbtn.style.display = "none";
        }

        function toprslinfo() {
            clpi.style.display = "block";
            clprfs.style.display = "none";
            cled.style.display = "none";
            clexp.style.display = "none";
            clskl.style.display = "none";
            editnav.style.display = "none";
            downloadprintbtn.style.display = "none";
        }

        function toexperience() {
            clpi.style.display = "none";
            clprfs.style.display = "none";
            cled.style.display = "none";
            clexp.style.display = "block";
            clskl.style.display = "none";
            editnav.style.display = "none";
            downloadprintbtn.style.display = "none";
        }

        function toskl() {
            clpi.style.display = "none";
            clprfs.style.display = "none";
            cled.style.display = "none";
            clexp.style.display = "none";
            clskl.style.display = "block";
            editnav.style.display = "none";
            downloadprintbtn.style.display = "none";
        }

        // function toletb() {
        //     clprfs.style.display = "none";
        //     cled.style.display = "none";
        //     clpi.style.display = "none";
        //     clexp.style.display = "none";
        //     clskl.style.display = "none";
        //     // letb.style.display = "block";
        //     // cta.style.display = "none";
        //     // closer.style.display = "none";
        // }

        // function tocta() {
        //     clpi.style.display = "none";
        //     clprfs.style.display = "none";
        //     cled.style.display = "none";
        //     clexp.style.display = "none";
        //     clskl.style.display = "none";
        //     // letb.style.display = "none";
        //     // cta.style.display = "block";
        //     // closer.style.display = "none";
        // }

        // function tocloser() {
        //     clpi.style.display = "none";
        //     clprfs.style.display = "none";
        //     cled.style.display = "none";
        //     clexp.style.display = "none";
        //     clskl.style.display = "none";
        //     // letb.style.display = "none";
        //     // cta.style.display = "none";
        //     // closer.style.display = "block";
        // }

        function complete() {
            clpi.style.display = "none";
            clprfs.style.display = "none";
            cled.style.display = "none";
            clexp.style.display = "none";
            clskl.style.display = "none";
            editnav.style.display = "block";
            imgdiv.style.width = "100%";
            right.style.marginRight = "100px";
            right.style.marginLeft = "-100px";
            downloadprintbtn.style.display = "flex";
        }

        //js code to add edit functionality

    function editprslinfo() {
        clpi.style.display = "block";
        cled.style.display = "none";
        clexp.style.display = "none";
        clskl.style.display = "none";
        editnav.style.display = "none";
        imgdiv.style.width = "75%";
        right.style.marginRight = "0px";
        right.style.marginLeft = "0px";
        downloadprintbtn.style.display = "none";
    }


    function editprofile() {
        clpi.style.display = "none";
        clprfs.style.display = "block";
        cled.style.display = "none";
        clexp.style.display = "none";
        clskl.style.display = "none";
        editnav.style.display = "none";
        imgdiv.style.width = "75%";
        right.style.marginRight = "0px";
        right.style.marginLeft = "0px";
        downloadprintbtn.style.display = "none";
    }


    function editeducation() {
        clpi.style.display = "none";
        cled.style.display = "block";
        clexp.style.display = "none";
        clskl.style.display = "none";
        editnav.style.display = "none";
        imgdiv.style.width = "75%";
        right.style.marginRight = "0px";
        right.style.marginLeft = "0px"
        downloadprintbtn.style.display = "none";

    }


    function editexperience() {
        clpi.style.display = "none";
        cled.style.display = "none";
        clexp.style.display = "block";
        clskl.style.display = "none";
        editnav.style.display = "none";
        imgdiv.style.width = "75%";
        right.style.marginRight = "0px";
        right.style.marginLeft = "0px"
        downloadprintbtn.style.display = "none";
    }


    function editskl() {
        clpi.style.display = "none";
        cled.style.display = "none";
        clexp.style.display = "none";
        clskl.style.display = "block";
        editnav.style.display = "none";
        imgdiv.style.width = "75%";
        right.style.marginRight = "0px";
        right.style.marginLeft = "0px"
        downloadprintbtn.style.display = "none";
    }

        // js for realtime diplay of input value in template


        function displayvalue() {

            // for first name
            const clfname = document.getElementById('clfname').value;
            localStorage.setItem("clfname", clfname);
            const dclfname = localStorage.getItem('clfname');
            document.getElementById('cvlfname').innerHTML = dclfname;

            // for last name
            const cllname = document.getElementById('cllname').value;
            localStorage.setItem("cllname", cllname);
            const dcllname = localStorage.getItem('cllname');
            document.getElementById('cvlname').innerHTML = dcllname;

            // for phone number
            const clphone = document.getElementById('clphn').value;
            localStorage.setItem("clphone", clphone);
            const dclphone = localStorage.getItem('clphone');
            document.getElementById('cvlphone').innerHTML = dclphone;

            // for email
            const clemail = document.getElementById('cleml').value;
            localStorage.setItem("clemail", clemail);
            const dclemail = localStorage.getItem('clemail');
            document.getElementById('cvlemail').innerHTML = dclemail;

            // for city
            const clcity = document.getElementById('clcity').value;
            localStorage.setItem("clcity", clcity);
            const dclcity = localStorage.getItem('clcity');
            document.getElementById('cvlcity').innerHTML = dclcity;

            // for country
            const clcountry = document.getElementById('clcountry').value;
            localStorage.setItem("clcountry", clcountry);
            const dclcountry = localStorage.getItem('clcountry');
            document.getElementById('cvlcount').innerHTML = dclcountry;

            // for state
            const clstate = document.getElementById('clstate').value;
            localStorage.setItem("clstate", clstate);
            const dclstate = localStorage.getItem('clstate');
            document.getElementById('cvlstate').innerHTML = dclstate;


            // 2 page

            // for date
            const ccldate = document.getElementById('ccldate').value;
            localStorage.setItem("ccldate", ccldate);
            const dccldate = localStorage.getItem('ccldate');
            document.getElementById('ccvldate').innerHTML = dccldate;


            // for company name
            const cclcmp = document.getElementById('cclcmp').value;
            localStorage.setItem("cclcmp", cclcmp);
            const dcclcmp = localStorage.getItem('cclcmp');
            document.getElementById('ccvlcmp').innerHTML = dcclcmp;



             // for first name
            const cclfname = document.getElementById('cclfname').value;
            localStorage.setItem("cclfname", cclfname);
            const dcclfname = localStorage.getItem('cclfname');
            document.getElementById('ccvlfname').innerHTML = dcclfname;


            // for last name
            const ccllname = document.getElementById('ccllname').value;
            localStorage.setItem("ccllname", ccllname);
            const dccllname = localStorage.getItem('ccllname');
            document.getElementById('ccvlname').innerHTML = dccllname;

            // for phone number
            const cclphone = document.getElementById('cclphn').value;
            localStorage.setItem("cclphone", cclphone);
            const dcclphone = localStorage.getItem('cclphone');
            document.getElementById('ccvlphone').innerHTML = dcclphone;

            // for email
            const cclemail = document.getElementById('ccleml').value;
            localStorage.setItem("cclemail", cclemail);
            const dcclemail = localStorage.getItem('cclemail');
            document.getElementById('ccvlemail').innerHTML = dcclemail;

            // for city
            const cclcity = document.getElementById('cclcity').value;
            localStorage.setItem("cclcity", cclcity);
            const dcclcity = localStorage.getItem('cclcity');
            document.getElementById('ccvlcity').innerHTML = dcclcity;

            // for state
            const cclstate = document.getElementById('cclstate').value;
            localStorage.setItem("cclstate", cclstate);
            const dcclstate = localStorage.getItem('cclstate');
            document.getElementById('ccvlstate').innerHTML = dcclstate;


            // for job
            const ccljobt = document.getElementById('ccljobt').value;
            localStorage.setItem("ccljobt", ccljobt);
            const dccljobt = localStorage.getItem('ccljobt');
            document.getElementById('ccvljob').innerHTML = dccljobt;
         

            // for mr name
            const cclmrname = document.getElementById('cclmrname').value;
            localStorage.setItem("cclmrname", cclmrname);
            const dcclmrname = localStorage.getItem('cclmrname');
            document.getElementById('ccvlsname').innerHTML = dcclmrname;
        
             // for para 1
             const clp1 = document.getElementById('clp1').value;
            localStorage.setItem("clp1",  clp1);
            const dclp1 = localStorage.getItem('clp1');
            document.getElementById('cvlpara1').innerHTML = dclp1;
        
            
            // for para 2
            const clp2 = document.getElementById('clp2').value;
            localStorage.setItem("clp2", clp2);
            const dclp2 = localStorage.getItem('clp2');
            document.getElementById('cvlpara2').innerHTML = dclp2;
        

             // for para 3
             const clp3 = document.getElementById('clp3').value;
            localStorage.setItem("clp3", clp3);
            const dclp3 = localStorage.getItem('clp3');
            document.getElementById('cvlpara3').innerHTML = dclp3;


 }
    </script>

<!-- <div class="ptxtarea">
    <label for="Summary of your job">Summary of your job</label><br>
    <textarea oninput="displayvalue()" id="soyj" name="soyj"
        placeholder="e.g. Experienced PMP with a background in law and 7+ years experience growing revenue"></textarea>
</div>
</div> -->
</body>

</html>