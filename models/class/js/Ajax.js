class Ajax extends XMLHttpRequest{

    getAjax(getfunction, url, name=[], value=[]){

        this.onreadystatechange = function(){

            if(this.readyState === 4 && this.status === 200){
                
                if(getfunction){

                    getfunction(this.responseText)
                }
                
            }

        }

        if(name != null && value != null){

            // this.open("GET",url + "?" + name + "=" + value + "&", true)
            // this.open("GET",url + "?" + name + "=" + value, true)
            let query = "";
            for(var i = 0; i < name.length; i++){
                query += name[i] + "=" + value[i] + "&"
            }

            this.open("GET",url + "?" + query, true)

        }

        else{

            this.open("GET",url, true)

        }

        this.send()
            
    }


    postAjax(postfunction, url, name=[], value=[]){
        
        this.onreadystatechange = function(){

            if(this.readyState === 4 && this.status === 200){
                
                if(postfunction){

                    postfunction(this.responseText)
                }
            }

        }
        this.open("POST", url, true)
        
        this.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        let query = "";
        for(var i = 0; i < name.length; i++){
            query += name[i] + "=" + value[i] + "&"
        }

        this.send(query);

    }

}