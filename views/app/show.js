
let show_data = new Ajax()

show_data.getAjax(
    showData,
    "../../controllers/commands/show.php",
    ["current_page"],
    [current_page.getAttribute("value")]
)


var form_search_bar = document.forms["form_search_bar"]
form_search_bar.addEventListener("submit",function(e){

    e.preventDefault()

    let current_page = document.getElementById("current_page")
    current_page.parentNode.removeChild(current_page)
    
    clearRowChildren()

    for(var i = 0; i < pagination.length; i++){
        pagination[i].classList.add("invisible")
    }

    let search_data = new Ajax()
    search_data.getAjax(
        showData,
        this.action,
        [this["search_article"].getAttribute("id")],
        [this["search_article"].value]
    )


})



function clearRowChildren(){
    while(row.hasChildNodes()){
        row.removeChild(row.firstChild)
    }
}


function showData(data){

    let data_obj = JSON.parse(data)

    let hidden = (session.innerHTML === "ADMIN") ? "visible":"invisible";

    for(let i = 0; i < data_obj.length; i++){
        
        let article = new Card(
            data_obj[i]["ArticleImage"],
            data_obj[i]["ArticleName"],
            data_obj[i]["ArticleDate"],
            data_obj[i]["ArticleDescription"],

            [
                "../../controllers/commands/seemore.php",
                "../../controllers/commands/edit.php",
                "../../controllers/commands/delete.php"
            ],

            [
                "form_seemore_button",
                "form_edit_button",
                "form_delete_button"
            ],

            [
                "Voir plus",
                "Editer",
                "Supprimer"
            ],

            [
                ["btn", "btn-primary", "btn-sm"],
                ["btn", "btn-secondary", "btn-sm", hidden],
                ["btn", "btn-danger", "btn-sm", hidden],
            ],
            
            [
                "seemore_button",
                "edit_button",
                "delete_button"
            ],

            data_obj[i]["ArticleID"]
        )

        row.appendChild(article.createCard())
    }
    
    
}






