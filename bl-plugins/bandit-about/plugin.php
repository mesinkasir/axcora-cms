<?php

class pluginBanditAbout extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'label'=>'Bandit About',
			'text'=>''
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
		$html .= '<input name="label" type="text" value="'.$this->getValue('label').'">';
		$html .= '<span class="tip">'.$L->get('This title is almost always used in the sidebar of the site').'</span>';
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('BanditAbout').'</label>';
		$html .= '<textarea name="text" id="jstext">'.$this->getValue('text').'</textarea>';
		$html .= '</div>';

		return $html;
	}

	public function siteSidebar()
	{
		$html  = '<div class=" col-md-8 p-3 plugin plugin-bandit-about">';
		$html .= '<h3><strong>'.$this->getValue('label').'</strong></h3>';
		$html .= '<div class="plugin-content">';
		$html .= html_entity_decode(nl2br($this->getValue('text')));
 		$html .= '</div>';
 		$html .= '</div>';

		return $html;
	}
}