@include('frontend.layout.header')


<!-- ==================== Start Slider ==================== -->

<header class="page-header blog-header section-padding pb-0">
    <div class="container mt-80">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="caption">
                    <h1 class="fz-45 mt-30">{{ $service->name }}</h1>
                </div>
                <div class="info d-flex mt-40 align-items-center">
                    <div class="left-info">
                        <div class="d-flex">
                            <div class="author-info">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)">
                                        <span class="opacity-7">{{ $data['title'] }}</span>
                                        <h6 class="fz-16">
                                            {{ $data['tags'] }}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/service-detail/' . $data['wide_img_1']) }}"></div>
</header>

<!-- ==================== End Slider ==================== -->


<section class="pg-about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="sec-head mt-80">
                    <h6 class="sub-title">About</h6>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="cont mt-80">
                    <div class="fz-18">{{ $data['desc_1'] }}</div>
                    <div class="mt-20">
                        <div class="c-buttons">
                            <a href="{{ route('front-contact') }}" class="o-btn">Let's work together</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="page-header">
    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/service-detail/' . $data['wide_img_1']) }}"></div>
</div>


<section class="pg-about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="sec-head mt-80">
                    <h6 class="sub-title">Customized for your needs</h6>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="cont mt-80">
                    <div class="fz-18">{{ $data['desc_2'] }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($works) && isset($works)) { ?>
<section class="portfolio clasic head-pb" data-scroll-index="3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Our work</h2>
            </div>

            <?php foreach ($works as $work) { ?>
            <div class="col-lg-3">
                <div class="item mt-30">
                    <div class="img">
                        <a href="{{ route('front-work-detail', $work['slug']) }}">
                            <img src="{{ asset('uploads/portfolio/'. $work['img_name']) }}" alt="{{ $work['title'] }}" class="radius-10">
                        </a>
                        <a href="{{ route('front-work-detail', $work['slug']) }}" class="tag">
                            <span>{{ $work['title'] }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</section>
<?php } ?>


<!-- ==================== Start Contact ==================== -->

<section class="contact-crev no-crev head-pb">
    @include('frontend.layout.contactform')
</section>

<!-- ==================== End Contact ==================== -->


@include('frontend.layout.footer')
