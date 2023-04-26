<?php
switch ($_GET['acao']) {

  case 'grava_tipo':
    
    $aux['atp_descricao'] = mb_strtoupper($_POST['atp_descricao'], 'UTF-8');

    $data->tabela = 'atividade_tipo';
    $data->add($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipo&ms=1";</script>';
    break;

  case 'update_tipo':
    
    $aux['atp_cod'] = $_POST['atp_cod'];
    $aux['atp_descricao'] = mb_strtoupper($_POST['atp_descricao']);
    
    $data->tabela = 'atividade_tipo';
    $data->update($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipo&ms=2";</script>';
    break;

  case 'inativar_tipo':
    $sql = 'UPDATE atividade_tipo SET atp_situacao = 0 WHERE atp_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipo&ms=4";</script>';
    break;

  case 'ativar_tipo':
    $sql = 'UPDATE atividade_tipo SET atp_situacao = 1 WHERE atp_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_tipo&ms=4";</script>';
    break;
}
