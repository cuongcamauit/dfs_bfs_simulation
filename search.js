const list = document.querySelector('#list');
const search = document.querySelector('#search');
const exactly = document.querySelector('#exactly');
// l.forEach(element => {
//     console.log(element);
// });

console.log(exactly);
for (let [key, value] of map)
    list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`;

search.addEventListener('keyup', () => {
    let searchkey = search.value; //O(1)
    let exact = exactly.checked; //O(1)
    list.innerHTML = ''; //O(1)
    //console.log(l[value]);
    console.log(exact);



    if (exact && searchkey != "") { //exact search
        if (map.has(searchkey)) { //if the value is in the map     //O(1)
            let content = map.get(searchkey); //O(1)
            list.innerHTML += `<a href="process.php?id=${content[0]}"><img src="${content[1]}" alt="" width="300" height="300"></a> ${searchkey}`; //O(1)
        }
    } else
        for (let [key, value] of map) { //O(n)
            if (key.toLowerCase().includes(searchkey.toLowerCase())) //O(n*m*m*k)
                list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`; //O(n*m*m*k)
        }
});