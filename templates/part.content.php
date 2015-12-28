<?php
/**
 * @var $_ array
 */
/**
 * @var $l OC_L10N
 */
script(
	$_['appName'],
	[
		'app',
		'gallery',
		'galleryutility',
		'galleryconfig',
		'galleryinfobox',
		'galleryview',
		'breadcrumb',
		'galleryalbum',
		'galleryrow',
		'galleryimage',
		'thumbnail',
		'vendor/modified-eventsource-polyfill/eventsource-polyfill',
		'eventsource',
		'vendor/owncloud/share',
		'vendor/commonmark/dist/commonmark.min',
		'vendor/dompurify/src/purify',
		'vendor/bigshot/bigshot-compressed',
		'slideshow',
		'slideshowcontrols',
		'slideshowzoomablepreview',
		'upload-helper'
	]
);
script(
	'files',
	[
		'upload',
		'file-upload',
		'jquery.fileupload',
		'jquery.iframe-transport'
	]
);

style(
	$_['appName'],
	[
		'styles',
		'share',
		'mobile',
		'github-markdown',
		'slideshow',
		'gallerybutton'
	]
);
style(
	'files',
	[
		'upload'
	]
);
?>
<div id="controls">
	<div id='breadcrumbs'></div>
	<div class="left">
		<!-- sorting buttons -->
		<div id="sort-date-button" class="button sorting right-switch-button">
			<div class="flipper">
				<img class="svg asc front" src="<?php print_unescaped(
					image_path($_['appName'], 'dateasc.svg')
				); ?>" alt="<?php p($l->t('Sort by date')); ?>"/>
				<img class="svg des back" src="<?php print_unescaped(
					image_path($_['appName'], 'datedes.svg')
				); ?>" alt="<?php p($l->t('Sort by date')); ?>"/>
			</div>
		</div>
		<div id="sort-name-button" class="button sorting left-switch-button">
			<div class="flipper">
				<img class="svg asc front" src="<?php print_unescaped(
					image_path($_['appName'], 'nameasc.svg')
				); ?>" alt="<?php p($l->t('Sort by name')); ?>"/>
				<img class="svg des back" src="<?php print_unescaped(
					image_path($_['appName'], 'namedes.svg')
				); ?>" alt="<?php p($l->t('Sort by name')); ?>"/>
			</div>
		</div>
	</div>
	<div id="uploadprogresswrapper">
		<div id="uploadprogressbar"></div>
		<button class="stop icon-close" style="display:none">
			<span class="hidden-visually">
				<?php p($l->t('Cancel upload')) ?>
			</span>
		</button>
	</div>
	<span class="right">
		<!-- sharing button -->
		<div id="share-button" class="button">
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/share.svg')
			); ?>" alt="<?php p($l->t("Share")); ?>"/>
		</div>
		<a class="share" data-item-type="folder" data-item=""
		   title="<?php p($l->t("Share")); ?>"
		   data-possible-permissions="31"></a>
		<!-- info button -->
		<div id="album-info-button" class="button">
			<span class="ribbon black"></span>
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/info.svg')
			); ?>" alt="<?php p($l->t('Album information')); ?>"/>
		</div>
		<div class="album-info-container">
			<div class="album-info-loader"></div>
			<div class="album-info-content markdown-body"></div>
		</div>
		<!-- toggle for opening the current album as file list -->
		<div class="button view-switcher right-switch-button disabled-button">
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/toggle-pictures.svg')
			); ?>" alt="<?php p($l->t('Picture view')); ?>"/>
		</div>
		<div id="filelist-button" class="button view-switcher left-switch-button inactive-button">
			<div id="button-loading"></div>
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/toggle-filelist.svg')
			); ?>" alt="<?php p($l->t('File list')); ?>"/>
		</div>
	</span>
</div>
<div id="gallery" class="hascontrols"></div>
<div id="emptycontent" class="hidden"></div>
<input type="hidden" name="allowShareWithLink" id="allowShareWithLink" value="yes"/>
<div class="hiddenuploadfield">
	<input type="file" id="file_upload_start" class="hiddenuploadfield" name="files[]"
		   data-url="<?php print_unescaped($_['uploadUrl']); ?>"/>
</div>
