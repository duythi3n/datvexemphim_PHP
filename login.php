<html>
<head>
    <title> Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div>

    <?php

    require_once('config/db_connect.php');

    function hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Lấy hash từ database dựa vào tên người dùng
        $query = "SELECT id, username, password FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result) {

            if (mysqli_num_rows($result) == 1) {

                $user = mysqli_fetch_assoc($result);

                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: index.php");
                    exit();
                } else {
                    $msg = "Invalid username or password.";
                }
            } else {
                $msg = "Invalid username or password.";
            }
        } else {
            $msg = "Error executing query: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>

    <div class="parent-container">

        <table width="100%" height="100%">
            <tr>
                <td align="center" valign="middle">
                    <div class="loginholder">
                        <form id="loginForm" action="" method="POST">
                            <table style="background-color:white;" class="table-condensed">
                                <tr>
                                    <a href="./index.html"><img src="assets/img/logo.png" alt="" width="180px"></a>
                                </tr>
                                <tr>
                                    <td>
                                        <hr style="background-color:blue;height:1px;margin:0px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <div id="php-message"><?php echo isset($msg) ? $msg : ''; ?></div>
                                </tr>
                                <tr>
                                    <td><b>User Id:</b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="inputbox" id="username" name="username" required/>
                                        <br>
                                </tr>
                                <tr>
                                    <td><b>Password:</b></td>
                                </tr>
                                <tr>
                                    <td><input type="password" class="inputbox" id="password" name="password" required/>
                                        <br>
                                        <div id="msg"></div>
                                    </td>

                                </tr>
                                <tr>
                                    <td align="center"><br/>

                                        <button class="btn-normal" id="login">LOGIN</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left"><br/>
                                        <span class="forgetpassword"><a href="forget_password.php"> Forget your Password ?</a></span>
                                    </td>

                                </tr>
                                <td><a href="register.php"> Resiter now</a></td>
                                <tr>
                                    <td>
                                        <hr style="background-color:blue;height:1px;margin:0px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"></td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>