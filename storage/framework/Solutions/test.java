import java.util.*;
class Item {
    int value, weight;
    Item(int x, int y){
        this.value = x;
        this.weight = y;
    }
}


class test
{
    //Function to get the maximum total value in the knapsack.
    static double fractionalKnapsack(int W, Item arr[], int n) 
    {
        int totalWeight = 0;
        Double tottalProfit = 0.0;
        TreeMap<Double,Integer> ProfitByWeight = new TreeMap<>();
        for(int i=0;i<arr.length;i++)
        {
            ProfitByWeight.put(Double.valueOf(arr[i].value)/Double.valueOf(arr[i].weight),arr[i].weight);
        }
        System.out.println(ProfitByWeight.toString());
        while(!ProfitByWeight.isEmpty())
        {
            if(totalWeight<W){
            Map.Entry<Double,Integer> val = ProfitByWeight.pollLastEntry();
            totalWeight+=val.getValue();
            tottalProfit+=val.getValue()*val.getKey();}
            else
            {

                Map.Entry<Double,Integer> val = ProfitByWeight.pollLastEntry();
                tottalProfit+=val.getValue()*W;
                break;
            }
        }
        
        return tottalProfit;


        
    }

    public static void main(String[] args) {
        
    }
}