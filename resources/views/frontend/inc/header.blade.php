            @if ($banners)
            
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach ($banners as $banner)
                        <div class="item" style="background-image: url({{ asset($banner->image) }});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="slider-header fadeInDown-1">{{ $banner->sub_title }}</div>
                                    <div class="big-text fadeInDown-1">
                                        {{ $banner->title }}
                                    </div>

                                    <div class="excerpt fadeInDown-2 hidden-xs">

                                        <span>{{ $banner->des }}</span>

                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ $banner->btn }}</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->
                         @endforeach
                    </div><!-- /.owl-carousel -->
                </div>

                @else
                
            @endif