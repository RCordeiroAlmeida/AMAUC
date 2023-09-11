<?php
    switch ($_GET['acao']){
        case 'grava_compensacao':

                $aux['usu_cod']         = $_POST['usu_cod'];
                $aux['cmp_responsavel'] = $_POST['cmp_responsavel'];
                $aux['cmp_cpf_fun']     = $_POST['cmp_cpf_fun'];
                $aux['cmp_ins_fun']     = addslashes(mb_strtoupper($_POST['cmp_ins_fun'], 'UTF-8'));
                $aux['cmp_descricao']   = $_POST['cmp_descricao'];

                $data->tabela = 'compensacao';
                $data->add($aux);
                $id = $data->MaxValue("cmp_cod", "compensacao");
            
            for($i = 0; $i < count($_POST['datas_falta']); $i++){
                
                $aux2['cmp_cod'] = $id;
                $aux2['cdt_data'] = $_POST['datas_falta'][$i];

                $data->tabela = 'compensacao_data';
                $data->add($aux2);
    
            }

            echo '<script>window.location = "?module=relatorio&acao=lista_compensacao&ms=1";</script>';
        break;

        case 'aceitar_compensacao':

            $sql = 'UPDATE compensacao SET cmp_status = 1 WHERE cmp_cod = ' . $_POST['param_0'];
            $data->executaSQL($sql);    
            
            echo '<script>window.location = "?module=relatorio&acao=lista_compensacao&ms=5"</script>';
        break;
    
        case 'negar_compensacao':
            $sql = 'UPDATE compensacao SET cmp_status = 2 WHERE cmp_cod = ' . $_POST['param_0'];
            $data->executaSQL($sql);
    
            echo '<script>window.location = "?module=relatorio&acao=lista_compensacao&ms=5"</script>';
        break;


    }
?>