<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Asisten Dosen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">   

<form action="asdosupdate.php" method="post">
     <?php 
      // terima nip dari halaman dosen
      $npm = $_GET['npm'];
      
      $query = mysql_query("select * from asdos where npm='$npm'");
      
      $data = mysql_fetch_array($query);
      ?>


        <div class="form-group">
            <label>NPM</label>
            <input class="form-control" name="npm" value="<?php echo $data['npm']; ?>" disabled>
        </div>

        <div class="form-group">
            <label>Nama Asisten Dosen</label>
            <input class="form-control" name="nama_asdos" value="<?php echo $data['nama_asdos']; ?>" required>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <input class="form-control" name="semester" value="<?php echo $data['semester']; ?>"required>
        </div>

        <div class="form-group">
            <label>No.HP</label>
            <input class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
        </div>


                <button class="btn btn-primary type="submit" name="submit">Update</button>
                <input type="hidden" name="npm" value="<?php echo $data['npm']; ?>" />
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