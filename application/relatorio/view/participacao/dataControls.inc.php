<?php
    switch ($_GET['acao']){
        case 'grava_participacao':
            
            $aux['usu_cod']         = $_POST['usu_cod'];
            $aux['par_data_ini']    = $_POST['par_data_ini'];
            $aux['par_data_fim']    = $_POST['par_data_fim'];
            $aux['par_hora_ini']    = $_POST['par_hora_ini'];
            $aux['par_hora_fim']    = $_POST['par_hora_fim'];
            $aux['par_forma']       = $_POST['par_forma'];
            $aux['par_tipo']        = $_POST['par_tipo'];
            $aux['par_entidade']    = addslashes(mb_strtoupper($_POST['par_entidade']));
            $aux['par_local']       = addslashes(mb_strtoupper($_POST['par_local']));
            $aux['par_descricao']   = addslashes(mb_strtoupper($_POST['par_descricao'], 'UTF-8'));


            $data->tabela = 'participacao';
            $data->add($aux);

            echo '<script>window.location = "?module=relatorio&acao=lista_participacao&ms=1";</script>';
        break;

    }
?>