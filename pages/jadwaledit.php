<?php 
    include('header.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Jadwal Praktikum</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">   

<form action="jadwalupdate.php" method="post">
     <?php 
      // terima nip dari halaman dosen
      $kd_jadwal = $_GET['kd_jadwal'];
      
      $query = mysql_query("select * from jadwal_lab where kd_jadwal='$kd_jadwal'");
      
      $data = mysql_fetch_array($query);
      ?>


<div class="form-group">
            <label>Kode Jadwal</label>
            <input class="form-control" name="kd_jadwal" value="<?php echo $data['kd_jadwal']; ?>" disabled>
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


                <button class="btn btn-primary type="submit" name="submit">Update</button>
                <input type="hidden" name="kd_jadwal" value="<?php echo $data['kd_jadwal']; ?>" />
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