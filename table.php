<?php 
    if(isset($_POST['name'], $_POST['job_name'], $_POST['role'], $_POST['status'], $_POST['shift'],
    $_POST['type'], $_POST['jobdesc'], $_POST['keyword'], $_POST['distance'], $_POST['office']))
    {
        $name =$_POST['name'];
        $job_name = $_POST['job_name'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $shift = $_POST['shift'];
        $type = $_POST['type'];
        $jobdesc = $_POST['jobdesc'];
        $keyword = $_POST['keyword'];
        $distance = $_POST['distance'];
        $office = $_POST['office']; 
        $job_id=1;

        if($name==="Catering")
        {
            $job_id=1;
        }
        else if($name==="Driving")
        {
            $job_id=2;
        }
        else if($name==="Education")
        {
            $job_id=3;
        }
        else if($name==="Warehouse")
        {
            $job_id=4;
        }
    }
    
    $conn = mysqli_connect('localhost', 'arooj', '123', 'organization') or die("Connection Failed");
    
    $sql = "SELECT employee.emp_name, employee.status_, employee.office, employee.shift,
            employee.type_, job.job_name, roles.role_name
            FROM employee
            INNER JOIN job
            ON employee.job_id = job.job_id
            INNER JOIN roles
            ON employee.role_id = roles.role_id
            WHERE employee.emp_name = '$name' AND employee.status_ = '$status' AND employee.shift = '$shift'
             AND job.job_name = '$job_name' AND roles.role_name = '$role'";


    $result = mysqli_query($conn, $sql);
    $output1 = "";

    $return_arr =  array();
    //if(mysqli_num_rows ($result) > 0)
    if($result->num_rows > 0)
    {
        
        while($row = mysqli_fetch_array($result))
        {
            $name = $row['emp_name'];
            $job = $row['job_name'];
            $status = $row['status_'];
            $shift = $row['shift'];
            $role = $row['role_name'];
            $type = $row['type_'];
            
            $return_arr[] = array('name' => $name,'job' => $job, 'status' => $status, 
            'shift' => $shift, 'role' => $role, 'type' => $type);
        }    
        echo json_encode($return_arr);	
    }
    else {
        $return_arr[]=array('name' => '')
        echo json_encode($return_arr);
        }

    mysqli_close($conn);
?>