<?php
switch ($_GET['acao']) {

  case 'grava_usuario':
    if($_POST['set_cod']){
      $aux2['fun_nome'] = addslashes(mb_strtoupper($_POST['usu_nome'], 'UTF-8'));
      $aux2['fun_mail'] = $_POST['usu_email'];
      $aux2['set_cod']  = $_POST['set_cod'];
      $aux2['usu_cod']  = $_SESSION['amauc_userId'];
      
      $data->tabela = 'funcionario';
      $data->add($aux2);

      $idFunc = $data->maxValue('fun_cod', 'funcionario');
    }

    $aux['usu_nome']            = addslashes(mb_strtoupper($_POST['usu_nome'], 'UTF-8'));
    $aux['usu_login']           = $_POST['usu_login'];
    $aux['usu_senha']           = md5($_POST['usu_senha']);
    $aux['usu_email']           = $_POST['usu_email'];
    $aux['upe_cod']             = $_POST['upe_cod'];
    $aux['fun_cod']             = $idFunc;
    $aux['set_cod']             = $_POST['set_cod'];
    
    $data->tabela = 'usuario';
    $data->add($aux);
    echo '<script>window.location = "?module=cadastro&acao=lista_usuario&ms=1";</script>';

  break;

  case 'update_usuario':
    
    $aux['usu_cod']             = $_POST['usu_cod'];
    $aux['usu_nome']            = addslashes(mb_strtoupper($_POST['usu_nome'], 'UTF-8'));
    $aux['usu_login']           = $_POST['usu_login'];
    $aux['usu_email']           = $_POST['usu_email'];
    $aux['set_cod']             = $_POST['set_cod'];
    
    if (isset($_POST['usu_senha'])){
      $aux['usu_senha']         = md5($_POST['usu_senha']);
    }
    if($_POST['upe_cod']){
      $aux['upe_cod']           = $_POST['upe_cod'];
    } 

    $data->tabela = 'usuario';
    $data->update($aux);
    
    //* Atualiza a tabela funcionário
    $aux2['usu_cod']             = $_POST['usu_cod'];
    $aux2['fun_nome']            = addslashes(mb_strtoupper($_POST['usu_nome'], 'UTF-8'));
    $aux2['fun_mail']            = $_POST['usu_email'];
    $aux2['set_cod']             = $_POST['set_cod'];

    $data->tabela = 'funcionario';
    $data->update($aux2);
  
    //* Atualiza nome do cliente
    $sql = "UPDATE cliente SET cli_nome = '".$POST['usu_nome']."' WHERE usu_cod = " . $_POST['usu_cod'];
    $data->executaSQL($sql);

    $_SESSION['amauc_userName'] = mb_strtoupper($_POST['usu_nome'], 'UTF-8');

    echo '<script>window.location = "?module=cadastro&acao=lista_usuario&ms=2";</script>';
    break;

  case 'inativar_usuario':
    $sql = 'UPDATE usuario SET usu_situacao = 0 WHERE usu_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_usuario&ms=4";</script>';
    break;

  case 'ativar_usuario':
    $sql = 'UPDATE usuario SET usu_situacao = 1 WHERE usu_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    echo '<script>window.location = "?module=cadastro&acao=lista_usuario&ms=5";</script>';
    break;
}
