@include('frontend.layout.header')


<!-- ==================== Start Slider ==================== -->

<header class="page-header section-padding sub-bg2">
    <div class="container mt-80">
        <div class="row">
            <div class="col-lg-7">
                <div class="caption">
                    <h1 class="fz-40">Contact Us</h1>
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

<!-- ==================== Start Contact ==================== -->

<section class="contact-crev no-crev section-ptb">
    @include('frontend.layout.contactform')    
</section>
<!-- ==================== End Contact ==================== -->

@include('frontend.layout.footer')