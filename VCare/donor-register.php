<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <style type="text/css">
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="background:url('images/backgroundimg.jpeg'); background-size: cover;">
    <div ></div>
    <div class="container-fluid" style="margin-top:60px;margin-bottom:60px;color:#34495E;">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
          <div class="card">
            <img src="images/vcare_logo.jpg" class="card-img-top" height="250px" width="300px">
            
              <h5>Donor Signup Page</h5><br>
       
              <form class="form-group" method="post" action="func.php">
                <div class="row" >
                  <div class="col-md-4"><label>First Name: </label></div>
                  <div class="col-md-8"><input type="text" name="fname" class="form-control" placeholder="Enter First Name" required/></div><br><br>
                  <div class="col-md-4"><label>Last Name: </label></div>
                  <div class="col-md-8"><input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required/></div><br><br>
                  <div class="col-md-4"><label>Age: </label></div>
                  <div class="col-md-8"><input type="number" name="age" class="form-control" placeholder="Enter your Age" required/></div><br><br>
                  <div class="col-md-4"><label>Email: </label></div>
                  <div class="col-md-8"><input type="email" name="email" class="form-control" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/>
                </div><br><br>
                  <div class="col-md-4"><label>Contact: </label></div>
                  <div class="col-md-8"><input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required/></div><br><br>
                  <div class="col-md-4"><label>Username: </label></div>
                  <div class="col-md-8"><input type="text" name="username" class="form-control" placeholder="Enter Username" required/></div><br><br>
                  <div class="col-md-4"><label>Password: </label></div>
                  <div class="col-md-8"><input type="password" class="form-control" name="password" placeholder="Enter Password" required/></div><br><br><br>

                  <div class="col-md-4"><label>Type of Donation: </label></div>
                  <select name="d-type">
                    <option value="General">General</option>
                    <option value="Customised">Customised</option>
                  </select>
                  <center> <input type="submit" id="inputbtn" name="login_submit" value="Register" class="btn btn-primary">
                  </center>
                </div>

              </form>
            </center>
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
  </body>
</html>