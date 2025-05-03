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
    
      <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
        @endif
      </div>
    </div>
    <div class="row" style="margin-top: 20px;">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card card-header">
            <div class="row">
              <div class="col-md-12">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                  <i class="fa fa-upload"></i> Import
                </a>
                <a href="{{ url('')}}/format/anggota_siswa.xlsx"  class="btn btn-warning"><i class="fa fa-download"></i>Download Format</a>
              </div>
            </div>


          </div>

                <div class="card-body">
                  <h4 class="card-title">Data Nilai</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover" id="table">
                      <thead>
                        <tr>
                        <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Nama Mapel </th>
                            <th>Nilai</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($nilai as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nm_siswa }}</td>
                                <td>{{ $item->nm_mapel }}</td>
                                <td>{{ $item->nilai }}</td>
                                <td>
                                    <a href="{{ url('')}}/nilai/edit/{{ $item->id }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('')}}/nilai/delete/{{ $item->id }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
               
                </div>
              </div>
            </div>
          </div>


          <!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form method="post" action="/nilai/import_excel" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
          </div>
          <div class="modal-body">

            {{ csrf_field() }}

            <label>Pilih file excel</label>
            <div class="form-group">
              <input type="file" name="file" required="required">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection