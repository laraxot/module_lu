<div>
    @include('lu::livewire.create')
    @include('lu::livewire.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                @foreach($fields as $field)
                <th>{{ $field->name }}</th>
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
            <tr>
                @foreach($fields as $field)
                <td>{!! Theme::inputFreeze(['row'=>$row,'field'=>$field]) !!} </td>
                @endforeach

                <td>
                    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $row->user_id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $row->user_id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach

        </tbody>
        {{--
        --}}
    </table>
    {{ $rows->links() }}
</div>
