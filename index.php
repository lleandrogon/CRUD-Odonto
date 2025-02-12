<?php

require "db.php";

include "header.php";

if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];

    if ($pagina == "inserir_paciente") {
        include "views/inserir_paciente.php";
    } else if ($pagina == "editar_paciente") {
        include "views/editar_paciente.php";
    } else if ($pagina == "linha_do_tempo") {
        include "views/linha_do_tempo.php";
    } else {
        include "views/pacientes.php";
    }
} else {
    include "views/pacientes.php";
}

include "footer.php";