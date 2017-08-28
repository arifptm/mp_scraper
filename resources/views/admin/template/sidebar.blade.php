    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">
            
        </li> 
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
          <a href="/admin/categories">
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
          <a href="/admin/replacers">
            <i class="fa fa-th"></i> <span>Replacer</span>
          </a>
        </li>  

         <li class="header"></li> 
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

        <li class="header"></li>   
        <li>
          <a href="/admin/vocabularies">
            <i class="fa fa-th"></i> <span>Vocabulary</span>
          </a>
        </li> 
        <li>
          <a href="/admin/terms">
            <i class="fa fa-th"></i> <span>Term</span>
          </a>
        </li> 
        <li>
          <a href="/admin/pages">
            <i class="fa fa-th"></i> <span>Pages</span>
          </a>
        </li> 
        <li>
          <a href="/admin/articles">
            <i class="fa fa-th"></i> <span>Article</span>
          </a>
        </li> 




      </ul>
    </section>