@extends('layouts.main_login')
@section('login_content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- content --}}
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-dark text-gradient">Welcome!</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('login_user') }}">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                            aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password"
                                            aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <label>Login Option</label>
                                    <div class="mb-3">
                                        <select class="form-select" name="login_as" aria-label="Default select example" id="login_as">
                                            <option selected value="none">None</option>
                                            <option value="admin">Admin</option>
                                            <option value="siswa">Siswa</option>
                                          </select>
                                    </div>
                                    <div id="kelass" style="display: none">
                                        <label>Class</label>
                                        <div class="mb-3">
                                            <input type="kelas" name="kelas" class="form-control" placeholder="Class"
                                                aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="{{ route('register_user') }}" class="text-dark text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('../assets/img/curved-images/JKT48.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#login_as').change(function() {
                var selectedOption = $(this).val();

                if (selectedOption === 'siswa') {
                    $('#kelass').show();
                } else {
                    $('#kelass').hide();
                }
            });
        });
    </script>
@endsection
