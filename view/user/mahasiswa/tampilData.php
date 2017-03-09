<?php

    include "../../../model/model_mahasiswa.php";

    $mhs = new Mahasiswa($connection);

     ?>

    <?php

    if (isset($_POST['simpan'])) {
                                    $nim = $connection->conn->real_escape_string($_POST['nim']);
                                     $nama = $connection->conn->real_escape_string($_POST['nama']);
                                     $ttl = $connection->conn->real_escape_string($_POST['ttl']);
                                     $alamat = $connection->conn->real_escape_string($_POST['alamat']);
                                     $ipk = $connection->conn->real_escape_string($_POST['ipk']);
                                     $jdl = $connection->conn->real_escape_string($_POST['jdl']);
                                     $tlpn = $connection->conn->real_escape_string($_POST['tlpn']);
                                     $email = $connection->conn->real_escape_string($_POST['email']);
                                     $dosbing1 = $connection->conn->real_escape_string($_POST['dosbing1']);
                                     $dosbing2 = $connection->conn->real_escape_string($_POST['dosbing2']);
                                     $thn = $connection->conn->real_escape_string($_POST['thn']);

                                     $extensi = explode(".", $_FILES['foto']['name']);
                                     $foto = "mhs-".round(microtime(true)).".".end($extensi);
                                     $sumber = $_FILES['foto']['tmp_name'];
                                     $upload = move_uploaded_file($sumber, "../config/foto/".$foto);
                                     if ($upload) {
                                       $mhs->tambah($nim, $nama, $ttl, $alamat, $ipk, $jdl, $tlpn, $email, $dosbing1, $dosbing2,    $thn, $foto);
                                       header("location: ?page=tampilData");
                                     } else {
                                       echo "<script>alert('Upload Gagal!')</script>";
                                     }
                                  }

    ?>
        <section class="content-header">
            <h1>
            Mahasiswa
            <small>Lihat Data</small>
          </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-home"></i> Mahasiswa</a></li>
                <li class="disable"><a>Lihat Data</a></li>
            </ol>
        </section>
        <section class="content">

            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tabel Mahasiswa</h3>
                        <div class="pull-right">
                            <a href="#" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"></span> Tambah Data</a>
                        </div>
                    </div>
                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">Tambah Biodata Mahasiswa</h4>
                                </div>
                                <form method="post" action="" role="form" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="col-lg- col-md-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" name="nim" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" required name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="ttl">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="ttl" name="ttl" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="61" rows="4"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="ipk">IPK</label>
                                                <input type="text" class="form-control" name="ipk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jdl">Judul Skripsi</label>
                                                <textarea name="jdl" id="jdl" cols="61" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="tlpn">No Telpon</label>
                                                <input type="text" class="form-control" id="tlpn" name="tlpn" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-Mail</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="dosbing1">Pembimbing I</label>
                                                <input type="text" class="form-control" name="dosbing1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="dosbing2">Pembimbing II</label>
                                                <input type="text" class="form-control" name="dosbing2">
                                                <div class="">
                                                    <p class="help-block text-red">*Diisi Jika Ada</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun Pengajuan</label>
                                                <input type="number" class="form-control" name="thn" id="thn" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8 pull-left">
                                                    <label for="foto">Foto</label>
                                                    <input type="file" id="foto" name="foto">
                                                    <p class="help-block">1.Ukuran Foto 3x4.</p>
                                                    <p class="help-block">2.Ukuran Maksimal 2 Mb.</p>
                                                    <p class="help-block">3.Foto Formal.</p>
                                                </div>
                                                <div class="col-xs-4 pull-right">
                                                    <div class="box-header"></div>
                                                    <img src="" id="gambar_preview" alt="Preview Gambar" height="170" width="120" />
                                                    <script type="text/javascript" src="../assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
                                                    <script type="application/javascript">
                                                        function bacaGambar(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function (e) {
                                                                    $('#gambar_preview').attr('src', e.target.result);
                                                                }

                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                        $("#foto").change(function () {
                                                            bacaGambar(this);
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary" id="simpan" name="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">Edit Biodata Mahasiswa</h4>
                                </div>
                                <form id="form" enctype="multipart/form-data">
                                    <div class="modal-body" id="modal-edit">
                                        <div class="col-lg- col-md-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" id="nim" name="nim" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" required id="nama" name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="ttl">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="ttl" name="ttl" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="61" rows="4"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="ipk">IPK</label>
                                                <input type="text" class="form-control" id="ipk" name="ipk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jdl">Judul Skripsi</label>
                                                <textarea name="jdl" id="jdl" cols="61" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="tlpn">No Telpon</label>
                                                <input type="text" class="form-control" id="tlpn" name="tlpn" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-Mail</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="dosbing1">Pembimbing I</label>
                                                <input type="text" class="form-control" id="dosbing1" name="dosbing1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="dosbing2">Pembimbing II</label>
                                                <input type="text" class="form-control" id="dosbing2" name="dosbing2">
                                                <div class="">
                                                    <p class="help-block text-red">*Diisi Jika Ada</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun Pengajuan</label>
                                                <input type="number" class="form-control" name="thn" id="thn" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8 pull-left">
                                                    <label for="foto">Foto</label>
                                                    <input type="file" id="foto" name="foto">
                                                    <p class="help-block">1.Ukuran Foto 3x4.</p>
                                                    <p class="help-block">2.Ukuran Maksimal 2 Mb.</p>
                                                    <p class="help-block">3.Foto Formal.</p>
                                                </div>
                                                <div class="col-xs-4 pull-right">
                                                    <div class="box-header"></div>
                                                    <img src="" id="gambar_preview" alt="Preview Gambar" height="170" width="120" />
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary" id="edit" name="edit">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <script type="text/javascript" src="../assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
                    <script type="text/javascript">
                        $(document).on("click", "#edit_mhs", function () {
                            var nim = $(this).data('nim');
                            var nama = $(this).data('nama');
                            var ttl = $(this).data('ttl');
                            var alamat = $(this).data('alamat');
                            var ipk = $(this).data('ipk');
                            var jdl = $(this).data('judul_skripsi');
                            var noTlpn = $(this).data('tlpn');
                            var email = $(this).data('email');
                            var pem1 = $(this).data('dosbing1');
                            var pem2 = $(this).data('dosbing2');
                            var tahun = $(this).data('tahun');
                            var foto = $(this).data('foto');
                            $("#modal-edit #nim").val(nim);
                            $("#modal-edit #nama").val(nama);
                            $("#modal-edit #ttl").val(ttl);
                            $("#modal-edit #alamat").val(alamat);
                            $("#modal-edit #ipk").val(ipk);
                            $("#modal-edit #jdl").val(jdl);
                            $("#modal-edit #tlpn").val(noTlpn);
                            $("#modal-edit #email").val(email);
                            $("#modal-edit #dosbing1").val(dosbing1);
                            $("#modal-edit #dosbing2").val(dosbing2);
                            $("#modal-edit #thn").val(tahun);
                            $("#modal-edit #gambar_preview").attr("src", "../config/foto/" + foto);
                        })
                    </script>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 100px;">NIM</th>
                                        <th style="width: 100px;">Nama</th>
                                        <th style="width: 100px;">Tanggal Lahir</th>
                                        <th style="width: 100px;">Alamat</th>
                                        <th>IPK</th>
                                        <th style="width: 100px;">Judul Skripsi</th>
                                        <th style="width: 100px;">No Telpon</th>
                                        <th style="width: auto;">E-Mail</th>
                                        <th style="width: 100px;">Pembimbing I</th>
                                        <th style="width: 100px;">Pembimbing II</th>
                                        <th>Tahun</th>
                                        <!--                                        <th>Foto</th>-->
                                        <th style="width: 90px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no = 1;
                                $tampil = $mhs->tampil();
                                while ($data = $tampil->fetch_object()) {
                             ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++ ?>
                                            </td>
                                            <td>
                                                <?php echo $data->nim; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->nama; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->ttl; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->alamat; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->ipk; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->judul_skripsi; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->noTlpn; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->email; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->pem1; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->pem2; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->tahun; ?>
                                            </td>

                                            <!--
                                            <td>
    <img src="../config/foto/<?php echo $data->foto; ?>" alt="foto" class="img-responsive text-center" style="width: 100px; height:140px;">
</td>
-->

                                            <td style=".btn {border-radius:0px;}">
                                                <a href="" class="btn btn-sm btn-info" title="Detail" data-toggle="modal" data-target="detail"><span class="fa fa-eye"></span></a>
                                                <a href="" id="edit_mhs" data-toggle="modal" data-target="#edit" class="btn btn-sm btn-primary" data-nim="<?php echo $data->nim; ?>" data-nama="<?php echo $data->nama; ?>" data-ttl="<?php echo $data->ttl; ?>" data-alamat="<?php echo $data->alamat; ?>" data-ipk="<?php echo $data->ipk; ?>" data-judul_skripsi="<?php echo $data->judul_skripsi; ?>" data-noTlpn="<?php echo $data->noTlpn; ?>" data-email="<?php echo $data->email; ?>" data-pem1="<?php echo $data->pem1; ?>" data-pem2="<?php echo $data->pem2; ?>" data-tahun="<?php echo $data->tahun; ?>" data-foto="<?php echo $data->foto; ?>" title="Update">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                                <a href="" class="btn btn-sm btn-danger" title="Hapus"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        <?php
                              }
                               ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
