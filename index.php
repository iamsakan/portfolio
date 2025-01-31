<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="slike/AS.png" type="image/png">
</head>
<body>
    <header>
        <?php require_once("nav.php");
            if (!isset($_SESSION['logged_in'])) {
                $_SESSION['logged_in'] = false;
            }
        ?>
        <?php require_once("db.php"); ?>
    </header>
            <div class="homepage">
                <div class="text">
                <p>Where</p>
                <p>pixels meet</p>
                <p>perfection</p>
                <p class="text2">Your imagination, our creation.</p>
                </div>
                <div class="slika">
                <img src="slike/as.png" alt="">
                </div>
            </div>
<hr>
            <div class="gallery">
            <h1>Gallery</h1>
            <p>The only limit is the extent of your imagination.</p>
            <hr>
            </div>
        <div class="wrapper">
            <div class="grid">
        <?php
        // Query to select images from the database
        $sql = "SELECT * FROM photo";
        $result = $conn->query($sql);
        $count = 0;
        while($row = $result->fetch_assoc()){
            $file_name = $row['file_name'];
            $description = $row['description']; // Get the file name from the current row
            echo "
                <div class='image'>
                    <img src='uploads/$file_name' alt=''>
                    <div class='content'>
                        <h1>$description</h1>
                    </div>
                </div>";
                $count++;
                if ($count % 4 == 0) { 
                    echo "<div class='clearfix'></div>";
                }
    
        }
        ?>
            </div>
        </div>
        
        <div class="contact">
            <img src="slike/jaz.jpg" alt="">
            <div class="jaz">
            <h1>Anel</h1>
            <p>The only time success comes before work is in the dictionary.</p>
            <a href="socials.php">Get in touch</a>
            </div>
        </div>

        <div class="rating">
            <h1>What people are saying</h1>
            <div class="people">
            <div class="person">
                <h2>Saša Mautner 14ALL</h2>
                <p>"Very professional and very fast. I didn't know what kind of logo I wanted, but he helped me decide and gave me exactly what I needed."</p><br>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span><br>
                <h6>Service: Logo design</h6>
            </div>
            <div class="person">
                <h2>John</h2>
                <p>"Excellent job. I highly recommend this guy!!"</p><br>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span><br>
                <h6>Service: Social media post</h6>
            </div>
            <div class="person">
                <h2>Lea</h2>
                <p>"Good job!!"</p><br>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span><br>
                <h6>Service: QR Code</h6>
            </div>
            </div>
        </div>
        <div class="visit-us">
            <div class="my-info">
                <h1>Visit us</h1>
                <p>Šegova ulica 115</p>
                <p>8000 Novo mesto, Sl</p><br><br>
                <h3>Hours</h3>
                <p>Every day</p>
                <p>24h</p><br><br>
                <h3>Contact</h3>
                <p>asdesignworks2023@gmail.com</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.8630459145675!2d15.158132075859807!3d45.793971411376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4764ffed1b49c4b5%3A0x10c8ee52aa1d6e46!2s%C5%A0egova%20ulica%20115%2C%208000%20Novo%20mesto!5e0!3m2!1ssl!2ssi!4v1715095288057!5m2!1ssl!2ssi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="noga">
            <div class="my-links">
                <a href="https://www.instagram.com/as_design2023/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/profile.php?id=61551075249656" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://anel.wuaze.com/" target="_blank"><i class="fa-solid fa-cloud"></i></a>
            </div>
            <p>© 2024 AS Design</p>
        </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        // Trenutna pot
        var currentPath = window.location.pathname;

        // Vsi linki
        var navLinks = document.querySelectorAll('nav ul li a');

        // Zanka čez vse linke
        navLinks.forEach(function(link) {
            // Zapisujemo pot vsakega
            var linkPath = link.pathname;

            // Preverimo če se ujema s trenutno potjo, če se njegovem li staršu dodelimo 'active' class
            if (currentPath === linkPath) {
                link.parentNode.classList.add('active');
            }
            });
        });
        
    </script>
</body>
</html>
