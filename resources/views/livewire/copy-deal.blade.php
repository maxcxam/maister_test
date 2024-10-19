<div class="flex justify-center w-50">
    <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" wire:model="type" wire:change="changeType">
        <option selected="">Open this select menu</option>
        <option value="A">1</option>
        <option value="B">1</option>
        <option value="C">1</option>
        <option value="D">1</option>
    </select>

    @if($type)
        {{$caces[$type]}}
    @endif
</div>
