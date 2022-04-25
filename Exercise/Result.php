<?php
	$error = false;
	if($_POST['yaml_input']) {
		foreach($_POST['yaml_input'] as $yaml_key => $yaml_value) {
			$$yaml_key = $yaml_value;
		}
	}
	$template = $_POST['template_input'];

	// IF - END Regular Expression
	preg_match_all('/\{{#if (.*?)\}}[\s]*?(.*)[\s]*?{{#end\}}/i', $template, $regs, PREG_PATTERN_ORDER);
	if(isset($regs[0]) && count($regs[0])) {
		for ($i = 0; $i < count($regs[0]); $i++) {
			$condition = $regs[1][$i];
			$trueval   = $regs[2][$i];
		
			if(isset($condition) && isset($$condition)) {
				$res = $$condition;
				if ($res === 'true') {
					$template = str_replace($regs[0][$i],$trueval,$template);
				} else {
					$template = str_replace($regs[0][$i],'',$template);
				}
			} else {
				$error = true;
			}
		}
	}

	// Variables Regular Expression
	preg_match_all('/\{{(.*?)\}}/i', $template, $regs, PREG_SET_ORDER);
	if(isset($regs[0]) && count($regs[0])) {
		$varname = $regs[0][1] ?? 0;
		if (isset($varname) && isset($$varname)) {
			$value = $$varname;
			$template = str_replace($regs[0][0],$$varname,$template);
		} else {
		$error = true;
		}
	}

	if($error) {
		echo 'An error occurred!';
	} else {
		echo htmlentities($template);
	}
	exit;
?>