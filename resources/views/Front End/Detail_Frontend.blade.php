@extends('Front End.Appfront')

@section('content')
<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
      <div class="container">
        <div class="section-header">
          <h2>{{ $detailfrontend->status_kegiatan }}</h2>
          <p>{{ $detailfrontend->cabang_lomba }}</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('fotoevent/'.$detailfrontend->foto_kegiatan) }}" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
              <span>Nama Pembimbing:</span>
              <p>{{ $detailfrontend->nama_pembimbing }}</p>
              <span>Nama Event:</span>
              <p>{{ $detailfrontend->nama_kegiatan }}</p>
              <span>Panitia Penyelenggara:</span>
              <p>{{ $detailfrontend->penyelenggara_kegiatan }}</p>
              <span>Waktu Pelaksanaan:</span>
              <p>{{ $detailfrontend->tanggal_mulai_kegiatan }} s/d {{ $detailfrontend->tanggal_akhir_kegiatan }}</p>
              <span>Alamat Penyelenggara:</span>
              <p>{{ $detailfrontend->tempat_kegiatan }}</p>
              <span>Nama Peserta Lomba:</span>
              <p>{!! $detailfrontend->nama_peserta !!}</p>
            </div>
          </div>

        </div>
      </div>

    </section>
  </main><!-- End #main -->

@endsection