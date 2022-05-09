@php
    //dddx(get_defined_vars());
@endphp

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Open Form
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crea utente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="handle">Handle</label>
                        <input type="text" class="form-control" id="handle" placeholder="Enter handle" wire:model="handle">
                        @error('handle') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>


                    <div class="form-group">
                        <label for="first_name">First_name</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter first_name" wire:model="first_name">
                        @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>



                    <div class="form-group">
                        <label for="last_name">Last_name</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter last_name" wire:model="last_name">
                        @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>






                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" wire:model="email" placeholder="Enter Email">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>