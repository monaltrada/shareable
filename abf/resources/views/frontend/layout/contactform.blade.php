    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sec-head md-mb80">
                    <h6 class="sub-title wow fadeInUp">Get In Touch</h6>
                    <h2 class="fz-40 d-rotate wow">
                        <span class="rotate-text">Calling all creatives the way they prefer!</span>
                    </h2>
                    <p class="fz-15 mt-10">If you would like to work with us or just want to get in
                        touch, we’d love to hear from you!</p>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 valign">
                <div class="full-width">
                    <form id="" method="post" action="{{ route('front-contact-store') }}">

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
                                <?php $service_contact = App\Models\Service::all(); ?>
                                <div class="form-group mb-30">
                                    <select name="service_id">
                                        <?php foreach ($service_contact as $sc) { ?>
                                            <option value="{{ $sc->id }}">{{ $sc->name }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_weburl" type="url" name="web_url" placeholder="Reference website URL"
                                        required="required">
                                    <input type="hidden" name="cur_page" value="{{ Request::url() }}" required="required">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" placeholder="Message" rows="4"
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
        </div>
    </div>