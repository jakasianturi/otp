<?php
 include ('./conn/conn.php');
 
session_start();
if (isset($_SESSION['user_verification_id'])) {
    $userVerificationID = $_SESSION['user_verification_id'];
    // $first_name = $_SESSION['first_name'];
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
            backdrop-filter: blur(77px);
            margin-top: 100px;
            color: rgb(255, 255, 255);
            border: 2px solid;
            border-radius: 10px;
        }
        /* .card-title { */
            /* margin-bottom: 3.75rem;
        } */
        h5.card-title {
           color: black;
           font-size: 2rem;
        }

        .table {
            color: rgb(255, 255, 255) !important;
        }

        td button {
            font-size: 20px;
            width: 30px;
        }

        .card-text{
            text-align: justify;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="width: 100%;">
    <a class="navbar-brand ml-5" href="home.php">
    <img src="./asset/logo.png" alt="Logo" height="30" class="d-inline-block align-top mr-2">
    PT.Sinar Metrindo Perkasa
</a>

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

    <!-- Update Modal -->
    <div class="modal fade mt-5" id="updateUserModal" tabindex="-1" aria-labelledby="updateUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModal">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./endpoint/update-user.php" method="POST">
                        <div class="form-group row">
                            <div class="col-6">
                                <input type="text" name="tbl_user_id" id="updateUserID" hidden>
                                <label for="updateFirstName">First Name:</label>
                                <input type="text" class="form-control" id="updateFirstName" name="first_name">
                            </div>
                            <div class="col-6">
                                <label for="updateLastName">Last Name:</label>
                                <input type="text" class="form-control" id="updateLastName" name="last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-5">
                                <label for="updateContactNumber">Contact Number:</label>
                                <input type="number" class="form-control" id="updateContactNumber" name="contact_number" maxlength="11">
                            </div>
                            <div class="col-7">
                                <label for="updateEmail">Email:</label>
                                <input type="text" class="form-control" id="updateEmail" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="updateUsername">Username:</label>
                            <input type="text" class="form-control" id="updateUsername" name="username">
                        </div>
                        <div class="form-group">
                            <label for="updatePassword">Password:</label>
                            <input type="text" class="form-control" id="updatePassword" name="password">
                        </div>
                        <button type="submit" class="btn btn-dark login-register form-control">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="content" style="display: flex; flex-direction: col;"> <!--  ini buat css ya nanti taro di atas-->
    <div class="card" style="width: 18rem; display: flex; align-items: center;background: rgba(255,255,255,0.5)">
  <img class="card-img-top" style="width: 18rem; padding-top: 2rem;" src="./asset/psikotes.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color-text: black; display: flex; justify-content: center; ">CFIT</h5>
    <p class="card-text" style="color: black;" >Deretan kotak yang berisi gambar dengan karakteristik serupa. Tugas anda melengkapi kotak sesuai pola.</p>
    <a href="./subtes.php" class="btn btn-secondary"style="display: flex; justify-content: center;">Lanjut</a>
  </div>
</div>
    </div>
            <tbody>



    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>
</html>