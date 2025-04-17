<x-modal.style :content-padding="false">
    <x-slot name="title">Crea Permesso</x-slot>
    <x-input.group type="text" name="permission_name" />
    <button type="button" class="btn btn-success" wire:click="save()">Save</button>
    <x-flash-message></x-flash-message>
</x-modal.style>
