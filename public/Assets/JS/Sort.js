function search() 
{
    let table = document.querySelector("table")
    let rows = table.rows
    let value = document.querySelector("#text").value

    for (let index = 1; index < rows.length; index++) 
    {
        if(rows[index].cells[3].textContent.toLowerCase().indexOf(value.toLowerCase())>-1)
        {
            rows[index].style.display=''
        }
        else
        {
            rows[index].style.display='none'
        }
        
    }
    
}

function filter()
{
    let easy = []
    let medium = []
    let hard = []
    let table = document.querySelector("table")
    let rows = table.rows

    for (let index = 1; index < rows.length; index++) 
    {
        if(rows[index].cells[4].textContent.toLowerCase()=="easy")
        {
            easy.push(rows[index].innerHTML)
        }
        if(rows[index].cells[4].textContent.toLowerCase()=="medium")
        {
            medium.push(rows[index].innerHTML)
        }

        if(rows[index].cells[4].textContent.toLowerCase()=="hard")
        {
            hard.push(rows[index].innerHTML)
        }
        
    }

    let Index = 1
    
   
    for (let index = 0; index < easy.length; index++) 
    {
        rows[Index].innerHTML = easy[index]
        Index+=1
    }

    for (let index = 0; index < medium.length; index++) 
    {
       
        rows[Index].innerHTML = medium[index]
        Index+=1
    }



    for (let index = 0; index < hard.length; index++) 
    {
        rows[Index].innerHTML = hard[index]
        Index+=1
    }

 
   

    
}