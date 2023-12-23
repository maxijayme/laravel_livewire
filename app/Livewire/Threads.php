<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Threads extends Component
{
    public function render()
    {
        $categories = Category::get();
        return view('livewire.threads', [
            'categories' => $categories
        ]);
    }
}
