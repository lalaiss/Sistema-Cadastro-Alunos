<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <title>Cadastro de Alunos</title>
  </head>
  <body>

  <div class="container">
    <div class = "row">
        <?php

            include "conexao.php";

            if(isset($_POST['salvar'])) {
            $nome =  $_POST['nome'] ;
            $matricula = $_POST['matricula'];
            $curso = $_POST['curso'];
            $email = $_POST['email'] ;
            $telefone = $_POST['telefone'];
            
            $sql = "INSERT INTO `alunos`
            ( `nome`, `matricula`, `curso`, `email`, `telefone`) 
            VALUES ('$nome','$matricula','$curso','$email','$telefone')";

            if(mysqli_query($conexao, $sql)) {
                echo "$nome - aluno cadastrado com sucesso!";

            }  else {
                echo "$nome - aluno NÃO foi Cadastrado";
            }  
            }    
            
            $query = "SELECT * FROM alunos ORDER BY id";
            $resultado = mysqli_query($conexao, $query);
            
            if (mysqli_num_rows($resultado) > 0) {
            echo "<p><h2> Lista de Alunos Cadastrados </h2></p> <br>" ;
            echo "<table class='table table-striped'>";
            echo "<thead><tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Curso</th>
                    <th>Email</th>
                    <th>Telefone</th>
                  </tr></thead><tbody>";

            while ($aluno = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>{$aluno['id']}</td>
                        <td>{$aluno['nome']}</td>
                        <td>{$aluno['matricula']}</td>
                        <td>{$aluno['curso']}</td>
                        <td>{$aluno['email']}</td>
                        <td>{$aluno['telefone']}</td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='text-muted'>Nenhum aluno cadastrado ainda.</p>";
        }

        ?>


    </div>
    </div>
   
           
</body>
</html>