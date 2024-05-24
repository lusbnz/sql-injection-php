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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
            $query = "SELECT * FROM username WHERE user = ? AND password = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<p>Người dùng: " . htmlspecialchars($row['user']) . "</p>";
                echo "<p>Mật khẩu: " . htmlspecialchars($row['password']) . "</p>";
                echo "<p>Tên: " . htmlspecialchars($row['fname']) . "</p>";
                echo "<p>Họ: " . htmlspecialchars($row['lname']) . "</p>";
                echo "<p>Giới tính: " . htmlspecialchars($row['gender']) . "</p>";
                echo "<p>Ngày sinh: " . htmlspecialchars($row['dob']) . "</p>";
                echo "<p>Quốc gia: " . htmlspecialchars($row['country']) . "</p>";
                echo "<p>Email: " . htmlspecialchars($row['email']) . "</p>";
                echo "--------------------------------------------<br/>";
            } else {
                echo "Tài khoản hoặc mật khẩu bị sai.";
            }
            $stmt->close();
            $con->close();
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
        ?>
    </div>
</body>
</html>
