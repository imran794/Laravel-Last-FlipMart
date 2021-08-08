@php

$tags = App\Models\Product::groupby('product_tags')->select('product_tags')->get()

@endphp




<div class="sidebar-widget product-tag wow fadeInUp">
                    <h3 class="section-title">Product tags</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="tag-list">
                            @foreach ($tags as $tag)
                                 <a class="item" title="Phone" href="{{ route('product.tag',$tag->product_tags,) }}">{{ str_replace(',', ' ', $tag->product_tags) }}</a> 
                            @endforeach
                        </div><!-- /.tag-list -->
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->