<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/estudiante.controlador.php";
require_once "controladores/notificacionsms.controlador.php";
require_once "controladores/carrera.controlador.php";
require_once "controladores/periodo.controlador.php";
require_once "controladores/plan-carrera.controlador.php";
require_once "controladores/plan.cotrolador.php";
require_once "controladores/grupo.controlador.php";
require_once "controladores/notificacionescorreo.controlador.php";
require_once "controladores/aula.controlador.php";
require_once "controladores/horario.controlador.php";
require_once "controladores/materia.controlador.php";
require_once "controladores/requisito.controlador.php";
require_once "controladores/notificacionWatsapp.controlador.php";
require_once "controladores/asignarMateria.controlador.php";
require_once "controladores/asignarPlanEstudiante.controlador.php";
require_once "controladores/profesor.controlador.php";
require_once "controladores/oferta-academica.controlador.php";
require_once "controladores/matricula.controlador.php";
require_once "controladores/pdf.controlador.php";
require_once "controladores/cursos.controlador.php";
require_once "controladores/examen.cotrolador.php";












require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/estudiante.modelo.php";
require_once "modelos/carrera.modelo.php";
require_once "modelos/periodo.modelo.php";
require_once "modelos/plan-carrera.modelo.php";
require_once "modelos/plan.modelo.php";
require_once "modelos/grupo.modelo.php";
require_once "modelos/aula.modelo.php";
require_once "modelos/horario.modelo.php";
require_once "modelos/materia.modelo.php";
require_once "modelos/requisito.modelo.php";
require_once "modelos/asignarMateria.modelo.php";
require_once "modelos/asignarPlanEstudiante.modelo.php";
require_once "modelos/profesor.modelo.php";
require_once "modelos/oferta-academica.modelo.php";
require_once "modelos/matricula.modelo.php";
require_once "modelos/cursos.modelo.php";
require_once "modelos/examen.modelo.php";







$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();