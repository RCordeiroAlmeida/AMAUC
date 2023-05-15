<?php 

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1";
    $setor = $data->find('dynamic', $sql);
    
?>

<form role="form" action="application/relatorio/view/prestacao/relatorio.php " target="_blank" id="MyForm" method="post" > 
    <input type="hidden" value="<?php echo $_SESSION['amauc_userName']?>" name="usuario"/>

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
                    <div class="col-sm-4">
                        <label class="control-label">Tipo de Veículo:</label>
                        <select name="con_veiculo" id="con_veiculo" class="form-control blockenter" onchange="veiculo(this.value);">
                            <option value="">--SELECIONE--</option>
                            <option value="1">Empresa</option>
                            <option value="2">Próprio</option>
                            <option value="3">Outro</option>
                        </select>
                    </div>
                    <div class="col-sm-4" >           
                        <label class="control-label">Setor:</label>
                        <select name="set_cod" id="set_cod" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <option value="" selected>--SELECIONE--</option>
                            <?php 
                                for ($i=0; $i< count($setor); $i++) { 
                                    echo '
                                    <option value="'.$setor[$i]['set_cod'].'">'.$setor[$i]['set_nome'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="data_ini">A partir de:</label>
                        <input name="data_ini" type="date" class="form-control blockenter" id="data_ini" style="text-transform:uppercase;"/>
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
