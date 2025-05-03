@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Tambah Jenis Mapel Baru</div>
            <div class="card-body">
                <form action="{{ route('admin.jenismapel.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Jenis Mapel</label>
                        <input type="text" class="form-control" id="nama" name="nm_jenis" required>
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