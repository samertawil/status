/* begin block iu */
function blockUI(){
    $.blockUI({
        message: '<i class="icon-spinner4 spinner"></i>',
        //timeout: 2000, //unblock after 2 seconds
        overlayCSS: {
            backgroundColor: '#1b2024',
            opacity: 0.8,
            zIndex: 1200,
            cursor: 'wait'
        },
        css: {
            border: 0,
            color: '#fff',
            padding: 0,
            zIndex: 1201,
            backgroundColor: 'transparent'
        }
    });
}
function blockItem(item){
    $(item).block({
        message: '<i class="spinner-border text-primary"></i>',
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}
function unblockItem(item){
    $(item).unblock();
}
/* end block iu */