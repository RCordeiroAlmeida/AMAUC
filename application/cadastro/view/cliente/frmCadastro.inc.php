<?php
    if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }
    
    $sql = "SELECT * FROM cidade WHERE cid_situacao = 1;";
    $cidades = $data->find('dynamic', $sql);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Clientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_cliente">Cliente</a>
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

            <form role="form" action="?module=cadastro&acao=grava_cliente" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">


                <!-- Identificação -->
                <div class="row form-group">
                    <div class="col-sm-8">
                        <label class="control-label" for="cli_nome">Cliente:</label>
                        <input name="cli_nome" type="text" class="form-control blockenter" id="cli_nome" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="cli_cnpj">CNPJ:</label>
                        <input name="cli_cnpj" type="text" class="form-control blockenter" id="cli_cnpj" style="text-transform:uppercase;" keyboardType="numeric" required />
                    </div>
                </div>

                <!-- Contato -->
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="cli_tel">Telefone:</label>
                        <input name="cli_tel" type="text" class="form-control blockenter" id="cli_tel" style="text-transform:uppercase;" maxlength="15" data-js="phone" required />
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label" for="est_uf">E-mail:</label>
                        <input name="cli_mail" type="text" class="form-control blockenter" id="cli_mail" required />
                    </div>
                </div>

                <!-- Endereço -->
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" for="cli_nome">Logradouro:</label>
                        <input name="cli_endereco" type="text" class="form-control blockenter" id="cli_endereco" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-1">
                        <label class="control-label" for="est_uf">Nº:</label>
                        <input name="cli_nro_endereco" type="text" class="form-control blockenter" id="cli_nro_endereco" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="est_uf">Bairro:</label>
                        <input name="cli_bairro" type="text" class="form-control blockenter" id="cli_bairro" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="est_uf">Cep:</label>
                        <input name="cli_cep" type="text" class="form-control blockenter" id="cli_cep" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="cid_cod">Cidade:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" id="cid_cod" onchange="busca_cidade(this.value, 'cid_cod');" name="cid_cod" required>
                            <option value="">-- Selecione --</option>
                            <?php
                            for ($i = 0; $i < count($cidades); $i++) {
                                echo '<option value="' . $cidades[$i]['cid_cod'] . '">' . $cidades[$i]['cid_nome'] . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" for="usu_login">Usuário:</label>
                        <input name="usu_login" type="text" class="form-control blockenter" id="usu_login" required />
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label" for="usu_senha">Senha:</label>
                        <input name="usu_senha" type="password" class="form-control blockenter" id="usu_senha" required />
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
        window.location.href = '?module=cadastro&acao=lista_cliente';
    }

    function expulsa() {
        window.alert('Você não tem permissão para acessar essa página!');
    }


    $(document).ready(function() {
        $("#cli_cnpj").mask("99.999.999/9999-99");
        $("#cli_tel").mask("(99) 9999-9999?9");
        $("#cli_cep").mask("99999-999");

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