

<?php
//session_start();
 if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
 
 $_SESSION['_session']['user_id'] =$_POST['data']['data']['user_id'];
 $_SESSION['_session']['user_name'] =$_POST['data']['data']['user_name'];
 $_SESSION['_session']['token'] =$_POST['data']['token'];
 $data['result']=$_POST['data']['success'];
 $data['message']=$_POST['data']['message'];
 
 $data['url']='dashboard.php';
 //echo json_encode($data); 
}
?>