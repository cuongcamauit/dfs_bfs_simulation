<?php 
    require_once('connect.php');
    $sql = "SELECT * FROM `canvas`";
    $result = mysqli_query($conn, $sql);
    ?>  
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
        <script>var l = new Map();
                var namelist = new Array();
        </script>
    
    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
            <script>
                l.set("<?php echo $row['name'];?>", [<?php echo $row['id'];?>, "<?php echo $row["director"];?>", <?php echo $row["level"];?>]);
                namelist.push("<?php echo $row['name'];?>");               
            </script>
        <?php
            
            
        }
    }
    // echo json_encode($arr);
    mysqli_close($conn);
    ?> 
    <script>
        let defaultlist = l;
    </script>
    <script src="search.js"></script> 
    <script src="sort.js"></script> 
    
    <?php
?>