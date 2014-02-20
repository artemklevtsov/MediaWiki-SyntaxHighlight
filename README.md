# MediaWiki-SyntaxHighlight

This MediaWiki extension adds **syntaxhighlight** tag that is implemented using
[highlight.js](http://highlightjs.org/) library.

## Requirements

* MediaWiki 1.17 or above.

## Installation

### Step 1: Downloading

You can download the snapshot [.zip file](https://github.com/unikum/MediaWiki-SyntaxHighlight/archive/master.zip) and extract the files to your <code>extensions</code> directory.For example using wget and unzip tools:

```bash
$ cd /tmp
$ wget https://github.com/unikum/MediaWiki-SyntaxHighlight/archive/master.zip
# unqip master.zip -d $WIKIROOT/extensions/SyntaxHighlight
```

Also you can use a Git clone tool to clone https://github.com/unikum/MediaWiki-SyntaxHighlight in the extensions directory of your wiki.  For example using the Git command-line tool:

```bash
$ cd $WIKIROOT/extentions
# git clone https://github.com/unikum/MediaWiki-SyntaxHighlight SyntaxHighlight

```

### Step 2: Installation

Add this line to the end of your [LocalSettings.php](http://www.mediawiki.org/wiki/Manual:LocalSettings.php):
```php
require_once "$IP/extensions/SyntaxHighlight/SyntaxHighlight.php";
```
* Installation can now be verified through <code>Special:Version</code> page on your wiki

## Configuration

FIXME

## License

This Extention licensed under GPL v2 License.