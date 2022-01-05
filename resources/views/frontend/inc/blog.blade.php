 <section class="section latest-blog outer-bottom-vs wow fadeInUp">
     <h3 class="section-title">latest form blog</h3>
     <div class="blog-slider-container outer-top-xs">
         <div class="owl-carousel blog-slider custom-carousel">
             @foreach ($blogs as $blog)
             <div class="item">
                 <div class="blog-post">
                     <div class="blog-post-image">
                         <div class="image">
                             <a href="{{ route('blog.page') }}"><img src="{{ asset($blog->image) }}" alt="image"></a>
                         </div>
                     </div><!-- /.blog-post-image -->


                     <div class="blog-post-info text-left">
                         <h3 class="name"><a href="#">{{ $blog->title }}</a></h3>
                         <span class="info">By {{ $blog->user->name }} &nbsp;|&nbsp; {{ $blog->created_at->format('M d Y') }} </span>
                         <p class="text">{{ $blog->des }}</p>
                         <a href="{{ route('blog.page') }}" class="lnk btn btn-primary">{{ $blog->btn }}</a>
                     </div><!-- /.blog-post-info -->


                 </div><!-- /.blog-post -->
             </div><!-- /.item -->

             @endforeach


         </div><!-- /.owl-carousel -->
     </div><!-- /.blog-slider-container -->
 </section><!-- /.section -->
