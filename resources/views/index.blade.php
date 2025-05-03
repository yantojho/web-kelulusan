<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Coming Soon - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .countdown-container {
                background-color: rgba(0, 0, 0, 0.5);
                padding: 20px;
                border-radius: 10px;
                margin-top: 30px;
            }
            .countdown-container h3 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 0;
            }
            .countdown-container p {
                font-size: 1rem;
                margin-top: 0;
            }
            .form-container {
                background-color: rgba(0, 0, 0, 0.5);
                padding: 20px;
                border-radius: 10px;
                margin-top: 30px;
                display: none;
            }
            .form-container .form-control {
                margin-bottom: 15px;
            }
            .form-container .btn-primary {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/Profil.mp4" type="video/mp4" /></video>
        <!-- Masthead-->

        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <h1 class="fst-italic lh-1 mb-4">Pengumuman Kelulusan</h1>
                    <p class="mb-5">Pengumuman kelulusan akan dibuka pada waktu yang ditentukan. Silahkan tunggu hingga waktu pengumuman tiba.</p>
                    
                    <!-- Countdown Timer -->
                    <div class="countdown-container mb-5" id="countdown-container">
                        <div class="row text-center">
                            <div class="col-3">
                                <h3 id="days">00</h3>
                                <p>Hari</p>
                            </div>
                            <div class="col-3">
                                <h3 id="hours">00</h3>
                                <p>Jam</p>
                            </div>
                            <div class="col-3">
                                <h3 id="minutes">00</h3>
                                <p>Menit</p>
                            </div>
                            <div class="col-3">
                                <h3 id="seconds">00</h3>
                                <p>Detik</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Input NIS dan NISN -->
                    <div class="form-container" id="form-container">
                        <form action="{{ route('cek-kelulusan') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
                            </div>
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Lihat Pengumuman</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        
        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                            
        <!-- Script untuk countdown timer -->
        <script>
            // Mengambil tanggal dari database
            var countDownDate = new Date("<?php echo $setting->tgl ?? date('Y-m-d H:i:s'); ?>").getTime();
            
            // Update countdown setiap 1 detik
            var x = setInterval(function() {
                // Mendapatkan waktu saat ini
                var now = new Date().getTime();
                
                // Menghitung selisih waktu
                var distance = countDownDate - now;
                
                // Menghitung hari, jam, menit, dan detik
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                // Menampilkan hasil countdown
                document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
                document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
                document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
                document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;
                
                // Jika countdown selesai
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("days").innerHTML = "00";
                    document.getElementById("hours").innerHTML = "00";
                    document.getElementById("minutes").innerHTML = "00";
                    document.getElementById("seconds").innerHTML = "00";
                    
                    // Tampilkan form input NIS dan NISN
                    document.getElementById("countdown-container").style.display = "none";
                    document.getElementById("form-container").style.display = "block";
                }
            }, 1000);
            
            // Cek apakah waktu sudah lewat saat halaman dimuat
            var initialDistance = countDownDate - new Date().getTime();
            if (initialDistance < 0) {
                document.getElementById("countdown-container").style.display = "none";
                document.getElementById("form-container").style.display = "block";
            }
        </script>
    </body>
</html>