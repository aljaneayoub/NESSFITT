<!DOCTYPE html>
<html>
<head>
    <title>nessfit</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <!-- Add more CSS and JavaScript files as needed -->

</head>
<body>
<?php
    include 'header.php';
?>
  <?php include 'modal.php'; ?>
<section class="hero" id="hero">
    <div class="hero-text">
        <b>practice, progress and enjoy </b>
        
         
    </div>  

    <a href="#flash"><button>Now</button></a> 
    
        
</section>
<section class="flash" id="flash">
<div class="back-flash"> <b>flash <br> &nbsp;promo </b><div class="flash-text"></div></div>
<?php
        include '../includes/db_connection.php';

        $query = "SELECT * FROM produit WHERE promo > 0 ORDER BY RAND () LIMIT 5";
        $stmt = $db->prepare($query);
        $stmt->execute();
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $imageData = $row['img'];
            $productName = $row['nom'];
            $productBrand = $row['marque'];
            $productPromo = $row['promo'];
        

            echo "<li class='card' ><a href='football.php' >";
            echo "<img  style='width:150px' src='data:image/jpeg;base64," . base64_encode($imageData) . "'>";  
            echo "<div class='container'>";
            echo "<h5 class='card-title'>" . $productName . "</h5>";
            echo "<p class='card-text'>" . $productBrand . "</p>";
            echo "<button class='promo'>-" . $productPromo . "%</button>";
            echo " </div>";    
            echo "</a></li>";
        }
        echo "</ul>";
        ?>
        <div class="top-back"><b>Top<br> &nbsp;brands</b><div class="top-text"></div></div>
        <div class="marquee-container">
        <div class="marquee">
        <?php
        include '../includes/db_connection.php';

        $query = "SELECT img FROM marque";
        $stmt = $db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $imageData = $row['img'];

        

            echo "<img  style='width:100px' src='data:image/jpeg;base64," . base64_encode($imageData) . "'>";  

        }
        ?>
        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
<script >
    const marqueeContainer = document.querySelector('.marquee-container');
    const marquee = document.querySelector('.marquee');

    marqueeContainer.addEventListener('mouseover', () => {
    marquee.style.animationPlayState = 'paused';
    });

    marqueeContainer.addEventListener('mouseout', () => {
    marquee.style.animationPlayState = 'running';
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>