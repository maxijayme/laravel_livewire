<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Livewire\Component;

class Threads extends Component
{
    public function render()
    {
        $categories = Category::get();
        $threads = Thread::get();
        return view('livewire.threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
