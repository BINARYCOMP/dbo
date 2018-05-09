<?php 
if (!empty($status)) header('location:acces_denied.php');
/**
* 
*/
class C_profil extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_profil');
	}
	public function Index()
	{
		$agamaId	=$this->m_profil->getAgama();
		$akun 	=$this->m_profil->getInfoAccount();
		$data = array(
			'Account'	=>$akun,
			'agamaId'	=>$agamaId, 
			'content'	=>'v_profil',
			'title' 	=>'Account',
      		'menu'      =>'Profil Account'
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function formGantiPassword($Password)
	{
		$akun 			=$this->m_profil->getInfoAccount();
		$password 		=$this->m_profil->getPassword();
		$data = array(
			'Password'	=>$password,
			'content'	=>'v_editPassword',
			'akun'  	=>$akun,
			'title' 	=>'Account',
      		'menu'      =>'Ganti Password'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function GantiPassword()
	{
		$newPassword 		= md5($_POST['newPassword']);
		$password 			= $this->m_profil->getPassword();
		$data = array(
			'USER_PASSWORD' 	=>$newPassword
			);
		$this->m_profil->Update($data);
		redirect('C_profil');
	}
	public function upload()
	{
		$t=time();
		$target_dir = "assets/img/profil/";
		$target_file = $target_dir .date("Y_m_d_H_i_s_",$t). basename($_FILES["fileToUpload"]["name"]);
		$nama_picture = str_replace(' ', '_', $target_file);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($nama_picture,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			if($_FILES["fileToUpload"]["tmp_name"] != null) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			}else
			{
				$check="";
			}
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		    ?>
		    <script type="text/javascript">
		    	alert("File yang Diupload Bukan Gambar/Photo.");
		    	window.location="<?php echo base_url(); ?>c_profil"
		        $uploadOk = 0;
		    </script>
		    <?php    
		    }
		}

		// Check if file already exists
		if (file_exists($nama_picture)) {
		    ?>
		    <script type="text/javascript">
		    	alert("Maaf, File Kamu Sudah Ada.");
		    	window.location="<?php echo base_url(); ?>c_profil"
		    </script>
		    <?php
		    $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) 
		{
		    ?>
		    <script type="text/javascript">
		    	alert("Maaf, File Kamu Terlalu Besar.");
		    	window.location="<?php echo base_url(); ?>c_profil"
		    </script>
		    <?php
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
			?>
			<script type="text/javascript">
				alert("Maaf, Hanya format JPG, JPEG, PNG & GIF yang Diperbolehkan.");
		    	window.location="<?php echo base_url(); ?>c_profil"
			</script>
			<?php
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    ?>
		    <script type="text/javascript">
		    	alert("Maaf, Gagal Upload.");
		    	window.location="<?php echo base_url(); ?>c_profil"
		    </script>
		    <?php

		// if everything is ok, try to upload file
		} else 
			{
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $nama_picture)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " Berhasil Di Upload.";
		        $picture 		= $nama_picture;
		        $data = array(
				'USER_PICTURE' 	=>$picture
				);
				$this->m_profil->Update($data);
				redirect('C_profil');
		    } else 
		    {
		        ?>
		        <script type="text/javascript">
		        	alert("Maaf, file yang Anda Upload Gagal.");
		    		window.location="<?php echo base_url(); ?>c_profil"
		        </script>
		        <?php
		    }
		}
	}
}

 ?>