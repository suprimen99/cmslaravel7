<section id="hero" style="color: #fff;">
  <div class="container">
    <div class="row">
        <div class="owl-carousel owl-theme">
          <?php foreach($slider as $slider) { ?>
          <div class="item">
            <div class="row">
              <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out" class="slideku">
                  <h1><?php echo $slider->judul_berita ?></h1>
                  <h4><?php echo $slider->isi ?></h4>
                  <div class="text-center text-lg-left"></div>
                </div>
              </div>
              <div class="col-lg-5 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="300">
                <div class="slideku">
                  <p class="text-center"><img src="{{ asset('public/upload/image/'.$slider->gambar) }}" class="img img-fluid animated" alt="<?php echo $slider->judul_berita ?>"></p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
      </div>
    </div>
  </div>
  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>
</section><!-- End Hero --><!-- Start main -->
<main id="main">

 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-4 col-lg-6 d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <img src="{{ asset('public/upload/image/'.$site->icon) }}" alt="{{ $site->namaweb }}" class="img img-fluid img-thumbnail">
          </div>

          <div class="col-xl-8 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Selamat datang di {{ $site->namaweb }}</h3>
            <?php echo $site->tentang ?>
          </div>
        </div>
      </div>
      <hr>
      <div class="row fancybox-boxes-wrap-new text-center">
			<div class="col-sm-12 col-md-6 col-lg-4 fancybox-item-new" >
					<div class="fancybox__content-new" style="margin-top: 17px;">
						<h4 class="fancybox__title-new">Jumlah Penduduk</h4></br>
					</div>
							<div class="fancybox__icon-new">
								<img src="https://kel-rangkapanjaya.depok.go.id/assets/images/big_family.png" style="height: auto; width: 65px; margin-top: -20px; margin-right: 10px;">
								1,851,878	
            </div>
      	</div>

			<div class="col-sm-12 col-md-6 col-lg-4 fancybox-item-new">
					<div class="fancybox__content-new" style="margin-top: 17px;">
						<h4 class="fancybox__title-new">Jumlah Penduduk Perempuan</h4></br>
					</div>
					
							<div class="fancybox__icon-new">
								<img src="https://kel-rangkapanjaya.depok.go.id/assets/images/woman.png" style="height: auto; width: 55px; margin-top: -20px;">
								918,189							
            </div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4 fancybox-item-new" style="border-radius: 10px 0px 0px 10px;">
					<div class="fancybox__content-new" style="margin-top: 17px;">
						<h4 class="fancybox__title-new">Jumlah Penduduk Laki-Laki</h4></br>
					</div>
					
							<div class="fancybox__icon-new">
								<img src="https://kel-rangkapanjaya.depok.go.id/assets/images/man.png" style="height: auto; width: 55px; margin-top: -20px;">
								933,689							
          </div>
			</div>
		</div>
    </section>
          </br>
          </br>
<section>
<div class="container text-center">
  <div class="row">
	<div class="col-sm-12">
	  <div class="carousel box-carousel d-none d-sm-block">
		  <div class="box">
      <a href="{{ asset('berita') }}"><i class="fa fa-3x fa-newspaper" aria-hidden="true"></i><br>Berita</a>
		  </div>
		  <div class="box">
			<a href="{{ asset('galeri') }}"><i class="fa fa-3x fa-camera-retro" aria-hidden="true"></i><br>Galeri</a>
		  </div>
		  <div class="box">
			<a href="{{ asset('bantuan') }}"><i class="fa fa-3x fa-users" aria-hidden="true"></i><br>Data Penerima Bantuan</a>
		  </div>
		  <div class="box">
      <a href="{{ asset('bantuan') }}"><i class="fa fa-3x fa-address-book" aria-hidden="true"></i><br>Kontak</a>
		  </div>
      <div class="box">
      <a href="{{ asset('berita') }}"><i class="fa fa-3x fa-newspaper" aria-hidden="true"></i><br>Berita</a>
		  </div>
		  <div class="box">
			<a href="{{ asset('galeri') }}"><i class="fa fa-3x fa-camera-retro" aria-hidden="true"></i><br>Galeri</a>
		  </div>
		  <div class="box">
			<a href="{{ asset('bantuan') }}"><i class="fa fa-3x fa-users" aria-hidden="true"></i><br>Data Penerima Bantuan</a>
		  </div>
		  <div class="box">
      <a href="{{ asset('bantuan') }}"><i class="fa fa-3x fa-address-book" aria-hidden="true"></i><br>Kontak</a>
		  </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="mission-" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
		</div><!-- carousel-->
	</div><!--col-->
  </div><!--row-->
  </div>
          </section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">   
    <div>
            <img src="{{ asset('public/upload/image/karangtaruna.png') }}" align="left" width="200px" alt="Image 1">    
            <img src="{{ asset('public/upload/image/rt.png') }}" width="200px" alt="Image 2">   
            <img src="{{ asset('public/upload/image/depok.png') }}" align="right" width="200px" alt="Image 3">  
                 
    </div>
    </div>
   </div>
 </div>
</section>
</main>
<script>
$( document ).ready(function() {
   	$('.box-carousel').slick({
		dots: false,
		arrows: true,
		slidesToShow: 4,
		slidesToScroll: 1,
	});
});
</script>