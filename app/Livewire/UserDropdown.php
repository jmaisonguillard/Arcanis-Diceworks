<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class UserDropdown extends Component
{
    public function render()
    {
        return view('livewire.user-dropdown');
    }

    public function goToLogin()
    {
        return Redirect::to(route('login'));
    }
}
