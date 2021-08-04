  
@if ($testimonials)
    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                    <div id="advertisement" class="advertisement">
                        @foreach ($testimonials as $testimonial)
            
                        <div class="item">
                            <div class="avatar"><img src="{{ asset($testimonial->image) }}" alt="Image"></div>
                            <div class="testimonials"><em>"</em>{{ $testimonial->des }}<em>"</em></div>
                            <div class="clients_author">{{ $testimonial->title }} <span>{{ $testimonial->sub_title }}</span> </div><!-- /.container-fluid -->
                        </div><!-- /.item -->
                        @endforeach
                    </div><!-- /.owl-carousel -->
                </div>
@else
    
@endif

  