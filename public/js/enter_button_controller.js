$(document).ready(function() {
    $("#chat-message").keydown(function(event){
        if(event.keyCode == 13) {
            document.getElementById("chat-message").value = document.getElementById("detail").value + "\n*";
        }
    })
});