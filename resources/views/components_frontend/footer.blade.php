<style>
    .footer-modern {
        background: #111111;
        color: #ffffff;
        padding: 64px 0 24px;
        font-family: Arial, sans-serif;
        border-top: 4px solid #ff4d1a;
    }

    .footer-modern .footer-wrap {
        width: min(92%, 1400px);
        margin: 0 auto;
    }

    .footer-modern .footer-top {
        display: grid;
        grid-template-columns: 1.35fr 0.9fr 1fr 1fr;
        gap: 40px;
        padding-bottom: 34px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .footer-modern .footer-brand {
        background: transparent;
        border: none;
        border-radius: 0;
        padding: 0;
        backdrop-filter: none;
    }

    .footer-modern .footer-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.58);
        margin-bottom: 12px;
    }

    .footer-modern .footer-kicker::before {
        content: "";
        width: 28px;
        height: 2px;
        background: #ff4d1a;
    }

    .footer-modern .footer-brand-title {
        font-size: 28px;
        line-height: 1.2;
        font-weight: 800;
        color: #fff;
        margin-bottom: 12px;
    }

    .footer-modern .footer-brand-text {
        color: rgba(255,255,255,0.72);
        font-size: 15px;
        line-height: 1.8;
        margin: 0 0 18px;
        max-width: 520px;
    }

    .footer-modern .footer-contact-list {
        display: grid;
        gap: 8px;
        margin-bottom: 22px;
    }

    .footer-modern .footer-contact-item {
        color: rgba(255,255,255,0.82);
        font-size: 14px;
        line-height: 1.7;
    }

    .footer-modern .footer-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-width: 220px;
        padding: 13px 20px;
        border-radius: 4px;
        text-decoration: none;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        background: #ff4d1a;
        border: 1px solid #ff4d1a;
        box-shadow: none;
        transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }

    .footer-modern .footer-cta:hover {
        color: #fff;
        background: #e64516;
        border-color: #e64516;
        transform: translateY(-1px);
    }

    .footer-modern .footer-cta i {
        font-size: 13px;
    }

    .footer-modern .footer-col-title {
        font-size: 17px;
        font-weight: 700;
        color: #fff;
        margin: 6px 0 18px;
        padding-bottom: 10px;
        position: relative;
    }

    .footer-modern .footer-col-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 36px;
        height: 2px;
        background: #ff4d1a;
    }

    .footer-modern .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 10px;
    }

    .footer-modern .footer-links li {
        margin: 0;
        padding: 0;
    }

    .footer-modern .footer-links a {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: rgba(255,255,255,0.76);
        font-size: 14px;
        line-height: 1.5;
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .footer-modern .footer-links a::before {
        content: "\f105";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 11px;
        color: #ff4d1a;
    }

    .footer-modern .footer-links a:hover {
        color: #ffffff;
        transform: translateX(3px);
    }

    .footer-modern .footer-social-wrap {
        margin-top: 24px;
    }

    .footer-modern .footer-social-label {
        font-size: 13px;
        color: rgba(255,255,255,0.58);
        margin-bottom: 12px;
    }

    .footer-modern .footer-social {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .footer-modern .footer-social a {
        width: 40px;
        height: 40px;
        border-radius: 4px;
        border: 1px solid rgba(255,255,255,0.14);
        background: transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-decoration: none;
        transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }

    .footer-modern .footer-social a:hover {
        transform: translateY(-1px);
        background: #ff4d1a;
        border-color: #ff4d1a;
        color: #fff;
    }

    .footer-modern .footer-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding-top: 22px;
    }

    .footer-modern .footer-copy {
        color: rgba(255,255,255,0.68);
        font-size: 14px;
        margin: 0;
    }

    .footer-modern .footer-mini-note {
        color: rgba(255,255,255,0.45);
        font-size: 13px;
        margin: 0;
        text-align: right;
    }

    @media (max-width: 1200px) {
        .footer-modern .footer-top {
            grid-template-columns: 1.2fr 1fr 1fr;
        }

        .footer-modern .footer-brand {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 768px) {
        .footer-modern {
            padding: 50px 0 22px;
        }

        .footer-modern .footer-top {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .footer-modern .footer-brand-title {
            font-size: 24px;
        }

        .footer-modern .footer-cta {
            width: 100%;
            min-width: unset;
        }

        .footer-modern .footer-bottom {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-modern .footer-mini-note {
            text-align: left;
        }
    }
</style>

<footer class="footer-modern">
    <div class="footer-wrap">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="footer-kicker">Industrial Solutions Partner</div>
                <h2 class="footer-brand-title">PT. Perintis Sukses Sejahtera</h2>
                <p class="footer-brand-text">
                    Trusted partner for welding equipment, industrial solutions, and reliable business support.
                </p>

                <div class="footer-contact-list">
                    <div class="footer-contact-item">Ruko Sentra Niaga Kalimas Blok B/18B</div>
                    <div class="footer-contact-item">Jl. Inspeksi Kalimalang, Setiadarma</div>
                    <div class="footer-contact-item">Tambun Selatan, Kabupaten Bekasi</div>
                    <div class="footer-contact-item">Jawa Barat 17510 - Indonesia</div>
                    <div class="footer-contact-item">+62 21 8839 4890 - +62 21 8837 0217</div>
                </div>

                @if (!request()->routeIs('contact_us'))
                    <a href="{{ route('contact_us') }}#service-wrapper" class="footer-cta">
                        Request Quotation
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @endif
            </div>

            <div class="footer-col">
                <h5 class="footer-col-title">Navigation</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product') }}">Product</a></li>
                    <li><a href="{{ route('brand') }}">Brand</a></li>
                    <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                    <li><a href="{{ route('about_us') }}">About Us</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5 class="footer-col-title">Our Business Line</h5>
                <ul class="footer-links">
                    @foreach ($categorys as $value)
                        <li>
                            <a href="{{ route('product', ['category[]' => $value->id]) }}">
                                {{ $value->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-col">
                <h5 class="footer-col-title">Our Brands</h5>
                <ul class="footer-links">
                    @foreach ($categoryOnBrand as $value)
                        @if (!empty($value->url))
                            <li>
                                <a href="{{ route('page', ['slug' => $value->url]) }}">
                                    {{ $value->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <div class="footer-social-wrap">
                    <div class="footer-social-label">Follow us</div>
                    <div class="footer-social">
                        <a href="{{ $global_setting->facebook ?? '#' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="{{ $global_setting->instagram ?? '#' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="{{ $global_setting->linkedin ?? '#' }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="{{ !empty($global_setting->whatsapp ?? '') ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $global_setting->whatsapp) : '#' }}"
                            target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copy">Copyright © 2026 PT. Perintis Sukses Sejahtera. All rights reserved.</p>
            <p class="footer-mini-note">Built for strong brands and industrial growth.</p>
        </div>
    </div>
</footer>