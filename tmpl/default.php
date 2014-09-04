<?php
/**
 * @package	mod_db8displayrssfeed
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;
?>
<div class="rssfeed<?php echo $moduleclass_sfx; ?>">
    <?php foreach ($list as $item) : ?>
        <p>
            <a href="<?php echo $item['link']; ?>" title="<?php echo $item['title']; ?>" <?php if ($params->get('new_window') == 1) { ?>target="_blank"<?php } ?>>
                <?php echo $item['title']; ?>
            </a>
            <?php if ($params->get('display_date') == 1) { ?>
                <small><?php echo $item['date']; ?></small>
            <?php } ?>
            <?php if ($params->get('display_desc') == 1) { ?>
                <small><?php echo $item['desc']; ?></small>
            <?php } ?>
        </p>
    <?php
endforeach;


