<?php

namespace App\Livewire;

use App\Models\Thread as ShowThread;
use Livewire\Component;

class Thread extends Component
{
    public ShowThread $thread;

    public function render()
    {
        return view('livewire.thread');
    }
}
