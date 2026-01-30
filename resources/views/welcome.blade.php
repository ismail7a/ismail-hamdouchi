<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/breeze-personal-use" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="blander.png">

    <title>Ismail Hamdouchi</title>


</head>

<body style="background-color: rgb(28,34,44);overflow-x:hidden">

    <div class="d-flex flex-column">
        <!-- Navbar -->
        @include('menu')

        <style>
            /* --- About Section Container --- */
            .about-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 80px 7%;
                position: relative;
            }

            /* Watermark: كلمة كبيرة في الخلفية كتعطي لمسة فنية */
            .about-container::before {
                content: "CREATIVE";
                position: absolute;
                font-size: 17vw;
                font-weight: 900;
                color: rgba(211, 196, 196, 0.04);
                z-index: 0;
                top: 10%;
                left: 5%;
                pointer-events: none;
            }

            .about-inner-row {
                display: flex;
                align-items: center;
                width: 100%;
                gap: 60px;
                z-index: 1;
            }

            /* --- Text Design --- */
            .about-text-column {
                flex: 1.2;
            }

            .about-headline {
                font-size: clamp(3rem, 8vw, 9rem);
                font-weight: 900;
                line-height: 0.85;
                margin-bottom: 30px;
                text-transform: uppercase;
            }

            .about-highlight {
                color: var(--aqua);
                text-shadow: 0 0 30px rgb(0, 255, 255);
            }

            .outline-text {
                display: block;
                color: transparent;
                -webkit-text-stroke: 1.5px white;
            }

            .about-para {
                color: var(--gray);
                font-size: 1.1rem;
                line-height: 1.8;
                max-width: 500px;
                border-left: 3px solid var(--aqua);
                padding-left: 20px;
            }

            /* --- Image Design --- */
            .about-image-column {
                flex: 0.8;
                position: relative;
            }

            .about-photo-frame {
                position: relative;
                width: 100%;
                max-width: 570px;
                /* transition: 0.5s ease; */
            }

            /* الإطار المربع لي ورا الصورة */
            .about-photo-frame::after {
                content: "";
                position: absolute;
                top: -20px;
                right: -20px;
                width: 100px;
                height: 200px;
                border-top: 5px solid var(--aqua);
                border-right: 5px solid var(--aqua);
                z-index: -1;
            }

            .about-profile-pic {
                width: 100%;
                height: auto;
                border-radius: 10px;
                /* filter: grayscale(100%); */
                /* transition: 0.6s cubic-bezier(0.23, 1, 0.32, 1); */
                mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
                -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
            }

            /* --- Responsive (Mobile) --- */
            @media (max-width: 992px) {
                .about-inner-row {
                    flex-direction: column;
                    text-align: center;
                    gap: 50px;
                }

                .about-image-column {
                    order: 1;
                    /* الصورة هي الأولى في الموبايل */
                }

                .about-text-column {
                    order: 2;
                }

                .about-para {
                    margin: 0 auto;
                    text-align: center;
                    border-left: none;
                    border-bottom: 1px solid var(--aqua);
                    padding: 0 0 20px 0;
                }

                .about-headline {
                    font-size: 3.5rem;
                }
            }
        </style>

        <section id="home" class="about-container">
            <div class="container-fluid">
                <div class="about-inner-row">

                    <div class="about-text-column">
                        <div class="about-content-box">
                            <h2 class="about-headline">
                                <span class="about-highlight">GRAFIC</span>
                                <span class="outline-text">DESIGNER</span>
                            </h2>
                            <div class="text-white">
                                <p class="about-para">
                                    {{ $me->about }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="about-image-column">
                        <div class="about-photo-frame">
                            @if ($me && $me->picture)
                                <img src="{{ asset('storage/' . $me->picture) }}" alt="{{ $me->name }}"
                                    class="about-profile-pic">
                            @else
                                <div class="placeholder-img"
                                    style="height:400px; border: 1px solid var(--gray); display:flex; align-items:center; justify-content:center;">
                                    <p>NO IMAGE</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- ======================================About===================== --}}

















        <section id="about" class="about-section">
    <div class="about-bg-watermark">CREATIVE</div>

    <div class="container">
        <div class="about-row">

            <div class="about-text">
                <div class="about-header-wrapper">
                    <span class="about-badge">3D Visualizer</span>
                    <h2 class="about-name">
                        {{ $me->first_name }}<br>
                        <span class="highlight"> {{ $me->last_name }}</span>
                    </h2>
                </div>

                <div class="about-desc">
                    <p class="about-para">
                        Passionate and dedicated <strong>3D designer</strong> with a strong foundation in
                        architectural visualization, hard-surface modeling, and technical drawing. With several
                        years of hands-on experience, Mohamed has worked on a wide range of projects—from
                        remodeling villas to crafting imaginative interiors.
                    </p>
                    <div class="about-cta">
                        <a href="#contact" class="btn-main">Get In Touch</a>
                    </div>
                </div>
            </div>

            <div class="about-image">
                <div class="img-frame">
                    <img class="about-img" src="hhh.webp" alt="Mohamed">
                    {{-- <img class="about-img" src="med.png" alt="Mohamed"> --}}
                    <div class="frame-line top-left"></div>
                    <div class="frame-line bottom-right"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* --- About Section Root --- */
    .about-section {
        min-height: 100vh;
        background-color: #000;
        position: relative;
        display: flex;
        align-items: center;
        padding: 100px 5%;
        overflow: hidden;
    }

    /* Watermark: كتعطي طابع هندسي للفضاء */
    .about-bg-watermark {
        position: absolute;
        top: 10%;
        right: -5%;
        font-size: 18vw;
        font-weight: 900;
        color: rgba(0, 255, 255, 0.03);
        z-index: 0;
        pointer-events: none;
        user-select: none;
    }

    .about-row {
        display: flex;
        align-items: center;
        gap: 80px;
        position: relative;
        z-index: 2;
    }

    /* --- Typography Design --- */
    .about-text { flex: 1.3; }

    .about-badge {
        color: aqua;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 0.8rem;
        border-bottom: 2px solid aqua;
        padding-bottom: 5px;
        margin-bottom: 20px;
        display: inline-block;
    }

    .about-name {
        font-size: clamp(3rem, 6vw, 5.5rem);
        font-weight: 900;
        line-height: 0.85;
        text-transform: uppercase;
        letter-spacing: -2px;
        color: #fff;
        margin-bottom: 35px;
    }

    .about-name .highlight {
        color: transparent;
        -webkit-text-stroke: 1.5px aqua;
        filter: drop-shadow(0 0 10px rgba(0, 255, 255, 0.3));
    }

    .about-para {
        font-size: 1.15rem;
        line-height: 1.9;
        color: #aaa;
        max-width: 580px;
        text-align: left;
    }

    .about-para strong { color: aqua; font-weight: 600; }

    /* Button Style */
    .btn-main {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 35px;
        border: 1px solid aqua;
        color: aqua;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        transition: 0.4s;
    }

    .btn-main:hover {
        background: aqua;
        color: #000;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
    }

    /* --- Image Architectural Frame --- */
    .about-image { flex: 0.7; }

    .img-frame {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .about-img {
        width: 100%;
        height: auto;
        border-radius: 5px;
        filter: contrast(1.1) brightness(0.9);
        mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
        -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
        z-index: 1;
    }

    /* الخطوط الهندسية لي ورا الصورة */
    .frame-line {
        position: absolute;
        width: 100px;
        height: 100px;
        border: 2px solid aqua;
        z-index: -1;
    }

    .top-left { top: -20px; left: -20px; border-right: none; border-bottom: none; }
    .bottom-right { bottom: -20px; right: -20px; border-left: none; border-top: none; }

    /* --- Responsive (Mobile) --- */
    @media (max-width: 992px) {
        .about-row { flex-direction: column-reverse; text-align: center; gap: 60px; }
        .about-para { margin: 0 auto; text-align: center; }
        .about-badge { margin: 0 auto 20px; }
    }

    @media (max-width: 768px) {
        .about-name { font-size: 3.5rem; }
        .about-bg-watermark { top: 5%; font-size: 25vw; }
        .img-frame { max-width: 300px; margin: 0 auto; }
    }
</style>
        <!-- personal skills -->
     <section id="skills" class="skills-section">
    <div class="skills-header">
        <h2 class="skills-main-title">
            TECHNICAL <br> <span class="outline-text">EXPERTISE</span>
        </h2>
        <div class="skills-subtitle">
            <span class="line"></span>
            <p>MY PROFESSIONAL TOOLKIT</p>
        </div>
    </div>

    <div class="skills-grid">
        @foreach ($skills as $skill)
            <div class="skill-card">
                <div class="card-glow"></div>

                <div class="skill-content">
                    <div class="skill-icon-box">
                        <img src="{{ asset('storage/' . $skill->picture) }}" alt="{{ $skill->name }}">
                    </div>

                    <div class="skill-info">
                        <span class="skill-type">{{ $skill->type }}</span>
                        <h3 class="skill-name">{{ $skill->name }}</h3>
                    </div>
                </div>

                <div class="skill-corner-mark"></div>
            </div>
        @endforeach
    </div>
</section>

<style>
    .skills-section {
        background-color: #050505; /* Black deep background */
        color: white;
        padding: 100px 7%;
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }

    /* --- Header Style --- */
    .skills-header {
        margin-bottom: 60px;
    }

    .skills-main-title {
        font-size: clamp(3rem, 7vw, 5.5rem);
        font-weight: 900;
        line-height: 0.85;
        text-transform: uppercase;
        letter-spacing: -2px;
        color: white;
    }

    .outline-text {
        color: transparent;
        -webkit-text-stroke: 1.5px aqua;
        filter: drop-shadow(0 0 10px rgba(0, 255, 255, 0.2));
    }

    .skills-subtitle {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 20px;
    }

    .skills-subtitle .line {
        width: 50px;
        height: 2px;
        background: aqua;
    }

    .skills-subtitle p {
        color: aqua;
        font-size: 0.9rem;
        letter-spacing: 4px;
        font-weight: bold;
        margin: 0;
    }

    /* --- Grid Layout --- */
    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }

    /* --- Skill Card Design --- */
    .skill-card {
        background: linear-gradient(145deg, #111, #080808);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 30px;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .skill-content {
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        z-index: 2;
    }

    /* Hover Effect */
    .skill-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: rgba(0, 255, 255, 0.4);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), 0 0 20px rgba(0, 255, 255, 0.1);
    }

    .skill-card:hover .card-glow {
        opacity: 1;
    }

    /* Background Subtle Glow */
    .card-glow {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: radial-gradient(circle at top right, rgba(0, 255, 255, 0.1), transparent);
        opacity: 0;
        transition: 0.5s;
    }

    .skill-icon-box {
        width: 70px;
        height: 70px;
        background: #000;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(0, 255, 255, 0.1);
        transition: 0.4s;
    }

    .skill-card:hover .skill-icon-box {
        background: #0a0a0a;
        border-color: aqua;
        transform: rotate(-5deg);
    }

    .skill-icon-box img {
        width: 45px;
        height: 45px;
        object-fit: contain;
        filter: grayscale(1) brightness(1.5);
        transition: 0.4s;
    }

    .skill-card:hover img {
        filter: grayscale(0) brightness(1);
    }

    .skill-info {
        display: flex;
        flex-direction: column;
    }

    .skill-type {
        font-size: 0.7rem;
        color: aqua;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 5px;
        opacity: 0.7;
    }

    .skill-name {
        font-size: 1.4rem;
        font-weight: 800;
        color: #fff;
        margin: 0;
        letter-spacing: 1px;
    }

    /* Corner Mark for Tech Look */
    .skill-corner-mark {
        position: absolute;
        bottom: 15px;
        right: 15px;
        width: 10px;
        height: 10px;
        border-right: 2px solid rgba(255, 255, 255, 0.1);
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        transition: 0.3s;
    }

    .skill-card:hover .skill-corner-mark {
        border-color: aqua;
    }

    /* Mobile Adjustments */
    @media (max-width: 768px) {
        .skills-section { padding: 60px 20px; }
        .skills-main-title { font-size: 3rem; }
        .skills-grid { grid-template-columns: 1fr; }
    }
</style>




    <div class="education-page">
        <div class="container-fluid">
            <main class="education-hero">
                <h1 class="main-title">EDUCATION</h1>
                <div class="education-image-container">
                    <img src="lalala.jpg" alt="Education Design">
                </div>
            </main>

            <div class="timeline-wrapper">
                <div class="timeline-line"></div>
                <div class="timeline-items">
                    @foreach ($educations as $edu)
                        <div class="timeline-item">
                            <div class="marker"></div>
                            <div class="info">
                                <span class="edu-date">
                                    {{ $edu->start_date }}
                                    @if ($edu->end_date)
                                        - {{ $edu->end_date }}
                                    @endif
                                </span>
                                <h3 class="school-name">{{ $edu->school_name }}</h3>
                                <h4 class="degree-name">{{ $edu->degree }}</h4>
                                <p class="edu-desc">{{ $edu->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .education-page {
            min-height: 100vh;
            background-color: #000;
            color: #fff;
            padding: 60px 5%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* --- Hero Section --- */
        .education-hero {
            position: relative;
            display: flex;
            align-items: center;
            height: 350px;
            margin-bottom: 80px;
        }

        .main-title {
            font-size: clamp(3rem, 8vw, 6.5rem);
            font-weight: 900;
            line-height: 0.85;
            text-transform: uppercase;
            letter-spacing: -2px;
            color: aqua;
            z-index: 3;
            margin: 0;
        }

        .education-image-container {
            position: absolute;
            right: 0;
            width: 50%;
            height: 100%;
            z-index: 1;
        }

        .education-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
            opacity: 0.7;
            /* لكي يبرز النص فوقها */
            clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%, 15% 50%);
            mask-image: linear-gradient(to left, black 70%, transparent 100%);
        }

        /* --- Timeline (Desktop) --- */
        .timeline-wrapper {
            position: relative;
            margin-top: 50px;
            padding-bottom: 50px;
        }

        .timeline-line {
            position: absolute;
            top: 8px;
            left: 0;
            right: 0;
            height: 2px;
            background: rgba(0, 255, 255, 0.3);
            /* لون خفيف من الـ Aqua */
        }

        .timeline-items {
            display: flex;
            gap: 30px;
        }

        .timeline-item {
            flex: 1;
            position: relative;
            padding-top: 30px;
        }

        .marker {
            position: absolute;
            top: 0;
            left: 0;
            width: 16px;
            height: 16px;
            background: aqua;
            border-radius: 50%;
            box-shadow: 0 0 10px aqua;
            z-index: 2;
        }

        .info .edu-date {
            color: #fff;
            font-weight: bold;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.1);
            padding: 2px 10px;
            border-radius: 4px;
        }

        .info .school-name {
            color: aqua;
            font-size: 1.2rem;
            margin: 15px 0 5px 0;
            font-weight: 700;
        }

        .info .degree-name {
            color: #eee;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .info .edu-desc {
            font-size: 0.9rem;
            color: #888;
            line-height: 1.6;
        }

        /* --- Responsive (Tablets & Phones) --- */
        @media (max-width: 992px) {
            .timeline-items {
                flex-direction: column;
                /* تحويل التايم لاين لعمودي */
                gap: 40px;
            }

            .timeline-line {
                width: 2px;
                height: 100%;
                top: 0;
                left: 7px;
                /* محاذاة الخط مع الماركر */
            }

            .timeline-item {
                padding-top: 0;
                padding-left: 40px;
                /* ترك مساحة للخط والماركر */
            }

            .education-hero {
                height: 250px;
                margin-bottom: 40px;
            }

            .education-image-container {
                width: 100%;
                opacity: 0.4;
                /* تخفيف الصورة في الخلفية */
            }

            .main-title {
                font-size: 3.5rem;
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 2.8rem;
            }
        }
    </style>
    {{-- ===================================================Certificate --}}
    <section id="certifications" class="cert-section py-5">
        <div class="container-fluid px-md-5">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h1 class="cert-main-title">Certifications</h1>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 col-xl-8">
                    <div class="swiper cert-text-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($certificates as $cert)
                                <div class="swiper-slide">
                                    <div class="cert-info-box text-center">
                                        <h2 class="cert-title-aqua">{{ $cert->title }}</h2>
                                        <div class=" mx-auto">
                                            <p class="cert-description">{{ $cert->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="cert-slider-frame">
                        <div class="swiper cert-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($certificates as $cert)
                                    <div class="swiper-slide">
                                        <div class="cert-img-container">
                                            <img src="{{ asset('storage/' . $cert->image) }}" class="cert-img-full"
                                                alt="{{ $cert->title }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next cert-next"></div>
                            <div class="swiper-button-prev cert-prev"></div>
                            <div class="swiper-pagination cert-dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        #certifications {
            background-color: #000;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 0;
            overflow-x: hidden;
        }

        .cert-main-title {
            font-size: clamp(2rem, 8vw, 5rem);
            font-weight: 900;
            color: aqua;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        /* إطار السلايدر */
        .cert-slider-frame {
            border: 2px solid aqua;
            border-radius: 20px;
            padding: 10px;
            background: #0a0a0a;
            position: relative;
            width: 100%;
            margin: 0 auto;
        }

        /* ضبط الصورة لتكون Responsive 100% */
        .cert-img-container {
            width: 100%;
            /* استعملنا aspect-ratio لضمان التجاوب في كل القياسات */
            aspect-ratio: 16 / 10;
            border-radius: 15px;
            overflow: hidden;
            background: #111;
        }

        .cert-img-full {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* نصوص الشهادة */
        .cert-text-swiper {
            width: 100%;
            overflow: hidden;
        }

        .cert-text-swiper .swiper-slide {
            opacity: 0 !important;
            visibility: hidden;
            transition: opacity 0.4s ease;
        }

        .cert-text-swiper .swiper-slide-active {
            opacity: 1 !important;
            visibility: visible;
        }

        .cert-title-aqua {
            color: aqua;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 800;
            margin-bottom: 15px;
        }

        .cert-desc-border {
            border-top: 2px solid aqua;
            /* رجعتها الفوق لتماشي التصميم المركزي */
            padding-top: 15px;
            max-width: 600px;
        }

        .cert-description {
            color: #ccc;
            font-size: clamp(0.85rem, 2vw, 1.1rem);
            /* font-style: italic; */
        }

        /* أزرار التحكم */
        .cert-next,
        .cert-prev {
            color: aqua !important;
            transform: scale(0.8);
        }

        .cert-dots .swiper-pagination-bullet {
            background: aqua !important;
        }

        /* ========== RESPONSIVE FIXES ========== */

        /* شاشات 990px وما تحت */
        @media (max-width: 991px) {
            .cert-slider-frame {
                max-width: 95%;
            }

            .cert-desc-border {
                max-width: 90%;
            }

            .cert-img-container {
                aspect-ratio: 16 / 11;
            }

            /* تحسين بسيط للطول في الشاشات المتوسطة */
        }

        /* موبايل (أقل من 576px) */
        @media (max-width: 575px) {
            .cert-img-container {
                aspect-ratio: 4 / 3;
                /* الصورة كتولي مربعة شوية باش المعلومات يبانو كبار */
            }

            .cert-main-title {
                font-size: 2.2rem;
            }

            .cert-slider-frame {
                padding: 5px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var textSwiper = new Swiper(".cert-text-swiper", {
                effect: "fade",
                allowTouchMove: false,
                autoHeight: true,
                speed: 500
            });

            var imgSwiper = new Swiper(".cert-swiper", {
                loop: true,
                speed: 600,
                autoplay: {
                    delay: 4000
                },
                simulateTouch: true,
                navigation: {
                    nextEl: ".cert-next",
                    prevEl: ".cert-prev",
                },
                pagination: {
                    el: ".cert-dots",
                    clickable: true,
                },
                on: {
                    slideChange: function() {
                        textSwiper.slideTo(this.realIndex);
                    }
                }
            });
        });
    </script>
    {{-- ==============================WORK Expirience  --}}
    <section class="exp-section">
        <div class="container-fluid">
            <div class="exp-wrapper">

                <div class="exp-content">
                    <h1 class="exp-main-title">WORK<br><span class="outline-text">EXPERIENCE</span></h1>

                    <div class="exp-grid-text">
                        @foreach ($user->experiences as $exp)
                            <div class="exp-item">
                                <div class="exp-header">
                                    <span class="exp-year">
                                        @if ($exp->end_date)
                                            {{ $exp->start_date }} — {{ $exp->end_date }}
                                        @else
                                            {{ $exp->start_date }} — Present
                                        @endif
                                    </span>
                                    <h3 class="exp-role">{{ $exp->name }}</h3>
                                    <h4 class="exp-company">{{ $exp->company }}</h4>
                                </div>
                                <p class="exp-desc">{{ $exp->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="exp-visual">
                    <div class="exp-image-wrapper">
                        <img src="med.png" alt="Interior Design" class="exp-img">
                        {{-- <img src="med.png" alt="Interior Design" class="exp-img"> --}}
                        <div class="exp-overlay"></div>
                        <div class="exp-label">
                            <span class="dot"></span>
                            {{-- Puzzle Co. Designed By M. EL Gourari --}}
                            Designer chi haja ...
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <style>
        .exp-section {
            background-color: #000;
            padding: 100px 5%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            overflow: hidden;
        }

        .exp-wrapper {
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 60px;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* --- Typography --- */
        .exp-main-title {
            font-size: clamp(4rem, 10vw, 8rem);
            line-height: 0.8;
            font-weight: 900;
            color: aqua;
            text-transform: uppercase;
            margin-bottom: 50px;
            letter-spacing: -3px;
        }

        .outline-text {
            color: transparent;
            -webkit-text-stroke: 1.5px rgba(0, 255, 255, 0.5);
        }

        .exp-grid-text {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .exp-item {
            border-top: 1px solid rgba(0, 255, 255, 0.2);
            padding-top: 20px;
            transition: 0.3s ease;
        }

        .exp-item:hover {
            border-top-color: aqua;
        }

        .exp-year {
            color: #888;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 10px;
        }

        .exp-role {
            font-size: 1.4rem;
            font-weight: 800;
            color: #fff;
            margin: 5px 0;
        }

        .exp-company {
            color: aqua;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .exp-desc {
            font-size: 0.9rem;
            color: #aaa;
            line-height: 1.7;
            text-align: justify;
        }

        /* --- Visual Side --- */
        .exp-visual {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .exp-image-wrapper {
            width: 100%;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 255, 255, 0.1);
        }

        .exp-img {
            width: 100%;
            height: 650px;
            object-fit: cover;
            /* filter: grayscale(30%) contrast(1.1); */
            /* transition: 0.5s ease; */
        }




        .exp-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 40%);
        }

        .exp-label {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 0.75rem;
            color: #fff;
            background: rgba(0, 0, 0, 0.6);
            padding: 8px 15px;
            border-radius: 50px;
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dot {
            width: 6px;
            height: 6px;
            background: aqua;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 10px aqua;
        }

        /* --- Responsive --- */
        @media (max-width: 1100px) {
            .exp-wrapper {
                grid-template-columns: 1fr;
            }

            .exp-visual {
                order: -1;
                /* الصورة تطلع الفوق في التابلت */
                justify-content: center;
            }

            .exp-img {
                height: 600px;
            }
        }

        @media (max-width: 768px) {
            .exp-main-title {
                font-size: 15vw;
            }

            .exp-grid-text {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <div id="project" class="col-12 py-5 bg-black text-center">
        <h1 class="projects-neon-header">PROJECTS</h1>
    </div>

    @foreach ($projects as $project)
        <div id="project-{{ $project->id }}" class="project-wrapper py-5">
            <div class="container-fluid px-md-5">
                <div class="row align-items-center {{ $loop->even ? 'flex-lg-row-reverse' : '' }} gy-5">

                    <div class="col-lg-7 px-4" data-aos="fade-up">
                        <div class="main-slider-frame">
                            <div class="swiper container-{{ $project->id }}">
                                <div class="swiper-wrapper">
                                    @foreach ($project->images as $img)
                                        <div class="swiper-slide">
                                            <div class="slide-inner">
                                                <img src="{{ asset('storage/' . $img->image_path) }}"
                                                    class="project-main-img" alt="Project">
                                                <div class="img-overlay"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next next-{{ $project->id }}"></div>
                                <div class="swiper-button-prev prev-{{ $project->id }}"></div>
                                <div class="swiper-pagination paging-{{ $project->id }}"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 px-4 project-text" data-aos="fade-left">
                        <div class="project-badge">Project </div>
                        <h1 class="project-title-cyan">{{ $project->name }}</h1>

                        <div class="project-desc-container mt-3">
                            <p class="project-description-text">
                                {{ $project->description }}
                            </p>
                        </div>

                        <div class="tech-stack mt-3">
                            <span class="tech-tag">Design</span>
                            <span class="tech-tag">Development</span>
                            <span class="tech-tag">Creative</span>
                        </div>
                        <div class="clk row g-2 mt-4 w-100 thumbnails-grid">
                            @foreach ($project->images as $img)
                                <div class="col-3 col-md-2">
                                    <div class="thumb-frame mb-2">
                                        <img src="{{ asset('storage/' . $img->image_path) }}" class="thumb-img"
                                            alt="Thumb">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @include('contentt.footer')

    <style>
        :root {
            --neon-cyan: #00ffff;
            --dark-bg: #000000;
            --glass-bg: rgba(255, 255, 255, 0.03);
        }

        .project-wrapper {
            background: var(--dark-bg);
            padding-bottom: 100px;
        }

        /* Header Neon */
        .projects-neon-header {
            font-size: clamp(2rem, 5vw, 3.5rem);
            color: var(--neon-cyan);
            font-weight: 900;
            letter-spacing: 5px;
            text-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            position: relative;
            display: inline-block;
            padding: 0 20px;
        }

        /* Slider Frame */
        .main-slider-frame {
            border-radius: 24px;
            background: #0a0a0a;
            padding: 10px;
            border: 1px solid rgba(0, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 255, 255, 0.15);
            position: relative;
            transition: 0.5s ease;
        }

        .main-slider-frame:hover {
            border-color: var(--neon-cyan);
            transform: translateY(-5px);
        }

        .slide-inner {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            aspect-ratio: 16/10;
        }

        .project-main-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Typography */
        .project-badge {
            color: var(--neon-cyan);
            font-family: monospace;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .project-title-cyan {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            line-height: 0.9;
            margin-bottom: 25px;
            background: linear-gradient(to right, #fff, var(--neon-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .thumb-frame {
            width: 100%;
            /* استعمل هاد النسبة باش تجي متناسقة مع الصورة الكبيرة */
            aspect-ratio: 16 / 10;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background: #111;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .thumb-img {
            width: 100%;
            height: 100%;
            /* cover كتخليها تعمر الإطار، إلا بغيتيها تبان كاملة بلا تقطيع بدلها بـ contain */
            object-fit: cover;
            opacity: 0.6;
            /* كانديرو ليها شوية الضبابة باش تبان الصورة الكبيرة هي الأهم */
            transition: 0.3s;
        }

        /* .thumb-frame:hover .thumb-img {
            opacity: 1;
            transform: scale(1.1);
            /* تأثير الزووم كيعطيها حياة */


        /* فاش تكون الصورة هي اللي معروضة دابا (اختياري) */
        .thumb-frame.active {
            border-color: aqua;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .project-description-text {
            color: #aaa;
            font-size: 1.1rem;
            border-left: 2px solid var(--neon-cyan);
            padding-left: 20px;
            margin-bottom: 30px;
        }

        /* Tech Tags */
        .tech-tag {
            font-size: 0.8rem;
            padding: 5px 15px;
            border-radius: 50px;
            background: var(--glass-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--neon-cyan);
            margin-right: 8px;
            text-transform: uppercase;
        }

        /* Thumbnails */
        .thumb-frame {
            aspect-ratio: 1/1;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            filter: grayscale(100%);
            transition: 0.4s;
        }

        .thumb-frame:hover {
            filter: grayscale(0%);
            border-color: var(--neon-cyan);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        }

        /* Swiper Custom */
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 18px !important;
            font-weight: bold;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background: rgba(0, 0, 0, 0.6);
            width: 45px !important;
            height: 45px !important;
            border-radius: 50%;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(0, 255, 255, 0.2);
        }

        /* Responsive Fixes */
        @media (max-width: 991px) {
            .project-text {
                text-align: center !important;
                align-items: center !important;
            }
            .clk{
                display: flex;
                flex-direction: row !important; /* هادي هي اللي خاسرة ليك الديكور */
        /* text-align: center; */

            }

            .project-description-text {
                border-left: none;
                border-bottom: 1px solid var(--neon-cyan);
                padding: 0 0 20px 0;
            }

            .project-wrapper {
                padding-bottom: 50px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($projects as $project)
                new Swiper(".container-{{ $project->id }}", {
                    slidesPerView: 1,
                    loop: true,
                    grabCursor: true, // هادي كاتعطي يد فاش كتحط الماوس
                    speed: 800,
                    parallax: true,
                    navigation: {
                        nextEl: ".next-{{ $project->id }}",
                        prevEl: ".prev-{{ $project->id }}",
                    },
                    pagination: {
                        el: ".paging-{{ $project->id }}",
                        clickable: true,
                        dynamicBullets: true, // النقط كايصغارو ويكبرو حسب الصورة
                    },
                });
            @endforeach
        });
    </script>
    <!-- Projects Section -->



</body>

</html>
