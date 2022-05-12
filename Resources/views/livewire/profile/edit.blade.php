<div>
    <p class="text-sm text-muted"><i class="fa fa-id-card fa-fw me-2"></i>aaaa<br>
        {{-- <iclass="fafa-birthday-cakefa-fwme-2"></i>06/22/1980<br> --}}
        <i class="fa fa-envelope-open fa-fw me-2"></i>the_email<span class="mx-2"> |
        </span>
        <i class="fa fa-phone fa-fw me-2"></i>12345678
    </p>
    <div class="collapse" id="personalDetails">
        <div class="row pt-4">
            <div class="mb-4 col-md-6">
                <label class="form-label" for="name">Name</label>
                {{-- <inputclass="form-control"type="text"name="name"id="name"value="JohnDoe"> --}}
                <input class="form-control" type="text" {{-- wire:model="handle" --}}>
            </div>
            {{-- <div class="mb-4 col-md-6">
                <label class="form-label" for="date">Date of birth</label>
                <input class="form-control" type="text" name="date" id="date" value="06/22/1980">
            </div> --}}
            <div class="mb-4 col-md-6">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" type="email" {{-- wire:model="email" --}}>
            </div>
            <div class="mb-4 col-md-6">
                <label class="form-label" for="phone">Phone number</label>
                <input class="form-control" type="text" {{-- wire:model="phone" --}}>
            </div>
        </div>
        <button class="btn btn-outline-primary mb-4" wire:click="save()">
            Save your personal details
        </button>
    </div>
</div>
