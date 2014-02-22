<?php

class SyntaxHighlight {
    public static function wfSyntaxHighlight_Setup( Parser &$parser ) {
        $parser->setHook('syntaxhighlight', array('SyntaxHighlight', 'wfSyntaxHighlight'));
        return true;
    }

    public static function wfSyntaxHighlight($text, array $args, Parser $parser, PPFrame $frame) {
	$code_classes = '';
        if (isset($args['lang']) && $args['lang']) {
            $lang = $args['lang'];
            $lang = strtolower($lang);
            $code_classes = 'language-'.$lang;
        }
        if (isset($args['class']) && $args['class']) {
	    $code_classes .= ' '.$args['class'];
	}
        $text = rtrim($text);
        return '<pre><code class="'.$code_classes.'">'.$text.'</code></pre>';
    }

    public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
        $out->addModules('ext.SyntaxHighlight');
        return true;
    }
}
