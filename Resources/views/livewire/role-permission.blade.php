<div>
    {{--
    <livewire:modal.body-view id="addRole" title="add Role" subtitle="add Role" bodyView="lu::modal.roles.create">
    </livewire:modal.body-view>
    <livewire:modal.body-view id="addPermission" title="add Permission" subtitle="add Permission" bodyView="lu::modal.permissions.create">
    </livewire:modal.body-view>
    --}}
    
    <button class="btn btn-primary" wire:click="addRole()">
        <x-svg icon="plus" />Add Role
    </button>
    <button class="btn btn-primary" wire:click="addPermission()">
        <x-svg icon="plus" />Add Permission
    </button>
    <hr />
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    @foreach ($roles as $role)
        @php
            $panel_id = Str::slug('role-' . $role->name);
            $role_first=$loop->first;
        @endphp
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="{{ $panel_id }}">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#dd-{{ $panel_id }}"
                        aria-controls="dd-{{ $panel_id }}">
                        {{ $role->name }}
                        <button class="btn btn-danger" wire:click="$emit('swalConfirm','deleteRole',{{ $role->id }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="dd-{{ $panel_id }}" class="panel-collapse collapse show" role="tabpanel"
                aria-labelledby="dd-{{ $panel_id }}">
                <div class="panel-body">
                    <div class="row">
                        @foreach ($permissions as $perm)
                            @php
                                $per_found = $role->hasPermissionTo($perm->name);
                            @endphp

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input"
                                            id="{{ $role->id }}-{{ $perm->id }}"
                                            {{ $per_found ? 'checked' : '' }}
                                            wire:click="togglePerm({{ $role->id }},{{ $perm->id }})">
                                        <label class="custom-control-label"
                                            for="{{ $role->id }}-{{ $perm->id }}">
                                            {{ $perm->name }}
                                        </label>
                                        @if($role_first)
                                             <button class="btn btn-danger" wire:click="$emit('swalConfirm','deletePermission',{{ $perm->id }})">
                                                <x-svg icon="trash2" />
                                            </button>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@push('scripts')
   <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('swalConfirm', (funcname,par) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    @this.call(funcname,par);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                }
            });
        })
    });
    </script>
@endpush



</div>
