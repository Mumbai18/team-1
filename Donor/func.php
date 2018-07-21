<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from donor where uname='$username' and pwd='$password';";
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
	$contact=$_POST['contact'];

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
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Personal and Bank Details Identification</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Donation Used</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Feedback</a>


    </div><br>
  </div>
  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Fill in Details</h4></center><br>
              <form class="form-group" method="post" action="appointment.php">
                <div class="row">
                 <div class="col-md-4"><label>User Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="uname"></div><br><br>  
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="pwd"></div><br><br>
                  <div class="col-md-4"><label>Last Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="lname"></div><br><br>
                  <div class="col-md-4"><label>Contact:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="contact"></div><br><br>
                  <div class="col-md-4"><label>Nationality:</label></div>
                      <div class="col-md-8">
                   <select name="nationality" class="form-control" >
                      <option value="Indian">Indian</option>
                      <option value="NRI">NRI</option> 
                    </select>
                  </div><br><br>
                  
                   <div class="col-md-4"><label>Purpose:</label></div>
                  <div class="col-md-8">
                  <select name="purpose" class="form-control" >
                      <option value="General">General</option>
                      <option value="Finance_Towards_Treatment">Finance Towards Treatment</option>
                      <option value="Nutritional_Support">Nutritional Support</option>
                      <option value="Childcare_Support">Child Care Support</option>
                      <option value="In_Giving_Kind_Program">In Kind Giving Program</option>
                      </select>
                  </div><br><br>
                  <div class="col-md-4"><label> Enter Amount To Donate : </label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="donation_amt"></div><br><br>
                  
                  <div class="col-md-4"><label>Enter Account Number :</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="acc_no"></div><br><br>
                  
                  
                  <div class="col-md-4"><label>Select Date :</label></div>
                  <div class="col-md-8"><input type="date" class="form-control" name="date"></div><br><br>
                   
                  
                      <div class="col-md-4"><label>Enter Pancard Number :</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="pan_no"></div><br><br> 
                 
                 

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
                <div class="col-md-4"><label> Enter Contact Number : </label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="contact"></div><br>
                 <div class="col-md-4"><label> Enter Amount To Donate : </label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Amount"></div><br>
                  
                  <div class="col-md-4"><label>Enter Account Number :</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="AcN"></div><br>
                  
                  
                  <div class="col-md-4"><label>Select Date :</label></div>
                  <div class="col-md-8"><input type="date" class="form-control" name="date"></div><br>
                   
                  
                      <div class="col-md-4"><label>Enter Pancard Number :</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="pancard"></div><br><br> 
                 
                  <input type="submit" name="doc_sub" value="Update Details" class="btn btn-primary"> 
            </form>
          </div>
        </div><br><br>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <div class="col-md-4"><label>Various Programs:</label></div>
                  <div class="col-md-8">
                   <select name="doctor" class="form-control" >
                      <option value="tata Memorial Service">25k  for Child Care Support</option>
                      <option value="Hinduja Hospital">30k  for Nutritional Support</option>
                      
                    
                    </select>
                  </div><br><br>
      
        </form>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">
       
       
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