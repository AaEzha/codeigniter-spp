<?=$this->session->flashdata('message');?>
<form action="" method="post">
  <div class="form-group">
    <label for="nis">NIS</label>
      <input type="text" class="form-control" id="nis" placeholder="Username" value="<?=$this->session->nis;?>" readonly>
  </div>
  <div class="form-group">
    <label for="nisn">NISN</label>
    <input type="text" class="form-control" id="nisn" placeholder="NISN" name="nisn" value="<?=$data->nisn;?>">
    <?=form_error('nisn');?>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="<?=$data->nama;?>">
    <?=form_error('nama');?>
  </div>
  <div class="form-group">
    <label for="nohp">No.Handphone</label>
    <input type="text" class="form-control" id="nohp" placeholder="No.Handphone" name="nohp" value="<?=$data->nohp;?>">
    <?=form_error('nohp');?>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" placeholder="Alamat Email" name="email" value="<?=$data->email;?>">
    <?=form_error('email');?>
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat" value="<?=$data->alamat;?>">
    <?=form_error('alamat');?>
  </div>
  <div class="form-group">
    <label for="nama_ayah">Nama Ayah</label>
    <input type="text" class="form-control" id="nama_ayah" placeholder="Nama Ayah Lengkap" name="nama_ayah" value="<?=$data->nama_ayah;?>">
    <?=form_error('nama_ayah');?>
  </div>
  <div class="form-group">
    <label for="nohp_ayah">No.Handphone Ayah</label>
    <input type="text" class="form-control" id="nohp_ayah" placeholder="No.Handphone Ayah" name="nohp_ayah" value="<?=$data->nohp_ayah;?>">
    <?=form_error('nohp_ayah');?>
  </div>
  <div class="form-group">
    <label for="nama_ibu">Nama Ibu</label>
    <input type="text" class="form-control" id="nama_ibu" placeholder="Nama Ibu Lengkap" name="nama_ibu" value="<?=$data->nama_ibu;?>">
    <?=form_error('nama_ibu');?>
  </div>
  <div class="form-group">
    <label for="nohp_ibu">No.Handphone Ibu</label>
    <input type="text" class="form-control" id="nohp_ibu" placeholder="No.Handphone Ibu" name="nohp_ibu" value="<?=$data->nohp_ibu;?>">
    <?=form_error('nohp_ibu');?>
  </div>
  <div class="form-group">
    <label for="email_ortu">Email Orang Tua</label>
    <input type="text" class="form-control" id="email_ortu" placeholder="Alamat Email" name="email_ortu" value="<?=$data->email_ortu;?>">
    <?=form_error('email_ortu');?>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>