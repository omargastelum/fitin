$(document).ready(function() {
    var initialValue = '';
    var type = $('#type').val();
    console.log(type);

    function edit() {
        $('.edit').click(function() {
            $(this).addClass('editMode');
        });
    
        $('.edit').focus(function() {
            initialValue = $(this).text();
        });
    
        $('.edit').focusout(function() {
            $(this).removeClass('editMode');
            var value = $(this).text();
            var field = $(this).attr('id').split('-')[0];
            var id = $(this).attr('id').split('-')[1];
    
            console.log(field);
    
            if (value != '') {
    
                $.ajax({
                    url: 'index.php?'+ type +'/edit',
                    type: 'POST',
                    data: {
                        id: id,
                        field: field,
                        value: value
                    }
                });
    
            } else {
                $(this).text(initialValue);
            }
        });
    }

    function del() {
        $('.deleteBtn').click(function() {
            var id = $(this).attr('id').split('-')[1];
            var row = $(this).parent().parent();
        
            $.ajax({
                url: 'index.php?'+ type +'/delete',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data, textStatus, jqXHR) {
                    row.remove();
                }
            });
        });
    }

    edit();
    del();

    $('.createBtn').click(function() {
        var data = {};
        $('#createTable').each(function() {
            var inputs = $(this).find(':input');
            
            console.log(inputs);
            for (var i = 1; i < inputs.length; i++) {
                console.log(inputs[i].value);
                data[inputs[i].id] = inputs[i].value;
                inputs[i].value = '';
            }
            
        });
        console.log(data);
        $.ajax({
            url: 'index.php?'+ type +'/create',
            type: 'POST',
            data: data,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                var type;
                var parsedData = JSON.parse(data);
                var lastItem = parsedData[parsedData.length - 1];
                var tableBody = $('#tableBody');
                var row = '';
                var tableRow = tableBody.children()[0].children;

                row += '<tr>';
                row += '<td scope="row">' + lastItem['id'] +'</td>';
                row += '<td scope="row"><button id="deleteBtn-'+ lastItem['id'] +'" class="deleteBtn btn btn-danger btn-sm">Delete</button></td>';
                for (var i = 2; i < tableRow.length; i++) {
                    if (tableRow[i].className == 'editable') {
                        type = tableRow[i].firstChild.id.split('-')[0];
                        row += '<td><div contenteditable="true" class="edit" id="'+ type +'-'+ lastItem['id'] +'">'+ lastItem[type] +'</div></td>';
                    } else {
                        type = tableRow[i].firstChild.id;
                        row += '<td>'+ lastItem[type] +'</td>';
                    }
                }
                

                tableBody.append(row);
                console.log(parsedData[parsedData.length - 1]);

                edit();
                del();
            }
        });
    });

    
});



