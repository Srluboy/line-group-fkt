<?php
if(isset($_POST['msg'])){
function sendToLine($message){
        

        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = '6JjwTAfECxd9rFaM9MYVje5X7QVWkPz1EikQXZz1Vo6';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'message='.$message);
        // follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$line_token,
        ]);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);
}
$msg = $_POST['msg'];
sendToLine($msg);
}
?>
