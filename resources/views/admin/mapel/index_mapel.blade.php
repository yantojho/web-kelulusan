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
    <a href="{{ route('mapel.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Mapel</a>
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
                                  <div class="btn-group dropdown">
                                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Action
                                          </button>
                                      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                          <a class="dropdown-item" href="{{route('mapel.edit', $item->id)}}"> Edit </a>
                                          <form action="{{ route('mapel.destroy', $item->id) }}" class="pull-left"  method="post">
                                              {{ csrf_field() }}
                                              {{ method_field('delete') }}
                                              <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                                              </button>
                                          </form>
                                      </div>
                                  </div>
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