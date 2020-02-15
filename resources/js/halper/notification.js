
const  notif = {
    show,
    type :{
        DEFAULT   : {class : 'default',icon : 'fa fa-archive'},
        PRIMARY   : {class : 'primary',icon : 'fa fa-bookmark'},
        SECONDARY : {class : 'secondary',icon : 'fa fa-flag'},
        INFO      : {class : 'info',icon : 'fa fa-info'},
        SUCCESS   : {class : 'success',icon : 'fa fa-check'},
        WARNING   : {class : 'warning',icon : 'fa fa-exclamation-circle'},
        DANGER    : {class : 'danger',icon : 'fa fa-times'},
    },
    title:{
        SUBMIT    : 'SUBMIT',
        ERROR     : "ERROR",
        UPDATE    : "UPDATE",
        DELETE    : "DELETE",
        INFO      : "INFO"
    }
};

function show(message,type=notif.type.DEFAULT,title=null) {
    
    $.notify({
        // options
        icon: type.icon,
        title: title,
        message: message,
       // url: 'https://github.com/mouse0270/bootstrap-notify',
        //target: '_blank'
    },{
         // settings
        element: 'body',
        position: null,
        type: type.class,
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
            from: "bottom",
            align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        timer: 1000,
       // url_target: '_blank',
        mouse_over: null,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
        ,
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
			'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
			'<span data-notify="icon"></span> ' +
			'<span data-notify="title">{1}</span> ' +
			'<span data-notify="message">{2}</span>' +
			'<div class="progress" data-notify="progressbar">' +
			'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
			'</div>' +
			'<a href="{3}" target="{4}" data-notify="url"></a>' +
			'</div>'
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

export default notif;