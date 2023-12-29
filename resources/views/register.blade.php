@extends("layouts.main_register")
@section('main_register')
    {{-- content --}}
    <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/JKT48.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
              <p class="text-lead text-white">Glad to see you, lets make an account!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Register here!</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="POST" action="{{ route('register_user') }}">
                  @csrf
                  <label>Name</label>
                  <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter your Password (min. 8 characters)" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <label>Account Option</label>
                  <div class="mb-3">
                      <select class="form-select" name="role_status" aria-label="Default select example" id="role_status">
                          <option selected value="none">None</option>
                          <option value="admin">Admin</option>
                          <option value="siswa">Siswa</option>
                        </select>
                  </div>
                  <div id="kelasz" style="display: none">
                    <label>Class</label>
                    <div class="mb-3">
                      <input type="kelas" name="kelas" class="form-control" placeholder="Enter your Class (ex. XI PPLG 3)" aria-label="Password" aria-describedby="password-addon">
                    </div>
                  </div>
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Sign up</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    @include('partials.register.footer')
  </main>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var roleStatusSelect = document.getElementById('role_status');
        var kelaszDiv = document.getElementById('kelasz');

        roleStatusSelect.addEventListener('change', function () {
            if (roleStatusSelect.value === 'siswa') {
                kelaszDiv.style.display = 'block';
            } else {
                kelaszDiv.style.display = 'none';
            }
        });
    });
</script>
@endsection