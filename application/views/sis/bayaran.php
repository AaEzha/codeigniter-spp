<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Jenis Bayaran</th>
	      <th scope="col">Jumlah</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $jumlah=0; $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=date_indo($data->dtmcrt);?></td>
	      <td><?=$data->nama;?></td>
	      <td><?=number_format($data->total,'0',',','.');?></td>
	    </tr>
	    <?php $jumlah = $jumlah+$data->total; endforeach; ?>
	  	<tr>
	  		<td colspan="3" class="text-right"><strong>Total</strong></td>
	  		<td colspan="2"><strong><?=number_format($jumlah,'0',',','.');?></strong></td>
	  	</tr>
	  </tbody>
	</table>
</div>