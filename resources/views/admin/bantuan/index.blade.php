<div class="col-md-6">
    <form action="{{ asset('admin/bantuan/cari') }}" method="get" accept-charset="utf-8">
    <br>
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci pencarian nama...." value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-btn btn-flat">
        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
      </span>
    </div>
    </form>
  </div>
</br>
<form action="{{ asset('admin/bantuan/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<p class="btn-group">
  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button> 
  <a href="{{ asset('admin/bantuan/tambah') }}" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Data Bantuan</a>
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
    <th width="25%">NAMA</th>
    <th width="15%">NIK</th>
    <th width="20%">JENIS KELAMIN</th>
    <th width="10%">RT/RW</th>
    <th width="10%">UMUR</th>
    <th width="10%">STATUS</th>
    <th width="10%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($bantuan as $bantuan) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_bantuan[]" value="<?php echo $bantuan->id_bantuan ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td><?php echo $bantuan->nama_penerima ?>
    </td>
    <td><?php echo $bantuan->nik ?>
    </td>
    <td><?php echo $bantuan->jenis_kelamin ?>
    </td>
    <td><?php echo $bantuan->rt_kategori_bantuan ?>
    </td>
    <td><?php echo $bantuan->umur ?>
    </td>
    <td><?php echo $bantuan->status ?>
    </td>
    <td>
      <div class="btn-group">
        <a href="{{ asset('admin/bantuan/edit/'.$bantuan->id_bantuan) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="{{ asset('admin/bantuan/delete/'.$bantuan->id_bantuan) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

</form>