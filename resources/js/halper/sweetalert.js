
const  s_alert = {
    Success,
    Warning,
    Error,
    Info,
    Confirm
};

function Success(message=null) {
    swal("Berhasil!", message, {
        icon : "success",
        buttons: {        			
            confirm: {
                className : 'btn btn-success'
            }
        },
    });
}

function Warning(message=null) {
    
}
function Error(message=null){

}
function Info(message=null){

}
function Confirm(message){
    return new Promise(function(resolve) {
    swal({
        title: 'Apakah anda yakin?',
        text: message+"!",
        type: 'warning',
        buttons:{ 			
            confirm: {
                text : 'Lanjutkan',
                className : 'btn btn-success'
            },
            cancel: {
                visible: true,
                text : 'Batal',
                className: 'btn btn-danger'
            }
        }
    }).then((response) => {
        resolve(response);
    });
});
}

export default s_alert;