<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Livewire\Component;

class Threads extends Component
{
    public $search = "";
    public function render()
    {
        $categories = Category::get();
        $threads = Thread::query();
        $threads->where('title','like',"%$this->search%");
        $threads->latest();
        $threads->withCount('replies');

        return view('livewire.threads', [
            'categories' => $categories,
            'threads' => $threads->get(),
        ]);
    }
}
