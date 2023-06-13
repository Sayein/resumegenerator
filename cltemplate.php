<?php
session_start();
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
    <link rel="stylesheet" href="cltemplate.css">
</head>

<body>
    <!-- navbar -->
    <?php
       include("headfoot/navbar.php");
    ?>
    <!-- content -->

    <!-- Templates Section -->

    <div class="templatesec">
        <div class="tempgrid">
            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp1.png" alt="temp1" />
                <form action="cleditor.php" method="post">
                    <button type="submit" name="tmp" value="1">
                        <div class="overlay">
                            <div class="ctext">Use This Template</div>
                        </div>
                    </button>
                </form>
            </div>
            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp2.png" alt="temp2" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="2">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
            </div>
            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp3.png" alt="temp3" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="3">
                <div class="overlay">
                    <div class="ctext">Use This Template</div>
                </div>
                </button>
            </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp4.png" alt="temp4" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="4">
                <div class="overlay">
                    <div class="ctext">Use This Template</div>
                </div>
                </button>
               </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp5.png" alt="temp5" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="5">
                <div class="overlay">
                    <div class="ctext">Use This Template</div>
                </div>
             </button>
             </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp6.png" alt="temp6" />
                <form action="cleditor.php" method="post">
                <button type="submit" name="tmp" value="6">
                <div class="overlay">
                    <div class="ctext">Use This Template</div>
                </div>
                </button>
             </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp7.png" alt="temp7" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="7">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
            </div>


            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp8.png" alt="temp8" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="8">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp9.png" alt="temp9" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="9">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp10.png" alt="temp10" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="10">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
            </div>

             
            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp11.png" alt="temp11" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="11">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
            </div>

            <div class="tempcontainer">
                <img class="tempimg" src="images/cltemplate/cltemp12.png" alt="temp12" />
                <form action="cleditor.php" method="post">
                       <button type="submit" name="tmp" value="12">
                            <div class="overlay">
                            <div class="ctext">Use This Template</div>
                            </div>
                        </button>
                    </form>
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
</body>

</html>