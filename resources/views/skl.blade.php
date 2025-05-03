<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Lulus</title>
    <!-- <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}"> -->
    <link rel="stylesheet" href="{{public_path('skl/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('skl/css/bootstrap.css')}}">
    <style>
    @page { margin:10px 55px 10px 30px; }
    body{
        font-family:serif !important
        margin:0!important;
        padding:0!important;
    }
    h1,h2,h3,h4,h5,h6{
        font-family:serif!important
    }
    </style>
</head>
<body>

<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <!-- <img src="{{ asset('kop/'.$setting->kop) }}" class="w-100"> -->
                <img src="{{ public_path('kop/'.$setting->kop) }}" class="w-100">
            </div>
            <div class="my-2">
                <h4 class="text-center"><u><strong>SURAT KETERANGAN LULUS</strong></u></h4>
                <h6 class="text-center"><strong>Nomor : {{ $setting->no_surat }}</strong></h6>
            </div>
            <div class="my-4">
                <div class="text-justify">
                    Yang bertanda tangan di bawah ini, Kepala Sekolah Menengah Kejuruan Negeri 1 Seputih Agung Lampung Tengah menerangkan bahwa Berdasarkan Rapat Kelulusan Dewan Guru Pada Tanggal 02 Mei 2025 yang menyatakann bahwa :
                </div>
            </div>
            <div class="my-3">
                <table class="w-100">
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
            <div class="my-3" style="font-family:sans-serif !important;font-size:12px !important">
                <table class="table table-borderless">
                    <thead>
                        <tr class="font-bold">
                            <th class="text-center">No</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th>Nilai Ujian Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenismapel as $jmp)
                        <tr>
                            <td colspan="3" class="fw-bold text-uppercase">{{ $jmp->nm_jenis }}</td>
                        </tr>
                        @foreach($nilai as $n)
                            @if($n->mapel->jenismapel_id == $jmp->id)
                            <tr>
                                <td align="center">
                                    @if($jmp->id == 1)
                                        {{ $loop->iteration }}
                                    @else
                                        {{ $loop->iteration-$n->count()+1 }}
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
                                {{ round($nilai->avg('nilai'), 1) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-3">
                <div class="text-justify">
                    Dinyatakan <strong>TELAH MEMENUHI</strong> Syarat Kelulusan Sekolah Tahun Pelajaran {{date('Y', strtotime('-1 year'))}}/{{date('Y')}}.
                    <br>
                    Surat Keterangan Lulus ini berlaku sampai dengan Ijazah asli keluar.
                </div>
            </div>
            <div class="my-4">
                <div class="float-end">
                    <div class="flex">
                        <div class="text-center">Lampung Tengah, 05 Mei 2025</div>
                        <div class="text-center">Kepala Sekolah,</div>
                    </div>
                    <div style="height:70px"></div>
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