@push('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@endpush
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Mapel</a>
  </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Mapel</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover" id="table">
                      <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mapel</th>
                            <th>Jenis mapel</th>
                            <th>action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($mapel as $item)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nm_mapel }}</td>
                                <td>{{ $item->jenismapel->nm_jenis}}</td>

                                <td>
                                  <a href="{{ route('admin.mapel.edit_mapel', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                  <form action="{{ route('admin.mapel.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                  </form>
                                  
                                </td>
                          
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection