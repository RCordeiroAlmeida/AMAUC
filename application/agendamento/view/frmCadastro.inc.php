<?php
if ($_SESSION['amauc_userPermissao'] != 1 && ($_SESSION['amauc_userPermissao']) != 2) {
    echo '<script>window.location="?module=index&acao=logout"</script>';
    exit();
}

$sql = "SELECT agt_descricao, agt_cod FROM agenda_tipo WHERE agt_situacao = 1";
$tipo = $data->find('dynamic', $sql);

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
        <button class="btn btn-primary" id="btn-envio" onclick="$('#MyForm').valid() ? enviar():'';" type="submit"><i class="fa fa-check"></i><span class="hidden-xs hidden-sm"> Salvar</span></button>
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

            <form role="form" action="?module=agendamento&acao=grava" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

                <div class="row form-group">

                    <div class="col-sm-2">
                        <label class="control-label" for="data_ini">Data Início:</label>
                        <input name="data_ini" type="date" class="form-control blockenter" id="data_ini" style="text-transform:uppercase;" min="<?php echo date('Y-m-d', strtotime('-1 day')); ?>" onchange="dataMin(this.value)" required />
                    </div>
                    
                    <div class="col-sm-2">
                        <label class="control-label" for="data_fim">Data Final:</label>
                        <input name="data_fim" type="date" class="form-control blockenter" id="data_fim" style="text-transform:uppercase;" min="" required />
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="age_hora_ini">Hora Início:</label>
                        <input name="age_hora_ini" type="time" class="form-control blockenter" id="age_hora_ini" style="text-transform:uppercase;" onchange="horaMin(this.value)" required />
                    </div>
                    
                    <div class="col-sm-2">
                        <label class="control-label" for="age_hora_fim">Hora Fim:</label>
                        <input name="age_hora_fim" type="time" class="form-control blockenter" id="age_hora_fim" style="text-transform:uppercase;" required />
                    </div>


                    <div class="col-sm-2">
                        <label class="control-label" for="data_fim">Tipo de Agendamento:</label>
                        <select name="age_tipo" type="text" class="form-control blockenter" id="agt_cod" onchange=" busca_disp(this.value)">
                            <option value="" selected>--SELECIONE--</option>
                            <?php
                                for ($i = 0; $i < count($tipo); $i++) {
                                    echo '<option value="' . $tipo[$i]['agt_cod'] . '">' . $tipo[$i]['agt_descricao'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div id="disp"></div>

                </div>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <label for="age_titulo" class="control-label">Título:</label>
                        <input name="age_titulo" type="text" class="form-control blockenter" id="age_titulo" style="text-transform: uppercase" required>
                    </div>
                </div>


                <div class="row form-group">

                    <div class="col-sm-12">
                        <label for="age_descricao" class="control-label">Descrição:</label>
                        <textarea name="age_descricao" type="text" class="form-control blockcenter" id="age_descricao" style="text-transform:uppercase; height: 200px;" required></textarea>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        function busca_disp(opt){
            
            var data_ini = document.getElementById('data_ini').value;
            var hora_ini = document.getElementById('age_hora_ini').value;
            var data_fim = document.getElementById('data_fim').value;
            var hora_fim = document.getElementById('age_hora_fim').value;
            div = 'disp';

            switch(opt) {
                case '1':

                    url = 'application/script/ajax/busca_disp.php?data_ini='+data_ini+'&data_fim='+data_fim+'&hora_ini='+hora_ini+'&hora_fim='+hora_fim+'&opt=1';
                    
                    ajax(url, div);
                break;

                case '2':
                    
                    url = 'application/script/ajax/busca_disp.php?data_ini='+data_ini+'&data_fim='+data_fim+'&hora_ini='+hora_ini+'&hora_fim='+hora_fim+'&opt=2';
                    ajax(url, div);

                    setTimeout(function() {
                        var ocupado = document.getElementById('ocupado');

                        block_envio(ocupado.value);
                    }, 500);

                    //block_envio(ocupado.value);

                break;
            }            
        }

        function block_envio(val) {
            var botao = document.getElementById('btn-envio');
            if (val == "1") {
                botao.setAttribute('disabled', 'true');
            } else {
                botao.removeAttribute('disabled');
            }
        }

        function dataMin(data_ini) {
            var data_fim = document.getElementById('data_fim');
            data_fim.setAttribute("min", data_ini);
        }

        function enviar() {
            document.forms['MyForm'].submit();
        }

        function voltar() {
            window.location.href = '?module=agendamento&acao=lista';
        }

        function habilita(opt) {
            
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