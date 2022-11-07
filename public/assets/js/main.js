//check if there any row input empty
function rowInputsIsEmpty(tableId,table_name) {
    var lastRow = $(tableId+' tr:last input');
    var emptyFields = 0;

    lastRow.each(function() {
        if($.trim($(this).val()) === '') {
            emptyFields += 1;
            $(this).addClass('invalid_input');
        }
    });

    return emptyFields > 0 ? true : false;
}

//add new row to table to enter data
function addNewRow(tableId,table_name) {
    var row = `<tr id="`+table_name+`NewRow" class="newRow_`+table_name+`">
        <td>` + ($(tableId+` tr`).length) + `</td>
        <td><input type="text" name="name_`+table_name+`" id="name_`+table_name+`" class="form-control" /></td>
        <td><input type="date" name="birthdate_`+table_name+`" id="birthdate_`+table_name+`" class="form-control" /></td>
        <td><input type="datetime-local" name="created_at_`+table_name+`" id="created_at_`+table_name+`" class="form-control" /></td>
        <td><button type="button" id="addIn_`+table_name+`" class="btn btn-success">Add</button></td>
        </tr>`;

        if($(tableId+' tr.newRow_'+table_name).length > 0) {
            return alert('Unable to add new row there one already');
        }
        else {
            $(tableId).append(row);
        }
}

// add row to table after enter data
function addDataRow(data, tableId) {
    var row = `<tr id="section1_row`+ data.id +`">
                <td class="text-center">` + $(tableId+' tr').length + `</td>
                <td class="text-center">` + data.name + `</td>
                <td class="text-center">` + data.birthdate + `</td>
                <td class="text-center">` + data.created_at + `</td>
                <td class="text-center">
                    <button class="btn btn-danger deleteFrom_section1" data_id="` + data.id + `"><i class="fa fa-trash"></i></button>
                </td></tr>`;

    $(tableId).append(row);
}

// store data in sections table
function storeInSection(table_name, route, token) {
    var name = $('#name_'+table_name).val();
        var birthdate = $('#birthdate_'+table_name).val();
        var created_at = $('#created_at_'+table_name).val();

        if(name === '') {
            $('#name_'+table_name).addClass('invalid_input');
        }
        else if(birthdate === '') {
            $('#birthdate_'+table_name).addClass('invalid_input');
        }
        else if(created_at === '') {
            $('#created_at_'+table_name).addClass('invalid_input');
        }
        else {
            $.ajax({
                type: 'POST',
                url: route,
                data: {
                    "_token": token,
                    "name": name,
                    "birthdate": birthdate,
                    "created_at": created_at,
                },
                success: function(response) {
                    $('.newRow_'+table_name).remove();
                    addDataRow(response.data,'#'+table_name+'Table')
                    $('#successMsg').addClass('alert');
                    $('#successMsg').text(response.message);
                },
                error: function(errors) {
                    $('#errorMsg').addClass('alert');
                    $.each(errors, function (fieldName, errorBag) {
                        let errorMessages = '';
                        // put each error message in a div
                        $.each(errorBag, function(i, message) {
                            errorMessages += '<div>'+message+'</div>';
                        });
                    });
                    $('#errorMsg').text(errorMessages)
                }
            });
        }
}

// update cells data in sections table
function updateInSection(cell, route, token) {
    var cell_name = $(cell).data("name");
    var cell_value = $(cell).text();
    var row_id = $(cell).data("id");

    if(cell_value === '') {
        $(cell).addClass('invalid_input');
    }
    else {
        $.ajax({
            type: 'POST',
            url: route,
            data: {
                "_token": token,
                cell_name: cell_name,
                cell_value: cell_value,
                "id": row_id,
            },
            success: function(response) {
                $('#successMsg').addClass('alert');
                $('#successMsg').text(response.message);
            }
        });
    }
}

// delete data from sections table
function deleteFromSection(id, table_name, route, token) {
    $.ajax({
        type: 'POST',
        url: route,
        data: {
            "_token": token,
            "id": id,
        },
        success: function(response) {
            $('#'+table_name+'_row'+ id).remove();
            $('#successMsg').addClass('alert');
            $('#successMsg').text(response.message);
        },
    });
}