<?php

namespace App\Livewire;

use App\Models\Categori;
use App\Models\Fasilitas;
use App\Models\Room;
use Livewire\Component;

class Searching extends Component
{
    public $search = '';
    public $values=[];
    public $limit = 5;
    public function render()
    {
        if ($this->search) {
            $rooms = Room::query()
            ->where('name_room', 'like', '%' . $this->search . '%')
            ->limit($this->limit)
            ->get();

        $categories = Categori::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->limit($this->limit)
            ->get();

        $facilities = Fasilitas::query()
            ->where('name_fasilitas', 'like', '%' . $this->search . '%')
            ->limit($this->limit)
            ->get();

            $this->values = [
                'rooms' => $rooms,
                'categories' => $categories,
                'facilities' => $facilities,
            ];
        }

        else{
            $this->reset(['values']);
        }
        return view('livewire.searching');
    }
}
