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

    /* .nav-pss-name {
        --title-size: 16px;
    } */

    .nav-pss-name {
        --title-size: clamp(16px, 2vw, 18px);
        max-width: 55vw;
    }

    @media (max-width: 768px) {
        .nav-pss-name {
            --title-size: clamp(14px, 2vw, 18px);
        }
    }

    .f-pss-name {
        font-size: var(--title-size);
        margin: 0 0 4px 0;
        color: #FF272B;
        line-height: normal;
    }

    .f-pss-name-label {
        font-size: calc(var(--title-size) - 4px);
        line-height: normal;
        color: #0000FF;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: ellipsis;
    }

    @media (max-width: 768px) {
        /* .navbar-brand{
            white-space: normal !important; 
        }
        .navbar-brand, 
        .nav-pss-name {
            display: flex;
            flex-direction: column;
            min-width: 0;         
        }
        
        .nav-pss-name {
            --title-size: clamp(14px, 2vw, 18px);
            max-width: 55vw;
        } */
    }

    @media (max-width: 991px) {
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
    <a style="display: flex;" href="{{ route('home') }}" class="navbar-brand me-auto ps-0">
        <img src="{{ asset('uploads/' . $global_setting->logo) }}" alt="{{ env('APP_NAME') }}" style="max-height: 55px">
        <div class="nav-pss-name" style="margin-left: 10px; align-content: center;">
            <h5 class="f-pss-name">
                PT. Perintis Sukses Sejahtera
            </h5>
            <div class="f-pss-name-label">
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
