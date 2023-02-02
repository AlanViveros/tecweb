<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"&gt;<html>
    <head>  
          <title>Práctica 2</title>
    </head>
    <body>    
        <h2>Inciso 1</h2>   
        <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>   
        <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>   
         
        <br>   
        <?php      
          $_myvar = 'hola';      
           echo '$_myvar es correcta inicia con guion bajo <br><br>';       
         
          $_7var = 11;       
          echo '$_7var es correcta inicia con guion bajo <br><br>' ;       
          
          //myvar = 3.141516;        
          echo 'myvar es incorrecta no lleva el signo de $ por lo tanto no es variable <br><br>';          
        
          $myvar = 'Como estas';      
          echo '$myvar es correcta  <br><br>';                     
        
          $var7 = 11;       
          echo '$var7 es correcta <br><br>';       
        
          $_element1 = 10;       
          echo '$_element1 es correcta inicia con guion bajo <br><br>';       
        
          //$house*5 = 4;        
          echo '$house*5 es incorrecta no se puede usar * en una variable <br><br>';   
        
        ?></body>
        </html>