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

    <title>Mohamed El Gourari</title>
 <style>
        * {
            margin: 0;
            padding: 0;
        }

        p {
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 28px
        }

        h1 {
            color: white;
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

        table {
            border-collapse: collapse;
            border: none
        }

        .hei {
            height: 100%;
            border: rgb(251, 254, 255) solid;
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
        }

        a:hover {
            color: aqua;
            transition: .5s;
        }

        nav a {
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            transition: .5s;
        }

        nav a span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            border-bottom: 3px solid aqua;
            border-radius: 10px;
            transform: scale(0) translateY(50px);
            opacity: 0;
            transition: .5s;
        }

        nav a:hover span {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .wht {
            color: white;
            font-size: 26px
        }

        .is {
            box-shadow: 5px 6px 7px #4E4F56;
            transform: scale(1.0);
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .is:hover {
            box-shadow: 5px 0 5px 4px #4E4F56;
            transform: scale(1.0);
            transition: 0.7s
        }

        .lg {
            box-shadow: 1px 1px 5px 1px grey;
            transform: scale(1.0);
        }

        .down {
            box-shadow: 30px -40px 40px -40px rgb(6, 198, 198);
            transform: scale(1.0);
            border-top: 90px
        }

        /* Slide Animation */
        .slide-left {
            position: relative;
            display: inline-block;
            overflow: hidden;
            animation: moveRightToLeft 3s ease-in-out forwards;
        }

        @keyframes moveRightToLeft {
            0% {
                transform: translateX(50%);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Swiper Custom */
        .swiper,
        .swiper-wrapper,
        .swiper-slide {
            height: 100%;
        }

        .swiper-slide {
            background: #000 !important;
        }

        .swiper-pagination-bullet {
            background: rgb(250, 250, 250) !important;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: rgb(249, 251, 251) !important;
            z-index: 2000;
        }

        /* Skills Buttons */
        .br {
            background-color: rgb(48, 47, 52);
            color: white;
            border: 2px solid white
        }

        .br:hover {
            box-shadow: 1px 1px 4px 2px rgb(29, 85, 85);
            transform: scale(1.05);
        }

        .j {
            background-color: transparent;
        }
    </style>
<div>    @include('menu')
</div>
@foreach ($projects as $project)
        <div id="project" style="background-color:black;margin-top:120px"
            class="tp col-12 d-flex flex-column justify-content-evenly py-5">
            {{-- <h3>projects</h3> --}}
            <div class="bg- col-12 d-flex flex-column align-items-center justify-content-evenly">
                {{-- <div class="col-6 text-center mb-4">
                        <h1 style="font-size:30px; font-weight:700; color:white;">
                            {{ $project->name }}
                        </h1>
                    </div> --}}

                <!-- Swiper Slider -->
                <div class="bg- col-6 row justify-content-evenly w-100">
                    <div class="col-7">
                        <div style="height: 580px; background: #111; border-radius: 15px; overflow: hidden;"
                            class="swiper container-{{ $project->id }} is">
                            <div class="swiper-wrapper">
                                @foreach ($project->images as $img)
                                    <div class="swiper-slide d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid"
                                            style="max-height: 100%; object-fit: contain;" alt="Project Image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next next-{{ $project->id }}"></div>
                            <div class="swiper-button-prev prev-{{ $project->id }}"></div>
                            <div class="swiper-pagination paging-{{ $project->id }}"></div>
                        </div>
                    </div>
                    <div style="" class="col-5 bg- d-flex flex-column align-items-center ">
                        <h1 style="font-size:5.5rem; font-weight:700; color:aqua;">
                            {{ $project->name }}
                        </h1>
                        <div class=" d-flex align-items-center justify-content-center mt-4">
                            <div class="col-12">
                                <p style="color: white; font-family: Arial; font-size: 1rem;">
                                    {{ $project->description }}
                                </p> 
                            </div>
                        </div>
                        <div class="bg- col-12 d-flex flex-row align-items-center justify-content-center">
                            @foreach ($project->images->take(4) as $img)
                                <div class="col-3 d-flex align-items-center justify-content-around">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" class="col-11"
                                        style="height:120px; object-fit: cover; border: 1px solid #333;" alt="Thumbnail"
                                        class="col-12 rounded" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- Small Thumbnails -->


            </div>

            <!-- Project Details -->


            <div style="background-color:black" class="col-12 align-items-center d-flex justify-content-center py-4">
                <hr class="col-3" style="color: antiquewhite;">
            </div>

        </div>
    @endforeach

    </div>
        @include('contentt.footer')


    <!-- Footer -->

    <!-- Scripts -->
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swipers -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($projects as $project)
                new Swiper(".container-{{ $project->id }}", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    navigation: {
                        nextEl: ".next-{{ $project->id }}",
                        prevEl: ".prev-{{ $project->id }}",
                    },
                    pagination: {
                        el: ".paging-{{ $project->id }}",
                        clickable: true,
                    },
                });
            @endforeach
        });
    </script>
