<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin-panel.php");
	}
	else
		header("Location:error.php");
}
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}
function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}
if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$query="insert into doctb(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
function display_admin_panel(){
    
	echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> VCare </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="enter location" aria-label="Search" name="location">
      <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
    </form>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
 <div class="jumbotron" id="ab1"></div>
   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Patient Details</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Program Info</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Update Schedule</a>
        <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Patients to Attend</a>

    </div><br>
  </div>
  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Fill in Patient Details</h4></center><br>
              <form class="form-group" method="post" action="appointment.php">
                <div class="row">
                  <div class="col-md-4"><label>First Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="fname"></div><br><br>
                  <div class="col-md-4"><label>Last Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="lname"></div><br><br>
                  <div class="col-md-4"><label>Age:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="age"></div><br><br>
                  <div class="col-md-4"><label>Contact Number:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="contact"></div><br><br>
                  
                   <div class="col-md-4"><label>Cancer:</label></div>
                  <div class="col-md-8">
                   <select name="cancer" class="form-control" >
                      <option value="Bladder Cancer">Bladder Cancer</option>
                      <option value="Kidney">Kidney Cancer</option>
                      <option value="Breast Cancer">Breast Cancer</option>
                    </select>
                  </div><br><br>
                  
                  <div class="col-md-4"><label>Cancer Stage:</label></div>
                  <div class="col-md-8">
                   <select name="cancer_stage" class="form-control" >
                      <option value="Stage 1">Stage 1</option>
                      <option value="Stage 2">Stage 2</option>
                      <option value="Stage 3">Stage 3</option>
                      <option value="Stage 4">Stage 4</option>
                    </select>
                  </div><br><br>
                  <div class="col-md-4"><label>Sex:</label></div>
                  <div class="col-md-8">
                    <select name="sex" class="form-control">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div><br><br>
                   <div class="col-md-4"><label>Location :</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="location"></div><br><br>
                   <div class="col-md-4"><label>Income:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="income"></div><br><br>
                  
                    <div class="col-md-4"><label>Verification:</label></div>
                  <div class="col-md-8">
                    <select name="verify" class="form-control">
                      <option value="verified">Verified</option>
                      <option value="not verified">Not Verified</option>
                    </select>
                  </div><br><br>
                  <br><br><br>
                  
                  <div class="col-md-4">
                    <input type="submit" name="entry_submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <div class="card-body">
            <form class="form-group" method="post" action="func.php">
                <div class="col-md-4"><label>Various Programs:</label></div>
                  <div class="col-md-8">
                   <select name="doctor" class="form-control" >
                      <option value="Finance_Towards_Treatment">Finance Towards Treatment</option>
                      <option value="Nutritional_Support">Nutritional Support</option>
                      <option value="Childcare_Support">Child Care Support</option>
                      <option value="In_Giving_Kind_Program">In Kind Giving Program</option>
                    </select>
                  </div><br><br>
                  <input type="submit" name="doc_sub" value="Update Program" class="btn btn-primary">
            </form>
          </div>
        </div><br><br>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <div class="col-md-4"><label>Update Schedule:</label></div>
                  <div class="col-md-8">
                   <select name="doctor" class="form-control" >
                      <option value="tata Memorial Service">Availiable</option>
                      <option value="Hinduja Hospital">Not availiable</option>
                    
                    </select>
                  </div><br><br>
          <input type="submit" name="doc_sub" value="Update Availiability" class="btn btn-primary">
        </form>
      </div>
      <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">
      <form class="form-group" method="post" action="func1.php">
                <div class="col-md-4"><label>Various Programs:</label></div>
                  <div class="col-md-8">
                   <select name="assigned Patients" class="form-control" >
                      <option value="Name1">Rajesh</option>
                      <option value="Name2">Ramesh</option>
                      <option value="Name3">Mahesh</option>
                      <option value="Name4">Suresh</option>
                    </select>
                  </div><br><br>
                  
            </form>
      </div>
       
       
       </div>
    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>';
}
?>