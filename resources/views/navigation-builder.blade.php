<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    class="filament-navigation"
>
    <div wire:key="navigation-items-wrapper">
        <div class="space-y-2">
            @forelse($getState() as $uuid => $item)
                <x-filament-navigation::nav-item :statePath="$getStatePath() . '.' . $uuid" :item="$item" :moveUp="!$loop->first" :moveDown="!$loop->last" :indent="!$loop->first && $loop->count > 1" />
            @empty
                <div @class([
                    'w-full bg-white rounded-lg border border-gray-300 px-3 py-2 text-left',
                    'dark:bg-gray-700 dark:border-gray-600' => config('forms.dark_mode'),
                ])>
                    No items.
                </div>
            @endforelse
        </div>
    </div>

    <div class="flex justify-end">
        <x-filament::button wire:click="mountAction('item')" type="button" size="sm" color="secondary">
            Add Item
        </x-filament::button>
    </div>
</x-forms::field-wrapper>
