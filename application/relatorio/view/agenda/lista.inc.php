<?php 
   $sql = "SELECT agt_cod, agt_descricao FROM agenda_tipo WHERE agt_situacao = 1";
   $age_tipo = $data->find('dynamic', $sql);
?>

<form role="form" action="application/relatorio/view/agenda/relatorio.php " target="_blank" id="MyForm" method="post" > 
    <input type="hidden" value="<?php echo $_SESSION['amauc_userName']?>" name="usuario"/>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10 col-xs-9" >
            <h2><i class="fa fa-bar-chart"></i> Relatórios</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <strong>Agendamentos</strong>
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
                    <div class="col-sm-3" >        
                        <label class="control-label">Tipo de agendamento</label>
                        <select name="age_tipo" id="age_tipo" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <option value="" selected>--SELECIONE--</option>
                            <?php 
                                for ($i=0; $i< count($age_tipo); $i++) { 
                                    echo '
                                    <option value="'.$age_tipo[$i]['agt_cod'].'">'.$age_tipo[$i]['agt_descricao'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="data_ini">A partir de:</label>
                        <input name="data_ini" type="date" class="form-control blockenter" id="data_ini" style="text-transform:uppercase;" required/>
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="data_fim">Até:</label>
                        <input name="data_fim" type="date" class="form-control blockenter" id="data_fim" style="text-transform:uppercase;" required/>
                    </div>

                </div>
            </div>

            <div class="modal inmodal" id="visualiza_pesquisa" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div id="retorno_pesquisa"></div>
                    </div>
                </div>
            </div>
</form>
</div> 
