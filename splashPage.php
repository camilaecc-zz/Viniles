<!DOCTYPE html>

<html>
<head>
    <title>Viniles</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
     		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
 <body style='background-image: url("vb.jpg")'> 
 <!---- Modal window to sign in and buttons for other options ----!> 
    	  <div id='signinModal' class='modal-fade' roll='dialog' > 
        <div class='modal-dialog'>
        <div class='modal-content'>
            <form method='post' action='vinController.php'> 
                <div class='modal-header'>
                    <h2 style='text-align:center'>Log In</h2>
                </div>
                <div class='modal-body'>
                    <input type='hidden' name='page' value='SplashPage'></input>
                    <input type='hidden' name='command' value='LogIn'></input>
                    <label class='modal-label'>Username:</label> 
                    <input type='text' name='username' placeholder='Enter username' required></input>
                    <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
                    <br>
                    <label class='modal-label'>Password:</label> 
                    <input type='password' name='password' placeholder='Enter password' required></input>
                    <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
                   </div>
                <div class='modal-footer'>
                    <button type='submit' value='Submit' class='btn btn-success'>Submit</button>
                    <button type='reset' value='Reset' class='btn btn-default'>Reset</button>
                    <button type='button' value='Cancel' class='btn btn-default' data-dismiss="modal">Cancel</button>
                     <button type='' value='ForgotPassword' class='btn btn-danger' data-target="#forgotModal" id= "forgotBtn">Forgot Password</button>
                     <button type='submit' value='Register' class='btn btn-primary' data-toggle="modal" data-target="#RegisterModal">Register</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!--- Register modal window ----!> 
    <div id='RegisterModal' class='modal'> 
    <div class='modal-dialog'>
        <div class='modal-content'>
            <form method='post' action='vinController.php'> 
              <div class='modal-header'>
            <h2 style='text-align:center'>Register</h2>  
            </div>
             <div class='modal-body'>
            <input type='hidden' name='page' value='SplashPage'></input>
            <input type='hidden' name='command' value='Register'></input>  
            <label class='modal-label'>Username:</label> 
            <input type='text' name='username' placeholder='Create a username' required></input>
            <?php if (!empty($error_msg_username)) echo $error_msg_username; ?> <!-- error message -->
            <br>
            <label class='modal-label'>Password:</label> 
            <input type='password' name='password' placeholder='Enter password' required></input>
            <br>
            <label class='modal-label'>Email:</label> 
            <input type='text' name='email' placeholder='Enter email address' required></input>
            <br>
            <label class='modal-label'>Name:</label> 
            <input type='text' name='name' placeholder='Enter your Name' required></input>
            <br>
            <label class='modal-label'>Last Name:</label> 
            <input type='text' name='lastName' placeholder='Enter your Last Name' required></input>
            <br>
          <label class='modal-label'>Location:</label> 
            <input type='text' name='location' placeholder='Location' required></input>
            <br>
             </div>
              <div class='modal-footer'>
            <button type='submit' value='Submit' class='btn btn-primary'>Submit</button>
            <button type='reset' value='Reset' class='btn btn-secondary'>Reset</button>
            <button type='button' value='Cancel' class='btn btn-danger' data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!----------------------FORGOT PASSWORD MODAL ------------------------!>
    <div id='forgotModal' class='modal'> 
    <div class='modal-dialog'>
        <div class='modal-content'>
            
              <div class='modal-header'>
            <h2 style='text-align:center'>Forgot Password</h2>  
            </div>
             <div class='modal-body'>
            
            <label class='modal-label' for='input-forgot-username'>Username:</label> 
            <input type='text' name='input-forgot-username' placeholder='username' id='input-forgot-username' required></input>
            
            <label class='modal-label' for='input-forgot-email'>Email:</label> 
            <input type='text' name='email' placeholder='Enter email address' id='input-forgot-email' required></input>
            <br>
            <label class='modal-label' for='input-forgot-name'>Name:</label> 
            <input type='text' name='name' placeholder='Enter your Name' id='input-forgot-name' required></input>
            <br>
            <label class='modal-label' for='input-forgot-lastN'>Last Name:</label> 
            <input type='text' name='lastName' placeholder='Enter your Last Name' id='input-forgot-lastN' required></input>
            <br>
          <label class='modal-label' for='input-forgot-location'>Location:</label> 
            <input type='text' name='location' placeholder='Location' id='input-forgot-location' required></input>
            <br>
             <label class='modal-label' for='input-newPass'>New Password:</label> 
                    <input type='password' name='password' placeholder='Enter password'  id='input-newPass' required></input>
             </div>
              <div class='modal-footer'>
            <button id="resetPassModalSubmit" type='' value='' class='btn btn-primary' onclick='resetPass()'>Submit</button>
            <button type='reset' value='Reset' class='btn btn-secondary'>Reset</button>
            <button type='button' value='Cancel' class='btn btn-danger' data-dismiss="modal">Cancel</button>
                </div>
          
        </div>
        </div>
    </div>
 </body>
</html>
<!---------Register--------------!>
<script>
    <?php
        // using $display_type, decide whether SignIn or Join modal window should be displayed
        if ($display_type == 'register')
   echo '$("#RegisterModal").click()';  
        else
            ;
    ?>
</script>
<!-----------------Forgot Password----------------!> 
<script>
$('#forgotBtn').click(function(){
 $('#forgotModal').modal('show');
});

$('#resetPassModalSubmit').click(function(){
resetPass(); 

});

function resetPass(){
               var url = 'vinController.php';  // controller
                var query = { page:"SplashPage", 
                      command:"forgot",
                      username:$('#input-forgot-username').val(), 
                      email: $('#input-forgot-email').val(), 
                    name: $('#input-forgot-name').val(), 
                    lastName: $('#input-forgot-lastN').val(), 
                    location: $('#input-forgot-location').val(), 
                      pass: $('#input-newPass').val()
                };
                $.post(url,query,
                function(data){   
                console.log(data); 
                 $('#forgotModal').modal('hide');
    });
            
}



</script>

