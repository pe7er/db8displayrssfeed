<?php

/**
 * @package	mod_db8displayrssfeed
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 * @Note        RSSFeed code based on the work of c.bavota http://bavotasan.com/2010/display-rss-feed-with-php/
 */
defined('_JEXEC') or die;

/**
 * Helper for mod_db8displayrssfeed
 *
 * @package     Joomla.Site
 * @subpackage  mod_db8displayrssfeed
 */
abstract class modDb8displayrssfeedHelper {

    /**
     * Retrieves a formatted date
     *
     * @param JParameter Module parameters
     * @return a string 
     */
    public static function getRssFeed(&$params) {
        // Get user + time zone configuration
        $config = JFactory::getConfig();
        $user = JFactory::getUser();

        $feed_url = $params->get('feed_url');
        $rss = new DOMDocument();
        $rss->load($feed_url);

        $feed = array();
        $cnt = 0;

        foreach ($rss->getElementsByTagName('item') as $node) {
            if ($cnt == $params->get('count') && $params->get('count') > 0) {
                break;
            }

            $item = array(
                'title' => str_replace(' & ', ' &amp; ', $node->getElementsByTagName('title')->item(0)->nodeValue),
                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => date($params->get('dateformat', 'd F Y'), strtotime($node->getElementsByTagName('pubDate')->item(0)->nodeValue))
            );
            array_push($feed, $item);
            $cnt++;
        }
        return($feed);
    }

}
