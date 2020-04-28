$(function(){
	$("#username").blur(function(){
	console.log($("#username").val());
	if($("#username").val()!==""){
		$("#usernameerr").find("p").remove();
	}else{
		$("#usernameerr").find("p").remove();
		$("#usernameerr").append("<p class='error_message'>请输入用户名</p>");
	}
	
});
	$("#password").blur(function(){
	if($("#password").val()!==""){
		$("#passworderr").find("p").remove();
	}else{
		$("#passworderr").find("p").remove();
		$("#passworderr").append("<p class='error_message'>请输入密码</p>");
	}
});
	$("#confirm").blur(function(){
	if($("#confirm").val()==""){
		$("#confirmerr").find("p").remove();
		$("#confirmerr").append("<p class='error_message'>请验证密码</p>");
	}else if($("#confirm").val()!==$("#password").val()){
		$("#confirmerr").find("p").remove();
		$("#confirmerr").append("<p class='error_message'>密码错误</p>");
	}else{
		$("#confirmerr").find("p").remove();
	}
});

	
	$("#email").blur(function(){
		var str = $("#email").val();
		var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
	if($("#email").val()==""){
		$("#emailerr").find("p").remove();
		$("#emailerr").append("<p class='error_message'>请输人邮箱</p>");
	}else if(!re.test(str) ){
		$("#emailerr").find("p").remove();
		$("#emailerr").append("<p class='error_message'>请输入正确的邮箱</p>");
	}else{
		$("#emailerr").find("p").remove();
		
	}
		
});
})
