<?php
if (!isset($_SESSION)) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
}
$sql = "SELECT * FROM usuario AS u INNER JOIN usuario_permissao AS p ON u.upe_cod = p.upe_cod WHERE u.usu_situacao = 1";
$ati = $data->find('dynamic', $sql);

$sql = "SELECT * FROM usuario AS u INNER JOIN usuario_permissao AS p ON u.upe_cod = p.upe_cod WHERE usu_situacao = 0";
$ina = $data->find('dynamic', $sql);

$user = [$_SESSION['amauc_userId'], $_SESSION['amauc_userName']];

$sql = "SELECT upe_descricao FROM usuario_permissao WHERE upe_cod = " . $_SESSION['amauc_userPermissao'];
$usu_cargo = $data->find('dynamic', $sql);

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
            echo 'toastr.success("Usuário cadastrado com sucesso!", "Incluido!");';
            break;

        case 2:
            echo 'toastr.success("Usuário atualizado com sucesso", "Atualizado!");';
            break;

        case 3:
            echo 'toastr.success("Usuário excluido com sucesso", "Exluido!");';
            break;

        case 4:
            echo 'toastr.info("Usuário foi inativado", "Inativado!");';
            break;

        case 5:
            echo 'toastr.success("Usuário foi reativado", "Reativado!");';
            break;
    }
    ?>
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6 col-xs-6">
        <h2>Usuários</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Usuários</strong>
            </li>
        </ol>
    </div>
    <?php if ($_SESSION['amauc_userPermissao'] == 1) { ?>
        <div class="col-lg-6 col-xs-6" style="text-align:right;">
            <br /><br />
            <a href="?module=cadastro&acao=novo_usuario" class="btn btn-primary" style="height: 34px;">
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
                    <?php if ($_SESSION['amauc_userPermissao'] == 1) { ?>
                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-thumbs-o-up"></i>Ativos (<?php echo count($ati); ?>)</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-thumbs-o-down"></i>Inativos (<?php echo count($ina); ?>)</a></li>
                    <?php } else { ?>
                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-thumbs-o-up"></i>Ativos</a></li>
                    <?php } ?>

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
                                            <th style="width:80px;">Usuário</th>
                                            <th style="width:10px;">Cargo</th>
                                            <th style="width:10px;">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_SESSION['amauc_userPermissao'] == 1) {
                                            for ($i = 0; $i < count($ati); $i++) {
                                                echo '
                                                    <tr>
                                                        <td>' . str_pad($ati[$i]['usu_cod'], 4, '0', STR_PAD_LEFT) . '</td>
                                                        <td>' . $ati[$i]['usu_nome'] . '</td>
                                                        <td>' . $ati[$i]['upe_descricao'] . '</td>
                                                        <td>
                                                            <a href="#" onclick="nextPage(\'?module=cadastro&acao=visualiza_usuario\', ' . $ati[$i]['usu_cod'] . ')">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                            <a href="#" onclick="nextPage(\'?module=cadastro&acao=edita_usuario\', '.$ati[$i]['usu_cod'].')">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                            <a href="#" onClick=\'inativar("' . $ati[$i]['usu_cod'] . '", "' . $ati[$i]['usu_nome'] . '");\' title="Inativar Usuário" style="text-decoration:none;">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-thumbs-o-down fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    ';
                                            }
                                        } else {
                                            echo '
                                                    <tr>
                                                        <td>' . str_pad($user[0], 4, '0', STR_PAD_LEFT) . '</td>
                                                        <td>' . $user[1] . '</td>
                                                        <td>' . $usu_cargo[0]['upe_descricao'] . '</td>
                                                        <td><a href="#" onclick="nextPage(\'?module=cadastro&acao=edita_usuario\', ' . $user[0] . ')">
                                                            <span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>                                                 
                                                    </tr>

                                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php if ($_SESSION['amauc_userPermissao'] == 1) { ?>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow-x: initial;">
                                    <br class="hidden-md hidden-lg" />
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="width:10px;">Cód.</th>
                                                <th style="width:80px;">Usuário</th>
                                                <th style="width:10px;">Nível</th>
                                                <th style="width:10px;">...</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                for ($i = 0; $i < count($ina); $i++) {
                                                    echo '
                                                    <tr>
                                                        <td>' . $ina[$i]['usu_cod'] . '</td>
                                                        <td>' . $ina[$i]['usu_nome'] . '</td>
                                                        <td>' . $ina[$i]['upe_descricao'] . '</td>
                                                        <td>    
                                                            <a href="#" onClick=\'ativar("' . $ina[$i]['usu_cod'] . '", "' . $ina[$i]['usu_nome'] . '");\' title="Reativar Usuário" style="text-decoration:none;">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                        
                                                    ';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
                "order": [
                    [0, "asc"]
                ]
            });
        });

        function inativar(id, nome) {
            var url = "?module=cadastro&acao=inativar_usuario";

            swal({
                title: "Você tem certeza?	",
                text: "Deseja realmente inativar este Usuário?<br /><b>" + nome + "</b>",
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

        function ativar(id, nome) {
            var url = "?module=cadastro&acao=ativar_usuario";

            swal({
                title: "Você tem certeza?",
                text: "Deseja realmente reativar este Usuário?<br /><b>" + nome + "</b>",
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