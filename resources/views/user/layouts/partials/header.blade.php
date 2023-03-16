<header class="site-header">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-house-fill me-2"></i>
                    {{ auth()->user()->outlet->alamat }}
                </p>

                <p class="d-flex d-lg-block d-md-block d-none me-4 mb-0">
                    <i class="bi-clock-fill me-2"></i>
                    <strong class="me-2">Senin - Sabtu</strong> 09:00 - 16:00
                </p>

                <p class="site-header-icon-wrap text-white d-flex mb-0 ms-auto">
                    <i class="site-header-icon bi-whatsapp me-2"></i>

                    <a href="tel: 110-220-9800" class="text-white">
                        {{ auth()->user()->outlet->tlp }}
                    </a>
                </p>
            </div>

        </div>
    </div>
</header>
