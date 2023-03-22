# Time Complexity of Graph Algorithms :
+ ***Dijkstra's Algorithm :***
Single Source shortest path algorithm
works for directed and non directed graphs. Gives shortest distance between Source node and a target node or between source node and all other nodes. Can be implemented using heaps and without heaps <br><br>
***Time Complexity :*** O ( V<sup>2</sup> ) without heaps.<br>
By using heaps the time complexity reduces to E * (logv)<br>
1) We have V vertices then for each vertex we have to do he following: ( extract min vertex from heap + for each extracted vertex traverse its edges and add them to the min heap )
<br>

2) Next, we have to find all the vertices that have not been visited yet and push it into the min heap E * log( heap size ). Here E can be V as each Vertice can be connected to every other vertice in the graph. Therefore the total time complexity now is V * ( log( heap size ) + E * log( heap size ) ) = V * ( (E+1) log( heap size ) ) = V * V * log( heap size )
<br>
3) Now for the heap size, for he first element the number of comparisons is suppose V ( worst case ). For the next vertex the total number of comparisons will be V-1 ( 1 vertex got selected above ). Therefore the total number of elements in heap : V + V-1 + . . . . . sum of natural numbers roughly V^2. 
<br>
4) Now the total time complexity thus becomes V<sup>2</sup> * log( V ). V<sup>2</sup> can also be written as E ( For connected graphs ) So Final time complexity: O( E* log(V) )  
