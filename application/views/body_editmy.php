 <script type="text/javascript">
 	$(document).ready(function()
	 	{
	 		//$("#errordiv").attr('style','display:none');
	 		$('#uploadfotoform').on('submit',function(event)
 			{
 				event.preventDefault();
 				var formData = new FormData(this);
 				var regex = /Error : /;
		        $.ajax(
		        {
		            type:'POST',
		            url: $(this).attr('action'),
		            data:formData,
		            cache:false,
		            dataType:"json",
		            contentType: false,
		            processData: false,
		            success:function(data)
		            {
		            	// var typeout;
		            	// if(!data.success)
		            	// {

		            	// 	typeout = 'warning';
		            	// 	var imglink = '<?=base_url()?>default.jpeg';
			            //     // $("#errordiv").attr('class','alert alert-warning');
			            // }
			            // else
			            // {
			            // 	typeout = 'success';
			            //     // $("#errordiv").attr('class','alert alert-success');

			            // }   
		            	var imglink = '<?=base_url('uploads/')?>'+data.src;
			            alertdlg(data.classtype,data.msg);
			            displayphoto(imglink);
			            alert(data.src);
			            $("#imgfilename").val(data.src);

			            // $("#errordiv").attr('style','display:block');
		             //    $("#errordisp").html(data);
		            },
		            error: function(data,status,thrown)
		            {
		            	alertdlg('danger',data.msg);
		            	alert(status);
		            	alert(thrown);
		                // $("#errordisp").html(data);
		                // $("#errordiv").attr('class','alert alert-success');
		                // $("#errordiv").attr('style','display:block');
		            }
		        });
 			});

	 		$('#uploadfoto').on('change',function(event)
	 		{
	 			$('#uploadfotoform').submit();
	 		});

	 		function alertdlg(type,msg)
	 		{
	 			var classtype = 'alert-'+type;
	 			var element = '<div id="errordiv" class="alert alert-'+type+'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong id="errordisp"></strong></div>';
	 			if($("#alertdiv").children().length == 0)
	 			{
	 				$("#alertdiv").append(element);
		 			$("#errordiv").attr('class','alert '+classtype);
		 			$("#errordiv").attr('style','display:block');
		 			//alert(msg);
		 			$("#errordisp").html(msg);
	 			}
	 			else
	 			{
		 			$("#errordiv").attr('class','alert '+classtype);
		 			$("#errordiv").attr('style','display:block');
		 			//alert(msg);
		 			$("#errordisp").html(msg);
		 		}
	 		}

	 		function displayphoto(imglink)
	 		{
	 			var elementphoto = '<img src="'+imglink+'" class="img-responsive">';
	 			$("#photodisplay").html(elementphoto);
	 		}
	 	});
 </script> 
  <center><h1>Edit MyProfile</h1></center>
  <br>
  <div id="alertdiv">
  	<!-- <div id="errordiv">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<strong id="errordisp"></strong>
	</div> -->
</div>
  <br><br>
	

<form  id="uploadfotoform" method="post" action="<?= site_url('Homepage/uploadphoto') ?>" enctype="multipart/form-data">
	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">
		<div id="photodisplay">
		</div>
		Upload Gambar
		<input type="file" id="uploadfoto" name="poto"/>
	</div>
	</div>
	<br><br>
</form>
<form method="post" action="<?=site_url('Homepage/editmyproc')?>">
	<div class="row">

		<div class="col-sm-4"></div>
		<div class="col-sm-2">

				Image Filename(Readonly)
		</div>	
		<div class="col-sm-4">
			<input type="text" class="form-control" name="imgfilename" id="imgfilename" placeholder="servername" value="none" readonly />
			<input type="hidden" name="id"  value="<?php echo $da[0]['id_user'];?>"  />
		</div>
	</div>
	<div class="row">

		<div class="col-sm-4"></div>
		<div class="col-sm-2">

				Username
		</div>	
		<div class="col-sm-4">
			<input type="text" name="userna" placeholder="contoh:abc123" value="<?php  
			echo $da[0]['username'];?>" class="form-control" />
		</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			NIM
	</div>	
	<div class="col-sm-4">
			<input type="text" name="nim" placeholder="contoh:11140910000001" value="<?php  
			echo $da[0]['NIM'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Nama Lengkap
	</div>	
	<div class="col-sm-4">
			<input type="text" name="nama" placeholder="contoh: abc udiniyah" value="<?php  
			echo $da[0]['nama'];?>" class="form-control" />

	</div>
	</div>
	<br><br>


	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">
	Masukan Password Lama
		
	</div>
	<div class="col-sm-4">
		<input type="password" name="passlama" placeholder="kosongkan jika tidak mau diganti"  class="form-control" />

	</div>
	</div>

	<br><br>
	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

	Masukan Password Baru
			 
	</div>

	<div class="col-sm-4">
		<input type="password" name="passwordbaru" placeholder="kosongkan jika tidak mau diganti" class="form-control">
	</div>
	</div>
	<br><br>


	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

	Jenis Kelamin
			 
	</div>
	<div class="col-sm-4">
		<select class="btn btn-primary dropdown-toggle" name="jkelamin">
			<?php 
			if($da[0]['jenis_kelamin']=='1'){?>
				 <option value="1" >Laki-Laki</option>
				 <option value="2" >Perempuan</option>
	    
			
				<?php }
				 else if($da[0]['status']=='2'){?>
	      <option value="2" >Perempuan</option>
				 <option value="1" >Laki-Laki</option>
	     
				<?php ; } 
				else{?>
					<option value="1" >Laki-Laki</option>
				 <option value="2" >Perempuan</option>
				<?php ;}?>
		
			</select>
	</div>
	</div>
	<br><br>


	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Angkatan
	</div>	
	<div class="col-sm-4">
			<input type="text" name="angkatan" placeholder="contoh:2014" value="<?php  
			echo $da[0]['angkatan'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Tanggal Lahir
	</div>	
	<div class="col-sm-4">
			<input type="date" name="tgllahir" value="<?php  
			echo $da[0]['tgl_lahir'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<?php if($da[0]['status']==3){ ?>
	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Pekerjaan
	</div>	
	<div class="col-sm-4">
			<input type="text" name="pekerjaan" value="<?php  
			echo $da[0]['pekerjaan'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<?php }?>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			No. Handphone
	</div>	
	<div class="col-sm-4">
			<input type="text" name="nohp" placeholder="contoh:0812345678" value="<?php  
			echo $da[0]['no_hp'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Alamat
	</div>	
	<div class="col-sm-4">
			<input type="text" name="alamat" placeholder="contoh:Jl. haseme no.4 kel.lolo kec.loloko kota loko" value="<?php  
			echo $da[0]['alamat'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Email(pribadi)
	</div>	
	<div class="col-sm-4">
			<input type="email" name="email" placeholder="contoh:abc@gmail.com" value="<?php  
			echo $da[0]['email'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Email Mahasiswa(dari UIN)
	</div>	
	<div class="col-sm-4">
			<input type="email" name="emailmhs" placeholder="contoh: abc.udiniyah14@mhs.uinjkt.ac.id" value="<?php  
			echo $da[0]['email_mhs'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-2">

			Social Media
	</div>	
	<div class="col-sm-4">
			<input type="text" name="sosmed" placeholder="contoh: facebook:abcudin, ig:abcudiniya14" value="<?php  
			echo $da[0]['sosmed'];?>" class="form-control" />

	</div>
	</div>
	<br><br>

	<br><br><br>
	<div class="row">

	<div class="col-sm-6"></div>
	<div class="col-sm-2">
	<input class="btn btn-default" type="reset" name="reset"></div>
	<div class="col-sm-2">

	<input class="btn btn-success" type="submit" name="submit" value="Simpan" />

	</div>
</form>
<a class="btn btn-danger" style="color:white;" href="<?=site_url('Homepage/MyProfile') ?>">Batal</a> 

</div>


</div>

<br><br>