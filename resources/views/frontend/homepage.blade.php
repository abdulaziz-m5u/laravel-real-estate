@extends('layouts.frontend')

@section('content')
<main>
      <section
        class="hero"
        style="background-image: url('{{ asset('frontend/assets/images/bg.jpg') }}')"
      >
        <div class="container">
          <div class="row text-center" style="padding-top: 270px">
            <h3 class="text-white">
              <span class="fw-bold">Find</span> Your Next <br />
              Dream <span class="fw-bold">Home</span>
            </h3>
          </div>
        </div>
      </section>
      <section
        class="container stats"
        style="margin-bottom: 100px; margin-top: -40px"
      >
        <div class="row justify-content-center">
          <div class="card col-lg-8 p-4 border-0 shadow">
            <div class="row text-center">
              <div class="col">
                <span class="fw-bold fs-1">350+</span> <br />
                <span class="text-secondary"> Properties Sold</span>
              </div>
              <div class="col">
                <span class="fw-bold fs-1">123+</span> <br />
                <span class="text-secondary">Happy Client</span>
              </div>
              <div class="col">
                <span class="fw-bold fs-1">100+</span> <br />
                <span class="text-secondary">Agents</span>
              </div>
              <div class="col">
                <span class="fw-bold fs-1">1000+</span> <br />
                <span class="text-secondary">Properties</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      @foreach($categories as $category)
        <section class="container category" style="margin-bottom: 100px">
          <div class="d-flex justify-content-between align-items-center">
            <h3>{{ $category->name }}</h3>
            <a
              href="{{ route('category.index', $category->slug) }}"
              style="height: 50px"
              class="d-flex px-5 align-items-center btn btn-outline-dark"
              >See More</a
            >
          </div>
          <hr />

          <div class="row">
            @foreach($category->properties as $property)
              <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                  <img
                    height="310"
                    style="object-fit: cover"
                    src="{{ Storage::url($property->galleries()->first()->path) }}"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">
                      {{ $property->name }}
                    </h5>
                    <i class="uil uil-map-marker text-secondary"></i>
                    <span class="text-secondary">{{ $property->location }}</span>
                    <hr />
                    <div class="d-grid grid-custom">
                      <div class="col">
                        <small class="text-secondary">Land Size</small>
                        <div
                          class="d-flex align-items-center"
                          style="column-gap: 0.4rem"
                        >
                          <i
                            class="uil uil-image-resize-square fw-bold fs-2 text-secondary"
                          ></i>
                          <span class="fw-bold text-secondary">{{ $property->size }} sqft </span>
                        </div>
                      </div>
                      <div class="col">
                        <small class="text-secondary">Beds</small>
                        <div
                          class="d-flex align-items-center"
                          style="column-gap: 0.4rem"
                        >
                          <i class="uil uil-bed fs-2 fw-bold text-secondary"></i>
                          <span class="fw-bold text-secondary">{{ $property->bed }}</span>
                        </div>
                      </div>
                      <div class="col">
                        <small class="text-secondary">Bath</small>
                        <div
                          class="d-flex align-items-center"
                          style="column-gap: 0.4rem"
                        >
                          <i class="uil uil-bath fs-2 fw-bold text-secondary"></i>
                          <span class="fw-bold text-secondary"> {{ $property->bath }} </span>
                        </div>
                      </div>
                    </div>
                    <hr class="mb-5" />
                    <h1 style="width: 50%; font-size: 2vw" class="fw-bold mb-0">
                      ${{ $property->price }}
                    </h1>
                    <a
                      href="{{ route('property.show', $property->slug) }}"
                      style="right: 0; bottom: 0; border-radius: 0.4rem 0 0.4rem 0"
                      class="align-items-center border-0 p-3 px-5 position-absolute btn btn-primary d-inline-flex"
                      >View Detail</a
                    >
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      @endforeach
    </main>
@endsection