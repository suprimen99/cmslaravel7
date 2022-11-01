
<div class="modal fade" id="Edit<?php echo $kategori_bantuan->id_kategori_bantuan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Edit data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form action="{{ asset('admin/kategori_bantuan/edit') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_kategori_bantuan" value="{{ $kategori_bantuan->id_kategori_bantuan }}">
<div class="form-group row">
	<label class="col-md-3">RT/RW</label>
	<div class="col-md-9">
		<input type="text" name="rt_kategori_bantuan" class="form-control" placeholder="RT/RW" value="<?php echo $kategori_bantuan->rt_kategori_bantuan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Nomor urut</label>
	<div class="col-md-9">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_bantuan->urutan ?>" required>
</div>
</div>

<div class="form-group row">
	<label class="col-md-3"></label>
	<div class="col-md-9">
<div class="btn-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>

<div class="clearfix"></div>

</form>

</div>
</div>
</div>
</div>
