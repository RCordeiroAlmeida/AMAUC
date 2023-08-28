<?php
    if (!isset($_SESSION) && $_SESSION['amauc_userPermissao'] == 2) {
        echo '<script>window.location="?module=index&acao=logout"</script>';
    }

    if($_GET['id']){
        $viagem_cod = $_GET['id'];

        $sql = "SELECT
                    *
                FROM
                    agenda
                WHERE 
                    age_cod =".$viagem_cod;
        $agendamento = $data->find('dynamic', $sql); 
        
        $aux_ini= explode(" ", $agendamento[0]['age_hora_ini']);
        $age_data_ini = $aux_ini[0];
        $age_hora_ini = $aux_ini[1];
        
        $aux_fim= explode(" ", $agendamento[0]['age_hora_fim']); 
        $age_data_fim = $aux_fim[0];
        $age_hora_fim = $aux_fim[1];

        $sql = "SELECT
                    usu_cod,
                    usu_nome,
                    set_cod
                FROM
                    usuario
                WHERE
                    usu_cod =".$agendamento[0]['usu_cod'];
        $funcionario = $data->find('dynamic', $sql);

        $sql = "SELECT set_nome, set_cod FROM setor WHERE set_situacao = 1 AND set_cod = ".$funcionario[0]['set_cod'];
        $setor = $data->find('dynamic', $sql);

        $sql = "SELECT cli_cod, cli_nome FROM cliente WHERE cli_situacao = 1";
        $cliente = $data->find('dynamic', $sql);
    }else{

        $sql = "SELECT
                    usu_cod,
                    usu_nome,
                    set_cod
                FROM
                    usuario
                WHERE
                    usu_cod =".$_SESSION['amauc_userId'];
        $funcionario = $data->find('dynamic', $sql);


        $sql = "SELECT set_nome, set_cod FROM setor WHERE set_situacao = 1 AND set_cod = ".$funcionario[0]['set_cod'];
        $setor = $data->find('dynamic', $sql);

        $sql = "SELECT cli_cod, cli_nome FROM cliente WHERE cli_situacao = 1";
        $cliente = $data->find('dynamic', $sql);
    }
    

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9 col-xs-8">
        <h2>Prestação de contas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="?module=atividade&acao=lista">Lançamentos</a>
            </li>
            <li class="active">
                <strong>Novo lançamento</strong>
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

<form role="form" action="?module=contas&acao=grava_conta" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

    <!-- passa o setor do funcionário via $_POST -->
    <input type="hidden" name="con_setor" value="<?php echo $funcionario[0]['set_cod'] ?>" />
    <input type="hidden" name="usu_cod" value="<?php echo $_SESSION['amauc_userId']; ?>  " />
    <input type="hidden" name="usu_nome" value="<?php echo $funcionario['usu_nome']; ?>  " />

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Novo Lançamento</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">

                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="control-label" for="con_data_ini">Data Inicial:</label>
                        <input name="con_data_ini" type="date" class="form-control blockenter" id="con_data_ini" style="text-transform:uppercase; text-align: center;" value="<?php echo $age_data_ini?>" required/>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="con_hora_ini">Hora Inicial:</label>
                        <input name="con_hora_ini" type="time" class="form-control blockenter" id="con_hora_ini" style="text-transform:uppercase; text-align: center;" max="<?php date('Y-m-d') ?>" value="<?php echo $age_hora_ini?>" required/>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="con_data_fim">Data Final:</label>
                        <input name="con_data_fim" type="date" class="form-control blockenter" id="con_data_fim" style="text-transform:uppercase; text-align: center;" value="<?php echo $age_data_fim?>" required/>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="con_hora_fim">Hora Final:</label>
                        <input name="con_hora_fim" type="time" class="form-control blockenter" id="con_hora_fim" style="text-transform:uppercase; text-align: center;" value="<?php echo $age_hora_fim?>" required/>
                    </div>
                </div>
                

                <?php
                    if($_GET['id']){
                        $funcionario[0]['usu_nome'] = $_SESSION['amauc_userName'];
                        $funcionario[0]['set_cod'] = $_SESSION['amauc_userSetor'];
                    }
                    
                ?>

                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="control-label" for="con_funcionario">Funcionário:</label>
                        <input type="text" class="form-control blockenter" id="fun_cod" name="fun_cod" value="<?php echo $funcionario[0]['usu_nome'] ?>" disabled></input>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label">Setor:</label>
                        <input name="con_setor" type="text" class="form-control blockenter" id="sol_data" style="text-transform:uppercase;"  value="<?php echo $setor[0]['set_nome']?>" disabled/>
                        
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label">Veículo:</label>
                        <select name="con_veiculo" id="con_veiculo" class="form-control blockenter" onchange="veiculo(this.value);">
                            <option value="">--SELECIONE--</option>
                            <option value="1">Empresa</option>
                            <option value="2">Próprio</option>
                            <option value="3">Outro</option>
                        </select>
                    </div>
                </div>

                <!-- retorno AJAX -->
                <div class="row form-group" id="retorno_veiculo"></div>

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="con_destino">Destino da viagem:</label>
                        <input name="con_destino" type="text" class="form-control blockenter" id="con_destino" style="text-transform:uppercase" required />
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label" for="con_cliente">Cliente atendido:</label>
                        <select name="con_cliente" class="form-control blockenter" id="con_cliente" onchange="busca_cliente(this.value)">
                            <option value="">--Selecione--</option>
                            <?php
                                for ($i = 0; $i < count($cliente); $i++) {
                                    echo '<option value="' . $cliente[$i]['cli_cod'] . '" >' . $cliente[$i]['cli_nome'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>

                    
                </div>
                
                <div class="row form-group" id="retorno_cliente"></div>

                <div class="row form-group">
                    <div class="col-sm-12">
                        <label class="control-label" for="con_descricao">Descricão da atividade:</label>
                        <textarea name="con_descricao" type="text" class="form-control blockenter" id="sol_descricao" required style="white-space: pre-wrap; height: 200px;" maxlenght="300"><?php if($_GET['id']){ echo $agendamento[0]['age_descricao']; }?></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Anexos dos comprovantes</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="con_adiantamento">Adiantamento (R$):</label>
                    <input name="con_adiantamento" onKeyDown="mascara(this, valorMoeda);" type="text" class="form-control blockenter" id="con_adiantamento" style="text-transform:uppercase;"/>
                </div>
            </div>    
            <div class="row form-group">
                <div class="col-sm-5">
                    <label>Estabelecimento:</label>
                    <input name="can_estabelecimento_0" type="text" class="form-control blockenter" id="can_estabelecimento_0" style="text-transform:uppercase;"/>
                </div>
                <div class="col-sm-3">
                    <label>Valor (R$):</label>
                    <input name="can_valor_0" onKeyDown="mascara(this, valorMoeda);" type="text" class="form-control blockenter" id="can_valor_0" style="text-transform:uppercase;"/>
                </div>
                    <!--  upload de arquivos-->
                <div class="col-sm-3">
                    <label>Anexar Nota:</label>
                    <input type="file" name="can_anexo_0" class="form-control" id="can_anexo">
                </div>
                <div class="col-sm-1" style="padding-top: 25px">
                    <a class="btn btn-primary" onclick="criar()">
                        <i class="fa fa-plus"></i><span class="hidden-xs hidden-sm"></span>
                    </a>
                </div>

                <!-- Aqui eu guardo quanto a quantidade de itens que foram inseridos para eu poder tratar no DataControls -->
                <input name="qtd_pc" id="qtd_pc" type="hidden" value="1" />
            </div>

            <div id="prox_item"></div>
            </div>
        </div>
</form>
<script>
    
    function busca_cliente(id){
        url = 'application/script/ajax/busca_cliente.php?cli_cod='+id;
        div = 'retorno_cliente';
        ajax(url, div);
    }

    function veiculo(id) {
        url = 'application/script/ajax/busca_veiculo.php?id=' + id;
        div = 'retorno_veiculo';
        ajax(url, div);
    }

    function gasto() {
        url = 'application/script/ajax/busca_gasto.php';
        div = 'retorno_gasto';
        ajax(url, div);
    }

    var uploadField = document.getElementById("sol_anexo");

    uploadField.onchange = function() {
        if (this.files[0].size > 2097152) {
            alert("A capacidade máxima de upload é de 2MB");
            this.value = "";
        };
    }

    function enviar() {
        document.forms['MyForm'].submit();
    }

    function voltar() {
        window.location.href = '?module=contas&acao=lista';
    }
    
</script>

<!-- script para anexo de contas -->
<script>
	var cont_pc = 1; //Controla a quantidade de itens que foram inseridos

	function criar(){
		//Controla qual coluna estou no momento
		var cont_coluna = 0;
		//pega o elemento destino e seta na variavel pai		
		var pai = document.getElementById("prox_item");
		
		//cria o elemento <div> com os atributos que definem que ela é a linha e guarda na variavel lin
		var lin = document.createElement("div");
		lin.setAttribute("id","linha"+cont_pc);
		lin.setAttribute("class","row form-group");
		//define que linha vai ser criada dentro de pai
		pai.appendChild(lin);

//-------------------------------------------------------------------------------------------------------
//	COLUNA DO ESTABELECIMENTO
//-------------------------------------------------------------------------------------------------------

		//cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variavel col
		var col = document.createElement("div");
		col.setAttribute("id","coluna"+cont_coluna+cont_pc);
		col.setAttribute("class","col-sm-5");
		var linha = document.getElementById("linha"+cont_pc);
		//define que coluna vai ser criada dentro de linha
		linha.appendChild(col);
		
		//cria o elemento <label> com os seus atributos
		var lab = document.createElement("label");
		lab.innerHTML = 'Estabelecimento:';
		var coluna = document.getElementById("coluna"+cont_coluna+cont_pc);		
		coluna.appendChild(lab);

		//cria o elemento <input> com os seus atributos e guarda na variavel inp
		var inp = document.createElement("input");
		inp.setAttribute("id", "can_estabelecimento_"+cont_pc);
		inp.setAttribute("type", "text");
		inp.setAttribute("name", "can_estabelecimento_"+cont_pc);
		inp.setAttribute("class", "form-control");
		inp.setAttribute("style", "text-transform:uppercase;");
		coluna.appendChild(inp);

		cont_coluna++;

//-------------------------------------------------------------------------------------------------------
//	COLUNA DO VALOR
//-------------------------------------------------------------------------------------------------------

		//cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variavel col
		var col = document.createElement("div");
		col.setAttribute("id","coluna"+cont_coluna+cont_pc);
		col.setAttribute("class","col-sm-3");
		var linha = document.getElementById("linha"+cont_pc);
		//define que coluna vai ser criada dentro de linha
		linha.appendChild(col);
		
		//cria o elemento <label> com os seus atributos
		var lab = document.createElement("label");
		lab.innerHTML = 'Valor (R$):';
		var coluna = document.getElementById("coluna"+cont_coluna+cont_pc);		
		coluna.appendChild(lab);

		//cria o elemento <input> com os seus atributos e guarda na variavel inp
		var inp = document.createElement("input");
		inp.setAttribute("id", "can_valor_"+cont_pc);
		inp.setAttribute("type", "text");
		inp.setAttribute("name", "can_valor_"+cont_pc);
		inp.setAttribute("class", "form-control");
        inp.setAttribute("onKeyDown", "mascara(this, valorMoeda);");
		inp.setAttribute("style", "text-transform:uppercase;");
		coluna.appendChild(inp);

		cont_coluna++;	
        
       

//-------------------------------------------------------------------------------------------------------
//	COLUNA DO ANEXO
//-------------------------------------------------------------------------------------------------------

		//cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variavel col
		var col = document.createElement("div");
		col.setAttribute("id","coluna"+cont_coluna+cont_pc);
		col.setAttribute("class","col-sm-3");
		var linha = document.getElementById("linha"+cont_pc);
		//define que coluna vai ser criada dentro de linha
		linha.appendChild(col);
		
		//cria o elemento <label> com os seus atributos
		var lab = document.createElement("label");
		lab.innerHTML = 'Valor (R$):';
		var coluna = document.getElementById("coluna"+cont_coluna+cont_pc);		
		coluna.appendChild(lab);

		//cria o elemento <input> com os seus atributos e guarda na variavel inp
		var inp = document.createElement("input");
		inp.setAttribute("id", "can_anexo_"+cont_pc);
		inp.setAttribute("type", "file");
		inp.setAttribute("name", "can_anexo_"+cont_pc);
		inp.setAttribute("class", "form-control");
		coluna.appendChild(inp);
		cont_coluna++;				

//-------------------------------------------------------------------------------------------------------
//	COLUNA DO BOTÃO ADD
//-------------------------------------------------------------------------------------------------------

		//cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variavel col
		var col = document.createElement("div");
		col.setAttribute("id","coluna"+cont_coluna+cont_pc);
		col.setAttribute("class","col-sm-1");
		col.setAttribute("style","padding-top: 25px");
		var linha = document.getElementById("linha"+cont_pc);
		//define que coluna vai ser criada dentro de linha
		linha.appendChild(col);

        //cria o elemento <a> com os seus atributos e guarda na variavel tag_a
		var tag_a1 = document.createElement("a"); 
		tag_a1.setAttribute("onClick","criar();");
		tag_a1.setAttribute("title","Adicionar linha");
		tag_a1.setAttribute("style", "text-decoration:none; position: relative; left:-10px;");
		//cria o botão para o clique
		tag_a1.innerHTML =' <span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-plus fa-stack-1x fa-inverse"></i></span>';
		
        var coluna = document.getElementById("coluna"+cont_coluna+cont_pc);
		coluna.appendChild(tag_a1);

        //cria o elemento <a> com os seus atributos e guarda na variavel tag_a
		var tag_a2 = document.createElement("a"); 
		tag_a2.setAttribute("onClick","del_attr("+cont_pc+");");
		tag_a2.setAttribute("title","Excluir linha");
		tag_a2.setAttribute("style", "text-decoration:none; position: relative; left:-10px;");
		//cria o botão para o clique
		tag_a2.innerHTML =' <span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x text-danger"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i></span>';
        var coluna = document.getElementById("coluna"+cont_coluna+cont_pc);
		coluna.appendChild(tag_a2);

		//incrementa o contador de atributos inseridos
		cont_pc++;
 		document.getElementById('qtd_pc').value = cont_pc;
	}

	function del_attr(i){
		//remove a linha com seus dados e elementos
		$("#linha"+i).remove();
	}

</script>