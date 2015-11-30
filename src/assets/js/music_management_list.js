/**
 * Created by alanlucian on 11/29/15.
 */
(function($) {
    $(".delete").click(function(e){
        console.log("clocked");

        if(!confirm("Deseja realmente deletar essa música?")){
            e.preventDefault();
        }

    });

    $("#gender-filter").change(function(){
        window.location.href = BASE_URL + "/MusicManagement/?genre_id="+ $("#gender-filter").val();
    });
})(jQuery);