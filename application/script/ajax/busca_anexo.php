<?php
    require_once('../../../library/MySql.php'); // Conecta ao BD
    require_once('../../../library/DataManipulation.php'); 
    //
    $data = new DataManipulation();

    var_dump($_GET['id']);

    $sql = "";
    $data->executaSQL($sql);
?>

<script>
	var cont_pc = document.getElementById("qtd_anexo").value; //Controla a quantidade de itens que foram inseridos

    function criar() {
        // Controla qual coluna estou no momento
        var cont_coluna = 0;
        // Pega o elemento destino e seta na variável pai
        var pai = document.getElementById("prox_item");

        // Cria o elemento <div> com os atributos que definem que ela é a linha e guarda na variável lin
        var lin = document.createElement("div");
        lin.setAttribute("id", "linha" + cont_pc);
        lin.setAttribute("class", "row form-group");
        // Define que a linha vai ser criada dentro de pai
        pai.appendChild(lin);

        //-------------------------------------------------------------------------------------------------------
        // COLUNA DO ESTABELECIMENTO
        //-------------------------------------------------------------------------------------------------------

        // Cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variável col
        var col = document.createElement("div");
        col.setAttribute("id", "coluna" + cont_coluna + cont_pc);
        col.setAttribute("class", "col-sm-5");
        var linha = document.getElementById("linha" + cont_pc);
        // Define que a coluna vai ser criada dentro de linha
        linha.appendChild(col);

        // Cria o elemento <label> com os seus atributos
        var lab = document.createElement("label");
        lab.innerHTML = 'Estabelecimento:';
        var coluna = document.getElementById("coluna" + cont_coluna + cont_pc);
        coluna.appendChild(lab);

        // Cria o elemento <input> com os seus atributos e guarda na variável inp
        var inp = document.createElement("input");
        inp.setAttribute("id", "can_estabelecimento_" + cont_pc);
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "can_estabelecimento_" + cont_pc);
        inp.setAttribute("class", "form-control");
        inp.setAttribute("style", "text-transform:uppercase;");
        coluna.appendChild(inp);

        cont_coluna++;

        //-------------------------------------------------------------------------------------------------------
        // COLUNA DO VALOR
        //-------------------------------------------------------------------------------------------------------

        // Cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variável col
        var col = document.createElement("div");
        col.setAttribute("id", "coluna" + cont_coluna + cont_pc);
        col.setAttribute("class", "col-sm-3");
        var linha = document.getElementById("linha" + cont_pc);
        // Define que a coluna vai ser criada dentro de linha
        linha.appendChild(col);

        // Cria o elemento <label> com os seus atributos
        var lab = document.createElement("label");
        lab.innerHTML = 'Valor (R$):';
        var coluna = document.getElementById("coluna" + cont_coluna + cont_pc);
        coluna.appendChild(lab);

        // Cria o elemento <input> com os seus atributos e guarda na variável inp
        var inp = document.createElement("input");
        inp.setAttribute("id", "can_valor_" + cont_pc);
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "can_valor_" + cont_pc);
        inp.setAttribute("class", "form-control");
        inp.setAttribute("onKeyDown", "mascara(this, valorMoeda);");
        inp.setAttribute("style", "text-transform:uppercase;");
        coluna.appendChild(inp);

        cont_coluna++;

        //-------------------------------------------------------------------------------------------------------
        // COLUNA DO ANEXO
        //-------------------------------------------------------------------------------------------------------

        // Cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variável col
        var col = document.createElement("div");
        col.setAttribute("id", "coluna" + cont_coluna + cont_pc);
        col.setAttribute("class", "col-sm-3");
        var linha = document.getElementById("linha" + cont_pc);
        // Define que a coluna vai ser criada dentro de linha
        linha.appendChild(col);

        // Cria o elemento <label> com os seus atributos
        var lab = document.createElement("label");
        lab.innerHTML = 'Anexo:';
        var coluna = document.getElementById("coluna" + cont_coluna + cont_pc);
        coluna.appendChild(lab);

        // Cria o elemento <input> com os seus atributos e guarda na variável inp
        var inp = document.createElement("input");
        inp.setAttribute("id", "can_anexo_" + cont_pc);
        inp.setAttribute("type", "file");
        inp.setAttribute("name", "can_anexo_" + cont_pc);
        inp.setAttribute("class", "form-control");
        coluna.appendChild(inp);

        cont_coluna++;

        //-------------------------------------------------------------------------------------------------------
        // COLUNA DO BOTÃO ADD
        //-------------------------------------------------------------------------------------------------------

        // Cria o elemento <div> com os atributos que definem que ela é a coluna e guarda na variável col
        var col = document.createElement("div");
        col.setAttribute("id", "coluna" + cont_coluna + cont_pc);
        col.setAttribute("class", "col-sm-1");
        col.setAttribute("style", "padding-top: 25px");
        var linha = document.getElementById("linha" + cont_pc);
        // Define que a coluna vai ser criada dentro de linha
        linha.appendChild(col);

        // Cria o elemento <a> com os seus atributos e guarda na variável tag_a1
        var tag_a1 = document.createElement("a");
        tag_a1.setAttribute("onClick", "criar();");
        tag_a1.setAttribute("title", "Adicionar linha");
        tag_a1.setAttribute("style", "text-decoration:none; position: relative; left:-10px;");
        // Cria o botão para o clique
        tag_a1.innerHTML = ' <span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-plus fa-stack-1x fa-inverse"></i></span>';

        var coluna = document.getElementById("coluna" + cont_coluna + cont_pc);
        coluna.appendChild(tag_a1);

        // Cria o elemento <a> com os seus atributos e guarda na variável tag_a2
        var tag_a2 = document.createElement("a");
        tag_a2.setAttribute("onClick", "del_attr(" + cont_pc + ");");
        tag_a2.setAttribute("title", "Excluir linha");
        tag_a2.setAttribute("style", "text-decoration:none; position: relative; left:-10px;");
        // Cria o botão para o clique
        tag_a2.innerHTML = ' <span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x text-danger"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i></span>';
        var coluna = document.getElementById("coluna" + cont_coluna + cont_pc);
        coluna.appendChild(tag_a2);

        // Incrementa o contador de atributos inseridos
        cont_pc++;
        // Atualiza o valor do campo de quantidade de anexos
        atualizarQuantidadeAnexos();
    }


	function del_attr(index) {
        // Remove a linha correspondente ao índice
        $("#linha" + index).remove();
        // Atualiza o valor do campo de quantidade de anexos
        atualizarQuantidadeAnexos();
    }

    function atualizarQuantidadeAnexos() {
        document.getElementById('qtd_anexo').value = cont_pc;
    }
   
</script>