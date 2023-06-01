<?php
echo'





<header>
<nav class="nav-bar">
<a href="index.php"><img class="logo"  src="./images/logo.png"></a>
    <ul>
        <li class="dropdown">
            <a href="#Sports">Sports</a>
            <div class="dropdown-content">
                <a href="cycling.php">Cycling</a>
                <a href="fitness.php">Fitness</a>
                <a href="football.php">Football</a>
                <a href="running.php">Running</a>
            </div>
        </li>
        <li><a href="brands.php">Brands</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact</a></li>';
        
      session_start();
      if (isset($_SESSION['name'])) {
        echo ' <li><a href="#" id="cartIcon" data-toggle="modal" data-target="#cartModal"><img src="./images/cart1.png"></a></li>';
        echo '<li><a href="#" ">' . $_SESSION['name'] . '</a></li>';
        echo '<li><a href="../includes/logout.php">Logout</a></li>';

        
      } else {
        echo '<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>';
        echo '<li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>';
      }
      
        echo '
        </ul>
    </nav>
    </header>
    
    ';
    ?>
    
    