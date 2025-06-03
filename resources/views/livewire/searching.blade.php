<div class="bg-gradient-blue">
    <div class="container d-flex flex-row py-6">
        <form class="search-form w-100">
            <input wire:model.live.debounce.150ms="search" class="form-control rounded-2 shadow-lg"
                placeholder="Live Search and dont hit enter">
        </form>
    </div>
    <div class="container flex-row py-6 pt-1">
        {{-- <div wire:loading wire:target="search">
            <p>Loading...</p>
        </div> --}}

        @if (!empty($values))
            @foreach ($values as $type => $items)
                @if ($items->isNotEmpty())
                    <div class="card w-100 p-1 mb-2 ">
                        @foreach ($items as $item)
                            <div wire:loading.inline-flex wire:target="search">
                                <p class=""></p> Loading...
                            </div>
                            @if (isset($item->name_room))
                                <a href="{{ route('rooms.show', $item->id) }}">
                                    <p class="p-1 text-black">{{ $item->name_room }}
                                    </p>
                                </a>
                            @elseif(isset($item->name))
                                <p class="p-1 text-black">{{ $item->name }}</p>
                            @elseif(isset($item->name_fasilitas))
                                <p class="p-1 text-black">{{ $item->name_fasilitas }}</p>
                            @endif
                        @endforeach
                        <span class="pb-1 pt-0 ms-2 text-black-50 fs-12">{{ ucfirst($type) }}</span>
                    </div>
                @else
                @endif
            @endforeach
        @else
            <p class="fs-12">Cari Apa yang Kalian Suka !</p>
        @endif

    </div>
</div>
