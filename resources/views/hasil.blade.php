<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengumuman {{ $siswa->nm_siswa }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background:url('https://smkn1seputihagung.sch.id/images/slider/gerbang.jpg') center no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        .overlay{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="relative">
        <div class="overlay"></div>
        <div class="container" style="z-index:10 !important">
            <div class="row align-items-center vh-100">
                <div class="col-lg-7 offset-lg-2">
                    <div class="text-center mb-5">
                        <img src="https://smkn1seputihagung.sch.id/images/LOGO_SMK.png" class="w-25">
                    </div>
                    <h1 class="text-center">PENGUMUMAN KELULUSAN</h1>
                    <h2 class="text-center mt-4">SMKN 1 Seputih Agung</h2>
                    <h2 class="text-center">Tahun Pelajaran 2024/2025</h2>
                    <div class="card mt-5">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $siswa->nm_siswa }}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>: {{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>: {{ str_replace("-"," ",$siswa->kls) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        @if($siswa->status_lulus == 0)
                                        <div class="alert alert-danger">
                                            Maaf Anda di nyatakan
                                            <br>
                                            <strong>Tidak Lulus</strong>
                                        </div>
                                        @else
                                        <div class="alert alert-success">
                                            Selamat Anda di nyatakan
                                            <br>
                                            <strong>Lulus</strong>
                                        </div>
                                        @endif
                                    </td> 
                                </tr>
                            </table>

                            <div class="my-3 text-center">
                                <a href="{{ route('index') }}" class="btn btn-warning">Kembali</a>
                                <a href="" class="btn btn-success">Download Surat Keterangan Lulus (SKL)</a>
                                @if($siswa->status_bayar == 1)
                                <a href="" class="btn btn-primary">Download Transkip Nilai</a>
                                @else
                                <div class="alert alert-danger mt-3">Untuk mendownload transkip nilai, silahkan selesaikan terlebih dahulu administrasi anda.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>