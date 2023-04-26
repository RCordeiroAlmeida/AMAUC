<?php
switch ($_GET['acao']) {

  case 'grava_cliente':
    $aux['cli_nome']        = addslashes(mb_strtoupper($_POST['cli_nome'], 'UTF-8'));
    $aux['cli_cnpj']        = $_POST['cli_cnpj'];
    $aux['cli_tel']         = $_POST['cli_tel'];
    $aux['cli_mail']        = $_POST['cli_mail'];
    $aux['cli_endereco']    = addslashes(mb_strtoupper($_POST['cli_endereco'], 'UTF-8'));
    $aux['cli_nro_endereco'] = $_POST['cli_nro_endereco'];
    $aux['cli_bairro']      = addslashes(mb_strtoupper($_POST['cli_bairro'], 'UTF-8'));
    $aux['cli_cep']         = $_POST['cli_cep'];
    $aux['cid_cod']         = $_POST['cid_cod'];
    $aux['usu_cod']         = $_SESSION['amauc_userId'];

    //gravando dados do cliente
    $data->tabela = 'cliente';
    $data->add($aux);

    $id = $data->MaxValue("cli_cod", "cliente");


    $aux2['usu_nome']   = addslashes(mb_strtoupper($_POST['cli_nome'], 'UTF-8'));
    $aux2['usu_login']  = $_POST['usu_login'];
    $aux2['usu_senha']  = md5($_POST['usu_senha']);
    $aux2['usu_email']  = $_POST['cli_mail'];
    $aux2['cli_cod']    = $id;
    $aux2['upe_cod']    = 3;

    //gravando credenciais cliente
    $data->tabela = 'usuario';
    $data->add($aux2);


    echo '<script>window.location = "?module=cadastro&acao=lista_cliente&ms=1";</script>';
    break;

  case 'update_cliente':
    
    $aux['cli_cod']             = $_POST['cli_cod'];
    $aux['cli_nome']            = addslashes(mb_strtoupper($_POST['cli_nome'], 'UTF-8'));
    $aux['cli_cnpj']            = $_POST['cli_cnpj'];
    $aux['cli_tel']             = $_POST['cli_tel'];
    $aux['cli_mail']            = $_POST['cli_mail'];
    $aux['cli_endereco']        = addslashes(mb_strtoupper($_POST['cli_endereco'], 'UTF-8'));
    $aux['cli_nro_endereco']    = $_POST['cli_nro_endereco'];
    $aux['cli_bairro']          = addslashes(mb_strtoupper($_POST['cli_bairro'], 'UTF-8'));
    $aux['cli_cep']             = $_POST['cli_cep'];
    $aux['cid_cod']             = $_POST['cid_cod'];
    $aux['usu_cod']             = $_SESSION['amauc_userId'];

    $data->tabela = 'cliente';
    $data->update($aux);

    echo '<script>window.location = "?module=cadastro&acao=lista_cliente&ms=2";</script>';
    break;

  case 'inativar_cliente':
    $sql = 'UPDATE cliente SET cli_situacao = 0 WHERE cli_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    $sql = 'UPDATE usuario SET usu_situacao = 0 WHERE usu_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);
    echo '<script>window.location = "?module=cadastro&acao=lista_cliente&ms=4";</script>';
    break;


  case 'ativar_cliente':
    $sql = 'UPDATE cliente SET cli_situacao = 1 WHERE cli_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);

    $sql = 'UPDATE usuario SET usu_situacao = 1 WHERE usu_cod = ' . $_POST['param_0'];
    $data->executaSQL($sql);
    echo '<script>window.location = "?module=cadastro&acao=lista_cliente&ms=4";</script>';
    break;
}
