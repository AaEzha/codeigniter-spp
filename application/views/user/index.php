<?=$this->session->flashdata('message');?>

<a href="<?=base_url('user/tambah');?>" class="btn btn-primary mb-2">Tambah Data</a>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm" id="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Username</th>
	      <th scope="col">Level</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=$data->nama;?></td>
	      <td><?=$data->username;?></td>
	      <td><?=$data->level;?></td>
	      <td>
	      	<a href="<?=base_url('user/ubah/'.$data->id);?>" class="btn btn-primary btn-sm">Ubah</a>
	      	<a href="<?=base_url('user/hapus/'.$data->id);?>" class="btn btn-danger btn-sm">Hapus</a>
	      </td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>