<?php
    if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
        echo'<script>window.location="?module=index&acao=logout"</script>';
    }

    $sql = "SELECT set_cod, set_nome, set_responsavel, set_descricao FROM setor WHERE set_cod = ".$_POST['param_0'];
    $result = $data->find('dynamic', $sql);

    $sql = "SELECT * FROM funcionario";
    $funcionario = $data->find('dynamic', $sql);
    
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Setores</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_setor">Setores</a>
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

            <form role="form" action="?module=cadastro&acao=update_setor" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
                <input name="set_cod" type="hidden" class="form-control blockenter" id="cid_cod" value="<?php echo $result[0]['set_cod']; ?>"/>

                <div class="row form-group">

                    <div class="col-sm-8">
                        <label class="control-label" for="set_nome">Setores:</label>
                        <input name="set_nome" type="text" class="form-control blockenter" id="set_nome" value="<?php echo $result[0]['set_nome']; ?>" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="set_responsavel">Responsável:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" id="set_responsavel" name="set_responsavel" required>
                            <option value="">-- Selecione --</option>
                            <?php
                                for ($i = 0; $i < count($funcionario); $i++) {
                                    if ($funcionario[$i]['fun_cod'] == $result[0]['set_responsavel']) {
                                        echo '<option value="' . $funcionario[$i]['fun_cod'] . '" selected>' . $funcionario[$i]['fun_nome'] . '</option>';
                                    } else {
                                        echo '<option value="' . $funcionario[$i]['fun_cod'] . '">' . $funcionario[$i]['fun_nome'] . '</option>';
                                    }
                                }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <label class="control-label" for="cid_nome">Descrição:</label>
                        <textarea name="set_descricao" type="text" class="form-control blockenter" id="set_descricao" style="text-transform:uppercase; height: 200px" required><?php echo $result[0]['set_descricao']; ?></textarea>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<script>

    function validapermissao(id){
        console.log(id);
        if(id != 1){
            alert('Você não tem permissão para acessar essa página');    
            window.location = "?module=cadastro&acao=lista_usuario";
        }
    }

    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=cadastro&acao=lista_setor';
    }

    $(document).ready(function() {
        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>