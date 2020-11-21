<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultiformEvent extends Component
{
    public $title;
    public $youtube_video_id;

    public $step;

    public $event;

    private $stepActions = [
        'submit1',
        'submit2',
        'submit3'
    ];

    public function render()
    {
        return view('livewire.multiform-event');
    }

    public function mount() {
        $this->step = 0;
    }

    public function decreaseStep() {
        $this->step--;
    }

    public function submit() {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function submit1() {
        $this->validate([
            'title' => 'required|min:4',
            // 'email' => 'required|email',
        ]);

        $this->step++;
    }

    public function submit2() {
        $this->step++;
    }

    public function submit3() {
        $this->step++;
    }
}
