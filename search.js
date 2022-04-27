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
    let searchkey = search.value;
    let exact = exactly.checked;
    list.innerHTML = '';
    //console.log(l[value]);
    console.log(exact);



    if (exact && searchkey != "") { //exact search
        if (map.has(searchkey)) { //if the value is in the map
            let content = map.get(searchkey);
            list.innerHTML += `<a href="process.php?id=${content[0]}"><img src="${content[1]}" alt="" width="300" height="300"></a> ${searchkey}`;
        }
    } else
        for (let [key, value] of map) {
            if (key.toLowerCase().includes(searchkey.toLowerCase()))
                list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`;
        }
});