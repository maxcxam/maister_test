<style>
    .bx-ui-sls-input {
        padding: 8px 12px;
        width: 100%;
        border: 1px solid #dcdfe6;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
        background-color: #fff;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .bx-ui-sls-input:focus {
        border-color: #80bdff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .bx-ui-sls-placeholder {
        color: #999;
    }

    .bx-ui-sls-option {
        padding: 8px;
        color: #333;
    }

    .bx-ui-sls-selected {
        margin-top: 10px;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
    }

    .dark .bx-ui-sls-input {
        background-color: #333;
        border-color: #444;
        color: #ccc;
    }

    .dark .bx-ui-sls-input:focus {
        border-color: #80bdff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .dark .bx-ui-sls-placeholder {
        color: #666;
    }

    .dark .bx-ui-sls-selected {
        background-color: #444;
        border-color: #555;
        color: #ccc;
    }
</style>

<div class="flex justify-center w-50">
    <select class="bx-ui-sls-input form-control py-3 px-4 block w-full border-gray-300 rounded text-sm focus:border-blue-300 focus:ring-blue-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" wire:model="type" wire:change="changeType">
        <option selected="" class="bx-ui-sls-placeholder">Open this select menu</option>
        <option value="A" class="bx-ui-sls-option">{{$cases['A']}}</option>
        <option value="B" class="bx-ui-sls-option">{{$cases['B']}}</option>
        <option value="C" class="bx-ui-sls-option">{{$cases['C']}}</option>
        <option value="D" class="bx-ui-sls-option">{{$cases['D']}}</option>
    </select>

    @if($type)
        <div class="bx-ui-sls-selected">{{$cases[$type]}}</div>
    @endif
</div>
