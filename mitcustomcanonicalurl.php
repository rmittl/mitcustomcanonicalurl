<?php


defined('_JEXEC') or die;


class plgSystemMitcustomcanonicalurl extends JPlugin
{
	
    public function onAfterDispatch()
    {
        $app = JFactory::getApplication();
        $doc = JFactory::getDocument();
        $uri =  clone JUri::getInstance();
		$uri = $uri->toString();

		$urls = $this->params->get('mit_custom_canonical_urls', false);
		$arrayUrls = explode(",\r\n", $urls);
		
		$cannonicalUrl = array();

		foreach ($arrayUrls as $url){
			$canonicalUrl[] = JURI::root() .$url;
		}
	
		foreach ($canonicalUrl as $link){
			if ($link === $uri){
				$doc->addHeadLink($uri, 'canonical');
			}
		}
    }
}

      



