<?php
    require('../plugins/fpdf/fpdf.php');

    $exaCOD = $_GET['idEXA'];
    $nomLAB = $_GET['laboratorio'];
    $medicoREF = $_GET['medico'];
    $fechaEXA = $_GET['fecha'];
    $laboratoristaNOM = $_GET['laboratorista'];
    
    $a = 0;
    $b = 0;
    $c = 0;
    $i = 0;
    // $razon = 20;
    // $razon2 = 30;
    
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('../img/LabSys.png',10,11,22);
            // Arial bold 15
            $this->SetFont('Times','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10, utf8_decode('RESULTADO DE EXÁMENES - LabSys') ,0,0,'C');

            $this->Ln(10);
            $this->SetFont('Times','I',10);
            $this->Cell(80);
            $this->Cell(30,5,utf8_decode('De los errores del ayer, hazlos fortalezas del mañana'),0,0,'C');

            $this->Ln(10);
            //B ->Negrita, BU ->Subrayado, I ->Cursiva
            $this->SetFont('Times','B',15);
            $this->Cell(80);
            $this->Cell(30,2,utf8_decode('DATOS PERSONALES'),0,0,'C');
            // Logo
            $this->Image('../img/Innvo TechS.png',178,9,26);

        }

        // Pie de página
        function Footer()
        {
            //Posiciones Derecha 'R', Izquierda 'L' y Centrado 'C'
            // Posición: a 1,5 cm del final
            $this->SetY(-20);
            // Arial italic 8
            $this->SetFont('Times','I',8);
            
            // $this->Ln(2);
            
            //Lineas en FPDF
            //Grosor de linea
            $this->setLineWidth(0.65);
            //Color de linea
            $this->SetDrawColor(57,62,125);
            //Ancho borde izquierdo, Altura->Abajo-Arriba, Ancho->1cm = 100, Altura->Abajo-Arriba
            $this -> Line(10, 275, 70, 275);
            
            $this->SetDrawColor(34,113,179);
            $this -> Line(75, 275, 135, 275);
            $this->SetDrawColor(57,62,125);
            $this -> Line(140, 275, 200, 275);

            $this->SetLeftMargin(12);
            //Fuente
            $this->Cell(0,9,utf8_decode("Fuente: LabSys - Innova Tech'S"),0,1,'L');
            //Fecha de Impresion
            $this->Cell(0, 0,utf8_decode('Fecha de impresión: '.date('d/m/Y')),0,1,'L');
            //Hora de Impresion
            $this->Cell(0, 0,utf8_decode('Hora: '.date('h:i:s')),0,1,'C');
            // Número de página
            $this->Cell(0, 0, utf8_decode('N. Página').$this->PageNo().'/{nb}',0,0,'R');
            
        }

    }

    
    //Llamamos a la conexion
    include ("../includes/DbConnect.php");

    include_once '../includes/user.php';
	include_once '../includes/user_session.php';
	$userSession = new UserSession();
	$user = new User();

    $db = new DbConnect();
    $con = $db->connect();
        
    $cedula = $_SESSION['user'];

    $query = "SELECT * FROM user WHERE cedula = '$cedula'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $apellidoDB = $row['apellidos'];
        $nombreDB = $row['nombres'];
    }
    mysqli_free_result($result);
    
    $pdf = new PDF();
    $pdf->AliasNbPages(); //Numero de pag de ?
    $pdf->AddPage();
    $pdf->Image('../img/LabSysPDF.png',10,53,110);
    $pdf->SetFont('Times','I',10);
    
    //Margen de lado izquierdo
    $pdf->SetLeftMargin(25);

    //Salto de linea
    $pdf->Ln(10);
    
    //Texto que se quiere mostrar
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('IDENTIFICACIÓN        :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($cedula), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('DATOS PERONALES   :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($apellidoDB)." ".utf8_decode($nombreDB), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('CODIGO                         :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($exaCOD), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('MEDICO REF.              :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($medicoREF), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('LABORATORIO            :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($nomLAB), 0, 1);
    
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('MEDICO LAB.              :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($laboratoristaNOM), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(40,5, utf8_decode('FECHA                          :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(75,5, utf8_decode($fechaEXA), 0, 0);

    $pdf->SetLeftMargin(10);
    $pdf->Ln(15);

    $exaCODIGO = $exaCOD;

    $query1 = "  SELECT
                    resultado_examen.id_paciente,
                    parametros_reactivo.tipo,
                    resultado_examen.cod_ensayo,
                    parametros_reactivo.ensayo,
                    parametros_reactivo.ref_menor,
                    parametros_reactivo.ref_mayor,
                    resultado_examen.resultado,
                    resultado_examen.observaciones 
                FROM
                    resultado_examen
                    INNER JOIN parametros_reactivo ON resultado_examen.cod_ensayo = parametros_reactivo.cod_ensayo
                WHERE resultado_examen.id_paciente = '".$exaCODIGO."'
                ORDER BY parametros_reactivo.tipo DESC";

    $result1 = mysqli_query($con, $query1);

    while ($row = mysqli_fetch_assoc($result1)) {
        
        //Ancho, Altura, Celda a extraer, Border->SI(1)/NO(0), Salto de linea->SI(1)/NO(0), Alineacion del texto, Relleno->SI(1)/NO(0)
        //Color de celda -> $pdf->SetFillColor(0, 0, 255);
        //Color de texto -> $pdf->SetTextColor(255,255,255);
        if ($row['tipo'] === 'Sangre') {
            if ($c === 0) {
                $pdf->SetFont('Times','B',15);
                $pdf->Cell(81);
                $pdf->Cell(30,2,utf8_decode('RESULTADO HEMOGRAMA'),0,0,'C');
                $pdf->SetLeftMargin(31);
                $pdf->Ln(10);

                //Titulo del cuadro
                $pdf->SetFont('Times','B',10);
                $pdf->SetFillColor(205, 205, 205);
                $pdf->Cell(5, 7, 'N', 1, 0, 'C', 1);
                $pdf->Cell(33, 7, 'Ensayo', 1, 0, 'C', 1);
                $pdf->Cell(30, 7, 'Concentracion', 1, 0, 'C', 1);
                $pdf->Cell(40, 7, 'Interpretacion', 1, 0, 'C', 1);
                $pdf->Cell(40, 7, 'Referencia', 1, 0, 'C', 1);

                $pdf->SetFont('Times','I',10);
                
                $c++;
                $i = 0;
            }
            $pdf->Ln();
            ++$i;
            $pdf->Cell(5, 7, $i, 1, 0, 'C', 0);
            $pdf->Cell(33, 7, $row['ensayo'], 1, 0, 'C', 0);
            $pdf->Cell(30, 7, $row['resultado'], 1, 0, 'C', 0);
            $pdf->Cell(40, 7, $row['observaciones'], 1, 0, 'C', 0);
            $pdf->Cell(40, 7, $row['ref_menor'] ." - ". $row['ref_mayor'], 1, 0, 'C', 0);
        }
        else {
            
            if ($row['tipo'] === 'Orina') {
                if ($a === 0) {
                    $pdf->Ln(20);
                
                    $pdf->SetFont('Times','B',15);
                    $pdf->Cell(61);
                    $pdf->Cell(30,2,utf8_decode('RESULTADO ORINA'),0,0,'C');
                    $pdf->SetLeftMargin(50);
                    $pdf->Ln(11);
                    
                    //Titulo del cuadro
                    $pdf->SetFont('Times','B',10);
                    $pdf->SetFillColor(205, 205, 205);
                    $pdf->Cell(5, 7, 'N', 1, 0, 'C', 1);
                    $pdf->Cell(33, 7, 'Ensayo', 1, 0, 'C', 1);
                    $pdf->Cell(30, 7, 'Concentracion', 1, 0, 'C', 1);
                    $pdf->Cell(40, 7, 'Interpretacion', 1, 0, 'C', 1);
                    
                    $a++;
                    $i = 0;
                }
                
                $pdf->SetFont('Times','I',10);
                $pdf->Ln();
                ++$i;
                $pdf->Cell(5, 7, $i, 1, 0, 'C', 0);
                $pdf->Cell(33, 7, $row['ensayo'], 1, 0, 'C', 0);
                $pdf->Cell(30, 7, $row['resultado'], 1, 0, 'C', 0);
                $pdf->Cell(40, 7, $row['observaciones'], 1, 0, 'C', 0);
                    
            }
            else {
                if ($row['tipo'] === 'Heces') {
                    if ($b === 0) {
                        $pdf->Ln(20);
                    
                        $pdf->SetFont('Times','B',15);
                        $pdf->Cell(41);
                        $pdf->Cell(30,2,utf8_decode('RESULTADO HECES'),0,0,'C');
                        $pdf->SetLeftMargin(50);
                        $pdf->Ln(11);
                        
                        //Titulo del cuadro
                        $pdf->SetFont('Times','B',10);
                        $pdf->SetFillColor(205, 205, 205);
                        $pdf->Cell(5, 7, 'N', 1, 0, 'C', 1);
                        $pdf->Cell(33, 7, 'Ensayo', 1, 0, 'C', 1);
                        $pdf->Cell(30, 7, 'Concentracion', 1, 0, 'C', 1);
                        $pdf->Cell(40, 7, 'Interpretacion', 1, 0, 'C', 1);
                        
                        $b++;
                        $i = 0;
                    }

                    $pdf->SetFont('Times','I',10);
                    $pdf->Ln();
                    ++$i;
                    $pdf->Cell(5, 7, $i, 1, 0, 'C', 0);
                    $pdf->Cell(33, 7, $row['ensayo'], 1, 0, 'C', 0);
                    $pdf->Cell(30, 7, $row['resultado'], 1, 0, 'C', 0);
                    $pdf->Cell(40, 7, $row['observaciones'], 1, 0, 'C', 0);                    
                }
            }
        }
        
        // $pdf->Cell(40, 7, $row['E_mail'], 1, 1, 'C', 0;
    }

    $pdf->Output();
?>