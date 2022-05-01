<script>
const grid = document.querySelector(".gridContainer");
const userInput = document.getElementById("quantity");
const resetButton = document.querySelector(".reset");
const bfsButton = document.querySelector(".bfs");
const dfsButton = document.querySelector(".dfs");
const delPathBtn = document.querySelector(".deletePath");
const eraseBtn = document.querySelector(".erase");
const saveBtn = document.querySelector(".save");
const key = document.getElementById("key");
const speed = document.getElementById("myRange");
const name = document.querySelector(".name");
const dijkstraBtn = document.querySelector(".dijkstra");
var time = speed.max -  speed.value;


var eraseStatus = false;
createGrid = () => {
    userInput.value = 17;
    updateGrid();
    // for (let i = 0; i < userInput.value * userInput.value; i++) {
    //     const div = document.createElement("div");
    //     div.classList.add("square");
    //     div.id = i;
    //     grid.appendChild(div);
    // }
}
updateGrid = () => {
    grid.innerHTML = "";
    grid.style.setProperty(
        "grid-template-columns",
        `repeat(${userInput.value}, 2fr)`
    );
    grid.style.setProperty(
        "grid-template-rows",
        `repeat(${userInput.value}, 2fr)`
    );
    for (let i = 0; i < userInput.value * userInput.value; i++) {
        const div = document.createElement("div");
        div.id = i;
        div.classList.add("square");
        grid.appendChild(div);
    }
};

createGrid();

function delay(delayInms) {
    if (delayInms == 0) {
        return;
    }
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(2);
        }, delayInms);
    });
}

async function bfs() {
    var n = parseInt(userInput.value);  // number of rows
    var queue = []; // queue for BFS
    var start = parseInt(document.querySelector(".green").id); // start node
    var end = parseInt(document.querySelector(".red").id);  // end node
    // console.log(document.querySelector(".green"));
    // console.log(start);
    queue.push(start);  // push start node to queue       // O(1)
    // var d = 0;  
    while (queue.length != 0) {                           //O(n*n)
        var u = parseInt(queue.shift()); // pop first element from queue
        console.log(u);

        // top            
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "square")) {
            queue.push(u - n);
            let delayres1 = await delay(time);  // delay
            document.getElementById(`${u-n}`).className = "blue";

        }
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "red")) { // if end node
            break;
        }

        // right
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "square")) { // if not last column
            queue.push(u + 1);
            let delayres2 = await delay(time);
            document.getElementById(`${u+1}`).className = "blue";

        }
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "red")) {
            break;
        }

        // bottom
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "square")) {
            queue.push(u + n);
            let delayres3 = await delay(time);
            document.getElementById(`${u+n}`).className = "blue";

        }
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "red")) {
            break;
        }

        // left
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "square")) {
            queue.push(u - 1);
            let delayres4 = await delay(time);
            document.getElementById(`${u-1}`).className = "blue";
        }
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "red")) {
            break;

        }



    }

}

async function dfs() {
    var n = parseInt(userInput.value);
    var stack = [];
    var start = parseInt(document.querySelector(".green").id);
    var end = parseInt(document.querySelector(".red").id);
    // console.log(document.querySelector(".green"));
    // console.log(start);
    stack.push(start);
    while (stack.length != 0) {
        var u = parseInt(stack.pop());
        console.log(u);
        // top            
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "square")) {
            stack.push(u); // push current node to stack
            stack.push(u - n);
            let delayres1 = await delay(time);
            document.getElementById(`${u-n}`).className = "blue";
            continue;
        }
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "red")) {
            break;
        }

        // right
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "square")) {
            stack.push(u);
            stack.push(u + 1);
            let delayres2 = await delay(time);
            document.getElementById(`${u+1}`).className = "blue";
            continue;

        }
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "red")) {
            break;
        }

        // bottom
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "square")) {
            stack.push(u);
            stack.push(u + n);
            let delayres3 = await delay(time);
            document.getElementById(`${u+n}`).className = "blue";
            continue;

        }
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "red")) {
            break;
        }

        // left
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "square")) {
            stack.push(u);
            stack.push(u - 1);
            let delayres4 = await delay(time);
            document.getElementById(`${u-1}`).className = "blue";
            continue;
        }
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "red")) {
            break;

        }
    }

}

returnarray = () => {
    
    var arr = new Array(userInput.value*userInput.value);
    for (let i = 0; i < userInput.value*userInput.value; i++) {
        arr[i] = new Array(userInput.value*userInput.value);
        for (let j = 0; j < userInput.value*userInput.value; j++) {
            arr[i][j] = 0; // initialize all elements to 0
        }
        if (document.getElementById(i).className == "black") {
            continue;
        }
        // up
        if (i-userInput.value >= 0 && document.getElementById(`${i-userInput.value}`).className != "black") {
            arr[i][i-userInput.value] = 1;
        }

        // down        
        if (i+parseInt(userInput.value) < userInput.value*userInput.value && document.getElementById(`${i+parseInt(userInput.value)}`).className != "black") {
            arr[i][i+parseInt(userInput.value)] = 1;
        }

        // left
        if (i%userInput.value != 0 && document.getElementById(`${i-1}`).className != "black") {
            arr[i][i-1] = 1;
        }
        
        // right
        if ((i+1)%userInput.value != 0 && document.getElementById(`${i+1}`).className != "black") {
            arr[i][i+1] = 1;
        }
    }
    console.log(arr);
    return arr;
}

// A Javascript program for Dijkstra's single
// source shortest path algorithm.
// The program is for adjacency matrix
// representation of the graph	


// A utility function to find the
// vertex with minimum distance
// value, from the set of vertices
// not yet included in shortest
// path tree
function minDistance(dist,sptSet)
{
	let V = parseInt(userInput.value*userInput.value);
	// Initialize min value
	let min = Number.MAX_VALUE;
	let min_index = -1;
	
	for(let v = 0; v < V; v++)
	{
		if (sptSet[v] == false && dist[v] <= min)
		{
			min = dist[v];
			min_index = v;
		}
	}
	return min_index;
}

// A utility function to print
// the constructed distance array
// function printSolution(dist)
// {

// 	document.write("Vertex \t\t Distance from Source<br>");
// 	for(let i = 0; i < V; i++)
// 	{
// 		document.write(i + " \t\t " +
// 				dist[i] + "<br>");
// 	}
// }

// Function that implements Dijkstra's
// single source shortest path algorithm
// for a graph represented using adjacency
// matrix representation
async function dijkstra()
{
    let V = parseInt(userInput.value*userInput.value);
    let graph = returnarray();
    let src = parseInt(document.querySelector(".green").id);
    let end = parseInt(document.querySelector(".red").id);



	let dist = new Array(V); 
	let sptSet = new Array(V);  
    let prev = new Array(V);
	
	// Initialize all distances as
	// INFINITE and stpSet[] as false
	for(let i = 0; i < V; i++)
	{
		dist[i] = Number.MAX_VALUE;
		sptSet[i] = false;
	}
	
	// Distance of source vertex
	// from itself is always 0
	dist[src] = 0;
	
	// Find shortest path for all vertices
	for(let count = 0; count < V - 1; count++)
	{
		
		// Pick the minimum distance vertex
		// from the set of vertices not yet
		// processed. u is always equal to
		// src in first iteration.
		let u = minDistance(dist, sptSet);
		
		// Mark the picked vertex as processed
		sptSet[u] = true;
		
		// Update dist value of the adjacent
		// vertices of the picked vertex.
		for(let v = 0; v < V; v++)
		{
			
			// Update dist[v] only if is not in
			// sptSet, there is an edge from u
			// to v, and total weight of path
			// from src to v through u is smaller
			// than current value of dist[v]
			if (!sptSet[v] && graph[u][v] != 0 &&
				dist[u] != Number.MAX_VALUE &&
				dist[u] + graph[u][v] < dist[v])
			{
				dist[v] = dist[u] + graph[u][v];
                prev[v] = u;
			}
		}
	}
    let list = [];
    console.log(prev);
    while (prev[end] != undefined) {
        console.log(prev[end]);
        list.push(prev[end]);
        end = prev[end];
    }
    console.log(list);
    for (let i = list.length-2; i >=0; i--) {
        let delayres4 = await delay(time);
        document.getElementById(list[i]).className = "yellow";
    }

	
	//Print the constructed distance array
	// printSolution(dist);
}







const square = document.querySelector("div");
square.addEventListener("click", function(event) {
    if (eraseStatus)
        event.target.className = "square";
    else
        event.target.classList.replace("square", "black");
    // console.log(square);
    // console.log(event.target);
    // console.log(grid);
});

square.addEventListener("dblclick", function(event) {
    const count = document.querySelectorAll(".green").length;
    const count2 = document.querySelectorAll(".red").length;
    if (count == 0) {
        event.target.classList.replace("black", "green");
    } else if (count == 1 && count2 == 0) {
        event.target.classList.replace("black", "red");
    }
});


userInput.addEventListener("change", updateGrid);
speed.addEventListener("change", function() {
    time = speed.max - speed.value;
    console.log(time);
});

resetButton.addEventListener("click", function() {
    // console.log(grid.innerHTML);
    grid.innerHTML = '';

    grid.style.setProperty("grid-template-columns", `repeat(16, 2fr)`);
    grid.style.setProperty("grid-template-rows", `repeat(16, 2fr)`);
    createGrid();
});

bfsButton.addEventListener("click", bfs);
dfsButton.addEventListener("click", dfs);
dijkstraBtn.addEventListener("click", dijkstra);


delPathBtn.addEventListener("click", function() {
    var Path = document.querySelectorAll(".blue");
    for (let v of Path)
        v.className = "square";
    
    var Path = document.querySelectorAll(".yellow");
    for (let v of Path)
        v.className = "square";

});

eraseBtn.addEventListener("click", function() {
    eraseStatus = !eraseStatus;
    if (eraseStatus)
        eraseBtn.classList.add("red");
    else
        eraseBtn.classList.remove("red");
    console.log(1000);
});

function decode(s) {
    var arr = s.split(" ");
    console.log(arr);
    for (let i=0;i<arr.length-1;i++) {


        document.getElementById(`${arr[i].split(",")[0]}`).className = arr[i].split(",")[1];
    }
}


$(function() {
    $(".save").click(function() {
        console.log($(".name").val());
        if ($(".name").val() == "") {
            alert("Nhap phai nhap ten");
            return;
        }
        html2canvas($(".gridContainer"), {
            onrendered: function(canvas) {
                var imgsrc = canvas.toDataURL("image/png");
                var dataURL = canvas.toDataURL();
                var level = userInput.value;
                var s = "";
                var name = $(".name").val();
                for (let i=0;i<userInput.value*userInput.value;i++)
                if (document.getElementById(`${i}`).className != "square")
                    s += `${i},${document.getElementById(`${i}`).className} ` ;
                
               
                $.ajax({
                    type: "POST",
                    url: "saveimage.php",
                    data: {
                        imgBase64: dataURL,
                        level: level,
                        string: s,
                        name: name
                    }
                }).done(function(o) {
                    alert("Image Saved!");
                });
            }
        });
    });
});




console.log(eraseStatus);

</script> 
<?php 
    if (isset($_COOKIE['id'])) {
        $id = $_COOKIE['id'];
        // setcookie('id', "", time() - 3600); 
        require "connect.php";
        $sql = "select * from canvas where id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
            <script>
                userInput.value = <?php echo $row['level'];?>;
                updateGrid();
                    decode("<?php echo $row['string'];?>");
            </script>
        <?php
    }
?>
        