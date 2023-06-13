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
        <ul class="navlinks">
            <li>
                <div class="rdropdown">
                    <button href="#" onclick="navdropdown()" class="resumehover">Resume
                        <span class="rdrpdown">&#9660;</span>
                    </button>
                    <div id="mydrop" class="dropdown-content">';
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                        echo '<a href="./resumeTemplate.php" class="nvdrp">Resume Templates</a>';
                    }
                    else{
                        echo '<a href="./sign.php" class="nvdrp">Resume Templates</a>';
                    }
                       echo '<a href="myResume.php" class="nvdrp">My Resume</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="cdropdown">
                    <button href="#" onclick="navdropdown2()" class="cvhover">Cover-Letter
                        <span class="rdrpdown">&#9660;</span>
                    </button>
                    <div id="mydrop1" class="cdropdown-content">';
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                       echo '<a href="./cltemplate.php" class="nvdrp">Cover-Letter Templates</a>';
                    }
                    else{
                        echo '<a href="./sign.php" class="nvdrp">Cover-Letter Templates</a>';
                    }
                      echo '<!----<a href="#" class="nvdrp">My Cover-Letter</a>---->
                    </div>
                </div>
            </li>
            <li><!----<a href="#" class="navanc">Job Search</a>----> </li>';

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
//   include("loginregistermodal.php");
?>