<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Dosen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">   

<form action="dosenupdate.php" method="post">
     <?php 
      // terima nip dari halaman dosen
      $nip = $_GET['nip'];
      
      $query = mysql_query("select * from dosen where nip='$nip'");
      
      $data = mysql_fetch_array($query);
      ?>


        <div class="form-group">
            <label>NIP</label>
            <input class="form-control" name="nip" value="<?php echo $data['nip']; ?>" disabled>
        </div>

        <div class="form-group">
            <label>Nama Dosen</label>
            <input class="form-control" name="nama_dosen" value="<?php echo $data['nama_dosen']; ?>"required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" name="alamat_dosen"  rows="3" value="<?php echo $data['alamat_dosen']; ?>"required>
        </div>


          <div class="form-group">
          <label>Status</label>
              <select class="form-control" name="status_dosen">
              <option>Tetap</option>
              <option>Tidak Tetap</option>
              </select>
          </div>

                <button class="btn btn-primary type="submit" name="submit">Update</button>
                <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>" />
    </form>

</div>
</div>
</div>
</div>



        </div>
    </div>        
</div>        
</div>
        <!-- /#page-wrapper -->

    
<?php 
    include('footer.php');
?>