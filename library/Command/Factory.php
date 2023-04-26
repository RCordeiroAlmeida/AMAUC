<?php
class Command_Factory {
    
    public function createCommand() {
        //Se o module não for informado, ele passa a ser considerado o index;
        $module = (isset($_GET['module'])) ? $_GET['module'] : 'index';
        //A mesma coisa para a action
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';

        //Deixa a string em minusculo
        $module = htmlspecialchars(strtolower($module));
        $action = htmlspecialchars(strtolower($action));
        
          //Cria o nome do arquivo da Action
        $fileName = 'application/'.$module.'/'.$action.'.php';
        //Se o arquivo existir, carrega-o, caso contr�rio gera erro
        if (!file_exists($fileName)) {
            throw new Exception_Pagenotfound('Arquivo do Command '.$module.'/'.$action.' não foi encontrado');
        }
        //Carrega o arquivo que contem a classe do Command
        require_once $fileName;
        //O nome da classe � a Action seguida da String Command
        $className = $action.'Command';
        //Ap�s o arquivo contendo a classe ser carregado, verificamos se a classe existe, caso n�o existir, lan�a erro
        //o par�metro false indica que n�o deve ser invocado o __autoload para carregar essa classe
        if (!class_exists($className,false)) {
            throw new Exception_Pagenotfound('A classe '.$className.' não existe dentro do arquivo do Command');
        }
        //Carrega a classe e retorna
        return new $className();
        
    }
}
?>