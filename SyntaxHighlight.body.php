<?php

class SyntaxHighlight {
    public static function wfSyntaxHighlight_Setup( Parser &$parser ) {
        $parser->setHook('syntaxhighlight', array('SyntaxHighlight', 'wfSyntaxHighlight'));
        return true;
    }

    public static function wfSyntaxHighlight( $text, array $args, Parser $parser, PPFrame $frame ) {
	$code_classes = '';
	
        if ( isset($args['lang']) && $args['lang'] ) {
            $lang = $args['lang'];
            $lang = strtolower($lang);
            $code_classes = 'language-'.$lang;
        }

        if ( isset($args['class']) && $args['class'] ) {
	    $code_classes .= ' '.$args['class'];
	}
	// Replace all '&', '<,' and '>' with their HTML entitites. Order is important. You have to do '&' first.
	$text = str_replace('&', '&amp;', $text);
	$text = str_replace('<', '&lt;', $text);
	$text = str_replace('>', '&gt;', $text);
	// Strip whitespace (or other characters) from the end of a string
	$text = rtrim($text);
        return '<pre class="mw-hljs"><code class="'.$code_classes.'">'.$text.'</code></pre>';
    }

    public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
        $out->addModules('ext.SyntaxHighlight');
        return true;
    }
}
