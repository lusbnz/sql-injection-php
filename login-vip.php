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
        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $con->prepare("SELECT * FROM username WHERE user = ? AND password = ?");
        $stmt->bind_param("ss", $user, $pass);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . "User : " . $row[0] . "</p>";
                    echo "<p>" . "Password : " . $row[1] . "</p>";
                    echo "<p>" . "First Name : " . $row[2] . "</p>";
                    echo  "<p>" . "Last Name : " . $row[3] . "</p>";
                    echo "<p>" . "Gender : " . $row[4] . "</p>";
                    echo "<p>" . " Date of Birth :" . $row[5] . "</p>";
                    echo "<p>" . "Country : " . $row[6] . "</p>";
                    echo "<p>" . "Score : " . $row[7] . "</p>";
                    echo "<p>" . "Email : " . $row[8] . "</p>";
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
