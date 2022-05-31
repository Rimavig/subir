<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getAllBeneficios();
$resultado= "".$re;
$beneficios =explode(';',$resultado);
?>

<div class="btn-group">
    <button class="crearBeneficio btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Beneficios</button>
</div>
<table class="table" data-table-name="Beneficios" id="table-editable3" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Beneficio</th>
            <th class="text-right">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($beneficios as $llave => $valores) {
            $benefici =explode(',,,',$valores);
            if (isset($benefici[1])) {
        ?>
        <tr>
            <td id="idBeneficio"> <?php if (isset($benefici[0])) {echo $benefici[0]; }  ?> </td>
            <td> <?php if (isset($benefici[1])) {echo $benefici[1]; }  ?> </td>
            <td class="text-right">
                <a class="editarBeneficio btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                <a class="eliminarBeneficio btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    </tbody>
</table>