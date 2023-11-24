<?php
    require_once('../../../library/MySql.php'); // Conecta ao BD
    require_once('../../../library/DataManipulation.php'); 
    //
    $data = new DataManipulation();

    $sql = "DELETE FROM conta_anexo WHERE can_cod =".$_GET['can_cod'];
    $data->executaSQL($sql);

?>


<script>
    nextPage("?module=contas&acao=edita_conta", con_cod);
</script>

