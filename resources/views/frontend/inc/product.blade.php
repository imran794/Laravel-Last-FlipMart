  <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                            @foreach ($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul><!-- /.nav-tabs -->
                    </div>

                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach ($products as $product)

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thambnail) }}" alt="product_thambnail"></a>
                                                    </div><!-- /.image -->
                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ( $amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div class="">
                                                        @if ($product->discount_price == NULL)
                                                        <span class="tag sale">new</span>
                                                        @else
                                                        <span class="tag new">{{ round($discount) }}%</span>
                                                        @endif

                                                    </div>
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="">{{ $product->product_name }}</a></h3>
                                                   @if ( $productreview = App\Models\Rating::where('product_id',$product->id)->first())
                                                    @php

                                                    $productreview = App\Models\Rating::with('user')->where('product_id',$product->id)->where('status','approve')->latest()->get();
                                                    $rating = App\Models\Rating::where('product_id',$product->id)->avg('rating');
                                                    $avgrating = number_format($rating,1);

                                                    @endphp
                                                   @for($i=1; $i<= 5; $i++) <span>
                                                <i style="color: red;" class="glyphicon glyphicon-star{{ ($i <= $avgrating)? '' : '-empty' }}"></i>

                                                </span>
                                                @endfor
                                                  ({{ count($productreview) }})
                                                       
                                                   @else
                                                  <span class="text-danger">No Review</span>
                                                       
                                                   @endif
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        @if($product->discount_price == NULL)
                                                        <span class="price">${{ $product->selling_price }}</span>

                                                        @else
                                                        <span class="price">${{ $product->discount_price }}</span>
                                                        <span class="price-before-discount">${{ $product->selling_price }}</span>
                                                        @endif
                                                    </div><!-- /.product-price -->

                                                </div><!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"  type="button" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)">
                                                                    
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                            </li>

                                                       
                                                                 <button class="btn btn-primary icon"  type="button" data-toggle="modal" id="{{ $product->id }}" onclick="addtowishlist(this.id)">
                                                                    
                                                                    <i class="icon fa fa-heart"></i>
                                                                </button>
                                                        

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>  
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    @endforeach

                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div><!-- /.tab-pane -->
                        @foreach ($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    @php
                                    $catwiseProducts = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp

                                    @foreach ($catwiseProducts as $catwiseProduct)
                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href=""><img src="{{ asset($catwiseProduct->product_thambnail) }}" alt=""></a>
                                                    </div><!-- /.image -->
                                                    
                                                         @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ( $amount/$product->selling_price) * 100;
                                                         @endphp
                                                     <div class="">
                                                        @if ($catwiseProduct->discount_price == NULL)
                                                        <span class="tag sale">new</span>
                                                        @else
                                                        <span class="tag new">{{ round($discount) }}%</span>
                                                        @endif

                                                    </div>
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="">{{ $catwiseProduct->product_name }}</a></h3>
                                                      @if ( $productreview = App\Models\Rating::where('product_id',$product->id)->first())
                                                    @php

                                                    $productreview = App\Models\Rating::where('product_id',$product->id)->where('status','approve')->latest()->get();
                                                    $rating = App\Models\Rating::where('product_id',$product->id)->avg('rating');
                                                    $avgrating = number_format($rating,1);

                                                    @endphp
                                                   @for($i=1; $i<= 5; $i++) <span>
                                                <i style="color: red;" class="glyphicon glyphicon-star{{ ($i <= $avgrating)? '' : '-empty' }}"></i>

                                                </span>
                                                @endfor
                                                  ({{ count($productreview) }})
                                                       
                                                   @else
                                                  <span class="text-danger">No Review</span>
                                                       
                                                   @endif
                                                    <div class="description"></div>
                                               

                                                    <div class="product-price">
                                                        @if($catwiseProduct->discount_price == NULL)
                                                           <span class="price">${{ $catwiseProduct->selling_price }}</span>
                                                       
                                                        @else
                                                        <span class="price">${{ $catwiseProduct->discount_price }}</span>
                                                        <span class="price-before-discount">${{ $catwiseProduct->selling_price }}</span>
                                                        @endif
                                                    </div><!-- /.product-price -->

                                                </div><!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                            </li>

                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    @endforeach

                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div><!-- /.tab-pane -->
                        @endforeach
                    </div><!-- /.tab-content -->