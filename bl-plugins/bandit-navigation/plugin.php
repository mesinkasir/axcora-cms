<?php

class pluginBanditNavigation extends Plugin {

	public function init()
	{
		// Fields and default values for the database of this plugin
		$this->dbFields = array(
			'label'=>'Navigation',
			'homeLink'=>true,
			'numberOfItems'=>5
		);
	}

	// Method called on the settings of the plugin on the admin area
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

		$html .= '<div>';
		$html .= '<label>'.$L->get('Home link').'</label>';
		$html .= '<select name="homeLink">';
		$html .= '<option value="true" '.($this->getValue('homeLink')===true?'selected':'').'>'.$L->get('Enabled').'</option>';
		$html .= '<option value="false" '.($this->getValue('homeLink')===false?'selected':'').'>'.$L->get('Disabled').'</option>';
		$html .= '</select>';
		$html .= '<span class="tip">'.$L->get('Show the home link on the sidebar').'</span>';
		$html .= '</div>';

		if (ORDER_BY=='date') {
			$html .= '<div>';
			$html .= '<label>'.$L->get('Amount of items').'</label>';
			$html .= '<input id="jsnumberOfItems" name="numberOfItems" type="text" value="'.$this->getValue('numberOfItems').'">';
			$html .= '</div>';
		}

		return $html;
	}

	// Method called on the sidebar of the website
	public function siteSidebar()
	{
		global $L;
		global $url;
		global $site;
		global $pages;

		// HTML for sidebar
		$html  = '<div class="col-md-8 p-3 plugin plugin-navigation">';

		// Print the label if not empty
		$label = $this->getValue('label');
		if (!empty($label)) {
			$html .= '<h4 class="plugin-label">'.$label.'</h4>';
		}

		$html .= '<div class="plugin-content">';
		$html .= '<div class="row">';

		// Show Home page link
		if ($this->getValue('homeLink')) {
			$html .= '<div class="col-md-4 col-6 p-1">';
			$html .= '<a class="text-dark tag" href="' . $site->url() . '"><small>' . $L->get('Home page') . '</small></a>';
			$html .= '</div>';
		}

		// Pages order by position
		if (ORDER_BY=='position') {
			// Get parents
			$parents = buildParentPages();
			foreach ($parents as $parent) {
				$html .= '<div class="col-md-4 col-6 p-1 parent">';
				$html .= '<a class="text-dark tag" href="' . $parent->permalink() . '"><small>' . $parent->title() . '</small></a>';

				if ($parent->hasChildren()) {
					// Get children
					$children = $parent->children();
					$html .= '<div class="child row">';
					foreach ($children as $child) {
						$html .= '<div class="col-md-4 col-6 p-1 child">';
						$html .= '<a class="text-dark tag" class="child" href="' . $child->permalink() . '"><small>' . $child->title() . '</a></small>';
						$html .= '</div>';
					}
					$html .= '</div>';
				}
				$html .= '</div>';
			}
		}
		// Pages order by date
		else {
			// List of published pages
			$onlyPublished = true;
			$pageNumber = 1;
			$numberOfItems = $this->getValue('numberOfItems');
			$publishedPages = $pages->getList($pageNumber, $numberOfItems, $onlyPublished);

			foreach ($publishedPages as $pageKey) {
				try {
					$page = new Page($pageKey);
					$html .= '<div class="col-md-4 col-6 p-1">';
					$html .= '<small><a class="text-dark tag" href="' . $page->permalink() . '">' . $page->title() . '</a></small>';
					$html .= '</div>';
				} catch (Exception $e) {
					// Continue
				}
			}
		}

		$html .= '</div>';
 		$html .= '</div>';
 		$html .= '</div>';

		return $html;
	}
}