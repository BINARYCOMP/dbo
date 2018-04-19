
<!doctype html>
<html>
    <head>
        <title>Lookup Modal Bootstrap 3 - harviacode.com</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        <style>
            body{
                margin: 15px;
            }
            .pilih:hover{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-5">
                <h2>modal lookup - harviacode.com</h2>
                <p style="text-align:justify">
                    Lookup ini bisa digunakan sebagai pengganti select. Bila data anda berjumlah puluhan ribu tentu merepotkan bila menggunakan select 
                    (bahkan select dengan ajax masih tetap repot). Untuk mencobanya silahkan klik tombol [...] dan masukan nama obat pada kotak pencarian
                    lalu klik baris obat yang dimaksud. 
                </p>
            </div>
        </div>
        <form action="action" onsubmit="dummy();
                return false">
            <div class="form-group">
                <label for="varchar">Kode Obat</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="kode_obat" id="kode_obat" placeholder="Kode Obat" readonly="" />
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>
                    </div>
                </div>
            </div>
 
            <input type="submit" value="Simpan" class="btn btn-primary" />
        </form>
 
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lookup Kode Obat</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('harviacode');
                                $sql = mysql_query('SELECT * FROM obat');
                                while ($r = mysql_fetch_array($sql)) {
                                    ?>
                                    <tr class="pilih" data-kodeobat="<?php echo $r['kode_obat']; ?>">
                                        <td><?php echo $r['kode_obat']; ?></td>
                                        <td><?php echo $r['nama_obat']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
 
//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kode_obat").value = $(this).attr('data-kodeobat');
                $('#myModal').modal('hide');
            });
 
//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });
 
            function dummy() {
                var kode_obat = document.getElementById("kode_obat").value;
                alert('kode obat ' + kode_obat + ' berhasil tersimpan');
            }
        </script>
    </body>
</html>