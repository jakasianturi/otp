<?php
include ('../conn/conn.php');
include ('../Aes.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // Enkripsi password untuk membandingkan dengan yang tersimpan di database
    $io = substr(md5($password), 0, 16);
    $aes = new Aes($io);
    $hasil = bin2hex($aes->encrypt($password));
    $hasil2 = hex2bin($hasil);
    $pass_baru = $aes->decrypt($hasil2);

    // Query untuk mengambil data user berdasarkan username
    $stmt = $conn->prepare("SELECT `tbl_user_id`, `first_name`, `password`, `role` FROM `tbl_user` WHERE `username` = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $stored_password = $row['password'];
        $role = $row['role'];
        $first_name = $row['first_name'];
        var_dump($first_name);

        // Memverifikasi password
        if (($hasil) === $stored_password) {
            // Jika login berhasil, mulai session dan simpan informasi penting
            session_start();
            $_SESSION['user_id'] = $row['tbl_user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['password'] = $stored_password;

            // Redirect ke halaman sesuai dengan peran pengguna
            if ($role == 'admin') {
                header("Location: http://localhost/otp/home-admin.php");
                exit();
            } else {
                header("Location: http://localhost/otp/verification.php");
                exit();
            }
        } else {
            // Jika password tidak cocok
            echo "
            <script>
                alert('Login Failed, Incorrect Password!');
                window.location.href = 'http://localhost/otp/index.php';
            </script>
            ";
        }
    } else {
        // Jika username tidak ditemukan
        echo "
        <script>
            alert('Login Failed, User Not Found!');
            window.location.href = 'http://localhost/otp/index.php';
        </script>
        ";
    }
}
?>