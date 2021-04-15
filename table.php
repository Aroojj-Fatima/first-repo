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
        // $name =toString($_POST['name']);
        // $job_name =toString($_POST['job_name']);
        // $role = toString($_POST['role']);
        // $status =toString($_POST['status']);
        // $shift = toString($_POST['shift']);
        // $type = toString($_POST['type']);
        // $jobdesc = toString($_POST['jobdesc']);
        // $keyword = toString($_POST['keyword']);
        // $distance = toString($_POST['distance']);
        // $office = toString($_POST['office']); 
        // $job_id=1;
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
    // $sql2 = "SELECT emp_name, status_, office, shift, type_ FROM employee WHERE 
    // emp_name = $name or job_id=$job_id or status_ = $status or shift = $shift or 
    // type_=$type or job_description=$jobdesc or keywords=$keyword or 
    // distance=$distance or office=$office" ; 
    $sql2 = "select e1.*,roles.role_name from (
        SELECT e2.*,job.job_name from employee e2 inner join job on e2.job_id=job.job_id
            ) as e1 inner join roles on e1.job_id=roles.job_id
            WHERE e1.emp_name=$name OR e1.job_name=$job_name OR e1.status_=$status 
            OR e1.shift=$shift OR e1.type_=$type OR e1.job_description= $jobdesc
            OR e1.keywords=$keyword OR e1.distance= $distance OR e1.office=$office;"

    //$sql3 = "SELECT job_name from job WHERE job_name= $job_name";

    //$sql4 = "SELECT role_name from roles WHERE job_id=$job_id";

    $result2 = mysqli_query($conn, $sql2) or die("SQL Query Failed.");
    //$result_jobs = mysqli_query($conn, $sql3) or die("SQL Query Failed.");
    //$result_role = mysqli_query($conn, $sql4) or die("SQL Query Failed.");

    $output1 = "";
    //$output2 = "";
    //$output3 = "";
    if(mysqli_num_rows ($result2) > 0)
    {
        $output1 .='<table> 
        <tr style="color:white; background-color:blue">
        <th>Name</th>
        <th>Status</th>
        <th>Office</th>
        <th>Shift</th>
        <th>Work Type</th> </tr>';
        while($row = mysqli_fetch_assoc($result2))
        {
            $output1 .= "<tr><td> {$row['emp_name']} </td>
                        <td>{$row['status']}</td>
                        <td>{$row['office']}</td>
                        <td>{$row['shift']}</td>
                        <td>{$row['type']}</td></tr></table>"; 
        } 
    }

    
    //$roles = mysqli_fetch_all($result_roles, MYSQLI_ASSOC);

    mysqli_free_result($result2);  
    mysqli_close($conn);
    echo $output1;

?>