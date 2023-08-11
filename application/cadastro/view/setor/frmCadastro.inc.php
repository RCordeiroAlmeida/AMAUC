<?php
    if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }

    $sql = "SELECT fun_cod, fun_nome FROM funcionario";
    $funcionarios = $data->find('dynamic', $sql);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Setores</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_setor">Setores</a>
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

            <form role="form" action="?module=cadastro&acao=grava_setor" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="set_nome">Setor:</label>
                        <input name="set_nome" type="text" class="form-control blockenter" id="set_nome" style="text-transform:uppercase;" required />
                    </div>                

                    <div class="col-sm-4">
                        <label class="control-label" for="set_responsavel">Responsável:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" id="set_responsavel" name="set_responsavel" required>
                            <option value="">-- Selecione --</option>
                            <?php
                                for ($i = 0; $i < count($funcionarios); $i++) {
                                    echo '<option value="' . $funcionarios[$i]['fun_cod'] . '">' . $funcionarios[$i]['fun_nome'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="mostrar">Mostrar p/ cliente:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" id="mostrar" name="mostrar" required>
                            <option value="1" selected>Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12">
                        <label class="control-label" for="set_descricao">Descrição:</label>
                        <textarea name="set_descricao" type="text" class="form-control blockenter" id="set_descricao" style="text-transform:uppercase;" placeholder="Insira uma breve descrição do setor e dos assuntos tratados pelo mesmo" required></textarea>
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
        window.location.href = '?module=cadastro&acao=lista_setor';
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