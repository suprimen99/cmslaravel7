<p class="text-right">
	<a href="{{ asset('admin/warga') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/warga/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row form-group">
<label class="col-md-3">Nama Warga</label>
<div class="col-md-9">
<input type="text" name="nama" class="form-control" placeholder="Nama Warga" value="{{ old('nama') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">NIK</label>
<div class="col-md-9">
<input type ="text" name="nik" class="form-control" placeholder="NIK" value= "{{ old('nik')  }}">
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
<label class="col-md-3">Tempat Lahir</label>
<div class="col-md-9">
<input type ="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value= "{{ old('tempat_lahir')  }}">
</div>
</div>
<div class="row form-group">
<label class="col-md-3">Tanggal Lahir</label>
<div class="col-md-9">
<input type ="date" name=" tanggal_lahir" class="form-control" placeholder=" Tanggal Lahir" value= "{{ old(' tanggal_lahir')  }}">
</div>
</div>
<div class="row form-group">
<label class="col-md-3">Agama</label>
<div class="col-md-9">
<select name="agama" class="form-control">
	<option value="Islam">Islam</option>
	<option value="Katolik">Katolik</option>
	<option value="Kristen Protestan">Kristen Protestan</option>
	<option value="Hindu">Hindu</option>
	<option value="Budha">Budha</option>
	<option value="Konghucu">Konghucu</option>}
</select>
</div>
</div>
<div class="row form-group">
<label class="col-md-3">Pendidikan Terakhir</label>
<div class="col-md-9">
<input type ="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" value= "{{ old('pendidikan')  }}">
</div>
</div>
<div class="row form-group">
<label class="col-md-3">Jenis Pekerjaan</label>
<div class="col-md-9">
<input type ="text" name="jenis_pekerjaan" class="form-control" placeholder="Jenis Pekerjaan" value= "{{ old('jenis_pekerjaan')  }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Golongan Darah</label>
<div class="col-md-9">
<input type ="text" name="gol_darah" class="form-control" placeholder="Golongan Darah" value= "{{ old('gol_darah')  }}">
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