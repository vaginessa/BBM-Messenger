<style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
      background-image: url('images/background.jpg');
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #595959;  /* Dark Grey */        
      color: #fff;
  }

  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 5px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
      background-color: #595959;
      color: #282828 !important;
  }
  .navbar-nav  li a:hover {
      color: #fff !important;
  }

  footer {
    position: fixed;
    height: 100px;
    bottom: 0;
    width: 100%;
  }

    .text-left {
        text-indent: 170px;
    }
  </style>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
   <a class="navbar-brand" href="#">  
   <img src="http://www.blackbeltcoding.com/wp-content/themes/blackbelt/images/blackbelt-logo-white.svg" alt="BlackBelt Coding" style="width:150px;border:0;">
     </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="modal" data-target="#logInModal" href="#logInModal"><span class="glyphicon glyphicon-log-in"></span>Log in</a></li>
        <li><a data-toggle="modal" data-target="#signUpModal" href="#signUpModal"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      </ul>
    </div>  
  </div>
</nav>

<!--SignUp Modal-->
<div class="modal fade" id="signUpModal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
    		<label for="email">Email address</label>
    		<input class="form-control" id="email" placeholder="Enter email" type="email">
  		  </div>
		  <div class="form-group">
		  	<label for="exampleInputPassword1">Password</label>
			<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
		  </div>
          <p class="text-right"><a href="#">Forgot password?</a></p>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Log-in</a>
        </div>
      </div>
    </div>
</div>

<!--LogIn Modal-->
<div class="modal fade" id="logInModal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Log-in</h4>
        </div>
        <div class="modal-body">
                <!-- The form inside body of modal -->
                <form id="loginForm" method="POST" class="form-horizontal" action="validate.php">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Username</label>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" name="user" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Password</label>
                        <div class="col-xs-5">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button id="submitForm" type="submit" class="btn btn-primary">Login</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                    <p id="LogInErrorMessage" style="display:none; color: red;"> Username or password incorrect</p>
                    </div>
                        <p class="text-left"><a href="#">Forgot password?</a></p>
                        <label style="color: red;"><? if(isset($_GET[msg])) {echo $_GET['msg'];} ?> </label>
                        <br>
                    </div>
                </form>
        </div>
      </div>
    </div>
</div>

<script>
/* must apply only after HTML has loaded */
$(document).ready(function () {
    $("#loginForm").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                if(data=="false"){
                    $('#LogInErrorMessage').css("display", "block");
                }else{
                    window.location.href = "http://student-projects.miami/BBM/Message.MainWindow.php";
                }
                //$('#contact_dialog .modal-header .modal-title').html("Result");
                //$('#contact_dialog .modal-body').html(data);
                //$("#submitForm").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
    $("#submitForm").on('click', function() {
        $("#loginForm").submit();
    });
});
// $(function() {

//   $("#newModalForm").validate({
//     rules: {
//       pName: {
//         required: true,
//         minlength: 8
//       },
//       action: "required"
//     },
//     messages: {
//       pName: {
//         required: "Please enter some data",
//         minlength: "Your data must be at least 8 characters"
//       },
//       action: "Please provide some data"
//     }
//   });
// });
    // function validateUser() {
    //     var x = document.forms["loginForm"]["user"].value;
    //     if (x == "") {
    //         alert("name must be filled out");
    //         return false;
    //     } // end if
    //     return validateEmail();
    // } // end fuction

        $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    }); //end function
</script>
