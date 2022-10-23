<?php
include 'connection.php';

if($_POST){
    //post data 
    $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
    $password= filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
    $response = [];
// $username = 'username';
// $password = 'password';
// $name = 'nama';
    $userQuery =$connection->prepare("SELECT * FROM user where username = ?");
    $userQuery->execute(array($username));
    
//cek username ada atau tidak

    if($userQuery->rowCount() != 0){
//beri Response

        $response['status'] = false;
        $response['message'] = 'Akun Sudah digunakan';
    } else{
        $insertAccount = 'INSERT INTO user (username,password,name) values (:username,:password,:name)';
        $statement = $connection->prepare($insertAccount);

        try{
            //eksekusi statement db
            $statement->execute([
                ':username' => $username,
                ':password' => md5($password),
                ':name' => $name
            ]);

            $response['status'] = true;
            $response['message'] = 'Akun Berhasil Didaftarkan';
            $response['data'] =[
                'username' => $username,
                'name' => $name
            ];

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    
    echo $json;
}
?>