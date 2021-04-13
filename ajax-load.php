<?php 

    $conn = mysqli_connect('localhost', 'arooj', '123', 'organization') or die("Connection Failed");
    $sql1 = "SELECT role_name FROM roles WHERE job_id = 1" ;
    $result_roles = mysqli_query($conn, $sql1) or die("SQL Query Failed.");
    $output = "";
    if(mysqli_num_rows ($result_roles) > 0)
    {
        while($row = mysqli_fetch_assoc($result_roles))
        {
            $output .= "<option> {$row['role_name']} </option>"; 
        } 
    }

    
    //$roles = mysqli_fetch_all($result_roles, MYSQLI_ASSOC);

    mysqli_free_result($result_roles);  
    mysqli_close($conn);
    echo $output;

?>