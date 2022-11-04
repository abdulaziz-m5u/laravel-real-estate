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
            <h3 class="text-white">Contact</h3>
          </div>
        </div>
      </section>
      <section class="container" style="margin-bottom: 100px">
        <div class="row">
              @if(session()->has('message'))
              <div class="alert alert-{{ session()->get('alert-info') }} alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          <div class="col-lg-8 mb-4">
            <div class="card p-3 border-0">
              <h3 class="mb-4">Get In Touch</h3>
              <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                  <div class="row">
                    <div class="col">
                      <input
                        type="text"
                        name="name"
                        class="form-control bg-white border-secondary"
                        style="height: 45px"
                        placeholder="Name"
                        value="{{ old('name') }}"
                      />
                    </div>
                    <div class="col">
                      <input
                        type="email"
                        name="email"
                        class="form-control bg-white border-secondary"
                        style="height: 45px"
                        placeholder="Email"
                        value="{{ old('email') }}"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="row">
                    <div class="col">
                      <input
                        type="text"
                        name="subject"
                        class="form-control bg-white border-secondary"
                        style="height: 45px"
                        placeholder="Subject"
                        value="{{ old('subject') }}"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="row">
                    <div class="col">
                      <textarea
                        name="message"
                        class="form-control bg-white border-secondary"
                        rows="10"
                        placeholder="Message"
                      >{{ old('message') }}</textarea>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary mt-3 py-3 px-4">Send</button>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card border-0 p-3">
              <h3 class="mb-4">Contact Details</h3>
              <ul class="list-unstyled">
                <li
                  class="d-flex align-items-center"
                  style="column-gap: 0.8rem"
                >
                  <i class="uil uil-map-marker fs-3"></i
                  ><span class="text-secondary">132 Bali, Kutai,Indonesia</span>
                </li>
                <li
                  class="d-flex align-items-center"
                  style="column-gap: 0.8rem"
                >
                  <i class="uil uil-map-marker fs-3"></i
                  ><span class="text-secondary">hello@home.com</span>
                </li>
                <li
                  class="d-flex align-items-center"
                  style="column-gap: 0.8rem"
                >
                  <i class="uil uil-map-marker fs-3"></i
                  ><span class="text-secondary">214-805-4428</span>
                </li>
              </ul>
              <span class="d-block text-secondary"
                >Monday – Friday: 9 am – 5 pm</span
              >
              <span class="text-secondary">Saturday: 9 am – 1pm</span>
            </div>
          </div>
        </div>
      </section>
    </main>

@endsection