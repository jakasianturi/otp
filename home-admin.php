<?php include ('./conn/conn.php');

session_start();
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : null;
if (!$first_name) {
    header("Location: http://localhost/otp/index.php");
    exit(); // Pastikan untuk mengakhiri eksekusi skrip setelah pengalihan
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psikotes PT.Sinar Metrindo Perkasa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url("./asset/bg1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
        }

        .content {
            backdrop-filter: blur(100px);
            color: rgb(255, 255, 255);
            padding: 40px;
            border: 2px solid;
            border-radius: 10px;
            margin-top: 100px;
        }

        .table {
            color: rgb(255, 255, 255) !important;
        }

        td button {
            font-size: 20px;
            width: 30px;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="width: 100%;">
    <a class="navbar-brand ml-5">
    <img src="./asset/logo.png" alt="Logo" height="30" class="d-inline-block align-top mr-2">
    PT.Sinar Metrindo Perkasa
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/otp/index.php" id="logoutButton">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <h4>List of users</h4>
        <hr>
        <table class="table table-hover table-collapse">
            <thead>
                <tr>
                <th scope="col">User ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">code OTP</th>
                <th scope="col">Waktu</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                
                    $stmt = $conn->prepare("SELECT * FROM `tbl_user`");
                    $stmt->execute();

                    $result = $stmt->fetchAll();

                    foreach ($result as $row) {
                        $userID = $row['tbl_user_id'];
                        $firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $contactNumber = $row['contact_number'];
                        $email = $row['email'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $verification_code = $row['verification_code'];
                        $waktu = $row['waktu'];

                    ?>

                    <tr>
                        <td id="userID-<?= $userID ?>"><?php echo $userID ?></td>
                        <td id="firstName-<?= $userID ?>"><?php echo $firstName ?></td>
                        <td id="lastName-<?= $userID ?>"><?php echo $lastName ?></td>
                        <td id="contactNumber-<?= $userID ?>"><?php echo $contactNumber ?></td>
                        <td id="email-<?= $userID ?>"><?php echo $email ?></td>
                        <td id="username-<?= $userID ?>"><?php echo $username ?></td>
                        <td id="password-<?= $userID ?>"><?php echo $password ?></td>
                        <td id="verification_code-<?= $userID ?>"><?php echo $verification_code ?></td>
                        <td id="waktu-<?= $userID ?>"><?php echo $waktu ?></td>
                        <td>
                        <button id="sendbtn" onclick="send_otp('<?php echo $email; ?>', <?php echo $userID; ?>)" title="send_otp">&#9993;</button>
                        <button id="deleteBtn" onclick="delete_user(<?php echo $userID ?>)"title="delete_user">&#128465;</button>
                        <a title="cek_hasil" class="btn bg-white" href="http://localhost/otp/hasil.php?id=<?= $userID ?>" >✉</a>
                        </td>
                    </tr>    

                    <?php
                    }

                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Send OTP Via Email
        function send_otp(email, id) {
    if (confirm("Do you want to send OTP to this email?")) {
        window.location.href = "./endpoint/send-otp.php?email=" + email + "&id=" + id;
    }
}
        // Delete user
        function delete_user(id) {
            if (confirm("Do you want to delete this user?")) {
                window.location = "./endpoint/delete-baru.php?user=" + id;
            }
        }


    </script>
    

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>
</html>