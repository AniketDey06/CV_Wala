// work fields

var room = 1;
function work_fields() {

    room++;
    var objTo = document.getElementById('work_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="col-sm-4 nopadding">\
                    <div class="form-group">\
                        <input type="text" class="form-control" id="company" name="company[]"\
                            placeholder="Company Name">\
                    </div>\
                </div>\
                <div class="col-sm-4 nopadding">\
                    <div class="form-group">\
                        <input type="text" class="form-control" id="work_description" name="work_description[]"\
                            placeholder="Work Description">\
                    </div>\
                </div>\
                <div class="col-sm-4 nopadding">\
                    <div class="form-group">\
                        <div class="input-group">\
                            <input type="text" class="form-control" id="work_duration" name="work_duration[]"\
                                placeholder="Work Duration">\
                            <div class="input-group-btn">\
                                <button class="btn btn-danger" type="button" onclick="remove_work_fields(' + room + ');">\
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>\
                                </button>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <div class="clear">\
                </div>';

    objTo.appendChild(divtest)
}
function remove_work_fields(rid) {
    $('.removeclass' + rid).remove();
} 

// project_fields

var room = 1;
function project_fields() {
    room++;
    var objTo = document.getElementById('project_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="col-sm-4 nopadding">\
                    <div class="form-group">\
                    <input type="text" class="form-control" id="project" name="project[]"\
                    placeholder="Project Name">\
                    </div>\
                </div>\
                <div class="col-sm-8 nopadding">\
                    <div class="form-group">\
                        <div class="input-group">\
                        <input type="text" class="form-control" id="project_description" name="project_description[]"\
                        placeholder="Project Description">\
                            <div class="input-group-btn">\
                                <button class="btn btn-danger" type="button" onclick="remove_work_fields(' + room + ');">\
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>\
                                </button>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <div class="clear">\
                </div>';

    objTo.appendChild(divtest)
}
function remove_project_fields(rid) {
    $('.removeclass' + rid).remove();
}

// education fields

function education_fields() {
    
    if (room>=4) {
        return;
    }
    
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding">\
            <div class="form-group"> \
                <input type="text" class="form-control" id="institute" name="institute[]" placeholder="Institute Name" required>\
            </div>\
        </div>\
        <div class="col-sm-3 nopadding">\
            <div class="form-group"> \
                <input type="text" class="form-control" id="uniboard" name="uniboard[]" placeholder="University/Board" required>\
            </div>\
        </div>\
        <div class="col-sm-2 nopadding">\
            <div class="form-group"> \
                <input type="text" class="form-control" id="course" name="course[]" placeholder="Course" required>\
            </div>\
        </div>\
        <div class="col-sm-2 nopadding">\
            <div class="form-group">\
            <input type="text" class="form-control" id="marks" name="marks[]" value="" placeholder="Marks(%/CGPA)" required>\
            </div>\
        </div>\
        <div class="col-sm-2 nopadding">\
            <div class="form-group">\
                <div class="input-group">\
                    <input type="text" pattern="[0-9]{4}" class="form-control" name="course_duration[]" placeholder="Passing Year" required>\
                    <div class="input-group-btn">\
                        <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');">\
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>\
                        </button>\
                    </div>\
                </div>\
            </div>\
        </div>\
        <div class="clear">\
        </div>';

    objTo.appendChild(divtest)
    room++;
    return room;
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
    room--;
}