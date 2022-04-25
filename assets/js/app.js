$(document).ready(function(){
	$(".btn-submit").click(function(){
		var template_input = $('#template_input').val(),	
			yaml_input = $('#yaml_input').val();
		
		if(template_input && yaml_input) {
			if(yaml_input.indexOf(': ') !== -1) {
				yaml_input = jsyaml.load(yaml_input);
			} else {
				yaml_input = yaml_input.replace(":", ": ");
				yaml_input = jsyaml.load(yaml_input);
			}

			if(template_input.indexOf('{{ ') !== -1) {
				template_input = template_input.replace(/{{ /g, "{{");
			}
			if(template_input.indexOf(' }}') !== -1) {
				template_input = template_input.replace(/ }}/g, "}}");
			}
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