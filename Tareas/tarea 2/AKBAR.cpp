#include<bits/stdc++.h>
using namespace std;
const int maxn = 2e5 + 10;
int n, m, a, b, c = 1, d;
bool vis[maxn] = { false };
vector<int> graph[maxn];
int level[maxn],pos[maxn],child[maxn];
int dfs(int src) 
{
    vis[src] = true;
    pos[c] = src;
    level[src] = c++;
    int temp = 1;
    for (int i = 0; i<graph[src].size(); i++) 
    {
        if (!vis[graph[src][i]]) temp += dfs(graph[src][i]);
    }
    return  child[src] = temp;
}
int main() 
{
    cin >> n >> m;
    for (int i = 2; i <= n; i++) 
    {
        cin >> a;
        graph[a].push_back(i);
    }
    dfs(1);
    while (m--) 
    {
        cin >> a >> b;
        if (child[a]<b) cout << -1 << endl;
        else cout << pos[level[a] + b - 1] << endl;
    }
    return 0;
}