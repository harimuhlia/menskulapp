@extends('Front End.Appfront')

@section('content')
<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
      <div class="container">
        <div class="section-header">
          <h2>{{ $detailfrontend->status_kegiatan }}</h2>
          <p>{{ $detailfrontend->nama_kegiatan }} - {{ $detailfrontend->jenis_lomba }}</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('fotoevent/'.$detailfrontend->foto_kegiatan) }}" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>{{ $detailfrontend->cabang_lomba }}</h2>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
              <p>Nama Pembimbing:</p>
              <h4>{{ $detailfrontend->nama_pembimbing }}</h4>
              
              <p>Panitia Penyelenggara:</p>
              <h4>{{ $detailfrontend->penyelenggara_kegiatan }}</h4>

              <p>Waktu Pelaksanaan:</p>
              <h4>{{ $detailfrontend->tanggal_mulai_kegiatan }} - {{ $detailfrontend->tanggal_akhir_kegiatan }}</h4>
              
              <p>Alamat Penyelenggara:</p>
              <h6>{{ $detailfrontend->tempat_kegiatan }}</h6>

              <h6>Nama Peserta Lomba:</h6>
              <p>{!! $detailfrontend->nama_peserta !!}</p>

            </div>
          </div>

        </div>
      </div>

    </section>
  </main><!-- End #main -->

@endsection