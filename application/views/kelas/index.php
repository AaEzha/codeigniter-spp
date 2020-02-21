<p>Tahun Pelajaran <?=$tapel->tahun;?>-<?=$tapel->tahun+1;?></p>
<?=$this->session->flashdata('message');?>

<a href="<?=base_url('kelas/tambah/'.($tapel->id));?>" class="btn btn-primary mb-2">Tambah Data</a>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-sm table-striped" id="table">
	  <caption>List of users</caption>
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Kelas</th>
	      <th scope="col">Wali Kelas</th>
	      <th scope="col">Jumlah Siswa</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach($kelas as $kelas): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=$kelas->kelas;?></td>
	      <td><?=$kelas->nama;?></td>
	      <td><?=helper_jumlah_siswa($kelas->id);?></td>
	      <td>
	      	<a href="<?=base_url('kelas/detail/'.$kelas->id);?>" class="btn btn-success btn-sm">Detail</a>
	      	<a href="<?=base_url('kelas/hapus/'.$kelas->id);?>" class="btn btn-danger btn-sm">Hapus</a>
	      </td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>