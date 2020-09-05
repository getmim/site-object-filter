<?php
/**
 * FilterController
 * @package site-object-filter
 * @version 0.0.1
 */

namespace SiteObjectFilter\Controller;


class FilterController extends \Site\Controller
{
	private function ajax($error, $data){
		$content = json_encode(['error'=>$error,'data'=>$data], JSON_PRESERVE_ZERO_FRACTION);
		$this->res->addContent($content);
		$this->res->addHeader('Content-Type', 'application/json', false);
		$this->res->addHeader('Connection', 'close');
		$this->res->addHeader('Content-Length', strlen($content));
		$this->res->send();
	}
	
	public function filterAction(){
		$result = [];

        $type = $this->req->getQuery('type');
        if(!$type)
            return $this->ajax(false, 'Type query string not provided');

        $handler = $this->config->siteObjectFilter->filters->handlers->$type ?? null;
        if(!$handler)
            return $this->ajax(true, 'Handler not found');

        $cond = $this->req->getQuery();
        if(isset($cond['query']) && !isset($cond['q']))
            $cond['q'] = $cond['query'];

        $result = $handler::filter($cond);
        if(is_null($result))
            return $this->ajax(true, $handler::lastError());

        return $this->ajax(false, $result);
    }
}