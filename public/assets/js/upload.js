(function( $ ) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.fn.upload = function () {
        var $el = $(this);
        var ext = $el.attr('data-ext');
        var callback = $el.attr('data-callback');
        if(!ext) ext="";
        new ss.SimpleUpload({
            button: $el.get(0),
            url: '/upload',
            allowedExtensions: ext.split(','),
            name: 'userfile',
            multipart: true,
            multiple: false,
            responseType: 'json',
            data:{'_token':token},
            onComplete: function( filename, response )
            {
                if(response.status!=200)
                {
                    alert(response.message);
                    return false;
                }
                else
                {
                    window[callback](response,$el);
                }
            }
        });
    }
    if($('.upload').length > 0){
        $('.upload').each(function(i,element){
            $(element).upload();
        });
    }
}( jQuery ));