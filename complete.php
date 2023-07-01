<?php
   session_start();
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
     $template=$_SESSION['tmp'];
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
        background-color:#0000FF;
        outline: none;
        border: none;
        padding:15px;
        width:200px;
        margin-left: 10px;
        border-radius: 5px;
        color:white;
        font-size: 15px;
        font-weight: bolder;
        letter-spacing: 1px;
        cursor: pointer;
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

    .downloadprintbtn button {
        padding: 10px;
        width: 150px;
        height: 50px;
        font-size: 17px;
        border: none;
        margin-top: 15px;
        border-radius: 5px;
        background-color: black;
        color: white;
        letter-spacing: 1px;
    }

    .downloadprintbtn button:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    /* responsive templates */

    @media (max-width:767px) {
       /* .tempgrid{
            transform:scale(0.5);
        } */
    }

     /* @media (max-width:540px) {
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

    } */

    </style>
</head>

<body onload="adddata()">

    <?php
     include('headfoot/navbar.php');
     ?>
    <!-- html for resume template and edit section -->
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
       echo '
    <div class="content">
        <div class="tempgrid">
            <div class="tempcontainer" id="frame">
               ';
                    
                    if($template == "1"){
                    include 'templates/template1.php';
                    } elseif($template == "2"){
                    include 'templates/template2.php';
                    } elseif($template == "3"){
                    include 'templates/template3.php';
                    }
               

               echo  '
            </div>
        </div>

        <!-- download and print button -->
        <div class="centerdiv">
            <div class="downloadprintbtn">
                <div class="downlodbtn">
                    <button type="submit" onclick="downloadpdf()">Download PDF</button>
                </div>

                <div class="printbtn">
                    <button onclick="window.print()">Print</button>
                </div>
            </div>

        </div>
    </div>';
                }
    else{
        echo '<div style="height:100vh; display:grid; place-items:center; padding-top:100px; padding-bottom:200px;">
        <div>
           <h1 style="text-align:center;">Please Login To Use This Page.</h1>
           <div class="btngrid"><a href="sign.php"><button type="submit" class="herobtn">Login in</button></a></div>
        </div> 
     </div>';
    }
?>

    <?php
     include('headfoot/footer.php');
?>
    <script src="headfoot/script.js"></script>

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
            scale: 3
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

    function adddata() {
        const dfname = localStorage.getItem('fname');
        document.getElementById('dfname').innerHTML = dfname;

        const dlname = localStorage.getItem('lname');
        document.getElementById('dlname').innerHTML = dlname;

        const dphone = localStorage.getItem('phone');
        document.getElementById('cont1').innerHTML = dphone;

        const demail = localStorage.getItem('email');
        document.getElementById('cont2').innerHTML = demail;

        const dcity = localStorage.getItem('city');
        document.getElementById('cont3').innerHTML = dcity;

        const dcountry = localStorage.getItem('country');
        document.getElementById('cont5').innerHTML = dcountry;

        const dprfsmry = localStorage.getItem('prfsumry');
        document.getElementById('profsumry').innerHTML = dprfsmry;

        const dsclname = localStorage.getItem('sclname');
        document.getElementById('scln').innerHTML = dsclname;

        const dsclloc = localStorage.getItem('sclloc');
        document.getElementById('sclloc').innerHTML = dsclloc;

        const ddegree = localStorage.getItem('degree');
        document.getElementById('degree').innerHTML = ddegree;

        const dsclyer = localStorage.getItem('sclyer');
        document.getElementById('sclyr').innerHTML = dsclyer;

        const dfost = localStorage.getItem('fost');
        document.getElementById('fostdy').innerHTML = dfost;

        const djbtl = localStorage.getItem('jbtl');
        document.getElementById('jbt').innerHTML = djbtl;

        const demployr = localStorage.getItem('employr');
        document.getElementById('cpn').innerHTML = demployr;

        const dstrtdate = localStorage.getItem('strtdate');
        document.getElementById('strtyr').innerHTML = dstrtdate;

        const denddate = localStorage.getItem('enddate');
        document.getElementById('endyr').innerHTML = denddate;

        const djobsumary = localStorage.getItem('jobsumary');
        document.getElementById('jbsmry').innerHTML = djobsumary;

        const dskill = localStorage.getItem('skill');
        document.getElementById('skls').innerHTML = dskill;

        const dskillp = localStorage.getItem('skillp');
        document.getElementById('sklprtg').innerHTML = dskillp;
        let percentage = document.getElementById('sklprtg');
        width = dskillp + '%';
        percentage.style.width = width;


        const dhoby = localStorage.getItem('hobby');
        document.getElementById('hob').innerHTML = dhoby;

        const dlink = localStorage.getItem('link');
        document.getElementById('lnk').innerHTML = dlink;

        const dlang = localStorage.getItem('lang');
        document.getElementById('dlang').innerHTML = dlang;



    }


    </script>
</body>

</html>