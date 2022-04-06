<?php 
    $img = $_REQUEST["imgBase64"];
    $level = $_REQUEST["level"];
    $string = $_REQUEST["string"];
    $name = $_REQUEST["name"];
    // console log string


    

    // 
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = 'images/'.uniqid().'.png';
    $success = file_put_contents($file, $data);
    print $success ? $file : 'Unable to save the file.';
    //
    require_once('connect.php');

    $sql = "INSERT INTO canvas (level, string, director, name) VALUES ($level, '$string', '$file', '$name')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);



?>