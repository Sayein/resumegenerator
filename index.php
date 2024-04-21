<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Generator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" />
    <script src="https://kit.fontawesome.com/ff61fbf734.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation section -->
    <?php
       include("headfoot/navbar.php");
    ?>
    <!-- Hero section -->
    <section>
        <div class="herosec">
            <div class="row">
                <div class="sherosec">
                    <div class="leftcontent">
                        <p>Get Your <span class="span1">Dream Job</span> With The Help Of Your <span
                                class="span1">Professional shoyabgit</span>
                            Resume.</p>
                        <span class="heropara">We help you create your perfect resume to grab your dream job.</span>

                        <?php 

                 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                   echo '<div class="btngrid"><a href="resumetemplate.php"><button type="submit" class="herobtn">Create Your Resume</button></a></div>';
                 }
                  else{
                    echo '<div class="btngrid"><a href="sign.php"><button type="submit" class="herobtn">Create Your Resume</button></a></div>';
                  }

                ?>
                    </div>
                    <div class="rightcontent">
                        <!-- for responsivenes of rightside of the hero section  -->
                        <div class="bgt">
                            <div class="imgcontainer">
                                <!-- <img class="resumeimg" src="images/guideresume/resume.webp" height="500" alt="Resume"> -->
                            </div>
                        </div>

                        <img class="heroimg" src="images/hreoimg.jpg" alt="hero section image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guid section -->

    <section>
        <div class="guidesec">
            <div class="row">
                <h1>Step-By-Step Guide For Building Your Professional Resume</h1>
                <div class="guidebox">
                    <div class="leftguide">
                        <div class="guideboximg">
                        <img class="guideimg" id="gi1" src="images/resumeTemplateimg/guide-template.png" alt="Guide images">
                        </div>
                    </div>
                    <div class="rightguide">
                        <div class="gcontent" onmouseover="changeimg()">
                            <div class="numreldiv">
                                <div class="numanime">
                                    <div class="inside">
                                        <div class="value">1</div>
                                    </div>
                                  
                                </div>
                            </div>
                            <h3> Choose your template.</h3>
                            <div class="pwidth">
                                <p>Choose the template that fits
                                    best to your need and your</p>
                                <p>requirement.</p>
                            </div>
                        </div>
                        <div class="gcontent" onmouseover="changeimg1()">
                            <div class="numreldiv">
                                <div class="numanime">
                                    <div class="inside">
                                        <div class="value">2</div>
                                    </div>
                                </div>
                            </div>
                            <h3> Tell us about yourself. </h3>
                            <div class="pwidth">
                                <p> Write about yourself, your passion,
                                    your skills and your</p>
                                <p>experience </p>
                            </div>
                        </div>
                        <div class="gcontent" onmouseover="changeimg2()">
                            <div class="numreldiv">
                                <div class="numanime">
                                    <div class="inside">
                                        <div class="value">3</div>
                                    </div>
                                  
                                </div>
                            </div>
                            <h3> Confirm your details. </h3>
                            <div class="pwidth">
                                <p> Be sure about your resume by confirming your details. </p>
                            </div>
                        </div>
                        <div class="gcontent" onmouseover="changeimg3()">
                            <div class="numreldiv">
                                <div class="numanime">
                                    <div class="inside">
                                        <div class="value">4</div>
                                    </div>
                                  
                                </div>
                            </div>
                            <h3> Download or share </h3>
                            <div class="pwidth">
                                <p> Download or share your document in
                                    various formats such as</p>
                                <p>pdf,docx,etc. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEMPLATE SLIDER SECTION -->

    <section>
        <div class="mainslide">
            <div class="row">
                <div class="slideheading">
                    <h1>Select Professional Resume That Matches Your Passion</h1>
                </div>
                <div id="slider-2">
                    <div class="container wide">
                        <div class="swiper" id="swiper-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <figure>
                                    <img src="images/resumeTemplateimg/resume-template-placeholder.png" height="700px"
                                        alt="resume template 1" />
                                        <form action="Editor.php" method="post">
                                            <button class="sliderbtn" type="submit" name="tmp" value="1">
                                                <figcaption>
                                                    Use This Template
                                                </figcaption>
                                            </button>
                                        </form>
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                    <img src="images/resumeTemplateimg/resume-template-placeholder.png" height="700px"
                                        alt="resume template 2" />
                                        <form action="Editor.php" method="post">
                                            <button class="sliderbtn" type="submit" name="tmp" value="2">
                                                <figcaption>
                                                    Use This Template
                                                </figcaption>
                                            </button>
                                        </form>
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                    <img src="images/resumeTemplateimg/resume-template-placeholder.png" height="700px"
                                        alt="resume template 3" />
                                        <form action="Editor.php" method="post">
                                            <button class="sliderbtn" type="submit" name="tmp" value="3">
                                                <figcaption>
                                                    Use This Template
                                                </figcaption>
                                            </button>
                                        </form>
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                    <img src="images/resumeTemplateimg/resume-template-placeholder.png" height="700px" alt="resume template 4" />
                                        <form action="Editor.php" method="post">
                                            <button class="sliderbtn" type="submit" name="tmp" value="4">
                                                <figcaption>
                                                    Use This Template
                                                </figcaption>
                                            </button>
                                        </form>
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                    <img src="images/resumeTemplateimg/resume-template-placeholder.png" height="700px" alt="resume template 5" />
                                        <form action="Editor.php" method="post">
                                            <button class="sliderbtn" type="submit" name="tmp" value="5">
                                                <figcaption>
                                                    Use This Template
                                                </figcaption>
                                            </button>
                                        </form>
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                    <img src="images/resumeTemplateimg/resume-template-placeholder.png" height="700px" alt="resume template 6" />
                                        <form action="Editor.php" method="post">
                                            <button class="sliderbtn" type="submit" name="tmp" value="6">
                                                <figcaption>
                                                    Use This Template
                                                </figcaption>
                                            </button>
                                        </form>
                                    </figure>
                                </div>
                            </div>
                            <div class="swiper-custom-nav">
                                <svg width="64" height="64" viewBox="0 0 64 64" id="nav-left" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M32 2.79753e-06C14.3269 4.34256e-06 -4.34256e-06 14.3269 -2.79753e-06 32C-1.2525e-06 49.6731 14.3269 64 32 64C49.6731 64 64 49.6731 64 32C64 14.3269 49.6731 1.2525e-06 32 2.79753e-06ZM28.9334 24.3999C28.6667 24.1333 28.4 23.9999 28 23.9999C27.6 23.9999 27.3334 24.1333 27.0667 24.3999L20.4 31.0666L20.4 31.0667C20.2 31.2667 20.075 31.5041 20.025 31.751C19.9417 32.1624 20.0666 32.6 20.4 32.9333L27.0667 39.6C27.6 40.1333 28.4 40.1333 28.9333 39.6C29.4667 39.0667 29.4667 38.2667 28.9333 37.7333L24.5334 33.3334L42.7222 33.3334C43.4889 33.3334 44 32.8 44 32C44 31.2 43.4889 30.6667 42.7222 30.6667L24.5333 30.6667L28.9334 26.2666C29.4667 25.7333 29.4667 24.9333 28.9334 24.3999Z"
                                        fill="white" />
                                </svg>
                                <svg width="64" height="64" viewBox="0 0 64 64" id="nav-right" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M32 64C49.6731 64 64 49.6731 64 32C64 14.3269 49.6731 0 32 0C14.3269 0 0 14.3269 0 32C0 49.6731 14.3269 64 32 64ZM35.0666 39.6001C35.3333 39.8667 35.6 40.0001 36 40.0001C36.4 40.0001 36.6666 39.8667 36.9333 39.6001L43.6 32.9334L43.6 32.9333C43.8 32.7333 43.925 32.4959 43.975 32.249C44.0583 31.8376 43.9334 31.4 43.6 31.0667L36.9333 24.4C36.4 23.8667 35.6 23.8667 35.0667 24.4C34.5333 24.9333 34.5333 25.7333 35.0667 26.2667L39.4666 30.6666H21.2778C20.5111 30.6666 20 31.2 20 32C20 32.8 20.5111 33.3333 21.2778 33.3333H39.4667L35.0666 37.7334C34.5333 38.2667 34.5333 39.0667 35.0666 39.6001Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section -->

    <?php
       include("headfoot/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="headfoot/script.js"></script>
    <script>

    //js to change step by step section image as user clicks on different steps

    // function changeimg() {
    //     document.getElementById("gi1").src = "images/resumeTemplateimg/resume1.png";
    // }

    // function changeimg1() {
    //     document.getElementById("gi1").src = "images/resumeTemplateimg/resume2.png";
    // }

    // function changeimg2() {
    //     document.getElementById("gi1").src = "images/guideresume/resume4.jpg";
    // }

    // function changeimg3() {
    //     document.getElementById("gi1").src = "images/resumeTemplateimg/temp3.jpg";
    // }


    function changeimg() {
        document.getElementById("gi1").src = "images/resumeTemplateimg/resume-template-placeholder.png";
    }

    function changeimg1() {
        document.getElementById("gi1").src = "images/resumeTemplateimg/resume-template-placeholder.png";
    }

    function changeimg2() {
        document.getElementById("gi1").src = "images/resumeTemplateimg/resume-template-placeholder.png";
    }

    function changeimg3() {
        document.getElementById("gi1").src = "images/resumeTemplateimg/resume-template-placeholder.png";
    }

    //    swiper.js

    new Swiper("#swiper-2", {
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 24,
        lazyLoading: true,
        loop: true,
        keyboard: {
            enabled: true,
        },
        navigation: {
            nextEl: "#nav-right",
            prevEl: "#nav-left"
        },
        breakpoints: {
            800: {
                slidesPerView: 2
            },
            1400: {
                slidesPerView: 3
            }
        }
    });

    </script>
</body>

</html>