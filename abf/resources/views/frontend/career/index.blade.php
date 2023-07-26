@include('frontend.layout.header')



<!-- ==================== Start Slider ==================== -->

<header class="page-header section-padding sub-bg2">
    <div class="container mt-80">
        <div class="row">
            <div class="col-lg-7">
                <div class="caption">
                    <h1 class="fz-40">Career</h1>
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
    <div class="container">
        <div class="row">
            <div class="sec-head mb-20 full-width">
                <h2 class="fz-40 d-rotate wow">
                    <span class="rotate-text">Join Us!</span>
                </h2>
                <p class="fz-15 mt-10">Fill This Form & Make Your Career With Us!</p>
            </div>
            <div class="col-lg-6">
                <div class="full-width">
                    <form method="post" action="{{ route('front-career-store') }}" enctype="multipart/form-data">

                        
                        @if (false)
                        @if (session()->has('message'))
                        {{ session('message') }}
                        @endif
                        @endif

                        <div class="controls row">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_name" type="text" name="name" placeholder="Name"
                                        required="required">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_email" type="email" name="email" placeholder="Email"
                                        required="required">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_phone" type="text" name="phone" placeholder="Phone"
                                        required="required">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <select name="position">
                                        <option disabled selected>Select Position</option>
                                        <?php if (!empty($position) && isset($position)) { ?>
                                            <?php foreach ($position as $row) { ?>
                                                <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_weburl" type="url" name="web_url" placeholder="URL: Dribbble / Behance / Website.."
                                        required="required">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <select name="experience">
                                        <option disabled selected>Your Experience</option>
                                        <option value="Fresher">Fresher</option>
                                        <option value="6 Months">6 Months</option>
                                        <option value="1 Year">1 Year</option>
                                        <option value="2 Year">2 Year</option>
                                        <option value="3 Year">3 Year</option>
                                        <option value="4 Year">4 Year</option>
                                        <option value="5 Year">5 Year</option>
                                        <option value="6 Year">6 Year</option>
                                        <option value="7 Year">7 Year</option>
                                        <option value="8 Year">8 Year</option>
                                        <option value="9 Year">9 Year</option>
                                        <option value="10 Year">10 Year</option>
                                        <option value="10+ Year">10+ Year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_ctc" type="number" name="web_ctc" placeholder="Current CTC">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_salary" type="number" name="web_salary" placeholder="Expected Salary"
                                        required="required">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-30">
                                    <input type="file" name="file" class="file-upload-default">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" placeholder="Tell! how you re creative.." rows="4"
                                        required="required"></textarea>
                                </div>
                                <div class="mt-30">
                                    <button type="submit" class="butn butn-full butn-bord radius-30">
                                        <span class="text">Let's Talk</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 d-flex flex-column justify-content-center">
                <?php if (!empty($position) && isset($position)) { ?>
                <div>
                    <h5>POSITION OPENED</h5>
                </div>
                <div class="accordion bord mt-20">
                    <?php foreach ($position as $row) { ?>
                    <div class="item mb-15 wow fadeInUp" data-wow-delay=".1s">
                        <div class="title">
                            <h6 class="fz-18 mb-0">{{ $row['name'] }}</h6>
                            <span class="ico"></span>
                        </div>
                        <div class="accordion-info">
                            <p class="fz-14">{{ $row['experience'] }}</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                
            </div>
            <div class="col-lg-12 head-pt">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117489.9737594739!2d72.37521089726559!3d23.0398607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e85cfb70704cd%3A0xbb8258756a7b6af0!2sABF%20Studios%20(%20Ayush%20Bahukhandi%20Films%20)!5e0!3m2!1sen!2sin!4v1684089941070!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- ==================== End Contact ==================== -->

@include('frontend.layout.footer')