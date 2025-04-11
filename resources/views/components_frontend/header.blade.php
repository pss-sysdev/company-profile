<style>
    .navbar-nav .nav-link.active {
        color: red !important;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
        color: red !important;
    }

    .navbar-brand {
        margin-left: 10px;
    }

    .navbar-brand img {
        max-height: 120px;
        transition: all 0.3s ease;
        display: block;
    }

    .navbar-toggler {
        border: none;
        outline: none;
    }

    .navbar-nav {
        text-align: center;
    }

    @media (max-width: 991px) {
        .nav-pss-name {
            display: none;
        }

        .navbar-nav {
            margin-top: 10px;
        }

        .navbar-nav .nav-link {
            padding: 10px 0;
            font-size: 18px;
        }

        .navbar-brand {
            margin-left: 10px;
        }

        .navbar-brand img {
            max-height: 60px;
        }
    }
</style>

<!-- Navbar Start -->
<nav
    class="navbar navbar-expand-lg bg-white navbar-light sticky-top d-flex justify-content-between align-items-center px-0 px-lg-5 py-lg-0">
    <a href="{{ route('home') }}" class="navbar-brand me-auto ps-0">
        <img src="{{ asset('uploads/' . $global_setting->logo) }}" alt="{{ env('APP_NAME') }}" style="max-height: 55px">
        <div class="nav-pss-name" style="margin-left: 10px; align-content: center;">
            <h5 style="margin: 0 0 4 0; color: #FF272B; line-height: normal;">
                PT. Perintis Sukses Sejahtera
            </h5>
            <div style="font-size: small; line-height: normal; color: #0000FF;">
                Distribution of Welding Equipment Tools, Steel Contractor
            </div>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-3 py-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ $type_menu == 'home' ? 'active' : '' }}">Home</a>
            <a href="{{ route('product') }}"
                class="nav-item nav-link {{ $type_menu == 'product' ? 'active' : '' }}">Product</a>
            <a href="{{ route('brand') }}"
                class="nav-item nav-link {{ $type_menu == 'brand' ? 'active' : '' }}">Brand</a>
            <a href="{{ route('contact_us') }}"
                class="nav-item nav-link {{ $type_menu == 'contact_us' ? 'active' : '' }}">Contact Us</a>
            <a href="{{ route('about_us') }}"
                class="nav-item nav-link {{ $type_menu == 'about_us' ? 'active' : '' }}">About Us</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
