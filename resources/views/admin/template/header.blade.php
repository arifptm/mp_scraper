    <a href="/" class="logo">
      <span class="logo-mini"><b>M</b>S</span>
      <span class="logo-lg"><b>MP</b> Scraper</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">                
                <div class="pull-right">                                    
                  <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Sign out
                  </a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>