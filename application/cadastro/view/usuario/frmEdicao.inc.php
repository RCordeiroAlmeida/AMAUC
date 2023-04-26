<?php
    if(!isset($_SESSION)){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }
    $sql = "SELECT * FROM usuario WHERE usu_cod =" . $_POST['param_0'];
    $result = $data->find('dynamic', $sql);

    $sql = "SELECT * FROM usuario_permissao WHERE upe_situacao = 1";
    $cargos = $data->find('dynamic', $sql);

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1";
    $setor = $data->find('dynamic', $sql);

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Usuário</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_usuario">Usuário</a>
            </li>
            <li class="active">
                <strong>Visualizar</strong>
            </li>
        </ol>
    </div>

    <div class="col-lg-3 col-xs-4" style="text-align:right;">
        <br /><br />
        <button class="btn btn-primary" onclick="$('#MyForm').valid() ? enviar():'';" type="submit"><i class="fa fa-check"></i><span class="hidden-xs hidden-sm"> Salvar</span></button>
        <button class="btn btn-default" onclick="voltar()">Voltar</button>
    </div>

</div>
<div id="result_var"></div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Formulário de Edição</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form role="form" action="?module=cadastro&acao=update_usuario" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
                <input name="usu_cod" type="hidden" class="form-control blockenter" id="usu_cod" value="<?php echo $result[0]['usu_cod']; ?>" />

                <div class="row form-group">

                    <div class="col-sm-4">
                        <label class="control-label" for="usu_nome">Nome de Usuário:</label>
                        <input name="usu_nome" type="text" class="form-control blockenter" id="usu_nome" value="<?php echo $result[0]['usu_nome']; ?>" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="usu_email">E-mail:</label>
                        <input name="usu_email" type="text" class="form-control blockenter" id="usu_mail" value="<?php echo $result[0]['usu_email']; ?>" required />
                    </div>
                </div>

                    <!-- Aparece apenas para o administrador -->
                    <?php
                    switch ($_SESSION['amauc_userPermissao']) {
                        case '1':

                    ?>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" for="usu_cod">Nível:</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="6" id="usu_cod" name="upe_cod">
                                    <option value="">-- Selecione --</option>
                                    <?php
                                    for ($i = 0; $i < count($cargos); $i++) {
                                        if ($result[0]['upe_cod'] == $cargos[$i]['upe_cod']) {
                                            echo '<option value="' . $cargos[$i]['upe_cod'] . '" selected>' . $cargos[$i]['upe_descricao'] . '</option>';
                                        } else {
                                            echo '<option value="' . $cargos[$i]['upe_cod'] . '">' . $cargos[$i]['upe_descricao'] . '</option>';
                                        }
                                    };
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4" id="setor">
                                <label class="control-label" for="set_cod">Setor:</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="6" name="set_cod" id="set_cod">
                                    <option value="">-- Selecione --</option>
                                    <?php
                                        for ($i = 0; $i < count($setor); $i++) {
                                            if ($result[0]['fun_cod'] == $setor[$i]['set_cod']){
                                                echo '<option value="'.$setor[$i]['set_cod'].'" selected>' . $setor[$i]['set_nome'] . '</option>';
                                            }else{
                                                echo '<option value="'.$setor[$i]['set_cod'].'">' . $setor[$i]['set_nome'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                            break;
                        
                        case '2':
                        ?>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" for="usu_cod">Nível:</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="6" id="usu_cod" name="upe_cod" disabled>
                                    <option value="">-- Selecione --</option>
                                    <?php
                                    for ($i = 0; $i < count($cargos); $i++) {
                                        if ($result[0]['upe_cod'] == $cargos[$i]['upe_cod']) {
                                            echo '<option value="' . $cargos[$i]['upe_cod'] . '" selected>' . $cargos[$i]['upe_descricao'] . '</option>';
                                        } else {
                                            echo '<option value="' . $cargos[$i]['upe_cod'] . '">' . $cargos[$i]['upe_descricao'] . '</option>';
                                        }
                                    };
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4" id="setor">
                                <label class="control-label" for="set_cod">Setor:</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="6" name="set_cod" id="set_cod" disabled>
                                    <option value="">-- Selecione --</option>
                                    <?php
                                        for ($i = 0; $i < count($setor); $i++) {
                                            if ($result[0]['fun_cod'] == $setor[$i]['set_cod']){
                                                echo '<option value="'.$setor[$i]['set_cod'].'" selected>' . $setor[$i]['set_nome'] . '</option>';
                                            }else{
                                                echo '<option value="'.$setor[$i]['set_cod'].'">' . $setor[$i]['set_nome'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                            break;
                            case '3':
                        ?>  
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" for="usu_cod">Nível:</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="6" id="usu_cod" name="upe_cod" disabled>
                                    <option value="">-- Selecione --</option>
                                    <?php
                                    for ($i = 0; $i < count($cargos); $i++) {
                                        if ($result[0]['upe_cod'] == $cargos[$i]['upe_cod']) {
                                            echo '<option value="' . $cargos[$i]['upe_cod'] . '" selected>' . $cargos[$i]['upe_descricao'] . '</option>';
                                        } else {
                                            echo '<option value="' . $cargos[$i]['upe_cod'] . '">' . $cargos[$i]['upe_descricao'] . '</option>';
                                        }
                                    };
                                    ?>
                                </select>
                            </div>
                        </div>
                    <?php
                            break;
                    }
                    ?>  
                    <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" for="usu_login">Login:</label>
                        <input name="usu_login" type="text" class="form-control blockenter" id="usu_login" value="<?php echo $result[0]['usu_login']; ?>" readonly />
                    </div>

                    <div class="col-sm-8">
                        <div class="input-group">
                            <label class="control-label" for="usu_senha">Senha:</label>
                            <div class="input-group">
                                <input name="usu_senha" type="password" class="form-control blockenter" id="editar_senha" value="<?php echo $result[0]['usu_senha']; ?>" disabled required />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="editar_senha" onclick="editarSenha()">Editar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>                       
                </div>
            </form>

        </div>
    </div>


<script>
    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=cadastro&acao=lista_usuario';
    }

    function editarSenha() {
        var editSenha = document.getElementById('editar_senha');
        editSenha.removeAttribute("disabled");
        editSenha.focus();
        editSenha.value = "";
    }

    $(document).ready(function() {
        $("#cli_cnpj").mask("99.999.999/9999-99");
        $("#cli_tel").mask("(99) 9999-9999?9");
        $("#cli_cep").mask("99999-999");


        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>