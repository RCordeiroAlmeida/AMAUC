

<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 5000
    };
    <?php
    switch ($_GET[ms]) {
        case 1:
            echo 'toastr.success("Cadastrado com sucesso!", "Incluido!");';
            break;

        case 2:
            echo 'toastr.success("Atualizado com sucesso", "Atualizado!");';
            break;

        case 3:
            echo 'toastr.success("Excluido com sucesso", "Exluido!");';
            break;

        case 4:
            echo 'toastr.info(" ", "Inativado!");';
            break;

        case 5:
            echo 'toastr.success(" ", "Reativado!");';
            break;
    }
    ?>
</script>

<form role="form" action="application/relatorio/view/participacao/relatorio.php " target="_blank" id="MyForm" method="post" > 
    <input type="hidden" value="<?php echo $_SESSION['amauc_userId']?>" name="usu_cod"/>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10 col-xs-9" >
            <h2><i class="fa fa-users"></i> Participação de reunião</h2>
        </div>
        <div class="pull-right" >
            <br /><br />
            <a class="btn btn-warning" href="?module=relatorio&acao=novo_participacao">
                <i class="fa fa-plus"></i><span class="hidden-xs hidden-sm"> Novo</span>
            </a>
            <button class="btn btn-primary" onclick="$('#MyForm').valid() ? enviar():'';" type="submit">
                <i class="fa fa-print"></i><span class="hidden-xs hidden-sm"> Imprimir</span>
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
                        <label class="control-label" for="par_data_ini">Data Início:</label>
                        <input name="par_data_ini" type="date" class="form-control blockenter" id="par_data_ini" style="text-transform:uppercase;" onchange="dataMin(this.value)" required />
                    </div>
                    
                    <div class="col-sm-4">
                        <label class="control-label" for="par_data_fim">Data Final:</label>
                        <input name="par_data_fim" type="date" class="form-control blockenter" id="par_data_fim" style="text-transform:uppercase;" min="" required />
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
        </div>
    </div>
</form>
<script>
    function dataMin(data_ini) {
        var data_fim = document.getElementById('par_data_fim');
        data_fim.setAttribute("min", data_ini);
    }
</script>
