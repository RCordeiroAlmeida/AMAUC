<?php
if(!isset($_SESSION) || $_SESSION['amauc_userPermissao'] != 1){
    echo'<script>window.location="?module=index&acao=logout"</script>';
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Cidades</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=cadastro&acao=lista_cidade">Cidades</a>
            </li>
            <li class="active">
                <strong>Novo</strong>
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
            <h5>Formulário de Cadastro</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">

            <form role="form" action="?module=cadastro&acao=grava_cidade" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

                <div class="row form-group">
                    <div class="col-sm-8">
                        <label class="control-label" for="cid_nome">Cidade:</label>
                        <input name="cid_nome" type="text" class="form-control blockenter" id="cid_nome" style="text-transform:uppercase;" required />
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="est_uf">UF:</label>
                        <input name="est_uf" type="text" class="form-control blockenter" id="est_uf" style="text-transform:uppercase;" required />
                    </div>

                    
                </div>

            </form>

        </div>
    </div>


<script>
    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=cadastro&acao=lista_cidade';
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
        $("#MyForm").submit(function(event) {
            document.forms['MyForm'].submit();
        });
    });
</script>