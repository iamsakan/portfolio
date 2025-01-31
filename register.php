<?php
    session_start();
    $_SESSION['logged_in'] = "false";
    require_once('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeatPass = $_POST["repeat_password"];

        if ($password !== $repeatPass) {
            $repeat_password_error = "Passwords do not match.";
        } else {
            $check_email_sql = "SELECT * FROM user WHERE email = ?";
            $stmt = $conn->prepare($check_email_sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $email_result = $stmt->get_result();

            if ($email_result->num_rows > 0) {
                $email_error = "This email address is already registered. Please try logging in.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $insert_sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($insert_sql);
                $stmt->bind_param("sss", $username, $email, $hashedPassword);

                if ($stmt->execute()) {
                    $_SESSION['logged_in'] = "active";
                    $_SESSION['user_id'] = $row['id'];
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
    }

    $conn->close();
?>
