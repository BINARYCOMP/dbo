<html>
  <head>
    <title>CRUD Codeigniter</title>
  </head>
  <body>
    <h1>Form Tambah Pegawai</h1>
    <hr>
    <div style="color: red;""><?php $this->load->library('form_validation');
    echo validation_errors();?></div>

   <form action="<?php echo base_url(). 'C_pegawai/Tambah'; ?>" method="post">
      <table cellpadding="8">
        <tr>
          <td>Nama</td>
          <td><input type="text" name="I_nama" value="<?php echo set_value('I_nama'); ?>"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="Email" name="I_email" value="<?php echo set_value('I_email'); ?>"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="I_alamat"><?php echo set_value('I_alamat'); ?></textarea></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input type="text" name="I_no_tlp" value="<?php echo set_value('I_no_tlp'); ?>"></td>
        </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="I_jenis_kelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki'); ?>> Laki-laki
          <input type="radio" name="I_jenis_kelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan'); ?>> Perempuan
          </td>
        </tr>
      </table>
      <hr>
      <input type="submit" name="submit" value="Simpan">
    </form>

    <h1>Data Pegawai</h1>
    <hr>
    <table border="1" cellpadding="7">
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Jenis Kelamin</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($pegawai)){
        foreach($pegawai as $data){
          echo "<tr>
          <td>".$data->PEGA_NAME."</td>
          <td>".$data->PEGA_EMAIL."</td>
          <td>".$data->PEGA_ALAMAT."</td>
          <td>".$data->PEGA_NO_TLP."</td>
          <td>".$data->PEGA_JENKEL."</td>
          <td><a href='".base_url("c_pegawai/ubah/".$data->PEGA_ID)."'>Ubah</a></td>
          <td><a href='".base_url("c_pegawai/hapus/".$data->PEGA_ID)."'>Hapus</a></td>
          </tr>";
        }
      }else{
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>