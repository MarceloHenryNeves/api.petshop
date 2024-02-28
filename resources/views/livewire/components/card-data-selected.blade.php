
    <div class="relative" wire:key="{{\App\Models\Services\Subservice::find($dataSelected)->id}}">

        <div class="bg-red-400 min-w-40 max-w-250 rounded-xl m-2 shadow-gray-400 shadow-md">
            <div class="px-5 flex flex-row items-center justify-between">
                <div class="w-10/12">
                    <p class="text-slate-200 text-sm whitespace-nowrap">
                        @if(strlen(\App\Models\Services\Subservice::find($dataSelected)->description) >= 30)
                            {{substr(\App\Models\Services\Subservice::find($dataSelected)->description, 0, 30) . '...'}}
                        @else
                            {{\App\Models\Services\Subservice::find($dataSelected)->description}}
                        @endif
                    </p>
                </div>
                <div class="absolute top-0 right-0">
                    <div class="bg-gray-500 w-5 h-5 flex items-center justify-center rounded-full" wire:click="removeCard">
                        <p class="text-slate-200 text-sm">X</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
