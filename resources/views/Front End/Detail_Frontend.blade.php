@extends('Front End.Appfront')

@section('content')
<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
      <div class="container">
        <div class="section-header">
          <h2>{{ $detailfrontend->status_kegiatan }} {{ $detailfrontend->cabang_lomba }}</h2>
          <p>{{ $detailfrontend->nama_kegiatan }}</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('fotoevent/'.$detailfrontend->foto_kegiatan) }}" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
              <span>Nama Pembimbing:</span>
              <h4>{{ $detailfrontend->nama_pembimbing }}</h4>
              
              <span>Panitia Penyelenggara:</span>
              <h4>{{ $detailfrontend->penyelenggara_kegiatan }}</h4>

              <span>Waktu Pelaksanaan:</span>
              <h4>{{ $detailfrontend->tanggal_mulai_kegiatan }} - {{ $detailfrontend->tanggal_akhir_kegiatan }}</h4>
              
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