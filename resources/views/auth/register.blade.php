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
            <h3 class="text-white">Be part of our agents</h3>
          </div>
        </div>
      </section>
      <section class="container" style="margin-top: -80px">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card shadow-sm p-3 border-0">
              <h3 class="mb-4 text-center">Register Now</h3>

              <form action="{{ route('register') }}" method="post" class="text-center" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <input
                        type="text"
                        name="name"
                        class="form-control bg-white border-secondary  @error('name') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Name"
                      />
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                      <input
                        type="email"
                        name="email"
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
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <input
                        type="number"
                        name="phone"
                        class="form-control bg-white border-secondary  @error('phone') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Mobile Phone"
                      />
                      @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                      <input
                        type="number"
                        name="fax"
                        class="form-control bg-white border-secondary  @error('fax') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Fax"
                      />
                      @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="row">
                    <div class="col">
                      <input
                        type="number"
                        name="whatsapp"
                        class="form-control bg-white border-secondary  @error('whatsapp') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Whatsapp"
                      />
                      @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="row">
                    <div class="col" style="text-align: initial">
                      <label for="profile" class="form-label"
                        >Photo Profile</label
                      >
                      <input
                        type="file"
                        name="profile"
                        class="form-control form-control-lg bg-white border-secondary  @error('profile') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Profile"
                      />
                      @error('profile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <input
                        type="password"
                        name="password"
                        class="form-control bg-white border-secondary  @error('password') is-invalid @enderror"
                        style="height: 45px"
                        placeholder="Password"
                      />
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                      <input
                        type="password"
                        name="password_confirmation"
                        class="form-control bg-white border-secondary"
                        style="height: 45px"
                        placeholder="Confirm Password"
                      />
                    </div>
                  </div>
                </div>
                <button
                  type="submit"
                  class="btn fw-bold fs-5 mx-auto btn-primary mt-3 py-3 px-5"
                >
                  Register
                </button>

                <a href="{{ route('login') }}" class="d-block mt-4">Already have an account login here</a>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection