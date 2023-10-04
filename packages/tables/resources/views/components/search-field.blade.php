@props([
    'wireModel' => 'tableSearch',
    'searchableColumnLabels',
])

<div
    x-id="['input']"
    {{ $attributes->class(['fi-ta-search-field']) }}
>
    <label x-bind:for="$id('input')" class="sr-only">
        {{ __('filament-tables::table.fields.search.label') }}
    </label>

    <x-filament::input.wrapper
        inline-prefix
        prefix-icon="heroicon-m-magnifying-glass"
        prefix-icon-alias="tables::search-field"
        :wire:target="$wireModel"
    >
        <x-filament::input
            autocomplete="off"
            inline-prefix
            :placeholder="__('filament-tables::table.fields.search.placeholder') . ($searchableColumnLabels ? ' (' . implode(', ', $searchableColumnLabels) . ')' : '')"
            type="search"
            :wire:model.live.debounce.500ms="$wireModel"
            x-bind:id="$id('input')"
            :wire:key="$this->getId() . '.table.' . $wireModel . '.field.input'"
        />
    </x-filament::input.wrapper>
</div>
