<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		if ($_SESSION["rol"] == "medico" or $_SESSION["rol"] == "cliente" or $_SESSION["rol"] == "administrador"){
		?>
		
		<?php
			
			// RECIBE ID DE HISTORIA CLINICA
			$id_historiaclinica = $_GET["id_historiaclinica"];
			
			// INICIO
			require('../plugins/fpdf181/PDF_MC_Table.php');
			$pdf = new PDF_MC_Table();
			$pdf->AddPage('P', 'A4');
			
			// ENCABEZADO
			$pdf->SetFont('Arial', 'B', 16);
			$pdf->Cell(190, 6, utf8_decode('Hospital Nuestra Familia'), 0, 0, 'C');
			$pdf->Ln(10);
			
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 6, utf8_decode('Exámenes Médicos'), 0, 0, 'C');
			$pdf->Ln(10);
			
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 6, utf8_decode('Datos Personales:'), 0, 0, 'D');
			$pdf->Ln(10);
			
			// TÍTULOS
			$pdf->SetFillColor(175, 225, 240); 
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(47.5, 6, utf8_decode('Cédula'), 1, 0, 'C', 1);
			$pdf->Cell(47.5, 6, utf8_decode('Paciente'), 1, 0, 'C', 1);
			$pdf->Cell(47.5, 6, utf8_decode('Email'), 1, 0, 'C', 1);
			$pdf->Cell(47.5, 6, utf8_decode('Teléfono'), 1, 0, 'C', 1);
			$pdf->Ln(6);
			
			// ANCHO DE COLUMNAS
			$pdf->SetWidths(array(47.5, 47.5, 47.5, 47.5));
			
			// FILAS
			$pdf->SetFont('Arial', '', 8);
			require_once("../modelo/Historiaclinica.php");
			$res = historiaclinica::single_row($id_historiaclinica);
			require_once("../modelo/Persona.php");
			$res2 = Persona::read();
			while ($dato2 = mysqli_fetch_object($res2)){
				if ($res->id_persona3 == $dato2->id_persona){
					$cedula = $dato2->cedula_per;
				}
			}			
			require_once("../modelo/Persona.php");
			$res2 = Persona::read();
			while ($dato2 = mysqli_fetch_object($res2)){
				if ($res->id_persona3 == $dato2->id_persona){
					$paciente = $dato2->nombre_per." ".$dato2->apellido_per;
				}
			}			
			require_once("../modelo/Persona.php");
			$res2 = Persona::read();
			while ($dato2 = mysqli_fetch_object($res2)){
				if ($res->id_persona3 == $dato2->id_persona){
					$email = $dato2->email_per;
				}
			}			
			require_once("../modelo/Persona.php");
			$res2 = Persona::read();
			while ($dato2 = mysqli_fetch_object($res2)){
				if ($res->id_persona3 == $dato2->id_persona){
					$telefono = $dato2->telefono_per;
				}
			}
			$pdf->Row(array($cedula, $paciente, $email, $telefono), 0);
			
			// SEPARADOR
			$pdf->Ln(6);
			
			// TITULO
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 6, utf8_decode('Exámenes'), 0, 0, 'D');
			$pdf->Ln(10);
			
			// TÍTULOS EXAMENES
			$pdf->SetFillColor(175, 225, 240); 
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(31, 6, utf8_decode('Fecha'), 1, 0, 'C', 1);
			$pdf->Cell(31, 6, utf8_decode('Hora'), 1, 0, 'C', 1); 
			$pdf->Cell(32, 6, utf8_decode('Tipo'), 1, 0, 'C', 1);
			$pdf->Cell(32, 6, utf8_decode('Descripción'), 1, 0, 'C', 1);
			$pdf->Cell(32, 6, utf8_decode('Resultado'), 1, 0, 'C', 1);
			$pdf->Cell(32, 6, utf8_decode('Estado'), 1, 0, 'C', 1);
			$pdf->Ln(6);
			
			// ANCHO DE COLUMNAS FARMACOS
			$pdf->SetWidths(array(31, 31, 32, 32, 32, 32));
			
			// FILAS FARMACOS
			$pdf->SetFont('Arial', '', 8);			
			require_once("../modelo/Examen.php");
			$res = Examen::read2($id_historiaclinica);			
			while ($dato = mysqli_fetch_object($res)){				
				$a = $dato->fecha_exa;
				$b = $dato->hora_exa;
				$c = $dato->tipo_exa;
				$d = $dato->descripcion_exa;
				$e = $dato->resultado_exa;
				$f = $dato->estado_exa;				
				$pdf->Row(array($a, $b, $c, $d, $e, $f), 0);
			}
			
			// SEPARADOR
			$pdf->Ln(25);
			
			if ($_SESSION["rol"] == "medico"){				
				$pdf->SetFont('Arial', 'B', 10);
				$pdf->Cell(190, 6, utf8_decode('_____________________________________________'), 0, 0, 'C');
				$pdf->Ln(6);
				
				$pdf->SetFont('Arial', 'B', 10);
				$pdf->Cell(190, 6, utf8_decode("Dr. ".$_SESSION["nombre_per"]." ".$_SESSION["apellido_per"]), 0, 0, 'C');
				$pdf->Ln(6);			
			}
			
			// MOSTRAR
			$pdf->Output('Receta.pdf', 'I');
			
		?>
		
		<?php
			}else{
			require_once("noacceso.php");
		}
	}
	ob_end_flush();
?>							