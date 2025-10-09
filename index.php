<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css"> 
    <title>Cadastro de Alunos</title>
  </head>
  <body>
    <main>
     <div  class="container">
            <section>
                <h2>Cadastro de Alunos</h2>
            <form action="cadastro.php" method="POST">
                    <label> Nome:</label><br><input type="text" id="nome" name="nome"  placeholder="Digite o nome do aluno" required></br><p></p>
                    <label> Matrícula:</label><br><input type="text" id="matricula" name="matricula" placeholder="Digite a Matrícula" required><br><p></p>
                    <label> Curso:</label><br><input type="text" id="curso" name="curso"   placeholder="Digite o curso" required><br><p></p>
                    <label> Email:</label><br><input type="email" id="email" name="email" placeholder="Digite o e-mail"required ><br><p></p>
                    <label> Telefone:</label><br><input type="text" id="telefone" name="telefone"  placeholder="Digite o telefone" required><br><p></p>
                    <button type="submit" name="salvar">Cadastrar</button>
                </form>
            </section>
        </div>
    </main>
    </body>
</html>