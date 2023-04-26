<?php 
    if($_SESSION['amauc_userPermissao'] != 1 && ($_SESSION['amauc_userPermissao']) != 2){
        echo'<script>window.location="?module=index&acao=logout"</script>';
        exit();
    }

    $sql = "SELECT * FROM agenda WHERE age_cod =".$_GET['id'];
    $result = $data->find('dynamic', $sql);

    
	$aux_ini = explode(" ", $result[0]['age_hora_ini']);
    
	$data_ini = $aux_ini[0];
	$hora_ini = $aux_ini[1];
    
	$aux_fim = explode(" ", $result[0]['age_hora_fim']);
    
	$data_fim = $aux_fim[0];
	$hora_fim = $aux_fim[1];
    
    $sql = "SELECT agt_descricao, agt_cod FROM agenda_tipo WHERE agt_situacao = 1";
    $tipo = $data->find('dynamic', $sql);
    
    $sql = "SELECT vei_nome, vei_cod FROM veiculo WHERE vei_situacao = 1";
    $veiculo = $data->find('dynamic', $sql);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Agendamentos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=agendamento&acao=lista">Sala</a>
            </li>
            <li class="active">
                <strong>Novo agendamento da sala de reuniões</strong>
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
            <h5>Agendamento de sala</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form role="form" action="?module=agendamento&acao=update_agendamento" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">
                <input type="hidden" name="age_cod" value="<?php echo $_GET['id']?>">

                <div class="row form-group">
                    
                    <div class="col-sm-2">
                        <label class="control-label" for="data_ini">Data Início:</label>
                        <input name="data_ini" type="date" class="form-control blockenter" value="<?php echo $data_ini?>" id="data_ini" style="text-transform:uppercase;" required />
                    </div>
                    
                    <div class="col-sm-2">
                        <label class="control-label" for="age_hora_ini">Hora Início:</label>
                        <input name="age_hora_ini" type="time" class="form-control blockenter" value="<?php echo $hora_ini?>" id="age_hora_ini" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="data_fim">Data Final:</label>
                        <input name="data_fim" type="date" class="form-control blockenter" value="<?php echo $data_fim?>" id="data_fim" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="age_hora_fim">Hora Fim:</label>
                        <input name="age_hora_fim" type="time" class="form-control blockenter" value="<?php echo $hora_fim?>" id="age_hora_fim" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="data_fim">Tipo de Agendamento:</label>
                        <select name="age_tipo" type="text" class="form-control blockenter" id="agt_cod" onchange="habilita(this.value)">
                            <option value="" selected>--SELECIONE--</option>
                            <?php
                                for ($i = 0; $i < count($tipo); $i++) {
                                    if($result[0]['age_tipo'] == $tipo[$i]['agt_cod']){
                                        echo '<option value="' . $tipo[$i]['agt_cod'] . '"selected>' . $tipo[$i]['agt_descricao'] . '</option>';
                                    }else{
                                        echo '<option value="' . $tipo[$i]['agt_cod'] . '">' . $tipo[$i]['agt_descricao'] . '</option>';
                                    }
                                }    
                            ?>
                        </select>
                    </div>
                    <?php if($tipo[0]['agt_cod'] == 1){ ?>
                        <div class="col-sm-2">
                            <label class="control-label" for="data_fim">Veículo:</label>
                            <select name="vei_cod" type="text" class="form-control blockenter" id="vei_cod" disabled>
                                <option value="" selected>--SELECIONE--</option>
                                <?php
                                    for ($i = 0; $i < count($veiculo); $i++) {
                                        if($result[0]['vei_cod'] == $veiculo[$i]['vei_cod']){
                                            echo '<option value="' . $veiculo[$i]['vei_cod'] . '" selected>' . $veiculo[$i]['vei_nome'] . '</option>';
                                        }else{
                                            echo '<option value="' . $veiculo[$i]['vei_cod'] . '">' . $veiculo[$i]['vei_nome'] . '</option>';

                                        }
                                    }    
                                ?>
                            </select>
                        </div>
                    <?php } ?>

                </div>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <label for="age_titulo" class="control-label">Título:</label>
                        <input name="age_titulo" type="text" class="form-control blockenter" value="<?php echo $result[0]['age_titulo']?>" id="age_titulo" style="text-transform: uppercase" required>
                    </div>
                </div>
                
                
                <div class="row form-group">

                    <div class="col-sm-12">
                        <label for="age_descricao" class="control-label">Descrição:</label>
                        <textarea name="age_descricao" type="text" class="form-control blockcenter" id="age_descricao" style="text-transform:uppercase; height: 200px;" required><?php echo $result[0]['age_descricao']?></textarea>
                    </div>
                </div>
            </form>

        </div>
    </div>

<script>

    function habilita(opt){
        if (opt == 1){
            document.getElementById('vei_cod').removeAttribute('disabled');
        }
    }
    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=agendamento&acao=lista';
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
        $('#datetimepicker1').datetimepicker();
        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>