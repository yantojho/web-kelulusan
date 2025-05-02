@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Modul Ajar</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0"></h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> belum kirim Modul/RPP
                </p>
            </div>
        </div>
    </div>
</div>

@endsection