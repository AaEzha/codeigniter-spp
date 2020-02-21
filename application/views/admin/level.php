<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama Level</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach($data as $data): ?>
	    <tr>
	      <th scope="row"><?=$no++;?></th>
	      <td><?=$data->level;?></td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>