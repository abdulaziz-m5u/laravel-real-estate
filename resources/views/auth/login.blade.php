@extends('layouts.frontend')

@section('content')
<main>
      <section
        class="hero-property mb-5"
        style="
          background-image: url('{{ asset('frontend/assets/images/bg-alt.jpg') }}');
          height: 50vh;
        "
      >
        <div class="container">
          <div class="row text-center" style="padding-top: 120px">
            <h3 class="text-white">Make your dream come true</h3>
          </div>
        </div>
      </section>
      <section class="container" style="margin-top: -80px">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card shadow-sm p-3 border-0">
              <h3 class="mb-4 text-center">Login</h3>

              <form action="{{ route('login') }} " method="post" class="text-center">
                @csrf   
              <div class="form-group">
                  <div class="row justify-content-center">
                    <div class="col-lg-10 mb-3">
                      <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control bg-white border-secondary @error('email') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Email"
                      />
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row justify-content-center">
                    <div class="col-lg-10 mb-3">
                      <input
                        type="password"
                        name="password"
                        class="@error('password') is-invalid @enderror form-control bg-white border-secondary"
                        style="height: 45px"
                        placeholder="Password"
                      />
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row justify-content-center">
                    <div class="col-lg-10 mb-3" style="text-align: initial">
                      <div class="form-check form-switch">
                        <input
                            type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                          class="form-check-input"
                          role="switch"
                          id="flexSwitchCheckChecked"
                        />
                        <label
                          class="form-check-label"
                          for="flexSwitchCheckChecked"
                          >Remember Me</label
                        >
                      </div>
                    </div>
                  </div>
                </div>

                <button
                type="submit"
                  class="btn fw-bold fs-5 mx-auto btn-primary mt-3 py-3 px-5"
                >
                  Login
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
