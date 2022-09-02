
<?php
    
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Subodh@92";
        $db = "caculator";


        $conn = new mysqli  ($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
         $conect= $conn;
    
    $tableName="try";
    $columns= array('operator', 'result');
        $fetchData = fetch_data($conect, $tableName, $columns);
        function fetch_data($conect, $tableName, $columns){
                if(empty($conect)){
                        $msg= "Database connection error";
                }elseif (empty($columns) || !is_array($columns)) {
                        $msg="columns Name must be defined in an indexed array";
                }elseif(empty($tableName)){
                        $msg= "Table Name is empty";
            }else{
                $columnName = implode(", ", $columns);
                $query = "SELECT ".$columnName." FROM $tableName";
                
                $result = $conect->query($query);
                if($result== true){ 
                 if ($result->num_rows > 0) {
                    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $msg= $row;
                 } else {
                    $msg= "No Data Found"; 
                 }
                }else{
                  $msg= mysqli_error($conect);
                }
                }
                return $msg;
                }
                ?>