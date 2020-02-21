<a href="<?=base_url('keuangan/tambah');?>" class="btn btn-primary mt-2 mb-2">Tambah Data</a>

<?=$this->session->flashdata('message');?>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm" id="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama Bayaran</th>
	      <th scope="col">Pos 1</th>
	      <th scope="col">Pos 2</th>
	      <th scope="col">Total</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach($data as $data) : ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=$data->nama;?></td>
	      <td><?=number_format($data->lokera,'0',',','.');?></td>
	      <td><?=number_format($data->lokerb,'0',',','.');?></td>
	      <td><?=number_format($data->lokera+$data->lokerb,'0',',','.');?></td>
	      <td>
	      	<a href="<?=base_url('keuangan/hapus/'.$data->id);?>" class="btn btn-danger btn-sm">hapus</a>
	      </td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>