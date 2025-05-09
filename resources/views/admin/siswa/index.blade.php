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
                  <h4 class="card-title">Data Siswa</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover" id="table">
                      <thead>
                        <tr>
                        <th>No.</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>TTL</th>
                            <th>Konsentrasi</th>
                            <th>Kelas</th>
                            <th>S-Lulus</th>
                            <th>S-Bayar</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nm_siswa }}</td>
                                <td>{{ $item->ttl }}</td>
                                <td>{{ $item->jen_konsentrasi }}</td>
                                <td>{{ $item->kls }}</td>
                                <td>
                                    
                                @if($item->status_lulus == '1') 
                                    Lulus
                                @endif
                                   </td>
                                <td>
                                    @if($item->status_bayar=='1')
                                        lunas
                                    @else
                                        Belum
                                    @endif
                                </td>
                                <td>
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
      <form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
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