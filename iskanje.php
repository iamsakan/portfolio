<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results</title>
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

        <div class="wrapper">
            <div class="grid">
        <?php
        // Query to select images from the database
        $query = $_GET['query'];
        $sql = "SELECT * FROM photo WHERE description LIKE '%$query%';";
        $result = $conn->query($sql);
        $count = 0;
        if ($result->num_rows > 0) {
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
    }else {
        echo "<div class='invalid-search'><p>No results found for your search. Please enter a valid query.</p></div>";
    }
        ?>
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