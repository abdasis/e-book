<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-table fa-fw"></i> Data Jadwal Praktium</h1>
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
          
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahjadwal"><i class="fa fa-user fa-plus-circle"></i> Tambah Jadwal</button>
            <?php if ($data['username'] != 'admin') {?>
            <?php } ?>
          
          <?php } ?>

          <a href="jadwal-print.php" class="btn btn-default" target="_blank"><i class="fa fa-user fa-print"></i> Cetak</a>
</div>       

    <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Jadwal</th>
        <th>Praktikum</th>
        <th>Hari</th>
        <th>Jam Awal</th>
        <th>Jam Akhir</th>
        <th>Ruang</th>
        <th>Sesi</th>
        <th>Dosen Pengampu</th>
        <th>Asdos 1</th>
        <th>Asdos 2</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $query = mysql_query("select * from jadwal_lab");
      
      $i = 1;
      
      while ($data = mysql_fetch_array($query)) {
      ?>
      <tr class="<?php if ($i % 2 == 0) { echo "odd"; } else { echo "even"; } ?>">
        <td><?php echo $i; ?></td>
        <td>
          <?php 
          echo $data['kd_jadwal']; 
          
          // jika user yang login memiliki role sebagai admin, maka tampilkan menu untuk edit dan delete user
          if ($_SESSION['role'] == 'admin') {
          ?>
          <div class="row-actions">
            <a href="jadwaledit.php?kd_jadwal=<?php echo $data['kd_jadwal'];?>"><i class="fa fa-edit fa-fw"></i></a>
            <?php if ($data['username'] != 'admin') {?>
             | <a href="jadwaldelete.php?kd_jadwal=<?php echo $data['kd_jadwal'];?>" class="delete"><i class="fa fa-eraser fa-fw"></i></a>
            <?php } ?>
          </div>
          <?php } ?>
        </td>
        <td><?php echo $data['nama_matkul']; ?></td>
        <td><?php echo $data['hari']; ?></td>
        <td><?php echo $data['jam_awal']; ?></td>
        <td><?php echo $data['jam_akhir']; ?></td>
        <td><?php echo $data['ruang']; ?></td>
        <td><?php echo $data['kelas']; ?></td>
        <td><?php echo $data['dosen_pengampu']; ?></td>
        <td><?php echo $data['asdos']; ?></td>
        <td><?php echo $data['asdos2']; ?></td>
      </tr>
      <?php 
        $i++;
      } 
      ?>
    </tbody>

  </table>





      <div class="modal fade" id="tambahjadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Tambah Jadwal</h4>
            </div>
            <div class="modal-body">
            


            <form action="jadwalinsert.php" method="post">          
            
        <div class="form-group">
            <label>Kode Jadwal</label>
            <input class="form-control" name="kd_jadwal" required>
        </div>

          <div class="form-group">
            <label>Praktikum</label>
            <select name="nama_matkul" class="form-control">
              <?php
              $query = "SELECT * FROM mata_kuliah";
              $hasil = mysql_query($query);
                while ($data = mysql_fetch_array($hasil))
            {
              echo "<option value='".$data['nama_matakuliah']."'>".$data['nama_matakuliah']."</option>";
            }
              ?>  
            </select>
           </div>
          
          <div class="form-group">
            <label>Jam Awal</label>
            <input id="icon_prefix" type="time" class="form-control" name="jam_awal" required>
          </div>

          <div class="form-group">
            <label>Jam Akhir</label>
            <input id="icon_prefix" type="time" class="form-control" name="jam_akhir" required>
          </div>

        <div class="form-group">
            <label>Hari</label>
            <select class="form-control" name="hari">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jum'at">Jum'at</option>
            <option value="Sabtu">Sabtu</option>
          </select>
        </div>

        <div class="form-group">
            <label>Ruang</label>
            <select name="ruang" class="form-control">
              <?php
              $query = "SELECT * FROM ruang_lab";
              $hasil = mysql_query($query);
              while ($data = mysql_fetch_array($hasil))
            {
              echo "<option value='".$data['nama_lab']."'>".$data['nama_lab']."</option>";
            }
              ?>  
            </select>
       </div>

       <div class="form-group">
            <label>Kelas</label>
              <select class="form-control" name="kelas">
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>    
              </select>
       </div>  

        <div class="form-group">
            <label>Kelas</label>
              <select name="dosen_pengampu" class="form-control">
              <?php
              $query = "SELECT * FROM dosen";
              $hasil = mysql_query($query);
              while ($data = mysql_fetch_array($hasil))
            {
              echo "<option value='".$data['nama_dosen']."'>".$data['nama_dosen']."</option>";
            }
              ?>  
              </select>
         </div>

        <div class="form-group">
            <label>Asdos 1</label>
              <select name="asdos" class="form-control">
              <?php
              $query = "SELECT * FROM asdos";
              $hasil = mysql_query($query);
              while ($data = mysql_fetch_array($hasil))
            {
              echo "<option value='".$data['nama_asdos']."'>".$data['nama_asdos']."</option>";
            }
              ?>  
              </select>
        </div>

        <div class="form-group">
            <label>Asdos 2</label>
              <select name="asdos2" class="form-control">
              <?php
              $query = "SELECT * FROM asdos";
              $hasil = mysql_query($query);
              while ($data = mysql_fetch_array($hasil))
            {
              echo "<option value='".$data['nama_asdos']."'>".$data['nama_asdos']."</option>";
            }
              ?>  
              </select>
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
