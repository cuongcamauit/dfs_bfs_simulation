#include <iostream>
using namespace std;
int main() {
    int n = 10, d=0, z = 0;
    for (int i=1;i<n;i++) {
        int j=i-1;
        z++;
        while (j>=0) {
            j--;
            d++;
        }
    }
    cout << d << endl << z;
    return 0;
}