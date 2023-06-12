<?php
    if(!isset($_SESSION) && $_SESSION['amauc_userPermissao'] !=2){
        echo'<script>window.location="?module=index&acao=logout"</script>';
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
                s.sol_data,
                s.sol_descricao,
                s.cli_cod,
                s.set_cod,
                c.cli_nome,
                (SELECT u.usu_nome FROM atividade as a JOIN usuario as u ON(a.usu_cod = u.usu_cod) WHERE a.sol_cod = s.sol_cod ORDER BY a.sol_cod DESC LIMIT 0,1) AS usuario
            FROM
                solicitacao AS s
                INNER JOIN cliente AS c ON (s.cli_cod = c.cli_cod)
                ".$join."
            WHERE
                sol_status = 3 ".$where."
            ORDER BY
                sol_urgencia DESC,
                sol_data ASC";
    
    $ati= $data->find('dynamic', $sql);        

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
            echo 'toastr.info("Solicitação foi inregvada", "Inregvado!");';
            break;

        case 5:
            echo 'toastr.success("Solicitação foi reregvada", "Reregvado!");';
            break;
    }
    ?>
</script>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Solicitações</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Canceladas</strong>
            </li>
        </ol>
    </div>
    <?php if($_SESSION['amauc_userPermissao'] == 3){?>
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
                                            <th style="width:10px;">Data</th>
                                            <th style="width:10px;">Cód.</th>
                                            <th style="width:80px;">Descrição</th>
                                            <th style="width:80px;">Cliente</th>
                                            <th style="width:80px;">Responsável</th>
                                            <th style="width:10px;">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($ati); $i++) {
                                            $ati[$i]['sol_data'] = implode("/", array_reverse(explode("-", $ati[$i]['sol_data'])));
                                            echo '
                                                <tr>
                                                    <td>' . $ati[$i]['sol_data'] . '</td>
                                                    <td>' . str_pad($ati[$i]['sol_cod'], 4, '0', STR_PAD_LEFT) . '</td>
                                                    <td>' . $ati[$i]['sol_descricao'] . '</td>
                                                    <td>' . $ati[$i]['cli_nome'].'</td>
                                                    <td>' . $ati[$i]['usuario'].'</td>
                                                    <td>
                                                        <a href="#" onclick="nextPage(\'?module=solicitacao&acao=visualiza\', ' . $ati[$i]['sol_cod'] . ')">
                                                            <span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            ';
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
                ]
            });
        });

        function inativar(id, nome) {
            var url = "?module=sol icitacao&acao=inativar";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente cancelar esta Solicitação?<br /><b>" + nome + "</b>",
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
    </script>