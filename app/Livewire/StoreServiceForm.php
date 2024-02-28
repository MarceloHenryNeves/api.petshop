<?php

namespace App\Livewire;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Livewire\Components\Modals\ModalSelectServices;
use App\Models\Pet\Coat;
use App\Models\Pet\Size;
use App\Models\Pet\Specie;
use App\Models\Services\Service;
use App\Models\Services\ServiceSubservice;
use App\Models\Services\Subservice;
use App\Models\Services\ValueOfService;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\VarDumper\VarDumper;

class StoreServiceForm extends Component
{
    use TraitService;

    public $subservices = [];
    public $somaSubservicesCheck = false;

    //MODALS
    public $modalServicesIsOpen = false;
    public $modalSpecieIsOpen = false;

    //COLLECTIONS (MODELS)
    public $speciesAll;


    public Service $service;

    public function mount()
    {
        $this->speciesAll = Specie::all();
    }

    public function render()
    {
        return view('livewire.store-service-form');
    }

    public function showModelSelectServices()
    {
        $this->modalServicesIsOpen = true;
    }

    public function showModalSelectSpecies()
    {
        $this->modalSpecieIsOpen = true;
    }

    #[On('closeModalSelectServices')]
    public function closeModalSelectServices()
    {
        $this->modalServicesIsOpen = false;
    }

    #[On('viewSubservicesSelected')]
    public function viewSubservicesSelected($subservicesSelected)
    {
        $this->subservices = array_values($subservicesSelected);
        $this->subservices = array_values($this->subservices);
        
    }

    #[On('removeCard')]
    public function removeCardSubservicesSelected($cardId)
    {
        $this->subservices = array_values($this->subservices);
        unset($this->subservices[array_search($cardId, $this->subservices)]);
        $this->subservices = array_values($this->subservices);
    }


    public function save(StoreServiceRequest $request)
    {
        $requestValidated = $request->validated();

        try {
            DB::beginTransaction();

            $service = $this->service->save($requestValidated->only('title', 'observation'));

            if($service){

                $subservices = [];
                foreach($request->subservices_id as $subservice){
                    $subArray[] = Subservice::find($subservice);
                    $subservices[] = $subArray;
                }

                if(empty($subservices)){
                    session()->flash('error', 'Nenhum subserviço encontrado');
                    return;
                }

                $serviceSubservices = [];
                foreach($subservices as $subservice){
                    $serviceSubArray[] = ServiceSubservice::create([
                        'service_id' => $service->id,
                        'subservice_id' => $subservice->id,
                        'subservice_description' => $subservice->description,
                    ]);

                    $serviceSubservices[] = $serviceSubArray;
                }

                if(empty($serviceSubservices)){
                    session()->flash('error', 'Não foi possível vincular os subserviços ao serviço');
                    return;
                }

                $valueOfService = [];
                foreach($requestValidated->sizes_id as $size_id){
                    $size = Size::find($size_id);
                    if($size){

                        $arrayValueOfService = [];
                        foreach($requestValidated->coats_id as $coat_id){
                            $coat = Coat::find($coat_id);

                            $prize = $requestValidated->default_extra_prize
                                ? self::prizeCalculate($requestValidated->basePrize, $size->extra_value, $coat->extra_value)
                                : $requestValidated->prize;

                            if ($requestValidated->extra_value_if_allergic) {
                                $prize += $requestValidated->extra_prize_allergic;
                            }

                            $arrayValueOfService[] = ValueOfService::create([
                                'service_id' => $service->id,
                                'size_id' => $size->id,
                                'coat_id' => $coat->id,
                                'prize' => $prize
                            ]);

                        }

                        $valueOfService[] = $arrayValueOfService;
                    }
                }

                if(empty($valueOfService)){
                    session()->flash('error', 'Não foi possível vincular os valores ao serviço');
                    return;
                }

                DB::commit();

                $data['title'] = $service->title;
                session()->flash('success', 'Serviço cadastrado com sucesso');
                return $data;
            }

            session()->flash('error', 'Não foi possível criar um serviço');
            return;

        } catch(\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Erro ao salvar o serviço: ' . $e->getMessage());
            return;
        }



    }
}



