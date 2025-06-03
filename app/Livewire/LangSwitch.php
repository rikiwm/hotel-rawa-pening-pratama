<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class LangSwitch extends Component
{
    public $locale;

    public function mount()
    {
        $this->locale = App::getLocale();
    }

    public function switchLanguage($locale)
    {
        $this->locale = $locale;
        App::setLocale($locale);
        session(['locale' => $locale]);

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.lang-switch');
    }
}
