<?php

if (!defined('MEDIAWIKI')) {
    die();
}

// Default options
if ( ! isset($wgSyntaxHighlightStyle) ) {
    $wgSyntaxHighlightStyle = 'default';
}

$wgSyntaxHighlightCommonLanguages = array( 'apache', 'nginx', 'java', 'cs', 'cpp', 'objectivec', 'ini', 'diff', 'bash', 'makefile', 'sql', 'php', 'ruby', 'python', 'perl', 'css', 'xml', 'javascript', 'coffeescript', 'http', 'json', 'markdown' );

// Extention Credits
$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'SyntaxHighlight',
    'author' => 'Artem Klevtsov',
    'url' => 'https://github.com/unikum/MediaWiki-SyntaxHighlight',
    'version' => '0.1',
    'descriptionmsg' => 'syntaxhighlight-desc'
);

// Define localisation and body files
$wgAutoloadClasses['SyntaxHighlight'] = dirname( __FILE__ ).'/SyntaxHighlight.body.php';
$wgExtensionMessagesFiles['SyntaxHighlight'] = dirname( __FILE__ ).'/SyntaxHighlight.i18n.php';
// Register hooks
$wgHooks['ParserFirstCallInit'][] = 'SyntaxHighlight::wfSyntaxHighlight_Setup';
$wgHooks['BeforePageDisplay'][] = 'SyntaxHighlight::onBeforePageDisplay';

// ResourceLoader modules
$wgResourceModules['ext.SyntaxHighlight'] = array(
    'localBasePath' => dirname(__FILE__),
    'remoteExtPath' => 'SyntaxHighlight',
    'styles' => array('highlight.js/styles/'.$wgSyntaxHighlightStyle.'.min.css', 'ext.SyntaxHighlight.css'),
    'scripts' => array('highlight.js/highlight.min.js', 'ext.SyntaxHighlight.js')
);

// Add additional languages
if ( isset($wgSyntaxHighlightAdditionalLanguages) ) {
    if ( ! is_array($wgSyntaxHighlightAdditionalLanguages) ) {
	$wgSyntaxHighlightAdditionalLanguages = array($wgSyntaxHighlightAdditionalLanguages);
    }
    foreach( $wgSyntaxHighlightAdditionalLanguages as $language ) {
	if ( ! in_array($language, $wgSyntaxHighlightCommonLanguages) && file_exists(dirname(__FILE__).'/highlight.js/languages/'.$language.'.js') ) {
	    $wgResourceModules['ext.SyntaxHighlight']['scripts'][] = 'highlight.js/languages/'.$language.'.min.js';
	}
    }
}
