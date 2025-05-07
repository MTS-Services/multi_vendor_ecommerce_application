@extends('frontend.layouts.app', ['page_slug' => 'single_product'])

@section('title', 'Single Product')
@push('css')
<style>

    #carousel {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        margin: 0;
        padding: 100px 0;
        position: relative;
    }

    .swiper {
        width: 100%;
        height: 750px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .mySwiper2 {
        height: 80%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }
</style>

@endpush

@section('content')
    {{-- Carousel section start --}}
    <section id="carousel">
        <div class="container ">
            <div class="carousel_section flex md:flex-row flex-col gap-x-4">
                <div class="slider_side flex w-1/2">
                    {{-- Thumbnails on the left --}}
                    <div class="w-1/5 mr-4">
                        <div thumbsSlider="" class="swiper product_slider_thumbs h-full">
                            <div class="swiper-wrapper flex flex-col">
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                </div>
                                <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Main image slider on the right --}}
                    <div class="w-4/5 relative">
                        <div  class="swiper product_slider_image">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>

                {{-- Product details (placeholder) --}}
                <div class="product_side w-1/2 mt-6 md:mt-0">
                    {{-- Product details here --}}
                </div>
            </div>
        </div>
    </section>
    {{-- Carousel section end --}}
@endsection

@push('js')
    <script type="module">
        import Swiper from '/frontend/js/swiper.min.js';
        // thumbs part
        const swiperThumbs = new Swiper(".product_slider_thumbs", {
            direction: 'vertical',
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        // main part
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
    </script>
@endpush
