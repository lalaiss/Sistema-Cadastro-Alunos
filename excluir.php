<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css"> 
  </head>
  <body>
        <?php
        include 'conexao.php';

        // Pega o ID da URL
        $id = $_GET['id'];

        // Query para deletar o registro
        $query = "DELETE FROM alunos WHERE id=$id";

        if (mysqli_query($conexao, $query)) {
        // Redireciona para a página inicial com mensagem de sucesso (opcional)
        header("Location: cadastro.php");
        exit();
        } else {
        echo "Erro ao deletar: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);
        ?>
  </body>
</html>