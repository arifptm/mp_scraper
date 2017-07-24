    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
<!--       <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li>
          <a href="/admin/marketplaces">
            <i class="fa fa-table"></i> <span>Marketplace</span>
          </a>
        </li> 

        <li>
          <a href="/admin/feeds">
            <i class="fa fa-circle-o"></i> <span>Feed</span>
          </a>
        </li>         

        <li>
          <a href="/admin/cities">
            <i class="fa fa-th"></i> <span>City</span>
          </a>
        </li>     

        <li>
          <a href="/admin/sellers">
            <i class="fa fa-dashboard"></i> <span>Seller</span>
          </a>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach ($roots as $root)
              <li>
                <a href="/admin/category/{{ $root->id }}"><i class="fa fa-circle-o"></i> {{ $root->name }}</a>
              </li>
            @endforeach              
          </ul>
        </li>              

        <li>
          <a href="/admin/items">
            <i class="fa fa-th"></i> <span>Item</span>
          </a>
        </li> 
        
        <li>
          <a href="/admin/pages">
            <i class="fa fa-th"></i> <span>Pages</span>
          </a>
        </li> 
        <li>
          <a href="/admin/replacers">
            <i class="fa fa-th"></i> <span>Replacer</span>
          </a>
        </li> 

        <li>
          <a href="/admin/pending/tokopedia">
            <i class="fa fa-th"></i> <span>Pending Item</span>
          </a>
        </li> 
        <li>
          <a href="/admin/soldout/tokopedia">
            <i class="fa fa-th"></i> <span>Sold Out</span>
          </a>
        </li>         

        <li>
          <a href="/admin/linkcheck/tokopedia">
            <i class="fa fa-th"></i> <span>Link Check</span>
          </a>
        </li> 

      </ul>
    </section>
    <!-- /.sidebar -->