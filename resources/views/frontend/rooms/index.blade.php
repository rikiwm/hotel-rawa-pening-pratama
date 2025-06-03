@extends('layout.app')

@section('breadcumb')
    @include('layout.bredcumb')
@endsection
@section('content')
    {{-- content room --}}
    <section class="wrapper bg-light">
        <div class="container py-8 py-md-10">
            <div class="row align-items-center mb-10 position-relative zindex-1">
                <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
                    <h2 class="display-6 text-capitalize"> {{ $titel }}</h2>

                </div>
                <!--/column -->
                <div class="col-md-4 col-lg-3 ms-md-auto text-md-end mt-5 mt-md-0">
                    <div class="form-select-wrapper">
                        <select
                            onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)"
                            class="form-select" name="sort" id="">
                            @foreach ($sorts as $url => $sort)
                                <option {{ $selectedSort == $url ? 'selected' : null }}
                                    value="{{ $url }}"wire.navigate>
                                    {{ $sort }} </option>
                            @endforeach
                        </select>
                        {{-- <select class="form-select">
                            <option value="popularity">Sort by popularity</option>
                        </select> --}}
                    </div>
                    <!--/.form-select-wrapper -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope ">
                    @forelse ($rooms as $r)
                        <div class="project item col-md-2 col-xl-3 col-6">
                            <figure class="rounded mb-6">
                                @php
                                    $img = $r->getFirstMedia('rooms');
                                @endphp
                                @if ($img)
                                    <img src="{{ $img->getUrl() }}" srcset="assets/img/rooms/Bromo.jpg 2x" alt=""
                                        class="h-img" />
                                @else
                                    <img src="" srcset="" alt="" />
                                @endif
                                {{-- <a class="item-like" href="shop.html#" data-bs-toggle="white-tooltip" title="Quick view"><i
                                        class="uil uil-eye"></i></a> --}}

                                <a href="{{ url('rooms', $r->slug) }}" class="item-cart"> Details </a>
                                <span class="avatar bg-blue text-white w-10 h-10 position-absolute text-uppercase fs-13"
                                    style="top: 1rem; left: 1rem;"><span>{{ $r->typeRoom->name }}</span></span>
                            </figure>
                            <div class="post-header">
                                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                    <div class="post-category text-ash mb-0">Capacity : {{ $r->capacity }}</div>

                                </div>
                                <h2 class="post-title h3 fs-22"><a href="shop-product.html"
                                        class="link-dark">{{ $r->name_room }} </a></h2>
                                <p class="price">
                                    <del>
                                        <span class="amount">Rp. {{ number_format($r->price + 50000) }} </span>
                                    </del>
                                    <ins>
                                        <span class="amount">&nbsp; Rp. {{ number_format($r->price) }}</span>
                                    </ins>
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="project item col-md-2 col-xl-3 col-6">
                            <figure class="rounded mb-6">
                                <img src="assets/img/rooms/Bromo.jpg" srcset="assets/img/rooms/Bromo.jpg 2x"
                                    alt="" />
                                <a class="item-like" href="shop.html#" data-bs-toggle="white-tooltip" title="Quick view"><i
                                        class="uil uil-eye"></i></a>

                                <a href="#" class="item-cart"> Details </a>
                                <span class="avatar bg-blue text-white w-10 h-10 position-absolute text-uppercase fs-13"
                                    style="top: 1rem; left: 1rem;"><span>Sale!</span></span>
                            </figure>
                            <div class="post-header">
                                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                    <div class="post-category text-ash mb-0">Shoes</div>

                                </div>
                                <h2 class="post-title h3 fs-22"><a href="shop-product.html" class="link-dark">Nama</a></h2>
                                <p class="price">
                                    <del>
                                        <span class="amount">harga awal</span>
                                    </del>
                                    <ins>
                                        <span class="amount">diskon</span>
                                    </ins>
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- /.row -->
            </div>
            <!-- /.grid -->
            <nav class="d-flex justify-content-center" aria-label="pagination">
                {{ $rooms->links() }}
            </nav>
            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
@endsection
