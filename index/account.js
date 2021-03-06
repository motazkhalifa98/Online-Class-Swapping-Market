function setCourse(course_id, course_name, days, start_time, end_time, location){
    var text = course_id + "\n" + course_name + "\n" + location + "\n" + start_time + "-" + end_time;
    var id = getID(start_time, end_time);
    var cls = getCls(days);
    for(i=0; i<cls.length; i++){
        console.log(document.getElementById(id));
        console.log(cls[i]);
        var targetDiv = document.getElementById(id).getElementsByClassName(cls[i])[0]
        targetDiv.textContent = text;
    }
}

function getID(time){
    if(time == "8:00"){
        return "x8";
    }else if(time == "9:00"){
        return "x9";
    }else if(time == "10:00" ){
        return "x10";
    }else if(time == "11:00"){
        return "x11";
    }else if(time == "12:00"){
        return "x12";
    }else if(time == "13:00"){
        return "x13";
    }else if(time == "14:00"){
        return "x14";
    }else if(time == "15:00"){
        return "x15";
    }else if(time == "16:00"){
        return "x16";
    }else if(time == "17:00"){
        return "x17";
    }else if(time == "18:00"){
        return "x18";
    }
}

function getCls(days){
    var d = [];
    if(days.includes("M")){
        d.push("monday");
    }
    if(days.includes("T")){
        d.push("tuesday");
    }
    if(days.includes("W")){
        d.push("wednesday");
    }
    if(days.includes("Th")){
        d.push("thursday");
    }
    if(days.includes("F")){
        d.push("friday");
    }
    return d;
}

function addCourse(){
    var form = document.getElementById("add_frm");
    form.addEventListener('submit', handleForm);
    var course_id = form.elements[0].value;
    var course_name = form.elements[1].value;
    var day = form.elements[2].value;
    var start_time = form.elements[3].value;
    var end_time = form.elements[4].value
    var location = form.elements[5].value;
    setCourse(course_id, course_name, day, start_time, end_time, location);
}

function handleForm(event) { 
    event.preventDefault(); 
}