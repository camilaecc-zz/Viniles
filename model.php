<?php

$conn = mysqli_connect('localhost', 'cchaconf9', 'camisqlweb2', 'C354_cchaconf9');

function newUser($username, $password, $email, $name, $lastName, $location)
{
    global $conn;
    
    if (exist($username))
        return false;
    else {
        $sql = "insert into Users values ( '$username', '$password', '$email', 
        													'$name','$lastName','$location')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

function ifValid($username, $password) 
{
    global $conn;
    
    $sql = "select * from Users where (Username = '$username' and Password = '$password')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function exist($username) 
{
    global $conn;
    
    $sql = "select * from Users where (Username = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function unsubscribe($username){
global $conn;
        $sql = "delete from Users where  username = '$username' ";
        $result = mysqli_query($conn, $sql);
        return $result;
    }


function newPost($name,$genre,$description,$username,$ts,$price,$state,$status ){
	global $conn;
    $current_date = date('Ymd');
    $sql = "insert into Posts values (NULL, '$name', '$genre', '$price','$description','$username','$ts','$state', '$status','$current_date')";
    mysqli_query($conn, $sql);
    include('homePage.php');
  

}
function allPosts(){
	global $conn;
	$sql = "SELECT * from Posts";
     $result = mysqli_query($conn, $sql);
        $data = array();  
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){  
            $data[$i++] = $row;
        }
        return $data; 
        }
function searchVinyl($term){
	global $conn;
	 $sql = "select * from Posts where Name like '%".$term."%' OR Genre like '%".$term."%' OR Price like '%".$term."%' OR Description like '%".$term."%' ";
     $result = mysqli_query($conn, $sql);
        $data = array();  
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){  
            $data[$i++] = $row;
        }
        return $data; 
        }
        
function usersPosts($username){
	global $conn;
	$sql = "SELECT * from Posts where Username= '$username' ";
     $result = mysqli_query($conn, $sql);
        $data = array();  
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){  
            $data[$i++] = $row;
        }
        return $data; 
        }
        
function deletePost($id){
       global $conn;
        $sql = "delete from Posts where  ID = '$id' ";
        mysqli_query($conn, $sql);
         include('userProfile.php');

}
    
function searchForUser($term){
	global $conn;
	 $sql = "select * from Users where Name like '%".$term."%' OR username like '%".$term."%' OR Last Name like '%".$term."%' ";
     $result = mysqli_query($conn, $sql);
        $data = array();  
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){  
            $data[$i++] = $row;
        }
        return $data; 
}
function forgot($username,$email,$name,$lastName,$location){
    global $conn; 
    $sql = "select * from Users where username = '$username'  AND email = '$email' AND name = '$name'  AND lastName = '$lastName' AND location = '$location' "; 
  $result= mysqli_query($conn, $sql); 
     if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;


}

function resetPass($username, $pass){
global $conn; 
$sql= "update Users set password ='$pass' where username = '$username' "; 
if(mysqli_query($conn, $sql)){
$sql= "Select * from Users where username = '$username' "; 
$result = mysqli_query($conn, $sql); 
if($result){
return (mysqli_fetch_assoc($result)); 
}
}

}

function getEmail( $to){
global $conn; 
$sql= "Select username from Users where username = '$to' "; 
$result = mysqli_query($conn, $sql); 
$data = json_econde($result); 

return $data; 
}

//         
// function editProfile($username, $password, $email, $name, $lastName, $location){
// 	global $conn;
// $sql = "update Users 
//             set .......           
// 			where (.........)";  // Update John Brown's age
//     $result = mysqli_query($conn, $sql);
//     $result = mysqli_query($conn, "select * from Users");
// 	//print? 
// 	mysqli_close($conn);
// }

?>