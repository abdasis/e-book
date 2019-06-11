<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Ruang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">   

<form action="ruangupdate.php" method="post">
     <?php 
      // terima nip dari halaman dosen
      $id_lab = $_GET['idlab'];
      
      $query = mysql_query("select * from ruang_lab where id_lab='$id_lab'");
      
      $data = mysql_fetch_array($query);
      ?>


        <div class="form-group">
            <label>Kode Ruang</label>
            <input class="form-control" name="id_lab" value="<?php echo $data['id_lab']; ?>" disabled>
        </div>

        <div class="form-group">
            <label>Nama Ruang</label>
            <input class="form-control" name="nama_lab" value="<?php echo $data['nama_lab']; ?>" required>
        </div>

                <button class="btn btn-primary type="submit" name="submit">Update</button>
                <input type="hidden" name="id_lab" value="<?php echo $data['id_lab']; ?>" />
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