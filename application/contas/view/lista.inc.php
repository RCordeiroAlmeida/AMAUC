<?php
    if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] == 3) {
        echo '<script>window.location="?module=index&acao=logout"</script>';
    }

    if ($_SESSION['amauc_userPermissao'] == 1){
        $where = "";
    } else{
        $where = "WHERE c.usu_cod = ".$_SESSION['amauc_userId'];
    }

    $sql = "SELECT
                c.con_cod,
                c.con_setor,
                c.con_data_ini, 
                c.con_data_fim,
                c.con_destino,
                u.usu_nome
            FROM
                conta AS c 
                INNER JOIN usuario AS u ON (c.usu_cod = u.usu_cod)".
            $where;

    $conta = $data->find('dynamic', $sql);

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
            echo 'toastr.success("Sucesso!", "Incluido!");';
            break;

        case 2:
            echo 'toastr.success("Sucesso!", "Atualizado!");';
            break;

        case 3:
            echo 'toastr.success("Sucesso!", "Exluido!");';
            break;

        case 4:
            echo 'toastr.info("Sucesso!", "Inativado!");';
            break;

        case 5:
            echo 'toastr.success("Sucesso!  ", "Reativado!");';
            break;
    }
    ?>
</script>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Contas</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Lançamentos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 col-xs-6" style="text-align:right;">
        <br /><br />
        <?php if ($_SESSION['amauc_userPermissao'] != 3) { ?>
            <a href="?module=contas&acao=novo" class="btn btn-primary" style="height: 34px;">
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
                                            <th>Data inicial</th>
                                            <th>Funcionário (Setor)</th>
                                            <th>Destino</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for ($i = 0; $i < count($conta); $i++) {
                                                $sql = "SELECT set_nome FROM setor WHERE set_cod =".$conta[$i]['con_setor'];
                                                $setor = $data->find('dynamic', $sql);

                                                $conta[$i]['con_data_ini'] = explode(" ", $conta[$i]['con_data_ini']);
                                                $dia = array_reverse(explode("-", $conta[$i]['con_data_ini'][0]));

                                                if ($conta[$i]['con_setor'] == 0){
                                                    $conta[$i]['con_setor'] = "ADMINISTRADOR";
                                                }
                                                echo '
                                                    <tr>
                                                        <td>' .  str_pad($conta[$i]['con_cod'], 4, '0', STR_PAD_LEFT). '</td>
                                                        <td>' . $dia[0].'/'.$dia[1].'/'.$dia[2].'</td>
                                                        <td>' . $conta[$i]['usu_nome'] . ' ('.$setor[0]['set_nome'].')</td>
                                                        <td>' . $conta[$i]['con_destino']. '</td>';
                                        ?>
                                                        <td>
                                                            <form action="application/relatorio/view/prestacao/relatorio.php" method="post">
                                                            <a href="#" onClick="busca_conta('<?php echo $conta[$i]['con_cod'] ?>')" data-toggle='modal' data-target='#buscaConta' class="btn btn-primary" style="height: 34px;">
                                                                <span class="fa fa-eye"></span>
                                                            </a>

                                                                <input type="hidden" name="con_cod" value="<?php echo $conta[$i]['con_cod'] ?>">
                                                                <button type="submit" class="btn btn-primary" style="height: 34px;">
                                                                    <span class="fa fa-print"></span>
                                                                </button>   
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

    <style type="text/css">
        .modal-dialog {
            width: 1200px !important;
        }
    </style>

    <script>

        function busca_conta(id){
            url = 'application/script/ajax/busca_conta.php?con_cod='+id;
            div = 'retorno_conta';
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