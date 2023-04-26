<?php
    if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] != 2) {
        echo '<script>window.location="?module=index&acao=logout"</script>';
    }

    switch($_SESSION['amauc_userPermissao']){
        case '1':// ADMINISTRADOR
            $where = "";
            $join = "";
        break;            
        case '2': // FUNCIONARIO
            $where = "AND fun_cod = ".$_SESSION['amauc_userFuncionario'];
            $join = "INNER JOIN funcionario AS f ON (s.set_cod = f.set_cod)";   
        break;
        case '3': // CLIENTE
            $where = "AND c.cli_cod = ".$_SESSION['amauc_userCliente'];
            $join = "";   
        break;
    }

    $sql = "SELECT
                s.sol_cod,
                s.sol_urgencia,
                s.sol_descricao,
                s.sol_data,
                s.cli_cod,
                s.set_cod,
                c.cli_nome
            FROM
                solicitacao AS s
                INNER JOIN cliente AS c ON (s.cli_cod = c.cli_cod)
                ".$join."
            WHERE
                sol_status = 0 ".$where."
            ORDER BY
                sol_urgencia DESC,
                sol_data ASC";
    $ati= $data->find('dynamic', $sql);

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1;";
    $selectSetor = $data->find('dynamic', $sql);

?>

<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 5000
    };
    <?php
    switch ($_GET[ms]) {
        case 1:
            echo 'toastr.success("Solicitação cadastrada com sucesso!", "Incluido!");';
            break;

        case 2:
            echo 'toastr.success("Solicitação atualizada com sucesso", "Atualizado!");';
            break;

        case 3:
            echo 'toastr.success("Solicitação excluida com sucesso", "Exluido!");';
            break;

        case 4:
            echo 'toastr.info("Solicitação foi inativada", "Inativado!");';
            break;

        case 5:
            echo 'toastr.success("Solicitação foi reativada", "Reativado!");';
            break;
    }
    ?>
</script>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Solicitações</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Pendentes</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 col-xs-6" style="text-align:right;">
        <br /><br />
        <?php if($_SESSION['amauc_userPermissao'] == 3){?>
        <a href="?module=solicitacao&acao=novo" class="btn btn-primary" style="height: 34px;">
            <span class="glyphicon glyphicon-plus-sign"></span> <span class="hidden-xs hidden-sm">Novo</span>
        </a>
        <?php } ?>
    </div>
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
                                            <th>Urgência</th>
                                            <th>Data</th>
                                            <th>Cód.</th>
                                            <th>Descrição</th>
                                            <th>Cliente</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($ati); $i++) {
                                            $ati[$i]['sol_data'] = implode("/", array_reverse(explode("-", $ati[$i]['sol_data'])));
                                            switch ($ati[$i]['sol_urgencia']) {
                                                case '1':
                                                    $urgencia = '<small class="label label-info"><i class="fa fa-exclamation"></i> BAIXA</small>';
                                                    break;
                                                case '2':
                                                    $urgencia = '<small class="label label-warning"><i class="fa fa-exclamation-circle"></i> MEDIA</small>';
                                                    break;
                                                case '3':
                                                    $urgencia = '<small class="label label-danger"><i class="fa fa-exclamation-triangle"></i> ALTA</small>';
                                                    break;
                                            }
                                            echo '
                                                <tr>
                                                    <td style="width: 10px; float: center">'.$urgencia.'</td>
                                                    <td>' . $ati[$i]['sol_data'] . '</td>
                                                    <td>' . str_pad($ati[$i]['sol_cod'], 4, '0', STR_PAD_LEFT) . '</td>
                                                    <td>' . $ati[$i]['sol_descricao'] . '</td>
                                                    <td>' . $ati[$i]['cli_nome'].'</td>
                                                    <td style="width: 120px">
                                                        <a href="#" onclick="nextPage(\'?module=solicitacao&acao=visualiza\', ' . $ati[$i]['sol_cod'] . ')">
                                                            <span class="fa-stack">
                                                            <i class="fa fa-square fa-stack-2x"></i>
                                                            <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>';
                                                        
                                                        if ($_SESSION['amauc_userPermissao'] != 3){
                                                            echo '
                                                            <a href="#" onClick=\'aceitar(' . $ati[$i]['sol_cod'] . ', ' . $ati[$i]['cli_cod'] .');\' title="Aceitar Solicitação" style="text-decoration:none;">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-check-circle fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>';?>
                                                            
                                                            <a href="#" onClick="preenche_popup('<?php echo $ati[$i]['sol_cod'] ?>', '<?php echo $ati[$i]['cli_cod']?>')" title="Transferir Solicitação" style="text-decoration:none;" data-toggle='modal' data-target='#redireciona_popup'>
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-refresh fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                        <?php
                                                        }
                                        }?>   
                                                    </td>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
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

    <script>

        function preenche_popup(sol, cli) {
            document.getElementById('sol_codpop').value = sol;
            document.getElementById('cli_codpop').value = cli;
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
        
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                "lengthMenu": [
                    [50, 150, 200, -1],
                    [50, 150, 200, "Todos"]
                ],
                "ordering": false,
                "order": [
                    [0, "asc"]
                ],
                "columnDefs": [{
                        "orderable": false,
                        "targets": [3, 4]
                    } // remover a opção de ordenação das colunas 0 e 2
                ]
            });
        });

        function inativar(id) {
            var url = "?module=solicitacao&acao=inativar";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente cancelar esta Solicitação?<br /><b>",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function() { //CONFIRM      
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
    </script>