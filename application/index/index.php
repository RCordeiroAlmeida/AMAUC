<?php
	class IndexCommand implements Command {
   
		public function execute() {
			if($_GET['acao'] == 'logout'){
				require_once 'application/index/logout.inc.php';
			}		

			$randon = md5(uniqid(time()));
			$_SESSION['amauc_idSession'] = $randon;
			
			$online = 0;			
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão - AMAUC</title>
    <link href="application/images/favicon.png" rel="icon">
    <link href="library/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="library/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="library/inspinia/css/animate.css" rel="stylesheet">
    <link href="library/inspinia/css/style.css" rel="stylesheet">
    
    <!-- Mainly scripts -->
    <script src="library/inspinia/js/jquery-2.1.1.js"></script>
    <script src="library/inspinia/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php if($_GET['erro']){?>
            $("#div_login").effect("shake");
            <?php }?>
        });
    </script>

    <style type="text/css">
	    .gray-bg{
	        background-image: url('application/images/bg.jpg');
	        -moz-background-size: cover;
			-webkit-background-size: cover;
			background-size: cover;
			background-position: center center;
	    }

        input{
            background-color: transparent !important;
            border-bottom: 1px solid #e5e6e7 !important;
            border-right: none !important;
            border-left: none !important;
            border-top: none !important;
            margin-bottom: 20px;
            color: #fff !important;
        }
	</style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown" style="margin-bottom: 20px;" id="div_login" >
        <div>
            <div>
            	<br /><br /><br /><br /><br /><br /><br />
                <img src="application/images/logo-amauc.png" style="width: 300px;">                
            </div>            
            <form class="m-t" role="form" action="?module=index&action=valida_senha" method="POST">
                <input type="hidden"    name="amauc_idSession" value="<?php echo $randon;?>" />
                <div class="form-group" style="margin-bottom: 0px;">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuário" required="" style="text-align: center;">
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required="" style="text-align: center;">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Acessar</button>
                <?php if($_GET['erro']){ ?>
                    <p style="position:relative; color:#F00;">Usuário/Senha inválido, tente novamente!</p>
                <?php } ?>
                <!--<a href="#" data-toggle="modal" data-target="#myModal">
                    <small style="color: #000;"><b>Esqueceu sua senha?</b></small>
                </a>-->                     
            </form>            
        </div>
    </div>

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form class="m-t" role="form" action="application/index/view/enviaEmailSenha.php" method="POST">
            	<div class="modal-content animated bounceInRight">                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-unlock-alt modal-icon" aria-hidden="true"></i>
                        <h4 class="modal-title">Recuperar senha</h4>                    
                    </div>
                    <div class="modal-body">
                        <p>Seu <strong>usuário e senha</strong> serão enviados para o e-mail informado abaixo.<br/>Após receber o e-mail basta fazer Login</p>                        
                        <div class="form-group">                        
                            <label>Seu e-mail</label> 
                            <input type="email" name="email" placeholder="E-mail" class="form-control" required="">                        
                        </div>                        
                    </div>
                    <div class="modal-footer">                           
                        <button type="submit" class="btn btn-primary">Enviar dados</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
		
<?php
		}
	}
?>