var img = document.createElement("img");

let form_upload = document.forms["form_upload"];
form_upload["article_image"].addEventListener("change",function(){
    let form_modal_upload = document.getElementById("form_modal_upload")
    preview_image(this, "#" + form_modal_upload.id + " " + ".container-fluid");

});


let form_subscribe = document.forms["form_subscribe"]
form_subscribe["user_profile"].addEventListener("change", function(){
    let form_modal_subscribe = document.getElementById("form_modal_subscribe")
    preview_image(this, "#" + form_modal_subscribe.id + " " + ".container-fluid");

});


var preview_image = function(form, modal){

    if(form.files[0]){
        
        var div_modal_body = document.querySelector(modal);

        var readfile = new FileReader();
        readfile.readAsDataURL(form.files[0]);
        readfile.addEventListener("load", function(){
            img.src = this.result;
            img.classList.add("img-fluid", "mx-auto", "d-block");            
            div_modal_body.appendChild(img);
        });
    }
};


$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
})



