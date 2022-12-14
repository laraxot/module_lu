<div>
    <div class="card shadow-lg">
        <div class="card-body">
            <img src="{{ Theme::asset('pub_theme::img/icons/lineal/user.svg') }}"
                class="svg-inject icon-svg icon-svg-sm text-primary mb-4" alt="" />
            <h3 wire:click="toggle()">Informazioni personali</h3>
            <span>Visualizza e modifica le informazioni dell'account.</span>
        </div>
    </div>
    @if($show)
        <x-input.group type="text" name="first_name" />
        <x-input.group type="text" name="last_name" />
        <x-input.group type="text" name="email" />
        <x-input.group type="text" name="phone" />
        <x-input.group type="text" name="address" />
        <x-flash-message />
        <button type="button" class="btn btn-primary col-12 my-3" wire:click="update()">Aggiorna</button>
    @endif

</div>