<?php
    if (!isset($_SESSION)) {
        echo '<script>window.location="?module=index&acao=logout"</script>';
    }
    $hoje = date('Y-m-d');
    $hoje = implode("/", array_reverse(explode("-", $hoje)));

    $sql = "SELECT
                a.ati_cod, 
                a.ati_data,
                a.ati_descricao,
                u.usu_nome
            FROM
                atividade AS a 
                INNER JOIN usuario AS u 
            WHERE 
                a.ati_situacao = 1 AND 
                a.usu_cod = u.usu_cod AND 
                a.sol_cod=".$_POST['param_0']."
                ORDER BY a.ati_data DESC";

    $atividade = $data->find('dynamic', $sql);

    $sql = "SELECT * FROM solicitacao WHERE sol_cod =" . $_POST['param_0'];
    $result = $data->find('dynamic', $sql);

    $sql = "SELECT cli_nome FROM cliente AS c INNER JOIN solicitacao AS s WHERE c.cli_cod =s.cli_cod";
    $cliente = $data->find('dynamic', $sql);

    $sql = "SELECT set_nome FROM setor WHERE set_cod =" . $result[0]['set_cod'];
    $setor = $data->find('dynamic', $sql);

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1;";
    $selectSetor = $data->find('dynamic', $sql);

    $sql = "SELECT atp_cod, atp_descricao FROM atividade_tipo WHERE atp_situacao = 1";
    $tipo_atividade = $data->find('dynamic', $sql);

    $sql = "SELECT afr_cod, afr_descricao FROM atividade_forma WHERE afr_situacao = 1";
    $forma_atendimento = $data->find('dynamic', $sql);

    switch ($result[0]['sol_urgencia']) {
        case '1':
            $urgencia = '<small class="label label-info"><i class="fa fa-exclamation"></i> BAIXA</small>';
            break;
        case '2':
            $urgencia = '<small class="label label-warning"><i class="fa fa-exclamation-circle"></i> MÉDIA</small>';
            break;
        case '3':
            $urgencia = '<small class="label label-danger"><i class="fa fa-exclamation-triangle"></i> ALTA</small>';
            break;
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Solicitações</h2>
        <ol class="breadcrumb">
            <li>
                <p>Solicitação</p>
            </li>
            <li class="active">
                <strong>Visualizar</strong>
            </li>
        </ol>
    </div>

    <div class="col-lg-3 col-xs-4" style="text-align:right;">
        <br /><br />
        <?php
            if ($_SESSION['amauc_userPermissao']!=3){
                if ($result[0]['sol_status'] == 0) { ?>
            <button class="btn btn-warning" onclick="aceitar(<?php echo $result[0]['sol_cod'] ?>)" type="button"><i class="fa fa-check-circle"></i><span class="hidden-xs hidden-sm"> Aceitar Solicitação</span></button>
        <?php } } ?>
        
        <button class="btn btn-default" onclick="voltar();" type="button"><i class="fa fa-arrow-left"></i><span class="hidden-xs hidden-sm"> Voltar</span></button>
        
    </div>
</div>
<div id="result_var"></div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="ibox-tools">
                <h5 style="font-weight: 700;">Detalhes da Solicitação</h5>
                <?php echo $urgencia; ?>
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form role="form" action="?module=solicitacao&acao=visualiza_solicitacao" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
                <input type="hidden" name="sol_cod" id="sol_codpop" value="<?php echo $result[0]['sol_cod'] ?>" />

                <input type="hidden" name="cli_cod" id="cli_codpop" value="<?php echo $result[0]['cli_cod'] ?>" />

                <div class="row form-group">

                    <div class="col-sm-2">
                        <label class="control-label" for="cli_nome">Data:</label>
                        <input name="sol_data" type="date" class="form-control blockenter" id="sol_data" value="<?php echo $result[0]['sol_data'] ?>"  readonly />
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label" for="cli_cnpj">Cliente:</label>
                        <input name="cli_nome" type="text" class="form-control blockenter" id="cli_nome" value="<?php echo $cliente[0]['cli_nome'] ?>" readonly />

                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="set_cod">Setor responsável:</label>
                        <select name="set_cod" type="text" class="form-control blockenter" id="set_cod" disabled>
                            <?php
                                for ($i = 0; $i < count($setor); $i++) {
                                    if ($setor[$i]['set_cod'] == $result[0]['set_cod']) {
                                        echo '<option value="' . $setor[$i]['set_cod'] . '" selected>' . $setor[$i]['set_nome'] . '</option>';
                                    } else {
                                        echo '<option value="' . $setor[$i]['set_cod'] . '" selected>' . $setor[$i]['set_nome'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="row form-group">

                    <div class="col-sm-6">
                        <label class="control-label" for="sol_solicitante">Solicitante:</label>
                        <input name="sol_solicitante" type="text" class="form-control blockenter" id="sol_solicitante" value="<?php echo $result[0]['sol_solicitante']; ?>" readonly />
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label" for="sol_solicitante">Cargo:</label>
                        <input name="sol_solicitante" type="text" class="form-control blockenter" id="sol_cargo" value="<?php echo $result[0]['sol_cargo']; ?>" readonly />
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12">
                        <label class="control-label" for="sol_descricao">Descrição:</label>
                        <textarea name="sol_descricao" type="text" class="form-control blockenter" id="sol_descricao" style="white-space: pre-wrap; height: 200px;" readonly /><?php echo $result[0]['sol_descricao']; ?></textarea>
                    </div>
                </div>

                <?php if ($result[0]['sol_anexo']) { ?>
                    <div class="row form-group">
                        <div class="col-sm-12" style="padding-top: 25px;">
                            <a style="text-align: center; width: 100%" class="btn btn-success btn-block" href="<?php echo $result[0]['sol_anexo'] ?>" target="_blank" role="button">CLIQUE AQUI PARA VISUALIZAR O ANEXO</a>
                        </div>
                    </div>
                <?php } ?>
            </form>

        </div>
    </div>

    <?php if ($result[0]['sol_status'] != 0) { ?>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5 style="font-weight: 700;">Detalhes do Atendimento</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-6 col-xs-6">
                        <h2>Atendimentos realizados para a solicitação</h2>
                        <ol class="breadcrumb">
                            <li class="active">
                                <strong>Solicitação Nº<?php echo str_pad($result[0]['sol_cod'], 4, '0', STR_PAD_LEFT) ?></strong>
                            </li>
                        </ol>
                    </div>
                    
                    <div class="col-lg-6 col-xs-6" style="text-align:right;">
                        <br /><br />
                        <?php
                            switch($result[0]['sol_status']){
                                case '2':
                                    echo'<small class="label label-info">Concluído</small>';
                                    break;
                                case '3' :
                                    echo'<small class="label label-default">Cancelado</small>';
                                    break;
                            }
                            if($_SESSION['amauc_userPermissao'] != 3){
                                if($result[0]['sol_status'] == 1){
                        ?>
                                    <a href="#" onClick="preenche_popup('<?php echo $result[0]['sol_cod']?>','<?php echo $result[0]['sol_cod'] ?>')" data-toggle='modal' data-target='#redireciona_popup' class="btn btn-warning" style="height: 34px;">
                                        <span class="fa fa-refresh"></span> <span class="hidden-xs hidden-sm"> Transferir</span>
                                    </a>
                                    
                                    <a href="#" onClick="preenche_popup('<?php echo $result[0]['sol_cod']?>','<?php echo $result[0]['sol_cod'] ?>')" data-toggle='modal' data-target='#novaAtividade' class="btn btn-primary" style="height: 34px;">
                                        <span class="glyphicon glyphicon-plus-sign"></span> <span class="hidden-xs hidden-sm">Novo</span>
                                    </a>
                                    </div>
                    <?php }}?>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="table-responsive" style="overflow-x: initial;">
                                                <br class="hidden-md hidden-lg" />
                                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Cód.</th>
                                                            <th>Data</th>
                                                            <th>Descrição</th>
                                                            <th>...</>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        for ($i = 0; $i < count($atividade); $i++) {
                                                            $atividade[$i]['ati_data'] = implode("/", array_reverse(explode("-", $atividade[$i]['ati_data'])));
                                                            echo '
                                                                <tr>
                                                                    <td>' . str_pad($atividade[$i]['ati_cod'], 4, '0', STR_PAD_LEFT) . '</td>
                                                                    <td>' . $atividade[$i]['ati_data'] . '</td>
                                                                    <td>' . $atividade[$i]['ati_descricao'] . '</td>';?>
                                                    
                                                                    <td>
                                                                        <a href="#" onClick="busca_atividade('<?php echo $atividade[$i]['ati_cod'] ?>', '<?php echo $_SESSION['amauc_userId'] ?>', '<?php echo $_SESSION['amauc_userPermissao'] ?>')" data-toggle='modal' data-target='#detalheAtividade' class="btn btn-primary" style="height: 34px;">
                                                                            <span class="fa fa-eye"></span>
                                                                        </a>
                                                                    </td>
                                                        <?php }?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal" id="novaAtividade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <form role="form" action="?module=solicitacao&acao=grava_atividade" id="MyForm" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="sol_cod" id="sol_codpop" value="<?php echo $result[0]['sol_cod']?>"/>
                            <input type="hidden" name="cli_cod" id="cli_codpop" value="<?php echo $result[0]['cli_cod']?>"/>


                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                                    <h4 class="modal-title">Adicionar Atendimento</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" for="sol_data">Data:</label>
                                            <input name="sol_data" type="text" class="form-control blockenter" id="sol_data" style="text-transform:uppercase; text-align: center;" value="<?php echo $hoje?>" readonly></input>
                                        </div>

                                        <div class="col-sm-3">
                                            <label class="control-label">Tipo atividade:</label>
                                            <select name="atp_cod" type="text" class="form-control blockenter" id="atp_cod" required>
                                                <option value="">--Selecione--</option>
                                                <?php
                                                for ($i = 0; $i < count($tipo_atividade); $i++) {
                                                    echo '<option value="' . $tipo_atividade[$i]['atp_cod'] . '" >' . $tipo_atividade[$i]['atp_descricao'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <label class="control-label">Forma atendimento:</label>
                                            <select name="afr_cod" type="text" class="form-control blockenter" id="afr_cod" required>
                                                <option value="">--Selecione--</option>
                                                <?php
                                                for ($i = 0; $i < count($forma_atendimento); $i++) {
                                                    echo '<option value="' . $forma_atendimento[$i]['afr_cod'] . '" >' . $forma_atendimento[$i]['afr_descricao'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="control-label">Status:</label>
                                            <select name="sol_status" type="text" class="form-control blockenter" id="sol_status">
                                                <option value="1" selected>Em Andamento</option>
                                                <option value="2">Concluído</option>
                                                <option value="3">Cancelado</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="control-label">Tempo de Execução:</label>
                                            <input class="form-control" name="ati_tempo" id="ati_tempo" rows="5" value="<?php echo $result[0]['ati_tempo']?>" <?php echo $desabilita ?> required/>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label class="control-label">Descrição da atividade:</label>
                                            <textarea class="form-control" name="ati_descricao" id="ati_descricao" placeholder="Descreva aqui o que foi feito neste atendimento" rows="5" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-8 hidden-xs"></div>
                                        <div class="col-sm-2 col-xs-6">
                                            <button type="submit" id="salvar2" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Salvar</button>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal inmodal" id="detalheAtividade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div id="retorno_atividade"></div>
                    </div>
                </div>

                <div class="modal fade" id="redireciona_popup" tabindex="-1" role="dialog" aria-labelledby="redireciona_popup" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="redireciona_popup">Redirecionar Solicitação</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="?module=solicitacao&acao=redireciona" id="MyForm" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="sol_cod" id="sol_codpop" value="<?php echo $result[0]['sol_cod'] ?>" />

                                    <input type="hidden" name="cli_cod" id="cli_codpop" value="<?php echo $result[0]['cli_cod'] ?>" />

                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="set_cod">Setor responsável:</label>
                                            <select name="set_cod" type="text" class="form-control blockenter" id="set_cod" required>
                                                <option value="" selected disabled>--SELECIONE--</option>
                                                <?php
                                                for ($i = 0; $i < count($selectSetor); $i++) {
                                                    echo '<option value="' . $selectSetor[$i]['set_cod'] . '">' . $selectSetor[$i]['set_nome'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label class="control-label">Descrição da atividade:</label>
                                            <textarea class="form-control" name="ati_descricao" id="ati_descricao" placeholder="Descreva aqui o que foi feito neste atendimento" rows="5" required></textarea>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

    <script>
        function busca_atividade(id, user, permission){
            url = 'application/script/ajax/busca_atividade.php?ati_cod='+id+'&user='+user+'&permission='+permission;
            div = 'retorno_atividade';
            ajax(url, div);
        }

        function voltar() {
            window.location.href = '?module=solicitacao&acao=lista_pendente';
        }

        function aceitar(idSol, idCli){
            var url = "?module=solicitacao&acao=aceita";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente aceitar esta Solicitação?<br />"+(idSol+'').padStart(4,'0'),
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#04bd4e",
                confirmButtonText: "Sim",
                cancelButtonColor: "#ba1904",
                cancelButtonText: "Não",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function() { //CONFIRM
                id = idSol+', '+idCli;      
                nextPage(url, id);
            }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay', 'close', 'timer'
                if (dismiss === 'cancel') {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: "slideDown",
                        timeOut: 5000
                    };
                    toastr.info("Nenhum dado foi afetado!", "Cancelado");
                }
            })
        }

        function preenche_popup(sol, cli) {
            document.getElementById('sol_codpop').value = sol;
            document.getElementById('cli_codpop').value = cli;
        }
        

        $(document).ready(function() {
            $("#ati_tempo").mask("99:99");

            var $formFields = $('#novaAtividade');

            $formFields.on('change', function() {
                var formComplete = true;
                $formFields.each(function() {
                    if ($(this).val() === '') {
                        formComplete = false;
                        return false;
                    }
                });
            });

            $("#MyForm").submit(function(event) {
                document.forms['MyForm'].submit();
            });
        });
    </script>

    <style type="text/css">
        .modal-dialog {
            width: 1200px !important;
        }

        .label {
            font-size: 14px !important;
            padding: 5px 8px !important;
            top: -3px;
            position: relative;
        }
    </style>