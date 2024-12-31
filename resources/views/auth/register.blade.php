@extends('auth.auth_login')
@section('content')
    <div class="container-login100">
        <div class="wrap-login100 p-0">
            <div class="card-body">
                <form class="login100-form validate-form" action="{{ url('/register') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Registration
                    </span>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="name" placeholder="User name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="mdi mdi-account" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="zmdi zmdi-email" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn btn-primary">
                            Register
                        </button>
                    </div>
                    <div class="text-center pt-3">
                        <p class="text-dark mb-0">Already have account?<a href="{{ url('/login') }}"
                                class="text-primary ms-1">Sign
                                In</a></p>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center my-3">
                    <a href="" class="social-login  text-center me-4">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href="" class="social-login  text-center me-4">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="" class="social-login  text-center">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
