<div class="table-responsive mt-2 mb-3">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th colspan="2">Biodata Siswa</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td>Nama</td>
	      <td><?=$siswa->nama;?> - <?=$siswa->nis;?> (<?=$siswa->nama_ayah;?> / <?=$siswa->nama_ibu;?>)</td>
	    </tr>
	    <tr>
	      <td>Kelas</td>
	      <td><?=helper_kelas_nis($siswa->nis);?></td>
	    </tr>
	  </tbody>
	</table>
</div>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Jenis Bayaran</th>
	      <th scope="col">Jumlah</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $jumlah=0; $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=date_indo($data->dtmcrt);?></td>
	      <td><?=$data->nama;?></td>
	      <td><?=number_format($data->total,'0',',','.');?></td>
	      <td>
	      	<a href="<?=base_url('bayaran/hapus/'.$data->id);?>" class="btn btn-danger btn-sm">hapus</a>
	      </td>
	    </tr>
	    <?php $jumlah = $jumlah+$data->total; endforeach; ?>
	  	<tr>
	  		<td colspan="3" class="text-right"><strong>Total</strong></td>
	  		<td colspan="2"><strong><?=number_format($jumlah,'0',',','.');?></strong></td>
	  	</tr>
	  </tbody>
	</table>
</div>