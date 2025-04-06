<style>
    .footer {
        background: #121212;
        color: #fff;
        padding: 40px 0;
        font-family: Arial, sans-serif;
    }

    .container-fluid {
        width: 95%;
        margin: auto;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border-bottom: 1px solid #333;
        padding-bottom: 20px;
    }

    .footer-section {
        flex: 1;
        min-width: 200px;
        margin: 10px;
    }

    .footer-title {
        position: relative;
        padding-left: 20px;
        color: white !important;
    }

    .footer-title::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 2px;
        height: 100%;
        background-color: #ff3c00;
    }


    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li {
        margin: 5px 0;
        color: #white;
        font-size: 14px;
    }

    .footer-section ul li:hover {
        color: #white;
        cursor: pointer;
    }

    .social-icons {
        display: flex;
        gap: 15px;
        font-size: 18px;
    }

    .social-icons i {
        color: #fff;
        cursor: pointer;
    }

    .social-icons i:hover {
        color: #ff3c00;
    }

    .contact p {
        font-size: 14px;
        color: #ccc;
        margin: 4px 0;
    }

    /* .quote-button {
        display: block;
        background: #4c32f4;
        color: white;
        padding: 10px;
        border: none;
        width: 100%;
        text-align: center;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
    } */

    .quote-button:hover {
        background: #3723c0;
    }

    .footer-bottom {
        text-align: left;
        padding: 25px 0;
        font-size: 16px;
        color: #ccc;
    }

    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            text-align: center;
        }

        .social-icons {
            justify-content: center;
        }

        .quote-button {
            width: auto;
            padding: 10px 20px;
        }
    }

    .quote-button {
        display: block;
        width: 100%;
        max-width: 250px;
        background-color: #5a42f5;
        color: white;
        padding: 12px;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .quote-button:hover {
        background-color: #4836c1;
    }

    @media (max-width: 768px) {
        .quote-button {
            width: 100%;
            max-width: none;
        }
    }

    footer p {
        color: white !important;
    }
</style>
<!-- Footer Start -->

<footer class="footer">
    <div class="container-fluid">
        <div class="footer-content">
            <!-- Navigation -->
            <div class="footer-section">
                <div class="footer-title">
                    <h6 style="color: white">Navigation</h6>
                    <ul>
                        <li>> Home</li>
                        <li>> Product</li>
                        <li>> About Us</li>
                        <li>> Contacts</li>
                    </ul>
                </div>
            </div>

            <!-- Our Business Line -->
            <div class="footer-section">
                <div class="footer-title">
                    <h6 style="color: white">Our Business Line</h6>
                    <ul>
                        <li>> Air Compressor</li>
                        <li>> Airless Painting</li>
                        <li>> Diesel Generator</li>
                        <li>> Drilling & Tapping Machine</li>
                        <li>> Gas Cutting Machine</li>
                        <li>> Hydraulic Punch Machine</li>
                        <li>> Lifting Equipment</li>
                        <li>> Safety Equipment</li>
                        <li>> Tools</li>
                        <li>> Welding Equipment</li>
                    </ul>
                </div>
            </div>

            <!-- Our Brands -->
            <div class="footer-section">
                <div class="footer-title">
                    <h6 style="color: white">Our Brands</h6>
                    <ul>
                        <li>> Master</li>
                        <li>> Isotech</li>
                        <li>> Hasco</li>
                        <li>> Makita</li>
                    </ul>
                </div>
            </div>

            <!-- Social Media -->
            <div class="footer-section">
                <div class="footer-title">
                    <h6 style="color: white">Social Media</h6>
                    <div class="social-icons">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin-in"></i>
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="footer-section contact">
                <div class="footer-title">
                    <h6 style="color: white">PT. Perintis Sukses Sejahtera</h6>
                    <p>Ruko Sentra Niaga Kalimas Blok B/18B</p>
                    <p>Jl. Inspeksi Kalimalang, Setiadarma</p>
                    <p>Tambun Selatan, Kabupaten Bekasi</p>
                    <p>Jawa Barat 17510 - Indonesia</p>
                    <p>+62 21 8839 4890 - +62 21 8837 0217</p><br>
                    <button class="quote-button"
                        onclick="location.href='{{ route('contact_us') }}#service-wrapper'">Request
                        Quotation</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <p style="margin-left: 4%">Copyright © 2025 PT. Perintis Sukses Sejahtera</p>
    </div>
</footer>
<!-- Footer End -->
