<?php
require('application/script/php/constructorEmail.php');

switch ($_GET['acao']) {


	case 'grava_solicitacao':

		$aux['sol_data']      	= $_POST['sol_data'];
		$aux['cli_cod']      	= $_POST['cli_cod'];
		$aux['sol_solicitante'] = addslashes(mb_strtoupper($_POST['sol_solicitante'], 'UTF-8'));
		$aux['sol_cargo'] 		= addslashes(mb_strtoupper($_POST['sol_cargo'], 'UTF-8'));
		$aux['set_cod']    		= $_POST['set_cod'];
		$aux['sol_descricao']  	= $_POST['sol_descricao'];
		$aux['sol_anexo']		= $_FILES['sol_anexo'];
		$aux['sol_urgencia']    = $_POST['sol_urgencia'];
		$aux['sol_status']      = '0';

		$arquivo = $_FILES['sol_anexo'];
		$local_arquivo = "arquivos/solicitacao/" . $POST['cli_cod'] . '_' . date('Ymdhis') . $arquivo['name'];
		$moved = move_uploaded_file($arquivo['tmp_name'], $local_arquivo);

		$aux['sol_anexo'] = '';
		if ($moved) {
			$aux['sol_anexo'] = $local_arquivo;
		}

		$data->tabela = 'solicitacao';
		$data->add($aux);

		//!------------- Informações para montar corpo do e-mail----------------//
		
		$sol_cod = $data->MaxValue("sol_cod", "solicitacao");

		$sql = "SELECT cli_cod, sol_solicitante, sol_descricao, set_cod FROM solicitacao WHERE sol_cod =" . $sol_cod[0]['sol_cod'];
		$result = $data->find('dynamic', $sql);

		$sql = "SELECT cli_nome FROM cliente WHERE cli_cod = " . $result[0]['cli_cod'];
		$cliente = $data->find('dynamic', $sql);

		$sql = "SELECT fun_mail, fun_nome FROM funcionario WHERE set_cod =" . $result[0]['set_cod'];
		$funcionario = $data->find('dynamic', $sql);

		//!-------------------------------------------------------------------// 


		for($i = 0; $i < count($funcionario); $i++){
			$mail->addAddress($funcionario[$i]['fun_mail'], $funcionario[$i]['fun_nome']);
		}

		$body = '      			
			<body style="width:100%; color: #666666; text-align: center; ">
				<meta http-equiv="Content-Type" content="text/html;>
				<meta charset="UTF-8">
				
				<div style="width: 80%; height: 60px; background-color: #17803C; text-align: center; padding: 40px;">
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" style="position: relative; top: 0px; height:60px;" >
				</div>

				<div style="width: 80%; height: 24px; background-color: #FFF; color: #17803C; font-size: 26px; text-align: center; padding: 40px; border: 1px solid #17803C">
					<b>Projeto nº '.str_pad($sol_cod, 4, "0", STR_PAD_LEFT).'</b>
				</div>

				<div style="width: 80%; background-color: #fff; text-align: center; padding: 40px; font-family: sans-serif; font-size: 16px; border: 1px solid #d5d5d5; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; line-height: 2;">

					<div style="line-height: 1.5; position: relative; top: -10px; font-size: 13px; color: #666666;">
						<h3>Olá,</h3>
						<h3>
								Há uma nova solicitação cadastrada no sistema AMAUC vinculado ao seu setor.<br /><br />
								Solicitação nº ' . str_pad($sol_cod, 4, "0", STR_PAD_LEFT) . '<br />
								Cliente: ' . $cliente[0]['cli_nome'] . '<br />
								Solicitante: ' . $result[0]['sol_solicitante'] . '<br />	
								Descrição: ' . $result[0]['sol_descricao'] . '<br/>
						</h3>	
					</div>
					
					Para mais informações, clique no botão abaixo.
					<br/><br/>
					
					<a href="http://servicos.amauc.org.br/sge" target="_blank" style="text-decoration: none;">
						<div style="width: 100%; background-color: #17803C; border-radius: 2px; font-size: 26px; color: #FFF; font-family: sans-serif;">
							<b>Acessar sistema</b>
						</div>
					</a>

					<br/>
					Atenciosamente, <br/>
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" /><br/>
					Esta é uma mensagem automática. Por favor, não responda esse e-mail<br />
					Sistema desenvolvido e mantido pela RAISWeb.
				</div>
			</body>';

		//Content
		$mail->isHTML(true);                                  
		$mail->Subject = 'Nova solicitação';
		$mail->Body    = $body; 	

		$mail->send();
		
		echo '<script>window.location = "?module=solicitacao&acao=lista_pendente&ms=1</script>';
		
		break;
	case 'inativar':
		$sql = 'UPDATE solicitacao SET sol_status = 3 WHERE sol_cod = ' . $_POST['param_0'];
		$data->executaSQL($sql);

		echo '<script>window.location = "?module=solicitacao&acao=lista_pendente&ms=5"</script>';
		break;

	case 'aceita':
		//muda o status na tabela solicitação
		$sql = 'UPDATE solicitacao SET sol_status = 1 WHERE sol_status = 0 AND sol_cod =' . $_POST['param_0'];
		$data->executaSQL($sql);

		//presta o primeiro atendimento da solicitacao, no caso (aceito em dd/mm/aaaa)
		$aux['ati_data'] = date('Y-m-d');
		$aux['ati_descricao'] = "A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO";
		$aux['sol_status'] = 1;
		$aux['atp_cod'] = 1;
		$aux['afr_cod'] = 6;
		$aux['sol_cod'] = $_POST['param_0'];
		$aux['cli_cod'] = $_POST['param_1'];
		$aux['usu_cod'] = $_SESSION['amauc_userId'];

		$data->tabela = 'atividade';
		$data->add($aux);

		//!------------- Informações para montar corpo do e-mail----------------//

		$sql = "SELECT cli_cod, sol_solicitante FROM solicitacao WHERE sol_cod =" . $_POST['param_0'];
		$result = $data->find('dynamic', $sql);

		$sql = "SELECT cli_mail FROM cliente WHERE cli_cod=".$result[0]['cli_cod'];
		$cliente = $data->find('dynamic', $sql);

		//!--------------------------------------------------------------------//

		
		$mail->addAddress($cliente[0]['cli_mail'], $result[0]['sol_solicitante']);
		
	
		$body = '      			
			<body style="width:100%; color: #666666; text-align: center; ">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				
				<div style="width: 80%; height: 60px; background-color: #17803C; text-align: center; padding: 40px;">
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" style="position: relative; top: 0px; height:60px;" >
				</div>

				<div style="width: 80%; height: 24px; background-color: #FFF; color: #17803C; font-size: 26px; text-align: center; padding: 40px; border: 1px solid #17803C">
					<b>Projeto nº '.str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT).'</b>
				</div>

				<div style="width: 80%; background-color: #fff; text-align: center; padding: 40px; font-family: sans-serif; font-size: 16px; border: 1px solid #d5d5d5; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; line-height: 2;">

					<div style="line-height: 1.5; position: relative; top: -10px; font-size: 13px; color: #666666;">
						<h3>Olá,</h3>
						<h3>
								Sua solicitação recebeu uma atualização<br /><br />
								Solicitação nº ' . str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT) . '<br />
								Descrição: A SOLICITAÇÃO FOI ACEITA E ESTÁ SENDO ANALISADA POR UM FUNCIONÁRIO DO SETOR DESTINADO <br/>
						</h3>	
					</div>
					
					Para mais informações, clique no botão abaixo.
					<br/><br/>
					
					<a href="http://servicos.amauc.org.br/sge" target="_blank" style="text-decoration: none;">
						<div style="width: 100%; background-color: #17803C; border-radius: 2px; font-size: 26px; color: #FFF; font-family: sans-serif;">
							<b>Acessar sistema</b>
						</div>
					</a>

					<br/>
					Atenciosamente, <br/>
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" /><br/>
					Esta é uma mensagem automática. Por favor, não responda esse e-mail<br />
					Sistema desenvolvido e mantido pela RAISWeb.
				</div>
			</body>';

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Solicitação aceita';
		$mail->Body    = $body; 	

		$mail->send();

		echo '<script>window.location = "?module=solicitacao&acao=lista_andamento&ms=1"</script>';
		break;

	case 'grava_atividade':

		$aux['ati_data']      	= date('Y-m-d');
		$aux['ati_descricao'] 	= $_POST['ati_descricao'];
		$aux['ati_tempo'] 		= $_POST['ati_tempo'];
		$aux['afr_cod'] 		= $_POST['afr_cod'];
		$aux['atp_cod'] 		= $_POST['atp_cod'];
		$aux['sol_cod'] 		= $_POST['sol_cod'];
		$aux['sol_status'] 		= $_POST['sol_status'];
		$aux['cli_cod'] 		= $_POST['cli_cod'];
		$aux['usu_cod'] 		= $_SESSION['amauc_userId'];

		$data->tabela = 'atividade';
		$data->add($aux);

		switch ($_POST['sol_status']) {
			case '1': //muda o status na tabela solicitacao
				$sql = 'UPDATE solicitacao SET sol_status = 1 WHERE sol_cod =' . $_POST['sol_cod'];
				$data->executaSQL($sql);

				echo '<script>nextPage("?module=solicitacao&acao=visualiza&ms=2", ' . $_POST['sol_cod'] . ');</script>';

				break;
			case '2':
				$sql = 'UPDATE solicitacao SET sol_status = 2 WHERE sol_cod =' . $_POST['sol_cod'];
				$data->executaSQL($sql);

				echo '<script>window.location = "?module=solicitacao&acao=lista_concluido&ms=1"</script>';

				break;
			case '3':
				$sql = 'UPDATE solicitacao SET sol_status = 3 WHERE sol_cod =' . $_POST['sol_cod'];
				$data->executaSQL($sql);

				echo '<script>window.location = "?module=solicitacao&acao=lista_cancelado&ms=1"</script>';

				break;
		}

		//!------------- Informações para montar corpo do e-mail----------------//

		$sql = "SELECT cli_cod, sol_solicitante FROM solicitacao WHERE sol_cod =" . $_POST['param_0'];
		$result = $data->find('dynamic', $sql);

		$sql = "SELECT cli_mail FROM cliente WHERE cli_cod=".$result[0]['cli_cod'];
		$cliente = $data->find('dynamic', $sql);

		//!--------------------------------------------------------------------//
		
		$mail->addAddress($cliente[0]['cli_mail'], $result[0]['sol_solicitante']);
		
	
		$body = '      			
			<body style="width:100%; color: #666666; text-align: center; ">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				
				<div style="width: 80%; height: 60px; background-color: #17803C; text-align: center; padding: 40px;">
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" style="position: relative; top: 0px; height:60px;" >
				</div>

				<div style="width: 80%; height: 24px; background-color: #FFF; color: #17803C; font-size: 26px; text-align: center; padding: 40px; border: 1px solid #17803C">
					<b>Projeto nº '.str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT).'</b>
				</div>

				<div style="width: 80%; background-color: #fff; text-align: center; padding: 40px; font-family: sans-serif; font-size: 16px; border: 1px solid #d5d5d5; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; line-height: 2;">

					<div style="line-height: 1.5; position: relative; top: -10px; font-size: 13px; color: #666666;">
						<h3>Olá,</h3>
						<h3>
								Sua solicitação recebeu uma atualização<br /><br />
								Solicitação nº ' . str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT) . '<br />
								Descrição: NOVA ATIVIDADE REALIZADA <br/>
						</h3>	
					</div>
					
					Para mais informações, clique no botão abaixo.
					<br/><br/>
					
					<a href="http://servicos.amauc.org.br/sge/" target="_blank" style="text-decoration: none;">
						<div style="width: 100%; background-color: #17803C; border-radius: 2px; font-size: 26px; color: #FFF; font-family: sans-serif;">
							<b>Acessar sistema</b>
						</div>
					</a>

					<br/>
					Atenciosamente, <br/>
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" /><br/>
					Esta é uma mensagem automática. Por favor, não responda esse e-mail<br />
					Sistema desenvolvido e mantido pela RAISWeb.
				</div>
			</body>';

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Atualizações da solicitação';
		$mail->Body    = $body; 	

		$mail->send();

		break;

	case 'conclui':

		//Muda o status na tabela solicitação
		$sql = 'UPDATE solicitacao SET sol_status = 2 WHERE sol_status = 1 AND sol_cod =' . $_POST['param_0'];
		$data->executaSQL($sql);

		//Gera um atendimento "solicitação concluida"
		$aux['ati_data'] 		=  date('Y-m-d');
		$aux['ati_descricao'] 	= $_POST['ati_descricao'];
		$aux['ati_tempo'] 		= $_POST['ati_tempo'];
		$aux['sol_cod'] 		= $_POST['param_0'];
		$aux['sol_status'] 		= 2;
		$aux['cli_cod'] 		= $_POST['param_1'];
		$aux['usu_cod'] 		= $_SESSION['amauc_userId'];

		$data->tabela = 'atividade';
		$data->add($aux);

		//!------------- Informações para montar corpo do e-mail----------------//

		$sql = "SELECT cli_cod, sol_solicitante FROM solicitacao WHERE sol_cod =" . $_POST['param_0'];
		$result = $data->find('dynamic', $sql);

		$sql = "SELECT cli_mail FROM cliente WHERE cli_cod=".$result[0]['cli_cod'];
		$cliente = $data->find('dynamic', $sql);

		//!--------------------------------------------------------------------//

		
		$mail->addAddress($cliente[0]['cli_mail'], $result[0]['sol_solicitante']);
		
	
		$body = '      			
			<body style="width:100%; color: #666666; text-align: center; ">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				
				<div style="width: 80%; height: 60px; background-color: #17803C; text-align: center; padding: 40px;">
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" style="position: relative; top: 0px; height:60px;" >
				</div>

				<div style="width: 80%; height: 24px; background-color: #FFF; color: #17803C; font-size: 26px; text-align: center; padding: 40px; border: 1px solid #17803C">
					<b>Projeto nº '.str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT).'</b>
				</div>

				<div style="width: 80%; background-color: #fff; text-align: center; padding: 40px; font-family: sans-serif; font-size: 16px; border: 1px solid #d5d5d5; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; line-height: 2;">

					<div style="line-height: 1.5; position: relative; top: -10px; font-size: 13px; color: #666666;">
						<h3>Olá,</h3>
						<h3>
								Sua solicitação recebeu uma atualização<br /><br />
								Solicitação nº ' . str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT) . '<br />
								Descrição: SOLICITAÇÃO FINALIZADA <br/>
						</h3>	
					</div>
					
					Para mais informações, clique no botão abaixo.
					<br/><br/>
					
					<a href="http://servicos.amauc.org.br/sge" target="_blank" style="text-decoration: none;">
						<div style="width: 100%; background-color: #17803C; border-radius: 2px; font-size: 26px; color: #FFF; font-family: sans-serif;">
							<b>Acessar sistema</b>
						</div>
					</a>

					<br/>
					Atenciosamente, <br/>
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" /><br/>
					Esta é uma mensagem automática. Por favor, não responda esse e-mail<br />
					Sistema desenvolvido e mantido pela RAISWeb.
				</div>
			</body>';

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Solicitação concluída';
		$mail->Body    = $body; 	

		$mail->send();

		echo '<script>window.location = "?module=solicitacao&acao=lista_concluido&ms=5"</script>';
		break;

	case 'redireciona':
		//Muda status da solicitação
		$sql = 'UPDATE solicitacao SET sol_status = 0 WHERE sol_cod=' . $_POST['sol_cod'];
		$data->executaSQL($sql);
		//Gera atendimento "solicitação transferida para outro setor"
		$aux['ati_data'] 		= date('Y-m-d');
		$aux['ati_descricao'] 	= $_POST['ati_descricao'];
		$aux['sol_cod'] 		= $_POST['sol_cod'];
		$aux['cli_cod'] 		= $_POST['cli_cod'];
		$aux['usu_cod'] 		= $_SESSION['amauc_userId'];

		$data->tabela = 'atividade';
		$data->add($aux);

		//Muda o setor da solicitação
		$novoSetor = $_POST['set_cod'];
		$sql = 'UPDATE solicitacao SET set_cod = ' . $novoSetor . ' WHERE sol_cod=' . $_POST['sol_cod'];
		$data->executaSQL($sql);

		//!------------- Informações para montar corpo do e-mail----------------//

		$sql = "SELECT cli_cod, sol_solicitante FROM solicitacao WHERE sol_cod =" . $_POST['sol_cod'];
		$result = $data->find('dynamic', $sql);

		$sql = "SELECT cli_mail FROM cliente WHERE cli_cod=".$result[0]['cli_cod'];
		$cliente = $data->find('dynamic', $sql);

		//!--------------------------------------------------------------------//
		
		$mail->addAddress($cliente[0]['cli_mail'], $result[0]['sol_solicitante']);
		
		$body = '      			
			<body style="width:100%; color: #666666; text-align: center; ">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				
				<div style="width: 80%; height: 60px; background-color: #17803C; text-align: center; padding: 40px;">
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" style="position: relative; top: 0px; height:60px;" >
				</div>

				<div style="width: 80%; height: 24px; background-color: #FFF; color: #17803C; font-size: 26px; text-align: center; padding: 40px; border: 1px solid #17803C">
					<b>Projeto nº '.str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT).'</b>
				</div>

				<div style="width: 80%; background-color: #fff; text-align: center; padding: 40px; font-family: sans-serif; font-size: 16px; border: 1px solid #d5d5d5; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; line-height: 2;">

					<div style="line-height: 1.5; position: relative; top: -10px; font-size: 13px; color: #666666;">
						<h3>Olá,</h3>
						<h3>
								Sua solicitação recebeu uma atualização<br /><br />
								Solicitação nº ' . str_pad($_POST['param_0'], 4, "0", STR_PAD_LEFT) . '<br />
								Descrição: SOLICITAÇÃO REDIRECIONADA <br/>
						</h3>	
					</div>
					
					Para mais informações, clique no botão abaixo.
					<br/><br/>
					
					<a href="http://servicos.amauc.org.br/sge/" target="_blank" style="text-decoration: none;">
						<div style="width: 100%; background-color: #17803C; border-radius: 2px; font-size: 26px; color: #FFF; font-family: sans-serif;">
							<b>Acessar sistema</b>
						</div>
					</a>

					<br/>
					Atenciosamente, <br/>
					<img src="http://servicos.amauc.org.br/sge/application/images/logo-amauc.png" /><br/>
					Esta é uma mensagem automática. Por favor, não responda esse e-mail<br />
					Sistema desenvolvido e mantido pela RAISWeb.
				</div>
			</body>';

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Solicitação redirecionada';
		$mail->Body    = $body; 	

		$mail->send();

		echo '<script>window.location = "?module=solicitacao&acao=lista_andamento&ms=2"</script>';
		break;
}