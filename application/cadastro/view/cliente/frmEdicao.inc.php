<?php
    if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }

    $sql = "SELECT * FROM cliente WHERE cli_cod = " . $_POST['param_0'];
    $result = $data->find('dynamic', $sql);

    $sql = "SELECT * FROM cidade WHERE cid_situacao = 1";
    $cidade = $data->find('dynamic', $sql);

?>
<body onload="validapermissao(<?php echo $_SESSION['amauc_userPermissao']; ?>);">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Cliente</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_cliente">Cliente</a>
            </li>
            <li class="active">
                <strong>Editar</strong>
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
            <h5>Formulário de Edição</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form role="form" action="?module=cadastro&acao=update_cliente" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
                <input name="cli_cod" type="hidden" class="form-control blockenter" id="cli_cod" value="<?php echo $result[0]['cli_cod']; ?>" />

                <div class="row form-group">

                    <div class="col-sm-8">
                        <label class="control-label" for="cli_nome">Cliente:</label>
                        <input name="cli_nome" type="text" class="form-control blockenter" id="cli_nome" value="<?php echo $result[0]['cli_nome']; ?>" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="cli_cnpj">CNPJ:</label>
                        <input name="cli_cnpj" type="text" class="form-control blockenter" id="cli_cnpj" value="<?php echo $result[0]['cli_cnpj']; ?>" required />
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="cli_tel">Telefone:</label>
                        <input name="cli_tel" type="text" class="form-control blockenter" id="cli_tel" value="<?php echo $result[0]['cli_tel']; ?>" required />
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label" for="cli_mail">E-mail:</label>
                        <input name="cli_mail" type="text" class="form-control blockenter" id="cli_mail" value="<?php echo $result[0]['cli_mail']; ?>" required />
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" for="cli_endereco">Logradouro:</label>
                        <input name="cli_endereco" type="text" class="form-control blockenter" id="cli_endereco" value="<?php echo $result[0]['cli_endereco']; ?>" required />
                    </div>
                    <div class="col-sm-1">
                        <label class="control-label" for="cli_nro_endereco">Nº:</label>
                        <input name="cli_nro_endereco" type="text" class="form-control blockenter" id="cli_nro_endereco" value="<?php echo $result[0]['cli_nro_endereco']; ?>" required />
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label" for="cli_bairro">Bairro:</label>
                        <input name="cli_bairro" type="text" class="form-control blockenter" id="cli_bairro" value="<?php echo $result[0]['cli_bairro']; ?>" required />
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label" for="cli_cep">CEP:</label>
                        <input name="cli_cep" type="text" class="form-control blockenter" id="cli_cep" value="<?php echo $result[0]['cli_cep']; ?>" required />
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label" for="cid_cod">Cidade:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" id="cid_cod" onchange="busca_cidade(this.value, 'cid_cod');" name="cid_cod" required>
                            <option value="">-- Selecione --</option>
                            
                            <?php
                                for ($i = 0; $i < count($cidade); $i++) {
                                    if ($cidade[$i]['cid_cod'] == $result[0]['cid_cod']) {
                                        echo '<option value="' . $cidade[$i]['cid_cod'] . '" selected>' . $cidade[$i]['cid_nome'] . '</option>';
                                    } else {
                                        echo '<option value="' . $cidade[$i]['cid_cod'] . '">' . $cidade[$i]['cid_nome'] . '</option>';
                                    }
                                }
                            ?>

                        </select>
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

    $(document).ready(function() {
        $("#cli_cnpj").mask("99.999.999/9999-99");
        $("#cli_tel").mask("(99) 9999-9999?9");
        $("#cli_cep").mask("99999-999");


        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>