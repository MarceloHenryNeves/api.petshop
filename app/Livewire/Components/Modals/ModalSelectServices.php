<?php

namespace App\Livewire\Components\Modals;

use App\Livewire\StoreServiceForm;
use App\Models\Services\Subservice;
use Livewire\Component;
use Symfony\Component\VarDumper\VarDumper;

class ModalSelectServices extends Component
{
    public $isOpen = false;
    public $subservicesSelected = [];
    public $subservicesAll;

    public function mount()
    {
        $this->subservicesAll = Subservice::all();
    }

    public function render()
    {
        return view('livewire.components.modals.modal-select-services');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->dispatch('closeModalSelectServices');
    }

    public function selectSubservices($id)
    {
        if(in_array($id, $this->subservicesSelected)){
            unset($this->subservicesSelected[array_search($id, $this->subservicesSelected)]);
        } else {
            $this->subservicesSelected[] = $id;
        }
        $this->subservicesSelected = array_values($this->subservicesSelected);
        $this->dispatch('viewSubservicesSelected', subservicesSelected: $this->subservicesSelected);
    }

    public function dispatchSubservices()
    {
        $this->dispatch('addSubservices', subservicesSelected: $this->subservicesSelected);
    }

}
