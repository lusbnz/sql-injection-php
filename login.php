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
        $sql = "SELECT * FROM username WHERE user = '$user' AND password = '$pass'";

        if (mysqli_multi_query($con, $sql)) {
            do {
                $result = mysqli_store_result($con);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_row($result)) {
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
                    mysqli_free_result($result);
                } else {
                    echo "Tài khoản hoặc mật khẩu bị sai.";
                }
            } while (mysqli_next_result($con));

            echo "Các câu lệnh đã được thực hiện thành công.";
        } else {
            echo "Lỗi trong quá trình thực hiện câu lệnh: ";
        }
        $con->close();
        ?>
    </div>
</body>
</html>
