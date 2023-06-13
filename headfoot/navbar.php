<?php
echo '
<header>
<nav>
    <div class="navbar">
        <a href="index.php" class="homelink" style="text-decoration:none; color:black;">
            <div class="logocon">
                <div class="logoan"></div>
                <h2>R<span class="cg">G</span></h2>
            </div>
        </a>
        <input type="checkbox" id="check">
        <label for="check" id="menubtn">
          <div  id="menubar" onclick="showx()">&#9776;</div>
          <div class="fad" id="cross" style="display:none; font-size:40px;" onclick="showb()">&times;</div>
        </label>
        <ul class="navlinks">';
       
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                        echo '<li><a href="./resumeTemplate.php" class="navanc">Resume Templates</a></li>';
                    }
                    else{
                        echo '<li><a href="./sign.php" class="navanc">Resume Templates</a></li>';
                    }
                       echo '<li><a href="myResume.php" class="navanc">My Resume</a></li>
                       
                     <li><a href="#" class="navanc">Job Search</a> </li>';

            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                echo '<li><div class="navanc" id="mbtn"><a href="./db/logout.php">Logout</a></div> </li>';
            }
            else{
              echo '<li><div class="navanc" id="mbtn"><a href="./sign.php">Sign in</a></div> </li>';
            }
   echo '</ul>
    </div>
</nav>
</header>';

?>