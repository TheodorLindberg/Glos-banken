<?php
if(empty($RootFolderPath))
{
    $RootFolderPath = "./";
}
?>
<header>
<ul class="flexboxnav">
            <li class="headerelm">
                <div class="dropdownlogo">
                    <!-- trigger button -->
                    <a href="<?php echo $RootFolderPath."home/"; ?>" class="logo">
                        <div class="logoimg">
                        <?php
                        //Since this code is included everywhere we need a extension that will get us to the root folder of the website                            
                        if(empty($RootFolderPath))
                        {
                            //We asume this is not set since the header will be included inside the root folder 
                            echo '<img src="source/img/logo.png" alt="logoimagemain">';
                        }
                        else {
                            //User have defined a path to the root folder lets use it 
                            echo '<img src="'.$RootFolderPath.'source/img/logo.png" alt="logoimage">';
                        }

                        ?>
                        </div>
                        <div class="logotext">
                            <p>Glosboken</p>
                        </div>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="dropdown-menu">
                        <li><a href="#home" class="dropdown-menu-item">Home</a></li>
                        <li><a href="#about" class="dropdown-menu-item">About</a></li>
                        <li><a href="#contact" class="dropdown-menu-item">Contact</a></li>
                    </ul>
                 </div>
            </li>
            <li class="search headerelm">
                <form class="searchbar" action="includes/search.php" method="POST">
                    <input type="text" placeholder="search">
                    <button type="submit">search</button>
                </form>
            </li>
            <li class="headerelm">
                <div class="profile">
                    <a href="<?php echo $RootFolderPath;?>home/quiz/upload">Upload quiz</a>
                    <!-- trigger button -->
                    <a href="#" class="playerprofile">
                        <?php
                            echo '<p>' .$_SESSION['u_uid']. '</p>';
                       ?>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="dropdown-menu">
                        <li><a href="#home" class="dropdown-menu-item">Profile</a></li>
                        <?php
                        //Since this code is included everywhere we need a extension that will get us to the root folder of the website                            
                           echo '<li> <a class="dropdown-menu-item"><form method="POST" action="'.$RootFolderPath.'program-files/db/user/user.php"><input type="hidden" value="logout" name="dir"><button class="ButtonConnect" type="submit" name="submit">Logout</button></form></a></li>
                            ';

                        ?>
                        <li><a href="#about" class="dropdown-menu-item">Friends</a></li>
                        <li><a href="#contact" class="dropdown-menu-item">Projects</a></li>
                        <li><a href="<?php echo "$RootFolderPath"?>home/profile/quizes.php " class="dropdown-menu-item">Quizes</a></li>
                    </ul>
                 </div>
            </li>          
</ul>  
</header>
