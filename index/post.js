function makePost(){
    var form = document.getElementById("post_frm");
    form.addEventListener('submit', handleForm);
    var trade_away = document.getElementById("trade_away").value;
    var trade_for = document.getElementById("trade_for").value;
    var post = trade_away + " --> " + trade_for;
    var ul = document.getElementById("post_list");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(post));
    li.setAttribute("class", "list-group-item"); 
    ul.appendChild(li);
}

function handleForm(event) { 
    event.preventDefault(); 
} 

function to_signin(){
    location.href = "Login Page.html";
}
