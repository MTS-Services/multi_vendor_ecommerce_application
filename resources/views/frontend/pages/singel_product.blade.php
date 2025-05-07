@extends('frontend.layouts.app', ['page_slug' => 'single_product'])

@section('title', 'Single Product')

@push('css')
    <style>
        #carousel {
            padding: 100px 0;
        }

        .carousel_section .swiper {
            width: 100%;
            height: 750px;
        }

        .carousel_section .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel_section .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel_section .mySwiper2 {
            height: 80%;
        }

        .mySwiper {
            height: 20%;
            padding: 10px 0;
        }

        .carousel_section .product_slider_thumbs .swiper-slide {
            opacity: 0.6;
        }

        .carousel_section .product_slider_thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }

        /* Zoom Effect */
        #lens {
            position: absolute;
            border: 2px solid rgba(52, 158, 226, 0.8);
            z-index: 100;
            pointer-events: none;
            display: none;
            /* No fixed width/height here — JS will handle it */
        }


        #zoomResult {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            margin-left: 20px;
            width: 300px;
            height: 300px;
            background-repeat: no-repeat;
            background-size: 200%;
            /* To ensure zooming effect */
            z-index: 99;
            background-color: #fff;
            border: 1px solid #ddd;
            /* Optional: border to see the zoom area */
        }

        .carousel_section .hover-wrapper {
            position: relative;
            /* Ensure proper positioning of zoom result and lens */
            /* transform: translate(0, 0); */
        }

        .carousel_section .hover-wrapper:hover #zoomResult {
            display: block;
        }
    </style>
@endpush

@section('content')
    <section id="carousel">
        <div class="container">
            <div class="carousel_section flex md:flex-row flex-col gap-x-4">
                <div class="slider_side flex w-1/2">
                    {{-- Thumbnails --}}
                    <div class="w-1/5 mr-4">
                        <div thumbsSlider="" class="swiper product_slider_thumbs h-full">
                            <div class="swiper-wrapper flex flex-col">
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                        <img src="https://swiperjs.com/demos/images/nature-{{ $i }}.jpg" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    {{-- Main Slider with Zoom --}}
                    <div class="w-4/5 relative hover-wrapper">
                        <div class="swiper product_slider_image">
                            <div class="swiper-wrapper">
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="swiper-slide">
                                        <img class="zoomable"
                                            src="https://swiperjs.com/demos/images/nature-{{ $i }}.jpg" />
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <!-- Zoom Result Box -->
                        <div id="zoomResult"></div>
                        <!-- Zoom Lens -->
                        <div id="lens"></div>
                    </div>
                </div>

                <div class="product_side w-1/2 mt-6 md:mt-0">
                    {{-- Product details here --}}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swipers for Thumbnails and Main Image
        const swiperThumbs = new Swiper(".product_slider_thumbs", {
            direction: 'vertical',
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        const swiperMain = new Swiper(".product_slider_image", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiperThumbs,
            },
        });
        //    zoom efact
        const zoomResult = document.getElementById("zoomResult");
        const lens = document.getElementById("lens");

        document.querySelectorAll('.zoomable').forEach(img => {
            img.addEventListener('mousemove', function(e) {
                const rect = img.getBoundingClientRect();
                const wrapperRect = img.closest('.hover-wrapper').getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const zoomFactor = 2; // 2x zoom
                const resultWidth = zoomResult.offsetWidth;
                const resultHeight = zoomResult.offsetHeight;

                // Set background of zoom result
                zoomResult.style.backgroundImage = `url('${img.src}')`;
                zoomResult.style.backgroundSize =
                    `${rect.width * zoomFactor}px ${rect.height * zoomFactor}px`;
                zoomResult.style.backgroundPosition =
                    `-${x * zoomFactor - resultWidth / 2}px -${y * zoomFactor - resultHeight / 2}px`;

                // Fixed lens size
                lens.style.display = 'block';
                lens.style.width = `100px`;
                lens.style.height = `100px`;
                lens.style.left = `${e.clientX - wrapperRect.left - 50}px`; // 100/2 = 50
                lens.style.top = `${e.clientY - wrapperRect.top - 50}px`;

                // Show zoom result
                zoomResult.style.display = 'block';
            });

            img.addEventListener('mouseenter', function() {
                zoomResult.style.display = 'block';
                lens.style.display = 'block';
            });

            img.addEventListener('mouseleave', function() {
                zoomResult.style.display = 'none';
                lens.style.display = 'none';
                zoomResult.style.backgroundImage = '';
            });
        });
    </script>
@endpush
