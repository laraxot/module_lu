<!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Personnel Management</div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Actions <div class="badge bg-primary text-white rounded-pill">Full-time</div></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($_theme->lastLoggedUsers(10) as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->handle }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>