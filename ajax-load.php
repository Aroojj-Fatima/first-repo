<?php 
    if(isset($_POST['name']))
    {
        $name =$_POST['name'];
        $id=1;
        if($name==="Catering")
        {
            $id=1;
        }
        else if($name==="Driving")
        {
            $id=2;
        }
        else if($name==="Education")
        {
            $id=3;
        }
        else if($name==="Warehouse")
        {
            $id=4;
        }
    }
    // select e1.*,roles.role_name from (
    //     SELECT e2.*,job.job_name from employee e2 inner join job on e2.job_id=job.job_id
    //         ) as e1 inner join roles on e1.job_id=roles.job_id


    // select e1.*,roles.role_name from (
    //     SELECT e2.*,job.job_name from employee e2 inner join job on e2.job_id=job.job_id
    //         ) as e1 inner join roles on e1.job_id=roles.job_id
    //         WHERE e1.emp_name='Smith' OR e1.job_name='Education' OR e1.status_='Inactive' OR e1.shift='Both' OR e1.type_='Perm'
    //         OR e1.job_description='Excellent' OR e1.keywords='abc' OR e1.distance= '10 Miles' OR e1.office='North'
     $conn = mysqli_connect('localhost', 'arooj', '123', 'organization') or die("Connection Failed");
    $sql1 = "SELECT role_name FROM roles WHERE job_id=$id"; ;
    $result_roles = mysqli_query($conn, $sql1) or die("SQL Query Failed.");
    $output = "";
    if(mysqli_num_rows ($result_roles) > 0)
    {
        $output .="<OPTION hidden>ROLE(s)</OPTION>";
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