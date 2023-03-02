<?php

class pluginBlugerTags extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'label'=>'Tags'
		);
	}

	public function form()
	{
		global $L;

		$html  = '<div class="alert alert-primary" role="alert">';
		$html .= $this->description();
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('Label').'</label>';
		$html .= '<input id="jslabel" name="label" type="text" value="'.$this->getValue('label').'">';
		$html .= '<span class="tip">'.$L->get('This title is almost always used in the sidebar of the site').'</span>';
		$html .= '</div>';

		return $html;
	}

	public function siteSidebar()
	{
		global $L;
		global $tags;
		global $url;

		$filter = $url->filters('tag');

		$html  = '<div class="col-md-8 p-3 plugin plugin-tags">';
		$html .= '<h4>'.$this->getValue('label').'</h4>';
		$html .= '<div class="plugin-content">';
		$html .= '';

		// By default the database of tags are alphanumeric sorted
		foreach( $tags->db as $key=>$fields ) {
			$html .= ' <small>';
			$html .= '<a href="'.DOMAIN_TAGS.$key.'">';
			$html .= $fields['name'];
			$html .= '</a> ';
			$html .= '</small>';
		}

		$html .= '';
 		$html .= '</div>';
 		$html .= '</div>';

		return $html;
	}
}