dayClasses = ["monday", "tuesday", "wednesday", "thursday", "friday"];
hourIDs = ["h8", "h83", "h9", "h93", "h10", "h103", "h11", "h113", "h12", "h123", "h1", "h13",
             "h2", "h23","h3", "h33", "h4", "h43", "h5", "h53", "h6", "h63", "h7", "h73"];
courseColors = ["#740001", "#1a472a", "#ecb939", "#2d004d","#0e1a40", "#336b87", "#763626", "#2a3132"];
courseCount = 0;

function addCourse(){
    var form = document.getElementById("add_frm");
    form.addEventListener('submit', handleForm);
    var course = (form.elements[0].value + ",   ");
    course += (form.elements[1].value + ",   ");
    course += (form.elements[2].value + " - " + form.elements[3].value);
    course += (" in " + form.elements[4].value);
    
    var ul = document.getElementById("course_list");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(course));
    li.setAttribute("class", "list-group-item"); 
    ul.appendChild(li);




}

function handleForm(event) { 
    event.preventDefault(); 
} 

function to_signin(){
    location.href = "signin.html";
}

function markCal(elements){
    var courseID = elements[0].value;
    var start = elements[1].value;
    var end = elements[2].value;
    var location = elements[3].value;
    var color = courseColors[courseCount];
    courseCount += 1;

}