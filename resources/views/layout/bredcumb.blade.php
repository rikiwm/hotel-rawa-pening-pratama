@php
    $url = request()->getPathInfo();
    $item = explode('/', $url);
    array_pop($item);
@endphp
<section class="wrapper bg-gray">
    <div class="container py-3 py-md-5">
        <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                @foreach ($item as $key => $items)
                    @if ($key)
                        <li class="breadcrumb-item text-capitalize">
                            {{-- @php
                                dd($item);
                            @endphp --}}
                            @if ($item)
                                <a href="{{ url($items) }}">
                                    {{ $items }}
                                </a>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</section>
