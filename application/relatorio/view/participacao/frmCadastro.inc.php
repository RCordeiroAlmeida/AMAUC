<?php
if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] == 2) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
}

$sql = "SELECT usu_cod, usu_nome FROM usuario WHERE usu_situacao = 1";
$responsavel = $data->find('dynamic', $sql);

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Participação em reuniões</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=relatorio&acao=lista_participacao">Participação em reuniões</a>
            </li>
            <li class="active">
                <strong>Novo cadastro</strong>
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

<form role="form" action="?module=relatorio&acao=grava_participacao" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
    <input type="hidden" name="usu_cod" value="<?php echo $_SESSION['amauc_userId'] ?>">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Novo</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="control-label" for="par_data_ini">Data Início:</label>
                        <input name="par_data_ini" type="date" class="form-control blockenter" id="par_data_ini" style="text-transform:uppercase;" onchange="dataMin(this.value)" required />
                    </div>
                    
                    <div class="col-sm-3">
                        <label class="control-label" for="par_data_fim">Data Final:</label>
                        <input name="par_data_fim" type="date" class="form-control blockenter" id="par_data_fim" style="text-transform:uppercase;" min="" required />
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="par_hora_ini">Hora Início:</label>
                        <input name="par_hora_ini" type="time" class="form-control blockenter" id="par_hora_ini" style="text-transform:uppercase;" onchange="horaMin(this.value)" required />
                    </div>
                    
                    <div class="col-sm-3">
                        <label class="control-label" for="par_hora_fim">Hora Fim:</label>
                        <input name="par_hora_fim" type="time" class="form-control blockenter" id="par_hora_fim" style="text-transform:uppercase;" required />
                    </div>
                </div>
                    
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="control-label" for="par_forma">Forma de participação</label>
                        <select name="par_forma" type="text" class="form-control blockenter" id="par_forma" required>
                            <option value="" selected disabled>--SELECIONE--</option>
                            <option value="1" >Organizador</option>
                            <option value="2" >Representante</option>
                            <option value="3" >Participante</option>
                            <option value="4" >Curso/Capacitação</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label" for="par_tipo">Tipo de reunião</label>
                        <select name="par_tipo" class="form-control blockenter" id="par_tipo " required>
                            <option value="" selected disabled>--SELECIONE--</option>
                            <option value="1" >Presencial</option>
                            <option value="2" >Virtual</option>
                            <option value="3" >Híbrida</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label" for="cmp_descricao">Entidade:</label>
                        <input type="text" class="form-control blockenter" name="par_entidade" id="par_entidade" required>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="par_local">Local:</label>
                        <input type="text" class="form-control blockenter" name="par_local" id="par_local" required>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-12">
                        <label class="control-label" for="par_descricao">Descrição:</label>
                        <textarea name="par_descricao" class="form-control blockenter" id="par_descricao" required></textarea>
                    </div>
                </div>


            </div> 
        </div>
  

<script>
    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=relatorio&acao=lista_participacao';
    }


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

    function dataMin(data_ini) {
        var data_fim = document.getElementById('par_data_fim');
        data_fim.setAttribute("min", data_ini);
    }
</script>