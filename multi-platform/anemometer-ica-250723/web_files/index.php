<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location:index1.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($konek, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index1.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/Logo UMI.png">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Halaman Login</title>
</head>
<body style="background: #f8f9fd">
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
    
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 21px; font-weight: 800;">Sistem Monitoring Kecepatan Angin</p>
            <div class="input-group">
                <input type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" style="border-color: #1089FF; border-width: 1px; border-style:solid;" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" style="border-color: #1089FF; border-width: 1px; border-style:solid;" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn" style="background-color: #1089FF; font-size:18px;">Login</button>
            </div>
            <br>
            <p class="login-register-text" style="text-align:center; font-size:14px;"><img src="images/Logo UMI.png" width="90" height="100"><br>&copy;copyright <a href="#" style="color: #1089FF;">2023</a></br></p>
        </form>
    </div>
</body>
</html>