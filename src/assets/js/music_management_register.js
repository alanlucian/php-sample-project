/**
 * Created by alanlucian on 11/29/15.
 */

(function($) {

    /*   PRETTY  FILE UPLOAD     */

    $("#fileUploadClick").click(function(e){
        e.preventDefault();

        $("#fileInput").trigger("click");

        $("#fileInput").change(function(){

            var fileData = $(this).val().split(/[\\]/);

            $("#fileName").html(  fileData[fileData.length-1]);
            $("input[name='title']").val(  fileData[fileData.length-1].split(".")[0]);
        });
    });


    /* AUTO-COMPLETE */
    var cache = {};

    $(".dinamic_autocomplete").each(function(){

        var fieldName = $(this).attr("name");
        var valueTarget = $(this) ;
        var id_field = $( "input[name='"+ fieldName + "_id']" );
        $(this).focus(function(){
            id_field.val("");
        });
        $(this).autocomplete({
            minLength: 1,
            source: function( request, response ) {
                var dependency = valueTarget.data("dependency");
                console.log(dependency);
                if(dependency  != null ){
                    request.dependencyData = $( "input[name='"+ dependency + "']").val();
                }
                var term = request.term;
                if ( cache[fieldName] != undefined && term in cache[fieldName] ) {
                    response( cache[fieldName][ term ] );
                    return;
                }
                request.fieldName = fieldName;
                $.getJSON( BASE_URL + "/MusicManagement/listFieldOptions/", request, function( data, status, xhr ) {
                    if(cache[fieldName] == undefined){
                        cache[fieldName] = {};
                    }
                    cache[fieldName][ term ] = data;
                    console.log(data);
                    response( data );
                });
            },
            select: function( event, ui ) {
                valueTarget.val(ui.item.name);
                id_field.val(ui.item.id);
                return false;
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<a>" +  item.name+ "</a>" )
                .appendTo( ul );
        };
    });

    $( "input[name='genre']" )

})(jQuery);