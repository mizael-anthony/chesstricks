

let show_puzzles = new Ajax()
show_puzzles.getAjax(
    showPuzzle,
    "../../controllers/docs/show_puzzles.php",
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
        showPuzzle,
        "../../controllers/docs/search_puzzles.php",
        [this["search_article"].getAttribute("id")],
        [this["search_article"].value]
    )


})




function showPuzzle(data){
    
    let data_obj = JSON.parse(data)

    let hidden = (session.innerHTML === "ADMIN") ? "visible":"invisible"
    let hide_solution = (session.innerHTML === "ADMIN" || session.innerHTML === "USER" ) ? "visible":"invisible" 
    
    for(var i = 0; i < data_obj.length; i++){

        let puzzle = new Card(
            data_obj[i]["ArticleImage"],
            data_obj[i]["ArticleName"],
            data_obj[i]["ArticleDate"],
            null,

            [
                "#",
                "../../controllers/commands/edit.php",
                "../../controllers/commands/delete.php"
            ],

            [

                "null",
                "form_puzzle_edit_button",
                "form_puzzle_delete_button"
            ],

            [
                null,
                "Editer",
                "Supprimer"
            ],

            [
                [],
                ["btn", "btn-secondary", "btn-sm", hidden],
                ["btn", "btn-danger", "btn-sm", hidden],
            ],

            [
                "null",
                "edit_button",
                "delete_button"
            ],

            data_obj[i]["ArticleID"]


        )

        let collapse = new Collapse(
            "data" + data_obj[i]["ArticleID"],
            "Voir solution",
            ["btn", "btn-success", "btn-sm", hide_solution],
            data_obj[i]["ArticleDescription"]
            
        )

        let card = puzzle.createCard();
        let last_element_of_card_body = card.childNodes[0].childNodes[1]
        last_element_of_card_body.appendChild(collapse.createCollapse())

        row.appendChild(card)

    }


}

function clearRowChildren(){
    while(row.hasChildNodes()){
        row.removeChild(row.firstChild)
    }
}