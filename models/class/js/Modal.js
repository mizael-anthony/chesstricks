class Modal{

    constructor(id, header_color, heard_text, form){
        this.id = id
        this.header_color = header_color
        this.heard_text = heard_text
        this.form = form

        this.div_modal = document.createElement("div")
        this.div_modal.id = this.id
        this.div_modal.classList.add("modal", "fade")

        this.div_modal_dialog = document.createElement("div")
        this.div_modal_dialog.classList.add("modal-dialog")

        this.div_modal_content = document.createElement("div")
        this.div_modal_content.classList.add("modal-content")

        this.div_modal_header = document.createElement("div")
        this.div_modal_header.classList.add("modal-header", this.header_color)
    
        this.div_modal_body = document.createElement("div")
        this.div_modal_body.classList.add("modal-body")
    }

    createModal(){

        let text_header = document.createElement("h4")
        text_header.classList.add("container", "text-white", "text-center")
        text_header.innerHTML = this.heard_text

        let close_button = document.createElement("button")
        close_button.classList.add("close")
        close_button.setAttribute("data-dismiss", "modal")
        close_button.innerHTML = "&times;"

        let div_preview = document.createElement("div")
        div_preview.classList.add("container-fluid")

        
        this.div_modal.appendChild(this.div_modal_dialog)
        this.div_modal_dialog.appendChild(this.div_modal_content)
        this.div_modal_content.appendChild(this.div_modal_header)
        this.div_modal_header.appendChild(text_header)
        this.div_modal_header.appendChild(close_button)
        this.div_modal_content.appendChild(this.div_modal_body)
        this.div_modal_body.appendChild(div_preview)
        this.div_modal_body.appendChild(this.form)


        return this.div_modal


    }

}