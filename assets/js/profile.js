$(function () {

    $("body").on("click", "button.edit", function () {
        var el = $(this);
        var fieldname = el.attr("data-fieldname");
        var data = {fieldname: fieldname};
        $.post(baseUrl + "ajax/profile_data_edit.php", data, function (response) {
            var parsedData = JSON.parse( response );
            if ( parsedData.status ) {
                el.parents("div.row[data-fieldname='"+ fieldname +"']").html( parsedData.view );
            } else if ( parsedData.message ) {
                alert( parsedData.message );
            }
        })
    });
    
    $("body").on("click", "button.save", function () {
        var el = $(this);
        var fieldname = el.attr("data-fieldname");
        if ( fieldname == "gender" ) {
            var inputValue = el.parents("div.row[data-fieldname='"+ fieldname +"']").find("input:checked").val();
        } else 
            var inputValue = el.parents("div.row[data-fieldname='"+ fieldname +"']").find("input").val();
        var data = {fieldname: fieldname, inputValue: inputValue};
        $.post(baseUrl + "ajax/profile_data_save.php", data, function (response) {
            var parsedData = JSON.parse( response );
            if ( parsedData.status ) {
                el.parents("div.row[data-fieldname='"+ fieldname +"']").html( parsedData.view );
            } else if ( parsedData.message ) {
                alert( parsedData.message );
            }
        })
    });

});