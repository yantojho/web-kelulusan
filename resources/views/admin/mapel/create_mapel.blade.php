@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.mapel.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nm_jenis" class="form-label">Nama Jenis Mapel</label>
                        <select name="jenismapel_id" id="" class="form-control">
                            <option value="">Pilih Jenis Mapel</option>
                            @foreach($jenismapel as $item)
                            <option value="{{ $item->id }}">{{ $item->nm_jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nm_mapel" class="form-label">Nama Mapel</label>
                        <input type="text" class="form-control" id="nm_mapel" name="nm_mapel">
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