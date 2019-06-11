<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Data Asisten Dosen</h1>
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
          
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahasdos"><i class="fa fa-user fa-plus-circle"></i> Tambah Asisten Dosen</button>
            <?php if ($data['username'] != 'admin') {?>
            <?php } ?>
          
          <?php } ?>

          <a href="asdos-print.php" class="btn btn-default" target="_blank"><i class="fa fa-user fa-print"></i> Cetak</a>
</div>       

    <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
      <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama Asdos</th>
        <th>Semester</th>
        <th>No.HP</th>
      </tr>
    </thead>
    <tbody>
     <?php 
      $query = mysql_query("select * from asdos");
      
      $i = 1;
      
      while ($data = mysql_fetch_array($query)) {
      ?>
      <tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
        <td><?php echo $i; ?></td>
        <td>
          <?php 
          echo $data['npm']; 
          
          // jika user yang login memiliki role sebagai admin, maka tampilkan menu untuk edit dan delete user
          if ($_SESSION['role'] == 'admin') {
          ?>
          <div class="row-actions">
            <a href="asdosedit.php?npm=<?php echo $data['npm'];?>" class="edit"><i class="fa fa-edit fa-fw"></i></a>
            <?php if ($data['username'] != 'admin') {?>
             | <a href="asdosdelete.php?npm=<?php echo $data['npm'];?>" class="delete"><i class="fa fa-eraser fa-fw"></i></a>
            <?php } ?>
          </div>
          <?php } ?>
        </td>
        <td><?php echo $data['nama_asdos']; ?></td>
        <td><?php echo $data['semester']; ?></td>
        <td><?php echo $data['no_hp']; ?></td>
      </tr>
      <?php 
        $i++;
      } 
      ?>
    </tbody>

  </table>





      <div class="modal fade" id="tambahasdos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Tambah Asisten Dosen</h4>
            </div>
            <div class="modal-body">
              <form action="asdosinsert.php" method="post">
            
        <div class="form-group">
            <label>NPM</label>
            <input class="form-control" name="npm" required>
        </div>

        <div class="form-group">
            <label>Nama Asisten Dosen</label>
            <input class="form-control" name="nama_asdos" required>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <input class="form-control" name="semester" required>
        </div>

        <div class="form-group">
            <label>No.HP</label>
            <input class="form-control" name="no_hp" required>
        </div>

<div class="modal-footer">
                <button class="btn btn-primary type="submit" name="submit">Submit</button>
</div>
    </form>
            </div>
          </div>
        </div>
      </div>



       <div class="modal fade" id="asdosedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edit Asisten Dosen</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
            </div>
          </div>
        </div>
      </div>

<!--<script src="vendor\jquery/jquery.js"></script>!-->

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#asdosedit').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('npm');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'asdosdetail.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

        </div>
    </div>        
</div>        
</div>
        <!-- /#page-wrapper -->

    
<?php 
    include('footer.php');
?>