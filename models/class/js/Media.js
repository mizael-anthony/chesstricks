

class Media{

    constructor(image, name, date, text){
        this.image = image
        this.name = name
        this.date = date
        this.text = text

        this.div_media = document.createElement("div")
        this.div_media.classList.add("media")

        this.div_media_body = document.createElement("div")
        this.div_media_body.classList.add("media-body")
    }

    createMedia(){

        let media_image = document.createElement("img")
        media_image.classList.add("mr-3", "mt-3", "rounded-circle")
        media_image.src = this.image
        media_image.width = 100
        

        let media_name = document.createElement("h4")
        media_name.innerHTML = this.name
        let media_date = document.createElement("small")
        media_date.classList.add("text-muted")
        media_date.innerHTML = this.date
        media_name.appendChild(media_date)

        let media_text = document.createElement("p")
        media_text.innerHTML = this.text

        this.div_media.appendChild(media_image)
        this.div_media.appendChild(this.div_media_body)
        this.div_media_body.appendChild(media_name)
        this.div_media_body.appendChild(media_text)

        return this.div_media


    }
}