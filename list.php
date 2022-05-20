<?php 
    require_once('connect.php');
    $sql = "SELECT * FROM `canvas`";
    $result = mysqli_query($conn, $sql);
    ?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="text-align: center;">
            <input type="text" id="search">
            <input type="checkbox" id="exactly"> exactly
            <br> <br>
            Sort by:
            <select id="sort">
                <option value="default"></option>
                <option value="name">Name</option>
                <option value="level">Level</option>
            </select>
        </div>  
        <br><br>
        <div id="list"></div>
        <script>var map = new Map();
                var namelist = new Array();
        </script>
    
    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
            <script>
                map.set("<?php echo $row['name'];?>", [<?php echo $row['id'];?>, "<?php echo $row["director"];?>", <?php echo $row["level"];?>]);              
            </script>
        <?php
            
            
        }
    }
    // echo json_encode($arr);
    mysqli_close($conn);
    ?> 
    <script>
        let defaultlist = map;
        console.log(map);
    </script>
    <script src="search.js"></script> 
    <script src="sort.js"></script>     
</body>
</html>
        