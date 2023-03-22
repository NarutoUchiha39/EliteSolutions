insert INTO questions(DESCRIPTION,title,category,difficulty) values(
    "Given a weighted, undirected and connected graph of V vertices and an adjacency list adj where adj[i] is a list of lists containing two integers where the first integer of each list j denotes there is edge between i and j,second integers corresponds to the weight of that edge .You are given the source vertex S and You to Find the shortest distance of all the vertex's from the source vertex S.You have to return a list of integers denoting shortest distance between each node and Source vertex S.

    Note: The Graph doesn't contain any negative weight cycle.

    Example 1:

    Input:
    V = 2
    adj [] = {{{1, 9}}, {{0, 9}}}
    S = 0
    Output:
    0 9

    Explanation:
    The source vertex is 0. Hence, the shortest 
    distance of node 0 is 0 and the shortest 
    distance from node 1 is 9.
    
    Your Task:
    You don't need to read input or print anything. Your task is to complete the function dijkstra()  which takes the number of vertices V and an adjacency list adj as input parameters and Source vertex S returns a list of integers, where ith integer denotes the shortest distance of the ith node from the Source node. Here adj[i] contains a list of lists containing two integers where the first integer j denotes that there is an edge between i and j and the second integer w denotes that the weight between edge i and j is w.
    ",
    "Djiktra's Algorithm",
    "Graph",
    "Easy"
)