<?php

    $sql = 'SELECT
                ati_cod,
                ati_data,
                atp_cod,
                afr_cod,
                cli_cod,
                ati_solicitante,
                ati_descricao,
                ati_tempo,
                sol_status
            FROM
                atividade
            WHERE
                ati_situacao = 1'.$user;

    $solicitaco = $data->find('dynamic', $sql);

    $sql ="SELECT afr_cod, afr_descricao FROM atividade_forma WHERE afr_situacao = 1";
    $forma = $data->find('dynamic', $sql);

    $sql ="SELECT atp_cod, atp_descricao FROM atividade_tipo WHERE atp_situacao = 1";
    $tipo = $data->find('dynamic', $sql);
    
    $sql ="SELECT afr_cod, afr_descricao FROM atividade_forma WHERE afr_situacao = 1";
    $forma = $data->find('dynamic', $sql);

    $sql = "SELECT cli_cod, cli_nome FROM cliente WHERE cli_situacao = 1";
    $cliente = $data->find('dynamic', $sql);

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1";
    $setor = $data->find('dynamic', $sql);
?>

<form role="form" action="application/relatorio/view/atividade/relatorio.php " target="_blank" id="MyForm" method="post" > 
    <input type="hidden" value="<?php echo $_SESSION['amauc_userName']?>" name="usuario"/>
    <input type="hidden" value="<?php echo $_SESSION['amauc_userId']?>" name="idUser"/>
    

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10 col-xs-9" >
            <h2><i class="fa fa-bar-chart"></i> Relatórios</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <strong>Solicitações</strong>
                </li>
            </ol>
        </div>

        <div class="col-lg-2 col-xs-3" >            
            <button type="submit" class="btn btn-primary btn-block" style="position: relative; top: 30px; left: -15px; float: right;">
                <i class="fa fa-print" aria-hidden="true"></i><span class="hidden-xs"> Imprimir</span>
            </button>        
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Formulário de filtro</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div> 
            <div class="ibox-content">
                <div class="row form-group">  
                    <div class="col-sm-4" >        

                        <label class="control-label">Cliente:</label>
                        <select name="cli_cod" id="cli_cod" class="form-control selectpicker" data-live-search="true" data-size="6">
                            <option value="" selected>--SELECIONE--</option>
                            <?php 
                                for ($i=0; $i< count($cliente); $i++) { 
                                    echo '
                                        <option value="'.$cliente[$i]['cli_cod'].'">'.$cliente[$i]['cli_nome'].'</option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4" >           
                        <label class="control-label">Setor:</label>
                        <select name="set_cod" id="set_cod" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <option value="" selected>--SELECIONE--</option>
                            <?php 
                                for ($i=0; $i< count($setor); $i++) { 
                                    echo '
                                        <option value="'.$setor[$i]['set_cod'].'">'.$setor[$i]['set_nome'].'</option>
                                        ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4" >           
                        <label class="control-label">Status:</label>
                        <select name="sol_status" id="sol_status" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <option value="" selected>--SELECIONE--</option>
                            <option value="0">Pendente</option>
                            <option value="1">Andamento</option>
                            <option value="2">Concluido</option>
                            <option value="3">Cancelado</option>
                        </select>
                    </div>
                    
                    
                </div>

                <div class="row form-group">
                    <div class="col-sm-4">
                        <label class="control-label" for="data_ini">A partir de:</label>
                        <input name="data_ini" type="date" class="form-control blockenter" id="data_ini" style="text-transform:uppercase;"/>
                    </div>

                    <div class="col-sm-4" >           
                        <label class="control-label">Tipo:</label>
                        <select name="atp_cod" id="atp_cod" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <option value="" selected>--SELECIONE--</option>
                            <?php
                                for($i=0; $i<=count($tipo); $i++){
                                    echo '
                                        <option value="'.$tipo[$i]['atp_cod'].'">'.$tipo[$i]['atp_descricao'].'</option>                                
                                    ';
                                }
                            ?>
                        </select>
                    </div>   

                    <div class="col-sm-4" >           
                        <label class="control-label">Forma:</label>
                        <select name="afr_cod" id="afr_cod" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <option value="" selected>--SELECIONE--</option>
                            <?php
                                for($i=0; $i<=count($forma); $i++){
                                    echo '
                                        <option value="'.$forma[$i]['afr_cod'].'">'.$forma[$i]['afr_descricao'].'</option>                                
                                    ';
                                }
                            ?>
                        </select>
                    </div>

                    
                </div>
            
                
            </div>

</form>
</div> 
