<?=$this->session->flashdata('message');?>

<form class="form-inline" action="<?=base_url('bayaran/laporan');?>" method="post">
	
  <label class="sr-only" for="datepicker">Tgl 1</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="datepicker" name="dari" placeholder="Dari Tanggal">
	
  <label class="sr-only" for="datepicker2">Tgl 2</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="datepicker2" name="ke" placeholder="Sampai Tanggal">

  <button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
</form>