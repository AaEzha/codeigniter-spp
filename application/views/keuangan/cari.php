<div class="mt-3"><?=$this->session->flashdata('message');?></div>
<?=validation_errors('<div class="alert alert-danger mt-3" role="alert">','</div>');?>
<form class="form-inline mt-3" method="post" action="">
  <label class="sr-only" for="nis">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="nis" name="nis" placeholder="Nama Siswa atau NIS" autocomplete="off" autofocus="on">

  <button type="submit" class="btn btn-primary mb-2">Cari</button>
</form>