@include('frontend.layout.header')



<!-- ==================== Start Slider ==================== -->

<header class="page-header section-padding sub-bg2">
    <div class="container mt-80">
        <div class="row">
            <div class="col-lg-7">
                <div class="caption">
                    <h1 class="fz-40">Work</h1>
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


<!-- ==================== Start Portfolio ==================== -->

<section class="portfolio portfolio clasic section-padding pb-40">
    <div class="container-xxl">

        <div class="row">
            <!-- filter links -->
            <div class="filtering col-12 mb-20 text-center">
                <div class="filter">
                    <span data-filter='*' class='active' data-count="08">All</span>
                    <?php foreach ($category_arr as $category) { ?>
                        <span data-filter='.{{ $category["cat_slug"] }}' data-count="03">{{ $category["category"] }}</span>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="gallery">
            <div class="row">

                <?php foreach ($works as $work) { ?>
                <div class="col-lg-3 items info-overlay {{ $work['cat_slug'] }}">
                    <div class="item mt-30">
                        <div class="img">
                            <a href="{{ route('front-work-detail', $work['slug']) }}">
                                <img src="{{ asset('uploads/portfolio/' . $work['img_name']) }}" alt="{{ $work['title'] }}" class="radius-10">
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

    </div>
</section>

<!-- ==================== End Portfolio ==================== -->



@include('frontend.layout.footer')
