<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getAllPreguntas();
$resultado= "".$re;
$preguntas =explode(';',$resultado);
?>
<button class="crearPregunta btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Preguntas Frecuentes</button>
</div>
<table class="table" data-table-name="Preguntas Frecuentes" id="table-editable4" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
            <th class="text-right">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($preguntas as $llave => $valores) {
            $pregunt =explode(',,,',$valores);
            if (isset($pregunt[1])) {
        ?>
        <tr>
            <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
            <td class="text-right">
                <a class="editarPregunta btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                <a class="eliminarPregunta btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    
    </tbody>
</table>
