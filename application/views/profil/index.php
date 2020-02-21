<?=$this->session->flashdata('message');?>
<form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Username" value="<?=$this->session->username;?>" readonly>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="<?=$data->nama;?>">
    <?=form_error('nama');?>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" placeholder="Alamat Email" name="email" value="<?=$data->email;?>">
    <?=form_error('email');?>
  </div>
  <div class="form-group">
    <label for="nohp">No.Handphone</label>
    <input type="text" class="form-control" id="nohp" placeholder="No.Handphone" name="nohp" value="<?=$data->nohp;?>">
    <?=form_error('nohp');?>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>