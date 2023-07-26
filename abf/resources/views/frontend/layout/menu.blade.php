<body class="sub-bg demo-6 loading">


    <!-- ==================== Start Loading ==================== -->

    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>A</span>
                <span>B</span>
                <span>F</span>
                <span>&nbsp;</span>
                <span>S</span>
                <span>T</span>
                <span>U</span>
                <span>D</span>
                <span>I</span>
                <span>O</span>
                <span>S</span>
            </div>
        </div>
    </div>

    <!-- ==================== End Loading ==================== -->


    <div class="cursor"></div>


    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->



    <!-- ==================== Start Navgition ==================== -->

    <div id="navi" class="topnav">
        <div class="container">
            <div class="logo icon-img-60">
                <a href="{{ route('front-home') }}"><img src="{{ asset('/frontend/img/logo.png') }}" alt=""></a>
            </div>
            <div class="menu-icon cursor-pointer">
                <span class="icon">
                    <i></i>
                    <i></i>
                </span>
                <span class="text"><span class="word">Menu</span></span>
            </div>
        </div>
    </div>

    <div class="hamenu">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="menu-text">
                        <div class="text">
                            <h2>Menu</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="menu-links">
                        <ul class="main-menu rest">
                            <li>
                                <div class="o-hidden">
                                    <a href="{{ route('front-company') }}" class="link"><span class="fill-text" data-text="Company">Company</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="o-hidden">
                                    <a href="{{ route('front-work') }}" class="link"><span class="fill-text" data-text="Work">Work</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="o-hidden">
                                    <div class="link cursor-pointer dmenu"><span class="fill-text" data-text="Services">Services</span> <i></i>
                                    </div>
                                </div>
                                <?php $services = App\Models\Service::all(); ?>

                                <?php if(!empty($services) && isset($services)) { ?>
                                <div class="sub-menu">
                                    <ul>
                                        <?php foreach ($services as $service) { ?>
                                            <?php $detailsss = App\Models\ServiceDetail::where('service_id', $service->id)->first(); ?>
                                            <?php if ($detailsss) { ?>
                                                <li>
                                                    <a href="{{ route('front-service-detail', $service->slug) }}" class="sub-link">{{ $service->name }}</a>
                                                </li>
                                            <?php }else{ ?>
                                                <li>
                                                    <a href="JavaScript:void(0)" class="sub-link">{{ $service->name }}</a>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </li>
                            <li>
                                <div class="o-hidden">
                                    <a href="{{ route('front-blog') }}" class="link"><span class="fill-text" data-text="Blog">Blogs</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="o-hidden">
                                    <a href="{{ route('front-career') }}" class="link"><span class="fill-text" data-text="Career">Career</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="o-hidden">
                                    <a href="{{ route('front-contact') }}" class="link"><span class="fill-text" data-text="Contact">Contact</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="cont-info full-width">
                        <div class="item">
                            <h5 class="mb-15">Get In Touch</h5>
                            <p>206, Om Sailabh Complex, opposite Sanjeevni Hospital, Vastrapur, Ahmedabad, Gujarat 380052</p>
                            <p class="underline mt-5 mb-5"><a href="tel:9099080476">+91 90990 80476</a></p>
                            <p><a href="mailto:info@abfstudios.in">info@abfstudios.in</a></p>
                        </div>
                        <ul class="rest social-text d-flex mt-50 fz-13">
                            <li class="mr-20">
                                <a href="#0" class="hover-this"><span class="hover-anim">Facebook</span></a>
                            </li>
                            <li class="mr-20">
                                <a href="#0" class="hover-this"><span class="hover-anim">Twitter</span></a>
                            </li>
                            <li class="mr-20">
                                <a href="#0" class="hover-this"><span class="hover-anim">LinkedIn</span></a>
                            </li>
                            <li>
                                <a href="#0" class="hover-this"><span class="hover-anim">Instagram</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== End Navgition ==================== -->



    <main>