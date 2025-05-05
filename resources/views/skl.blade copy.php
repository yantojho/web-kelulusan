<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Lulus</title>
    <!-- <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}"> -->
    <link rel="stylesheet" href="{{public_path('skl/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('skl/css/bootstrap.css')}}">
    <style>
    @page { margin:0px; }
    body{
        font-family:serif !important;
        margin:0 !important;
        padding:0!important;
    }
    h1,h2,h3,h4,h5,h6{
        font-family:serif!important
    }
    .nilai {
            border-collapse: collapse !important;
        }
    .nilai, .nilai th, .nilai td {
        border: 1px solid black !important;
    }
    </style>
</head>
<body>

<div style="position:relative;margin:0 !important;padding:0 !important">
    <img src="{{public_path('image/bg-skl.jpeg')}}" style="position:absolute;top:0;bottom:0;width:100%;height:100%;z-index:0;display:block">
    <!-- <img src="{{asset('image/bg-skl.jpeg')}}" style="position:absolute;top:0;bottom:0;right:0;left:0;z-index:-1"> -->
    <div class="row" style="z-index:10;display:block;width:90%">
        <div class="col-lg-12">
            <div class="text-center d-flex align-items-center justify-content-center">
                <!-- <img src="{{ asset('kop/'.$setting->kop) }}" class="w-100"> -->
                <img src="{{ public_path('kop/'.$setting->kop) }}" style="margin-left:70px;width:95%;text-align:center;margin-top:85px">
            </div>
            <div class="my-1" style="margin-left:70px">
                <h4 class="text-center" style="font-size:13px !important"><u><strong>SURAT KETERANGAN LULUS</strong></u></h4>
                <h6 class="text-center" style="font-size:13px !important"><strong>Nomor : {{ $setting->no_surat }}</strong></h6>
            </div>
            <div class="my-2" style="margin-left:70px">
                <div class="text-justify" style="font-size:12px !important">
                    Yang bertanda tangan di bawah ini, Kepala Sekolah Menengah Kejuruan Negeri 1 Seputih Agung Lampung Tengah <br/> menerangkan bahwa Berdasarkan Rapat Kelulusan Dewan Guru Pada Tanggal 02 Mei 2025 yang menyatakann bahwa :
                </div>
            </div>
            <div class="my-2" style="margin-left:60px">
                <table class="w-100" style="font-size:12px !important;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><strong>{{ $siswa->nm_siswa }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tempat dan tanggal lahir</td>
                        <td>:</td>
                        <td>{{ $siswa->ttl }}6</td>
                    </tr>
                    <tr>
                        <td>NIS/NISN</td>
                        <td>:</td>
                        <td>{{ $siswa->nis }}/{{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td>Konsentrasi Keahlian</td>
                        <td>:</td>
                        <td>{{ $siswa->jen_konsentrasi }}</td>
                    </tr>
                </table>
            </div>
            <div class="my-3" style="font-family:sans-serif !important;font-size:11px !important;margin-left:60px">
                <table class="table nilai" style="background:transparent !important">
                    <thead>
                        <tr class="font-bold">
                            <th class="text-center">No</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th>Nilai Ujian Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $mapelsatu = 1;
                            $mapeldua = 1;
                        @endphp

                        @foreach($jenismapel as $jmp)
                        <tr>
                            <td colspan="3" class="fw-bold text-uppercase">{{ $jmp->nm_jenis }}</td>
                        </tr>
                        @foreach($nilai as $n)
                            @if($n->mapel->jenismapel_id == $jmp->id)
                            <tr>
                                <td align="center">
                                    @if($jmp->id == 1)
                                        {{ $mapelsatu++  }}
                                    @else
                                        {{ $mapeldua++ }}
                                    @endif
                                </td>
                                <td>{{ $n->mapel->nm_mapel }}</td>
                                <td>{{ $n->nilai }}</td>
                            </tr>
                            @endif
                            @endforeach
                        @endforeach
                        <tr>
                            <td colspan="2" class="fw-bold text-center">
                                Jumlah
                            </td>
                            <td>
                                {{ $nilai->sum('nilai') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="fw-bold text-center">
                                Rata-Rata
                            </td>
                            <td>
                                {{ round($nilai->avg('nilai'), 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-3" style="margin-left:60px">
                <div class="text-justify" style="font-size:12px !important">
                    Dinyatakan <strong>TELAH MEMENUHI</strong> Syarat Kelulusan Sekolah Tahun Pelajaran {{date('Y', strtotime('-1 year'))}}/{{date('Y')}}.
                    <br>
                    Surat Keterangan Lulus ini berlaku sampai dengan Ijazah asli keluar.
                </div>
            </div>
            <div class="my-4" style="font-size:12px !important">
                <div class="float-end" style="margin-right:40px">
                    <div class="flex">
                        <div class="text-center">Lampung Tengah, 05 Mei 2025</div>
                        <div class="text-center">Kepala Sekolah,</div>
                    </div>
                    <div style="height:50px"></div>
                    <div class="text-center">
                        <div class="text-center text-uppercase">
                            <strong>{{ $setting->nm_kepsek  }}</strong>
                        </div>
                        <div class="text-center text-uppercase">
                            <strong>NIP. {{ $setting->nip_kepsek  }}</strong>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>