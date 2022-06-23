<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    @extends('layout.head')

</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-50">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="register-column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form id="register-form" class="form" action="{{ route('register') }}" method="POST">
                            {!! csrf_field() !!}
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Name:</label><br>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                                <span style="color: red;" class="error-message">{{ $errors->first('name') }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                                <span style="color: red;" class="error-message">{{ $errors->first('email') }}</span>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Role:</label><br>
                                <select style="height: 40px" type="text" id="product_categorie" name="role" class="form-control">
                                    <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>
                                        Manager</option>
                                    <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>
                                        User</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <span style="color: red;"
                                    class="error-message">{{ $errors->first('password') }}</span></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password Confirm:</label><br>
                                <input type="password" name="password_confirmation" id="password" class="form-control">
                                <span style="color: red;"
                                    class="error-message">{{ $errors->first('password_confirmation') }}</span></p>
                            </div>
                            <div class="form-group">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
                            </div>

                            <div id="register-link" class="text-right">
                                <a href="{{ route('login') }}" class="text-info">Login here</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
