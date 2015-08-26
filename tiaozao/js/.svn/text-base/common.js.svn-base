// JavaScript Document
$(function(){
	$("#data-loading").hide();
});
function showOk(text,callback){
	$("#loading-text").html(text).removeClass("loading").removeClass("error").addClass("ok");
	$("#data-loading").show();
	if (callback){callback();}
	hideText("#data-loading");
}
function showError(text,callback){
	$("#loading-text").html(text).removeClass("loading").removeClass("ok").addClass("error");
	$("#data-loading").show();
	if (callback){callback();}
	hideText("#data-loading");
}
function loading(text){
	if (text==false){
		$("#data-loading").hide();
	}else{
		$("#loading-text").html(text).removeClass("error").removeClass("ok").addClass("loading");
		$("#data-loading").show();
	}
}
function hideText(code){
	setTimeout(function(){$(code).hide()},2000);
}
