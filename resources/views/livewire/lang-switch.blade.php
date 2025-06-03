<div>

    <select wire:model="locale" wire:change="switchLanguage($event.target.value)">
        <option value="en">en</option>
        <option value="id">id</option>
    </select>

    {{-- <p>{{ __('msg.lang') }}</p> --}}

</div>
