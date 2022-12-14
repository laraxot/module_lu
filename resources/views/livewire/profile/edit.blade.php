<div>
    <p class="text-sm text-muted"><i class="fa fa-id-card fa-fw me-2"></i>{{ $form_data['user']['handle'] }}<br>
        {{-- <iclass="fafa-birthday-cakefa-fwme-2"></i>06/22/1980<br> --}}
        <i class="fa fa-envelope-open fa-fw me-2"></i>{{ $form_data['email'] }}
        @if (!empty($form_data['phone']))
            <span class="mx-2"> | </span>
            <i class="fa fa-phone fa-fw me-2"></i>{{ $form_data['phone'] }}
        @endif
    </p>
    <div class="collapse" id="personalDetails" wire:ignore>
        <div class="row pt-4">
            <div class="mb-4 col-md-6">
                <label class="form-label" for="name">Name</label>
                {{-- <inputclass="form-control"type="text"name="name"id="name"value="JohnDoe"> --}}
                <input class="form-control" type="text" wire:model="form_data.user.handle">
            </div>
            {{-- <div class="mb-4 col-md-6">
                <label class="form-label" for="date">Date of birth</label>
                <input class="form-control" type="text" name="date" id="date" value="06/22/1980">
            </div> --}}
            <div class="mb-4 col-md-6">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" type="email" wire:model="form_data.email">
            </div>
            <div class="mb-4 col-md-6">
                <label class="form-label" for="phone">Phone number</label>
                <input class="form-control" type="text" wire:model="form_data.phone">
            </div>
        </div>
        <button class="btn btn-outline-primary mb-4" wire:click="save()">
            Save your personal details
        </button>
    </div>
</div>
