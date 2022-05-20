const list = document.querySelector('#list');
const search = document.querySelector('#search');
const exactly = document.querySelector('#exactly');
// l.forEach(element => {
//     console.log(element);
// });

function AinB(A, B) {
    let m = A.length;                                   // 1 dvtg
    let n = B.length;                                   // 1 dvtg
    var L = new Array(m+1);                             // 1 dvtg
    for (let i=0;i<=m;i++)                              // 2(m+2) dvtg
        L[i] = new Array(n+1);                          // m+1 dvtg

    var len = 0;                                        // 1 dvtg
    for (let i = 0; i <= m; i++) {                      // 2(m+2) dvtg
        for (let j = 0; j <= n; j++) {                  // (m+1)*2(n+2) dvtg
            if (i == 0 || j == 0)                       // (m+1)2(n+1)
                L[i][j] = 0;                            // (m+1)(n+1)
            else 
                if (A[i - 1] == B[j - 1]) {             // (m+1)(n+1)
                    L[i][j] = L[i - 1][j - 1] + 1;      // (m+1)(n+1)
                    if (len < L[i][j]) {                // (m+1)(n+1)
                        len = L[i][j];                  // (m+1)(n+1)
                    }
                }
                else
                    L[i][j] = 0;                        // (m+1)(n+1)
        }
    }
    return len == m;                                    // 1 dvtg
}
console.log(AinB("abg", "gabc"));




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
        if (AinB(searchkeyup, keyup)) // n*(k*m) dvtg
            list.innerHTML += `<a href="process.php?id=${value[0]}"><img src="${value[1]}" alt="" width="300" height="300"></a> ${key}`; // n*(k*m) dvtg
    }
});