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


          <a href="{{ route('banner.index') }}" class="sl-menu-link @yield('Add-Banner')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add-Banner</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

          <a href="{{ route('brand.index') }}" class="sl-menu-link @yield('Add-Brand')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add-Brand</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
       
        <a href="" class="sl-menu-link @yield('Categories')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link @yield('Add-Category')">Add-Category</a></li>
          <li class="nav-item"><a href="{{ route('subcategory.index') }}" class="nav-link @yield('Add-Sub-Category')">Add-SubCategory</a></li>
          <li class="nav-item"><a href="{{ route('subsubcategory.index') }}" class="nav-link @yield('Add-Sub-Sub-Category')">Add-Sub-Sub-Category</a></li>
        </ul>
        <a href="" class="sl-menu-link @yield('Manage Products')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link @yield('All Peoducts')">All Peoducts</a></li>
          <li class="nav-item"><a href="{{ route('product.create') }}" class="nav-link @yield('Add Products')">Add Products</a></li>
        </ul>

           <a href="{{ route('testimonial.index') }}" class="sl-menu-link @yield('Add-Testimonial')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add-Testimonial</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->  


         <a href="{{ route('blog.index') }}" class="sl-menu-link @yield('Add-Blog')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add-Blog</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->  

           <a href="{{ route('faq.index') }}" class="sl-menu-link @yield('Add-Faq')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add-Faq</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> 
        <a href="{{ route('contact.index') }}" class="sl-menu-link @yield('See-User-Message')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">See-User-Message</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> 
        <a href="{{ route('cinformation.index') }}" class="sl-menu-link @yield('Contact-Information-Add')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Contact-Information-Add</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
         <a href="{{ route('coupon.index') }}" class="sl-menu-link @yield('Add-Coupon')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Add Coupon</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
          <a href="" class="sl-menu-link @yield('Shiping-Area')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Shiping Area</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('shipingarea.index') }}" class="nav-link @yield('Add-Division')">Add-Division</a></li>
          <li class="nav-item"><a href="{{ route('shipdistrict.index') }}" class="nav-link @yield('Add-Shipdistrict')">Add-District</a></li>
          <li class="nav-item"><a href="{{ route('state.index') }}" class="nav-link @yield('Add-State')">Add-State</a></li>
        </ul>
         <a href="" class="sl-menu-link @yield('orders')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('pendding.order') }}" class="nav-link @yield('Pendding Order')">Pendding Order</a></li>
          <li class="nav-item"><a href="{{ route('confirm.order') }}" class="nav-link @yield('Confirm Order')">Confirm Order</a></li>
          <li class="nav-item"><a href="{{ route('processing.order') }}" class="nav-link @yield('Processing Order')">Processing Order</a></li>
          <li class="nav-item"><a href="{{ route('picked.order') }}" class="nav-link @yield('Picked Order')">Picked Order</a></li>
          <li class="nav-item"><a href="{{ route('shipped.order') }}" class="nav-link @yield('Shipped Order')">Shipped Order</a></li>
          <li class="nav-item"><a href="{{ route('delivered.order') }}" class="nav-link @yield('Delivered Order')">Delivered Order</a></li>
          <li class="nav-item"><a href="{{ route('Cancel.order') }}" class="nav-link @yield('Cancel Order')">Cancel Order</a></li>
        </ul>

           <a href="{{ route('reports') }}" class="sl-menu-link @yield('Reports')">
          <div class="sl-menu-item">
            <i class="icon ion-arrow-right-a"></i>
            <span class="menu-item-label">Reports</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->  


                 
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
      