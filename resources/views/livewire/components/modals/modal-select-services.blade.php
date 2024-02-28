
<div>

        <div class="modal-overlay">
            <div class="modal">
                <div class="modal-header">
                    <h2>Lista de Subserviços</h2>
                    <button wire:click="closeModal">Fechar</button>
                </div>
                <div class="modal-body">
                    <ul class="subservices-list">
                        @foreach($subservicesAll as $subservice)
                            <li>
                                <div class="subservice-item">
                                    <input type="checkbox" wire:click="selectSubservices({{$subservice->id}})" wire:key="{{$subservice->id}}" value="{{ $subservice->id }}">
                                    <span wire:key="{{$subservice->id}}">{{ $subservice->description }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button wire:click="dispatchSubservices">Concluir</button>
                </div>
            </div>
        </div>

    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .subservices-list {
            list-style-type: none;
            padding: 0;
        }

        .subservices-list li {
            background-color: #f8f8f8;
            border-radius: 4px;
            margin-bottom: 8px;
            padding: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .subservices-list li:hover {
            background-color: #e5e5e5;
        }

        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            max-width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .modal-body {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .modal-body li {
            margin-bottom: 10px;
        }
    </style>

</div>
