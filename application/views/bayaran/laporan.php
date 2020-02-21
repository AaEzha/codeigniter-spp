<?=$this->session->flashdata('message');?>
<?php if($ke!=''){ ?>
<div class="alert alert-success" role="alert">Laporan dari <?=@date_indo($dari);?> <?=@date_indo($ke);?></div>
<?php }else{ ?>
<div class="alert alert-success" role="alert">Laporan tanggal <?=@date_indo($dari);?></div>
<?php } ?>
<a href="#" class="btn btn-success mb-2 d-print-none" onclick="javascript:window.print()"><i class="fa fa-print"></i> Cetak</a>
<a href="<?=base_url('bayaran');?>" class="btn btn-primary mb-2 d-print-none">Kembali</a>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#No</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Nama</th>
		  <th scope="col">Kelas</th>
	      <th scope="col">Jenis Bayaran</th>
	      <th scope="col">Jumlah</th>
	      <th scope="col" class="d-print-none">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $jumlah=0; $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=date_indo($data->dtmcrt);?></td>
	      <td><?=$data->siswa;?></td>
		  <td><?=helper_kelas_nis($data->nis);?></td>
	      <td><?=$data->nama;?></td>
	      <td><?=number_format($data->total,'0',',','.');?></td>
	      <td class="d-print-none">
	      	<a href="<?=base_url('bayaran/hapus/'.$data->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
	      </td>
	    </tr>
	    <?php $jumlah = $jumlah+$data->total; endforeach; ?>
	  	<tr>
	  		<td colspan="5" class="text-right"><strong>Total</strong></td>
	  		<td colspan="2"><strong><?=number_format($jumlah,'0',',','.');?></strong></td>
	  	</tr>
	  </tbody>
	</table>
</div>