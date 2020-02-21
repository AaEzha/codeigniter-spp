<form action="" method="post">
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off" autofocus="on">
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Level</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="idlevel" id="idlevel1" value="1">
          <label class="form-check-label" for="idlevel1">
            Administrator
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="idlevel" id="idlevel2" value="2">
          <label class="form-check-label" for="idlevel2">
            Staf Tata Usaha
          </label>
        </div>
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
  	<label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
  	<div class="col-sm-10">
  		<input type="text" name="nama" id="inputNama" class="form-control" value="" placeholder="Nama Lengkap">
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  	<div class="col-sm-10">
  		<input type="text" name="email" id="inputEmail" class="form-control" value="" placeholder="Alamat Email">
  	</div>
  </div>

  <div class="form-group row">
  	<label for="inputNohp" class="col-sm-2 col-form-label">No.Handphone</label>
  	<div class="col-sm-10">
  		<input type="text" name="nohp" id="inputNohp" class="form-control" value="" placeholder="Nomor Handphone">
  	</div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <a href="<?=base_url('user');?>" class="btn btn-default">Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>