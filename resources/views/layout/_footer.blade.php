<footer class="bg-gray text-inverse">
    <div class="container py-7 py-md-9">
        <div class="row gy-6 gy-lg-0">
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <img class="mb-1 p-1 w-auto" src="{{ asset('assets/img/logos/LogoHRPP.png') }}"
                        srcset="{{ asset('assets/img/logos/LogoHRPP.png 2x') }}" alt="" />

                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-6 offset-lg-1">
                <div class="widget">
                </div>
                <h4 class="widget-title mb-3 text-blue-dark opacity-75">Hotel Rawa Pening Pratama</h4>


                {{-- <p>{{ $sosial->key[0] }}</p> --}}
                <p class="mb-4 text-blue"> Jl. P. Diponegoro, RT.01/RW.01, Desa Kenteng, Bandungan,<br>
                    Kabupaten Semarang, Jawa Tengah 50655 <br>
                    Telp: <a class="text-blue" href=" {{ $wa->url_profile ?? '' }} "> {{ $wa->value ?? '' }}</a> | WA
                    <a class="text-blue" href=" {{ $wa2->url_profile ?? '' }} "> {{ $wa2->value ?? '' }}</a> | Email:
                    {{ $email->value ?? '' }}
                </p>
                <nav class="nav social">
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                        <i class="uil uil-tiktok"></i>
                    </a>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="social" class="bi bi-tiktok" viewBox="0 0 16 16"><path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" /></svg>

                    </a>

                    @forelse ($sosialapp as $sapp)
                        <a href=" {{ $sapp->url_profile ?? '' }} " target="_blank"> {!! $sapp->icon ?? '' !!}</a>
                        {{-- <a href="#"><i class="uil uil-square"></i></a> --}}

                    @empty
                    @endforelse

                </nav>
            </div>

            <div class="col-md-4 col-lg-2 offset-lg-1">
                <div class="widget">
                    <a href="{{ $wa->url_profile ?? '' }}" class="btn btn-red btn-sm text-uppercase text-nowrap">Book
                        Now</a>
                </div>
            </div>

        </div>

    </div>

</footer>

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
