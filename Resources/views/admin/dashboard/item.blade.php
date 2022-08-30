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
<<<<<<< HEAD

                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
<<<<<<< HEAD
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
=======
>>>>>>> ac44d56 (rebase)
=======
>>>>>>> 19dde75 (rebase)
=======
>>>>>>> 224bce7 (rebase)
=======
>>>>>>> 1a47b29 (rebase)
                @foreach ($_theme->lastLoggedUsers(10) as $user)
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 3d16a68 (.)
<<<<<<< HEAD
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
<<<<<<< HEAD
>>>>>>> dea7918 (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> ab9f265 (.)
>>>>>>> ac44d56 (rebase)
<<<<<<< HEAD
>>>>>>> 7d965ae (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> d2787cb (up)
>>>>>>> 19dde75 (rebase)
<<<<<<< HEAD
>>>>>>> 0794e53 (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers([10]) as $user)
>>>>>>> 3d16a68 (.)
>>>>>>> 224bce7 (rebase)
<<<<<<< HEAD
>>>>>>> 593a8e4 (rebase)
=======
=======
=======
                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> 86b6983 (up)
>>>>>>> 1a47b29 (rebase)
<<<<<<< HEAD
>>>>>>> e312ff0 (rebase)
=======
=======

                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> 51717d2 (up)
>>>>>>> c8c4efa (rebase)
=======


                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> bdccc5c (.)
>>>>>>> 2bcccf2 (rebase)
=======

                @foreach ($_theme->lastLoggedUsers(10) as $user)
>>>>>>> df263aa (up)
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
