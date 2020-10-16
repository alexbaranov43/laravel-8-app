<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Search extends Component
{
    public $searchTerm;
    public $users;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->users = User::where('users.name', 'like', $searchTerm)->get();
        return view('livewire.search');
    }
}
