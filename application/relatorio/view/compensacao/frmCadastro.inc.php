<?php
if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] == 2) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
}

$sql = "SELECT usu_cod, usu_nome FROM usuario WHERE usu_situacao = 1";
$responsavel = $data->find('dynamic', $sql);

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Compensação de Horas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=relatorio&acao=lista_compensacao">Compensação de horas</a>
            </li>
            <li class="active">
                <strong>Novo pedido</strong>
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

<form role="form" action="?module=relatorio&acao=grava_compensacao" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
    <input type="hidden" name="usu_cod" value="<?php echo $_SESSION['amauc_userId'] ?>">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Novo Lançamento</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" for="cmp_responsavel">Responsável:</label>
                        <select class="form-control selectpicker" data-live-search="true" data-size="6" name="cmp_responsavel" id="cmp_responsavel" required>
                            <option value="">-- Selecione --</option>
                            <?php
                            for ($i = 0; $i < count($responsavel); $i++) {
                                echo '<option value="' . $responsavel[$i]['usu_cod'] . '">' . $responsavel[$i]['usu_nome'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="cmp_cpf_fun">CPF do requerente:</label>
                        <input name="cmp_cpf_fun" type="text" class="form-control blockenter" id="cmp_cpf_fun" required />
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="cmp_ins_fun">Instituição do requerente:</label>
                        <input name="cmp_ins_fun" type="text" class="form-control blockenter" id="cmp_ins_fun" style="text-transform:uppercase;" required />
                    </div>
                </div>
                <div class="datas-container">
                    <div class="col-sm-2" id="datas_falta_container">
                        <label for="datas_falta">Datas de falta:</label>
                        <input type="date" class="form-control datas_falta" name="datas_falta[0]" required>
                    </div>
                    <div class="col-sm-2">
                        <br/>
                        <button type="button" class="btn btn-primary" id="adicionar_data" onclick="add_data()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
                    

                <div class="row form-group">
                    <div class="col-sm-12">
                        <label class="control-label" for="cmp_descricao">Descrição:</label>
                        <textarea name="cmp_descricao" class="form-control blockenter" id="cmp_descricao" required></textarea>
                    </div>
                </div>
            </div>

            <div id="prox_item"></div>
        </div>
  

<script>
    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=relatorio&acao=lista_compensacao';
    }

    $(document).ready(function() {
        $("#cmp_cpf_fun").mask("999.999.999-99");

        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>

<script>
    let contadorCampos = 0;

    function add_data() {
        const container = document.getElementById("datas_falta_container");

        const input = document.createElement("input");
        input.type = "date";
        input.className = "form-control datas_falta";
        input.name = "datas_falta[" + contadorCampos + "]";
        input.required = true;

        const removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "btn btn-danger btn-remove";
        removeButton.textContent = "Remover";
        removeButton.addEventListener("click", function() {
            container.removeChild(input);
            container.removeChild(removeButton);
        });

        container.appendChild(input);
        container.appendChild(removeButton);

        contadorCampos++; // Incrementa o contador
    }
</script>