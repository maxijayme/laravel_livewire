<?php

namespace App\Livewire;
use App\Models\Reply;
use Livewire\Component;

class Replies extends Component
{
    public Reply $reply;
    public $body='';
    public $is_responding = false;
    public $is_editing = false;



    public function updatedIsEditing(){
        $this->is_responding = false;
        $this->body = $this->reply->body;
    }

    public function updatedIsResponding(){
        $this->is_editing = false;
        $this->body = "";
    }

    public function replyChild()
    {
        //refuse response a child reply
        if(!is_null($this->reply->reply_id))
        {
            return;
        }
        //validate
        $this->validate(['body'=> 'required']);
        //create
        \auth()->user()->replies()->create(
            [
                'reply_id' => $this->reply->id,
                'thread_id' => $this->reply->thread->id,
                'body' => $this->body
            ]
        );
        // //reset
        $this->reset('body');
        $this->is_editing = false;

    }

    public function updateReply()
    {
        //validate
        $this->validate(['body'=> 'required']);
        //update
        $this->reply->update([
            'body' => $this->body
        ]);
        $this->is_responding = false;
    }

    public function render()
    {
        return view('livewire.replies');
    }
}
