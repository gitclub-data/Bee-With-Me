$.ajax({
		url:'logs.php',
		data:'usname='+$('#div1').html()+'&sname='+$('#div2').html(),
		success:function(data){
		$('#chatlog').html(data).delay(200);
		}
	});



