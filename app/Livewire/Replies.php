<?php

namespace App\Livewire;
use App\Models\Reply;
use Livewire\Component;

class Replies extends Component
{
    public Reply $reply;
    public function render()
    {
        return view('livewire.replies');
    }
}
