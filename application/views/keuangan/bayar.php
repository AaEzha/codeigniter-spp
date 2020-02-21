<div class="table-responsive mt-2 mb-3">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col" colspan="2">Biodata Siswa</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row">Nama</th>
	      <td><?=$siswa->nama;?> - <?=$siswa->nis;?> (<?=$siswa->nama_ayah;?> / <?=$siswa->nama_ibu;?>)</td>
	    </tr>
	    <tr>
	      <th scope="row">Kelas</th>
	      <td><?=helper_kelas_nis($siswa->nis);?></td>
	    </tr>
	  </tbody>
	</table>
</div>

<form action="<?=base_url('keuangan/checkout');?>" method="post">
	<input type="hidden" name="nis" id="inputNis" class="form-control" value="<?=$siswa->nis;?>">
	<input type="hidden" name="id" id="inputId" class="form-control" value="<?=$siswa->id;?>">
	<div class="row">
		<?php foreach($data as $data) : ?>
		<input type="hidden" name="lokera-<?=$data->id;?>" id="inputLokera-<?=$data->id;?>" class="form-control" value="<?=$data->lokera;?>">
		<input type="hidden" name="lokerb-<?=$data->id;?>" id="inputLokerb-<?=$data->id;?>" class="form-control" value="<?=$data->lokerb;?>">
		<div class="btn mb-1">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="<?=$data->id;?>" name="idbayaran[]">
					<?=$data->nama;?>
				</label>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<button type="submit" class="btn btn-primary btn-block">Proses Bayar</button>
</form>