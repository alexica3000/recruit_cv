<span>
    <input
        class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
        type="text"
        placeholder="{{ $placeholder }}"
        name="{{ $name }}"
        wire:model.debounce.500ms="search"
    />
</span>
