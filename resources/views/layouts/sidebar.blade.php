<ul class="nav">
    @auth
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(isset(Auth::user()->gambar) == 0)
                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item "> 
            <a class="nav-link" href="{{url('/home')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->level == 'admin')
          <li class="nav-item ">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link " href="{{route('anggotasiswa.index')}}">Data Siswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{url('anggotaguru')}}">Data  Guru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('kelas.index')}}">Data Kelas</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link " href="{{route('mapel.index')}}">Mata Pelajaran</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('guruajar.index')}}">Guru Mengajar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('user.index')}}">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('level.index')}}">Level</a>
                </li>
                
              </ul>
            </div>
          </li>
          @endif
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-transaksi" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Perangkat Ajar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('modulajar.index')}}" @if(App\ModulAjar::whereIdGuru(auth()->user()->kon_id)->count() > 0 || auth()->user()->role->is_admin) style="cursor:allowed; color:green;" @endif>Modul Ajar/RPP</a>
                </li>
                <li class="nav-item" >
                  <a class="nav-link" href="{{route('jurnal.index')}}">Jurnal Mengajar</a>
                </li>  
                <li class="nav-item" >
                  <a class="nav-link" @if(App\PKetercapain::whereIdGuru(auth()->user()->kon_id)->count() > 0 || 
                      auth()->user()->role->is_admin) href="https://google.com" @else href="#" @endif @if(App\PKetercapain::whereIdGuru(auth()->user()->kon_id)->count() > 0 || auth()->user()->role->is_admin) style="cursor:allowed;" @else style="cursor:not-allowed" @endif>Analisis Kurikulum</a>
                </li>  
                <li class="nav-item" >
                  <a class="nav-link" @if(App\PJurnalTugas::whereIdGuru(auth()->user()->kon_id)->count() > 0 || 
                    auth()->user()->role->is_admin) href="https://google.com" @else href="#" @endif @if(App\PJurnalTugas::whereIdGuru(auth()->user()->kon_id)->count() > 0 || auth()->user()->role->is_admin) style="cursor:allowed;" @else style="cursor:not-allowed" @endif>Jurnal Tugaas</a>
                </li>  
                <li class="nav-item" >
                  <a class="nav-link" @if(App\PMasalah::whereIdGuru(auth()->user()->kon_id)->count() > 0 || 
                    auth()->user()->role->is_admin) href="https://google.com" @else href="#" @endif @if(App\PMasalah::whereIdGuru(auth()->user()->kon_id)->count() > 0 || auth()->user()->role->is_admin) style="cursor:allowed;" @else style="cursor:not-allowed" @endif>Siswa Bermasalah</a>
                </li>  
                <li class="nav-item" >
                  <a class="nav-link" @if(App\PRemedial::whereIdGuru(auth()->user()->kon_id)->count() > 0 || 
                    auth()->user()->role->is_admin) href="https://google.com" @else href="#" @endif @if(App\PRemedial::whereIdGuru(auth()->user()->kon_id)->count() > 0 || auth()->user()->role->is_admin) style="cursor:allowed;" @else style="cursor:not-allowed" @endif>Remedial</a>
                </li>  
                <li class="nav-item" >
                  <a class="nav-link" @if(App\PPerbaikan::whereIdGuru(auth()->user()->kon_id)->count() > 0 ||
                     auth()->user()->role->is_admin) href="https://google.com" @else href="#" @endif @if(App\PPerbaikan::whereIdGuru(auth()->user()->kon_id)->count() > 0 || auth()->user()->role->is_admin) style="cursor:allowed;" @else style="cursor:not-allowed" @endif>Perbaikan</a>
                </li>  
              </ul>
            </div>
          </li>

          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-nilai" aria-expanded="false" aria-controls="ui-absensi">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Nilai</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-nilai">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="">Tugas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Raport</a>
                  </li>
                  
                  
                </ul>
              </div>
            </li>

          @if( auth()->user()->role->is_admin || auth()->user()->role->is_piket || auth()->user()->role->is_walas)           
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-absensi" aria-expanded="false" aria-controls="ui-absensi">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Absensi Siswa</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-absensi">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('absensisiswa.hariini')}}">Daftar Absensi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('cetakabsensi_tgl')}}">Cetak Absensi/Tanggal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('cetakabsensi_bln')}}">Cetak Absensi/Bulan</a>
                  </li>
                  
                  
                </ul>
              </div>
            </li>
         

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-laporan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href=""></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href=""></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href=""></a>
                  </li>
                </ul>
              </div>
            </li>
          @endif
          @endauth
        </ul>