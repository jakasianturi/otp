<?php
include ('./conn/conn.php');
include ('./Aes.php');



$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM `tbl_soal` WHERE `id` = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC); // Mengambil baris sebagai array asosiatif
if ($row) {
    $soalID = $row['id'];
    $gambar = $row['gambar'];
    $jawaban = $row['jawaban'];
}
session_start();
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : null;
if (!$first_name) {
    header("Location: http://localhost/otp/index.php");
    exit(); // Pastikan untuk mengakhiri eksekusi skrip setelah pengalihan
}
if (isset($_SESSION['user_verification_id'])) {
    $userVerificationID = $_SESSION['user_verification_id'];
    $first_name = $_SESSION['first_name'];
    $stored_password = $_SESSION['password'];
}


$a = $gambar;
$io = 'f94e0daa124bb5b0';
$aes = new Aes($io);
$hasil = bin2hex($aes->encrypt($a));
$hasil2 = hex2bin($hasil);
$pass_baru = $aes->decrypt($hasil2);
// die($aes);


// $userId = $_SESSION['user_verification_id'];

// // Dapatkan waktu mulai dari database
// $stmt = $conn->prepare("SELECT waktu FROM tbl_user WHERE tbl_user_id = :user_id");
// $stmt->bindParam(':user_id', $userId);
// $stmt->execute();

// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// if ($row) {
//     $waktu_masuk = strtotime($row['waktu']);
//     $current_time = time();
//     $time_elapsed = $current_time - $waktu_masuk; // waktu yang telah berlalu dalam detik
//     $total_time = 90 * 60; // 30 menit dalam detik
//     $time_left = $total_time - $time_elapsed; // sisa waktu dalam detik
// } else {
//     // Handle case where waktu_masuk is not found
//     $time_left = 90 * 60; // Default to 30 minutes if no start time found
// }

// if ($time_left <= 0) {
//     header("Location: http://localhost/otp/home-user.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psikotes PT.Sinar Metrindo Perkasa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


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
        .nomor {
            color: black;
            background-color: #007bff;
}
.timer-container {
            display: inline;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
        }   
    </style>
</head>

<body>
    <input hidden type="text" value="<?php echo $stored_password ?>">
    <input hidden type="text" value="<?php echo $soalID ?>">
    <input type="text" value="<?php echo $userVerificationID ?>">
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

    <div class="row" style="width: 100%; display:flex; justify-content:center; margin-top:1rem; height: 100vh">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3" style="gap: 10px;">
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=1"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">1</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=2"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center;background-color: #cfe4ff;">2</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=3"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">3</a>
                    </div>
                    <div class="d-flex justify-content-center mb-3" style="gap: 10px;">
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=4"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">4</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=5"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">5</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=6"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">6</a>
                    </div>
                    <div class="d-flex justify-content-center mb-3" style="gap: 10px;">
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=7"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">7</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=8"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">8</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=9"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">9</a>
                    </div>
                    <div class="d-flex justify-content-center mb-3" style="gap: 10px;">
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=10"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">10</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=11"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">11</a>
                        <a class="btn btn-primary nomor" href="http://localhost/otp/soal_subtes.php?id=12"
                            style="width: 10rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">12</a>
                    </div>
                    <!-- <div class="timer-container">
                        <span id="timer"></span>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-8" style="padding: 0">

            <div class="card">
                <div class="card-body" style="display:flex; flex-direction: column;">
                    <p class="card-title" style="margin-left: 3rem;"><?php echo $soalID ?>. Tugas anda adalah mengisi
                        kotak
                        yang masih kosong sesuai dengan pilihan yang tersedia. Perlu diingat bahwa setiap gambar pada
                        kotak tersebut memiliki pola tertentu. Anda perlu mengetahui pola tersebut untuk menjawab soal.
                        Pilih jawaban yang sesuai dengan pola.</p>
                    <img class="card-img-top"
                        style="width: 32rem; padding-top: 0rem; padding-bottom: 1rem; margin-left: 14rem;"
                        src="<?php echo $gambar ?>" alt="Card image cap">
                        <div class="d-flex justify-content-center mb-3" style="gap: 78px;">
                            <a id="a" class="btn answer-btn" style="width: 6rem;height: 4rem; display: flex;justify-content: center;align-items: center; background-color: #cfe4ff;">A</a>
                            <a id="b" class="btn answer-btn" style="width: 6rem;height: 4rem; display: flex;justify-content: center;align-items: center;  background-color: #cfe4ff;">B</a>
                            <a id="c" class="btn answer-btn" style="width: 6rem;height: 4rem; display: flex;justify-content: center;align-items: center;  background-color: #cfe4ff;">C</a>
                        </div>
                        <div class="d-flex justify-content-center mb-3" style="gap: 78px;">
                            <a id="d" class="btn answer-btn" style="width: 6rem;height: 4rem; display: flex;justify-content: center;align-items: center;   background-color: #cfe4ff;">D</a>
                            <a id="e" class="btn answer-btn" style="width: 6rem;height: 4rem; display: flex;justify-content: center;align-items: center;  background-color: #cfe4ff;">E</a>
                            <a id="f" class="btn answer-btn" style="width: 6rem;height: 4rem; display: flex;justify-content: center;align-items: center;  background-color: #cfe4ff;">F</a>
</div>
                </div>

                <!-- Modal Selesai -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin sudah selesai?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="confirmFinish">Ya, Selesai</button>
      </div>
    </div>
  </div>
</div>
                <?php  
if ($soalID == 1) {
?>
    <div class="d-flex justify-content-between" style="padding-bottom: 1rem">
        <div class="content" style="padding-left: 1rem">
            <a style="width: 8rem;height: 3rem; display: flex;justify-content: center;align-items: center;"></a>
        </div>
        <div style="padding-right: 1rem">
            <a id="next" class="btn btn-primary" style="width: 8rem;height: 3rem; display: flex;justify-content: center;align-items: center; background-color: #80bdff" data-url="http://localhost/otp/soal_subtes.php?id=<?php echo $soalID + 1 ?>">Selanjutnya</a>
        </div>
    </div>
<?php
} elseif ($soalID > 1 && $soalID < 12) {
?>
    <div class="d-flex justify-content-between" style="padding-bottom: 1rem">
        <div class="content" style="padding-left: 1rem">
            <a class="btn btn-danger" style="width: 8rem;height: 3rem; display: flex;justify-content: center;align-items: center;" href="http://localhost/otp/soal_subtes.php?id=<?php echo $soalID - 1 ?>">sebelumnya</a>
        </div>
        <div style="padding-right: 1rem">
            <a id="next" class="btn btn-primary" style="width: 8rem;height: 3rem; display: flex;justify-content: center;align-items: center; background-color: #80bdff" data-url="http://localhost/otp/soal_subtes.php?id=<?php echo $soalID + 1 ?>">Selanjutnya</a>
        </div>
    </div>
<?php
} elseif ($soalID == 12) {
?>
    <div class="d-flex justify-content-between" style="padding-bottom: 1rem">
        <div class="content" style="padding-left: 1rem">
            <a class="btn btn-danger" style="width: 8rem;height: 3rem; display: flex;justify-content: center;align-items: center;" href="http://localhost/otp/soal_subtes.php?id=<?php echo $soalID - 1 ?>">sebelumnya</a>
        </div>
        <div style="padding-right: 1rem">
            <a id="finish" class="btn btn-primary" style="width: 8rem; height: 3rem; display: flex; justify-content: center; align-items: center; background-color: #80bdff" data-toggle="modal" data-target="#confirmationModal" data-url="http://localhost/otp/home-user.php">Selesai</a>
        </div>
    </div>
<?php
}
?>

                
    </div>


            </div>

        </div>
    </div>
    <tbody>



        <!-- Bootstrap Js -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        document.getElementById('confirmFinish').addEventListener('click', function() {
    // var url = document.getElementById('finish').getAttribute('data-url');
    window.location.href = "http://localhost/otp/home-user.php";


});


</script>

<script>
    var timeLeft = <?php echo $time_left; ?>;

function updateTimer() {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;

    var formattedMinutes = ('0' + minutes).slice(-2);
    var formattedSeconds = ('0' + seconds).slice(-2);

    document.getElementById('timer').innerText = formattedMinutes + ":" + formattedSeconds;

    if (timeLeft <= 0) {
        window.location.href = 'http://localhost/otp/home-user.php';
    } else {
        timeLeft--;
        setTimeout(updateTimer, 1000);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    updateTimer();
});
    </script>

    <script>
    // $(document).ready(function() {
    //     const buttons = document.querySelectorAll('.answer-btn');
    //     var selectedAnswerId = "";
    //     var userId = <?php echo json_encode($userVerificationID); ?>;
    //     var soalId = <?php echo $soalID; ?>;

    //     buttons.forEach(button => {
    //         button.addEventListener('click', function() {
    //             // Reset background color for all buttons
    //             buttons.forEach(btn => btn.style.backgroundColor = '#cfe4ff');
    //             // Set background color for the clicked button
    //             this.style.backgroundColor = 'blue'; // Or use a CSS class like 'bg-success'

    //             // Store the clicked ID in a variable
    //             selectedAnswerId = this.id;
    //         });
    //     });

        $('#next').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');

            if (selectedAnswerId) {
                $.ajax({
                    url: 'save_answer.php',
                    type: 'POST',
                    data: {
                        answerId: selectedAnswerId,
                        soalId: soalId,
                        userid: userId
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = url;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                        alert('Failed to save answer');
                    }
                });
            } else {
                alert('Please select an answer before proceeding.');
            }
        });

        $('#finish').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');

            if (selectedAnswerId) {
                $.ajax({
                    url: 'save_answer.php',
                    type: 'POST',
                    data: {
                        answerId: selectedAnswerId,
                        soalId: soalId,
                        userid: userId
                    },
                    success: function(response) {
                        console.log(response);
                        // Tampilkan modal setelah data tersimpan
                        // var modal = document.getElementById('confirmationModal');
                        // modal.style.display = 'block';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                        alert('Failed to save answer');
                    }
                });
            } else {
                alert('Please select an answer before finishing brooo.');
            }
        });

    });
</script>


</body>

</html>