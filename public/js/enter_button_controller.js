$(document).ready(function() {
    $("#chat-message").keydown(function(event){
        if(event.keyCode == 13) {
            console.log("TEST JS");
            document.getElementById("chat-message").value = document.getElementById("detail").value + "\n*";
        }
    })
});