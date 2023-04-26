<?php
require_once 'DataSet.php';

class DataManipulation{
	
	var $tabela;
	
	function executaSQL($sql){
		$dataset = new DataSet();
		$dataset->executeRecord($sql);
		//echo $sql;
	}
	
	function add($data){
		foreach($data as $key => $valor){
			$campos[] = $key;
			$valores[] = $valor;  
		}
		
		for ($i=0;$i<count($campos);$i++){
			if ($i==0){
				$field = $campos[$i];
				$values = "'".$valores[$i]."'";
			}else{
				$field .= ', '.$campos[$i];
				$values .= ", '".$valores[$i]."'";	
			}
		}
		$dataset = new DataSet();
		$sql = "INSERT INTO ".$this->tabela." (".$field.") VALUES (".$values.")";
		//echo '<br /><br /><br /> sql:'.$sql;
		$dataset->executeRecord($sql);
	}
	
	function update($data){
		$dataset = new DataSet();
		$sql = "SHOW INDEXES FROM ".$this->tabela." WHERE Key_name = 'PRIMARY'";
		$result = $dataset->listRecord($sql); 		
		foreach($data as $key => $valor){	
			$campos[]  = $key;
			$valores[] = $valor;
		}
		
		for ($i=0;$i<count($campos);$i++){
			if ($i==0){
				$values = $campos[$i]." = '".$valores[$i]."'";
			}else{
				$values .= ", ".$campos[$i]." = '".$valores[$i]."'";	
			}
		}
		
		for($i=0;$i<count($result);$i++){
			if($campos[$i] = $result[$i]['Column_name']){
				$chave[$i] = $campos[$i];
				$id[$i]    = $valores[$i];
			}
		}
		
		for($i=0;$i<count($chave);$i++){
			if ($i==0){
				$values_key = $chave[$i]." = '".$id[$i]."'";
			}else{
				$values_key .= " AND ".$chave[$i]." = '".$id[$i]."'";	
			}
		}
		
		$sql = "UPDATE ".$this->tabela." SET ".$values." WHERE ".$values_key;
		//echo $sql.'<br />';
		$dataset->executeRecord($sql);		
	}	

	function delete($id){
		$dataset = new DataSet();
		$sql = "SHOW INDEXES FROM ".$this->tabela." WHERE Key_name = 'PRIMARY'";
		
		$result = $dataset->listRecord($sql);
		
		$sql = "DELETE FROM ".$this->tabela." WHERE ".$result[0]['Column_name']." = '".$id."'";
		//echo "<br />".$sql;
		$dataset->executeRecord($sql);	
	}

	function MaxValue($id, $table){
		$dataset = new DataSet();		
		$sql = "SELECT MAX(".$id.") AS codigo FROM ".$table;
		$codigo = $dataset->listRecord($sql);
		if($codigo[0]['codigo']){
			return $codigo[0]['codigo'];
		}else{
			return 0;
		}
	}
	
	function find($type=false,$params=false,$order=false){
		$dataset = new DataSet();
		
		switch($type){
			case 'all': default:
				$sql = "SELECT * FROM ".$this->tabela;
			break;
			
			case 'list':
				$i = 0;
				if($params != false){
					foreach($params as $key => $valor){
						if($i == 0){
							$conditions = $key." = '".$valor."'";
							$i++;
						}else{
							$conditions .= " AND ".$key." = '".$valor."'";
						}  
					}
				}else{
					$conditions = '1';
				}

				$sql = "SELECT * FROM ".$this->tabela." WHERE ".$conditions;
				//echo $sql;
			break;

			case 'dynamic':
				$sql = $params;	
				//echo "<br />".$sql."<br />";				
			break;
		}
		if($order != false){
			$sql .= " order by ".$order;	
		}
		return $dataset->listRecord($sql);
	}
}
?>