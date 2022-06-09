<?php
namespace Opencart\Install\Controller\Install;
class Step4 extends \Opencart\System\Engine\Controller {
	public function index(): void {
		$this->load->language('install/step_4');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_step_4'] = $this->language->get('text_step_4');
		$data['text_catalog'] = $this->language->get('text_catalog');
		$data['text_admin'] = $this->language->get('text_admin');
		$data['text_extension'] = $this->language->get('text_extension');
		$data['text_featured'] = $this->language->get('text_featured');

		$data['text_mail'] = $this->language->get('text_mail');
		$data['text_mail_description'] = $this->language->get('text_mail_description');

		$data['text_facebook'] = $this->language->get('text_facebook');
		$data['text_facebook_description'] = $this->language->get('text_facebook_description');
		$data['text_facebook_visit'] = $this->language->get('text_facebook_visit');

		$data['text_forum'] = $this->language->get('text_forum');
		$data['text_forum_description'] = $this->language->get('text_forum_description');
		$data['text_forum_visit'] = $this->language->get('text_forum_visit');

		$data['text_commercial'] = $this->language->get('text_commercial');
		$data['text_commercial_description'] = $this->language->get('text_commercial_description');
		$data['text_commercial_visit'] = $this->language->get('text_commercial_visit');

		$data['button_mail'] = $this->language->get('button_mail');

		$data['error_warning'] = $this->language->get('error_warning');

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, 'https://ocstore.com/index.php?route=extension/json/extensions&version=' . urlencode(VERSION)."&version=". urlencode($this->config->get('language_code')));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);

		$output = curl_exec($curl);

		if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
			$response = $output;
		} else {
			$response = '';
		}

		curl_close($curl);

		$data['promotion'] = json_decode($response, true);

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('install/step_4', $data));
	}


}
