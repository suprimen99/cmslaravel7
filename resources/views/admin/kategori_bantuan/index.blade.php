<p>
@include('admin/kategori_bantuan/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="25%">NAMA KATEGORI</th>
    <th width="25%">SLUG</th>
    <th width="10%">NO URUT</th>
    <th></th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_bantuan as $kategori_bantuan) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_bantuan->rt_kategori_bantuan ?></td>
    <td><?php echo $kategori_bantuan->slug_kategori_bantuan ?></td>
    <td><?php echo $kategori_bantuan->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_bantuan->id_kategori_bantuan ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_bantuan/delete/'.$kategori_bantuan->id_kategori_bantuan) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_bantuan/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>