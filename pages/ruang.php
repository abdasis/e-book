<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-bank fa-fw"></i>Data Ruang Lab</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
<?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
  $message = $_GET['msg'];
  
  if ($message == 'success') {
  ?>
  <div class="alert alert-success">Berhasil</div>
  <?php } else if ($message == 'failed') {?>
  <div class="alert alert-warning">Error</div>
  <?php } ?>
                
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php 
if ($_SESSION['role'] == 'admin') {
?>
          
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahruang"><i class="fa fa-user fa-plus-circle"></i> Tambah Ruang</button>
            <?php if ($data['username'] != 'admin') {?>
            <?php } ?>
          
          <?php } ?>

          <a href="ruang-print.php" class="btn btn-default" target="_blank"><i class="fa fa-user fa-print"></i> Cetak</a>
</div>       

    <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Ruang Lab</th>
        <th>Nama Lab</th>
      </tr>
    </thead>
    <tbody>
     <?php 
      $query = mysql_query("select * from ruang_lab");
      
      $i = 1;
      
      while ($data = mysql_fetch_array($query)) {
      ?>
      <tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
        <td><?php echo $i; ?></td>
        <td>
          <?php 
          echo $data['id_lab']; 
          
          // jika user yang login memiliki role sebagai admin, maka tampilkan menu untuk edit dan delete user
          if ($_SESSION['role'] == 'admin') {
          ?>
          <div class="row-actions">
            <a href="ruangedit.php?idlab=<?php echo $data['id_lab'];?>"><i class="fa fa-edit fa-fw"></i></a>
            <?php if ($data['username'] != 'admin') {?>
             | <a href="ruangdelete.php?idlab=<?php echo $data['id_lab'];?>" class="delete"><i class="fa fa-eraser fa-fw"></i></a>
            <?php } ?>
          </div>
          <?php } ?>
        </td>
        <td><?php echo $data['nama_lab']; ?></td>
      </tr>
      <?php 
        $i++;
      } 
      ?>
    </tbody>

  </table>





      <div class="modal fade" id="tambahruang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Tambah Ruang Lab</h4>
            </div>
            <div class="modal-body">
              <form action="ruanginsert.php" method="post">
            
        <div class="form-group">
            <label>Kode Ruang</label>
            <input class="form-control" name="id_lab" required>
        </div>

        <div class="form-group">
            <label>Nama Ruang</label>
            <input class="form-control" name="nama_lab" required>
        </div>

<div class="modal-footer">
                <button class="btn btn-primary type="submit" name="submit">Submit</button>
</div>        
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