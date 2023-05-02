<?php 

    $sql = 'SELECT
                sol_cod,
                set_cod,
                cli_cod,
                sol_solicitante,
                sol_cargo,
                sol_data,
                sol_descricao
            FROM
                solicitacao';
    $solicitaco = $data->find('dynamic', $sql);

    $sql = "SELECT cli_cod, cli_nome FROM cliente WHERE cli_situacao = 1";
    $cliente = $data->find('dynamic', $sql);

    $sql = "SELECT set_cod, set_nome FROM setor WHERE set_situacao = 1";
    $setor = $data->find('dynamic', $sql);

    $periodo  = ['Todos' => 'Todos', '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro'];
    
?>

<form role="form" action="application/relatorios/view/solicitação/relatorio.php " target="_blank" id="MyForm" method="post" > 
    <input type="hidden" name="ins_codigo" value="<?php echo $_SESSION['es2_ins_codigo'];  ?>" />

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
            <button type="submit" class="btn btn-warning btn-block" style="position: relative; top: 30px; left: -15px; float: right;">
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

                    <div class="col-sm-6" >           
                        <label class="control-label">Cliente:</label>
                        <select name="cli_cod" id="cli_cod" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <?php 
                                for ($i=0; $i< count($cliente); $i++) { 
                                    echo '
                                    <option value="" selected>--SELECIONE--</option>
                                    <option value="'.$cliente[$i]['cli_cod'].'">'.$cliente[$i]['cli_nome'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-6" >           
                        <label class="control-label">Setor:</label>
                        <select name="set_cod" id="set_cod" class="form-control selectpicker" data-live-search="true" data-size="6" >
                            <?php 
                                for ($i=0; $i< count($setor); $i++) { 
                                    echo '
                                    <option value="" selected>--SELECIONE--</option>
                                    <option value="'.$setor[$i]['set_cod'].'">'.$setor[$i]['set_descricao'].'</option>';
                                }
                            ?>
                        </select>
                    </div>                                
                </div><br>

                <div class="row form-group">
                    <div class="col-lg-10 col-xs-9" ></div>
                    <div class="col-lg-2 col-xs-3" >                       
                        <button type="submit" class="btn btn-warning btn-block" ><i class="fa fa-print"></i> <span class="hidden-xs">Imprimir</span></button>
                    </div>
                </div>

</form>	
</div>
</div>            	 
