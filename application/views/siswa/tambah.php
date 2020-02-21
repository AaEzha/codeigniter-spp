<form action="" method="post">
  
  <div class="form-group row">
  	<label for="inputNisn" class="col-sm-3 col-form-label">NISN</label>
  	<div class="col-sm-9">
  		<input type="text" name="nisn" id="inputNisn" class="form-control" value="" placeholder="N I S N">
  		<?=form_error('nisn');?>
  	</div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap <sup>(wajib diisi)</sup></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" autocomplete="off" autofocus="on">
      <?=form_error('nama');?>
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin <sup>(wajib diisi)</sup></legend>
      <div class="col-sm-9">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jk" id="jk1" value="L" checked>
          <label class="form-check-label" for="jk1">
            Laki-laki
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jk" id="jk2" value="P">
          <label class="form-check-label" for="jk2">
            Perempuan
          </label>
        </div>
      </div>
      <?=form_error('jk');?>
    </div>
  </fieldset>

  <div class="form-group row">
  	<label for="inputEmail" class="col-sm-3 col-form-label">Email Siswa <sup>(wajib diisi)</sup></label>
  	<div class="col-sm-9">
  		<input type="text" name="email" id="inputEmail" class="form-control" value="" placeholder="Email Siswa">
  		<?=form_error('email');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNohp" class="col-sm-3 col-form-label">No.Handphone</label>
  	<div class="col-sm-9">
  		<input type="text" name="nohp" id="inputNohp" class="form-control" value="" placeholder="Nomor Handphone Siswa">
  		<?=form_error('nohp');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputAlamat" class="col-sm-3 col-form-label">Alamat <sup>(wajib diisi)</sup></label>
  	<div class="col-sm-9">
  		<input type="text" name="alamat" id="inputAlamat" class="form-control" value="" placeholder="Alamat Lengkap">
  		<?=form_error('alamat');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNama_ayah" class="col-sm-3 col-form-label">Nama Ayah <sup>(wajib diisi)</sup></label>
  	<div class="col-sm-9">
  		<input type="text" name="nama_ayah" id="inputNama_ayah" class="form-control" value="" placeholder="Nama Lengkap Ayah">
  		<?=form_error('nama_ayah');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNohp_ayah" class="col-sm-3 col-form-label">No.HP Ayah</label>
  	<div class="col-sm-9">
  		<input type="text" name="nohp_ayah" id="inputNohp_ayah" class="form-control" value="" placeholder="No.Handphone Ayah">
  		<?=form_error('nohp_ayah');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="email_ortu" class="col-sm-3 col-form-label">Email Orang Tua <sup>(wajib diisi)</sup></label>
  	<div class="col-sm-9">
  		<input type="text" name="email_ortu" id="email_ortu" class="form-control" value="" placeholder="Email Orang Tua">
  		<?=form_error('email_ortu');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNama_ibu" class="col-sm-3 col-form-label">Nama Ibu <sup>(wajib diisi)</sup></label>
  	<div class="col-sm-9">
  		<input type="text" name="nama_ibu" id="inputNama_ibu" class="form-control" value="" placeholder="Nama Lengkap Ibu">
  		<?=form_error('nama_ibu');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNohp_ibu" class="col-sm-3 col-form-label">No.HP Ibu</label>
  	<div class="col-sm-9">
  		<input type="text" name="nohp_ibu" id="inputNohp_ibu" class="form-control" value="" placeholder="No.Handphone Ibu">
  		<?=form_error('nohp_ibu');?>
  	</div>
  </div>

  <div class="form-group row">
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>