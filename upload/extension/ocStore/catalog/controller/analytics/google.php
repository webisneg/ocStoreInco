<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

namespace Opencart\Catalog\Controller\Extension\ocStore\Analytics;
class Google extends \Opencart\System\Engine\Controller {
    public function index($status = false) {
		if ($status) {
			return html_entity_decode($this->config->get('analytics_google_code'), ENT_QUOTES, 'UTF-8');
		} else {
			return '';
		}
	}
}