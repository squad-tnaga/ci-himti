  <center><h1>Edit Data</h1></center>
  <br><br><br>
	

<form  method="post" action="<?= site_url('Homepage/edits') ?>">

<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-2">

		Username
</div>	
<div class="col-sm-4">
		<input type="hidden" name="id" value="<?php echo $n ;?>">
		<input type="text" name="userna" value="<?php  
		echo $da[0]['username'];?>" class="form-control" />

</div>
</div>
<br><br>


<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-2">
Password
	
</div>
<div class="col-sm-4">
	<input type="text" name="passwo" value="<?php  
		echo $da[0]['pw'];?>" class="form-control" />

</div>
</div>

<br><br>
<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-2">

Level
		 
</div>
<div class="col-sm-4">
	<select class="btn btn-primary dropdown-toggle" name="statuss">
		<?php 
		if($da[0]['status']=='1'){?>
			 <option value="1" >Admin</option>
			 <option value="2" >Operator</option>
	      		<option value="3" >Alumni</option>
      			<option value="4" >Mahasiswa</option>
      			<option value="5" >guest</option>
    
		
			<?php }
			 else if($da[0]['status']=='2'){?>
      <option value="2" >Operator</option>
			 <option value="1" >Admin</option>
      <option value="3" >Alumni</option>
      <option value="4" >Mahasiswa</option>
      <option value="5" >guest</option>
    
			<?php  } 
			 else if($da[0]['status']=='3'){?>
      <option value="3" >Alumni</option>
			 <option value="1" >Admin</option>
      <option value="2" >Operator</option>
      <option value="4" >Mahasiswa</option>
      <option value="5" >guest</option>
    
			<?php ; } 
			 else if($da[0]['status']=='4'){?>
      <option value="4" >Mahasiswa</option>
			 <option value="1" >Admin</option>
      <option value="2" >Operator</option>
      <option value="3" >Alumni</option>
      <option value="5" >guest</option>

			<?php ; }
			 else if($da[0]['status']=='5'){?>
      <option value="5" >guest</option>
			 <option value="1" >Admin</option>
      <option value="2" >Operator</option>
      <option value="3" >Alumni</option>
      <option value="4" >Mahasiswa</option>
    
			<?php ; } ?>
	
		</select>
</div>
</div>



<br><br><br>
<div class="row">

<div class="col-sm-6"></div>
<div class="col-sm-2">

<div class="col-sm-2">
<input class="btn btn-success" type="submit" name="submit" value="Simpan" />

</div>


</div>

</form>
<a class="btn btn-danger" style="color:white;" href="<?=site_url('Homepage/dafuser') ?>">Batal</a> 
</div>

<br><br>