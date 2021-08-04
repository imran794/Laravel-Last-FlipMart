  <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach ($special_deals as $specialdeal)
                                        
                                   
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{ route('product.details',$specialdeal->product_slug) }}">
                                                                <img src="{{ asset($specialdeal->product_thambnail) }}" alt="product_thambnail">
                                                            </a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{ route('product.details',$specialdeal->product_slug) }}">{{ $specialdeal->product_name }}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">
                                                             @if($specialdeal->discount_price == NULL)
                                                            <span class="price">${{ $specialdeal->discount_price }}</span>
                                                            <span class="price-before-discount">${{ $specialdeal->selling_price }}</span>
                                                        @else
                                                        <span class="price">${{ $specialdeal->selling_price }}</span>
                                                        @endif

                                                        </div><!-- /.product-price -->

                                                    </div>
                                                </div><!-- /.col -->
                                            </div><!-- /.product-micro-row -->
                                        </div><!-- /.product-micro -->

                                    </div>
                              @endforeach
                                </div>
                            </div>
                           
                        </div>
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->