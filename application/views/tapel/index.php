<?=$this->session->flashdata('message');?>

<a href="<?=base_url('tapel/tambah');?>" class="btn btn-primary mb-2">Tambah Data</a>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm" id="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tahun Pelajaran</th>
	      <th scope="col">Aktif</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=$data->tahun;?> - <?=$data->tahun+1;?></td>
	      <td><?=($data->aktif=='1')?'Aktif':'Tidak Aktif';?></td>
	      <td>
	      	<?php if($data->aktif=='0'){ ?>
	      	<a href="<?=base_url('tapel/aktifkan/'.$data->id);?>" class="btn btn-success btn-sm">Aktifkan</a>
	      	<?php } ?>
	      	<a href="<?=base_url('tapel/ubah/'.$data->id);?>" class="btn btn-primary btn-sm">Ubah</a>
	      	<a href="<?=base_url('tapel/hapus/'.$data->id);?>" class="btn btn-danger btn-sm">Hapus</a>
	      </td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>