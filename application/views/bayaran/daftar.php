<div class="row">
	<div class="col-md-2">
		<a href="<?=base_url('bayaran/individu');?>" class="btn btn-primary mt-2">Cari Ulang</a>
	</div>
	<div class="col-md-10">
		<?=$this->session->flashdata('message');?>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm" id="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama Siswa</th>
	      <th scope="col">Kelas</th>
	      <th scope="col">Orang Tua</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach($siswa as $s) : ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=$s->nama;?></td>
	      <td><?=helper_kelas_nis($s->nis);?></td>
	      <td><?=$s->nama_ayah?> / <?=$s->nama_ibu;?></td>
	      <td>
	      	<a href="<?=base_url('bayaran/detail/'.$s->nis);?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Lihat Data</a>
	      </td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>