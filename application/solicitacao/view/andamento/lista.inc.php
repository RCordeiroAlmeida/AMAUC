<?php
if (!isset($_SESSION)) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
}

switch ($_SESSION['amauc_userPermissao']) {
    case '1': // ADMINISTRADOR
        $where = "";
        $join = "";
        break;
    case '2': // FUNCIONARIO
        $where = "AND fun_cod = " . $_SESSION['amauc_userFuncionario'];
        $join = "INNER JOIN funcionario AS f ON (s.set_cod = f.set_cod)";
        break;
    case '3': // CLIENTE
        $where = "AND c.cli_cod = " . $_SESSION['amauc_userCliente'];
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
            " . $join . "
        WHERE
            sol_status = 1 " . $where . "
        ORDER BY
            sol_urgencia DESC,
            sol_data ASC";
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
            echo 'toastr.success("Solicitação aceita", "Aceita!");';
            break;
    }
    ?>
    
</script>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Solicitações</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Em Andamento</strong>
            </li>
        </ol>
    </div>

    <?php if ($_SESSION['amauc_userPermissao'] == 3) { ?>
        <div class="col-lg-6 col-xs-6" style="text-align:right;">
            <br /><br />
            <a href="?module=solicitacao&acao=novo" class="btn btn-primary" style="height: 34px;">
                <span class="glyphicon glyphicon-plus-sign"></span> <span class="hidden-xs hidden-sm">Novo</span>
            </a>
        </div>
    <?php } ?>
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
                                                    $urgencia = '<small class="label label-warning"><i class="fa fa-exclamation-circle"></i> MÉDIA</small>';
                                                    break;

                                                case '3':
                                                    $urgencia = '<small class="label label-danger"><i class="fa fa-exclamation-triangle"></i> ALTA</small>';
                                                    break;
                                            }
                                            echo '
                                                <tr>
                                                    <td style="width:10px;">' . $urgencia . '</td>
                                                    <td>' . $ati[$i]['sol_data'] . '</td>
                                                    <td>' . str_pad($ati[$i]['sol_cod'], 4, '0', STR_PAD_LEFT) . '</td>
                                                    <td>' . $ati[$i]['sol_descricao'] . '</td>
                                                    <td>' . $ati[$i]['cli_nome'] . '</td>
                                                    <td>
                                                        <a href="#" onclick="nextPage(\'?module=solicitacao&acao=visualiza\', ' . $ati[$i]['sol_cod'] . ')">
                                                            <button class="btn btn-primary" title="Visualizar e/ou atender solicitação">
                                                            <i class="fa fa-cogs" aria-hidden="true"></i>
                                                            </button>
                                                        </a>';
                                        }
                                        ?>
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

    <script>
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

        function concluir(id, nome) {
            var url = "?module=solicitacao&acao=conclui";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente concluir esta Solicitação?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#04bd4e",
                confirmButtonText: "Sim",
                cancelButtonColor: "#ba1904",
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

        function inativar(id) {
            var url = "?module=solicitacao&acao=inativar";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente cancelar esta Solicitação?<br /><b>",
                type: "warning",
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

        $(document).ready(function() {

            var $formFields = $('#myModal');

            $formFields.on('change', function() {
                var formComplete = true;
                $formFields.each(function() {
                    if ($(this).val() === '') {
                        formComplete = false;
                        return false;
                    }
                });
            });
            if (formComplete) {
                $('#salvar2').removeAttr('disabled');
            }


            $("#MyForm").submit(function(event) {
                document.forms['MyForm'].submit();
            });

		});
    </script>