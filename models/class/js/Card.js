class Card{

    constructor(image, title, date, text, form_action=[], form_name=[], button_text=[], button_class=[], button_name=[], button_value){
        
        this.image = image
        this.title = title
        this.date = date
        this.text = text
        
        this.form_action = form_action
        this.form_name = form_name

        this.button_text = button_text
        this.button_class = button_class
        this.button_name = button_name
        this.button_value = button_value

        this.div_col = document.createElement("div")
        this.div_col.classList.add("col-md-3")

        this.div_card = document.createElement("div")
        this.div_card.classList.add("card")

        this.div_card_body = document.createElement("div")
        this.div_card_body.classList.add("card-body")

    }

    deleteCard(form){

        var div_col_to_delete = this.div_col

        form.addEventListener("submit",function(e){
            
            e.preventDefault()
            if(window.confirm("Voulez vraiment supprimer cette article?")){

    
                let delete_data = new Ajax()
                delete_data.getAjax(null, form.action, [form.firstChild.name], [form.firstChild.value]) 
                
                div_col_to_delete.parentNode.removeChild(div_col_to_delete)

            }

        })
    }

    editCard(){

        let form_edit = new Form(this.form_action[1], "post", this.form_name[1])
        
        form_edit.inputFile(
            "Modifier l'image..",
            "new_article_image",
            ["custom-file", "mb-3"],
            ["custom-file-label"],
            ["custom-file-input"],
            "image/png"

        )

        form_edit.inputSelect(
            "Choisir une catégorie",
            "new_article_categorie",
           ["custom-select"],
            ["blog","puzzle"]
        )

        form_edit.inputText(
            "Nouveau nom:",
            "new_article_name",
            ["form-group"],
            ["form-control"],
            "Nouveau nom de l'article.."
            
        )

        form_edit.inputTextarea(
            "Description:",
            "new_article_description",
            ["form-group"],
            ["form-control"],
            null,
            5,
            "Description de l'article.."
        )

        form_edit.inputButton(
            "Modifier",
            this.button_name[1],
            ["btn", "btn-outline-secondary", "btn-lg"],
            this.button_value

        )

        let tmp = form_edit.createForm("form-group")

        let form_modal_edit = new Modal(
            this.form_name[1],
            ["bg-secondary"],
            "Modification",
            tmp
        )

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        })


        this.div_card_body.appendChild(form_modal_edit.createModal())

    }

    createCardForm(){

        if(this.form_action[0] && this.form_name[0] && this.button_text[0] && this.button_name[0] && this.button_class[0]){
            
            let card_link1 = new Form(this.form_action[0], "get", this.form_name[0])
            card_link1.inputButton(this.button_text[0], this.button_name[0], this.button_class[0], this.button_value)
            this.div_card_body.appendChild(card_link1.createForm(["btn-group"]))
        }

        if(this.form_action[1] && this.form_name[1] && this.button_text[1] && this.button_name[1] && this.button_class[1]){
            
            let card_link2 = document.createElement("button")
            card_link2.setAttribute("data-toggle", "modal")
            card_link2.setAttribute("data-backdrop", "static")
            card_link2.setAttribute("data-target", "#" + this.form_name[1])
            card_link2.classList.add("btn-group", this.button_class[1][0], this.button_class[1][1], this.button_class[1][2], this.button_class[1][3])
            card_link2.innerHTML = this.button_text[1]
            this.editCard()
            this.div_card_body.appendChild(card_link2)
        }

        if(this.form_action[2] && this.form_name[2] && this.button_text[2] && this.button_name[2] && this.button_class[2]){
            
            let card_link3 = new Form(this.form_action[2], "get", this.form_name[2])
            card_link3.inputButton(this.button_text[2], this.button_name[2], this.button_class[2], this.button_value)
            let form3 = card_link3.createForm(["btn-group"])
            this.deleteCard(form3)
            this.div_card_body.appendChild(form3)
        }

    }

    createCard(){

        let card_image = document.createElement("img")
        card_image.classList.add("card-img-top")
        card_image.src = this.image;

        let card_title = document.createElement("h4")
        card_title.classList.add("card-title")
        card_title.innerHTML = this.title

        let card_date = document.createElement("p")
        card_date.classList.add("text-muted")
        card_date.innerHTML = this.date
        
        let card_text = document.createElement("p")
        card_text.classList.add("card-text")
        card_text.innerHTML = this.text

        this.div_col.appendChild(this.div_card)
        this.div_card.appendChild(card_image)
        this.div_card.appendChild(this.div_card_body)
        this.div_card_body.appendChild(card_title)
        this.div_card_body.appendChild(card_date)
        this.div_card_body.appendChild(card_text)

        this.createCardForm()

        return this.div_col
    }



}