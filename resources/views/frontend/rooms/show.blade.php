@extends('layout.app')
@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
@section('breadcumb')
    @include('layout.bredcumb')
@endsection
@section('content')
    <section class="wrapper bg-light">
        <div class="container py-7 py-md-8">
            <div class="row gx-md-8 gx-xl-12 gy-8">
                <div class="col-lg-12">

                    <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="true"
                        data-thumbs="true">
                        <div class="row">

                            <div class="col-lg-10 col-12">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        @forelse ($imageUrls as $item)
                                            <div class="swiper-slide">
                                                {{-- <img src="{{ $teams->getFirstMediaUrl() }}" alt="profile-img" loading="lazy"> --}}
                                                <figure class="rounded p-2"><img src="{{ $item }}"
                                                        srcset="{{ $item }} 2x" alt="hotel"
                                                        style="height: 600px !important; object-fit: cover;" /><a
                                                        class="item-link" href="{{ $item }}" data-glightbox
                                                        data-gallery="product-group"><i class="uil uil-focus-add"></i></a>
                                                </figure>
                                            </div>
                                        @empty
                                            <div class="swiper-slide">
                                                <figure class="rounded"><img src="{{ asset('assets/img/rooms/Bromo.jpg') }}"
                                                        srcset="assets/img/photos/shs2@2x.jpg 2x" alt="hotel"
                                                        style="height: 600px !important; object-fit: cover;" /><a
                                                        class="item-link" href="assets/img/photos/shs2@2x.jpg"
                                                        data-glightbox data-gallery="product-group"><i
                                                            class="uil uil-focus-add"></i></a>
                                                </figure>
                                            </div>
                                        @endforelse




                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <div class="swiper-thumbs swiper-vertical">
                                    <div class="swiper-wrapper">
                                        @forelse ($imageUrls as $item_thumb)
                                            <div class="swiper-slide rounded p-2"><img src="{{ $item_thumb }}"
                                                    class="" width="160" alt="thumb" />
                                            </div>
                                        @empty
                                            <div class="swiper-slide"><img src="{{ asset('assets/img/rooms/Bromo.jpg') }}"
                                                    srcset="assets/img/photos/shs1-th@2x.jpg 2x" class="rounded"
                                                    width="160" alt="thumb" />
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.swiper-container -->
                </div>

                {{-- <div class="col-lg-6 mt-0">


                </div> --}}

                <div class="col-lg-10 mt-0">
                    <div class="row">

                        <aside class="col-lg-6 col-md-4 sidebar text-start text-md-start text-sm-start">
                            <div class="post-header mb-2 ms-4">
                                <h2 class="post-title display-5"><a href="#" class="link-dark text-uppercase">
                                        <i class="uil uil-house-user align-content-center"></i> {{ $room->name_room }} </a>
                                </h2>
                                <p class="price fs-20 text-capitalize">
                                    <i class="uil uil-estate align-bottom"></i> type : <b> {{ $room->typeRoom->name }}</b>
                                </p>

                                <p class="price fs-20 text-capitalize">
                                    <i class="uil uil-layers align-bottom"></i> capacity : <b> {{ $room->capacity }}</b>
                                    people
                                </p>
                                <p class="lines"></p>
                                <p class="price fs-20 mb-2 mt-2"><span class="amount"> <b>
                                            {{ $room->unit_kamar ?? '' }}</b>
                                        Rooms, <b> {{ $room->unit_single_bed ?? '-' }}</b> Single Bed,
                                        <b>{{ $room->unit_double_bed ?? '-' }}</b>
                                        Double Bed
                                    </span></p>

                            </div>
                        </aside>
                        <aside class="col-lg-6 col-md-4 sidebar text-end text-md-end text-sm-end">
                            <div class="dropdown share-dropdown btn-group">
                                <button
                                    class="btn btn-sm btn-info rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-4"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="uil uil-share-alt"></i> Share </button>
                                <div class="dropdown-menu" style="">
                                    @forelse ($sosialapp as $sapp)
                                        <a class="dropdown-item" target="_blank" href=" {{ $sapp->url_profile ?? '' }} ">
                                            {!! $sapp->icon ?? '' !!} : {!! $sapp->name ?? '' !!}</a>
                                        {{-- <a href="#"><i class="uil uil-square"></i></a> --}}

                                    @empty
                                    @endforelse
                                    {{-- <a class="dropdown-item" href="{{ $wa2->url_profile ?? '' }}"><i
                                                class="uil uil-instagram"></i>Instagram</a> --}}

                                </div>
                                <!--/.dropdown-menu -->
                            </div>
                            <!--/.share-dropdown -->
                        </aside>
                    </div>

                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="post-header mb-0 ms-4">
                        <h4 class="post-title display-8"><i class="uil uil-cloud-info align-bottom"></i> Rooms include </h4>
                        {{-- fasilitas --}}
                        @forelse ($inc as $rf)
                            <p class="fs-16 text-capitalize badge bg-blue"><i class="uil uil-check-circle align-bottom"></i>
                                {{ $rf->name }}
                            </p>
                        @empty
                            <p class="badge"> -</p>
                        @endforelse

                    </div>

                    {{-- <div class="post-header mb-2">
                        <h4 class="post-title display-8">
                            <i class="uil uil-share-alt align-bottom"></i> Share Us</h4>
                    </div> --}}
                </div>

            </div>
            <!-- /.row -->
            <ul class="nav nav-tabs nav-tabs-basic mt-8 p-2">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="shop-product.html#tab1-1">Rooms Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="shop-product.html#tab1-2">Additional Info</a>
                </li>
            </ul>
            <!-- /.nav-tabs -->
            <div class="tab-content mt-0 mt-md-5">
                <div class="tab-pane fade show active" id="tab1-1">
                    <p>{{ $room->description }}</p>

                    @forelse ($tagRoom as $tg)
                        <p class="fs-14 badge bg-warning text-capitalize"><i class="uil uil-tag-alt align-bottom"></i>
                            {{ $tg->name_tag }}
                        </p>
                    @empty
                        <p class="badge"> -</p>
                    @endforelse

                </div>
                <!--/.tab-pane -->
                <div class="tab-pane fade" id="tab1-2">
                    <p>{{ $room->location }}</p>

                </div>
                <!--/.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12">
                    {{-- <div class="post-header mb-2">
                        <h4 class="post-title display-8"><i class="uil uil-location-point"></i> : </h4>
                    </div> --}}

                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
@endsection
