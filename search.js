const list = document.querySelector('#list');
const search = document.querySelector('#search');
const exactly = document.querySelector('#exactly');
// l.forEach(element => {
//     console.log(element);
// });

console.log(exactly);
for (let [key, value] of l)
    list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`;

search.addEventListener('keyup', () => {
    let value = search.value;
    let exact = exactly.checked;
    list.innerHTML = '';
    //console.log(l[value]);
    console.log(exact);
    console.log(value);
    if (exact && value != "") {
        if (l.has(value)) {
            let content = l.get(value);
            list.innerHTML += `<a href="process.php?id=${content[0]}"><img src="${content[1]}" alt="" width="300" height="300"></a> ${value}`;
        }
    } else
        for (let [key, valu] of l) {
            if (key.toLowerCase().includes(value.toLowerCase()))
                list.innerHTML += `<a href="process.php?id=${valu[0]}"><img src="${valu[1]}" alt="" width="300" height="300"></a> ${key}`;
        }
});