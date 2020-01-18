<!DOCTYPE html>

<html>
<head>
    <title>My Profile</title>

     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container-fluid" style="background-image: url('vinylprof.jpg'); text-align:center; height:275px">
       			<button type='button' id='unsubscribeButton' class='btn btn-danger  pull-right' action='vinController.php' 
   		  		       value='unsubscribe' >Unsubscribe</button> 
   		  		<button type='button' id='homeBtn' class='btn btn-success  pull-left'>Home Page</button> 	
   		  		 <form id='form-home' method='post' action='vinController.php' style='display:none'>
                    <input type='hidden' name='page' value='homePage'>
                    <input type='hidden' name='command' value='home'>
               </form> 	 
   		<div class='container'> 
   		 <!--la info del unsername con php  --!> 
   		 
   		  <h1 style='text-align:center; padding-bottom: 10px; color: white'>
   		  Welcome <?php echo $_SESSION['username']; ?>  
   		   </h1>
   		  </div> 
	   		  	
   		  	<!--boton de edit profile que lleva a form para cambiar info linked a mysql (?) --!>
   		  	<button type='button' class='btn btn-info' id='editProfileButton' style="height:50px; width:110px;">Edit Profile </button> 
   		  	<!--boton de contact user (uno o el otro se display  dependiendo del command... ) --!>
   		  	<button type='button' class='btn btn-info' id='contactUserButton' style="height:50px; width:110px;">Contact User</button>

   		     	</div>	
   		     	  
 <!-------------------POSTS------------------------!> 
  <div class="container-fluid bg-3 text-center" style='background-color: lightBlue '  id='content' >   
 
 </div>
                 
 <!-----------SELECTED ITEM MODAL --------!>
  	<div id="selectModalp" class="modal" role="dialog">
			<div class="modal-dialog">
			    <div class="modal-content">
					<div class="modal-header">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <h4 class="modal-title">Details</h4>
				    </div>
				    <div class="modal-body"  id="selectPostp" style="color: blue" >
					</div>
					<button type='button' id='deletePost' class="btn btn-danger">Delete Post</button>
				</div>
			</div>
		</div>

    </body>
<!-------------------- CONTACT USER MODAL------------------!>
   		<div id='contactUser' class='modal' roll='dialog'> 
   	      <div class='modal-dialog modal-xl'>
            <div class='modal-content'>
             <form action='vinController.php'> 
             <div class='modal-header'>
              <h2 style='text-align:center'>Contact User </h2>
           </div>
             <div class='modal-body'>
                    <input type='hidden' name='page' value='contactUserForm'></input>
                    <input type='hidden' name='command' value='contactUserForm'></input>
                    <label class='modal-label'>Regarding:</label> 
                    <br>
                    <label class='modal-label'>Message:</label> <br>
                    <input type='text' name='message' placeholder='Hi Im interested on .....'  style='height: 100px; width:550px ;' required></input>
                    <!--CheckBox for include email --!>
                </div>
                <div class='modal-footer'>
                    <button type='submit' value='Send' class='btn btn-primary'>Send</button>
                    <button type='reset' value='Clear' class='btn btn-default'>Clear</button>
                    <button type='button' value='Cancel' class='btn btn-default' data-dismiss="modal">Cancel</button>
                </div>
                </form>

 <!--------------PRINT USERS POSTS --------------!> 
      <script>
      var url = 'vinController.php'; 
                var query = { page:"homePage", 
                              command:"usersPosts"}
    $.post(url,query,
                    function(data) {      
                   console.log(data);                 
                        var rows = JSON.parse(data);  
                        var str = '<table class="table table-hover table-responsive" >';
                      str += '<tr>';
                      for(var p in rows[0])
                              str += '<th>' + p + '</th>' ; // Adds headers 
						for (var i = 0; i < rows.length; i++)
						{
							str += '<tr>';
							for (var p in rows[i])
							{
								str += '<td + obj[i].ID >' + rows[i][p] + '</td>';
							}
							str += '</tr>';
						}
                        str += '</table>';
                        $('#content').html(str); // Display the table in #content
                });

     </script> 
<!--------------UNSUBSCRIBE --------------!> 
    <script>
    
<?php
                $conn = mysqli_connect('localhost', 'cchaconf9', 'camisqlweb2', 'C354_cchaconf9');
                $session_value = (isset($_SESSION['username']))?$_SESSION['username']:'';
                ?>
                var username = "<?php echo $session_value ?>";

    $('#unsubscribeButton').click(function() 
            {             
                console.log("trdg "+username);
                 var url = 'vinController.php';  // controller
                var query = { page:"homePage", command:"unsubscribe",
                    username: username 
                };
               $.post(url,query,
                function(data){    
                });
                window.location.href = "splashPage.php";
});

    </script>
    <!-------------DELETE BTN --------------!>
    <script>
 $('#content').click(function() {
$("tr").click(function() {
    var postId =  $(this).find("td:first").html();  //gets ID number of post to be able to delete it 
  console.log(postId);
    $('#deletePost').click(function() 
            {             
                console.log(postId);
                 var url = 'vinController.php';  // controller
                var query = { page:"homePage", command:"deletePost",
                                    id: postId //post id to delete 
                };
                $('#selectModalp').modal('hide');
       $.post(url,query,
                function(data){
                     var url = 'vinController.php'; 
                var query = { page:"homePage", 
                              command:"usersPosts"}
            $.post(url,query,
                    function(data) {      
                   console.log(data);                 
                        var rows = JSON.parse(data);  
                        var str = '<table class="table table-hover table-responsive" >';
                      str += '<tr>';
                      for(var p in rows[0])
                              str += '<th>' + p + '</th>' ; // Adds headers 
						for (var i = 0; i < rows.length; i++)
						{
							str += '<tr>';
							for (var p in rows[i])
							{
								str += '<td + obj[i].ID >' + rows[i][p] + '</td>';
							}
							str += '</tr>';
						}
                        str += '</table>';
                        $('#content').html(str); // Display the table in #content
                });

                });
                   });
             });
         });

    </script>

    
    <!----------------BACK-TO-HOME-----------------!> 
    <script>
  function home() {
                document.getElementById('form-home').submit(); 
            }
            $('#homeBtn').click(home); 

    </script> 
    <!------------------CONTACT USER --------------!>
    <script>
    $('#contactUserButton').click(function() {
   $('#contactUser').modal('show');
});
    </script>
<!------------------EDIT PROFILE --------------!>
    <script>
    $('#editProfileButton').click(function() {
     alert("working on it :) "); 
});
    </script>
<!--------- SELECT POST -----------!> 
<script>	
$('#content').click(function() {
 $("tr").click(function () {
         var tableData = $(this).children("td").map(function() {
                        return $(this).text();
                    }).get();
                    var td; 
                    for (var i = 0; i < tableData.length; i++)
					{
                         td += ' ' + tableData[i] +  '<br>' ;
                    }    
                     $('#selectPostp').html(td); // Display the table in modal window 
                     $('#selectModalp').modal('show');
			});
				});
		</script> 
</html> 