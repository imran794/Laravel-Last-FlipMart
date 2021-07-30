<div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{ url('/') }}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visit Site</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @can('edit product')
         <a href="{{ route('role.index') }}" class="sl-menu-link @yield('Role Management')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Role Management</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @else
        @endcan

          <a href="{{ route('brand.index') }}" class="sl-menu-link @yield('Add-Brand')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add-Brand</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
       
        <a href="" class="sl-menu-link @yield('Categories')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Categories</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link @yield('Add-Category')">Add-Category</a></li>
          <li class="nav-item"><a href="{{ route('subcategory.index') }}" class="nav-link @yield('Add-Sub-Category')">Add-SubCategory</a></li>
          <li class="nav-item"><a href="{{ route('subsubcategory.index') }}" class="nav-link @yield('Add-Sub-Sub-Category')">Add-Sub-Sub-Category</a></li>
        </ul>
       
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
      