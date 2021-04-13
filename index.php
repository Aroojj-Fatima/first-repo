<?php 

    //connect to database
    $conn = mysqli_connect('localhost', 'arooj', '123', 'organization') or die("Connection Failed");

    //check connection
    if(!$conn)
    {
        echo 'Connection error : ' . mysqli_connect_error(); 
    }

    //QUERY
    $sql = 'SELECT * FROM job';
    
    //MAKE QUERY AND GET RESULT
    $result = mysqli_query($conn, $sql);
    

    //fetch the resulting rows as array
    $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    

    //free result from memory
    mysqli_free_result($result);
     

    //close connection
   //mysqli_close($conn);

    
    //print_r($jobs);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>First Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="test/javascript" 
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <link href="/static/css/bootstrap.min.css"/>
        <link href="static/css/all.css" rel="stylesheet">
        <script src="static/js/jquery.min.js"></script>
        <!--script src="static/js/bootstrap.min.js"></script--->
        
        <style>
            .divs
            {
                background-color: rgb(128,128,128,0.6);
				padding-top:2vh;
				padding-bottom:4vh;
            }
            .div1
            {
                background-color:rgb(255,255,255,0.8);
                margin-top:4vh;
				margin-left:3vw;
				margin-right:3vw;
				padding-bottom:4vh;
            }
			.div2
            {
                background-color:rgb(255,255,255,0.8);
                margin-top:4vh;
				margin-left:3vw;
				margin-right:3vw;
            }
			.div3
            {
                background-color:rgb(255,255,255,0.8);
                margin-top:4vh;
				margin-left:3vw;
				margin-right:3vw;
				height:40vh;
            }
            OPTION {
                color:blue;
            }
            .sel {
                color:blue;
            }

            .place_holder {
                color:blue;
            }
            .lable
            {
                margin-left:30% ;
            }


            .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* The slider */
            .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            }

            .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            }

            input:checked + .slider {
            background-color: #2196F3;
            }

            input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
            border-radius: 34px;
            }

            .slider.round:before {
            border-radius: 50%;
            }
        </style>
        
    </head>
        
    <body>
        <div class="divs">
            <div  class ="div1">
                <div class="row col-12">
                        <div class="col-5 offset-1" style="margin:2rem 0rem 2rem 0rem">
                            <form class="form">
                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable" >NAME:</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="w3-input w3-border place_holder" type="text" s
                                        tyle="color:blue; width:14vw; height:6vh; border:none;" required name="Name">
                                    </div>
                                </div>
            
                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">JOB:</label>
                                    </div>
                                    <div class="col-6">
                                        <select id="job" class="form-control place_holder sel" name="job" onchange="selectRole()">
                                            <OPTION hidden>JOB(s)</OPTION>
			                                <?php foreach($jobs as $job) 
                                            {
                                                 ?>

                                            <OPTION >
                                             <?php echo $job['job_name'] ?></OPTION> 
			                                    <?php }?>
                                        </select>
                                    </div>
                                </div>


                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">ROLE:</label>
                                    </div>
                                    <div class="col-6">
            
                                        <select  id="role" class="form-control place_holder sel"  name="role">
                                            <OPTION hidden>ROLE(s)</OPTION>
                                            <!-- <OPTION value=“value1” id="option1"> </OPTION>
                                            <OPTION value=“value2” id="option2"> </OPTION>
                                            <OPTION value=“value3” id="option3"> </OPTION> 
                                            <OPTION value=“value1” id="option4"> </OPTION> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">STATUS:</label>
                                    </div>
                                    <div class="col-6">

                                        <select  id="status" class="form-control place_holder sel" name="status">
                                            <OPTION hidden>ACTIVE,REGISTERED,ENROLLED</OPTION>
                                            <OPTION value=“value1” > ACTIVE </OPTION>
                                            <OPTION value=“value2” > REGISTERED </OPTION>
                                            <OPTION value=“value3” > ENROLLED </OPTION>
                                        </select>
                                    </div>
                                </div>

                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">DAYS/NIGHTS:</label>
                                    </div>
                                    <div class="col-6">

                                        <select  id="shift" class="form-control place_holder sel" name="shift">
                                            <OPTION hidden>DAYS,NIGHTS,BOTH</OPTION>
                                            <OPTION value=“value1” > DAYS </OPTION>
                                            <OPTION value=“value2” > NIGHTS </OPTION>
                                            <OPTION value=“value3” > BOTH </OPTION>
                                        </select>
                                    </div>
                                </div>

                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable"class="lable">STATUS:</label>
                                    </div>
                                    <div class="col-6">

                                        <select  id="type" class="form-control place_holder sel" name="type">
                                            <OPTION hidden>TEMP,PREM,TTP</OPTION>
                                            <OPTION value=“value1” > TEMP </OPTION>
                                            <OPTION value=“value2” > PREM </OPTION>
                                            <OPTION value=“value3” > TTP </OPTION>
                                        </select>
                                    </div>
                                </div>
                            
                            </form>
                        
                    </div>
                    

                    <div class="col-5 offset-1" style="margin:2rem 2rem 2rem 0.1rem">
                            <form class="form">
                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">JOB DESCRIPTION:</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="w3-input w3-border place_holder" type="text" 
                                        style="color:blue; width:14vw; height:6vh; border:none;"  name="jobdesc" id="jobdesc">
                                    </div>
                                </div>
                                

                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">KEYWORDS:</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="w3-input place_holder" type="text" 
                                        style="color:blue; width:14vw; height:6vh; border:none;"  name="keywords" id="keywords">
                                    </div>
                                </div>
                                <div class="row col-12 mt-4">
                                   <div class="col-6">
                                        <label class="lable" >MATCH ALL:</label>
                                    </div>
                                    <div class="col-6">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
            
                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">DISTANCE:</label>
                                    </div>
                                    <div class="col-6">
            
                                        <select id="job" class="form-control place_holder sel" name="distance">
                                            <OPTION> 5 Miles</OPTION> 
                                            <OPTION> 10 Miles</OPTION>
                                            <OPTION> 15 Miles</OPTION>
                                        </select>
                                    </div>
                                </div>


                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable"></label>   
                                    </div>
                                    <div class="col-6">
            
                                        <select  id="role" class="form-control place_holder sel" name="asmsignment">
                                            <OPTION> ASSIGNMENNT</OPTION> 
                                            <OPTION> NOT ASSIGN</OPTION>
                                        </select>
                                    </div>
                                </div>

                                <div class="row col-12 mt-4">
                                    <div class="col-6">
                                        <label class="lable">OFFICE:</label>
                                    </div>
                                    <div class="col-6">

                                        <select  id="status" class="form-control place_holder sel" name="status">
                                            <OPTION hidden>OFFICE(s)</OPTION>
                                            <OPTION value=“value1” > OFFICE 1 </OPTION>
                                            <OPTION value=“value2” > OFFICE 2 </OPTION>
                                            <OPTION value=“value3” > OFFICE 3 </OPTION>
                                        </select>
                                    </div>
                                </div>
                            
                            </form>
                         
                    </div>

                </div>
            </div>
            <br>

            <div class="div2" style="padding-top:2vh;">
                <span>
                    <!--label class="w3-border lable" style="color: blue; margin-left: 5%; border-style:double; background-color: white; margin-top: 1%;
                    " id="totalWorkers">TOTAL WORKERS:0</label>
                    <button class="w3-button w3-section w3-right" style="color: white; background-color:mediumblue; margin-left:57vw;"
                     onclick="clearSearch()">CLEAR SEARCH</button>
                    <button class="w3-button w3-section w3-right" style="color: white; background-color:mediumblue; margin-left:1vw;" 
                    onclick="doClearSearch()">SEARCH</button--->

                    <label class="w3-border lable" style="color: blue; margin-left: 5%; border-style:double; 
                    background-color: white; margin-top: 1%; " id="totalWorkers">TOTAL WORKERS:0</label>
                    <button class="w3-button w3-section" style="color: white; background-color:mediumblue; margin-left:57vw;"
                     onclick="clearSearch()">CLEAR SEARCH</button>
                    <button class="w3-button w3-section " style="color: white; background-color:mediumblue; margin-left:1vw;" 
                    onclick="doSearch()">SEARCH</button>
                    
                </span>
               <br>
               <br>

            </div>
            <br>
            <div class="div3">
                <br><br><br><br><br>
            </div>
        </div>
        <!-- <script type="text/javascript">
            $(document).ready(function()
            {
                $("#job").on("change",function(e)
                {
                    
                });
            }); -->

        </script>
    </body>

    <script>    
        //var arr=[];
        //var avgHeight;
        var option1=document.getElementById("option1");
        var option2=document.getElementById("option2");
        var option3=document.getElementById("option3");
        var option4=document.getElementById("option4");
        //var td2;

        
        function selectRole()
        {
            //var job=document.getElementById("job").value;
            alert('hello');
            //var role=document.getElementById("role");

            $.ajax({
                url: "ajax-load.php",
                type : "POST",
                
                success : function(data)
                {
                    debugger
                    $("#role").html(data);                      
                },
                error:function(request, error)
                {
                    alert("can't do bacause :" + error);
                }
            });
            //var height=document.getElementById("h").value;
            //  if( </?php $job['job_name'] ?>== 1)
            //  {
            //      alert('hello arooj');
            //      option1.innerHTML="CDP";
            //      option2.innerHTML="CHEF";
            //      option3.innerHTML="HEAD CHEF";
            //      option4.innerHTML="SOUS CHEF";   
            // }
            
            // if(job =="Catering")
            // {
                
            //     //<//?php $sql = "SELECT role_name FROM roles WHERE job_id = " . job;
            //     option1.innerHTML="CDP";
            //     option2.innerHTML="CHEF";
            //     option3.innerHTML="HEAD CHEF";
            //     option4.innerHTML="SOUS CHEF";
            //     /*role.innerHTML=job;
            //     role.appendChild(option1);
            //     role.appendChild(option2);
            //     role.appendChild(option3);
            //     role.appendChild(option4);
            //     //trs.appendChild(td2);
            //     //tab.appendChild(trs);   */
            // }

            // else if(job =="Driving")
            // {
            //     option1.innerHTML="DRIVER";
            //     option2.innerHTML="MECHANIC";
            //     option3.innerHTML="CONDUCTOR";
            //     option4.innerHTML="PASSENGER";
                
            // }

            // else if(job =="Education")
            // {
            //     option1.innerHTML="BEHAVIOR SPECIALIST";
            //     option2.innerHTML="TEACHER";
            //     option3.innerHTML="TEACHER ASSISTANT";
            //     option4.innerHTML="TUTOR";
                
            // }

            // else if(job =="Warehouse")
            // {
            //     option1.innerHTML="MACHINE OPERATOR";
            //     option2.innerHTML="MANAGER";
            //     option3.innerHTML="CLERK";
            //     option4.innerHTML="MATERIAL HANDLLER";
                
            // }

        }
        function doSearch()
        {
            alert('I"m in doSearch ' )
        }
    </script>
</html>