<section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">New Arrivals</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                           @foreach ($skip_product_0 as $product)

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="" alt="product_thambnail"></a>
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
                                                    <h3 class="name"><a href=""</a></h3>
                                                    <div class="rating rateit-small"></div>
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
                </section><!-- /.section -->