

var loaderCircle = '<div class="spinner-layer spinner-red">\n' +
    '        <div class="circle-clipper left">\n' +
    '          <div class="circle"></div>\n' +
    '        </div><div class="gap-patch">\n' +
    '          <div class="circle"></div>\n' +
    '        </div><div class="circle-clipper right">\n' +
    '          <div class="circle"></div>\n' +
    '        </div>\n' +
    '      </div>';

var loaderHorizontal = '<div class="progress">\n' +
    '      <div class="indeterminate"></div>\n' +
    '  </div>';

function extractError(error) {
    for(var error_log in error.response.data.errors) {
        var err = error.response.data.errors[error_log];
        toastr.error(err);
    }
}

function buttonClicked(button_id,button_text,option){
    if(option === 1){
        var appendInfo = '<i class="fa fa-spinner fa-spin"></i> Loading...';
        $('#'+button_id).html(appendInfo);
        $('#'+button_id).prop('disabled',true);
    }else if(option === 0){
        var appendInfo = button_text;
        $('#'+button_id).html(appendInfo);
        $('#'+button_id).prop('disabled',false);
    }

}

function buttonClassClicked(button_class,button_text,option){
    if(option === 1){
        var appendInfo = '<i class="fa fa-spinner fa-spin"></i> Loading...';
        $('.'+button_class).html(appendInfo);
        $('.'+button_class).prop('disabled',true);
    }else if(option === 0){
        var appendInfo = button_text;
        $('.'+button_class).html(appendInfo);
        $('.'+button_class).prop('disabled',false);
    }

}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function validateFormWithIds(ids) {
    if (Array.isArray(ids))
    {
        for(var i=0; i<ids.length; i++)
        {
            var result = 0;
            if($("#"+ids[i]).val() == "" || $("#"+ids[i]).val() == null)
            {
                $("#"+ids[i]).css("border-color", "red");
                result++;
            }else{
                $("#"+ids[i]).css("border-color", "green");
            }
        }
        if (result > 0){
            toastr["error"]("Please fill all highlighted field(s)");
            return false;
        }
    }else if(typeof ids === 'string')
    {
        if($("#"+ids).val() == "" || $("#"+ids).val() == null)
        {
            $("#"+ids).css("border-color", "red");
        }
        toastr["error"]("Please fill the highlighted field");
        return false;
    }
    return true;
}

function validateFormWithClasses(classes) {
    if (Array.isArray(classes))
    {
        for(var i=0; i < classes.length; i++)
        {
            var result = 0;
            if($("."+classes[i]).length > 1){
                $("."+classes[i]).each(function() {
                    if($(this).val() === "" || $(this).val() === null)
                    {
                        $(this).css("border-color", "red");
                        result++;
                    }else{
                        $(this).css("border-color", "green");
                    }
                });
                if (result > 0){
                    toastr.error("Please fill all highlighted field(s)");
                    return false;
                }
            }else{
                if($("."+classes[i]).val() === "" || $("."+classes[i]).val() === null)
                {
                    $("."+classes[i]).css("border-color", "red");
                    result++;
                }else{
                    $("."+classes[i]).css("border-color", "green");
                }
                if (result > 0){
                    toastr.error("Please fill all highlighted field(s)");
                    return false;
                }
            }

        }

    }else if(typeof classes === 'string')
    {
        if($("."+classes).length > 1){
            $("."+classes).each(function() {
                if($(this).val() === "" || $(this).val() === null)
                {
                    $(this).css("border-color", "red");
                    result++;
                }else{
                    $(this).css("border-color", "green");
                }
            });
            if (result > 0){
                toastr.error("Please fill all highlighted field(s)");
                return false;
            }
        }else{
            if($("."+classes).val() === "" || $("."+classes).val() === null)
            {
                $("."+classes).css("border-color", "red");
                toastr.error("Please fill all highlighted field(s)");
                return false;
            }else{
                $("."+classes).css("border-color", "green");
            }

        }
    }
    return true;
}



$('form').submit(function() {
    $(this).find('button[type="submit"]').prop('disabled','disabled').html('<i class="fa fa-spinner fa-spin fa-fw"></i> Loading...');
});

