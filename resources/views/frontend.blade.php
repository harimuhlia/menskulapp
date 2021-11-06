@extends('Front End.Appfront')

@section('content')
      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Selamat Datang<br><span>Di</span> Ektrakurikuler</h1>
      <p class="mb-4 pb-0">SMK Negeri 5 Kabupaten Tangerang Banten</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
      <a href="#about" class="about-btn scrollto">Tentang MenskullApp</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>Tentang Menskull App</h2>
            <p>Menskull App adalah Aplikasi Manajemen Ekstrakurikuler berbasis Website yang digunakan untuk pencatata kegiatan Ekstrakurikuler, Data Prestasi, Data Even dan Lainnya. Aplikasi ini dikembangkan oleh SMK Negeri 5 Kabupaten Tangerang</p>
          </div>
          <div class="col-lg-3">
            <h3>Lokasi</h3>
            <p>SMK Negeri 5 Kabupaten Tangerang</p>
          </div>
          <div class="col-lg-3">
            <h3>Alamat</h3>
            <p>Jln. Ir. Sutami KM. 01, Kel. Mauk Barat Kec. Mauk, Kab. Tangerang Banten</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Daftar Prestasi</h2>
          <p>List Daftar Prestasi Dan Ekskul</p>
        </div>
        <div class="row">
          @foreach ($dtfrontend as $prestasi)
            <div class="col-lg-4 col-md-6">
              <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('fotoevent/'.$prestasi->foto_kegiatan) }}" alt="Speaker 1" class="img-fluid">
                <div class="details">
                  <h3>
                    <a href="/show/{{$prestasi->id}}">{{ $prestasi->status_kegiatan }}</a>
                  </h3>
                  <p>{{ $prestasi->cabang_lomba }}</p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Speakers Section -->
    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Galeri Ekstrakurikuler</h2>
          <p>Galeri Kegiatan Ekskul SMKN 5 kab. Tangerang</p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15870.113367928121!2d106.5057306!3d-6.0592419!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfef2055b68b067a5!2sSMKN%205%20Kab.Tangerang!5e0!3m2!1sid!2sid!4v1636175230741!5m2!1sid!2sid" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3>SMK Negeri 5 Kabupaten Tangerang</h3>
                <p>Center Of Excelent (CoE) Dan SMK Pusat Keunggulan (PK) <br>
                  SMK Negeri 5 Kabupaten Tangerang.<br>
                  Jln. Ir. Sutami KM. 01, Kel. Mauk Barat, Kecamatan. Mauk,<br>
                  Kab. Tangerang, Banten Indonesia.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/2.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/3.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/4.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/5.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/6.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/7.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/8.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End Venue Section -->
  </main>
  <!-- End #main -->

@endsection