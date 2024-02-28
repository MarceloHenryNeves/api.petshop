<!-- resources/views/livewire/beautiful-form.blade.php -->

    <div class="bg-white mx-0 bg-opacity-90 shadow-md h-100 rounded-md w-11/12 flex flex-col items-center justify-between px-0">

        <div class="flex justify-start h-10 bg-red-400 w-full mb-10">
            <h1 class="text-slate-200 text-white text-2xl pl-32" style="font-family: 'Roboto';">Cadastro de Serviço</h1>
        </div>

        <div class="w-10/12 h-12/12 flex flex-center">
            <input type="text" placeholder="Título" id="title" class="w-full h-10 p-2 mb-5 border border-gray-300 rounded-md shadow-md">
        </div>

        <div class="w-10/12 h-12/12 flex flex-center">
            <input type="text" placeholder="Observação" id="observation" class="w-full h-10 p-2 mb-5 border border-gray-300 rounded-md shadow-md">
        </div>

        <div class="w-10/12 h-12/12 flex flex-center mb-5 flex-col">
            <label for="petSpecies" class="text-gray-600 mr-2">Escolha as espécies de pets:</label>
            <select id="petSpecies" wire:model="selectedPetSpecies" multiple class="w-full h-12/12 p-2 border border-gray-300 rounded-md shadow-md">
                @foreach($speciesAll as $specie)
                    <option value="{{$specie->specie}}">{{$specie->specie}}</option>
                @endforeach
            </select>
        </div>

        <div class="w-10/12 h-12/12 flex flex-center">
            <input type="text" placeholder="Seleciona os Serviços" id="select-subservices" wire:click="showModelSelectServices" class="w-3/12 h-10 p-2 mb-5 border border-gray-300 rounded-md shadow-md" readonly>
            @if(!empty($subservices))
            <div class="flex flex-wrap justify-start">
                @foreach($subservices as $dataSelected)
                    <livewire:components.card-data-selected :dataSelected="$dataSelected"/>
                @endforeach
            </div>
            @endif
        </div>

        @if($modalServicesIsOpen)
            <livewire:components.modals.modal-select-services/>
        @endif

        <div class="w-10/12 h-12/12 flex flex-center pb-4">
            <input type="checkbox" id="input-soma-check" wire:model.live="somaSubservicesCheck" class="cursor-pointer hidden">
            <label for="input-soma-check" id="label-soma-check" class="flex items-center cursor-pointer">
                Utilizar a soma dos Serviços como valor Total?
                @if(!$somaSubservicesCheck)
                    <div class="w-6 h-6 border border-gray-300 rounded-md mr-2 transition duration-300 ease-in-out bg-white ml-3"></div>
                @else
                    <div class="w-6 h-6 border border-gray-300 rounded-md border-2 mr-2 transition duration-300 ease-in-out bg-red-400  ml-3"></div>
                @endif
            </label>
        </div>

        @if(!$somaSubservicesCheck)
            <div class="w-10/12 h-12/12 flex flex-center">
                <input type="email" placeholder="Preço" id="prize" class="w-full h-10 p-2 mb-5 border border-gray-300 rounded-md shadow-md">
            </div>
        @endif

        <button>Enviar</button>
    </div>



