@include('frontend.layout.header')


 <!-- ==================== Start Slider ==================== -->

        <header class="page-header blog-header section-padding pb-0">
            <div class="container mt-80">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="caption">
                            <h1 class="fz-45 mt-30">{{ $data['title'] }}</h1>
                        </div>
                        <div class="info d-flex mt-40 align-items-center">
                            <div class="left-info">
                                <div class="d-flex">
                                    <div class="author-info">
                                        <div class="d-flex align-items-center">
                                            <a href="#0">
                                                <span class="opacity-7">Author</span>
                                                <h6 class="fz-16">{{ $data['author'] }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="date ml-50">
                                        <a href="#0">
                                            <span class="opacity-7">Published</span>
                                            <h6 class="fz-16">{{ date('M d, Y', strtotime($data['updated_at'])) }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/blog/'. $data['img_name'] ) }}"></div>
        </header>

        <!-- ==================== End Slider ==================== -->



        <!-- ==================== Start Blog ==================== -->

        <section class="blog section-padding pb-0">
            <div class="container">
                <div class="main-post">
                    <div class="item pb-60">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="text">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            {!! $data['description'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="info-area col-lg-10 mt-20">
                                <div class="share-icon flex">
                                    <div class="valign">
                                        <span>Share :</span>
                                    </div>
                                    <div>
                                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="next-prv-post flex mt-50 mb-50">
                        <?php if (!empty($pre_post) && isset($pre_post)) { ?>
                        <div class="thumb-post bg-img" data-background="{{ asset('uploads/blog/'. $pre_post['img_name'] ) }}">
                            <a href="{{ route('front-blog-detail', $pre_post['slug']) }}">
                                <span class="fz-12 text-u ls1 mb-15"><i class="pe-7s-angle-left"></i>
                                    Prev Post</span>
                                <h6 class="fw-600 fz-16">{{ $pre_post['title'] }}</h6>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (!empty($next_post) && isset($next_post)) { ?>
                        <div class="thumb-post ml-auto text-right bg-img"
                            data-background="{{ asset('uploads/blog/'. $next_post['img_name'] ) }}">
                            <a href="{{ route('front-blog-detail', $next_post['slug']) }}">
                                <span class="fz-12 text-u ls1 mb-15">Next Post <i
                                        class="pe-7s-angle-right"></i></span>
                                <h6 class="fw-600 fz-16">{{ $next_post['title'] }}</h6>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            
        </section>

        <!-- ==================== End Blog ==================== -->
              
        
@include('frontend.layout.footer')