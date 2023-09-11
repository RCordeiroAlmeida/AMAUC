<?php

    $sql = 'SELECT
                c.cmp_cod,
                c.usu_cod,
                u.usu_nome,
                c.cmp_status,
                c.cmp_data_pedido,
                c.cmp_responsavel
            FROM
                compensacao as c
                INNER JOIN usuario as u ON u.usu_cod = c.usu_cod
            WHERE
                cmp_situacao = 1
            ORDER BY
                cmp_data_pedido DESC';

    $compensacao = $data->find('dynamic', $sql);

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Compensação de horas</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Lançamentos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 col-xs-6" style="text-align:right;">
        <br /><br />
        <?php if ($_SESSION['amauc_userPermissao'] != 3) { ?>
            <a href="?module=relatorio&acao=novo_compensacao" class="btn btn-primary" style="height: 34px;">
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
                                            <th>Data do pedido</th>
                                            <th>Requerente</th>
                                            <th>Status</th>
                                            <th width="140px">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for ($i = 0; $i < count($compensacao); $i++) {
                                                $dt_pedido = explode(' ', $compensacao[$i]['cmp_data_pedido']);
                                                $dt_pedido = implode("/", array_reverse(explode("-", $dt_pedido[0]))).' '.$dt_pedido[1];

                                                switch ($compensacao[$i]['cmp_status']){
                                                    case 0:
                                                        $compensacao[$i]['cmp_status'] = "EM ANÁLISE";
                                                        $compensacao[$i]['cmp_observacao'] = "Seu pedido está sendo analisado pelo responsável ao qual foi dirigido, isso pode demorar algum tempo.";
                                                    break;
                                                    case 1:
                                                        $compensacao[$i]['cmp_status'] = "DEFERIDO";
                                                    break;
                                                    case 2:
                                                        $compensacao[$i]['cmp_status'] = "INDEFERIDO";
                                                    break;
                                                }
                                                echo '
                                                    <tr>
                                                        <td>' .  $dt_pedido. '</td>
                                                        <td>'.$compensacao[$i]['usu_nome'].'</td>
                                                        <td style="font-weight: 900; cursor: help" title="'.$compensacao[$i]['cmp_observacao'].'">' . $compensacao[$i]['cmp_status'] . '</td>';
                                            
                                        ?>
                                                        <td>
                                                            <form action="application/relatorio/view/compensacao/relatorio.php" method="post">
                                                                <input type="hidden" name="cmp_cod" value="<?php echo $compensacao[$i]['cmp_cod'] ?>">
                                                                <input type="hidden" name="user" value="<?php echo $compensacao[$i]['usu_nome']?>">
                                                                <button title="imprimir" type="submit" class="btn btn-warning" style="height: 34px;">
                                                                    <span class="fa fa-print"></span>
                                                                </button>
                                                                <?php
                                                                    if($compensacao[$i]['cmp_status'] == 'EM ANÁLISE'){
                                                                ?>
                                                                <a title="Deferir" onClick="ativar(<?php echo $compensacao[$i]['cmp_cod']?>)" class="btn btn-success" style="height: 34px;">
                                                                    <span class="fa fa-thumbs-up"></span>
                                                                </a>

                                                                <a title="Indeferir"onClick="inativar(<?php echo $compensacao[$i]['cmp_cod']?>)" class="btn btn-danger" style="height: 34px;">
                                                                    <span class="fa fa-thumbs-down"></span>
                                                                </a>
                                                                <?php
                                                                    }
                                                                ?>  
                                                            </form>
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
    <div class="modal inmodal" id="buscaConta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div id="retorno_conta"></div>
        </div>
    </div>

    <script>

        function ativar(id) {
            var url = "?module=relatorio&acao=aceitar_compensacao";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente deferir esse pedido?<br /><b>",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#18A689",
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

        function inativar(id) {
            var url = "?module=relatorio&acao=negar_compensacao";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente indeferir esse pedido?<br /><b>",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#EC4758",
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