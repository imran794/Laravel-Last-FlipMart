      <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">hot deals</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

                        @foreach ($hot_dealss as $hotdeals)
                            
                        <div class="item">
                            <div class="products">
                                <div class="hot-deal-wrapper">
                                    <div class="image">
                                        <img src="{{ asset($hotdeals->product_thambnail) }}" alt="$hotdeals->product_thambnail">
                                    </div>
                                    @php
                                    $amount = $hotdeals->selling_price - $hotdeals->discount_price;
                                    $discount = ( $amount/$hotdeals->selling_price) * 100;
                                    @endphp
                                    <div class="">
                                        @if ($hotdeals->discount_price == NULL)
                                            <span class="tag sale">new</span>
                                        @else
                                            <span class="sale-offer-tag">{{ round($discount) }}%<br>off</span>
                                        @endif
                                      
                                    </div>
                                    <div class="timing-wrapper">
                                        <div class="box-wrapper">
                                            <div class="date box">
                                                <span class="key">120</span>
                                                <span class="value">DAYS</span>
                                            </div>
                                        </div>

                                        <div class="box-wrapper">
                                            <div class="hour box">
                                                <span class="key">20</span>
                                                <span class="value">HRS</span>
                                            </div>
                                        </div>
                                            
                                        <div class="box-wrapper">
                                            <div class="minutes box">
                                                <span class="key">36</span>
                                                <span class="value">MINS</span>
                                            </div>
                                        </div>

                                        <div class="box-wrapper hidden-md">
                                            <div class="seconds box">
                                                <span class="key">60</span>
                                                <span class="value">SEC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.hot-deal-wrapper -->

                                <div class="product-info text-left m-t-20">
                                    <h3 id="pname" class="name"><a href="{{ url('product.details'.$hotdeals->id.'/'.$hotdeals->product_slug) }}">{{ $hotdeals->product_name }}</a></h3>
                                    <div class="rating rateit-small"></div>

                                    <div class="product-price">
                                        @if ($hotdeals->discount_price == NULL)
                                             <span class="price">{{ $hotdeals->selling_price }}</span>
                                        @else
                                            <span class="price">${{ $hotdeals->discount_price }}</span>
                                             <span class="price-before-discount">${{ $hotdeals->selling_price }}</span>

                                        @endif
                                    
                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->

                                <div class="cart clearfix animate-effect">
                                    <div class="action">

                                        <div class="add-cart-button btn-group">
                                            <input type="hidden" id="product_id" value="{{ $hotdeals->id }}">
                                        <div class="col-sm-7">
                                            <button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            
                                        </div>

                                        </div>

                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div>
                        </div>
                        @endforeach
                    </div><!-- /.sidebar-widget -->
                </div>