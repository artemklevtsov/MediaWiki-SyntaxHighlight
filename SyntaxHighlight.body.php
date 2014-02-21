<?php

class SyntaxHighlight {
    public static function wfSyntaxHighlight_Setup( Parser &$parser ) {
        $parser->setHook('syntaxhighlight', array('SyntaxHighlight', 'wfSyntaxHighlight'));
        return true;
    }

    public static function wfSyntaxHighlight($text, array $args, Parser $parser, PPFrame $frame) {
        if (isset($args['lang']) && $args['lang']) {
            $lang = $args['lang'];
            $lang = strtolower( $lang );
            $class = 'language-'.$lang; 
        } else {
            $class = "no-highlight";
        }
        $text = rtrim( $text );
        $text = htmlspecialchars( $text );
        $text = str_replace( '|', '&#124;', $text );
        return '<pre><code class="'.$class.'">'.$text.'</code></pre>';
    }

    public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
        $out->addModules('ext.SyntaxHighlight');
        return true;
    }
    
    public static function wfStyleFile() {
	global $wgSyntaxHighlightStyle;
	$wgSyntaxHighlightStyleFile = 'highlight/styles/'.$wgSyntaxHighlightStyle.'.css';
    }
    
}
