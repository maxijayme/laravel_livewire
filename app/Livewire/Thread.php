<?php

namespace App\Livewire;

use App\Models\Thread as ShowThread;
use Livewire\Component;

class Thread extends Component
{
    public ShowThread $thread;
    public $body='';
    protected $updatesQueryString = ['body'];

    public function replyPost()
    {
        //validate
        $this->validate(['body'=> 'required']);
        //create
        \auth()->user()->replies()->create(
            [
                'thread_id' => $this->thread->id,
                'body' => $this->body
            ]
        );
        // //reset
        $this->reset('body');

    }

    public function render()
    {
        return view('livewire.thread');
    }
}
