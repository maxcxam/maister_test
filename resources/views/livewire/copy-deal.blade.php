<div class="flex justify-center w-50">

    @if($step == 0)
        <select class="bx-ui-sls-input form-control py-3 px-4 block w-full border-gray-300 rounded text-sm focus:border-blue-300 focus:ring-blue-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" wire:model="type" wire:change="changeType">
            <option selected="" class="bx-ui-sls-placeholder">Open this select menu</option>
            <option value="A" class="bx-ui-sls-option">{{$cases['A']}}</option>
            <option value="B" class="bx-ui-sls-option">{{$cases['B']}}</option>
            <option value="C" class="bx-ui-sls-option">{{$cases['C']}}</option>
            <option value="D" class="bx-ui-sls-option">{{$cases['D']}}</option>
        </select>
    @endif


    @if($step == 1)
        <div class="bx-ui-sls-selected">{{$cases[$type]}}</div>
    @endif



    @if($step > 0)
        <button class="border rounded border-green-950 bg-green-700 text-white hover:shadow hover:border-green-700 hover:bg-green-950 font-bold px-2 py-1" wire:click="restart">Почати спочатку</button>
    @endif
</div>
