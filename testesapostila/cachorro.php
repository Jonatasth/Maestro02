<?php
	class Cachorro
	{
		private $nascimento;
		//método construtor
		function __construct($nome)
			{
				$this->nome = $nome;
			}
						
		//intercepta atribuição
		function __set($propriedade, $valor)
			{
				if($propriedade == 'nascimento')
					{
					//verifica se valor é dividido em 3 partes separadas por '/'
						if(count(explode('/', $valor))==3)
							{
								echo "Dado '$valor', atribuído à '$propriedade'\n";
								$this->$propriedade = $valor;
							}
							else
							{
								echo "Dado '$valor', não atribuido à '$propriedade'\n";
							}
					}
					else
					{
						$this->$propriedade = $valor;
					}
			}
	}
	?>