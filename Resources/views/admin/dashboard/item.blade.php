<!-- Example DataTable for Dashboard Demo-->
<div class="card mb-4">
    <div class="card-header">Personnel Management</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID<br />Handle</th>
                    <th>First Name<br />LastName</th>
                    <th>last </th>
                    {{-- <th>Actions <div class="badge bg-primary text-white rounded-pill">Full-time</div></th> --}}
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 7a064f0 (.)
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> a4bc84d (up)
=======
=======
>>>>>>> 8d9ef9a (rebase)
=======
>>>>>>> 0165c09 (rebase)
=======
>>>>>>> 882eea0 (rebase)
=======
>>>>>>> 4253173 (rebase)
                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 3d16a68 (.)
<<<<<<< HEAD
>>>>>>> f538b8c (.)
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> 86b6983 (up)
<<<<<<< HEAD
>>>>>>> c36e7a4 (.)
=======
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 3d16a68 (.)
>>>>>>> f538b8c (.)
<<<<<<< HEAD
>>>>>>> d3e567c (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> ab9f265 (.)
<<<<<<< HEAD
>>>>>>> 8d9ef9a (rebase)
<<<<<<< HEAD
>>>>>>> a09a693 (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> d2787cb (up)
<<<<<<< HEAD
>>>>>>> 0165c09 (rebase)
<<<<<<< HEAD
>>>>>>> 9849493 (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 3d16a68 (.)
<<<<<<< HEAD
>>>>>>> 882eea0 (rebase)
<<<<<<< HEAD
>>>>>>> fe0dd77 (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> 86b6983 (up)
>>>>>>> 4253173 (rebase)
<<<<<<< HEAD
>>>>>>> a54fd15 (rebase)
=======
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 3d16a68 (.)
>>>>>>> f538b8c (.)
>>>>>>> dea7918 (rebase)
                    <tr>
                        <td>{{ $user->id }}<br />{{ $user->handle }}</td>
                        <td>{{ $user->first_name }}<br />{{ $user->last_name }}</td>
                        <td>{{ $user->last_login_at }}<br />
                            {{ $user->last_login_ip }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
