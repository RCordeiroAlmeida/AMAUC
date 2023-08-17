<?php
    date_default_timezone_set('America/Sao_Paulo');

    switch ($_SESSION['amauc_userPermissao']) {
// ADMINISTRADOR ------------------------------------------------------------------------------------------------------
        case 1: 
            $nivel = "Administrador";

            $sql = "SELECT count(sol_cod) as qtd FROM solicitacao WHERE sol_status = 0";
            $pendente = $data->find('dynamic', $sql);

            $sql = "SELECT count(s.sol_cod) as qtd FROM solicitacao AS s WHERE sol_status = 1";
            $andamento = $data->find('dynamic', $sql);

            $sql = "SELECT count(s.sol_cod) as qtd FROM solicitacao AS s WHERE s.sol_status = 2";
            $concluido = $data->find('dynamic', $sql);

            $sql = "SELECT count(s.sol_cod) as qtd FROM solicitacao AS s WHERE s.sol_status = 3";
            $cancelado = $data->find('dynamic', $sql);

        break;
// FUNCIONARIO---------------------------------------------------------------------------------------------------------
        case 2: 
            $nivel = "Funcionário";

            $sql = "SELECT count(s.sol_cod) as qtd 
                    FROM 
                        solicitacao as s 
                    WHERE 
                        s.sol_status = 0 AND
                        s.set_cod = ".$_SESSION['amauc_userSetor'];
            $pendente = $data->find('dynamic', $sql);
            
            $sql = "SELECT count(s.sol_cod) as qtd 
                    FROM 
                        solicitacao as s 
                    WHERE 
                        s.sol_status = 1 AND
                        s.set_cod = ".$_SESSION['amauc_userSetor'];
            $andamento = $data->find('dynamic', $sql);

            $sql = "SELECT count(s.sol_cod) as qtd 
                    FROM 
                        solicitacao as s 
                    WHERE 
                        s.sol_status = 2 AND
                        s.set_cod = ".$_SESSION['amauc_userSetor'];
            $concluido = $data->find('dynamic', $sql);

            $sql = "SELECT count(s.sol_cod) as qtd 
                    FROM 
                        solicitacao as s 
                    WHERE 
                        s.sol_status = 3 AND
                        s.set_cod = ".$_SESSION['amauc_userSetor'];
            $cancelado = $data->find('dynamic', $sql);
            
        break;
// CLIENTE---------------------------------------------------------------------------------------------------------            
        case 3: 
            $nivel = "Cliente";
            $sql = "SELECT count(sol_cod) as qtd 
                    FROM
                        solicitacao
                    WHERE
                        sol_status = 0
                        AND cli_cod = ".$_SESSION['amauc_userCliente'];
            $pendente = $data->find('dynamic', $sql);

            $sql = "SELECT count(sol_cod) as qtd 
                    FROM
                        solicitacao
                    WHERE
                        sol_status = 1
                        AND cli_cod = ".$_SESSION['amauc_userCliente'];
            $andamento = $data->find('dynamic', $sql);

            $sql = "SELECT count(sol_cod) as qtd 
                    FROM
                        solicitacao
                    WHERE
                        sol_status = 2
                        AND cli_cod = ".$_SESSION['amauc_userCliente'];
            $concluido = $data->find('dynamic', $sql);

            $sql = "SELECT count(sol_cod) as qtd 
                    FROM
                        solicitacao
                    WHERE
                        sol_status = 3
                        AND cli_cod = ".$_SESSION['amauc_userCliente'];
            $cancelado = $data->find('dynamic', $sql);
        break;
    }

    $sql = "SELECT td_texto, td_data FROM to_do_list WHERE td_stts = 0";
    $open = $data->find('dynamic', $sql);

    $sql = "SELECT td_texto FROM to_do_list WHERE td_stts = 1";
    $progress = $data->find('dynamic', $sql);

    $sql = "SELECT td_texto FROM to_do_list WHERE td_stts = 2";
    $finished = $data->find('dynamic', $sql);    

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1";
    $setor = $data->find('dynamic', $sql);


?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-9">
        <h2>Dashboard - <?php echo $nivel?></h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Início</strong>
                <div class="m-t-sm small">
                    Atualizado em <?php echo implode("/", array_reverse(explode("-", date('Y-m-d'))))." ".date('H:i:s')?>
                </div>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <h2>Relatório das Solicitações</h2>
    <span>Contagem geral de solicitações</span><br /><br />
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="?module=solicitacao&acao=lista_pendente" style="padding: 5px; background-color: #4bb8eb; border-radius: 5px; color: #fff">Pendentes</a>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins"><?php echo $pendente[0]['qtd'];?></h2>
                    <i class="fa fa-exclamation-triangle pull-right" aria-hidden="true"></i>
                    <span class="">Aguardando atendimento</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="?module=solicitacao&acao=lista_andamento" style="padding: 5px; background-color: #e39c02; border-radius: 5px; color: #fff">Em Andamento</a>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins"><?php echo $andamento[0]['qtd']; ?></h2>
                    <i class="fa fa-circle-o-notch pull-right" aria-hidden="true"></i>
                    <span class="">Sendo atendidas</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="?module=solicitacao&acao=lista_concluido" style="padding: 5px; background-color: #17e636; border-radius: 5px; color: #fff">Concluídos</a>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins"><?php echo $concluido[0]['qtd']; ?></h2>
                    <i class="fa fa-check pull-right" aria-hidden="true"></i>
                    <span class="">Finalizadas e aprovadas</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="?module=solicitacao&acao=lista_cancelado" style="padding: 5px; background-color: #e30202; border-radius: 5px; color: #fff">Cancelados</a>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins"><?php echo $cancelado[0]['qtd']; ?></h2>
                    <i class="fa fa-times pull-right" aria-hidden="true"></i>
                    <span class="">Fora de execução</span>
                </div>
            </div>
        </div>
    </div>
    
<?php if($_SESSION['amauc_userPermissao'] == 1){?>

    <h2>Sobrecarga dos Setores</h2>
    <span>Solicitações concluídas em relação ao total</span><br /><br />
    <div class="row">

<?php 

    for($i=0; $i < count($setor); $i++){ 
        $sql = "SELECT 
                    SUM(CASE sol_status
                    WHEN 0 THEN 1
                    ELSE 0 END) AS pendente,
                    
                    SUM(CASE sol_status
                    WHEN 1 THEN 1
                    ELSE 0 END) AS andamento,

                    SUM(CASE sol_status
                    WHEN 2 THEN 1
                    ELSE 0 END) AS concluido,

                    SUM(CASE sol_status
                    WHEN 3 THEN 1
                    ELSE 0 END) AS cancelado
                FROM
                    solicitacao AS s
                WHERE
                    set_cod =".$setor[$i]['set_cod'];
        $qtd = $data->find('dynamic', $sql);

        $total = $qtd[0]['pendente']+$qtd[0]['andamento']+$qtd[0]['concluido']+$qtd[0]['cancelado'];
        if($qtd[0]['concluido'] > 0){
            $percent = ($qtd[0]['concluido']/$total)*100;
        }else{
            $percent= 0;
        }

?>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h5><?php echo $setor[$i]['set_nome']?></h5>
                    <h2><?php echo $percent?>%</h2>
                    <div class="progress progress-mini">
                        <div style="width: <?php echo $percent?>%;" class="progress-bar"></div>
                    </div>
                </div>
            </div>
        </div>
        
        </html>
<?php } }?>
        <script>

        $(document).ready(function() {

            $("#todo, #inprogress, #completed").sortable({
                connectWith: ".connectList",
                update: function(event, ui) {

                    var todo = $("#todo").sortable("toArray");
                    var inprogress = $("#inprogress").sortable("toArray");
                    var completed = $("#completed").sortable("toArray");
                    $('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
                }
            }).disableSelection();

            var sparklineCharts = function() {
                $("#sparkline").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                    type: 'line',
                    width: '100%',
                    height: '60',
                    lineColor: '#1ab394',
                    fillColor: "#ffffff"
                });
            };

        });
    </script>
