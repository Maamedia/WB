<?php
# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}
$wgShowExceptionDetails = true; 
$wgDebugToolbar = true;
$wgDebugDumpSql = true;
$wgShowSQLErrors = true;
$wgShowDBErrorBacktrace = true;

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Data-Wiki";
$wgMetaNamespace = "Data-Wiki";
$wgScriptPath = "";
$wgArticlePath = "/wiki/$1";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://data.maantietaja.org";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ '1x' => "$wgResourceBasePath/resources/assets/wiki.png" ];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "wiki@maantietaja.org";
$wgPasswordSender = "wiki@maantietaja.org";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "localhost";
$wgDBname = "maantiet_mw19416";
$wgDBuser = "maantiet_mw19416";
$wgDBpassword = $DBpass;

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale. This should ideally be set to an English
## language locale so that the behaviour of C library functions will
## be consistent with typical installations. Use $wgLanguageCode to
## localise the wiki.
$wgShellLocale = "en_US.utf8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php

$wgLanguageCode = "en";

$wgSecretKey = "xxxx";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "xxxx";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";
/*
# Enabled skins.
# The following skins were automatically enabled:
*/
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );

wfLoadExtension('UniversalLanguageSelector');
wfLoadExtension( 'Babel' );
wfLoadExtension( 'cldr' );
wfLoadExtension( 'OATHAuth' );
wfLoadExtension( 'EntitySchema' );
// wfLoadExtension( 'WikidataOrg' );
// wfLoadExtension( 'WikibaseLexemeCirrusSearch' );
// wfLoadExtension( 'WikibaseQualityConstraints' );
wfLoadExtension( 'WikibaseLexeme' );
$wgLexemeLanguageCodePropertyId = [
	'default' => 'P220',
];
// wfLoadExtension( 'PropertySuggester' );
// require_once "$IP/extensions/PropertySuggester/PropertySuggester.php";
$wgPropertySuggesterDeprecatedIds = [
143,
];
$wgPropertySuggesterMinProbability = [ 0,05, ];
$wgPropertySuggesterClassifyingPropertyIds = [ 31, 279 ];
$wgPropertySuggesterInitialSuggestions = [ 694 ];

# End of automatically generated settings.
$baseNs = 100;
define( 'WB_NS_ITEM', $baseNs );
define( 'WB_NS_ITEM_TALK', $baseNs + 1 );
define( 'WB_NS_PROPERTY', $baseNs + 2 );
define( 'WB_NS_PROPERTY_TALK', $baseNs + 3 );
define( 'WB_NS_LEXEME', $baseNs + 4 );
define( 'WB_NS_LEXEME_TALK', $baseNs + 5 );
// TODO the query namespace is not actually used in prod. Remove me?
define( 'WB_NS_QUERY', $baseNs + 6 );
define( 'WB_NS_QUERY_TALK', $baseNs + 7 );

$wgExtraNamespaces[WB_NS_ITEM] = 'Item';
$wgExtraNamespaces[WB_NS_ITEM_TALK] = 'Item_talk';
$wgExtraNamespaces[WB_NS_PROPERTY] = 'Property';
$wgExtraNamespaces[WB_NS_PROPERTY_TALK] = 'Property_talk';
# Assigning the correct entity types to the namespaces
$wgWBRepoSettings['entityNamespaces']['item'] = WB_NS_ITEM;
$wgWBRepoSettings['entityNamespaces']['property'] = WB_NS_PROPERTY;
$wgWBRepoSettings['formatterUrlProperty'] = 'P5';

$wgWBRepoSettings['propertyOrderUrl'] = $wgServer . '/w/index.php?title=MediaWiki:Wikibase-SortedProperties&action=raw&sp_ver=1';

# Making the namespaces searched by default
$wgNamespacesToBeSearchedDefault[WB_NS_ITEM] = true;
$wgNamespacesToBeSearchedDefault[WB_NS_PROPERTY] = true;
$wgWBRepoSettings['statementSections'] = array(
        'item' => array(
                'statements' => null,
                'identifiers' => array(
                        'type' => 'dataType',
                        'dataTypes' => array('external-id'),
                ),
        ),
);

$wgLocalDatabases = $wgWBRepoSettings['localClientDatabases'] = [ 'maantiet_mw19416', 'maantiet_mw19416' ];



# Assigning the correct entity types to the namespaces
$wgWBRepoSettings['entityNamespaces']['item'] = NS_MAIN; 
$wgWBRepoSettings['entityNamespaces']['property'] = WB_NS_PROPERTY;
# Add more configuration options below.
$wgEnableWikibaseRepo = true;
$wgEnableWikibaseClient = false;
wfLoadExtension( 'WikibaseClient', "$IP/extensions/Wikibase/extension-client.json" );
require_once "$IP/extensions/Wikibase/client/ExampleSettings.php";
require_once "$IP/extensions/Wikibase/client/WikibaseClient.php";
wfLoadExtension( 'WikibaseRepository', "$IP/extensions/Wikibase/extension-repo.json" );
require_once "$IP/extensions/Wikibase/repo/Wikibase.php";
require_once "$IP/extensions/Wikibase/repo/ExampleSettings.php";
$wgWBClientSettings['repoUrl'] = 'https://wikidata.org';
$wgWBClientSettings['repoScriptPath'] = '';
$wgWBClientSettings['repoArticlePath'] = '/wiki/$1';
$wgWBClientSettings['siteLinkGroups'] = [ 'mywikigroup' ];
$wgWBClientSettings['siteGlobalID'] = 'en';
$wgWBClientSettings['repositories'] = [
		'' => [
			'repoDatabase' => 'maantiet_mw19416',
			'baseUri' => 'https://data.maantietaja.org/entity',
			'entityNamespaces' => [
				'item' => WB_NS_ITEM,
				'property' => WB_NS_PROPERTY
			],
			'prefixMapping' => [ '' => '' ],
		]
	];

# next config
$wmgWikibaseUseSSRTermbox = true;
if ( $wmgShowWikidataInWatchlist ) {
	$wgDefaultUserOptions['wlshowwikibase'] = 1;
} else {
	$wgDefaultUserOptions['wlshowwikibase'] = 0;
}
if ( !empty( $wmgUseWikibaseRepo ) ) {
	wfLoadExtension( 'WikibaseRepository', "$IP/extensions/Wikibase/extension-repo.json" );
	if ( !empty( $wmgUseWikibaseWikidataOrg ) ) {
		wfLoadExtension( 'Wikidata.org' );
	}
	if ( !empty( $wmgUseWikibasePropertySuggester ) ) {
		wfLoadExtension( 'PropertySuggester' );
	}
	if ( !empty( $wmgUseWikibaseQuality ) ) {
		wfLoadExtension( 'WikibaseQualityConstraints' );
	}
	if ( !empty( $wmgUseWikibaseLexeme ) ) {
		wfLoadExtension( 'WikibaseLexeme' );
	}
	if ( !empty( $wmgUseWikibaseMediaInfo ) ) {
		wfLoadExtension( 'WikibaseMediaInfo' );
		$wgWBRepoSettings['enableEntitySearchUI'] = false;
	}
	if ( !empty( $wmgUseWikibaseCirrusSearch ) ) {
		wfLoadExtension( 'WikibaseCirrusSearch' );
	}
	if ( !empty( $wmgUseWikibaseLexemeCirrusSearch ) ) {
		wfLoadExtension( 'WikibaseLexemeCirrusSearch' );
	}
}

if ( $wmgUseWikibaseRepo ) {
	if ( $wgDBname === 'maantiet_mw19416' ) {
		// Disable Special:ItemDisambiguation on wikidata.org T195756, T271389
		$wgSpecialPages['ItemDisambiguation'] = DisabledSpecialPage::getCallback( 'ItemDisambiguation' );
	}
}

// $wgUseWikibaseCirrusSearch = true;
