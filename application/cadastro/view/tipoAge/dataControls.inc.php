<?php
switch ($_GET['acao']) {

  case 'grava_tipoAge':
    $aux['agt_descricao'] = mb_strtoupper($_POST['agt_descricao'], 'UTF-8');

    $data->tabela = 'agenda_tipo';
    $data->add($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipoAge&ms=1";</script>';
    break;

  case 'update_tipoAge':

    $aux['agt_cod'] = $_POST['agt_cod'];
    $aux['agt_descricao'] = mb_strtoupper($_POST['agt_descricao'], 'UTF-8');
    $data->tabela = 'agenda_tipo';
    $data->update($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipoAge&ms=2";</script>';
    break;

  case 'inativar_tipoAge':
    $sql = 'UPDATE agenda_tipo SET agt_situacao = 0 WHERE agt_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipoAge&ms=4";</script>';
    break;

  case 'ativar_tipoAge':
    $sql = 'UPDATE agenda_tipo SET agt_situacao = 1 WHERE agt_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipoAge&ms=4";</script>';
    break;
}
