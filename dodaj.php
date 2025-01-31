<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['logged_in'] != "active") {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

require_once('db.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT role FROM user WHERE iduser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($role);
$stmt->fetch();
$stmt->close();

// Check if the user is an admin
if ($role !== 'admin') {
    echo "<script> 
        if(confirm('You do not have permission to access this page. Do you want to go to the homepage?')) {
            window.location.href = 'index.php';
        } else {
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000);
        }
      </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodajanje</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="slike/AS.png" type="image/png">
    <link rel="stylesheet" href="dodaj.css">
</head>
<body>
    <header>
        <?php require_once('nav.php'); ?>
        <?php require('db.php'); ?>
    </header>
    <?php
    if ($role === 'admin') {
    ?>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
		<input type="file" name="slikaa" id="file" accept=".jpg, .jpeg, .png" hidden>
		<div class="img-area" data-img="">
			<i class="fa-solid fa-upload bigger-icon"></i>
			<h3>Dodaj novo sliko</h3>
			<p>Velikost slike mora biti manjša od <span>10MB</span></p>
		</div>
		<input type="file" name="slika" class="select-image" accept=".jpg, .jpeg, .png" required>
        <textarea name="opis" id="opis" cols="40" rows="10" placeholder="Kratek opis ..." required></textarea>
        <input type="submit" value="Dodaj" class="submit-btn">
    </form>
	</div>
    <?php
    }
    ?>

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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["slika"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }


    if ($_FILES["slika"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    // Upload the file
    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
        // Insert into database
        require_once('db.php');

        // Prepare and bind the insert statement
        $stmt = $conn->prepare("INSERT INTO photo (file_name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $filename, $description);

        // Set parameters and execute
        $filename = basename($_FILES["slika"]["name"]);
        $description = $_POST['opis'];

        if ($stmt->execute()) {
        echo "The file " . htmlspecialchars($filename) . " has been uploaded and inserted into the database.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}
?>