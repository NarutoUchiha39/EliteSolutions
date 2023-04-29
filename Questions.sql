
-- Fractional Knap Sack: 
 insert into questions(DESCRIPTION,title,category,difficulty) values("Given weights and values of N items, we need to put these items in a knapsack of capacity W to get the maximum total value in the knapsack.
     Note: Unlike 0/1 knapsack, you are allowed to break the item.
    
    
    
     Example 1:
    
     Input:
     N = 3, W = 50
     values[] = {60,100,120}
     weight[] = {10,20,30}
     Output:
     240.00
     Explanation:Total maximum value of item
     we can have is 240.00 from the given
     capacity of sack.
    
     Example 2:
    
     Input:
     N = 2, W = 50
     values[] = {60,100}
     weight[] = {10,20}
     Output:
     160.00
     Explanation:
     Total maximum value of item
     we can have is 160.00 from the given
     capacity of sack.
    
    
    
     Your Task :
     Complete the function fractionalKnapsack() that receives maximum capacity , array of structure/class and size n and returns a double value representing the maximum value in knapsack.
     Note: The details of structure/class is defined in the comments above the given function.
    
    
     Expected Time Complexity : O(NlogN)
     Expected Auxilliary Space: O(1)",
     "Fractional Knapsack1",
     "Greedy",
     "Medium");


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


-- Bellman Ford Algorithm
-- insert into questions(DESCRIPTION,title,category,difficulty) VALUES("Given a weighted, directed and connected graph of V vertices and E edges, Find the shortest distance of all the vertex's from the source vertex S.
-- Note: If the Graph contains a negative cycle then return an array consisting of only -1.

-- Example 1:

-- E = [[0,1,9]]
-- S = 0
-- Output:
-- 0 9
-- Explanation:
-- Shortest distance of all nodes from
-- source is printed.


-- E = [[0,1,5],[1,0,3],[1,2,-1],[2,0,1]]
-- S = 2
-- Output:
-- 1 6 0
-- Explanation:
-- For nodes 2 to 0, we can follow the path-
-- 2-0. This has a distance of 1.
-- For nodes 2 to 1, we cam follow the path-
-- 2-0-1, which has a distance of 1+5 = 6,


-- Your Task:
-- You don't need to read input or print anything. Your task is to complete the function bellman_ford( ) which takes a number of vertices V and an E-sized list of lists of three integers where the three integers are u,v, and w; denoting there's an edge from u to v, which has a weight of w and source node S as input parameters and returns a list of integers where the ith integer denotes the distance of an ith node from the source node.

-- If some node isn't possible to visit, then its distance should be 100000000(1e8). Also, If the Graph contains a negative cycle then return an array consisting of only -1.

--  

-- Expected Time Complexity: O(V*E).
-- Expected Auxiliary Space: O(V).
-- ","Bellman Ford Algorithm","Graphs","Medium")





---Alien Dictionary

-- INSERT into questions(DESCRIPTION,title,category,difficulty) values("Given a sorted dictionary of an alien language having N words and k starting alphabets of standard dictionary. Find the order of characters in the alien language.
-- Note: Many orders may be possible for a particular test case, thus you may return any valid order and output will be 1 if the order of string returned by the function is correct else 0 denoting incorrect string returned.


-- Example 1:

-- Input: 
-- N = 5, K = 4
-- dict = {'baa','abcd','abca','cab','cad'}
-- Output:
-- 1
-- Explanation:
-- Here order of characters is 
-- 'b', 'd', 'a', 'c' Note that words are sorted 
-- and in the given language 'baa' comes before 
-- 'abcd', therefore 'b' is before 'a' in output.
-- Similarly we can find other orders.

-- Example 2:

-- Input: 
-- N = 3, K = 3
-- dict = {'caa','aaa','aab'}
-- Output:
-- 1
-- Explanation:
-- Here order of characters is
-- 'c', 'a', 'b' Note that words are sorted
-- and in the given language 'caa' comes before
-- 'aaa', therefore 'c' is before 'a' in output.
-- Similarly we can find other orders.

--  

-- Your Task:
-- You don't need to read or print anything. Your task is to complete the function findOrder() which takes  the string array dict[], its size N and the integer K as input parameter and returns a string denoting the order of characters in the alien language.


-- Expected Time Complexity: O(N * |S| + K) , where |S| denotes maximum length.
-- Expected Space Compelxity: O(K)
-- ",
-- "Alien Dictionary",
-- "Topological Sorting",
-- "Hard") 