<?=$this->session->flashdata('message');?>

<form action="" method="post">
  <input type="hidden" name="idtapel" id="inputIdtapel" class="form-control" value="<?=$idtapel;?>">
  <div class="form-group">
    <label for="kelas">Nama Kelas</label>
    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Misal: IX-1, X-2, XI-3">
    <?=form_error('kelas');?>
  </div>
  <div class="form-group">
    <label for="inputState">Wali Kelas</label>
  	<select id="inputState" class="form-control select2" name="idguru">
    	<option value="" selected>Pilih Guru...</option>
    	<?php foreach($guru as $guru): ?>
    	<option value="<?=$guru->id;?>"><?=$guru->nama;?></option>
    	<?php endforeach; ?>
  	</select>
    <?=form_error('idguru');?>
  </div>
  <a href="<?=base_url('kelas');?>" class="btn btn-default">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>