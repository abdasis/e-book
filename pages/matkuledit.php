<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Mata Kuliah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">   

<form action="matkulupdate.php" method="post">
     <?php 

      $kd_matakuliah = $_GET['kdmatkul'];
      
      $query = mysql_query("select * from mata_kuliah where kd_matakuliah='$kd_matakuliah'");
      
      $data = mysql_fetch_array($query);
      ?>

        <div class="form-group">
            <label>Kode Mata Kuliah</label>
            <input class="form-control" name="kd_matakuliah" value="<?php echo $data['kd_matakuliah']; ?>" disabled>
        </div>

        <div class="form-group">
            <label>Nama Mata Kuliah</label>
            <input class="form-control" name="nama_matakuliah" value="<?php echo $data['nama_matakuliah']; ?>" required>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <input class="form-control" name="semester" value="<?php echo $data['semester']; ?>" required>
        </div>

        <div class="form-group">
            <label>SKS</label>
            <input class="form-control" name="sks" value="<?php echo $data['sks']; ?>" required>
        </div>


                <button class="btn btn-primary type="submit" name="submit">Update</button>

                <input type="hidden" name="kd_matakuliah" value="<?php echo $data['kd_matakuliah']; ?>" />
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