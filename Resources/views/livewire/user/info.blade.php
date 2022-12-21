<div>
    <div class="card shadow-lg">
        <div class="card-body">
            <img src="{{ Theme::asset('pub_theme::img/icons/lineal/password.svg') }}"
                class="svg-inject icon-svg icon-svg-sm text-primary mb-4" alt="" />
            <h3 wire:click="toggle()">Password e sicurezza</h3>
            <span>Aggiorna la password e le impostazioni di sicurezza.</span>
        </div>
    </div>
    @if($show)
        <x-input.group type="password.confirmed" name="passwd" />
        <x-flash-message />
        <button type="button" class="btn btn-primary col-12 my-2" wire:click="update()">Aggiorna</button>
    @endif
</div>
