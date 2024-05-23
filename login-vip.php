<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./login.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "login";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "<font style=\"color:#FF0000\">Could not connect:" . mysqli_connect_error() . "</font\>";
        }

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $stmt = $con->prepare("SELECT * FROM username WHERE user = ? AND password = ?");
        $stmt->bind_param("ss", $user, $pass);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>User: " . htmlspecialchars($row['user']) . "</p>";
                    echo "<p>Password: " . htmlspecialchars($row['password']) . "</p>";
                    echo "<p>First Name: " . htmlspecialchars($row['fname']) . "</p>";
                    echo "<p>Last Name: " . htmlspecialchars($row['lname']) . "</p>";
                    echo "<p>Gender: " . htmlspecialchars($row['gender']) . "</p>";
                    echo "<p>Date of Birth: " . htmlspecialchars($row['dob']) . "</p>";
                    echo "<p>Country: " . htmlspecialchars($row['country']) . "</p>";
                    echo "<p>Score: " . htmlspecialchars($row['score']) . "</p>";
                    echo "<p>Email: " . htmlspecialchars($row['email']) . "</p>";
                    echo "--------------------------------------------<br/>";
                }
            } else {
                echo "Tên đăng nhập hoặc mật khẩu không hợp lệ";
            }

            $stmt->close();

        } else {
            echo "Vui lòng đăng nhập lại";
        }

        $con->close();
        ?>

    </div>
</body>
</html>
