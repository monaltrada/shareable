        <!-- ==================== Start Footer ==================== -->

        <footer class="pt-80">
        <div class="container pb-80">
            <div class="row">
                <div class="col-lg-8">
                    <div class="colum md-mb50">
                        <div class="tit mb-20">
                            <div class="logo icon-img-60">
                                <a href="{{ route('front-home') }}"><img src="{{ asset('/frontend/img/logo.png') }}" alt=""></a>
                            </div>
                            <h2>Have an idea?</h2>
                        </div>
                        <div class="text">
                            <p>206, Om Sailabh Complex, <br>opposite Sanjeevni Hospital, <br>Vastrapur, Ahmedabad, Gujarat 380052</p>
                            <p class="pt-2">
                                <a href="mailto:info@abfstudios.in">info@abfstudios.in</a>
                            </p>
                            <p class="mb-30">
                                <a href="tel:9099080476">+91 90990 80476</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 md-mb50">
                    <ul class="rest social-text">
                        <li>
                            <a href="{{ route('front-company') }}">Company</a>
                        </li>
                        <li>
                            <a href="{{ route('front-work') }}">Work</a>
                        </li>
                        <li>
                            <a href="{{ route('front-service') }}">Service</a>
                        </li>
                        <li>
                            <a href="{{ route('front-career') }}">Career</a>
                        </li>
                        <li>
                            <a href="{{ route('front-team') }}">Team</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 md-mb50">
                    <ul class="rest social-text">
                        <li>
                            <a href="{{ route('front-privacy') }}">Privacy</a>
                        </li>
                        <li>
                            <a href="{{ route('front-terms') }}">Terms of service</a>
                        </li>
                        <li>
                            <a href="{{ route('front-contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="row align-items-center">
                    <div class="copyright text-dark col-lg-6">
                        © 2023 | ABF STUDIOS.
                    </div>
                    <div class="col-lg-6">
                        <ul class="social_media">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==================== End Footer ==================== -->

    </main>


    <!-- jQuery -->
    <script src="{{ asset('/frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/jquery-migrate-3.4.0.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('/frontend/assets/js/plugins.js') }}"></script>

    <script src="{{ asset('/frontend/assets/js/ScrollTrigger.min.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('/frontend/assets/js/scripts.js') }}"></script>

    <script src="{{ asset('/frontend/showcase/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/showcase/assets/js/anime.min.js') }}"></script>
    <script src="{{ asset('/frontend/showcase/assets/js/demo.js') }}"></script>
</body>
</html>