<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link href="https://fonts.cdnfonts.com/css/breeze-personal-use" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="icon" type="image/x-icon" href="blander.png">

    <title>ismail hamdouchi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }





        .height-section {
            height: 100vh;
        }

        .blue {
            color: aqua;
            letter-spacing: 0.5rem;
        }

        .wid {
            width: 100%;
            height: 75px;
            border-radius: 10px;
        }

        .brdr {
            border-radius: 25px
        }

        .hei {
            height: 100%;
            border: rgb(251, 254, 255) solid;
            transition: 0.3s;
        }

        .hei:hover {
            border: rgb(0, 170, 255) solid;
            color: rgb(0, 170, 255);
        }

        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
            transition: top 0.4s ease-in-out;
        }

        /* --- Updated Menu Styles --- */
        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            transition: 0.5s;
            display: inline-block;
        }

        /* Hover effect with the span line */
        .nav-links a span {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: aqua;
            border-radius: 10px;
            transform: scaleX(0);
            transition: 0.5s;
            transform-origin: right;
        }

        .nav-links a:hover span,
        .nav-links a.active span {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: aqua;
        }

        .is {
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
            border-bottom: 1px solid rgba(0, 255, 255, 0.2);
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .menu-toggle {
            font-size: 2rem;
            color: aqua;
            cursor: pointer;
            display: none;
            user-select: none;
        }

        /* =========================================
           Media Queries (The Requested Fixes)
           ========================================= */

        @media (max-width: 992px) {
            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none !important;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                background: rgba(28, 34, 44, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column;
                align-items: center;
                gap: 15px;
                padding: 30px 0;
                border-bottom: 2px solid aqua;
                z-index: 999;
            }

            .nav-links.show {
                display: flex !important;
                animation: slideDown 0.4s ease forwards;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Fix Projects Layout on Mobile */
            .row {
                flex-direction: column !important;
                text-align: center;
            }

            p {
                font-size: 20px !important;
            }

            h1 {
                font-size: 32px !important;
            }
        }

        /* Small devices fixed sizes as requested */
        @media (max-width: 768px) {
            .main-slider-frame {
                height: 300px !important;
                width: 100%;
                overflow: hidden;
            }

            .thumb-frame {
                height: 60px !important;
                width: 100%;
            }

            .thumb-img,
            .project-main-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                /* Keeps images clear */
            }
        }
    </style>
</head>

<body style="background-color: #000;">

    <div id="navbar" class="fixed-top is col-12 d-flex justify-content-between align-items-center"
        style="background-color: rgb(28,34,44); height:70px; padding:0 30px;">

        <div class="logo-area">
            <h3 style="color:#fff; margin:0; letter-spacing: 2px;">
                {{ $me->first_name }} <span style="color: aqua;">{{ $me->last_name }}</span>
            </h3>
        </div>

        <div class="menu-toggle" onclick="toggleMenu()">
            ☰
        </div>

        <ul id="nav-links" class="nav-links">
            <li><a href="#home" class="active">Home<span></span></a></li>
            <li><a href="#about">About<span></span></a></li>
            <li><a href="#skills">Skills<span></span></a></li>
            <li><a href="#project">Projects<span></span></a></li>
            <li><a href="#footer">Contact<span></span></a></li>
            <li><a href="{{ route('login') }}"
                    style="border: 1px solid aqua; border-radius: 5px; padding: 5px 15px;">Login</a></li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let prevScrollpos = window.pageYOffset;
        const navbar = document.getElementById("navbar");
        const navLinks = document.getElementById("nav-links");

        // Hide/Show Navbar on Scroll
        window.onscroll = function() {
            const currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                navbar.style.top = "0";
            } else {
                navbar.style.top = "-120px";
                navLinks.classList.remove("show");
            }
            prevScrollpos = currentScrollPos;

            // Auto Active Link on Scroll (Optional but cool)
            updateActiveLink();
        };

        function toggleMenu() {
            navLinks.classList.toggle("show");
        }

        // Handle Active State on Click
        const links = document.querySelectorAll('.nav-links a');
        links.forEach(link => {
            link.addEventListener('click', function() {
                links.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                navLinks.classList.remove('show');
            });
        });

        function updateActiveLink() {
            // Simple logic to highlight links could be added here
        }
    </script>

</body>

</html>
