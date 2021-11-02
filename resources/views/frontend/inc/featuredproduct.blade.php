<section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Featured products</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach ($fproducts as $product)
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
                                    </div><!-- /.product-image -->
                                </div>


                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h3>
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
                                                            @if ($product->discount_price == NULL)
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