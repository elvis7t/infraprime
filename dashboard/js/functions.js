function del(codigo, classe, msg){
	$("<span></span>").remove();
    $("<span></span>").html("Deseja excluir "+msg+" "+codigo+"?").appendTo("#msg_conf");
	$("#confSim").attr("data-reg", codigo);
	$("#confSim").addClass(classe);
	$("#confirma").modal("show");
}

function baixa(codigo, classe, msg){
    $("<span></span>").html(msg+" "+codigo+"?").appendTo("#msg_conf");
    $("#confSim").attr("data-reg", codigo);
    $("#confSim").addClass(classe);
    $("#confirma").modal("show");
}

function notify(msg, pagina, tipo) {
    Notification.requestPermission(function() {
        var notification = new Notification(tipo, {
            icon: 'http://192.168.0.104:8080/web/images/tri_Origem.png',
            body: msg
        });
        notification.onclick = function() {
            window.open(pagina);
        }
    });
}

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover({
        html:true
    });
});
