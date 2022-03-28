
var media_container = document.querySelector("section .col-4")


var form_comment = document.forms["form_comment"]



form_comment.addEventListener("submit",function(e){
   
    e.preventDefault()

    let comment = new Ajax()    
    
    comment.postAjax(
        listData,
        this.action,
        [
            "comment_article",
            "comment_button"
        ],
        
        [
            this["comment_article"].value,
            this["comment_button"].value
        ]
    )
      
})

function listData(data){

    let data_obj = JSON.parse(data)

    let media = new Media(
        data_obj["UserProfile"],
        data_obj["UserName"],
        data_obj["CommentDate"],
        data_obj["CommentText"]
    )



    media_container.insertBefore(media.createMedia(), media_container.childNodes[2])


    
}

