@include('frontend.layout.header')


<!-- ==================== Start Slider ==================== -->

<header class="page-header section-padding sub-bg2">
    <div class="container mt-80">
        <div class="row">
            <div class="col-lg-7">
                <div class="caption">
                    <h1 class="fz-40">Blogs</h1>
                </div>
            </div>
            <div class="col-lg-5 valign">
                <div class="text">
                    <p>We help our clients succeed by creating brand identities, digital experiences, and print materials that communicate clearly, achieve marketing goals, and look fantastic.</p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->


<!-- ==================== Start Blog ==================== -->

<section class="blog-modern section-padding sub-bg">
    <div class="container">
        <div class="row">
            <?php if (!empty($blogs) && isset($blogs)) { ?>
            <?php foreach ($blogs as $blog) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="item mb-50">
                        <div class="img">
                            <a href="{{ route('front-blog-detail', $blog['slug']) }}">
                                <img src="{{ asset('uploads/blog/' . $blog['img_name']) }}" alt="ABF Studio">
                            </a>
                            <div class="date">
                                <a href="{{ route('front-blog-detail', $blog['slug']) }}">{{ date('M d, Y', strtotime($blog['updated_at'])) }}</a>
                            </div>
                        </div>
                        <div class="cont mt-10">
                            <h6>
                                <a href="{{ route('front-blog-detail', $blog['slug']) }}">{{ $blog['title'] }}</a>
                            </h6>
                            <div class="c-buttons mt-10">
                                <a href="{{ route('front-blog-detail', $blog['slug']) }}" class="o-btn">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php } ?>
            
        </div>
    </div>
</section>

<!-- ==================== End Blog ==================== -->



@include('frontend.layout.footer')