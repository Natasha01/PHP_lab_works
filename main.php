<?php	

	class content {
		var $vars = array();
		var $content;

		function set($name, $value) {
			$this->vars[$name] = $value;
		}
  
		function out_content($tpl) {
			$this->content = file_get_contents($tpl);
			foreach ($this->vars as $key => $value) {
				$this->content = str_replace($key, $value, $this->content);		  
			}  
			echo $this->content;
		}
  
	}

	$content = new content();
