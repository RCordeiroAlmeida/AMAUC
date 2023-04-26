<?php
switch ($_GET['acao']) {

  case 'grava_forma':
    $aux['afr_descricao'] = mb_strtoupper($_POST['afr_descricao'], 'UTF-8');

    $data->tabela = 'atividade_forma';
    $data->add($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_forma&ms=1";</script>';
    break;

  case 'update_forma':
    $aux['afr_descricao'] = $_POST['afr_descricao'];

    $data->tabela = 'atividade_forma';
    $data->update($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_forma&ms=2";</script>';
    break;

  case 'inativar_forma':
    $sql = 'UPDATE atividade_forma SET afr_situacao = 0 WHERE afr_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_forma&ms=4";</script>';
    break;

  case 'ativar_forma':
    $sql = 'UPDATE atividade_forma SET afr_situacao = 1 WHERE afr_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_forma&ms=5";</script>';
    break;
}
