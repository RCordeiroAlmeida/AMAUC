<?php
/**
 * Classe para Conexao com banco de dados MySql
 */
class MySql
{
    //conexao com o banco de dados
    function connOpen()
    {	
		/*$server   = "localhost:3306";    // Endereço do servidor
        $user     = 'brroboti_1';  // Usuário
        $passw    = 'brt4mysql';        // Senha
        $database = 'brroboti_1';  // Nome Banco*/

        $server   = 'localhost';	 //Endereço do servidor
		$user     = 'root';			 // Usuário		
		$passw	  = '';	     // Senha
		$database = 'amauc';	 // Nome Banco
		
		$this->conn = mysqli_connect($server, $user, $passw, $database);
        mysqli_set_charset($this->conn, "utf8");

        if (!$this->conn)
        {//caso haja erro na conexao
            echo 'Erro ao conectar com o servidor. '.$this->error();
            exit (1);
        }
        
        // if (!mysqli_select_db($database, $this->conn)){//caso nao abra a base de dados
  //           echo 'Erro ao selecionar a base de dados. '.$this->error();
  //           exit (1);
  //       }
    }

    //fechar a conexao com o banco
    function connClose()
    {
        mysqli_close($this->conn);
    }

    /**
     * executa uma sql no banco
     *
     * @param String $sql, comando SQL a ser executado no banco ex: SELECT * FROM tabela
     * @param Boolean $boolean, true retorna ultima id, false retorna resultado
     * @return Variante
     */
    function executeQuery($sql,$param=false)
    {
        $this->connOpen();

        $this->result = mysqli_query($this->conn, $sql);
        if (!$this->result)
        {//caso nao execute a query corretamente
            echo 'Não foi possivel executar o comando SQL. '.$this->error();
            exit (1);
        }
        
        if ($param){
            $this->result = $this->lastId();
        }
            $this->connClose();
        
            return $this->result;
    }

    /**
     * contar e retorna o numero de linhas de uma consulta
     *
     * @return integer
     */
    function countLines($array)
    {
        return @mysqli_num_rows($array);
    }

    /**
     * mostrar o erro caso haja
     *
     * @return String
     */
    function error()
    {
        return mysqli_error($this->conn);
    }

    /**
     * retorna o valor do campo
     *
     * @param Integer $num, numero da linha a ser mostrada o valor
     * @param String $field, nome do campo a ser mostrado o valor
     * @return Variante
     */
    function result($result, $i, $field){
        if (mysqli_data_seek($result, $i)) {
            $row = mysqli_fetch_assoc($result);
            return $row[$field];
        }
    }
    
    /**
     * Retorna o ultimo id inserido no banco
     * 
     * @return Integer
     */
    function lastId(){
        return mysqli_insert_id();
    }
    
    function countFields($array){
        return @mysqli_num_fields($array);
    }
    
    function fieldName($array,$num){        
        return mysqli_fetch_field($array);
    }
}
?>
