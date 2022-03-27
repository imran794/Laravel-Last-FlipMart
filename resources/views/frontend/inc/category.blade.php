      @php
      $categories = App\Models\Category::orderBy('category_name','ASC')->get();
      @endphp
      <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal" role="navigation">
              <ul class="nav">
                  @foreach ($categories as $category)

                  <li class="dropdown menu-item">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name }}</a>
                      <ul class="dropdown-menu mega-menu">
                          <div class="yamm-content">
                              <div class="row">
                                  @php
                                  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderby('sub_category_name','ASC')->get();
                                  @endphp
                                  @foreach ($subcategories as $subcategory)

                                  <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                      <h2 class="title">{{ $subcategory->sub_category_name }}</h2>
                                      <ul class="links">
                                          @php
                                          $subsucategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('sub_sub_category_name','ASC')->get();
                                          @endphp
                                          @foreach ($subsucategories as $subsucategory)

                                          <li><a href="#">{{ $subsucategory->sub_sub_category_name }}</a></li>
                                          @endforeach

                                      </ul>
                                  </div><!-- /.col -->
                                  @endforeach
                                  <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                      <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt="">

                                  </div><!-- /.yamm-content -->
                              </div>
                          </div>
                      </ul><!-- /.dropdown-menu -->
                  </li><!-- /.menu-item -->
                  @endforeach

              </ul><!-- /.nav -->
          </nav><!-- /.megamenu-horizontal -->
      </div><!-- /.side-menu -->
