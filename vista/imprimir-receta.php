<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		if ($_SESSION["rol"] == "medico" or $_SESSION["rol"] == "cliente" or $_SESSION["rol"] == "administrador"){
		?>
		
		<?php
			
			// RECIBE ID DE RECETA
			$id_receta = $_GET["id_receta"];
			
			// INICIO
			require('../plugins/fpdf181/PDF_MC_Table.php');
			$pdf = new PDF_MC_Table();
			$pdf->AddPage('P', 'A4');
			
			// ENCABEZADO
			$pdf->SetFont('Arial', 'B', 16);
			$pdf->Cell(190, 6, utf8_decode('Hospital Nuestra Familia'), 0, 0, 'C');
			$pdf->Ln(10);
			
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 6, utf8_decode('Receta Médica'), 0, 0, 'C');
			$pdf->Ln(10);
			
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 6, utf8_decode('Datos Personales:'), 0, 0, 'D');
			$pdf->Ln(10);
			
			// TÍTULOS
			$pdf->SetFillColor(175, 225, 240); 
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(15, 6, utf8_decode('Código'), 1, 0, 'C', 1); 
			$pdf->Cell(35, 6, utf8_decode('Cédula'), 1, 0, 'C', 1);
			$pdf->Cell(35, 6, utf8_decode('Paciente'), 1, 0, 'C', 1);
			$pdf->Cell(35, 6, utf8_decode('Fecha'), 1, 0, 'C', 1);
			$pdf->Cell(35, 6, utf8_decode('Hora'), 1, 0, 'C', 1);
			$pdf->Cell(35, 6, utf8_decode('Estado'), 1, 0, 'C', 1);
			$pdf->Ln(6);
			
			// ANCHO DE COLUMNAS
			$pdf->SetWidths(array(15, 35, 35, 35, 35, 35));
			
			// FILAS
			$pdf->SetFont('Arial', '', 8);
			require_once("../modelo/Receta.php");
			
			$res = receta::single_row2($id_receta);			
			$id_receta = $res->id_receta;
			$cedula_per = $res->cedula_per;
			$nombre_per = $res->nombre_per." ".$res->apellido_per;
			$fecha_rec = $res->fecha_rec;
			$hora_rec = $res->hora_rec;
			$estado_rec = $res->estado_rec;			
			$pdf->Row(array($id_receta, $cedula_per, $nombre_per, $fecha_rec, $hora_rec, $estado_rec), 0);
			
			$pdf->Ln(6);
			
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 6, utf8_decode('Fármacos'), 0, 0, 'D');
			$pdf->Ln(10);
			
			// TÍTULOS FARMACOS
			$pdf->SetFillColor(175, 225, 240); 
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(15, 6, utf8_decode('Cantidad'), 1, 0, 'C', 1);
			$pdf->Cell(29, 6, utf8_decode('Fármaco'), 1, 0, 'C', 1); 
			$pdf->Cell(29, 6, utf8_decode('Presentación'), 1, 0, 'C', 1);
			$pdf->Cell(29, 6, utf8_decode('Administración'), 1, 0, 'C', 1);
			$pdf->Cell(29, 6, utf8_decode('Posología'), 1, 0, 'C', 1);
			$pdf->Cell(29, 6, utf8_decode('Duración'), 1, 0, 'C', 1);
			$pdf->Cell(30, 6, utf8_decode('Indicaciones'), 1, 0, 'C', 1);
			$pdf->Ln(6);
			
			// ANCHO DE COLUMNAS FARMACOS
			$pdf->SetWidths(array(15, 29, 29, 29, 29, 29, 30));
			
			// FILAS FARMACOS
			$pdf->SetFont('Arial', '', 8);
			require_once("../modelo/Recetafarmaco.php");
			$res = Recetafarmaco::read2($id_receta);
			while ($dato = mysqli_fetch_object($res)){
				
				require_once("../modelo/Farmaco.php");
				$res2 = Farmaco::read();
				while ($dato2 = mysqli_fetch_object($res2)){
					if ($dato->id_farmaco1 == $dato2->id_farmaco){
						echo "<td>".$dato2->nombre_far."</td>";		
						$nombre_far = $dato2->nombre_far;
					}
				}
				
				require_once("../modelo/Farmaco.php");
				$res2 = Farmaco::read();
				while ($dato2 = mysqli_fetch_object($res2)){
					if ($dato->id_farmaco1 == $dato2->id_farmaco){
						echo "<td>".$dato2->nombre_far."</td>";		
						$presentacion_far = $dato2->presentacion_far;
					}
				}
				
				require_once("../modelo/Farmaco.php");
				$res2 = Farmaco::read();
				while ($dato2 = mysqli_fetch_object($res2)){
					if ($dato->id_farmaco1 == $dato2->id_farmaco){
						echo "<td>".$dato2->nombre_far."</td>";		
						$administracion_far = $dato2->administracion_far;
					}
				}
				
				// $nombre_far = $dato->id_farmaco1;		
				// $presentacion_far = $dato->presentacion_far;		
				// $administracion_far = $dato->administracion_far;		
				$cantidad_recfar = $dato->cantidad_recfar;		
				$posologia_recfar = $dato->posologia_recfar;		
				$duracion_recfar = $dato->duracion_recfar;		
				$indicaciones_recfar = $dato->indicaciones_recfar;		
				$pdf->Row(array($cantidad_recfar, $nombre_far, $presentacion_far, $administracion_far, $posologia_recfar, $duracion_recfar, $indicaciones_recfar), 0);
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