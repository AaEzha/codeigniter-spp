<?=$this->session->flashdata('message');?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col" colspan="2">Detail Pembayaran</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row" class="text-right col-md-3">Nama Siswa</th>
	      <td><?=helper_nama_nis($nis);?></td>
	    </tr>
	    <tr>
	      <th scope="row" class="text-right">Kelas</th>
	      <td><?=helper_kelas_nis($nis);?></td>
	    </tr>
	    <tr>
	      <th scope="row" class="text-right col-md-3">Yang harus dibayar</th>
	      <td><?=number_format($total,'0',',','.');?></td>
	    </tr>
	    <tr>
	      <th scope="row" class="text-right">Dibayar</th>
	      <td><?=number_format($bayar,'0',',','.');?></td>
	    </tr>
	    <tr>
	      <th scope="row" class="text-right">Kembalian</th>
	      <td><h1><?=number_format($bayar-$total,'0',',','.');?></h1></td>
	    </tr>
	    <!-- <tr>
	      <th scope="row" class="text-right">Cetak Struk</th>
	      <td>
	      	<a href="<?=base_url('keuangan/cetak/'.$nis);?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
	      </td>
	    </tr> -->
	  </tbody>
	</table>
</div>