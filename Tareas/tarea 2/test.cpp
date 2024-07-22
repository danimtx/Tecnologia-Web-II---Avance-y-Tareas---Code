#include <iostream>
#include <bits/stdc++.h>
using namespace std;
#define fast ios_base::sync_with_stdio(false); cin.tie(NULL);
//#define IOF freopen("hps.in", "r", stdin); freopen("hps.out", "w", stdout); //caso archivos

#define MAX_N 1005           // Tamaño máximo para arrays o tablas DP
#define INF 1e9              // Valor infinito para inicializar tablas DP
#define LL_INF LLONG_MAX
#define MOD 1000000007       // Módulo para valores en programación dinámica

#define endl "\n"
#define f first
#define s second
#define pb push_back
#define ll long long int
#define ull unsigned long long // solo valores positivos
#define l size() //comentar en algunos algoritmos

#define all(x) x.begin(), x.end()

vector<vector<pair<int, int>>> adj;

bool spfa(int s, vector<int>& d) {
    int n = adj.size();
    d.assign(n, INF);
    vector<int> cnt(n, 0);
    vector<bool> inqueue(n, false);
    queue<int> q;

    d[s] = 0;
    q.push(s);
    inqueue[s] = true;
    while (!q.empty()) {
        int v = q.front();
        q.pop();
        inqueue[v] = false;

        for (auto edge : adj[v]) {
            int to = edge.first;
            int len = edge.second;

            if (d[v] + len < d[to]) {
                d[to] = d[v] + len;
                if (!inqueue[to]) {
                    q.push(to);
                    inqueue[to] = true;
                    cnt[to]++;
                    if (cnt[to] > n)
                        return false;  // negative cycle
                }
            }
        }
    }
    return true;
}




int main() {
    fast
    int t = 1;
    //cin>>t;
    while(t--)
    solve();
    return 0;
}