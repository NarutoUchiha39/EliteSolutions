import heapq
from typing import List
from collections import *


class Solution:
    def minCostConnectPoints(self, points: List[List[int]]) -> int:
        graph = defaultdict(list)
        for i in range(len(points)):
            x = points[i][0]
            y = points[i][1]
            for j in range(i + 1, len(points)):
                cost = abs(x - points[j][0]) + abs(y - points[j][1])
                graph[i].append([cost, j])
                graph[j].append(([cost, i]))

        visited = []
        length = len(points)
        heap = [[0, 0]]
        tot = 0
        while len(visited) < length:
            temp = heapq.heappop(heap)
            coordinate = temp[1]
            cost = temp[0]
            if coordinate not in visited:
                tot += cost
                visited.append(coordinate)
                for i in graph[coordinate]:
                    if i[1] not in visited:
                        heapq.heappush(heap, i)

        return tot
