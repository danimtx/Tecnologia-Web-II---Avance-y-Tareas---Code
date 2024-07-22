void Dijkstra(vector<ll>& dist, vector<vector<pair<int, int>>>& graph, int 
start){ 
    priority_queue<pair<long long, int>, vector<pair<long long, int>>, 
greater<pair<long long, int>>> pq; 
    //priority_queue<pair<ll, int>> pq; 
    dist[start] = 0; 
    pq.push({0, start}); 
 
    while (!pq.empty()) { 
        int node = pq.top().second; 
        ll x = pq.top().first; 
        pq.pop(); 
 
        if (x != dist[node]) continue; 
 
        for (auto [next, cost] : graph[node]) { 
            if (dist[next] > dist[node] + cost) { 
                dist[next] = dist[node] + cost; 
                pq.push({dist[next], next}); 
            } 
        } 
    } 
} 
