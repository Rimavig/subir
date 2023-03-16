<?php
include ("../conect_dashboard.php");
header("Content-type: application/json");

$re = $client2->getGeneral2("sala","");
$resultado = "".$re;
$usuariosG= explode(':::',$resultado);
$usuarios1= explode(';;;',$usuariosG[0]);
$usuarios2= explode(';;;',$usuariosG[1]);
$usuarios3= explode(';;;',$usuariosG[2]);
$usuarios4= explode(';;;',$usuariosG[3]);
$usuarios5= explode(';;;',$usuariosG[4]);
$usuarios6= explode(';;;',$usuariosG[5]);
$acum=0;
$val=0;
$data=[array(0,0)];

foreach($usuarios1 as $llave => $valores) {
    if($acum==0){
        $acum=1;
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            $usuario =explode(',,,',$valores);
            $val=$usuario[1];
        } 
    } else   {
        if($acum==1){
            $data=[];
            $acum=2;
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($val));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
                $val=0;
            } 
        }  else   {
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
            } 
        }
    }    
    
} 
$dataT['data1']=$data;
$acum=0;
$data=[array(0,0)];
foreach($usuarios2 as $llave => $valores) {
    if($acum==0){
        $acum=1;
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            $usuario =explode(',,,',$valores);
            $val=$usuario[1];
        } 
    } else   {
        if($acum==1){
            $data=[];
            $acum=2;
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($val));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
                $val=0;
            } 
        }  else   {
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
            } 
        }
    }    
    
} 
$dataT['data2']=$data;
$acum=0;
$data=[array(0,0)];
foreach($usuarios3 as $llave => $valores) {
    if($acum==0){
        $acum=1;
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            $usuario =explode(',,,',$valores);
            $val=$usuario[1];
        } 
    } else   {
        if($acum==1){
            $data=[];
            $acum=2;
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($val));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
                $val=0;
            } 
        }  else   {
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
            } 
        }
    }      
    
} 
$dataT['data3']=$data;
$acum=0;
$data=[array(0,0)];
foreach($usuarios4 as $llave => $valores) {
    if($acum==0){
        $acum=1;
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            $usuario =explode(',,,',$valores);
            $val=$usuario[1];
        } 
    } else   {
        if($acum==1){
            $data=[];
            $acum=2;
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($val));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
                $val=0;
            } 
        }  else   {
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
            } 
        }
    }        
    
} 
$dataT['data4']=$data;
$acum=0;
$data=[array(0,0)];
foreach($usuarios5 as $llave => $valores) {
    if($acum==0){
        $acum=1;
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            $usuario =explode(',,,',$valores);
            $val=$usuario[1];
        } 
    } else   {
        if($acum==1){
            $data=[];
            $acum=2;
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($val));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
                $val=0;
            } 
        }  else   {
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
            } 
        }
    }    
    
} 
$dataT['data5']=$data;
$acum=0;
$data=[array(0,0)];
foreach($usuarios6 as $llave => $valores) {
    if($acum==0){
        $acum=1;
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            $usuario =explode(',,,',$valores);
            $val=$usuario[1];
        } 
    } else   {
        if($acum==1){
            $data=[];
            $acum=2;
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($val));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
                $val=0;
            } 
        }  else   {
            $usuario =explode(',,,',$valores);
            if (isset($usuario[1])) {
                $usuario =explode(',,,',$valores);
                //$data[]=array(date('Y-m-d H:i:s',strtotime($usuario[0])),floatval($usuario[1]));
                $data[]=array(intval( $usuario[0]),floatval($usuario[1]));
            } 
        }
    }      
    
} 
$dataT['data6']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport2->close();
?>