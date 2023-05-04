<?php
    $sql = "SELECT upe_descricao FROM usuario_permissao WHERE upe_cod = ".$_SESSION['amauc_userPermissao'];
    $permissao = $data->find('dynamic', $sql);

	
    $img_perfil = 'application/images/sem_img_profile.svg';
    

    $tam_image = getimagesize($img_perfil);

    //Compara se altura é largura é maior que altura
    if($tam_image[0]>$tam_image[1]){
        $bs = 'background-size:100% auto;';
    }else
        if($tam_image[0]<$tam_image[1]){
            $bs = 'background-size:auto 100%;';
        }else{
            $bs = 'background-size:100%;';
        }

?>

<style>
    .avatar{ 
        background-image:url('<?php echo $img_perfil; ?>');
        <?php echo $bs; ?>
        background-position:center center; 
        /*border-radius:50%;*/
        border: none;
        background-repeat: no-repeat;
        background-color: #FFF; 
    }
    .reduzido.avatar{
        margin-right: auto;
        margin-left: auto;
        width:32px; 
        height:32px; 
    }
    
</style>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="padding: 27px 25px;">
                <div class="dropdown profile-element"> 
                    <a title="Visualizar usuário" href="#" onClick="nextPage('?module=cadastro&acao=edita_usuario', <?php echo $_SESSION['amauc_userId'];?>);" style="text-decoration:none;">
                	<span>
                        <div class="avatar" style="width:60px; height:60px;">
                            <br />
                        </div>
                    </span>
                    </a>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> 
                        	<span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['amauc_userName']; ?></strong></span> 
                        	<span class="text-muted text-xs block"><?php echo $permissao[0]['upe_descricao']; ?> <b class="caret"></b></span> 
                        </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a title="Visualizar usuário" href="#" onClick="nextPage('?module=cadastro&acao=edita_usuario', <?php echo $_SESSION['amauc_userId'];?>);" style="text-decoration:none;">Meus Dados</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background: transparent;">
                    	<div class="reduzido avatar">
                            <br />
                        </div>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs" style="color:#000;">
                        <li><a href="#" onClick="nextPage('?module=cadastro&acao=edita_usuario', <?php echo $_SESSION['amauc_userId'];?>);">Meus Dados</a></li>
                        <li class="divider"></li>
                        <li><a href="?module=index&acao=logout">Sair do Sistema</a></li>
                    </ul>
                </div>
            </li>

            <?php 
            	if($_GET['module']=='dashboard'){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
            	}else{
            		echo '<li>';
            	}

                echo '
                <a href="?module=dashboard&acao=lista"><i class="fa fa-pie-chart"></i><span class="nav-label">Dashboard</span></a>';                       
            			
            ?>	    
            </li>
            
            <?php 
            	if($_GET['module']=='cadastro'){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
                    switch ($acao[1]) {
                        case 'usuario':
                            $item_sel[0] = 'class="active"';
                            break;
                        case 'cliente':
                            $item_sel[1] = 'class="active"';
                            break;
                        case 'cidade':
                            $item_sel[2] = 'class="active"';
                            break;
                        case 'veiculo':
                            $item_sel[3] = 'class="active"';
                            break;
                        case 'setor':
                            $item_sel[4] = 'class="active"';
                            break;
                        case 'forma':
                            $item_sel[5] = 'class="active"';
                            break;  
                        case 'tipo':
                            $item_sel[6] = 'class="active"';
                            break;
                        case 'tipoAge':
                            $item_sel[7] = 'class="active"';
                            break;  
                }
            	}else{
            		echo '<li>';
            	}

            	switch($_SESSION['amauc_userPermissao']) {
            		case '1': //ADMINISTRADOR
            			echo '
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Cadastros</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">    
                            <li '.$item_sel[0].' ><a href="?module=cadastro&acao=lista_usuario"><i class="fa fa-user" aria-hidden="true"></i>Usuários</a></li>
                			<li '.$item_sel[1].' ><a href="?module=cadastro&acao=lista_cliente"><i class="fa fa-users" aria-hidden="true"></i>
                            Clientes</a></li>
    	                    <li '.$item_sel[2].' ><a href="?module=cadastro&acao=lista_cidade"><i class="fa fa-building" aria-hidden="true"></i>Cidades</a></li>
                            <li '.$item_sel[3].' ><a href="?module=cadastro&acao=lista_veiculo"><i class="fa fa-car" aria-hidden="true"></i>
                            Veículos</a></li>
                            <li '.$item_sel[4].' ><a href="?module=cadastro&acao=lista_setor"><i class="fa fa-cog" aria-hidden="true"></i>
                            Setor</a></li>
                            <li '.$item_sel[5].' ><a href="?module=cadastro&acao=lista_forma"><i class="fa fa-mobile" aria-hidden="true"></i>Forma Atendimento</a></li>
                            <li '.$item_sel[6].' ><a href="?module=cadastro&acao=lista_tipo"><i class="fa fa-wrench" aria-hidden="true"></i>Tipo Atendimento</a></li>
                            <li '.$item_sel[7].' ><a href="?module=cadastro&acao=lista_tipoAge"><i class="fa fa-clock-o" aria-hidden="true"></i>Tipo Agendamento</a></li>
                        </ul>';
            			break;
                    case '2': //FUNCIONÁRIO
                        echo '
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Registros</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">    
                            <li '.$item_sel[0].' ><a href="?module=cadastro&acao=lista_usuario">Usuários</a></li>
                        </ul>';
                        break;
                    case '3': //CLIENTE
                        echo '
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Registros</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">    
                            <li '.$item_sel[0].' ><a href="?module=cadastro&acao=lista_usuario"><i class="fa fa-user"></i> Usuários</a></li>
                        </ul>';
                        break;
            	}
            ?>	
            </li>

            

            <?php 
            	if($_GET['module']=='agendamento'){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
            	}else{
            		echo '<li>';
            	}

            	switch($_SESSION['amauc_userPermissao']) {
                    case '1'://ADMINISTRADOR
                    case '2'://FUNCIONÀRIO
            			echo '
                        <a href="?module=agendamento&acao=lista"><i class="fa fa-calendar"></i><span class="nav-label">Agendamentos</span></a>';                       
            			break;
            	}
            ?>	    
            </li>
            <?php 
            	if($_GET['module']=="solicitacao"){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
                    switch ($acao[1]) {
                        case 'solicitacao':
                            $item_sel[0] = 'class="active"';
                            break;
                        case 'pendente':
                            $item_sel[1] = 'class="active"';
                            break;
                        case 'andamento':
                            $item_sel[2] = 'class="active"';
                            break;
                        case 'concluido':
                            $item_sel[3] = 'class="active"';
                            break;
                        case 'cancelado':
                            $item_sel[4] = 'class="active"';
                            break;
                        }
            	}else{
            		echo '<li>';
            	}

            	switch($_SESSION['amauc_userPermissao']) {
                    
                    case '1'://ADMINISTRADOR
            			echo '
                        <a href="#"><i class="fa fa-gavel"></i> <span class="nav-label">Solicitações</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[1].' ><a href="?module=solicitacao&acao=lista_pendente"><i class="fa fa-exclamation-triangle"></i><span class="nav-label">Pendentes</a></li>
                            <li '.$item_sel[2].' ><a href="?module=solicitacao&acao=lista_andamento"><i class="fa fa-circle-o-notch"></i>Em Andamento</a></li>
                            <li '.$item_sel[3].' ><a href="?module=solicitacao&acao=lista_concluido"><i class="fa fa-check"></i>Concluídas</a></li>
                            <li '.$item_sel[4].' ><a href="?module=solicitacao&acao=lista_cancelado"><i class="fa fa-times"></i>Canceladas</a></li>
                        </ul>';
            			break;
                    case '2'://FUNCIONÁRIO
            			echo '
                        <a href="#"><i class="fa fa-gavel"></i> <span class="nav-label">Solicitações</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[1].' ><a href="?module=solicitacao&acao=lista_pendente"><i class="fa fa-exclamation-triangle"></i><span class="nav-label">Pendentes</a></li>
                            <li '.$item_sel[2].' ><a href="?module=solicitacao&acao=lista_andamento"><i class="fa fa-circle-o-notch"></i>Em Andamento</a></li>
                            <li '.$item_sel[3].' ><a href="?module=solicitacao&acao=lista_concluido"><i class="fa fa-check"></i>Concluídas</a></li>
                            <li '.$item_sel[4].' ><a href="?module=solicitacao&acao=lista_cancelado"><i class="fa fa-times"></i>Canceladas</a></li>
                        </ul>';
            			break;
            		case '3'://CLIENTE
            			echo '
                        <a href="#"><i class="fa fa-gavel"></i> <span class="nav-label">Solicitações</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[1].' ><a href="?module=solicitacao&acao=lista_pendente"><i class="fa fa-exclamation-triangle"></i><span class="nav-label">Pendentes</a></li>
                            <li '.$item_sel[2].' ><a href="?module=solicitacao&acao=lista_andamento"><i class="fa fa-circle-o-notch"></i>Em Andamento</a></li>
                            <li '.$item_sel[3].' ><a href="?module=solicitacao&acao=lista_concluido"><i class="fa fa-check"></i>Concluídas</a></li>
                            <li '.$item_sel[4].' ><a href="?module=solicitacao&acao=lista_cancelado"><i class="fa fa-times"></i>Canceladas</a></li>
                        </ul>';
            			break;
            	}
            ?>

            </li>
            <?php 
            	if($_GET['module']=="atividade"){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
                    switch ($acao[1]) {
                        case 'atividade':
                            $item_sel[0] = 'class="active"';
                            break;
                        }
            	}else{
            		echo '<li>';
            	}

            	switch($_SESSION['amauc_userPermissao']) {
                    
                    case '1'://ADMINISTRADOR
            			echo '
                        <a href="?module=atividade&acao=lista_atividade"><i class="fa fa-tasks" aria-hidden="true"></i><span class="nav-label">Atividades</span></a>';
            			break;
                    case '2'://FUNCIONÁRIO
            			echo '
                        <a href="?module=atividade&acao=lista_atividade"><i class="fa fa-tasks" aria-hidden="true"></i><span class="nav-label">Atividades</span></a>';
            			break;
                    case '3'://CLIENTE
                        echo '
                        <a href="?module=atividade&acao=lista_atividade"><i class="fa fa-tasks" aria-hidden="true"></i><span class="nav-label">Atividades</span></a>';
                        break;
            	}
            ?>

            </li>
            <?php 
            	if($_GET['module']=="contas"){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
                    switch ($acao[1]) {
                        case 'lista':
                            $item_sel[0] = 'class="active"';
                            break;
                        }
            	}else{
            		echo '<li>';
            	}

            	switch($_SESSION['amauc_userPermissao']) {
                    
                    case '1'://ADMINISTRADOR
            			echo '
                        <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i><span class="nav-label">Prestação de Contas</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[0].' ><a href="?module=contas&acao=lista"><i class="fa fa-money" aria-hidden="true"></i></i><span class="nav-label">Lançamentos</a></li>
                        </ul>';
            			break;
                    case '2'://FUNCIONÁRIO
            			echo '
                        <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Prestação de Contas</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[0].' ><a href="?module=contas&acao=lista"><i class="fa fa-file-text-o" aria-hidden="true"></i></i><span class="nav-label">Lançamentos</a></li>
                        </ul>';
            			break;
            	}
            ?>

            </li>
            <?php 
            	if($_GET['module']=="relatorio"){
            		echo '<li class="active">';
                    //Valida qual variavel vai receber active
                    unset($item_sel);
                    $acao = explode('_',$_GET['acao']);
                    switch ($acao[1]) {
                        case 'lista':
                            $item_sel[0] = 'class="active"';
                            break;
                        }
            	}else{
            		echo '<li>';
            	}

            	switch($_SESSION['amauc_userPermissao']) {
                    
                    case '1'://ADMINISTRADOR
            			echo '
                        <a href="#"><i class="fa fa-clipboard" aria-hidden="true"></i><span class="nav-label">Relatórios</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[0].' ><a href="?module=relatorio&acao=lista"><i class="fa fa-gavel" aria-hidden="true"></i></i><span class="nav-label">Solicitações</a></li>
                        </ul>';
            			break;
                    case '2'://FUNCIONÁRIO
            			echo '
                        <a href="#"><i class="fa fa-file-o"></i> <span class="nav-label">Relatórios</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li '.$item_sel[0].' ><a href="?module=relatorio&acao=lista"><i class="fa fa-file-text-o" aria-hidden="true"></i></i><span class="nav-label">Solicitações</a></li>
                        </ul>';
            			break;
            	}
            ?>
        </ul>
    </div>
</nav>