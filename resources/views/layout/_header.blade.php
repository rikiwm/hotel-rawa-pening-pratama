<header class="wrapper bg-soft-blue">
    {{-- navbar navbar-expand-lg center-nav navbar-light navbar-bg-light navbar-clone fixe --}}
    <nav
        class="navbar navbar-expand-lg center-nav transparent @if (Request::is('/')) position-absolute navbar-dark @else navbar-lightv navbar-bg-light fixed @endif caret-none">
        <div
            class="@if (Request::is('/')) container-fluid @else container @endif flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100 ">
                <a href="#">
                    <img class="logo-dark p-1" src="" srcset="{{ asset('assets/img/logos/LogoHRPP.png 3x') }}"
                        alt="logo" />
                    <img class="logo-light" src="" srcset="{{ asset('assets/img/logos/logo.png 2x') }}"
                        alt="logo" />
                </a>
            </div>
            <div class="navbar-collapse offcanvas  offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">HRPP</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link @if (Request::is('/')) active @endif"
                                href="/"wire:navigate>{{ __('msg.home') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#facilitis-hrpp">{{ __('msg.facilities') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link @if (Request::is('rooms')) active @endif "
                                href="{{ route('rooms.index') }}"wire:navigate>{{ __('msg.rooms') }}</a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link"
                                href="{{ $wa->url_profile ?? '' }}{{ $wa->value ?? '' }}">{{ __('msg.contact') }}</a>
                        </li>


                        </li>
                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <nav class="nav social social-white mt-4">
                                @forelse ($sosialapp as $item)
                                    <a href="{{ $item->url_profile ?? '' }}">{!! $item->icon ?? '' !!}</a>

                                @empty
                                    <a href="#">-</a>
                                @endforelse

                            </nav>
                            <!-- /.social -->
                        </div>
                    </div>
                    <!-- /.offcanvas-footer -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-30 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto me-md-4">

                    <li class="nav-item dropdown language-select text-uppercase">
                        {{-- <a class="nav-link dropdown-item dropdown-toggle" href="" role="button"
                            aria-expanded="false">{{ __('msg.lang') }}</a> --}}
                        <a class="nav-link dropdown-item" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="uil uil-language"></i></a>

                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ url('lang/en') }}"wire:navigate>En</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ url('lang/id') }}"wire:navigate>Id</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item ms-4"><a class="nav-link" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvas-search"><i class="uil uil-search"></i></a></li>
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->

    <!-- /.offcanvas -->
    <div class="offcanvas offcanvas-top bg-light" id="offcanvas-search" data-bs-scroll="true">

        @livewire('searching')
        <!-- /.container -->
    </div>
    <!-- /.offcanvas -->
</header>
