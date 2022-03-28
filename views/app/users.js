
let subscribed_users = document.getElementById("subscribed_users")

function showUser(data){

    while(row.hasChildNodes()){
        row.removeChild(row.firstChild)
    }


    let data_obj = JSON.parse(data)

    for(let i = 0; i < data_obj.length; i++){
        
        let user = new Card(
            data_obj[i]["UserProfile"],
            data_obj[i]["UserName"],
            null,
            data_obj[i]["UserEmail"],
            data_obj[i]["ArticleID"]
        )

        row.appendChild(user.createCard())
    }
    
    
}


    

if(subscribed_users){

    subscribed_users.addEventListener("click", function(e){
        
        e.preventDefault()
    
        let current_page = document.getElementById("current_page")
        current_page.innerHTML = "Mes abonnées"
        
        clearRowChildren()
    
        for(var i = 0; i < pagination.length; i++){
            pagination[i].classList.add("invisible")
        }
        
        let subscribed = new Ajax()
    
        subscribed.getAjax(showUser, this.href)
        
    })
}
else{
    console.log("empty");
}






