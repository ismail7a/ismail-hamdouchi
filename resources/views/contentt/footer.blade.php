<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hamdouchi-ismail</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<footer id="footer">
    <a href="#home" class="back-to-top-gradient text-center text-decoration-none text-white">
        Back to top
    </a>

    <div class="footer-container container-fluid px-4 px-md-5">
        <div class="row gy-5  py-5 d-flex justify-content-between align-items-center">

            <div class="col-12 col-md-6 col-lg-6 contact-section">
                <h5 class="footer-title">Don't Miss Out</h5>
                <p class="footer-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <form action="{{ route('contact.store') }}" method="POST" class="footer-form">
                    @csrf
                    <input class="footer-input" type="email" name="email" placeholder="Your Email Address" required>
                    <input class="footer-input" type="text" name="fullname" placeholder="Your Full Name" required>
                    <textarea class="footer-input" name="message" placeholder="Your Message..." rows="3" required></textarea>
                    <button class="footer-btn" type="submit">Send</button>
                </form>

                <p class="contact-info mt-3">
                    Contact Us On: <span class="highlight">Hamdouchiismail55@gmail.com</span>
                </p>
            </div>

            <div class="col-12  col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
                <div class=" co-12 row gy-5 align-items-center justify-content-center ">
                    <div class=" text-center text-sm-start">
                        <h5 class="footer-title">Social</h5>
                        <ul class="social-list list-unstyled mt-4">
                            <li class="mt-3">
                                <a href="https://www.linkedin.com/in/ismail-hamdouchi/" target="_blank"
                                    class="social-link">
                                </a>
                                <i class="fa-linkedin fa-brands me-1 fs-3"></i>linkedin.com/in/ismail-hamdouchi

                            </li>
                            <li class="mt-3 d-flex text-center">
                                <a href="https://www.linkedin.com/in/ismail-hamdouchi/" target="_blank"
                                    class="social-link">
                                </a>
                                <i class="fa-brands me-1 fs-3 fa-whatsapp"></i> Whatssap
                            </li>

                            <li class="mt-3">
                                <a href="https://www.facebook.com/ismail7i/" target="_blank"
                                    class="social-link">

                                </a>
                                <i class="fa-facebook fa-brands me-1 fs-3"></i>facebook.com/ismail7i/
                            </li>
                            <li class="mt-3">
                                <a href="https://x.com/ismail_ismail7a" target="_blank"
                                    class="social-link">

                                </a>
                                <i class="fa-x fa-brands fs-3"></i> x.com/ismail_ismail7a
                            </li>

                        </ul>
                    </div>

                    <div class="col-12 col-sm-12 text-center text-sm-start">
                        <h5 class="footer-title">Adresse</h5>
                        <p class="address-text mt-4">
                            Street 7, Hay Abedallah<br>
                            208217 Driouch
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar text-center py-4">
        <div class="bgf">&copy; 2025 bricoslo. All Rights Reserved.</div>
    </div>
</footer>

<style>
    /* --- Base Footer Styles --- */
    footer {
        background-color: #000;
        color: #fff;
        width: 100%;
    }

    .back-to-top-gradient {
        background-image:
            linear-gradient(to right, transparent, rgba(0, 255, 255, 0.4), transparent),
            linear-gradient(to right, transparent, rgba(0, 255, 255, 0.4), transparent);
        background-size: 100% 1px, 100% 1px;
        background-position: top, bottom;
        background-repeat: no-repeat;
        padding: 15px 0;
        display: block;
        transition: 0.3s;
        font-size: 0.9rem;
    }

    .back-to-top-gradient:hover {
        color: aqua !important;
        background-image:
            linear-gradient(to right, transparent, rgba(0, 255, 255, 0.8), transparent),
            linear-gradient(to right, transparent, rgba(0, 255, 255, 0.8), transparent);
    }

    .footer-title {
        color: aqua;
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .footer-desc {
        font-size: 0.95rem;
        color: #ccc;
    }

    /* --- Form Styles --- */
    .footer-input {
        width: 100%;
        background: transparent;
        border: 1px solid #444;
        border-radius: 8px;
        padding: 12px;
        color: white;
        margin-bottom: 10px;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .footer-input:focus {
        outline: none;
        border-color: aqua;
        box-shadow: 0 0 5px rgba(0, 255, 255, 0.3);
    }

    .footer-btn {
        width: 100%;
        padding: 12px;
        background: transparent;
        border: 1px solid aqua;
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .footer-btn:hover {
        background: aqua;
        color: black;
    }

    /* --- Social & Address --- */
    .social-link {
        text-decoration: none;
        color: #ddd;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .social-link:hover {
        color: aqua;
    }

    .address-text {
        color: #ddd;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .highlight {
        color: aqua;
        cursor: pointer;
    }

    .copyright-bar {
        border-top: 1px solid #222;
        font-size: 0.9rem;
        color: #777;
    }

    /* --- Responsive Fixes --- */
    @media (max-width: 768px) {
        .footer-title {
            font-size: 1.25rem;
            /* حجم مناسب للموبايل */
            text-align: center;
        }

        .footer-desc,
        .contact-info,
        .address-text {
            text-align: center;
        }

        .footer-input,
        .footer-btn {
            padding: 15px;
            /* تسهيل الضغط في التليفون */
        }

        .social-list {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }
</style>
