<div class="table-responsive mt-2 mb-3">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col" colspan="2">Biodata Siswa</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row"><?=$siswa->nama;?> / <?=helper_kelas_nis($siswa->nis);?></th>
	      <td><?=$siswa->nis;?> (<?=$siswa->nama_ayah;?> / <?=$siswa->nama_ibu;?>)</td>
	    </tr>
	  </tbody>
	</table>
</div>

<div class="table-responsive mt-3">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col" class="text-right">#</th>
	      <th scope="col">Bayaran</th>
	      <th scope="col">Jumlah</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $total = 0; $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row" class="text-right"><?=$no++;?></th>
	      <td><?=$data->nama;?></td>
	      <td><?=number_format($data->total,'0',',','.');?></td>
	    </tr>
		<?php $total = $total + $data->total; endforeach; ?>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th scope="row" colspan="2" class="text-right">Total Tagihan</th>
			<td><strong><?=number_format($total,'0',',','.');?></strong></td>
		</tr>
	  </tbody>
	  <tfoot>
	  	<tr>
	  		<th scope="row" colspan="2" class="text-right">Yang Dibayarkan</th>
			<td>
				<form action="<?=base_url('keuangan/kembali');?>" method="post">
					<input type="hidden" name="total" id="inputTotal" class="form-control" value="<?=$total;?>">
					<input type="hidden" name="nis" id="inputNis" class="form-control" value="<?=$siswa->nis;?>">
					<input type="text" name="bayar" id="inputBayar" class="form-control" value="" placeholder="Nominal uang (tanpa titik/koma)" autocomplete="off" autofocus="on">
					<button type="submit" class="btn btn-success btn-sm btn-block mt-1"><i class="fa fa-dollar"></i> Bayar</button>
					<a href="<?=base_url('keuangan/input');?>" class="btn btn-danger btn-sm mt-1">Batal</a>
					
				</form>
			</td>
	  	</tr>
	  </tfoot>
	</table>
</div>