<?php
    if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }  
    
    $sql = "SELECT * FROM usuario_permissao WHERE upe_situacao = 1 AND upe_cod != 3";
    $cargos = $data->find('dynamic', $sql);

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1;";
    $setor = $data->find('dynamic', $sql);

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Usuários</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_usuario">Usuário</a>
            </li>
            <li class="active">
                <strong>Novo</strong>
            </li>
        </ol>
    </div>

    <div class="col-lg-3 col-xs-4" style="text-align:right;">
        <br /><br />
        <button class="btn btn-primary" onclick="$('#MyForm').valid() ? enviar():'';" type="submit"><i class="fa fa-check"></i><span class="hidden-xs hidden-sm"> Salvar</span></button>
        <button class="btn btn-default" onclick="voltar();" type="button"><i class="fa fa-times"></i><span class="hidden-xs hidden-sm"> Cancelar</span></button>
    </div>
</div>
<div id="result_var"></div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Formulário de Cadastro</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            <form role="form" action="?module=cadastro&acao=grava_usuario" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="usu_nome">Nome de usuário:</label>
                        <input name="usu_nome" type="text" class="form-control blockenter" id="usu_nome" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="usu_login">Login:</label>
                        <input name="usu_login" type="text" class="form-control blockenter" id="usu_login" required />
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="usu_senha">Senha:</label>
                        <input name="usu_senha" type="password" class="form-control blockenter" id="usu_senha" required />
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-sm-6">
                        <label class="control-label" for="usu_email">E-mail:</label>
                        <input name="usu_email" type="text" class="form-control blockenter" id="usu_email" required />
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label" for="upe_cod">Nível:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" name="upe_cod" id="upe_cod" onchange="setor(this.value);" required>
                            <option value="">-- Selecione --</option>
                            <?php
                                for ($i = 0; $i < count($cargos); $i++) {
                                    echo '<option value="' . $cargos[$i]['upe_cod'] . '">' . $cargos[$i]['upe_descricao'] . '</option>';
                                }
                           ?>
                        </select>
                    </div>
                    <div class="col-sm-3" id="setor" style="display: none">
                        <label class="control-label" for="set_cod">Setor:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" name="set_cod" id="set_cod" required>
                            <option value="">-- Selecione --</option>
                            <?php
                                for ($i = 0; $i < count($setor); $i++) {
                                    echo '<option value="'.$setor[$i]['set_cod'].'">' . $setor[$i]['set_nome'] . '</option>';
                                }
                           ?>
                        </select>
                    </div>
                </div>
            </form>

        </div>
    </div>

<script>
    
    function setor(id){
        if (id == 2){
            document.getElementById('setor').style.display = 'block';
            document.getElementById('set_cod').removeAttribute('disabled', 'disabled');
            document.getElementById('set_cod').setAttribute('required', 'required');

        }else{
            document.getElementById('setor').style.display = 'none';
            document.getElementById('set_cod').setAttribute('disabled', 'disabled');
            document.getElementById('set_cod').removeAttribute('required', 'required');
        }
    }

    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=cadastro&acao=lista_usuario';
    }

    $(document).ready(function() {

        $("#MyForm").validate({
            rules: {
                cli_nome: {
                    required: true,
                    minlength: 3
                },
                cid_codigo: {
                    required: true
                }
            }
        });
        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>