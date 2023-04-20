@extends('layouts.default')

@section('content')
    
    <section id="jumbotron">
      <img src="{{ asset('mosque.jpg') }}" class="card-img-top object-fit-cover w-100" style="height: 700px;" alt="...">
    </section>

    <div class="container my-5">
            <div class="row py-3 row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-4">

                <!-- Row 1 -->
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/tpa.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">TPA</h5>
                      <p class="card-text">Agenda kegiatan TPA yang akan dilaksanakan pada bulan ramadhan</p>
                      <a href="/tpa" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/konsum.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Konsumsi Ramadhan</h5>
                      <p class="card-text">Pengelolaan konsumsi untuk takjil, jabur dan buka bersama pada bulan ramadhan</p>
                      <a href="/konsumsi" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/tarawih.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Tarawih</h5>
                      <p class="card-text">Agenda kegiatan sholat tarawih berjamaah yang akan dilaksanakan pada bulan ramadhan</p>
                      <a href="/tarawih" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/tadarus.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Tadarus</h5>
                      <p class="card-text">Agenda kegiatan tadarus yang akan dilaksanan pada bulan ramadhan</p>
                      <a href="/tadarus" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>

                <!-- Row 2 -->
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/khataman.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Khataman & Nuzulul</h5>
                      <p class="card-text">Agenda kegiatan khataman & nuzulul Qur'an yang akan dilaksanan pada bulan ramadhan</p>
                      <a href="/khataman" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/zakat.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Zakat</h5>
                      <p class="card-text">Agenda kegiatan pembagian zakat yang akan dilaksanan pada bulan ramadhan</p>
                      <a href="/zakat" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/takbiran.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Takbiran</h5>
                      <p class="card-text">Agenda kegiatan takbiran yang akan dilaksanan pada bulan ramadhan</p>
                      <a href="/takbiran" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card border-light text-center" style="height: 360px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                      <img src="{{ asset('assets/icon/sholat-ied.png') }}" class="card-img-top w-50" alt="...">
                      <h5 class="card-title mt-3">Sholat Ied</h5>
                      <p class="card-text">Agenda kegiatan sholat ied </p>
                      <a href="/sholatied" class="btn btn-dark w-100">Selengkapnya</a>
                    </div>
                  </div>
                </div>

            </div>
    </div>

@endsection