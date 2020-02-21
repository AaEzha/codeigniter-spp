<h3><?=$data->kelas;?> - Tahun Pelajaran <?=$data->tahun;?>-<?=$data->tahun+1;?></h3>
<?=$this->session->flashdata('message');?>
<div class="row mt-3">
	<div class="col-4">
		<div class="card bg-default text-dark">
		  <div class="card-body">
		  	<form action="" method="post">
		  	  <input type="hidden" name="idkelas" id="inputIdkelas" class="form-control" value="<?=$idkelas;?>">
		  	  <div class="form-group">
		  	    <label for="inputAddress">Pilih Nama Siswa</label>
		  	    <select name="idsiswa" id="inputIdsiswa" class="form-control mb-2 select2" required="required">
			      	<?php foreach($calon as $calon) : ?>
			      	<option value="<?=$calon->id;?>"><?=$calon->nis;?> - <?=$calon->nama;?></option>
			      	<?php endforeach; ?>
			      </select>
		  	  </div>
		  	  
		  	  <button type="submit" class="btn btn-primary">Tambah</button>
		  	  <a href="<?=base_url('kelas');?>" class="btn btn-default">Kembali</a>
		  	</form>
		  </div>
		</div>
	</div>
	<div class="col-8">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-sm">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nama Siswa</th>
			      <th scope="col">JK</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; foreach($siswa as $siswa): ?>
			    <tr>
			      <th scope="row"><?=$no++;?></th>
			      <td><?=$siswa->nama;?></td>
			      <td><?=($siswa->jk=='L') ? 'Laki-laki' : 'Perempuan';?></td>
			      <td>
			      	<a href="<?=base_url('kelas/hps/'. $siswa->id.'/'.$idkelas);?>" class="btn btn-danger btn-sm">Hapus</a>
			      </td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>