
  <center><h1>Open Recruitment</h1></center>
  <br><br><br>
	

<div class="table">

  <table class="table" > 
  <tr>
  <?php if($_SESSION['status']==1||$_SESSION['status']==2){ ?>
  <td>
    <button   class="btn btn-primary" href="#">+ Buka Open Recruitment Baru</button>

  </td>
  <?php }?>
  <td></td>
  <td></td>
  <td></td>
  <td>   <form id="searchnav" method="post" action="<?= site_url('Homepage/searchuser') ?>">
  <!--<select  class="btn btn-primary dropdown-toggle" name="searchstat">
      <option value="0" >All</option>
      <option value="1" >Admin</option>
      <option value="2" >Operator</option>
      <option value="3" >Alumni</option>
      <option value="4" >Mahasiswa</option>
      <option value="5" >guest</option>
    </select> -->
    
</td>

  <td>
           <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Username......" name="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
    </td>

  </tr>
  </table>
  </div>

      

<div class="table">

  <table class="table" > 
  <thead class="thead-dark">
	<tr>
	<th scope="col" >ID</th>
	<th scope="col" >Nama Acara</th>
	<th  scope="col" >Deskripsi</th>
	<th scope="col" >Kategori</th>
  <th scope="col" >Tanggal Dibuat</th>
	<th scope="col" >Deadline Pendaftaran</th>
  <th scope="col" >Status</th>
  <th  scope="col" colspan="3">Aksi</th>
	</tr>
  </thead>
<!--
		
      <tbody  >
      <?php // foreach ($da as $r ) {?>
			<tr scope="row">

			<th><?php $a=$r['id']; echo $a;?></th>
			<td><?php echo $r['username'];?></td>
			<td><?php echo $r['pw'];?></td>
			<td>
        <?php if($r['status']==1)
        {echo 'Admin';}

        else if($r['status']==2)
        {echo 'Operator';}

        else if($r['status']==3)
        {echo 'Alumni';}

        else if($r['status']==4)
        {echo 'Mahasiswa';}

        else if($r['status']==5)
        {echo 'guest';}
        ?>
 
          
      </td> -->
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
      <td><a href="<?= site_url('Homepage') ;?>" >Daftar</td>
      <td><a href="<?= site_url('Homepage') ;?>" >Lihat Detail</td>
      <td><a href="<?= site_url('Homepage') ;?>" >Tutup</td>


		 





<?php //}
?>
      </tr>
      
</tbody>
	
	
	</table>
	</div>
<br><br>
