$(document).ready(function() {
    var dataTable = $('#userTable').DataTable({
        columns: [
            { title: 'Name', data: 'name' },
            { title: 'Email', data: 'email' }
        ]
    });
    
    window.saveFormData = function() {
        var name = $('#name').val();
        var email = $('#email').val();

        $.ajax({
            type: 'POST',
            url: 'save_data.php',
            data: { name: name, email: email },
            success: function(response) {
                console.log(JSON.parse(JSON.stringify(response)) );             
                dataTable.clear().draw();
                dataTable.rows.add(JSON.parse(JSON.stringify(response))).draw();
                
                $('#name').val('');
                $('#email').val('');
            }
        });
    };

    $.ajax({
        type: 'GET',
        url: 'get_data.php',
        dataType: 'json', 
        success: function(response) {
            dataTable.clear().draw();
            dataTable.rows.add(JSON.parse(JSON.stringify(response))).draw();
        }
    });
    
});
