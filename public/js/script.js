"use strict";

$(document).ready(function() {
    var message = $('#message');
    var upload = $('#upload');

    upload.change(function() {
        var file_data = upload.prop('files')[0];   
        var form_data = new FormData();    
        form_data.append('file', file_data);                            
        $.ajax({
            url: './app/controller/Upload_process.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            beforeSend:function(){
                message.html('<i class="fa fa-cog fa-spin"></i> Please Wait...').addClass('alert alert-success').removeClass('alert-danger'); ;
            },
            success: function(data){
                if ( data==2 ) {
                    message.html("Invalid file!");
                } else if( data==3 ){
                    message.html("File contain error!");
                } else{
                    message.html( data + " is uploaded");
                }
            },
            error:function()
            {
                message.html('<i class="fa fa-times"></i> Please Try Again').addClass('alert alert-danger');
                setInterval(function () { 
                  history.go(0);
                }, 2000);
            }
        });
    });    

    //setupForm
    var form    = $('#setupForm');
    form.submit(function(e) {
        e.preventDefault();
        $.ajax({
            url     : form.attr('action'),                      
            type    : form.attr('method'),
            dataType: "json",   
            data    : form.serialize(),
            beforeSend:function(){
                message.html('<i class="fa fa-cog fa-spin"></i> Please Wait...').addClass('alert alert-success').removeClass('alert-danger'); ;
            },
            success: function(data){
                if (data.status === false) {
                  message.html(data.exception).addClass('alert alert-danger').removeClass('alert-success');
                } else if (data.status === true) {
                    document.location = '?step=complete&email='+$("#email").val();
                }
            },
            error:function()
            {
                message.html('<i class="fa fa-times"></i> Please Try Again').addClass('alert alert-danger');
                setInterval(function () { 
                  // history.go(0);
                }, 2000);
            }
        }); 

    });
 
});


$(window).load(function() {
    var message = $('#completeMessage');
    var browse  = $('#browse');
    message.html('<i class="fa fa-cog fa-spin"></i> Please Wait...');
    setInterval(function () { 
        $.ajax({
            url     :'?method=complete&email=' + $("input[name='server_email']").val(),                      
            type    : 'get',
            dataType: "text",  
            beforeSend:function(){
                message.html('<i class="fa fa-cog fa-spin"></i> Please Wait...').addClass('alert alert-success').removeClass('alert-danger'); ;
            },
            success: function(data){
                if(data == "success") {
                     message.html('<i class="fa fa-check"></i> Install Successfully!');
                    browse.removeClass('hidden');
                }
            },
            error:function()
            {
                message.html('<i class="fa fa-times"></i> Please Try Again').addClass('alert alert-danger');
                setInterval(function () { 
                  // history.go(0);
                }, 2000);
            }
        }); 
    }, 15000);
     
    

});