<?php
/**
 * Gallery Connector
 *
 * Copyright 2010 by Shaun McCormick <shaun@modx.com>
 *
 * This file is part of Gallery.
 *
 * Gallery is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Gallery is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Gallery; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package gallery
 */
/**
 * Gallery Connector
 *
 * @package gallery
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$galleryCorePath = $modx->getOption('gallery.core_path',null,$modx->getOption('core_path').'components/gallery/');
require_once $galleryCorePath.'model/gallery/gallery.class.php';
$modx->gallery = new Gallery($modx);

$modx->lexicon->load('gallery:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->gallery->config,$galleryCorePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));