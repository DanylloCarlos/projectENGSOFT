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
                <form class="form-signUp" name="cadastroPessoaJuridica" action="cadastroPJ.php" method="post" >
                    <h1 class="form-signUp-heading">Cadastre-se como Pessoa Jurídica</h1>                         
                        <label> Razão Social:</label>
                        <input type="text" class="form-control" name="razaosocial" placeholder="Digite a Razão Social" required>                                          
                        <label> CNPJ:</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Digite seu cnpj" required>
                        <label> Nome Fantasia:</label>
                        <input type="text" class="form-control" name="nomefantasia" placeholder="Digite o nome Fantasia" required>
                        <label> Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Digite seu Email" required>                                               
                        <label> Senha:</label>
                        <input type="password" class="form-control" name="password" placeholder="Digite uma senha" required>                          
                        
                        </br>                           
                        <button class="btn btn-lg btn-default btn-block" type="submit">Cadastre-se</button>                                                       
                </form><!-- form-signUp -->   
    </div> <!-- /container --> 
  </body>
</html> 

