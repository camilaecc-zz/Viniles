<?php
if (empty($_POST['page'])) {  //need to change 'page' 
     $display_type = 'none';  
    include ('splashPage.php');
    exit();
}
session_start();
require('model.php');


// When commands come from SplashPage
if ($_POST['page'] == 'SplashPage')
{
    $command = $_POST['command'];
    switch($command) {  
            case 'LogIn': 
            	
            if (!ifValid($_POST['username'], $_POST['password'])) {
                $error_msg_username = '* Wrong username';
                $error_msg_password = '* Wrong password';                                                       
                 $display_type = 'signin'; 
                include('splashPage.php');
            } 
            else {
                $username = $_POST['username'];
                $_SESSION['username'] = $_POST['username'];

                include('homePage.php');
                allPosts(); 
            }
            exit();
             break;

        case 'Register': 
            if (exist($_POST['username'])) {
                $error_msg_username = '* The user exists.';
                $display_type = 'join';
                include('splashPage.php');
            } else {
                if (newUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['name'], $_POST['lastName'], $_POST['location'])) {
                    $display_type = 'signin';
                    include('splashPage.php');
                } else {
                    $error_msg_username = '* The user exits.';
                    $display_type = 'join';
                    include('splashPage.php');
                }
            }
             break;
    case 'forgot':
         if (exist($_POST['username'])) {
               if(forgot($_POST['username'],$_POST['email'],$_POST['name'],$_POST['lastName'],$_POST['location'])){ 
               echo json_encode(resetPass($_POST['username'],$_POST['pass'])); 
              }

    }
       break;

}
} 


//else if command viene de homePage
else if ($_POST['page'] == 'homePage') 
{
     $command = $_POST['command'];
    
    switch($command) {
        case 'SignOut':
            $display_type = 'none';
            include('splashPage.php');
            break;
            
        case 'newPost':
            newPost($_POST['name'],$_POST['genre'],$_POST['description'],$_SESSION['username'],$_POST['ts'],$_POST['price'],$_POST['state'],$_POST['status']);
            break;
            
        case 'unsubscribe':
            $results = unsubscribe($_POST['username']);
           $display_type = 'none';
           
            include('splashPage.php');
            break;
        
        case 'myProfile':
           $display_type = 'none';
            include('userProfile.php');
            break;
        
        case 'allPosts':
             $data = allPosts(); // in model.php
            $s = json_encode($data);   
			echo $s  ; 
            break;
            
        case 'usersPosts':
            $data = usersPosts($_SESSION['username'] ); //$_SESSION['username'] || $_POST['username']
            $s = json_encode($data); 
            echo $s; 
            break; 
            
        case 'searchV':
            $data = searchVinyl($_POST['term']); // in model.php
            $s = json_encode($data);   // send the JSON string  back to the client (convert w/ ) 
			echo $s  ; 
            break;
            
        case 'deletePost':
            $results = deletePost($_POST['id']);
             $display_type = 'none';
             $data = usersPosts($_SESSION['username'] ); //$_SESSION['username'] || $_POST['username']
            $s = json_encode($data); 
            echo $s; 
             include('userProfile.php');      //Does not update automatically aiuda 
            break;
            
   case 'home':
            $display_type = 'none';
            include('homePage.php');
            break;
            
    case 'email':
        mail(getEmail($_POST['to']),'Enquery',$_POST['msg']);
        break; 
            
        default:
            echo 'Unknown command - ' . $command . '<br>';
    }
}

else {

}
?>