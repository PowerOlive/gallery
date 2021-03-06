<?php
/**
 * Gallery
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Olivier Paroz <galleryapps@oparoz.com>
 *
 * @copyright Olivier Paroz 2016
 */

namespace OCA\Gallery\Controller;

require_once __DIR__ . '/FilesControllerTest.php';

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\RedirectResponse;

use OCA\Gallery\Service\NotFoundServiceException;

/**
 * Class FilesApiControllerTest
 *
 * @package OCA\Gallery\Controller
 */
class FilesApiControllerTest extends FilesControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new FilesApiController(
			$this->appName,
			$this->request,
			$this->urlGenerator,
			$this->searchFolderService,
			$this->configService,
			$this->searchMediaService,
			$this->downloadService,
			$this->logger,
			$this->shareManager
		);
	}

	public function testDownloadWithWrongId() {
		$fileId = 99999;
		$filename = null;
		$status = Http::STATUS_NOT_FOUND;

		$exception = new NotFoundServiceException('Not found');
		$this->mockGetFileWithBadFile($this->downloadService, $fileId, $exception);

		$redirectUrl = '/index.php/app/error';
		$this->mockUrlToErrorPage($status, $redirectUrl);

		/** @type RedirectResponse $response */
		$response = $this->controller->download($fileId, $filename);

		$this->assertEquals($redirectUrl, $response->getRedirectURL());
		$this->assertEquals(Http::STATUS_SEE_OTHER, $response->getStatus());
		$this->assertFalse(\array_key_exists('galleryErrorMessage', $response->getCookies()));
	}
}
