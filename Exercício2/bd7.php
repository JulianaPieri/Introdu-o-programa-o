<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Banco de Dados </title>
    	
        </head>

     <body>
              <form>  
                Nome <input name="nome">
                <br />   
                Sobrenome <input name="sobrenome">
                <br />
                Idade <input name="idade">
                <br />

                <button>Cadastrar </button>
                  </form> 
         <?php

         $host = "localhost";
         $usuario = "root";
         $senha = "";
         $banco = "exercicio";
         $porta = 3306;

         $conexao = new PDO ("mysql:host=$host;porta=$porta;dbname=$banco", $usuario,$senha);

         if (isset($_GET["nome"])){

            $nome =$_GET["nome"];
            $sobrenome =$_GET["sobrenome"];
             $idade =$_GET["idade"];

         
         $sql = "INSERT INTO dados (nome, sobrenome, idade) VALUES (:nome,:sobrenome, :idade)";
         $consulta = $conexao->prepare($sql);
         $consulta->bindParam(":nome",$nome);
         $consulta->bindParam(":sobrenome",$sobrenome);
         $consulta->bindParam(":idade",$idade);
          $consulta ->execute();
      }
       if (isset($_GET["acao"])){

            $id =$_GET["id"];

         
        $sql = "DELETE FROM dados WHERE id = :id";
         $consulta = $conexao->prepare($sql);
         $consulta->bindParam(":id",$id);
          $consulta ->execute();
          echo "<br>Vou remover o id=$id<br>";
      }



         $sql = "SELECT id,nome,sobrenome, idade FROM dados";
         $consulta = $conexao->prepare($sql);
         $consulta ->execute();

         $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

         

         echo "<table border=1><tr><td>ID</td><td>Nome</td><td>Sobrenome</td><td>Idade</td><td>Ação</td></tr>";
         foreach ( $resultados as $cadastro){
            $id = $cadastro ["id"];
            $nome = $cadastro ["nome"];
            $sobrenome = $cadastro ["sobrenome"];
            $idade = $cadastro ["idade"];
            ?>

            <tr>
                <td><?=$id?></td>
                <td><?=$nome?></td>
                <td><?=$sobrenome?></td>
                <td><?=$idade?></td>
                <td><a href=bd6.php?acao=remover&id=<?=$id?>>Remover</a></td>
            </tr>
            <?php
         }

         echo "</table>"





         ?>

       
     </body>
    	
</html>