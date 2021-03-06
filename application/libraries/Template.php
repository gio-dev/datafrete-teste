<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	var $template_data = array();

	function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}

	//Carrega o template do ADM
	
	function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
	{
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		return $this->CI->load->view($template, $this->template_data, $return);
	}

	//Carrega o template do site
	function load_principal($template = '', $view = '' , $view_data = array(), $return = FALSE){
		
		$this->CI =& get_instance();
		
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		
		return $this->CI->load->view($template, $this->template_data, $return);
	}

	
	function load_main($view = '', $view_data = array(), $return = FALSE)
	{
		$this->load('template', $view, $view_data, $return);
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php
 *
*  http://jeromejaglale.com/doc/php/codeigniter_template
*/