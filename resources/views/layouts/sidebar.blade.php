<ul class="nav">
    @auth
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item "> 
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link " href="{{ route('admin.mapel') }}">Data Mapel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{ route('admin-siswa') }}">Data Siswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{ route('admin-nilai') }}">Data Nilai</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item "> 
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="menu-icon fa fa-cog"></i>
              <span class="menu-title">Pengaturan</span>
            </a>
          </li>
          @endauth
        </ul>