<?php
	/*$login = new Login();
	$validate = $login->getLogin();

	if ($validate['logged'] == 'no'){
		echo '
			<script>
				swal({
				  	title: "Sua sessão expirou!",
				  	text: "Acesse o sistema novamente!",
				  	type: "warning",
				  	showCancelButton: false,
				  	confirmButtonClass: "btn-warning",
				  	confirmButtonText: "Acessar o sistema",
				  	closeOnConfirm: false
				},
				function(){
				  	window.location.href = "index.php";
				});
			</script>';
		exit;
	}else{*/
		require_once 'library/DataManipulation.php';
		$data  = new DataManipulation();
		// $utils = new Utils();

		$userConfig['id'] = $_SESSION['amauc_userId'];
		$sql = "SELECT *
				FROM usuario
				WHERE usu_cod = '".$userConfig['id']."'";
		$paramsUsers = $data->find('dynamic',$sql);
	//}
?>
