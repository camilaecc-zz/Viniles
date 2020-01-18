<!DOCTYPE html>
<html>
<head>
    <title>Viniles</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
     
    <body>
   		  <div>
   		  		 <button type='button' value='SignOut' id='Signout' class='btn btn-danger pull-right' >Sign Out </button>	
   		  		 <form id='form-signout' method='post' action='vinController.php' style='display:none'>
                    <input type='hidden' name='page' value='homePage'>
                    <input type='hidden' name='command' value='SignOut'>
               </form> 
   		  	 </div> 
        	<div class="jumbotron text-center" style='background-image: url("records.jpg"); height: 400px' >
        		<h1 style='color:white'>VINILES </h1>
    			<form action="vinController.php"> 
    			 <input type="text" class="st-default-search-input" id="search" placeholder='Search...' style="width: 500px;" > 
    			<button type='button' id='searchButton' for="search"  class="btn btn-secondary">Search</button> 
    	   </form>
    	</div>
    	<div class='container'> 
        	<div class='row'>
    			<div class='col-md-2 bg-info'>
                  <button type='button' id='newPostBtn' class='btn btn-info  pull-right' action='vinController.php' 
   		  		       value='newPostBtn'   data-target="#newPostModal">New Post</button>
   		  		 <button type='button' value='myProfile' id='myProfile' class='btn btn-info' >My Profile</button>	
   		  		   <form id='form-myProfile' method='post' action='vinController.php' style='display:none'>
                    <input type='hidden' name='page' value='homePage'>
                    <input type='hidden' name='command' value='myProfile'>
               </form> 
               <br>
   		  	 </div>

<!--todos los posts de la gente !-->
    	<div class='col-md-10 bg' >
                <div id='content' style='background-color: #538cc6'>
                </div>
            </div>                  
                  </div>		
    		</div>
    	</div>
    
    <!------------------New Post Modal ----------------------!>	

 <div class='modal' id="newPostModal" >
  <div class='modal-dialog'>
  <div class='modal-content' style='text-align:center'>
     <div class='modal-header'>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h2 class='modal-title'>New Post</h2>
      </div>
    		 <div class='modal-body'>
    		    <div class='row'>
    		 	<div class='form-group'>
    		 		   <form method='post' action=""> 
                        <input type='hidden' name='page' value='homePage'></input>
                         <input type='hidden' name='command' value='newPost'></input>
                         
                         <label class='modal-label' for='input-post-name' >Name:</label> 
                         <input type='text' name='name' placeholder='Product Name' id='input-post-name' required></input>
                         <!--php is empty display message of required !-->
                          <br>
                          <label class='modal-label' for='input-post-genre' >Genre:</label> 
                          <input type='text' name='genre' placeholder='Genre' id='input-post-genre' required></input>
                             <!--php is empty display message of required !-->
                          <br>
                          <label class='modal-label' for='input-post-state' >State:</label> 
                          <input type='number' name='state' placeholder='0' id='input-post-state' required>/10</input>
                           <!--php is empty display message of required !-->
                        <br>
                        <label class='modal-label' for='input-post-price'>Price: $</label> 
                        <input type='number' name='price' placeholder='$' id='input-post-price' required></input>
                     <!--php is empty display message of required !-->
                     <br>
                    <label class='modal-label' for='input-post-description'>Description:</label> <br>
                    <input type='text' name='description' placeholder='Description' style="width: 300px; height: 150px;" id='input-post-description' required></input>
                    <!--php is empty display message of required !-->
                     <br>
                     // Upload a picture of the vinyl
                     <br>
                      <label class='modal-label' for='input-post-ts' >Trade or Sell:</label> 
                         <input type='text' name='ts' placeholder='T or S' id='input-post-ts' required></input>
                         <!--php is empty display message of required !-->
                          <br>
                          <label class='modal-label' for='input-post-status' >Status:</label> 
                          <input type='text' name='status' placeholder='Available/Sold' id='input-post-status' required></input>
                             <!--php is empty display message of required !-->
                          <br>
                            </div>
                          </div>
                           </div>
              <div class='modal-footer'>
                    <button type='submit' value='Submit' id='submitNewPost' class='btn btn-success'>Submit</button>
                    <button type='reset' value='Reset' class='btn btn-default'>Reset</button>
                    <button type='button' value='Cancel' class='btn btn-default' data-dismiss="modal">Cancel</button>
                    </div>
            </form>
 </div>
</div>
 </div>
 <!-----------SELECTED ITEM MODAL --------!>
    	<div id="selectModal" class="modal" role="dialog">
			<div class="modal-dialog">
			    <div class="modal-content">
					<div class="modal-header">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <h4 class="modal-title">Details</h4>
				    </div>
				    <div class="modal-body"  id="selectPost" style="color: blue" >
					</div>
					<button type='button' id='contactButton' class="btn btn-info">Contact User</button>
				</div>
			</div>
		</div>
 <!-----------CONTACT USER MODAL --------!>		
   		<div id='contactUserModal' class='modal' roll='dialog'> 
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
                    <label class='modal-label' for='daMsg'>Message:</label> <br>
                    <input type='text' name='message' placeholder='Hi Im interested on .....'  style='height: 100px; width:550px ;' id='daMsg' required></input>
                    <!--CheckBox for include email --!>
                </div>
                <div class='modal-footer'>
                    <button type='submit' value='Send' class='btn btn-primary' id='sendEmailBtn' onclick="email()">Send</button>
                    <button type='reset' value='Clear' class='btn btn-default'>Clear</button>
                    <button type='button' value='Cancel' class='btn btn-default' data-dismiss="modal">Cancel</button>
                </div>
                </form>
 <!-----------------CONTACT USER -----------------------!> 
    <script>
    $('#contactButton').click(function() {
   $('#contactUserModal').modal('show');
});

$('#sendEmailBtn').click(function(){
email(); 
});
<?php
                $conn = mysqli_connect('localhost', 'cchaconf9', 'camisqlweb2', 'C354_cchaconf9');
                $session_value = (isset($_SESSION['email']))?$_SESSION['email']:'';
                ?>
                var fromEmail = "<?php echo $session_value ?>";
                
function email(){
var url = 'vinController.php'; 
                var query = { page:"homePage", 
                               command:"email",
                               to: ;
                               message: $('#daMsg').val()
                                  }; 
            
                $.post(url,query,
                    function(data) { 
});

} 
    </script>

<!-----------------MY PROFILE-----------------------!> 
<script>
$('#newPostBtn').click(function() {
   $('#newPostModal').modal('show');
});
</script>
<script> 
            // When the 'myProfile' navigation pill is clicked myProfile
            function myProf() {
                document.getElementById('form-myProfile').submit(); 
                            }

            $('#myProfile').click(myProf);
</script>

<!-------------------------New Post -------------------------!> 
     <script>
        $('#submitNewPost').click(function()  {
            
              $('#newPostModal').modal('hide');          
                                
                var url = 'vinController.php'; 
                var query = { page:"homePage", 
                              command:"newPost",
                              name: $('#input-post-name').val(), 
                                genre: $('#input-post-genre').val(),
                                description: $('#input-post-description').val(),
                                 ts: $('#input-post-ts').val(),
                                 price: $('#input-post-price').val(),
                                 state: $('#input-post-state').val(),
                                 status: $('#input-post-status').val(),
                                  }; 
            
                $.post(url,query,
                    function(data) { var rows = JSON.parse(data);  
                        var str = '<table class="table table-hover table-responsive">';
                      	// Construt the table code
						for (var i = 0; i < rows.length; i++)
						{
							str += '<tr>';
							for (var p in rows[i])
							{
								str += '<td>' + rows[i][p] + '</td>';
							}
							str += '</tr>';
						}
                        str += '</table>';
                        $('#content').html(str); // Display the table in #content
                });
            });
              </script>
<!-------------------------- PrintALLPosts----------------------!>   
<script>
 var url = 'vinController.php'; 
                var query = { page:"homePage", 
                              command:"allPosts"}
    $.post(url,query,
                    function(data) {      
                              
                        var rows = JSON.parse(data);  
                        var str = '<table class="table table-hover table-responsive " id="t">';
                      str += '<tr>';
                      for(var p in rows[0])
                              str += '<th>' + p + '</th>' ; // Adds headers 
						for (var i = 0; i < rows.length; i++)
						{
							str += '<tr>';
							for (var p in rows[i])
							{
								str += '<td>' + rows[i][p] + '</td>';
							}
							str += '</tr>';
						}
                        str += '</table>';
                        $('#content').html(str); // Display the table in #content
                        
                });
               
</script> 
  <!---------------SignOut------------------!>
        <script>
            function signout() {
                document.getElementById('form-signout').submit();  // submit the 'form-signout' form.
            }
            $('#Signout').click(signout);
        </script>
<!------------------------Search-------------------------!>
<script>
        $('#searchButton').click(function(){
          
            var url = "vinController.php";
            var query = { page:"homePage", 
                                 command:"searchV", 
                                 term:$('#search').val() };
          
            $.post(url,query,
                    function(data) {      
                        var rows = JSON.parse(data);  
                        var str = '<table class="table table-hover table-responsive "  >';
                      str += '<tr>';
                      for(var p in rows[0])
                              str += '<th>' + p + '</th>' ; // Adds headers 
						for (var i = 0; i < rows.length; i++)
						{
							str += '<tr data-toggle="modal" data-target="#selectModal">';
							for (var p in rows[i])
							{
								str += '<td >' + rows[i][p] + '</td>';
							}
							str += '</tr>';
						}
                        str += '</table>';
                        $('#content').html(str); // Display the table in #content
                });
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
                     $('#selectPost').html(td); // Display the table in modal window 
                     $('#selectModal').modal('show');
				});
				});
		</script> 

    </body>
</html> 

    