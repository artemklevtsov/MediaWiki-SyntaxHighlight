<?php

if (!defined('MEDIAWIKI')){
    die();
}

// Default options
if (! isset($wgSyntaxHighlightStyle)) {
    $wgSyntaxHighlightStyle = 'idea';
}

$wgSyntaxHighlightStyleFile = 'highlight/styles/'.$wgSyntaxHighlightStyle.'.css';

// Define localisation and body files
$wgAutoloadClasses['SyntaxHighlight'] = dirname( __FILE__ ).'/SyntaxHighlight.body.php';
$wgExtensionMessagesFiles['SyntaxHighlight'] = dirname( __FILE__ ).'/SyntaxHighlight.i18n.php';

// Extention Credits
$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'SyntaxHighlight',
    'author' => 'Artem Klevtsov',
    'url' => 'https://github.com/unikum/MediaWiki-SyntaxHighlight',
    'version' => '0.1',
    'descriptionmsg' => 'syntaxhighlight-desc'
);

// Register parser hook
$wgHooks['ParserFirstCallInit'][] = 'SyntaxHighlight::wfSyntaxHighlight_Setup';

// Register before display hook
$wgHooks['BeforePageDisplay'][] = 'SyntaxHighlight::onBeforePageDisplay';

// ResourceLoader modules
$wgResourceModules['ext.SyntaxHighlight'] = array(
    'localBasePath' => dirname(__FILE__),
    'remoteExtPath' => 'SyntaxHighlight',
    'styles' => array($wgSyntaxHighlightStyleFile, 'style.css'),
    'scripts' => array('highlight/highlight.pack.js', 'init.js')
);
