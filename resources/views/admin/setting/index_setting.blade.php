@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.setting.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="1">
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">KOP</label>
                        <div class="mb-3">
                            @if($setting?->kop)
                            <img src="{{ asset('kop/'.$setting->kop) }}" alt="" class="img-thumbnail">
                            @endif
                        </div>
                        <input type="file" class="form-control" value="{{ $setting?->kop }}" name="kop">
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" value="{{ $setting?->no_surat }}" name="no_surat">
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Isi Awal</label>
                        <input type="text" class="form-control" value="{{ $setting?->isi_awal }}" name="isi_awal">
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Isi Akhir</label>
                        <input type="text" class="form-control" value="{{ $setting?->isi_akhir }}" name="isi_akhir">
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Nama Kepala Sekolah</label>
                        <input type="text" class="form-control" value="{{ $setting?->nm_kepsek }}" name="nm_kepsek">
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">NIP Kepala Sekolah</label>
                        <input type="text" class="form-control" value="{{ $setting?->nip_kepsek }}" name="nip_kepsek">
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Tanggal Pengumuman</label>
                        <input type="datetime-local" class="form-control" value="{{ $setting?->tgl }}" name="tgl">
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection