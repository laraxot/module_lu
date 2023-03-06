<div>
    <h4>Old password</h4>
    <input type="password" wire:model.lazy="form_data.old_password" class="form-control" type="password" />

    <h4>New password</h4>
    <input type="password" wire:model.lazy="form_data.passwd" class="form-control" type="password" />

    <h4>Confirm new password</h4>
    <input type="password" wire:model.lazy="form_data.confirm_password" class="form-control" type="password" />

    <x-flash-message />
    <h4>&nbsp;</h4>
    <button type="button" wire:click="save()" class="btn btn-success">Change Password</button>
</div>
