<nav class="navbar has-shadow">
           <div class="container">
              <div class="navbar-start">
                 <a class="navbar-item is-paddingless" href="{{route('home')}}">
                    <img src="{{asset('img/logo_placeholder.png')}}" alt="Logo"> 
                 </a>
                 <a class="navbar-item is-tab is-hidden-mobile m-l-20" href="#">Learn</a>
                 <a class="navbar-item is-tab is-hidden-mobile" href="#">Discuss</a>
                 <a class="navbar-item is-tab is-hidden-mobile" href="#">Share</a> 
              </div>
              <span class="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
              </span>
              
              <div class="navbar-end navbar-menu" style="overflow: visible;">
                <a class="navbar-item is-tab is-hidden-tablet m-l-20" href="#">Learn</a>
                 <a class="navbar-item is-tab is-hidden-tablet" href="#">Discuss</a>
                 <a class="navbar-item is-tab is-hidden-tablet" href="#">Share</a> 
                  @if(Auth::guest())
                    <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                    <a href="{{route('register')}}" class="navbar-item is-tab">Join the community</a>
                  @else
                    <button class="dropdown navbar-item is-tab">
                        Hey {{Auth::user()->name}} <span class="icon"><i class="fa fa-caret-down"></i></span>

                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span>Profile</a></li>
                            <li><a href="#"><span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span>Notifications</a></li>
                            <li><a href="{{route('manage.dashboard')}}"><span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span>Manage</a></li>
                            <li class="separator"></li>
                            
                            <li><a href="{{route('logout')}}" 
                              onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span>Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            
                        </ul>
                    </button>
                  @endif
              </div> 
           </div>  
        </nav>