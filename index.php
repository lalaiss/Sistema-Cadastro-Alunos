
<?php

    include 'conexao.php';

    $query = "SELECT * FROM alunos";

    $resultado = mysqli_query($conexao, $query);

    
    if(mysqli_num_rows($resultado) > 0){
        echo "<h1> Lista de Alunos </h1> <br>" ;
        echo "Número de Alunos: " . mysqli_num_rows($resultado) . "<br>" . "<br>";

        while($usuario = mysqli_fetch_array($resultado)){
            echo "Nome: " . $usuario['nome'] . "<br>";
            echo "Matricula: " . $usuario['matricula'] . "<br>";
            echo "Curso: " . $usuario['curso'] . "<br>";
            echo "Email: " . $usuario['email'] . "<br>";
            echo "Telefone: " . $usuario['telefone'] . "<br>";
            echo "<hr>"; 
        }
    } else {
        echo "Nenhum dado encontrado";
    }

?>
