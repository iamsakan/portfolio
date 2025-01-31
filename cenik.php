<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cenik storitev</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="slike/AS.png" type="image/png">
    <link rel="stylesheet" href="cenik.css">
</head>
<body>
    <header>
        <?php require_once('nav.php'); ?>
    </header>
    <div class="wrapper">
    <div class="pricing-table">
    <div class="grid">
        <div class="box basic">
            <div class="title">Basic</div>
            <div class="price">
                <b>$50.00</b>
            </div>
            <div class="features">
                <div>Vaša ideja</div>
                <div>Moja realizacija</div>
                <div>2-krat sprememba</div>
                <div>1-dnevna promocija</div>
            </div>
            <div class="button">
                <button>Kupi storitev</button>
            </div>
        </div>

        <div class="box professional">
            <div class="title">Professional</div>
            <div class="price">
                <b>$149.99</b>
            </div>
            <div class="features">
                <div>Vaša ideja + moja izboljšava</div>
                <div>Moja realizacija</div>
                <div>do 10 sprememb</div>
                <div>1-tedenska promocija</div>
            </div>
            <div class="button">
                <button>Kupi storitev</button>
            </div>
        </div>

        <div class="box carefree">
            <div class="title">Carefree</div>
            <div class="price">
                <b>$300.00+</b>
            </div>
            <div class="features">
                <div>Moja ideja</div>
                <div>Moja realizacija</div>
                <div>&infin; (neskončno) sprememb</div>
                <div>1 mesec promocija</div>
            </div>
            <div class="button">
                <button>Kupi storitev</button>
            </div>
        </div>
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
</html>