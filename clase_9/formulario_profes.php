<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Articulos</title>
    <style>
        .articulo {
            /* Tamaño y color del div */
            width: 300px;
            height: auto;
            background-color: #ebcbb2;
            padding: 14px;

            /* BORDES */
            /* Grosor, estilo (solid/dashed/dotted) y color */
            border: 2px solid #e0e0e0;
            /* Redondeo de esquinas */
            border-radius: 12px;

            /* SOMBRAS */
            /* Desplazamiento X, Desplazamiento Y, Desenfoque, Extensión y Color */
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
        }
        #envio{
            color: green;
            background-color: greenyellow;
        }
    </style>
</head>

<body>
    <h1>Cargar Artículos</h1>
    <form action="procesar.php" method="POST">
        <div id="contenedor-articulos">
        <!-- Aqui se crearán los articulos Dinamicamente por JavaScript al tocar el boton de Agregar otro articulo -->
        </div>
        <button class="btn-agregar" onclick="agregarArticulo()"> <!-- Cuando un boton tiene onclick como parametro, 
                                                                al hacerle click se ejecuta la funcion dentro de las comillas -->
            Agregar otro artículo
        </button>

        <button type="submit" class="btn-enviar"><!-- El type submit es un tipo de boton por defecto de los formularios, al tocarlo ejecuta la action(linea 35) -->
            Enviar artículos
        </button>
    </form>
    <script>
        
        let contador = 1; /* Inicializamos el contador */
        const contenedor = document.getElementById("contenedor-articulos"); //Creamos una constante para apuntar a nuestro contenedor
        agregarArticulo(); //ejecutamos la funcion para que al cargar la pagina por primera vez haya por lo menos 1 formulario de articulo
        function agregarArticulo(){ //Inicializamos la funcion y entre llaves colocamos lo que hará al ser llamada(lineas 54 a 73)
            const nuevoArticulo = document.createElement("div"); //Creamos un elemento nuevo del tipo div y lo guardamos en una constante llamada nuevoArticulo.
            console.log("Funcino la funcion agregarArticulo"); //Chequeamos que la funcion se ejecuto por consola
            nuevoArticulo.classList.add("articulo"); //al elemento que creamos en la linea 54 le agregamos la clase "articulo"
            nuevoArticulo.innerHTML = //agregar HTML al elemento nuevoArticulo creado en la linea 54.
            `
                <!-- Creamos la card de articulo como la teniamos hecha en HTML, pero de forma dinamica, 
                agregando el contador para que vaya sumando a medida que se va ejecutando la funcion -->
                <h3>Artículo ${contador}</h3> 

                <label for=nombre${contador}>Nombre:</label>
                <input type="text" name="articulos[${contador}][nombre]" id=nombre_${contador} required>

                <label for= descripcion_${contador}>Descripción:</label>
                <textarea name="articulos[${contador}][descripcion]" id=descripcion_${contador} required></textarea>

                <label for=precio_${contador}>Precio:</label>
                <input type="number" name="articulos[${contador}][precio]" id=precio_${contador} required>
            `;
            contenedor.appendChild(nuevoArticulo); //Agregamos el elemento creado en la linea 54 al contenedor creado en la linea 51. 
            
            contador = contador + 1;//Cada vez que pasa, suma 1. Tambien se puede poner contador++;
        }
    </script>
</body>

</html>