$(document).ready(function(){
	$(".btn-submit").click(function(){
		var template_input = $('#template_input').val(),	
			yaml_input = $('#yaml_input').val();
		
		if(template_input && yaml_input) {
			yaml_input = jsyaml.load(yaml_input);
			$.ajax({
				url: 'Exercise/Result.php',
				type: 'POST',
				data: {
					template_input: template_input,
					yaml_input: yaml_input
				},
				dataType: 'text',
				success: function (data) {
					$('#output').show();
					$('#output-content').text(data);
				},
				error: function() {
					$('#output-content').text('An error occurred');
				}
			});
		}
	});
});