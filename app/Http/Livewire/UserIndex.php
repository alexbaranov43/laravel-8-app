<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
{

    public $user;
    
    public function render($id)
    {
        if (!auth()->user()) {
            abort(403);
        }

        if (User::select(''))

        return view('livewire.user-index');
    }
}
