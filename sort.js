const sorttype = document.getElementById("sort");

function insertionSort(arr, n) { // 3 + 2n + 3*(n-1) + n*(n+1)/2-1+(n-1)*n + 1 = 1/2 +        
    let i, key, j; // 3 dvtg
    for (i = 1; i < n; i++) { // 2n dvtg
        key = arr[i]; // n-1 dvtg
        j = i - 1; // n-1 dvtg
        while (j >= 0 && arr[j] > key) { // 2+3+4+...n = ((n)*(n+1)/2)-1 dvtg
            arr[j + 1] = arr[j]; // 1+2+3+..+n-1 = (n-1)*n/2 dvtg
            j = j - 1; // (n-1)*n/2 dvtg
        }
        arr[j + 1] = key; // n-1 dvtg
    }
    return arr; // 1 dvtg
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