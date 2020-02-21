<form action="" method="post">
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off" autofocus="on" value="<?=set_value('username');?>">
      <?=form_error('username');?>
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?=set_value('password');?>">
    </div>
  </div>

  <div class="form-group row">
  	<label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
  	<div class="col-sm-10">
  		<input type="text" name="nama" id="inputNama" class="form-control" value="" placeholder="Nama Lengkap" value="<?=set_value('nama');?>">
      <?=form_error('nama');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  	<div class="col-sm-10">
  		<input type="text" name="email" id="inputEmail" class="form-control" value="" placeholder="Alamat Email" value="<?=set_value('email');?>">
      <?=form_error('email');?>
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNohp" class="col-sm-2 col-form-label">No.Handphone</label>
  	<div class="col-sm-10">
  		<input type="text" name="nohp" id="inputNohp" class="form-control" value="" placeholder="Nomor Handphone" value="<?=set_value('nohp');?>">
      <?=form_error('nohp');?>
  	</div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <a href="<?=base_url('guru');?>" class="btn btn-default">Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>