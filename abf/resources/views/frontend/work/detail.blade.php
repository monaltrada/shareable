@include('frontend.layout.header')


<!-- ==================== Start Slider ==================== -->

<header class="page-header blog-header section-padding pb-0">
    <div class="container mt-80">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="caption">
                    <h1 class="fz-45 mt-30">{{ $work->title }}</h1>
                </div>
                <div class="info d-flex mt-40 align-items-center">
                    <div class="left-info">
                        <div class="d-flex">
                            <div class="author-info">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:;">
                                        <span class="opacity-7">{{ $data->title }}</span>
                                        <h6 class="fz-16">{{ str_replace(',', ' | ', $data->tags) }}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/portfolio-detail/' . $data->img_1) }}"></div>
</header>

<!-- ==================== End Slider ==================== -->


<section class="pg-about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="sec-head mt-80">
                    <h6 class="sub-title">Overview</h6>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="cont mt-80">
                    <div class="fz-22">{{ $data->overview }}</div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="page-header">
    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/portfolio-detail/' . $data->img_2) }}"></div>
</div>


<section class="pg-about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="sec-head mt-80">
                    <h6 class="sub-title">The challenge</h6>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="cont mt-80">
                    <div class="fz-22">{{ $data->challenge }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pg-about head-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <div class="work_screen">
                    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/portfolio-detail/' . $data->img_3) }}"></div>
                </div>
                <div class="work_screen">
                    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/portfolio-detail/' . $data->img_4) }}"></div>
                </div>
            </div>
            <div class="col-lg-5 mt-40">
                <div class="work_screen">
                    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/portfolio-detail/' . $data->img_5) }}"></div>
                </div>
                <div class="work_screen">
                    <div class="background bg-img parallaxie mt-80" data-background="{{ asset('uploads/portfolio-detail/' . $data->img_6) }}"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== Start Contact ==================== -->

<section class="contact-crev no-crev head-pb">
    @include('frontend.layout.contactform')
</section>

<!-- ==================== End Contact ==================== -->



@include('frontend.layout.footer')
