<div class="col-md-6">
    <form action="{{ asset('admin/warga/cari') }}" method="get" accept-charset="utf-8">
        <br>
        <div class="input-group">
            <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci pencarian nama...."
                value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
            <span class="input-group-btn btn-flat">
                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
            </span>
        </div>
    </form>
</div>
</br>
<form action="{{ asset('admin/warga/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}
    <p class="btn-group">
        <button class="btn btn-danger" type="submit" name="hapus" onClick="check();">
            <i class="fas fa-trash-alt"></i>
        </button>
        <a href="{{ asset('admin/warga/cetak') }}" class="btn btn-warning ">
            <i class="fas fa-solid fa-print"></i> Cetak Data Warga</a>
        <a href="{{ asset('admin/warga/tambah') }}" class="btn btn-success ">
            <i class="fa fa-plus"></i> Tambah Data Warga</a>
    </p>



    <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-info">
                <tr class="bg-dark">
                    <th width="5%">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                        </div>
                    </th>
                    <th width="20%">NAMA</th>
                    <th width="30%">NIK</th>
                    <th width="5%">JENIS KELAMIN</th>
                    <th width="5%">TEMPAT LAHIR</th>
                    <th width="5%">TANGGAL LAHIR</th>
                    <th width="5%">AGAMA</th>
                    <th width="10%">PENDIDIKAN</th>
                    <th width="10%">JENIS PEKERJAAN</th>
                    <th width="5%">GOLONGAN DARAH</th>
                    <th width="5%">ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($warga as $warga) { ?>

                <tr>
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" class="icheckbox_flat-blue " name="id_warga[]"
                                value="<?php echo $warga->id_warga ?>">
                            <label for="check<?php echo $i ?>"></label>
                        </div>
                    </td>
                    <td><?php echo $warga->nama ?>
                    </td>
                    <td><?php echo $warga->nik ?>
                    </td>
                    <td><?php echo $warga->jenis_kelamin ?>
                    </td>
                    <td><?php echo $warga->tempat_lahir ?>
                    </td>
                    <td><?php echo $warga->tanggal_lahir ?>
                    </td>
                    <td><?php echo $warga->agama ?>
                    </td>
                    <td><?php echo $warga->pendidikan ?>
                    </td>
                    <td><?php echo $warga->jenis_pekerjaan ?>
                    </td>
                    <td><?php echo $warga->gol_darah ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ asset('admin/warga/edit/'.$warga->id_warga) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ asset('admin/warga/delete/'.$warga->id_warga) }}"
                                class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>

                <?php $i++; } ?>

            </tbody>
        </table>
    </div>

</form>