<?=$this->session->flashdata('message');?>
<form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Username" value="<?=$this->session->username;?>" readonly>
  </div>
  <div class="form-group">
    <label for="password">Password Lama</label>
    <input type="text" class="form-control" id="password" placeholder="Password Lama" name="password">
    <?=form_error('password');?>
  </div>
  <div class="form-group">
    <label for="passbaru">Password Baru</label>
    <input type="text" class="form-control" id="passbaru" placeholder="Password Baru" name="passbaru">
    <?=form_error('passbaru');?>
  </div>
  <div class="form-group">
    <label for="passkonf">Konfirmasi Password</label>
    <input type="password" class="form-control" id="passkonf" placeholder="Password Baru (Konfirmasi)" name="passkonf">
    <?=form_error('passkonf');?>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>