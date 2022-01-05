<div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach ($special_offer as $specialoffer)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="">
                                                                <img src="{{ asset($specialoffer->product_thambnail) }}">
                                                            </a>
                                                        </div><!-- /.image -->
                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 id="pname" class="name"><a href="{{ url('product/details/'.$specialoffer->id.'/'.$specialoffer->product_slug) }}">{{ $specialoffer->product_name }}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                       <div class="product-price">
                                                        @if($specialoffer->discount_price == NULL)
                                                        <span class="price">${{ $specialoffer->selling_price }}</span>

                                                        @else
                                                        <span class="price">${{ $specialoffer->discount_price }}</span>
                                                        <span class="price-before-discount">${{ $specialoffer->selling_price }}</span>
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