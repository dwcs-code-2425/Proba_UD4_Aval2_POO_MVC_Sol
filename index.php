<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos EVAL 2 UD4 POO</title>
        <link rel="stylesheet" href="estilos/bootstrap.min.css" crossorigin="anonymous">

    </head>
    <body>

    <div class="container">
        <h1> Productos EVAL 2 UD4 </h1>
        <?php
        require_once 'config/config.php';
        require_once 'includes/autoload.php';

        use \model\entity\{Produto, Prenda, Libro};

//Creamos 3 productos:

        $camisa = new Prenda(1, "Camisa", 19.99, "#000000");

        $autorPHP_1 = "Matt Davis";
        $autorPHP_2 = "Louis Reed";
        $autoresPHP = array($autorPHP_1, $autorPHP_2);

        $libroPHP = new Libro(2, "PHP programming language", 24.99, "", $autoresPHP);
        $libroJava = new Libro(3, "Java programming language", 24.99);

//Establecemos o total de unidades de produtos a 800
        Produto::setUnidades(800);

        try {

            echo "Product info: $camisa";
            echo "Product info: $libroPHP";
            echo "Product info: $libroJava";

            echo "<p>------------------------------------------------------</p>";
            //Reemplazar X por las unidades actuales
            //echo "Existen en total X produtos <br/>   ";
            echo "<p>Existen en total " . Produto::getUnidades() . " produtos </p>   ";

            echo "<p>------------------------------------------------------</p>";
            echo "<p>-------------Comparando...----------------------------</p>";
            comparar($camisa, $libroPHP);
            comparar($libroPHP, $camisa);
            comparar($libroPHP, $libroJava);

            comparar($libroPHP, new DateTimeImmutable("2022-10-2"));
        } catch (\Throwable $th) {
            echo "Capturouse un erro/exception: " . $th->getMessage();
        }

        function comparar($obj1, $obj2) {
            $resultado = $obj1->comparar($obj2);

            if ($resultado === 0) {
                echo "Produto: " . $obj1->getNome() . " y " . $obj2->getNome() . " teñen o mesmo prezo: " . $obj1->getPrezo() . "<br/>";
            } else {
                $comparador = "maior";
                if ($resultado === -1) {
                    $comparador = "menor";
                }
                echo "Produto: " . $obj1->getNome() . " ten  un prezo (" . $obj1->getPrezo() . ") " . $comparador . " que " . $obj2->getNome() . " (" . $obj2->getPrezo() . ")<br/>";
            }
        }
        ?>
        </div>
    </body>
</html>