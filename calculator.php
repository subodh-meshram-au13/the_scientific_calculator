<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Scientific Calculator Example</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="css/demo.css">
  
  </head>
  <body>
    
      <?php
          include 'db_connection.php';
          $conn = OpenCon();
          echo "Database Connected Succefulluy";
          CloseCon($conn);
        ?>
        <?php
          include("display.php");
          ?>
      
 <header class="intro">
 <!-- <input type="textbox"  style="float: right; height: 500px; padding-left:50px ;position:relative; right:150px;" id="textbox";></input> -->

 
 <main>
     <!-- Start DEMO HTML (Use the following code into your project)-->
     <div class="container-fluid">
     
          <div class= "position-absolute" style="float: right; height: 500px; padding-left:50px ;position:relative; right:100px;">
            <div class="col-lg-12" id="table" >
              <?php echo $deleteMsg??''; ?>
                    <div class="table-responsive" style="overflow-y: auto;max-height: 400px";> 
                       <table class="table table-bordered">
                      <thead><tr>
                              <th>Operator</th>
                              <th>Result</th>
                             </thead>
                      <tbody>
                      <?php
                        if(is_array($fetchData)){      
                        $sn=1;
                        foreach($fetchData as $data){
                        ?>
                      <tr>
                      
                      <td><?php echo $data['operator']??''; ?></td>
                      <td><?php echo $data['result']??''; ?></td>
                        
                    </tr>
                    <?php
                      $sn++;}}else{ ?>
                      <tr>
                        <td colspan="8">
                    <?php echo $fetchData; ?>
                  </td>
                  <tr>
                  <?php
                  }?>
   
              </tbody>
            </table>
          </div>
        </div>
    </div>
   
</div>
    
     <div class="calculator">
    
     <button onclick="showHideTextBox()"style="float: right; background-color: #80d4ff ">History Table <br></button>
      <br>
      <br>
      <script>
          function showHideTextBox(){
            var x = document.getElementById("table");
            if (x.style.display === "none") {
              
                  
              x.style.display = "block";
             } else {

               x.style.display = "none";
               
             }
          }
</script>
     <!-- <form method="GET" action="calc.php"> -->
    

        <input type="text" name ="display" id="display" maxlength="20" value=""></input> 
        <div class="calc-buttons">

          
<div class="functions-one">
        <button class="button triggers">C</button>
        <button class="button basic-stuff">(</button>
        <button class="button basic-stuff">)</button>
        <button class="button numbers">7</button>
        <button class="button numbers">8</button>
        <button class="button numbers">9</button>
        <button class="button numbers">4</button>
        <button class="button numbers">5</button>
        <button class="button numbers">6</button>
        <button class="button numbers">1</button>
        <button class="button numbers">2</button>
        <button class="button numbers">3</button>
        <button class="button basic-stuff">±</button>
        <button class="button numbers">0</button>
        <button class="button basic-stuff">.</button>
</div>
    



        <div class="functions-two">
          
            <button class="button triggers">⌫</button>
            <!--<button class="button triggers">&#60;= </button>-->
            <button class="button complex-stuff">%</button>
            <button class="button complex-stuff">x !</button>
            <button class="button complex-stuff">x^</button>
            <button class="button basic-stuff">*</button>
            <button class="button basic-stuff">/</button>
            <button class="button complex-stuff">ln</button>
            <button class="button complex-stuff">e</button>
            <button class="button basic-stuff">+</button>
            <button class="button complex-stuff">x ²</button>
            <button class="button complex-stuff">log</button>
            <button class="button complex-stuff">cos</button>
            <button class="button basic-stuff">-</button>
            <button class="button complex-stuff">√</button>
            <button class="button complex-stuff">sin</button>
            <button class="button complex-stuff">tan</button>
            <button class="button triggers">=</button>
            <button class="button complex-stuff">&#x003C0;</button>
            <button class="button complex-stuff">∘</button>
            <button class="button complex-stuff">rad</button>
            
            
        </div>
        
        
        <div id ="history" id="history"> history... 
        
        </div>
       
       

        
      </div>
    </div>
    
 </main>
 
      
  <footer class="credit">By Subodh </a></footer>
      <!-- Calculator JS -->
  <script  src="./js/script.js"></script>
      
  </body>
</html>