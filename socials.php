<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socials</title>
    <link rel="stylesheet" href="socials.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="slike/AS.png" type="image/png">
</head>
<body>
    <header>
        <?php require_once('nav.php'); ?>
    </header>
    <div class="wrapper">
        <div class="vse">
            <img src="slike/asdesign.png" alt="logo">
        <div class="ig">
            <a href="https://www.instagram.com/as_design2023/" target="_blank">
                <i class="fab fa-instagram"></i> Instagram
            </a>
        </div>
        <div class="fb">
            <a href="https://www.facebook.com/profile.php?id=61551075249656" target="_blank">
                <i class="fab fa-facebook"></i> Facebook
            </a>
        </div>
        <div class="github">
            <a href="https://github.com/IamSakan" target="_blank">
                <i class="fab fa-github"></i> Github
            </a>
        </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentPath = window.location.pathname;
        var navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(function(link) {
            var linkPath = link.pathname;
            if (currentPath === linkPath) {
                link.parentNode.classList.add('active');
            }
        });
    });
</script>
</body>