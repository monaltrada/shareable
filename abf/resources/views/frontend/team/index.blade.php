@include('frontend.layout.header')


<!-- ==================== Start Slider ==================== -->

<header class="page-header section-padding sub-bg2">
    <div class="container mt-80">
        <div class="row">
            <div class="col-lg-7">
                <div class="caption">
                    <h1 class="fz-40">Team</h1>
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


<!-- ==================== Start team ==================== -->

<section class="team-crev section-padding sub-bg">
    <div class="container">
        <div class="row md-marg">
            <?php if (!empty($data) && isset($data)) { ?>
            <?php foreach ($data as $row) { ?>
            <div class="col-lg-3">
                <div class="swiper-slide mb-50">
                    <div class="item">
                        <div class="img">
                            <img src="{{ asset('uploads/team/' . $row->img_name) }}" alt="{{ $row->title }}">
                        </div>
                        <div class="info">
                            <div class="main-marq team-position">
                                <div class="slide-har st1 non-strok">
                                    <div class="box">
                                        <div class="item"><h4>{{ $row->pos }}</h4></div><div class="item"><h4>{{ $row->pos }}</h4></div><div class="item"><h4>{{ $row->pos }}</h4></div><div class="item"><h4>{{ $row->pos }}</h4></div>
                                    </div>
                                    <div class="box">
                                        <div class="item"><h4>{{ $row->pos }}</h4></div><div class="item"><h4>{{ $row->pos }}</h4></div><div class="item"><h4>{{ $row->pos }}</h4></div><div class="item"><h4>{{ $row->pos }}</h4></div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-marq team-name">
                                <div class="slide-har st1 non-strok">
                                    <div class="box">
                                        <div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div>
                                    </div>
                                    <div class="box">
                                        <div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div><div class="item"><h4>{{ $row->title }}</h4></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

<!-- ==================== End team ==================== -->


@include('frontend.layout.footer')