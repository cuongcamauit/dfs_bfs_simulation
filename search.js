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


    // T(n) = 5 dvtg => O(n) = O(1)
    if (exact && searchkey != "") { // 2 dvtg
        if (map.has(searchkey)) { // 1 dvtg
            let content = map.get(searchkey); // 1 dvtg
            list.innerHTML += `<a href="process.php?id=${content[0]}"><img src="${content[1]}" alt="" width="300" height="300"></a> ${searchkey}`; // 1 dvtg
        }
    } else // (n+1)+n*k+n*m+n*k*m*2 => O(n) = O(n*k*m)
        for (let [key, value] of map) { // n+1 dvtg
        keyup = key.toLowerCase(); // n*k dvtg 
        searchkeyup = searchkey.toLowerCase(); // n*m dvtg
        if (keyup.includes(searchkeyup)) // n*(k*m) dvtg
            list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`; // n*(k*m) dvtg
    }
});