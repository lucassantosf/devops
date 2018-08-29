<?php	
	//funcoes recursivas
	$hierarquia = array(
		array(
			'nome_cargo'=>'CEO',
			'subordinados'=>array(
				//Inicio:diretor comercial
				array(
					'nome_cargo'=>'Diretor Comercial',
					'subordinados'=>array(
						//Inicio:Gerente de Vendas
						array(
							'nome_cargo'=>'Gerente de Vendas'
						)
						//Termino:Gerente de Vendasl
					)
				),

				//Termino:diretor comercial
				
				array(
					//Inicio:diretor financeiro
					'nome_cargo'=>'Diretor Financeiro',
					'subordinados'=>array(
							//Inicio:Gerente de contas a pagar
							'nome_cargo'=>'Gerente de Contas a Pagar',
							'subordinados'=>array(
								//Inicio: Supervisor de Pagamentos
								'nome_cargo'=>'Supervisor de Pagamentos',
								//Termino: Supervisor de Pagamentos
								)
							),
							//Termino:Gerente de contas a pagar
						//Inicio: Gerente de compras
						array(
							'nome_cargo'=>'Gerente de Compras',
							'subordinados'=>array(
									//Inicio: Supervisor de Suprimentos
									'nome_cargo'=>'Supervisor de Suprimentos',
									//Termino: Supervisor de Suprimentos
								)
							
						)
						//Termino: Gerente de compras
					)
					//Termino:diretor financeiro
				)
			)		
	);
	
	function exibe($cargos){

		$html = '<ul>';

			foreach ($cargos as $cargo) {
				$html .= "<li>";
				$html .= $cargo['nome_cargo'];
				
				if(isset($cargo['subordinados']) && count($cargo['subordinados']) > 0){
					$html .= exibe($cargo['subordinados']);
				}
				
				$html .= "</li>";
			}

		$html.= "</ul>";

		return $html;
	}
	
	echo exibe($hierarquia);
?>