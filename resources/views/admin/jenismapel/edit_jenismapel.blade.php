@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Tambah Jenis Mapel Baru</div>
            <div class="card-body">
                <form action="{{ route('admin.jenismapel.update', ['jenis_mapel' => $jenismapel->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Jenis Mapel</label>
                        <input type="text" class="form-control" value="{{ $jenismapel->nm_jenis }}" name="nm_jenis" required>
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