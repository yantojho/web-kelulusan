@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin-nilai.update', ['id' => $nilai->id ]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" value="{{ $nilai->nm_siswa }}" name="nm_mapel" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" value="{{ $nilai->nm_mapel }}" name="nm_mapel" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" value="{{ $nilai->nilai }}" name="nilai">
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