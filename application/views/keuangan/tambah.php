<form method="post" action="">
  <div class="form-group">
    <label for="nama">Nama Bayaran</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bayaran" autofocus="on" autocomplete="off">
    <?=form_error('nama');?>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="lokera">Pos 1</label>
      <input type="text" class="form-control" id="lokera" name="lokera" placeholder="Nominal Pos 1" autocomplete="off">
      <?=form_error('lokera');?>
    </div>
    <div class="form-group col-md-6">
      <label for="lokerb">Pos 2</label>
      <input type="text" class="form-control" id="lokerb" name="lokerb" placeholder="Nominal Pos 2" autocomplete="off">
      <?=form_error('lokerb');?>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?=base_url('keuangan');?>" class="btn btn-default">Kembali</a>
</form>