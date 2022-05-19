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


async function bfs() {      // 5 + (n+1) + n + 6n*4 = 6+26n => O(n) = n
    var n = parseInt(userInput.value);                                                                  // 1 dvtg
    var queue = [];                                                                                     // 1 dvtg
    var start = parseInt(document.querySelector(".green").id);                                          // 1 dvtg
    var end = parseInt(document.querySelector(".red").id);                                              // 1 dvtg
    queue.push(start);                                                                                  // 1 dvtg


    while (queue.length != 0) {                                                                         // n+1 dvtg                       
        var u = parseInt(queue.shift());                                                                // n dvtg
        
        
        // top            
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "square")) {                  // n dvtg         
            queue.push(u - n);                                                                          // n dvtg
            let delayres1 = await delay(time);  // delay                                                // n dvtg
            document.getElementById(`${u-n}`).className = "blue";                                       // n dvtg

        }
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "red")) {                     // n dvtg
            break;                                                                                      // n dvtg   
        }

        // right
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "square")) {            // n dvtg
            queue.push(u + 1);                                                                          // n dvtg
            let delayres2 = await delay(time);                                                          // n dvtg
            document.getElementById(`${u+1}`).className = "blue";                                       // n dvtg

        }
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "red")) {               // n dvtg
            break;                                                                                      // n dvtg
        }

        // bottom
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "square")) {               // n dvtg
            queue.push(u + n);                                                                          // n dvtg
            let delayres3 = await delay(time);                                                          // n dvtg
            document.getElementById(`${u+n}`).className = "blue";                                       // n dvtg

        }
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "red")) {                  // n dvtg
            break;                                                                                      // n dvtg
        }

        // left
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "square")) {                // n dvtg
            queue.push(u - 1);                                                                          // n dvtg
            let delayres4 = await delay(time);                                                          // n dvtg
            document.getElementById(`${u-1}`).className = "blue";                                       // n dvtg
        }
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "red")) {                   // n dvtg
            break;

        }
    }

}

async function dfs() {      // 5 + 2n + (2n-1) + 8*(2n-1)*4 = 68n-28 => O(n)
    var n = parseInt(userInput.value);                                                                   // 1 dvtg
    var stack = [];                                                                                      // 1 dvtg
    var start = parseInt(document.querySelector(".green").id);                                           // 1 dvtg
    var end = parseInt(document.querySelector(".red").id);                                               // 1 dvtg
    stack.push(start);                                                                                   // 1 dvtg

    while (stack.length != 0) {                                                                          // 2n dvtg                                                                       
        var u = parseInt(stack.pop());                                                                   // 2n-1 dvtg
    
        // top            
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "square")) {                   // 2n-1 dvtg
            stack.push(u);                                                                               // 2n-1 dvtg
            stack.push(u - n);                                                                           // 2n-1 dvtg
            let delayres1 = await delay(time);                                                           // 2n-1 dvtg
            document.getElementById(`${u-n}`).className = "blue";                                        // 2n-1 dvtg
            continue;                                                                                    // 2n-1 dvtg
        }
        if (u - n >= 0 && (document.getElementById(`${u-n}`).className == "red")) {                      // 2n-1 dvtg
            break;                                                                                       // 2n-1 dvtg
        }

        // right
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "square")) {             // 2n-1 dvtg
            stack.push(u);                                                                               // 2n-1 dvtg
            stack.push(u + 1);                                                                           // 2n-1 dvtg
            let delayres2 = await delay(time);                                                           // 2n-1 dvtg
            document.getElementById(`${u+1}`).className = "blue";                                        // 2n-1 dvtg
            continue;                                                                                    // 2n-1 dvtg

        }
        if ((u + 1) % n != 0 && (document.getElementById(`${u+1}`).className == "red")) {                // 2n-1 dvtg
            break;                                                                                       // 2n-1 dvtg
        }

        // bottom
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "square")) {                // 2n-1 dvtg
            stack.push(u);                                                                               // 2n-1 dvtg
            stack.push(u + n);                                                                           // 2n-1 dvtg
            let delayres3 = await delay(time);                                                           // 2n-1 dvtg
            document.getElementById(`${u+n}`).className = "blue";                                        // 2n-1 dvtg
            continue;                                                                                    // 2n-1 dvtg

        }
        if (u + n < n * n && (document.getElementById(`${u+n}`).className == "red")) {                   // 2n-1 dvtg
            break;                                                                                       // 2n-1 dvtg
        }

        // left
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "square")) {                 // 2n-1 dvtg
            stack.push(u);                                                                               // 2n-1 dvtg
            stack.push(u - 1);                                                                           // 2n-1 dvtg
            let delayres4 = await delay(time);                                                           // 2n-1 dvtg
            document.getElementById(`${u-1}`).className = "blue";                                        // 2n-1 dvtg
            continue;                                                                                    // 2n-1 dvtg
        }
        if ((u) % n != 0 && (document.getElementById(`${u-1}`).className == "red")) {                    // 2n-1 dvtg
            break;                                                                                       // 2n-1 dvtg
        }
    }

}

returnarray = () => {       // O(n*n)
    
    var arr = new Array(userInput.value*userInput.value);
    for (let i = 0; i < userInput.value*userInput.value; i++) {     // O(n)
        arr[i] = new Array(userInput.value*userInput.value);        // O(n*n) voi n la so o
        for (let j = 0; j < userInput.value*userInput.value; j++) {
            arr[i][j] = 0; 
        }
        if (document.getElementById(i).className == "black") {
            continue;
        }
        // top
        if (i-userInput.value >= 0 && document.getElementById(`${i-userInput.value}`).className != "black") {
            arr[i][i-userInput.value] = 1;
        }

        // bottom      
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

    return arr;
}


function minDistance(dist,sptSet) {  // T(v) = 3 + (v+1) + 3v + 1 = 5+4v => O(n) = n
	let V = parseInt(userInput.value*userInput.value);              // 1 dvtg
	// Initialize min value
	let min = Number.MAX_VALUE;                                     // 1 dvtg
	let min_index = -1;                                             // 1 dvtg
	
	for(let v = 0; v < V; v++)                                      // v+1 dvtg
	{   
		if (sptSet[v] == false && dist[v] <= min)                   // v dvtg
		{
			min = dist[v];                                          // v dvtg
			min_index = v;                                          // v dvtg
		}
	}
	return min_index;                                               // 1 dvtg
}

async function dijkstra() {         // T(V) = 6 + 2(V+1) + 2V + 1 + 2V + 2(V-1) + (V-1)*2(V-1) + (V-1)*V*3 + 1 + 7V = 9+9V+5V^2 => O(n) = n^2
    let V = parseInt(userInput.value*userInput.value);          // 1 dvtg
    let graph = returnarray();                                  
    let src = parseInt(document.querySelector(".green").id);    // 1 dvtg
    let end = parseInt(document.querySelector(".red").id);      // 1 dvtg



	let dist = new Array(V);                                    // 1 dvtg
	let sptSet = new Array(V);                                  // 1 dvtg
    let prev = new Array(V);                                    // 1 dvtg
	
	for(let i = 0; i < V; i++)                                  // 2(V+1) dvtg
	{
		dist[i] = Number.MAX_VALUE;                             // V dvtg
		sptSet[i] = false;                                      // V dvtg
	}

	dist[src] = 0;                                                 // 1 dvtg
	
	for(let count = 0; count < V - 1; count++)                      // 2*V dvtg
    {
		
		let u = minDistance(dist, sptSet);                          // V-1 dvtg
		
		sptSet[u] = true;                                           // V-1 dvtg
		
		for(let v = 0; v < V; v++)                                  // (V-1)*2(V+1) dvtg
		{
			if (!sptSet[v] && graph[u][v] != 0 &&                   // (V-1)*V dvtg
				dist[u] != Number.MAX_VALUE &&                      
				dist[u] + graph[u][v] < dist[v])                    
			{
				dist[v] = dist[u] + graph[u][v];                    // (V-1)*V dvtg
                prev[v] = u;                                        // (V-1)*V dvtg
			}
		}
	}
    let list = [];                                                  // 1 dvtg
    console.log(prev);  
    while (prev[end] !=undefined) {                                 // V dvtg
        console.log(prev[end]);                                     // V dvtg
        list.push(prev[end]);                                       // V dvtg
        end = prev[end];                                            // V dvtg
    }
    console.log(list);
    for (let i = list.length-2; i >=0; i--) {                       // V dvtg
        let delayres4 = await delay(time);                          // V dvtg
        document.getElementById(list[i]).className = "yellow";      // V dvtg
    }

}


const square = document.querySelector("div");
let flag = false;



square.addEventListener("dblclick", function(event) {
    const count = document.querySelectorAll(".green").length;
    const count2 = document.querySelectorAll(".red").length;
    if (count == 0) {
        event.target.classList.replace("square", "green");
        event.target.classList.replace("black", "green");
    } else if (count == 1 && count2 == 0) {
        event.target.classList.replace("square", "red");
        event.target.classList.replace("black", "red");
    }
});
square.addEventListener("click", function(event) {
    console.log(flag);
    flag = !flag;
});



square.addEventListener("mousemove", function(event) {
    if (flag) {
        if (eraseStatus) {
            event.target.classList.replace("black", "square");
            event.target.classList.replace("green", "square");
            event.target.classList.replace("red", "square");
            
        }
        else
            event.target.classList.replace("square", "black");
            
        }
        // console.log(square);
        // console.log(event.target);
        // console.log(grid);
});

square.addEventListener("mousedown", function() {
    console.log(10);
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
        