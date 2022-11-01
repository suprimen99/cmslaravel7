<?php
use Illuminate\Support\Facades\DB;
use App\Nav_model;
$site                 = DB::table('konfigurasi')->first();
// Nav profil
$myprofil             = new Nav_model();

?>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="{{ asset('/') }}"><span>
          <img src="{{ asset('public/upload/image/'.$site->logo) }}" alt="Nitrico" style="min-height: 50px; width: auto;">
        </span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="{{ asset('/') }}"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          
            <li class="active"><a href="{{ asset('/') }}">Home</a></li>
            <li><a href="{{ asset('berita') }}">Berita</a></li>
            <li><a href="{{ asset('galeri') }}">Galeri </a></li>
            <li><a href="{{ asset('bantuan') }}">Penerima Bantuan </a></li>
            <li><a href="{{ asset('kontak') }}">Kontak</a></li>
             
                     
            
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header --><!-- ======= Hero Section ======= -->