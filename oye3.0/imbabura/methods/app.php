<?php
	// procesos referentes a angular $htpp
	$postdata = file_get_contents("php://input"); 
	$constructor = json_decode($postdata); 
	

	$horaactual = $constructor->time;
	$horaactual = strtotime($horaactual);
	$acuprograma[] = array(	'nombre' => 'Despertador',
							'horainicio' => '06:00',
							'horafin' => '08:00',
							'diaslaborables'=> array("Lunes","Martes","Miércoles","Jueves","Viernes")
							);
	$acuprograma[] = array(	'nombre' => 'LA SARTEN POR EL MANGO',
							'horainicio' => '08:30',
							'horafin' => '12:30',
							'diaslaborables'=> array("Lunes","Martes","Miércoles","Jueves","Viernes")
							);
	$acuprograma[] = array(	'nombre' => 'Inbox',
							'horainicio' => '14:30',
							'horafin' => '18:00',
							'diaslaborables'=> array("Lunes","Martes","Miércoles","Jueves","Viernes")
							);
	$acuprograma[] = array(	'nombre' => 'Los HP',
							'horainicio' => '18:00',
							'horafin' => '20:00',
							'diaslaborables'=> array("Lunes","Martes","Miércoles","Jueves","Viernes")
							);
	$acuprograma[] = array(	'nombre' => 'Sin Formatos',
							'horainicio' => '20:00',
							'horafin' => '22:00',
							'diaslaborables'=> array("Lunes","Martes","Miércoles","Jueves")
							);
	$acuprograma[] = array(	'nombre' => 'El Gordo La Flaca Y La Diabla',
							'horainicio' => '22:00',
							'horafin' => '23:59',
							'diaslaborables'=> array("Lunes","Martes","Miércoles","Jueves", "Viernes")
							);
	// $acuprograma[] = array('nombre' => 'DJ Oca Cerrano ', 'horainicio' => '18:00', 'horafin' => '20:00');
	$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	
	$acumulador[0]=0;
	for ($i=0; $i < count($acuprograma) ; $i++) {
		$horainicio = strtotime($acuprograma[$i]['horainicio']);
		$horafin = strtotime($acuprograma[$i]['horafin']);
		if($horaactual > $horainicio && $horaactual < $horafin) {
			$diaactual=$dias[date("w")];
			$diaslaborables=$acuprograma[$i]['diaslaborables'];
			$res = verificar_dias_laborables($diaactual,$diaslaborables);
			if ($res=='true') {
				$acumulador[0]=1;
				$acumulador[1] = $acuprograma[$i]['nombre'];
			}
		}
	}
	print_r(json_encode($acumulador));
	function verificar_dias_laborables($diaactual,$diaslaborables){
		$res='false';
		if (in_array($diaactual, $diaslaborables)) {
		    $res='true';
		}
		return $res;
	}
	
?> 