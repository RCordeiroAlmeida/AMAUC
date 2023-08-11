<?php
if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] == 2) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
}

$sql = "SELECT cli_nome, cli_cod FROM cliente WHERE cli_situacao = 1;";
$clientes = $data->find('dynamic', $sql);

$sql = "SELECT cli_nome, cli_cod FROM cliente WHERE cli_cod = " . $_SESSION['amauc_userCliente'];
$res_cliente = $data->find('dynamic', $sql);

$sql = "SELECT set_nome, set_cod FROM setor WHERE set_situacao = 1 AND mostrar = 1";
$setor = $data->find('dynamic', $sql);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Solicitações</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=solicitacao&acao=lista_pendente">Solicitações</a>
            </li>
            <li class="active">
                <strong>Nova Solicitação</strong>
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
            <h5>Nova Solicitação</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form role="form" action="?module=solicitacao&acao=grava_solicitacao" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" for="sol_data">Data da solicitação:</label>
                        <input name="sol_data" type="date" class="form-control blockenter" id="sol_data" style="text-transform:uppercase; text-align: center;" value="<?php echo date('Y-m-d') ?>" readonly></input>
                    </div>

                    <div style="visibility: hidden; width:0; height: 0;">
                        <label class="control-label" for="cli_cod">Código Cliente:</label>
                        <input name="cli_cod" type="text" class="form-control blockenter" id="cli_cod" value="<?php echo $res_cliente[0]['cli_cod'] ?>" readonly></input>
                    </div>

                    <div class="col-sm-10">
                        <label class="control-label" for="cli_nome">Cliente:</label>
                        <input type="text" class="form-control blockenter" id="cli_nome" value="<?php echo $res_cliente[0]['cli_nome'] ?>" disabled></input>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-sm-6">
                        <label class="control-label" for="sol_solicitante">Solicitante:</label>
                        <input name="sol_solicitante" type="text" class="form-control blockenter" id="sol_solicitante" style="text-transform:uppercase;" required></input>
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label" for="sol_cargo">Cargo:</label>
                        <input name="sol_cargo" type="text" class="form-control blockenter" id="sol_cargo" style="text-transform:uppercase;" required></input>
                    </div>

                </div>

                <div class="row form-group">

                    <div class="col-sm-6">
                        <label class="control-label" for="set_cod">Setor para qual deseja atendimento:</label><a onclick="infoSet()" data-toggle='modal' data-target='#sobreSet' class="pull-right">ver mais <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>
                        <select name="set_cod" type="text" class="form-control blockenter" id="set_cod">
                            <option value="" selected>--SELECIONE--</option>
                            <?php
                            for ($i = 0; $i < count($setor); $i++) {
                                echo '<option value="' . $setor[$i]['set_cod'] . '">' . $setor[$i]['set_nome'] . '</option>';
                            }
                            ?>
                        </select>
                        
                    </div>

                    <!---upload de arquivos--->
                    <div class="col-sm-6">
                        <label for="sol_anexo">Selecione um arquivo: (opcional)</label>
                        <input type="file" name="sol_anexo" class="filestyle" id="sol_anexo">
                    </div>
                    <!----------//------------>

                </div>

                <div class="row form-group">
                    <div class="col-sm-8">
                        <label class="control-label" for="sol_urgencia">Descricão:</label>
                        <textarea name="sol_descricao" type="text" class="form-control blockenter" contenteditable="true" id="sol_descricao" placeholder="Descreva o motivo do seu chamado max(300 caracteres)" required style="white-space: pre-wrap; height: 200px;" maxlenght="300"></textarea>
                    </div>

                    <div class="col-sm-4" style="padding-top: 30px; text-align: center">
                        <label class="control-label">Urgência do Serviço:</label>
                        <br />
                        <input type="radio" id="urgencia-baixa" name="sol_urgencia" value="1">
                        <label for="urgencia-baixa" style="display: inline-block; margin-right: 10px; background-color: #23C6C8; padding: 5px; border-radius: 3px; color: #fff; width: 50px">Baixa</label>

                        <input type="radio" id="urgencia-media" name="sol_urgencia" value="2">
                        <label for="urgencia-media" style="display: inline-block; margin-right: 10px; background-color: #FFC107; padding: 5px; border-radius: 3px; color: #fff; width: 50px">Média</label>

                        <input type="radio" id="urgencia-alta" name="sol_urgencia" value="3">
                        <label for="urgencia-alta" style="display: inline-block; margin-right: 10px; background-color: #DC3545; padding: 5px; border-radius: 3px; color: #fff; width: 50px">Alta</label>
                    </div>
                </div>
            </form>

            <div class="modal inmodal" id="sobreSet" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div id="sobre_setor"></div>
                </div>
            </div>
        </div>
    </div>


<script>
    var uploadField = document.getElementById("sol_anexo");

    uploadField.onchange = function() {
        if (this.files[0].size > 2097152) {
            alert("A capacidade máxima de upload é de 2MB");
            this.value = "";
        };
    }

    function infoSet(){
        url = 'application/script/ajax/info_setor.php?';
        div = 'sobre_setor';
        ajax(url, div);
    }

    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=solicitacao&acao=lista_pendente';
    }

    $(document).ready(function() {
        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });

    
    
</script>