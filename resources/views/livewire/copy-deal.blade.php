<div class="flex h-screen">
    <div class="m-auto">
    @if($step == 0)
        <label class="my-5 text-xl text-center block text-sm font-medium text-gray-700 dark:text-gray-400">
            Створення угоди:
        </label>
        <select class="bx-ui-sls-input form-control py-3 px-4 block w-full border-gray-300 rounded text-sm focus:border-blue-300 focus:ring-blue-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" wire:model="type" wire:change="changeType">
            <option value="" class="bx-ui-sls-placeholder" selected>Виберіть причину копіювання угоди</option>
            <option value="A" class="bx-ui-sls-option">{{$cases['A']}}</option>
            <option value="B" class="bx-ui-sls-option">{{$cases['B']}}</option>
            <option value="C" class="bx-ui-sls-option">{{$cases['C']}}</option>
            <option value="D" class="bx-ui-sls-option">{{$cases['D']}}</option>
        </select>
    @endif
        @if($step === 0)
            <div class="flex justify-center mt-5">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-opacity duration-500"
                        wire:click="createDeal"
                        wire:loading.attr="disabled"
                        style="opacity: {{ $type ? '1' : '0' }}; pointer-events: {{ $type ? 'auto' : 'none' }};">
                    <span wire:loading.remove>Створити угоду</span>
                    <span wire:loading>
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        @endif

        @if($step == 1)
            <div class="bx-ui-sls-selected text-center text-lg font-medium text-gray-800 dark:text-gray-200 mb-4">
                Вибрана причина:
                <span class="font-semibold text-blue-600">{{ $cases[$type] }}</span>
            </div>
        @endif

        @if($step > 0)
            <div class="flex justify-center gap-4 mt-5">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-opacity duration-500"
                    wire:click="restart"
                    wire:loading.attr="disabled"
                    style="opacity: {{ $type ? '1' : '0' }}; pointer-events: {{ $type ? 'auto' : 'none' }};">
                    <span wire:loading.remove>Почати спочатку</span>
                    <span wire:loading>
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                    </span>
                </button>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-opacity duration-500"
                    wire:click="confirm"
                    wire:loading.attr="disabled"
                    style="opacity: {{ $type ? '1' : '0' }}; pointer-events: {{ $type ? 'auto' : 'none' }};">
                    <span wire:loading.remove>Перейти до наступного кроку</span>
                    <span wire:loading>
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        @endif

        @if($url)
            <a href="{{$url}}" target="_parent" >Перейти до нової угоди</a>
        @endif


    </div>
</div>
