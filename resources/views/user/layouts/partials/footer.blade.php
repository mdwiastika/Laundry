<footer class="site-footer" id="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex align-items-center mb-4 pb-2">
                <div>
                    <img src="{{ asset('/userpage/images/logo-laundry.png') }}" class="logo img-fluid" alt="">
                </div>

                <ul class="footer-menu d-flex flex-wrap ms-5">
                    <li class="footer-menu-item"><a href="{{ route('home') }}" class="footer-menu-link">Home</a></li>

                    <li class="footer-menu-item"><a href="{{ route('paket-user') }}" class="footer-menu-link">Paket</a></li>

                    <li class="footer-menu-item"><a href="{{ route('history-user') }}" class="footer-menu-link">History</a></li>
                </ul>
            </div>

            <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                <h5 class="site-footer-title mb-3">Layanan Kami</h5>

                <ul class="footer-menu">
                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Selimut
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Celena
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Kaos
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Sweater
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Levis
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                <h5 class="site-footer-title mb-3">Office</h5>

                <p class="text-white d-flex mt-3 mb-2">
                    <i class="bi-geo-alt-fill me-2"></i>
                    {{ auth()->user()->outlet->alamat }}
                </p>

                <p class="text-white d-flex mb-2">
                    <i class="bi-telephone-fill me-2"></i>

                    <a href="tel: 110-220-9800" class="site-footer-link">
                        {{ auth()->user()->outlet->tlp }}
                    </a>
                </p>

                <p class="text-white d-flex">
                    <i class="bi-envelope-fill me-2"></i>

                    <a href="mailto:info@company.com" class="site-footer-link">
                        marceldwias@gmail.com
                    </a>
                </p>

                {{-- <ul class="social-icon mt-4">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-twitter"></span>
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-facebook"></span>
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-instagram"></span>
                        </a>
                    </li>
                </ul> --}}
            </div>

            <div class="col-lg-3 col-md-6 col-6 mt-3 mt-lg-0 mt-md-0">
                <div class="featured-block">
                    <h5 class="text-white mb-3">Jam Pelayanan</h5>

                    <strong class="d-block text-white mb-1">Senin - Sabtu</strong>
                    <p class="text-white mb-3">09:00 - 16:00</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <p class="copyright-text mb-0">Copyright © 2036 Clean Work Co., Ltd.</p>
                </div>

                <div class="col-lg-6 col-12 text-end">
                    <p class="copyright-text mb-0">
                        // Designed by <a href="https://www.tooplate.com" target="_parent">Tooplate</a> //</p>
                </div>

            </div>
        </div>
    </div>
</footer>
