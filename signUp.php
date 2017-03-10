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
                <form class="form-signUp" >
                    <h1 class="form-signUp-heading">Cadastre-se</h1>                         
                        <label> Primeiro Nome:</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Digite seu primeiro nome" required>                                          
                        
                        <label> Sobrenome:</label>
                        <input type="text" class="form-control" name="surname" placeholder="Digite  seu sobrenome" required>                                            
                        
                        <label> Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Digite seu Email" required>                        
                        
                        <label> Senha:</label>
                        <input type="password" class="form-control" name="password" placeholder="Digite uma senha" required>                          
                        
                        </br>                           
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastre-se</button>                                                       
                </form><!-- form-signUp -->   
    </div> <!-- /container --> 
  </body>
</html>

