<?php

class qa_html_theme_layer extends qa_html_theme_base
{

	public function head_metas()
	{
		qa_html_theme_base::head_metas();
		if ($this->template === 'question') {
			$this->output('<meta property="og:site_name" content="'.qa_opt('site_title').'"/>');
			$pagetitle = strlen($this->request) ? strip_tags(@$this->content['title']) : '';
			$this->output('<meta property="og:title" content="'.$pagetitle.'"/>');
			$this->output('<meta property="og:type" content="article"/>');
			$url = $this->content['q_view']['url'];
			$this->output('<meta property="og:url" content="'.$url.'"/>');
			$image = $this->get_image_url();
			if (strlen($image)) {
				$this->output('<meta property="og:image" content="'.$image.'"/>');
			}
			if (strlen(@$this->content['description'])) {
				$this->output('<meta property="og:description" content="'.$this->content['description'].'"/>');
			} else {
				$this->output('<meta property="og:description" content="'.$this->get_content_description().'"/>');
			}
		}
	}

	private function get_image_url()
	{
		$content = $this->content['q_view']['raw']['content'];
		preg_match("/<img.+?src=\"(.+?)\".+?>/", $content, $matches);
		return $matches[1];
	}

	private function get_content_description()
	{
		$content = $this->content['q_view']['raw']['content'];
		$format = $this->content['q_view']['raw']['format'];
		return qa_html(qa_shorten_string_line(qa_viewer_text($content, $format), 150));
	}

}
