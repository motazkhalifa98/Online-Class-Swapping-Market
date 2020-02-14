function addCourse(){
    var form = document.getElementById("add_frm");
    form.addEventListener('submit', handleForm);
    var course = (form.elements[0].value + "   ");
    course += (form.elements[1].value + "   ");
    course += (form.elements[2].value + " - " + form.elements[3].value);
    
    var ul = document.getElementById("course_list");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(course));
    li.setAttribute("class", "list-group-item"); 
    ul.appendChild(li);
}

function handleForm(event) { 
    event.preventDefault(); 
} 