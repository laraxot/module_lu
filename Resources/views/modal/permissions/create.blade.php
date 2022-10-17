<x-input.group type="text" name="permission_name" />
<button type="button" class="btn btn-success" wire:click="sendData()">Save</button>
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
