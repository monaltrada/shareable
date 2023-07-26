@include('frontend.layout.header')


        <section>
            <div class="banner_sec">
                @if (!empty($banners))
                    @foreach ($banners as $banner)
                        @if ($banner->img_name)

                            <?php
                            $nam_arr = explode('.', $banner->img_name);
                            $ext = end($nam_arr);
                            ?>

                            @if (strtolower($ext) == 'mp4')
                                <video class="top_video" width="100%" height="100%" autoplay="true" muted="true" loop="true">
                                      <source src="{{ asset('/uploads/banner/' . $banner->img_name) }}" type="video/mp4">
                                      <source src="mov_bbb.ogg" type="video/ogg">
                                </video>
                            @else
                                <img class="top_video" width="100%" height="100%" src="{{ asset('/uploads/banner/' . $banner->img_name) }}">
                            @endif

                        @endif
                    @endforeach
                @endif
                
                <!--
                This below image is for banner! When we want to turn off the video
                then we could turn on the banner image when we want!-->
                
                <!--<img src="https://images.unsplash.com/photo-1684737992807-470ed4fe86d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1vZi10aGUtZGF5fHx8fGVufDB8fHx8fA%3D%3D&auto=format%2Ccompress&fit=crop&w=1000&h=1000" class="top_video" alt="banner">-->
            </div>
        </section>
            
        <!-- ==================== Start Services  ==================== -->

        <?php if (isset($services) && !empty($services)) { ?>
        <div class="col-lg-12 head-pt">
            <h2 class="text-center">Services</h2>
        </div>
        <section class="portfolio-fixed section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div id="sticky_item">
                            <div class="mask_outer">
                                <img src="{{ asset('/frontend/img/mask.png') }}">
                            </div>
                            <div class="left">
                                <?php foreach ($services as $sk => $service) { ?>
                                    <img id="tab-{{ $sk }}" src="{{ $service['img_url'] }}" data-background="{{ $service['img_url'] }}" class="img bg-img">
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-7 sub-bg right fixy_right">
                        <?php foreach ($services as $sk => $service) { ?>
                            <div class="fixy cont {{ ($sk==0) ? 'active' : '' }}" id="fixy{{ $sk }}" data-tab="tab-{{ $sk }}">
                                <div class="img-hiden">
                                    <img src="{{ $service['img_url'] }}" alt="{{ $service['name'] }}">
                                </div>
                                <h2 class="mb-15">{{ $service['name'] }}</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="pb-2">{{ $service['short_desc'] }}</p>
                                        <p>{{ $service['description'] }}</p>
                                        <?php if (isset($service['service_list']) && !empty($service['service_list'])) { ?>
                                            <ul class="point_ul">
                                                <?php foreach ($service['service_list'] as $sl) { ?>
                                                    <li>{{ $sl['description'] }}</li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                        <div class="mt-50">
                                            <div class="c-buttons">
                                                <a href="{{ $service['detail_url'] }}" class="o-btn">Explore More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

        <!-- ==================== End Services ==================== -->
        
        <!-- ==================== Start Portfolio ==================== -->

        <section class="portfolio clasic head-pb" data-scroll-index="3">
            <div class="container">
                <div class="sec-lg-head mb-50">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="position-re">
                                <h2 class="fz-50">Featured Projects</h2>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex align-items-center">
                            <div class="full-width d-flex justify-content-end justify-end">
                                <div class="c-buttons">
                                    <a href="{{ (isset($works) && !empty($works)) ? route('front-work') : 'javascript:void(0)' }}" class="o-btn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="item mt-30">
                            <div class="img">
                                <img src="{{ asset('/frontend/img/web-01.jpg') }}" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>Karikala</span>
                                </a>
                            </div>
                        </div>
                        <div class="item mt-30">
                            <div class="img">
                                <img src="https://res.cloudinary.com/swiggy/image/upload/f_auto,q_auto,fl_lossy/33ab4dbe93f10abea2a574ddf5d2872b" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>ZEUS Burger</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="item mt-30 item_big">
                            <div class="img">
                                <img src="https://res.cloudinary.com/swiggy/image/upload/f_auto,q_auto,fl_lossy/33ab4dbe93f10abea2a574ddf5d2872b" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>ZEUS Burger</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item mt-30">
                            <div class="img">
                                <img src="https://res.cloudinary.com/swiggy/image/upload/f_auto,q_auto,fl_lossy/33ab4dbe93f10abea2a574ddf5d2872b" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>ZEUS Burger</span>
                                </a>
                            </div>
                        </div>
                        <div class="item mt-30">
                            <div class="img">
                                <img src="{{ asset('/frontend/img/web-04.jpg') }}" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>Pneucons</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item mt-30">
                            <div class="img">
                                <img src="{{ asset('/frontend/img/web-05.jpg') }}" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>Jaani Maani Biryani</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item mt-30">
                            <div class="img">
                                <img src="https://res.cloudinary.com/swiggy/image/upload/f_auto,q_auto,fl_lossy/33ab4dbe93f10abea2a574ddf5d2872b" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>ZEUS Burger</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="item mt-30">
                            <div class="img">
                                <img src="{{ asset('/frontend/img/The_Tourist__You_don_t_have_to_tell_me__AdobeExpress.gif') }}" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>The Tourist</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="item mt-30 item_big">
                            <div class="img">
                                <img src="https://res.cloudinary.com/swiggy/image/upload/f_auto,q_auto,fl_lossy/33ab4dbe93f10abea2a574ddf5d2872b" alt="" class="radius-10">
                                <a href="#" class="tag">
                                    <span>ZEUS Burger</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item mt-30">
                                    <div class="img">
                                        <img src="{{ asset('/frontend/img/web-02.jpg') }}" alt="" class="radius-10">
                                        <a href="#" class="tag">
                                            <span>ZEUS Burger</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item mt-30">
                                    <div class="img">
                                        <img src="{{ asset('/frontend/img/web-03.jpg') }}" alt="" class="radius-10">
                                        <a href="#" class="tag">
                                            <span>Mantua</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item mt-30">
                                <div class="img">
                                    <img src="{{ asset('/frontend/img/Medimix_Final_YT_AdobeExpress (1).gif') }}" alt="" class="radius-10">
                                    <a href="#" class="tag">
                                        <span>Medimix</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Portfolio ==================== -->
        
        
        
        <!-- ==================== Start Testimonials ==================== -->

        <?php if (isset($testimonials) && !empty($testimonials)) { ?>
        <section class="testim-crv head-pb position-re">
            <div class="container ontop">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sec-head md-mb50">
                            <h6 class="sub-title wow fadeInUp">What Clients Says?</h6>
                            <h2 class="d-rotate wow">
                                <span class="rotate-text">Testimonials</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6 valign">
                        <div class="swiper-controls testim-controls arrow-out d-flex justify-content-end justify-end-sm full-width">
                            <div class="d-flex ">
                                <div class="swiper-button-prev">
                                    <span class="left">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                fill="#ffffff"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="swiper-button-next ml-50">
                                    <span class="right">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                fill="#ffffff"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-80">
                        <div class="testim-swiper testim-swiper3 to-out" data-carousel="swiper" data-items="3" data-loop="true"
                            data-space="30" data-speed="1000">
                            <div id="content-carousel-container-unq-testim" class="swiper-container"
                                data-swiper="container">
                                <div class="swiper-wrapper">

                                    <?php foreach ($testimonials as $tk => $testimonial) { ?>
                                        <div class="swiper-slide wow fadeIn">
                                            <div class="item">
                                                <div class="cont mb-40">
                                                    <div class="rate-stars mb-20 fz-12">
                                                        <span class="rate">
                                                            <?php for ($i=0; $i < $testimonial['rating']; $i++) { ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php } ?>
                                                        </span>
                                                    </div>
                                                    <p class="fw-400">{{ $testimonial['description'] }}</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="img circle-60">
                                                            <img src="{{ isset($testimonial['img_url']) ? $testimonial['img_url'] : '' }}" alt="{{ $testimonial['name'] }}" class="circle-img">
                                                        </div>
                                                    </div>
                                                    <div class="ml-30">
                                                        <div class="info">
                                                            <h6 class="fz-16">{{ ucwords($testimonial['name']) }}</h6>
                                                            <span class="opacity-7 sub-title">{{ $testimonial['company'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

        <!-- ==================== End Testimonials ==================== -->

        <!-- ==================== Start Contact ==================== -->

        <section class="contact-crev no-crev head-pb">
            @include('frontend.layout.contactform')
        </section>

        <!-- ==================== End Contact ==================== -->


@include('frontend.layout.footer')