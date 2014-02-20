# MediaWiki-SyntaxHighlight

This MediaWiki extension adds **syntaxhighlight** tag that is implemented using
[highlight.js](http://highlightjs.org/) library.

## Requirements

* MediaWiki 1.17 or above.

## Installation

1 [Download the .zip file](https://github.com/gilluminate/SyntaxHighlight/archive/master.zip)
1 Extract the files to your <code>extensions</code> directory
1 Add to the end of [LocalSettings.php](http://www.mediawiki.org/wiki/Manual:LocalSettings.php):
```php
require_once("$IP/extensions/SyntaxHighlight/SyntaxHighlight.php");
```
1 Installation can now be verified through <code>Special:Version</code> page on your wiki

## Configuration

FIXME

## License

This Extention licensed under GPL v2 License.