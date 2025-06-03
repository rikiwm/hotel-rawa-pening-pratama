@extends('layout.app')


@section('content')
    <section class="wrapper bg-soft-blue mb-2 angled upper-end lower-start">
        <div class="swiper-container swiper-thumbs-container swiper-fullscreen nav-dark" data-margin="0" data-autoplay="true"
            data-autoplaytime="7000" data-nav="true" data-dots="false" data-items="1" data-thumbs="true">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($slider as $item)
                        @php
                            $mediaItem = $item->getFirstMedia('sliders');
                        @endphp
                        @if ($mediaItem)
                            <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" loading="lazy"
                                data-image-src="{{ $mediaItem->getUrl() }}"></div>
                        @else
                            <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image"
                                data-image-src="assets/img/photos/blurry.png"></div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="swiper swiper-thumbs">
                <div class="swiper-wrapper">
                    @forelse ($slider as $item)
                        @php
                            $mediaItem = $item->getFirstMedia('sliders');
                        @endphp
                        @if ($mediaItem)
                            <div class="swiper-slide">
                                <div class="swiper-slide">
                                    <div class="images-slider">
                                        <img class="" src="{{ $mediaItem->getUrl() }}" alt=""
                                            loading="lazy" />
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="swiper-slide">
                                <img src="assets/img/photos/blurry.png" srcset="assets/img/photos/blurry.png 2x"
                                    alt="" />
                            </div>
                        @endif
                    @empty
                        <div class="swiper-slide"><img src="assets/img/photos/blurry.png"
                                srcset="assets/img/photos/blurry.png 2x" alt="" /></div>
                    @endforelse
                </div>

            </div>

            <div class="swiper-static">
                <div class="container h-100 d-flex align-items-center justify-content-left">
                    <div class="row">
                        <div class="col-lg-10 mt-n10 text-left">
                            <h1
                                class="fs-19 text-uppercase ls-xl text-white mb-3 animate__animated animate__zoomIn animate__delay-1s">
                                Welcome to</h1>
                            <h4 class="display-5 fs-40 text-white mb-0 animate__animated animate__zoomIn animate__delay-1s">
                                Rawa Pening Pratama Hotel</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>


    {{-- WELCOME --}}
    <section class="wrapper bg-light">
        <div class="container py-10 py-md-12">
            <div class="row">
                <div class="col-lg-12 col-xl-10 col-xxl-7 mx-auto text-center">
                    <!-- <i class="icn-flower text-leaf fs-30 opacity-25"></i> -->
                    <h3 class="text-center text-blue-dark mb-10"> {{ __('msg.welcome_caption') }}</h3>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="row grid-view gx-6 gx-md-8 gx-xl-10 gy-8 gy-lg-0 text-center">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mx-auto">
                    <div class="card shadow-lg bg-red-dark">
                        <figure class="card-img-top overlay overlay-1">
                            <a href="demo23.html#"><img class="img-fluid" src="assets/img/welcome/A-Place-to-Relax.jpg"
                                    srcset="assets/img/welcome/A-Place-to-Relax.jpg 2x" alt="" /></a>
                            <figcaption>
                                <h5 class="from-top mb-0 ">A Place to Relax</h5>
                            </figcaption>
                        </figure>
                        <div class="card-body p-2 bg-blue-dark opacity-90">
                            <h3 class="fs-16 mb-0 text-white"><i>A Place to Relax</i> </h3>
                        </div>
                        <!--/.card-body -->
                        <p class="fs-1"></p>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mx-auto">
                    <div class="card shadow-lg bg-red-dark">
                        <figure class="card-img-top overlay overlay-1">
                            <a href="demo23.html#"><img class="img-fluid" src="assets/img/welcome/Tranquil-Garden.jpg"
                                    srcset="assets/img/welcome/Tranquil-Garden.jpg 2x" alt="" /></a>
                            <figcaption>
                                <h5 class="from-top mb-0 ">Tranquil Garden</h5>
                            </figcaption>
                        </figure>
                        <div class="card-body p-2 bg-blue-dark">
                            <h3 class="fs-16 mb-0 text-white"><i>Tranquil Garden</i> </h3>
                        </div>
                        <!--/.card-body -->
                        <p class="fs-1"></p>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mx-auto">
                    <div class="card shadow-lg bg-red-dark">
                        <figure class="card-img-top overlay overlay-1">
                            <a href="demo23.html#"><img class="img-fluid"
                                    src="{{ asset('assets/img/welcome/Cozy-Accomodation.jpg') }}"
                                    srcset="{{ asset('assets/img/welcome/Cozy-Accomodation.jpg') }} 2x"
                                    alt="" /></a>
                            <figcaption>
                                <h5 class="from-top mb-0 ">Cozy Accomodation</h5>
                            </figcaption>
                        </figure>
                        <div class="card-body p-2 bg-blue-dark">
                            <h3 class="fs-16 mb-0 text-white"><i>Cozy Accomodation</i> </h3>
                        </div>
                        <!--/.card-body -->
                        <p class="fs-1"></p>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mx-auto">
                    <div class="card shadow-lg bg-red-dark">
                        <figure class="card-img-top overlay overlay-1">
                            <a href="demo23.html#"><img class="img-fluid" src="assets/img/welcome/Restaurant.jpg"
                                    srcset="assets/img/welcome/Restaurant.jpg 2x" alt="" /></a>
                            <figcaption>
                                <h5 class="from-top mb-0 ">Restaurant</h5>
                            </figcaption>
                        </figure>
                        <div class="card-body p-2 bg-blue-dark">
                            <h3 class="fs-16 mb-0 text-white"><i>Restaurant</i> </h3>
                        </div>
                        <!--/.card-body -->
                        <p class="fs-1"></p>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>

    {{-- TESTIMONI --}}
    <section id="snippet-5" class="wrapper bg-light wrapper-border">
        <div class="container pt-2 pt-md-6 pb-6 pb-md-8">
            <h2 class="display-4 mb-3 text-center text-blue-dark" style="text-shadow: 2px 2px 5px rgb(72, 76, 108);">
                Testimonial</h2>
            <p class="lead text-center text-blue-dark mb-6 px-md-16 px-lg-0">Tesstimoni dari pelanggan kami</p>
            <div class="position-relative">
                {{-- <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem;"></div> --}}
                <div class="swiper-container dots-closer mb-1" data-margin="0" data-dots="true" data-items-xl="3"
                    data-items-md="2" data-items-xs="1">
                    <div class="swiper">
                        <div class="swiper-wrapper">

                            @forelse ($testi as $testimon)
                                <div class="swiper-slide">
                                    <div class="item-inner">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="blockquote-details">
                                                    @php
                                                        $test = $testimon->getFirstMedia('testimonis');
                                                    @endphp
                                                    @if ($test)
                                                        <img class="rounded-circle w-12" src="{{ $test->getUrl() }}"
                                                            srcset="{{ $test->getUrl() }} 2x" alt="" />
                                                    @else
                                                        <img class="rounded-circle w-12"
                                                            src="../../assets/img/avatars/te1.jpg"
                                                            srcset="../../assets/img/avatars/te1@2x.jpg 2x"
                                                            alt="" />
                                                    @endif

                                                    <div class="info">
                                                        <h5 class="mt-4">{{ $testimon->name }}</h5>
                                                        <p class="mb-6">Jakarta</p>
                                                    </div>
                                                </div>
                                                <blockquote class="icon mt-2">
                                                    <p class="text-blue">{{ $testimon->testi_value }}</p>

                                                </blockquote>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer bg-blue-dark"></div>

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.item-inner -->
                                </div>

                            @empty
                                <div class="swiper-slide">
                                    <div class="item-inner">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="blockquote-details">
                                                    <img class="rounded-circle w-12"
                                                        src="../../assets/img/avatars/te1.jpg"
                                                        srcset="../../assets/img/avatars/te1@2x.jpg 2x" alt="" />
                                                    <div class="info">
                                                        <h5 class="mt-4">Coriss Ambady</h5>
                                                        <p class="mb-6">Jakarta</p>
                                                    </div>
                                                </div>
                                                <blockquote class="icon mt-2">
                                                    <p class="text-blue">“Lorem ipsum dolor sit amet consectetur
                                                        adipisicing
                                                        quaerat minus, nulla aut repellendus consequuntur natus beatae,
                                                        mollitia laboriosam tenetur impedit odit hic quidem similique
                                                        quam error dolores quia voluptas. ”</p>

                                                </blockquote>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer bg-blue-dark"></div>

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.item-inner -->
                                </div>
                            @endforelse



                            <!--/.swiper-slide -->
                        </div>
                        <!--/.swiper-wrapper -->
                    </div>
                    <!-- /.swiper -->
                </div>
                <!-- /.swiper-container -->
            </div>
            <!-- /.position-relative -->
        </div>
        <!-- /.container -->
    </section>


    {{-- ROOMS-AND-VILLAS --}}
    <section class="wrapper image-wrapper bg-cover bg-image bg-overlay-300 text-white"
        data-image-src="./assets/img/welcome/bg-plants.jpg">
        <div class="container-fluid py-14 py-md-12">
            <h1 class="display-1 lead text-uppercase mb-3 text-center bg-blue-dark text-white" style="margin-top: -70px;">
                {{ __('msg.vila_head') }}</h1>

            <div class="row">
                <div class=" col-lg-12 col-xl-10 col-xxl-7 mx-auto text-center">
                    <p class="lead text-center mb-6 px-md-16 px-lg-0 text-blue-dark">{{ __('msg.vila_title') }}</p>

                    <!-- <h5 class="text-center mb-2"> </h5> -->
                </div>
                <h2 class="display-4 mb-3 text-center text-blue-dark" style="text-shadow: 2px 2px 5px rgb(72, 76, 108);">
                    {{ __('msg.vila_title') }}</h2>

                <!--/column -->
            </div>
            <!--/.row -->
            <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0 text-center ms-lg-8 me-lg-8">

                @forelse ($room_and_villa as $rv)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mx-auto">
                        <div class="card shadow-lg">
                            @php
                                $img = $rv->getFirstMedia('rooms');
                            @endphp
                            @if ($img)
                                <figure class="card-img-top overlay overlay-3 hover-scale">
                                    <a href="{{ url('rooms', $rv->slug) }}" class="">
                                        <img class="img-fluid w-100 h-img" src="{{ $img->getUrl() }}"
                                            srcset="{{ $img->getUrl() }} 2x" alt="" /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-2">{{ $rv->name_room }}</h5>
                                        <p class="fs-12 from-bottom text-blue"> {{ $rv->typeRoom->name }}</p>
                                    </figcaption>
                                </figure>
                            @else
                                <figure class="card-img-top overlay overlay-3">
                                    <a href="{{ route('rooms.show', $rv->id) }}"><img class="img-fluid"
                                            src="assets/img/rooms/Bromo.jpg" srcset="assets/img/rooms/Bromo.png 2x"
                                            alt="" /></a>

                                </figure>
                            @endif

                            <div class="card-body p-1 bg-blue-dark">
                                <h3 class="fs-21 mb-0 text-white">{{ $rv->name_room }}</h3>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-sm-8 col-md-6 col-lg-3 mx-auto">
                        <div class="card shadow-lg">
                            <figure class="card-img-top overlay overlay-1">
                                <a href="#"><img class="img-fluid" src="{{ asset('assets/img/rooms/Bromo.jpg') }}"
                                        srcset="assets/img/rooms/Bromo.png 2x" alt="" /></a>
                                </figcaption>
                            </figure>
                            <div class="card-body p-1 bg-blue">
                                <h3 class="fs-21 mb-0 text-white">No Data</h3>
                            </div>
                        </div>
                    </div>
                @endforelse


                <div class="col-lg-12 col-xl-12 col-xxl-12 mx-auto text-center">
                    <a href="{{ route('rooms.index') }}" class="btn btn-sm btn-outline-blue rounded-pill mt-8">View
                        All</a>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- end room -->

    <!-- facilitas -->
    <section class="wrapper image-wrapper bg-image bg-overlay-light-600 text-white" id="facilitis-hrpp"
        data-image-src="./assets/img/welcome/bg-facilities.jpg">
        <div class="container-fluid py-4 py-md-8 text-center">
            <div class="row">
                <div class="col-xl-10 col-xxl-8 mx-auto text-center mb-4">
                    <h2 class="display-4 text-blue-dark mt-1 mb-2" style="text-shadow: 2px 2px 5px rgb(72, 76, 108);">
                        {{ __('msg.fasilitas') }}</h2>
                </div>
                <!--/column -->
            </div>

            <div class="row row-cols-2 row-cols-md-4 row-cols-xl-8 gx-lg-6 gy-6 mb-4 justify-content-center">
                @forelse ($fasilitas as $fs)
                    @php
                        // $img = $fs->getFirstMedia('fasilitasis')->manualCrop(200, 200);
                        $img = $fs->getFirstMedia('fasilitasis');
                    @endphp
                    @if ($img)
                        <div class="col">
                            <div class="card shadow-lg">
                                <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                                    <img src="{{ $img->getUrl() }}" alt="" />
                                </figure>
                                <div class="card-body p-1 mb-0 bg-blue-dark">
                                    <h5 class="fs-12 text-white mt-0 mb-0">{{ $fs->name_fasilitas }}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col">
                        <div class="card shadow-lg">
                            <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                                <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                            </figure>
                            <div class="card-body p-1 mb-0 bg-blue-dark">
                                <h5 class="fs-12 text-white mt-0 mb-0">No Data</h5>
                            </div>
                        </div>
                    </div>
                @endforelse

                {{-- <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <figure class="px-md-3 px-xl-0 px-xxl-1 mb-1 p-1">
                            <img src="assets/img/fasilitas/Animal-Friendly.jpg" alt="" />
                        </figure>
                        <div class="card-body p-1 mb-0 bg-blue-dark">
                            <h5 class="fs-12 text-white mt-0 mb-0">Animal Friendly</h5>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- end facilitas -->

    <!-- strategi location -->
    <section id="snippet-5" class="wrapper bg-light wrapper-border">
        <div class="container pt-2 pt-md-6 pb-4 pb-md-8">
            <h3 class="text-center text-blue-dark mb-4 px-md-16 px-lg-4"> {{ __('msg.strategi_caption') }}</h3>
            <h2 class="display-4 mb-3 text-center text-blue-dark" style="text-shadow: 2px 2px 5px rgb(72, 76, 108);">
                {{ __('msg.strategi_title') }}</h2>
            <div class="position-relative">
                <!-- <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem;"></div> -->
                <div class="swiper-container dots-closer mb-5" data-margin="0" data-dots="true" data-items-xl="4"
                    data-items-md="2" data-items-xs="1">
                    <div class="swiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="{{ asset('assets/img/location/Celosia.jpg') }}" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/location/Celosia.jpg') }}"
                                                    srcset="{{ asset('assets/img/location/Celosia.jpg') }} 2x"
                                                    alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="{{ asset('assets/img/location/Celosia.jpg') }}" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/location/Celosia.jpg') }}"
                                                    srcset="{{ asset('assets/img/location/Celosia@2x.jpg') }} 2x"
                                                    alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Cimory.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Cimory.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Semilir.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Semilir.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Gedong-Songo.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Gedong-Songo.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Goa-Maria-Kerep.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Goa-Maria-Kerep.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Museum-Kereta-Api.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Museum-Kereta-Api.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Perantunan.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Perantunan.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <div class="card shadow-lg">
                                        <figure class="card-img-top hover-scale cursor-dark">
                                            <a href="assets/img/location/Rawa-Pening.jpg" data-glightbox=""
                                                data-gallery="post">
                                                <img class="img-fluid" src="assets/img/location/Rawa-Pening.jpg"
                                                    srcset="assets/img/location/Celosia@2x.jpg 2x" alt="" /></a>
                                            {{-- <figcaption>
                                                <h5 class="from-top mb-0">View Gallery</h5>
                                            </figcaption> --}}
                                        </figure>
                                        {{-- <div class="card-body bg-blue-dark bg-opacity-10 p-2 text-center">
                                            <h5 class="fs-21 mb-0"> <i> A Place To Relax</i></h5>
                                        </div> --}}
                                        <div class="card-footer p-1 bg-red-dark"></div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
