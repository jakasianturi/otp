<?php 
include ('./conn/conn.php');

session_start();
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : null;
if (!$first_name) {
    header("Location: http://localhost/otp/index.php");
    exit(); // Pastikan untuk mengakhiri eksekusi skrip setelah pengalihan
} ?>
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

        .card-text {
            text-align: justify;
        }

        .kunci {
            margin-top: 0;
            margin-bottom: 1rem;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="width: 100%;">
        <a class="navbar-brand ml-5" href="home.php">
            <img src="./asset/logo.png" alt="Logo" height="30" class="d-inline-block align-top mr-2">
            PT.Sinar Metrindo Perkasa
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
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

    <div style="padding-bottom : 16px">

        <div class="content" style="margin-top: 1rem; display: flex;"> <!--  ini buat css ya nanti taro di atas-->
            <div class="card"
                style="width: 33rem; display: flex; align-items: center;background: rgba(255,255,255,0.5)">
                <h1 style="padding:1rem; color:black;">CFIT</h1>
                <div class="card-body">
                    <p class="p1" style="color:black; color-text: black; display: flex; justify-content: center; ">
                        "Tugas Anda adalah mengisi kotak yang masih kosong sesuai dengan pilihan yang tersedia. perlu
                        diingat bahwa setiap gambar pada kotak tersebut memiliki pola tertentu. Anda perlu mengetahui
                        pola tersebut untuk menjawab soal."</p>
                    <p class="kunci" style="color:black;">Kunci: 1:C 2:E 3:E</p>
                    <div style="display:flex;justify-content:center">
                        <img class="card-img-top" style="width: 30rem; padding-top: 2rem; padding-bottom: 3rem;"
                            src="./asset/contoh_subtes.jpeg" alt="Card image cap">
                    </div>
                    <a href="./soal_subtes.php?id=1" class="btn btn-secondary"
                        style="display: flex; justify-content: center;">Lanjut</a>
                </div>
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