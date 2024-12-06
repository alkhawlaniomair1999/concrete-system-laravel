$(document).ready(function(){
    $(document).on('click','#update_image',function(e){
        e.preventDefault();
        if(!$('#logo_gen').lenght){
    $("#oldimage").after('<input type="file" name="logo_gen" id="logo_gen"> ');
    $("#update_image").hide();
    $("#cancel_update_image").show();
    //$("#oldimage").after('<input type="file" name="logo_gen" id="logo_gen"> ');
    
    }
    return false;
    });
    $(document).on('click','#cancel_update_image',function(e){
        e.preventDefault();
        
    $("#update_image").show();
    $("#cancel_update_image").hide();
    $("#oldeimage").html(' ');
    $("#logo_gen").hide();
    
    return false;
    });
    
    });