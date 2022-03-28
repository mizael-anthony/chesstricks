

class Collapse{

    constructor(id, label, bouton_class=[], content){
        
        this.id = id
        this.label = label
        this.bouton_class = bouton_class
        this.content = content

        this.div_container = document.createElement("div")
    }

    createCollapse(){

        let collapse_bouton = document.createElement("button")

        for(let i = 0; i < this.bouton_class.length; i++){
            collapse_bouton.classList.add(this.bouton_class[i])
        }

        collapse_bouton.setAttribute("data-toggle","collapse")
        collapse_bouton.setAttribute("data-target", "#" + this.id)
        collapse_bouton.innerHTML = this.label

        let div_collapse = document.createElement("div")
        div_collapse.id = this.id
        div_collapse.classList.add("collapse")
        div_collapse.innerHTML = this.content


        this.div_container.appendChild(collapse_bouton)
        this.div_container.appendChild(div_collapse)
        return this.div_container

    }
}