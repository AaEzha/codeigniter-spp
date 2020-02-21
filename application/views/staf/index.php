<?=$this->session->flashdata('message');?>

<div class="row">
	
	<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumadmin;?> admin</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-diagnoses fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Staf</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumstaf;?> staf</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comment-dollar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Guru</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumguru;?> guru</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book-reader fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Siswa</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumsiswa;?> siswa</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>