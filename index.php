<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
</head>
<body>
  <div class="right">
    <div class="gridContainer"></div>
  </div> 


  <div class="page">
  
    <h1>ETCH-A-SKETCH</h1>
    <label for="quantity">Type A Value For Grid Size:</label>
    <input type="number" id="quantity" name="quantity" />
    <button class="reset">RESET</button><br>
    <button class="bfs">BFS</button>
    <button class="dfs">DFS</button>
    <button class="dijkstra">Dijkstra</button>
    <button class="deletePath">Delete Path</button>
    <a href="list.php"><button>Open</button></a>
    <button class="erase">Erase</button>  <br>
    speed: <input type="range" id="myRange" value="50" min="0" max="1000" style="width: 200px;margin-left:500px;">
    <input type="text" placeholder="Enter name" class="name">
    <button class="save">Save</button>

    
  </div>

    
    
    <?php    
    require("script.php");
    
    ?>
</body>
</html>