if ($dbLevel == "ADMIN" ) {
			$_SESSION['level'] = $dbLevel;
			header('Location:admin.php');
		}else if($dbLevel == "OWNER"){
			$_SESSION['level'] = $dbLevel;
			header('Location:owner.php');
		}else if ($dbLevel == "KEUANGAN") {
			$_SESSION['level'] = $dbLevel;
			header('Location:keuangan.php');
		}else if ($dbLevel == "SUPER USER") {
			$_SESSION['level'] = $dbLevel;
			header('Location:super_user.php');
		}else if ($dbLevel == "MENEGERIAL") {
			$_SESSION['level'] = $dbLevel;
			header('Location:manegerial.php');
		}else($dbLevel != "level") {
			$_SESSION[]