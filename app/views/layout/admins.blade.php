<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admins</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/admins.css') }}
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>

</head>
<body>
{{ HTML::script('js/jquery1.js') }}
    <section class="top"></section>
    <div class="banner">
       <ul>
        <li>*ADMIN</li>
        <li>@yield('banner')</li>
       </ul>

    </div>
	@yield('errors')
	
	<div class="nav">
		@yield('nav')
	</div>

	<div class="content">
		@yield('content')
	</div>


	<div class="footer">
		
	</div>


<!--<script>
		$(document).ready(function(){

			var info = $('.info');
			
			$('form').submit(function(e){
				e.preventDefault();

				var formData = new FormData();
				formData.append('message',$('#message').val());

				$.ajax({
					url:'email',
					method:'post',
					processData:false,
					contentType:false,
					cache:false,
					dataType: 'json',
					data: formData,
					success:function(data){
						info.hide().find('ul').empty();
						if(!data.success){
							$.each(data.errors,function(index, error){
								info.find('ul').append('<li>'+error+'</li>');
							});
							info.slideDown();
						}else{
							info.find('ul').append('<li>ITS WORKING</li>');
							info.slideDown();
						}
					},
					error:function(){}

				});

			});

		});		
	</script>
-->
</body>
</html>