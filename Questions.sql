
-- Fractional Knap Sack: 
--  insert into questions(DESCRIPTION,title,category,difficulty) values("Given weights and values of N items, we need to put these items in a knapsack of capacity W to get the maximum total value in the knapsack.
--      Note: Unlike 0/1 knapsack, you are allowed to break the item.
    
    
    
--      Example 1:
    
--      Input:
--      N = 3, W = 50
--      values[] = {60,100,120}
--      weight[] = {10,20,30}
--      Output:
--      240.00
--      Explanation:Total maximum value of item
--      we can have is 240.00 from the given
--      capacity of sack.
    
--      Example 2:
    
--      Input:
--      N = 2, W = 50
--      values[] = {60,100}
--      weight[] = {10,20}
--      Output:
--      160.00
--      Explanation:
--      Total maximum value of item
--      we can have is 160.00 from the given
--      capacity of sack.
    
    
    
--      Your Task :
--      Complete the function fractionalKnapsack() that receives maximum capacity , array of structure/class and size n and returns a double value representing the maximum value in knapsack.
--      Note: The details of structure/class is defined in the comments above the given function.
    
    
--      Expected Time Complexity : O(NlogN)
--      Expected Auxilliary Space: O(1)",
--      "Fractional Knapsack",
--      "Greedy",
--      "Medium");


--- Prim's Algorithm
-- insert into questions(DESCRIPTION,title,category,difficulty) values("Given a weighted, undirected and connected graph of V vertices and E edges. The task is to find the sum of weights of the edges of the Minimum Spanning Tree.

-- Example 1:

-- Input:
-- 3 3
-- 0 1 5
-- 1 2 3
-- 0 2 1

-- Output:
-- 4

-- Your task:
-- Since this is a functional problem you don't have to worry about input, you just have to complete the function  spanningTree() which takes number of vertices V and an adjacency matrix adj as input parameters and returns an integer denoting the sum of weights of the edges of the Minimum Spanning Tree. Here adj[i] contains a list of lists containing two integers where the first integer a[i][0] denotes that there is an edge between i and a[i][0][0] and second integer a[i][0][1] denotes that the distance between edge i and a[i][0][0] is a[i][0][1].

-- In other words , adj[i][j] is of form  { u , wt } . So,this denotes that i th node is connected to u th node with  edge weight equal to wt.

--  

-- Expected Time Complexity: O(ElogV).
-- Expected Auxiliary Space: O(V2).
-- ",
--      "Minimum Spanning Tree",
--      "Greedy",
--      "Medium");

