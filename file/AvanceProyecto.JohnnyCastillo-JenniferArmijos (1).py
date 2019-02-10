print(" Alumnos: Johnny Castillo, Jennifer Armijos, Paralelo: 41 - 141 \n\nBIENVENIDOS AL SISTEMA DE LA A.T.M\n\nRegistro de locales del Terminal  Terrestre  de  Guayaquil. ")

ingresos = []
ingreso = ""

#LA CONDICION DEl IMPUT ES LARGA POR QUE LLEVA TODAS LAS CONDICIONES PEDIDAS Y TRANSFORME DIRECTO EL IMPUT EN UNA LISTA PARA QUE SEA MAS FACIL VALIDAR LOS DATOS
while ingreso != ["FIN"] :
    #Ademas de las validaciones dadas, se considero validar que ingrese entre 1 y cuatro palabras por nombre.
    #Por lo que el propietario puede ser el nombre de una empresa o una persona con 1 nombre y 2 apellidos como el ejemplo o 2 nombres y 2 apellidos entre otros casos.
    ingreso = input("\nFavor ingrese separado po un guion (-) un RUC,  Propietario,  Nombre  del  Local,  Año  de  Ingreso  y  Valor  de  Arriendo,  para  terminar  escribir  “FIN”: ").split("-")
    while ingreso != ["FIN"] and (   ( len(ingreso) != 5)  or not(   (len(ingreso[0]) == 13 and ingreso[0].endswith("001"))   and    (len(ingreso[1].split()) < 5 and ingreso[1].replace(" ", "").isalpha())   and   (ingreso[3].isdigit() and (1980 <= int(ingreso[3]) <= 2015))    and  (ingreso[4].isdigit() and (100 <= int(ingreso[4]) <= 1200)))    ):
        #ESTOS CONDICIONALES SON USADOS PARA VERIFICAR EL TIPO DE ERROR QUE COMETE AL INGRESAR LOS DATOS(PARA LOS PUNTOS DE LA PRESENTACION)
        if len(ingreso) != 5 :
            print("\nLa Cantidad de Datos no es la que se Indica ")
        elif not (len(ingreso[0]) == 13 and ingreso[0].endswith("001")) :
            print("\nEl Ingreso del RUC es INCORRECTO ")
        elif not (len(ingreso[1].split()) < 5 and ingreso[1].replace(" ", "").isalpha()) :
            print("\nEl Nombre ingresado contiene caracteres especiales ")
        elif not (ingreso[3].isdigit() and (1980 <= int(ingreso[3]) <= 2015)):
            print("\nEl Año ingresado esta INCORRECTO ")
        elif not(ingreso[4].isdigit() and (100 <= int(ingreso[4]) <= 1200)):
            print("\nEl valor del arriendo es INCORRECTO ")
        #MUESTRO UN MENSAJE DE ERROR PARA QUE SEPA QUE EL DATO ESTA MAL INGRESADO.
        print("\n<X>  Datos  mal  ingresados,  intente  nuavamente  <X>")
        ingreso = input("\nIngrese RUC,  Propietario,  Nombre  del  Local,  Año  de  Ingreso  y  Valor  de  Arriendo: ").split("-")
    #COMO YA ESTA VALIDADO EL INGRESO, PATA CREAR LA LISTA DE INGRESOS,CONSIDERO QUE NO SEA EL CASO DE EL INGRESO DE LA PALABRA FIN PARA INGRESAR EL DATO EN LA LISTA
    if ingreso != ["FIN"]:
        ingresos.append("-".join(ingreso))
#IMPRIMO CON EL MISMO FORMATO QUE DA EL EJEMPLO.
print("\nEn  Total  se  ingresaron  %d locales y  son  los  siguientes: " %(len(ingresos)))
for ingreso in ingresos :
    #RECORRO TODOS LOS INGRESOS Y A CADA UNO LO VOY HACIENDO LISTA Y ASIGNANDO A UN NOMBRE DE VARIABLE QUE REPRESENTE A CADA DATO DE LA LISTA.
    RUC, propietario, local, año_ingreso, valor_arriendo = ingreso.split("-")
    codigo = ""
    for palabra in propietario.split() :
        codigo += palabra[0]
    for palabra in local.split() :
        codigo += palabra[0]
    codigo += año_ingreso[0:2]
    #EN EL FORMATO DE EL PRINT VOY DANDO A CADA DATO LAS CARACTERISTICAS PEDIDAS PARA NO CREAR VARIABLES NO NECESARIAS
    print("""
\nRUC:  %s 
Propietario:  %s
Local:  %s
Año:  %s
Arriendo:  $%.2f
Código:  %s"""%(RUC,propietario.title(),local.upper(),año_ingreso+"[hace %d años]"%(2018-int(año_ingreso)),round(float(valor_arriendo),2),codigo.upper()))