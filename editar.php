<?php
  include "conexao.php";

  $id = $_GET["id"]; // Pega o ID da URL

  // Busca os dados atuais do usuario para preencher o formulário
  $query = "SELECT * FROM alunos WHERE id=$id";
  $resultado = mysqli_query($conexao, $query);
  $aluno = mysqli_fetch_assoc($resultado); 
  ?>

<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css"> 
  </head>
  <body>
  <div class="container">
 <form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
    <label> Nome:</label><br><input type="text" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required></br><p></p>
    <label> Matrícula:</label><br> <input type="matricula" id="matricula" name="matricula" value="<?php echo $aluno['matricula']; ?>"  required></br><p></p>
    <label> Curso:</label><br><input type="text" id="curso" name="curso" value="<?php echo $aluno['curso']; ?>"   required><br><p></p>
    <label> Email:</label><br><input type="email" id="email" name="email" value="<?php echo $aluno['email']; ?>" required ><br><p></p>
    <label> Telefone:</label><br><input type="text" id="telefone" name="telefone" value="<?php echo $aluno['telefone']; ?>"  required>
    <br><p></p>
    <button type="submit" name="atualizar">Atualizar</button>
    <a href="cadastro.php" class="btn-voltar">
  </form>
  </div>
  </body>
</html>