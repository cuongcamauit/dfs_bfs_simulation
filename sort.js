const sorttype = document.getElementById("sort");

function insertionSort(arr, n) {
    let i, key, j;
    for (i = 1; i < n; i++) {
        key = arr[i];
        j = i - 1;

        /* Move elements of arr[0..i-1], that are 
        greater than key, to one position ahead 
        of their current position */
        while (j >= 0 && arr[j] > key) {
            arr[j + 1] = arr[j];
            j = j - 1;
        }
        arr[j + 1] = key;
    }
    return arr;
}



updatelist = () => {
    list.innerHTML = "";
    for (let [key, value] of map)
        list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`;
}

console.log(sorttype);
console.log(map);
sorttype.addEventListener("change", () => {
    console.log(sorttype.value);
    console.log(map)
    if (sorttype.value == "name") {
        map = new Map(insertionSort([...map.entries()], map.size));
        console.log(map);
    } else if (sorttype.value == "level") {
        console.log(map);
        map = new Map([...map.entries()].sort((a, b) => {
            return a[1][2] - b[1][2];
        }));
    } else {
        map = defaultlist;
    }
    updatelist();
});