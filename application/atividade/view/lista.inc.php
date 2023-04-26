<?php
if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] != 2) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
}

switch ($_SESSION['amauc_userPermissao']) {
    case '1': // ADMINISTRADOR
        $where = "";
        $join = "";
        break;
    case '2': // FUNCIONARIO
        $where = "AND a.usu_cod = " . $_SESSION['amauc_userId'];
        $join = "INNER JOIN funcionario AS f ON (s.set_cod = f.set_cod)";
        break;
    case '3': // CLIENTE
        $where = "AND a.cli_cod = " . $_SESSION['amauc_userCliente'];
        $join = "";
        break;
}

$hoje = date('Y-m-d');
$hoje = implode("/", array_reverse(explode("-", $hoje)));

$sql = "SELECT cli_cod, cli_nome FROM cliente WHERE cli_situacao = 1";
$cliente = $data->find('dynamic', $sql);

$sql = "SELECT atp_cod, atp_descricao FROM atividade_tipo WHERE atp_situacao = 1";
$tipo_atividade = $data->find('dynamic', $sql);

$sql = "SELECT afr_cod, afr_descricao FROM atividade_forma WHERE afr_situacao = 1";
$forma_atendimento = $data->find('dynamic', $sql);

$sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1;";
$selectSetor = $data->find('dynamic', $sql);


$sql = "SELECT
            a.ati_cod,
            a.ati_data,
            a.ati_solicitante,
            a.ati_cargo,
            a.ati_descricao,
            a.ati_tempo,
            a.cli_cod,
            c.cli_nome,
            f.afr_descricao,
            t.atp_descricao
        FROM
            atividade AS a
            LEFT JOIN cliente AS c ON a.cli_cod = c.cli_cod
            LEFT JOIN atividade_forma AS f ON a.afr_cod = f.afr_cod
            LEFT JOIN atividade_tipo AS t ON a.atp_cod = t.atp_cod
        WHERE
            a.sol_cod = 0 " . $where . "
            ORDER BY a.ati_cod DESC";

$ati = $data->find('dynamic', $sql);
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
        <h2>Atividades Sem Solicitação</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Avulsas</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 col-xs-6" style="text-align:right;">
        <br /><br />
        <?php if ($_SESSION['amauc_userPermissao'] != 3) { ?>
            <a href="#" data-toggle='modal' data-target='#novaAtividade' class="btn btn-primary" style="height: 34px;">
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
                                            <th>Cód.</th>
                                            <th>Data</th>
                                            <th>Tipo</th>
                                            <th>Atendimento</th>
                                            <th>Cliente</th>
                                            <th>Solicitante (Cargo)</th>
                                            <th>Descrição</th>
                                            <th>Tempo de Execução</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for ($i = 0; $i < count($ati); $i++) {
                                                $ati[$i]['ati_data'] = implode("/", array_reverse(explode("-", $ati[$i]['ati_data'])));
                                                echo '
                                                    <tr>
                                                        <td>' .  str_pad($ati[$i]['ati_cod'], 4, '0', STR_PAD_LEFT). '</td>
                                                        <td>' . $ati[$i]['ati_data'] . '</td>
                                                        <td>' . $ati[$i]['atp_descricao'] . '</td>
                                                        <td>' . $ati[$i]['afr_descricao'] . '</td>
                                                        <td>' . $ati[$i]['cli_nome'] . '</td>
                                                        <td>' . $ati[$i]['ati_solicitante'] . ' ('.$ati[$i]['ati_cargo'].')</td>
                                                        <td>' . $ati[$i]['ati_descricao']. '</td>
                                                        <td>' . $ati[$i]['ati_tempo']. '</td>';
                                            
                                        ?>
                                                        <td>
                                                            <a href="#" onClick="busca_atividade('<?php echo $ati[$i]['ati_cod'] ?>', '<?php echo $_SESSION['amauc_userId'] ?>', '<?php echo $_SESSION['amauc_userPermissao'] ?>')" data-toggle='modal' data-target='#editaAtividade' class="btn btn-primary" style="height: 34px;">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                        </td>
                                        <?php }?>
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
    <div class="modal inmodal" id="novaAtividade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form role="form" action="?module=atividade&acao=grava_atividade" id="MyForm" method="post" enctype="multipart/form-data">

                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                        <h4 class="modal-title">Nova Atividade</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="sol_data">Data:</label>
                                <input name="sol_data" type="text" class="form-control blockenter" id="sol_data" style="text-transform:uppercase; text-align: center;" value="<?php echo $hoje ?>" readonly></input>
                            </div>
    
                            <div class="col-sm-4">
                                <label class="control-label">Cliente:</label>
                                <select name="cli_cod" type="text" class="form-control blockenter" id="cli_cod" required>
                                    <option value="">--Selecione--</option>
                                    <?php
                                    for ($i = 0; $i < count($cliente); $i++) {
                                        echo '<option value="' . $cliente[$i]['cli_cod'] . '" >' . $cliente[$i]['cli_nome'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-sm-3">
                                <label class="control-label" for="ati_solicitante">Solicitante:</label>
                                <input name="ati_solicitante" type="text" class="form-control blockenter" id="ati_solicitante" style="text-transform:uppercase;" required></input>
                            </div>

                            <div class="col-sm-3">
                                <label class="control-label" for="ati_cargo">Cargo:</label>
                                <input name="ati_cargo" type="text" class="form-control blockenter" id="ati_solicitante" style="text-transform:uppercase;" required></input>
                            </div>
                            
                           

                        </div>

                        <div class="row form-group">
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
                            <div class="col-sm-3">
                                <label class="control-label">Status:</label>
                                <select name="sol_status" type="text" class="form-control blockenter" id="sol_status">
                                    <option value="1" selected>Em Andamento</option>
                                    <option value="2">Concluído</option>
                                    <option value="3">Cancelado</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Tempo de Execução:</label>
                                <input class="form-control" name="ati_tempo" id="ati_tempo" rows="5" required/>
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
    <div class="modal inmodal" id="editaAtividade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div id="retorno_atividade"></div>
        </div>
    </div>

    <style type="text/css">
        .modal-dialog {
            width: 1200px !important;
        }
    </style>

    <script>
        function busca_atividade(id, user, permission){
            url = 'application/script/ajax/edita_atividade.php?ati_cod='+id+'&user='+user+'&permission='+permission;
            div = 'retorno_atividade';
            ajax(url, div);
        }

        $(document).ready(function() {
            $("#ati_tempo").mask("99:99");

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

    </script>