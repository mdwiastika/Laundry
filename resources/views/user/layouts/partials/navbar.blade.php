<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/bubbles.png" class="logo img-fluid" alt="">

            <span class="ms-2">Clean Work</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="services.html">Our Services</a></li>

                        <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>

                        <li><a class="dropdown-item" href="page-404.html">Page 404</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <li class="nav-item ms-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link custom-btn custom-border-btn custom-btn-bg-white btn"
                            type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
