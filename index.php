<?php
include('conexion.php');


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
        <div class="container">
            <div class="row">
                <div class="col-2 logoUML">
                    <img src="img/UMLGrisV.png" alt="">
                </div>
                <div class="col-7">
                    <h3 class="tituloUniv">Universidad Martín Lutero</h3>
                    <h5 class="lemaUniv">"Donde Todos Podemos Estudiar"</h5>

                    <h4>SECRETARÍA GENERAL</h4>
                    <h5>Dirección de Admisión y Registro Académico</h5>
                    <h6>Declaración de Consentimiento Informado</h6>
                </div>
                <div class="col-3">
                    <h6>Formato No.<br>SG001-0003</h6>
                </div>
            </div>
        </div>



    </header>



    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <!-- Column -->
                </div>
                <div class="col">

                </div>
                <div class="col-3">
                    <form id="formCarnet" action="index.php" method="POST">
                        <!-- <h3>Escriba el número de carnet</h3> -->
                        <!-- <label for="carnet"></label> -->
                        <input id="carnet" name="codCarnet" class="form-control form-control-sm" type="text" placeholder="Carnet" aria-label=".form-control-lg example">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form><br>
                </div>
            </div>
        </div>



        <div class="row">

            <?php
            $codigo = $_POST['codCarnet'];

            
            $conn->query("SET NAMES utf8");
            $lista = $conn->query("SELECT * FROM  estudian e inner JOIN carrera c on e.cod_car = c.cod_c WHERE e.cod_alu = $codigo and c.ano = '2022'");

            while ($estudiante = $lista->fetch(PDO::FETCH_ASSOC)) {


                //Validando Estado Civil
                $estado = "";
                if ($estudiante['est_civ'] == 'S') {
                    $estado = "SOLTERO(A)";
                } else if ($estudiante['est_civ'] == 'C') {
                    $estado = "CASADO(A)";
                };

                //Validando Modalidad
                if ($estudiante['modalidad'] == 2) {
                    $modalidad = "POR ENCUENTRO";
                } else if ($estudiante['modalidad'] == 4) {
                    $modalidad = "SEMIPRESENCIAL";
                };



                $arancel = number_format($estudiante['valor_aran'], 2);
                $cuotas = $estudiante['anocar']*12;
 

            ?>



                <h6 class="textcto">
                    Yo: <strong> <u> <?php echo $estudiante['nom_alu']; ?> <?php echo $estudiante['ape_alu']; ?> </u> </strong>, con número de carnet estudiantil: <strong> <u> <?php echo $estudiante['cod_alu']; ?></u> </strong>, de estado civil: <strong><u><?php echo $estado; ?></u></strong> de profesión u oficio: <strong><u><?php echo $estudiante['ocupacion']; ?>,</u></strong> identificado con cédula número: <strong><u><?php echo $estudiante['n_cedula']; ?>,</u></strong>,  del domicilio de: <strong><u><?php echo $estudiante['direccion']; ?>,</u></strong> a través de la presente, declaro que he sido aceptado (a) como estudiante de la carrera de: <strong><u><?php echo $estudiante['nom_car']; ?></u></strong>, en la Universidad Martín Lutero (UML), Sede <strong><u>OCOTAL,</u></strong> en la modalidad: <strong><u><?php echo $modalidad; ?>,</u></strong> con el objetivo de acceder a una formación plena e integral que me permita desplegar una conciencia cristiana, crítica, científica y humana; desarrollar mi personalidad y el sentido de la dignidad; y capacitarme para asumir las tareas de interés común que demanda el progreso de la nación, con lo cual podré optar al título de: <strong><u><?php echo $estudiante['tituloobt'] ? $estudiante['tituloobt'] : "___________________________"; ?></u></strong>, e insertarme al escenario laboral o emprender proyectos innovadores.
                </h6>

                <h6 class="textcto">
                    En vista de lo anterior, de mi libre y espontánea voluntad, DECLARO que he sido informado (a), entiendo y estoy conforme con las normas, requerimientos académicos, económicos y administrativos generales y particulares que rigen la Educación Superior en esta Universidad, con las cuales me declaro comprometido (a) desde el momento en que quedé oficialmente matriculado (a) y durante esté en vigencia el Plan de Estudios para la cohorte a la que pertenezco, en particular, he sido notificado de las siguientes cláusulas:
                </h6>
                <h6 class="textcto">
                    PRIMERA (DURACIÓN DE LA CARRERA): He sido informado (a) y entiendo que la duración de esta carrera establecida en el currículo, es de <strong><u><?php echo number_format($estudiante['anocar'], 1); ?>,</u></strong> años, más el tiempo que me tome concluir con una de las modalidades de conclusión de estudios elegida; asimismo, entiendo que la duración de la carrera es directamente proporcional al cumplimiento por mi parte de las exigencias académicas en el tiempo y en la forma establecidas en el diseño curricular correspondiente, lo que implica que de no aprobar el plan de estudios en el tiempo indicado en el mismo, me veré en la obligación de matricular ciclos adicionales o aprobar materias en tiempo extraordinario de acuerdo a las normas establecidas por la universidad; así como, asumir los costos adicionales que ello implique.
                </h6>
                <h6 class="textcto">
                    SEGUNDA (ARANCELES): He sido informado (a) y entiendo que el costo anual de la matrícula es de: <strong><u>U$<?php echo number_format($estudiante['valor_mat'], 2); ?>,</u></strong> (dólares norteamericanos) o su equivalente en córdobas; así mismo, se me ha informado y entiendo que el costo mensual de aranceles es de: <strong><u>U$<?php echo $arancel; ?>,</u></strong> (dólares norteamericanos), o su equivalente en córdobas, por lo que me comprometo a actuar con responsabilidad como en efecto se hacerlo, cumpliendo con todas las exigencias académicas, económicas y administrativas que implica y exige el currículo de la misma, procurando en lo que me sea posible y esté a mi alcance no abandonar los estudios, salvo en caso fortuito y/o fuerza mayor, en cuya hipótesis, me obligo a notificar mi retiro dando aviso por escrito a la universidad, exponiendo los motivos pertinentes; asimismo, me comprometo a pagar puntualmente el monto total de la carrera  en <strong><u><?php echo $cuotas; ?></u></strong>    cuotas de <strong><u>U$<?php echo $arancel; ?>,</u></strong> cada una, las que cancelaré los días 16 de cada mes, sin que me exceda del período establecido por la UML para concluir mis estudios; entendiendo y aceptando que de no hacerlo en la fecha indicada, incurriré en mora del 10% sobre cada mes retrasado; asimismo, me comprometo a presentar mi carnet estudiantil para todo trámite en la universidad, entendiendo que la omisión de este requisito implicará que no seré atendido (a).<br><br>
                </h6>

                <h6 class="textcto">
                    TERCERA (BECA PARCIAL): Declaro que he sido beneficiado (a) con el ___________________ de beca por el año lectivo <strong> <u> <?php echo $estudiante['ano_ing']; ?></u></strong> únicamente, beneficio que me otorga directamente la Universidad Martín Lutero (UML), y se me dio en el contexto de la Feria Anual de Becas que organiza y promueve el Ministerio de la Juventud (MINJUVE). Entiendo que este monto no le es reembolsado a la UML por ninguna institución del Estado; sin embargo, forma parte de las políticas de proyección social e incentivos a los estudiantes de primera carrera.
                </h6>

                <h6 class="textcto">
                    CUARTA (CURSOS COMPLEMENTARIOS): Es sabido por mí y acepto que además de las asignaturas obligatorias del currículum de mi carrera, debo inscribir y cursar cuatro cursos complementarios en horario y costos extraordinarios conforme a la tabla de aranceles que ha sido publicada en la página web de la UML: www.uml.edu.ni, vinculados al uso de la tecnología informática, entorno virtual de aprendizaje, innovación y emprendimiento, lo que me permitirán un mayor aprovechamiento de las herramientas tecnológicas con que cuenta la UML para mi proceso de formación profesional.
                </h6>

                <h6 class="textcto">
                    QUINTA (CASO FORTUITO O FUERZA MAYOR): Es sabido por mí y acepto, que si ocurriera una o más causas de fuerza mayor o caso fortuito, la UML puede suspender temporal o definitivamente la ejecución de esta carrera; así mismo, podría suspenderse si ocurriera que haya deserción y no se logre el equilibrio económico para el sostenimiento del programa en la cohorte a la que pertenezco, en cuyos casos tengo derecho a las siguientes opciones: 1 solicitar cambio de carrera o de turno; 2 solicitar la entrega de los documentos que acrediten los estudios realizados hasta el momento; 3 acogerme a los convenios que tenga la UML con otras universidades del país en cuanto a transferencia estudiantil, todo lo anterior previa cancelación de los aranceles correspondientes.
                </h6>

                <h6 class="textcto">
                    SEXTA (FORMAS DE CULMINACIÓN DE ESTUDIOS): He sido informado (a), entiendo y estoy de acuerdo que de conformidad con la Resolución N°. 001-2013 del Consejo Nacional de Rectores (CNR), tendiente a la POLITICA PARA LAS MODALIDADES DE CONCLUSION DE ESTUDIOS Y TITULACION EN LA EDUCACION SUPERIOR, vigente desde el 3 de junio del año 2013, tengo la libre opción de hacer abonos mensuales o de cualquier otra manera, al valor establecido por la universidad para las modalidades de conclusión de estudios, en el caso particular de la UML, he sido informado de que puedo concluir mis estudios eligiendo cualquiera de las siguientes opciones y costos para la cohorte a la que pertenezco
                </h6>

                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Formas de Culminación de Estudios</th>
                            <th scope="col">Costo en U$</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Monografía (Investigación)</td>
                            <td>U$ 500.00</td>
                            <td>Defensa ante tribunal de tres miembros</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Examen de Grado</td>
                            <td>U$ 500.00</td>
                            <td>Defensa ante tribunal de tres miembros</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Sistematización de Experiencias</td>
                            <td>U$ 500.00</td>
                            <td>Defensa ante tribunal de tres miembros</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Proyecto Emprendedor</td>
                            <td>U$ 500.00</td>
                            <td>Defensa ante tribunal de tres miembros</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Seminario de Grado</td>
                            <td>U$ 500.00</td>
                            <td>Defensa ante los docentes de cada módulo.</td>
                        </tr>

                    </tbody>
                </table>

                <h6 class="textcto">
                    En este sentido y de forma preliminar elijo la modalidad: ________________, y me comprometo a cancelar la suma de ___________________ en ______ cuotas de __________________ cada una, las que estarán en custodia de la universidad hasta que concluya mi plan de estudios e inicie con la ejecución de la forma de culminación de estudios de mi elección, entendiendo que en caso de retirarme de la universidad, tengo el derecho a que se me reembolse el monto total abonado a la fecha en concepto de modalidad de conclusión de estudios; siempre que no haya inscrito o esté cursando alguna de dichas modalidades, en cuyo caso, solo se me devolverá la parte que no haya sido aplicada por la universidad. En caso de que al finalizar mi plan de estudios, decidiera cambiar la modalidad de conclusión de estudios; acepto que se hagan los ajustes económicos que procedan a mi favor o a favor de la universidad.
                </h6>

                <h6 class="textcto">
                    SÉPTIMA (TRAMITACIÓN OBLIGATORIA DE SERVICIOS Y DE DOCUMENTOS): He sido informado (a) que los costos, aranceles, tasas y contribuciones obligatorias en la UML durante la vigencia del plan de estudios de mi carrera, son las siguientes:
                </h6>

                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Formas de Culminación de Estudios</th>
                            <th scope="col">Costo en U$</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Biblioteca Virtual (solo bases de datos de paga)</td>
                            <td>U$ 1.00</td>
                            <td>Costo mensual (puede hacer un pago anual si lo prefiere)</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Carnet</td>
                            <td>C$ 350.00</td>
                            <td>Costo anual</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Taller de tecnología y uso de EVA</td>
                            <td>U$ 40.00</td>
                            <td>Un curso en primer año y otro en segundo</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Taller de Innovación y Emprendimiento</td>
                            <td>U$ 500.00</td>
                            <td>Un curso en tercer año y otro en cuarto</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Laboratorios (Carreras que aplica)</td>
                            <td>U$ 12.00</td>
                            <td>Costo anual para materiales de reposición periódica.</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Certificación total de Notas</td>
                            <td>U$ 50.00</td>
                            <td>Exigible únicamente en el cierre de la carrera.</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Carta de Egresado (a)</td>
                            <td>U$ 25.00</td>
                            <td>Exigible únicamente en el cierre de la carrera.</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Título profesional</td>
                            <td>C$ 1,500.00</td>
                            <td>Exigible únicamente en el cierre de la carrera.</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Certificación de Título</td>
                            <td>U$ 25.00</td>
                            <td>Exigible únicamente en el cierre de la carrera.</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>Publicación en la Gaceta</td>
                            <td>U$ 15.00</td>
                            <td>Costo en la Gaceta más gastos operativos y logísticos.</td>
                        </tr>

                    </tbody>
                </table>
                <h6 class="textcto">
                    OCTAVA (CEREMONIA DE GRADUACIÓN): En caso de que al momento de aprobar satisfactoriamente la modalidad de conclusión de estudios de mi elección, decidiera participar de la ceremonia solemne de graduación, me comprometo a cancelar la suma de: C$ 750.00, que cubre únicamente mi participación y la de dos invitados (Renta de Auditorio, Refrigerio, costos de logística, atuendo del graduando; es decir, toga, birrete y estola); entendiendo que por cada invitado adicional que me acompañe, cancelaré el monto que la universidad señale en su momento.
                </h6>
                <h6 class="textcto">
                    Habiendo sido informado (a) de todas las cláusulas anteriores, declaro mi consentimiento y conformidad con las condiciones académicas y económicas estipuladas en el presente documento; asimismo, doy fe de que en este acto, se me ha hecho entrega de los siguientes documentos: 1- Reglamento de Régimen Académico Estudiantil y normativas conexas, 2- Pensum de la carrera seleccionada, 3- Plan de pagos obligatorios de mi carrera, 4- Plan de pagos de la modalidad de conclusión de estudios elegida preliminarmente, 5- Calendario Académico; los que contienen las regulaciones específicas que me son aplicables a partir de la fecha y de las que me doy por notificado, no pudiendo alegar ignorancia de las mismas en ninguna circunstancia.
                </h6>
                <h6 class="textcto">
                    Para efectos de comunicación con la UML, señalo la siguiente dirección: <strong><u><?php echo $estudiante['direccion']; ?></u></strong>; E-Mail:_________________________________, Teléfono Convencional: ___________Cel. Claro: <strong><u><?php echo $estudiante['tel_alu']?$estudiante['tel_alu']:"___________" ; ?>,</u></strong> Cel. Tigo: <strong><u><?php echo $estudiante['celmov']?$estudiante['celmov']:"___________"?>,</u></strong> Código Postal: __________, Redes Sociales: _______________________________________________________.
                </h6>
                <h6 class="textcto">
                    Para que así quede establecido, firmo la presente en dos ejemplares igualmente válidos, en la ciudad de Managua, Nicaragua a los ____________ días del mes de ____ del año: __________.
                </h6><br><br><br>

                <div class="firmaTutor">
                    _______________________________<br>
                    Nombres y Apellidos<br>
                    Cédula:
                </div><br><br><br><br>

                <h5 class="titsolida">DECLARACIÓN DE RESPONSABILIDAD SOLIDARIA (PADRE, MADRE, TUTOR, PATROCINADOR U OTRO):</h5>
                <h6 class="textcto">
                Yo__________________________________________, mayor de edad, de estado civil: ____________________de profesión u oficio:_______________________________, identificado (a) con cédula número: _____________________, del domicilio de _______________, en mi carácter de Padre __ Madre ___ Tutor____ Patrocinador ____ de ___________________________, Declaro mi total conformidad con las condiciones académicas y económicas estipuladas en el presente documento y que me han sido informadas, por tanto me constituyo en responsable solidario del cumplimiento de las mismas a favor de__________________________________________________________________.<br><br>
                </h6>
                <h6 class="textcto">
                Para efectos de comunicación con la UML, señalo la siguiente dirección: ________________________________________________ Teléfono: ______________.
                </h6><br><br>
                <h6 class="textcto">
                Para que así quede establecido, firmo la presente en dos ejemplares igualmente válidos, en la ciudad de Managua, Nicaragua a los ____________ días del mes de ____ del año: __________.<br><br>
            </h6>

            <div class="firmaTutor">
                    _______________________________<br>
                    Nombres y Apellidos<br>
                    Cédula:
                </div><br><br><br><br>


                <h6 class="textcto">
                    La UML, se compromete a mantener los presentes términos y condiciones durante el tiempo ordinario que establece el currículum para concluir la carrera, siempre que el estudiante cumpla con las obligaciones pactadas en este instrumento; asimismo, se reserva el derecho de retirar de oficio la matrícula de conformidad con las causales establecidas en las normativas correspondientes.
                </h6><br><br><br><br>

                <div class="firmaFuncionario">
                    _________________________________________________<br>
                    Nombre, firma y sello funcionario de la sede
                </div><br><br><br><br>
        </div><!-- Cierra clase row -->

    </div>


<?php } ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>