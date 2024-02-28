<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardDataSelected extends Component
{
    public $dataSelected;

    public function mount($dataSelected)
    {
        $this->dataSelected = $dataSelected;
    }

    public function render()
    {
        return view('livewire.components.card-data-selected');
    }

    public function removeCard()
    {
        $this->dispatch('removeCard', cardId: $this->dataSelected);
    }
}
