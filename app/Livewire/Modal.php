<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public bool $show = false;
    public $title = '';
    public $content = '';

    protected $listeners = ['openModal', 'closeModal'];

    public function render()
    {
        return view('livewire.modal');
    }

//    #[On('openModal')]
    public function openModal($title = '', $content = '')
    {
//        dd("wwww");
        $this->title = $title;
        $this->content = $content;
        $this->show = true;
        logger()->info("wwwww");
    }

//    #[On('closeModal')]
    public function closeModal()
    {
        $this->show = false;
    }
}
