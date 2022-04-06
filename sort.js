const sorttype = document.getElementById("sort");



updatelist = () => {
    list.innerHTML = "";
    for (let [key, value] of l)
        list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`;
}

console.log(sorttype);
sorttype.addEventListener("change", () => {
    console.log(sorttype.value);
    if (sorttype.value == "name") {
        l = new Map([...l.entries()].sort())

    } else if (sorttype.value == "level") {
        console.log(l);
        l = new Map([...l.entries()].sort((a, b) => {
            return a[1][2] - b[1][2];
        }));
    } else {
        l = defaultlist;
    }
    updatelist();
});