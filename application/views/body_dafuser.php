
  <center><h1>Daftar User</h1></center>
  <br><br><br>
	

<div class="table">

  <table class="table" > 
  <tr>
  <td>
    <button   class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Tambah user</button>

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <div class="modal-content">
    <div class="modal-header" style="background-color:blue; color:white;">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <center><h4 class="modal-title" >Tambah User</h4></center>
    </div>
    
    <div class="modal-body">
    <form method="post" action="<?= site_url('Homepage/insert') ?>">
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-2">Username</div>
    <div class="col-sm-4"> 
    <input type="text" name="usern" class="form-control" />
    </div>
    </div>

    <br><br>
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-2">Password</div>
    <div class="col-sm-4">
    <input type="text" name="passw" class="form-control" />
    </div>
    </div>

    <br><br>
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-2">Level</div>
    <div class="col-sm-4">    
    <select class="btn btn-primary dropdown-toggle" name="statuss">
      <option value="1" >Admin</option>
      <option value="2" >Operator</option>
      <option value="3" >Alumni</option>
      <option value="4" >Mahasiswa</option>
      <option value="5" >guest</option>
    </select> 
    
    </div>
    </div>

    <br><br><br>
    <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-2">
      <input class="btn btn-success" type="submit" name="submit" value="Tambah" />
    </div>
    </div>
    </form>
    </div>
    
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
      </div>
  </div>
  </div>

  </td>
  <td></td>
  <td></td>
  <td></td>
  <td>   <form id="searchnav" method="post" action="<?= site_url('Homepage/searchuser') ?>">
  <select  class="btn btn-primary dropdown-toggle" name="searchstat">
      <option value="0" >All</option>
      <option value="1" >Admin</option>
      <option value="2" >Operator</option>
      <option value="3" >Alumni</option>
      <option value="4" >Mahasiswa</option>
      <option value="5" >guest</option>
    </select> 
    
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
	<th scope="col" >Username</th>
	<th  scope="col" >Password</th>
	<th scope="col" >Status</th>
	<th  scope="col" colspan="2">Aksi</th>
	</tr>
  </thead>

		
      <tbody  >
      <?php  foreach ($da as $r ) {?>
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
 
          
      </td>
			<td><a href="<?= site_url('Homepage/viewedit/').$r['id'] ;?>" >Edit</td>

      <td><a href="<?= site_url('Homepage/MyProfile/').$r['id'] ;?>" >Lihat Detail</td>
      

		 	<td> <a  onclick="return confirm('Yakin ingin menghapus akun <?php echo $r['username']; ?> ?');"  href="<?= site_url('Homepage/delete/').$r['id'] ;?>"  >Delete</td>





<?php }
?>
      </tr>
      
</tbody>
	
	
	</table>
	</div>
<br><br>
