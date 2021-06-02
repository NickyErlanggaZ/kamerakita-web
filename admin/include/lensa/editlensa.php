<?php
  if(isset($_GET['data'])){
    $id_lensa = $_GET['data'];
    $_SESSION['id_lensa']=$id_lensa;
  //get data lensa
    $sql_l = "SELECT `id_jenis`,`id_merk`,`nama`,`focal_length`,`maximum_aperture`,`mount_type`,`format`,`harga` 
              FROM `lensa`
              WHERE `id_lensa`='$id_lensa'";
    $query_l = mysqli_query($koneksi,$sql_l);
    while($data_l = mysqli_fetch_row($query_l)){
      $id_jenis= $data_l[0];
      $id_merk = $data_l[1];
      $nama = $data_l[2];
      $focal = $data_l[3];
      $max = $data_l[4];
      $mount = $data_l[5];
      $format = $data_l[6];
      $harga = $data_l[7];
    }
  }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3><i class="fas fa-edit"></i> Edit Data lensa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?include=lensa">Data lensa</a></li>
                        <li class="breadcrumb-item active">Edit Data lensa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data
                    lensa</h3>
                <div class="card-tools">
                    <a href="index.php?include=lensa" class="btn btn-sm btn-warning float-right">
                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            </br></br>
            <div class="col-sm-10">
                <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                <?php if($_GET['notif']=="editkosong"){?>
                <div class="alert alert-danger" role="alert">Maaf data
                    <?php echo $_GET['jenis'];?> wajib di isi</div>
                <?php }?> <?php }?>
            </div>
            <form class="form-horizontal" action="index.php?include=konfirmasi-edit-lensa" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="foto" class="col-sm-3 col-form-label">Cover lensa </label>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="id_lensa">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-3 col-form-label">Jenis lensa</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="id_jenis" name="jenis">
                            <option value="0">- Pilih jenis lensa -</option>
                                <?php
                                $sql_k = "SELECT `id_jenis`, `jenis` 
                                FROM `jenis_lensa` 
                                ORDER BY `jenis`";
                                $query_k = mysqli_query($koneksi, $sql_k);
                                while($data_k = mysqli_fetch_row($query_k)){
                                    $id_merk = $data_k[0];
                                    $jenis = $data_k[1];
                                ?>
                                <option  value="<?php echo $id_jenis; ?>"
                                <?php 
                                    if($id_jenis==$id_jenis){ 
                                ?>
                                selected <?php } ?>><?php echo $jenis; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-3 col-form-label">Merk</label>
                        <div class="col-sm-7">
                        <select class="form-control" id="id_merk" name="merk">
                            <option value="0">- Pilih Merk -</option>
                                <?php
                                 $sql_m = "SELECT `id_merk`, `merk` 
                                 FROM `merk` 
                                 ORDER BY `merk`";
                                $query_m = mysqli_query($koneksi, $sql_m);
                                while($data_m = mysqli_fetch_row($query_m)){
                                    $id_merk = $data_m[0];
                                    $merk = $data_m[1];
                                ?>
                                <option  value="<?php echo $id_merk; ?>"
                                <?php 
                                    if($id_merk==$id_merk){ 
                                ?>
                                selected <?php } ?>><?php echo $merk; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                <label for="nim" class="col-sm-3 col-form-label">Nama Produk</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="focal_length" class="col-sm-3 col-form-label">focal length</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="focal_length" id="focal_length" value="<?php echo $focal; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="maximum_aperture" class="col-sm-3 col-form-label">Maximum Aperture</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="maximum_aperture" id="maximum_aperture" value="<?php echo $max; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mount_type" class="col-sm-3 col-form-label">Mount Type</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="mount_type" id="mount_type" value="<?php echo $mount; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="format" class="col-sm-3 col-form-label">Format</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="format" id="format" value="<?php echo $format; ?>">
                    </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-3 col-form-label">Harga/hari</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $harga; ?>">
                </div>
            </div>
                    

                </div>
        </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.card-footer -->
        </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->