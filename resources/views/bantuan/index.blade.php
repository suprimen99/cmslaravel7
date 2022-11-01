<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1><?php echo $title ?></h1>
              <hr>
            </div>
            <div class="col-md-12">
              <p>*P.S : UNTUK MENCARI NAMA SILAHKAN TEKAN CTRL + F DAN KEMUDIAN CARI NAMA ANDA.
              </p>
              <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <tr class="bg-info">
                        <th width="5%" class="text-center">
                            NO
                        </th>
                        
                        <th width="40%">NAMA</th>
                        <th width="15%">UMUR</th>
                        <th width="20%">JENIS KELAMIN</th>
                        <th width="15%">RT/RW</th>
                        <th width="10%">STATUS</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=1; foreach($bantuans as $bantuan) { ?>

                <tr>
                    <td class="text-center">{{ $i }}</td>
                    <td><?php echo $bantuan->nama_penerima ?></td>
                    <td><?php echo $bantuan->umur ?></td>
                    <td><?php echo $bantuan->jenis_kelamin?></td>
                    <td><?php echo $bantuan->rt_kategori_bantuan ?></td>
                    <td><?php echo $bantuan->status ?></td>
                </tr>

                <?php $i++; } ?>

                </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>