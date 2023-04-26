<?php
class Exception_Pagenotfound extends Exception {
	public function __construct($mensagem,$codigo = 0) {
	    parent::__construct($mensagem,$codigo);
	}
}
?>