

<script  src="./js/script.js"></script>

<?php
       
    function OpenCon()
 {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Subodh@92";
        $db = "caculator";


            $conn = new mysqli  ($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
            $sql=$_COOKIE;

            
       //       print_r($sql);
              
              foreach ($sql as $name => $value) {
                     
                     $name=str_replace('_',' ',$name);
                   
                  }          
         

              if ($conn->query($name) === TRUE) {
                     echo "New record created successfully"."<br>";
              } else {
                     echo "Error: " . $name. "<br>" . $conn->error;
                     } 
 
        return $conn;
 }
 
    function CloseCon($conn)
 {
        $conn -> close();
 }
   
?>