<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- To ensure proper rendering and touch zooming -->  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Sign Up</title>
        
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signUp.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">        
                <form class="form-signUp" name="cadastroPessoaFisica" action="cadastroPF.php" method="post">
                    <h1 class="form-signUp-heading">Cadastre-se</h1>                         
                        <label> Nome Completo:</label>
                        <!-- O campo name será usado como identificador de cada campo de entrada. E será 
                             recebido por um variável por meio do $_POST['aqui o nome do identificador']-->
                        <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" required>                                          
                        <label> CPF:</label>
                        <input type="number" class="form-control" name="cpf" placeholder="Digite seu cpf" required>
                        <label> RG:</label>
                        <input type="number" class="form-control" name="rg" placeholder="Digite seu rg" required>
                        <label> Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Digite seu Email" required>                                               
                        <label> Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Digite uma senha" required>                          
                       
                        </br>      
                        <a href="signUpEmp.php">Cadastre-se como Pessoa Jurídica. (Para ONGs e outras instituições)</a> 
                        
                        <button class="btn btn-lg btn-default btn-block" type="submit">Cadastre-se</button>                                                       
                </form><!-- form-signUp -->   
    </div> <!-- /container --> 
  </body>
</html> 

