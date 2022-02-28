
<?php
include('conexion.php');

$codigo = '20220036157';

/* $codigo = $_POST['codCarnet']; */

$lista = $conn->query("SELECT * FROM  estudian e inner JOIN carrera c on e.cod_car = c.cod_c WHERE e.cod_alu = $codigo LIMIT 1");



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Declaración de Consentimiento Informado</title>
</head>

<body>


    <header>
        <h3 class="tituloUniv">Universidad Martín Lutero</h3>
        <h5 class="lemaUniv">"Donde Todos Podemos Estudiar"</h5><br>

        <h3>SECRETARÍA GENERAL</h3>
        <H4>Dirección de Admisión y Registro Académico</H4>


    </header>



    <div class="container">
        <form action="index.php" method="POST">
            <h3>Escriba el número de carnet</h3>
            <label for="carnet"></label>
            <input id="carnet" name="codCarnet" class="form-control form-control-lg" type="text" placeholder="Escriba el número de carnet" aria-label=".form-control-lg example">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

    </div>

    <div class="container">
        <div class="row">

            <?php
            while ($estudiante = $lista->fetch(PDO::FETCH_ASSOC)) {

                if ($estudiante['est_civ'] == 'S') {
                    $estado = "SOLTERO(A)";
                } else if($estudiante['est_civ'] == 'C'){
                    $estado = "CASADO(A)";
                }
                
                $arancel = number_format($estudiante['valor_aran'],2);

                ?>

                
                
                <p>Yo: <strong> <u> <?php echo $estudiante['nom_alu']; ?> <?php echo $estudiante['ape_alu']; ?> </u> </strong> de estado civil: <strong><u><?php echo $estado; ?></u></strong> de profesión u oficio: <?php echo $estudiante['ocupacion']; ?>, identificado con cédula número: <strong><u><?php echo $estudiante['n_cedula']; ?>,</u></strong> del domicilio de: <strong><u><?php echo $estudiante['direccion']; ?>,</u></strong>  a través de la presente, declaro que he sido aceptado (a) como estudiante de la carrera de: <strong><u><?php echo $estudiante['nom_car']; ?></u></strong>, en la Universidad Martín Lutero (UML), Sede MANAGUA_, en la modalidad: Semipresencial, con el objetivo de acceder a una formación plena e integral que me permita desplegar una conciencia cristiana, crítica, científica y humana; desarrollar mi personalidad y el sentido de la dignidad; y capacitarme para asumir las tareas de interés común que demanda el progreso de la nación, con lo cual podré optar al título de: LICENCIADO (A) EN ENFERMERÍA, e insertarme al escenario laboral o emprender proyectos innovadores. </p>

                <p>
                    En vista de lo anterior, de mi libre y espontánea voluntad, DECLARO que he sido informado (a), entiendo y estoy conforme con las normas, requerimientos académicos, económicos y administrativos generales y particulares que rigen la Educación Superior en esta Universidad, con las cuales me declaro comprometido (a) desde el momento en que quedé oficialmente matriculado (a) y durante esté en vigencia el Plan de Estudios para la cohorte a la que pertenezco, en particular, he sido notificado de las siguientes cláusulas:
                </p>
                <p>
                    PRIMERA (DURACIÓN DE LA CARRERA): He sido informado (a) y entiendo que la duración de esta carrera establecida en el currículo, es de 5 (cinco) años, más el tiempo que me tome concluir con una de las modalidades de conclusión de estudios elegida; asimismo, entiendo que la duración de la carrera es directamente proporcional al cumplimiento por mi parte de las exigencias académicas en el tiempo y en la forma establecidas en el diseño curricular correspondiente, lo que implica que de no aprobar el plan de estudios en el tiempo indicado en el mismo, me veré en la obligación de matricular ciclos adicionales o aprobar materias en tiempo extraordinario de acuerdo a las normas establecidas por la universidad; así como, asumir los costos adicionales que ello implique.
                </p>
                <p><br><br><br><br>
                    SEGUNDA (ARANCELES): He sido informado (a) y entiendo que el costo anual de la matrícula es de: <strong><u>U$<?php echo number_format($estudiante['valor_mat'],2); ?>,</u></strong> (dólares norteamericanos) o su equivalente en córdobas; así mismo, se me ha informado y entiendo que el costo mensual de aranceles es de:  <strong><u>U$<?php echo $arancel; ?>,</u></strong> (dólares norteamericanos), o su equivalente en córdobas, por lo que me comprometo a actuar con responsabilidad como en efecto se hacerlo, cumpliendo con todas las exigencias académicas, económicas y administrativas que implica y exige el currículo de la misma, procurando en lo que me sea posible y esté a mi alcance no abandonar los estudios, salvo en caso fortuito y/o fuerza mayor, en cuya hipótesis, me obligo a notificar mi retiro dando aviso por escrito a la universidad, exponiendo los motivos pertinentes; asimismo, me comprometo a pagar puntualmente el monto total de la carrera en sesenta cuotas de U$ 35.00 cada una, las que cancelaré los días 16 de cada mes, sin que me exceda del período establecido por la UML para concluir mis estudios; entendiendo y aceptando que de no hacerlo en la fecha indicada, incurriré en mora del 10% sobre cada mes retrasado; asimismo, me comprometo a presentar mi carnet estudiantil para todo trámite en la universidad, entendiendo que la omisión de este requisito implicará que no seré atendido (a).

                </p>

        </div>
        <!-- 
            <div class="card-body info">
                <div class="title">
                    <a href="#"><strong style="color:white">Código:</strong> <?php echo $estudiante['cod_alu']; ?></a>
                </div>
                <div class="desc"><strong style="color:white">Nombre:</strong> <?php echo $estudiante['nom_alu']; ?></div>
            </div> -->

    </div>

<?php } ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>