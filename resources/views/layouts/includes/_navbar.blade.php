    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="/dashboard"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>

        <form class="navbar-form navbar-left">
          <div class="input-group" methot="GET" action="siswa">
            <input name="cari" type="search" value="" class="form-control" placeholder="Search...">
            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
          </div>
        </form>

        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                 @if(Auth::user()->gambar == '')
                <img src="{{asset('images/user/default.png')}}" class="img-circle" alt="Avatar">
                 @else
                 <img class="img-circle"  src="{{asset('images/user/'.Auth::user()->gambar)}}" alt="Avatar">
                 @endif

               <span class="profile-text">{{Auth::user()->level}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>

              <ul class="dropdown-menu">
                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                <li><a href="{{route('user.edit', Auth::user()->id)}}"><i class="lnr lnr-exit"></i> <span>Edit Profile</span></a></li>
               
              
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>