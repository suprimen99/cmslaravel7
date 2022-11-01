<p class="text-right">
	<a href="{{ asset('admin/bantuan') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/bantuan/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row form-group">
<label class="col-md-3">Nama Penerima Bantuan</label>
<div class="col-md-9">
<input type="text" name="nama_penerima" class="form-control" placeholder="Nama Penerima Bantuan" value="{{ old('nama_penerima') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Jenis Kelamin</label>
<div class="col-md-9">
<select name="jenis_kelamin" class="form-control">
	<option value="Laki-Laki">Laki-Laki</option>
	<option value="Perempuan">Perempuan</option>}
</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3">RT/RW</label>
<div class="col-md-9">
<select name="id_kategori_bantuan" class="form-control">

	<?php foreach($kategori_bantuan as $kategori_bantuan) { ?>
	<option value="<?php echo $kategori_bantuan->id_kategori_bantuan ?>"><?php echo $kategori_bantuan->rt_kategori_bantuan ?></option>
	<?php } ?>

</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3">NIK</label>
<div class="col-md-9">
<input type ="text" name="nik" class="form-control" placeholder="NIK" value= "{{ old('nik')  }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Umur</label>
<div class="col-md-9">
<input type="text" name="umur" class="form-control" placeholder="Umur" value="{{ old('umur') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Status Penerima Bantuan</label>
<div class="col-md-9">
<input type="text" name="status" class="form-control" placeholder="Status Penerima Bantuan" value="{{ old('status') }}">
</div>
</div>

<div class="row form-group">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-info " value="Reset">
		</div>
	</div>
</div>
</form>