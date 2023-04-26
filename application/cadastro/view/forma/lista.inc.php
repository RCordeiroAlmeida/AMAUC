<?php
    if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }

    $sql = "SELECT * FROM atividade_forma WHERE afr_situacao = 1";
    $ati = $data->find('dynamic', $sql);

    $sql = "SELECT * FROM atividade_forma WHERE afr_situacao = 0";
    $ina = $data->find('dynamic', $sql);
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
            echo 'toastr.success("Cadastrado com sucesso!", "Incluido!");';
            break;

        case 2:
            echo 'toastr.success("Atualizado com sucesso", "Atualizado!");';
            break;

        case 3:
            echo 'toastr.success("Excluido com sucesso", "Exluido!");';
            break;

        case 4:
            echo 'toastr.info(" ", "Inativado!");';
            break;

        case 5:
            echo 'toastr.success(" ", "Reativado!");';
            break;
    }
    ?>
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Formas Atendimento</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Forma de Atendimento</strong>
            </li>
        </ol>
    </div>
    <?php if($_SESSION['amauc_userPermissao'] == 1){?>
    <div class="col-lg-6 col-xs-6" style="text-align:right;">
        <br /><br />
        <a href="?module=cadastro&acao=novo_forma" class="btn btn-primary" style="height: 34px;">
            <span class="glyphicon glyphicon-plus-sign"></span> <span class="hidden-xs hidden-sm">Novo</span>
        </a>
    </div>
    <?php }?>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-thumbs-o-up"></i>Ativos (<?php echo count($ati); ?>)</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-thumbs-o-down"></i>Inativos (<?php echo count($ina); ?>)</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow-x: initial;">
                                <br class="hidden-md hidden-lg" />
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:10px;">Cód.</th>
                                            <th style="width:80px;">Forma Atendimento</th>
                                            <th style="width:10px;">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($ati); $i++) {
                                            echo '
                                            <tr>
                                                <td>' . str_pad($ati[$i]['afr_cod'], 4, '0', STR_PAD_LEFT) . '</td>
                                                <td>' . $ati[$i]['afr_descricao'] . '</td>
                                                <td>';
                                                    if($_SESSION['amauc_userPermissao']==1){
                                                        echo'
                                                            <a href="#" onclick="nextPage(\'?module=cadastro&acao=edita_forma\', ' . $ati[$i]['afr_cod'] . ')">
                                                            <span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                            </a>
                                                            <a href="#" onClick=\'inativar("' . $ati[$i]['afr_cod'] . '", "' . $ati[$i]['afr_descricao'] . '");\' title="Inativar Forma de Atendimento" style="text-decoration:none;">
                                                            <span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-thumbs-o-down fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                            </a>
                                                </td>
                                            </tr>';
                                                    }
                                                    
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow-x: initial;">
                                <br class="hidden-md hidden-lg" />
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:10px;">Cód.</th>
                                            <th style="width:80px;">Cliente</th>
                                            <?php if($_SESSION['amauc_userPermissao'] == 1){?>
                                            <th style="width:10px;">...</th>
                                            <?php }?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($ina); $i++) {
                                            echo '
                                            <tr>
                                                <td>'.str_pad($ina[$i]['afr_cod'], 4, '0', STR_PAD_LEFT).'</td>
                                                <td>' . $ina[$i]['afr_descricao'] . '</td>
                                            ';
                                            if($_SESSION['amauc_userPermissao'] == 1){

                                                echo'
                                                    <td>
                                                        <a href="#" onClick=\'ativar("' . $ina[$i]['afr_cod'] . '", "' . $ina[$i]['afr_)descricao'] . '");\' title="Inativar Cliente" style="text-decoration:none;">
                                                            <span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>
                                                    </td>
                                            </tr>';
                                            }
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

        function inativar(id, nome) {
            var url = "?module=cadastro&acao=inativar_forma";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente inativar esta Forma de Atendimento<br /><b>" + nome + "</b>",
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

        function ativar(id, nome) {
            var url = "?module=cadastro&acao=ativar_forma";

            swal({
                title: "Você tem certeza?",
                text: "Deseja realmente ativar este Forma de Atendimento?<br /><b>" + nome + "</b>",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function() { //CONFIRM      
                nextPage(url, id);
            }, function(dismiss) {
                //dismiss can be 'cancel', 'overlay', 'close', 'timer'
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