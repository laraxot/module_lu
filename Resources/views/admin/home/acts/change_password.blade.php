@extends('adm_theme::layouts.app')
@section('content')
    <div class="col-md-6">
        <form method="POST" novalidate>
            @csrf
            <h4>Old password</h4>
            <input type="password" name="oldPassword" id="oldPassword" class="form-control" type="password" />
            <div id="oldPasswordWarning" class="d-none bg-warning">
                Please enter the old password.
            </div>
            <h4>New password</h4>
            <input type="password" name="newPassword" id="newPassword" class="form-control" type="password" />
            <div id="newPasswordWarning"class="d-none bg-warning">
                Please enter new password.
            </div>
            <h4>Confirm new password</h4>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" type="password" />
            <div id="confirmPasswordWarning" class="d-none bg-warning">
                Passwords don't match.
            </div>
            <h4>&nbsp;</h4>
            <button type="submit" class="btn btn-success">Change Password</button>
        </form>
    </div>

    @push('scripts')
        <script>
            checkValidity = function() {
                const old_password = oldPassword.value;
                const new_password = newPassword.value;
                const confirm_password = confirmPassword.value;

                let returned = true;

                //condizione 1
                if ('' == old_password) {
                    $(oldPasswordWarning).removeClass('d-none');
                    returned = false;
                }

                //condizione 2
                axios.get('/it/check_current_password', {
                        params: {
                            old_password: old_password
                        }
                    })
                    .then(function(response) {
                        console.log(response);
                        if (response.data === true) {
                            $(oldPasswordWarning).addClass('d-none');
                        } else {
                            returned = false;
                            oldPasswordWarning.innerHTML = 'Your old password is not correct.';
                            $(oldPasswordWarning).removeClass('d-none');
                        }
                    })
                    .catch(function(error) {
                        returned = false;
                        $(oldPasswordWarning).addClass('d-none');
                    });


                //condizione 3
                if ('' == new_password) {
                    newPasswordWarning.innerHTML = 'Please enter new password.';
                    $(newPasswordWarning).removeClass('d-none');
                    returned = false;
                }

                //condizione 4
                if (new_password.length < 8) {
                    newPasswordWarning.innerHTML = 'Password must be at least 8 characters.';
                    $(newPasswordWarning).removeClass('d-none');
                    returned = false;
                }

                //condizione 5

                if (new_password.match(/[!@#$%^&*(),.?":{}|<>]/)) {
                    $(newPasswordWarning).addClass('d-none');
                } else {
                    newPasswordWarning.innerHTML =
                        'Password must contain at least one special character.';
                    $(newPasswordWarning).removeClass('d-none');
                    returned = false;
                }

                //condizione 6
                if (new_password.match(/[0-9]/)) {

                } else {
                    newPasswordWarning.innerHTML = 'Password must contain at least one number.';
                    $(newPasswordWarning).removeClass('d-none');
                    returned = false;
                }

                //condizione 7
                if (new_password.match(/[A-Z]/)) {

                } else {
                    newPasswordWarning.innerHTML =
                        'Password must contain at least one uppercase letter.';
                    $(newPasswordWarning).removeClass('d-none');
                    returned = false;
                }


                //condizione 8
                if (new_password !== '' && confirm_password !== '' && new_password == confirm_password) {
                    $(confirmPasswordWarning).addClass('d-none');
                } else {
                    $(confirmPasswordWarning).removeClass('d-none');
                    returned = false;
                }

                return returned;
            }


            window.addEventListener("input", () => {
                checkValidity();
            });


            window.addEventListener("submit", () => {
                console.log(checkValidity());
                if (checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });
        </script>
    @endpush
@endsection
