
"""Topological sorting is the type of sorting in which the relative ordering of the elements should remain same.In
this sorting we basically finish those task that are independent(no incoming edges) ad then proceed to finish other
tasks that become independent on removal of th parent task The topological sort is valid only for DAG(Directed
Acyclic Graph) The graph needs to be directed and acyclic because otherwise the relative ordering won't remain same.(
e.g. :1->2->3->1 implies 1 should come before and after 3 which can't happen). Kahn's Algorithm states that we should
Do plain BFS search on the graph and at each stage remove those nodes that have zero indegree. But first we
need to put that element in the beginning which has zero indegree since it is independent of others .After that put
those elements that are connected with the node with zero indegree. We just subtract 1 from the total indegrees of
the various nodes attached to the node with zero indegree. For that purpose we use BFS traversal. After that we check
if any node has zero indegree after subtracting the indegree, then we push it to the queue and continue our BFS
Topological sort video: https://www.youtube.com/watch?v=cIBFEhD77b4"""

from collections import *

vertices, edges = input().split()
edges = int(edges)
vertices = int(vertices)
inDegree = {(i + 1): 0 for i in range(vertices)}
graph = defaultdict(list)
vertices = int(vertices)
for i in range(edges):
    k, j = input().split(" ")
    graph[int(k)].append(int(j))
    inDegree[int(j)] += 1

queue = []
for i in inDegree:
    if (inDegree[i] == 0):
        queue.append(i)
res = []
while (queue):
    element = queue.pop(0)
    res.append(element)
    for i in graph[element]:
        inDegree[i] -= 1
        if (inDegree[i]) == 0:
            queue.append(i)
for i in res:
    print(i, "", end="")
