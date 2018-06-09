
  <center><h1>Profil Akun</h1></center>
  

	
  <div class="col-sm-2">
<?php if($_SESSION['id']==$da[0]['id']){?>
<a   class="btn btn-primary" href="<?= site_url('Homepage/editmy') ?>">Edit Profile</a>
<br><br><?php } ?>
  </div>
</div>



      <div class="form-group">
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Username</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['username']; ?></h5>
  </div>
</div>

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>NIM</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['NIM']; ?></h5>
  </div>
</div>

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Nama Lengkap</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['nama']; ?></h5>
  </div>
</div>
	
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Jenis Kelamin</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?php if($da[0]['jenis_kelamin']==1){echo "Laki-Laki";}
      elseif($da[0]['jenis_kelamin']==2){echo "Perempuan";}
       ?></h5>
      </div>
</div>

 
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Angkatan</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['angkatan']; ?></h5>
  </div>
</div> 


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Tanggal Lahir</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['tgl_lahir']; ?></h5>
  </div>
</div>

<?php if($da[0]['status']==3){ ?>

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Pekerjaan</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['pekerjaan']; ?></h5>
  </div>
</div>
<?php } ?>  

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>No. Handphone</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['no_hp']; ?></h5>
  </div>
</div>


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Alamat</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['alamat']; ?></h5>
  </div>
</div>


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Email</b></h5>  
  </div>
  <div class="col-sm-2">
  <h5>: <?= $da[0]['email']; ?></h5>
  </div>
</div>


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Email Mhs</b></h5>  
  </div>
  <div class="col-sm-3">
  <h5>: <?= $da[0]['email_mhs']; ?></h5>
  </div>
</div>


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
  <h5><b>Sosial Media</b></h5>  
  </div>
 
  <div class="col-sm-2">
  <h5>: <?= $da[0]['sosmed']; ?></h5>
  </div>
</div>


</div>
<br><br><br>