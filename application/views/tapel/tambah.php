<form action="" method="post">
  <div class="form-group">
    <label for="tapel">Tahun Pelajaran</label>
    <input type="text" class="form-control" id="tapel" name="tahun" placeholder="Tahun Pelajaran">
    <?=form_error('tahun');?>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>