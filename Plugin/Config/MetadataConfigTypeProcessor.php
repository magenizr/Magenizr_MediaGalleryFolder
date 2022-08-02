<?php
/**
 * Magenizr MediaGalleryFolder
 * @copyright   Copyright (c) 2018 - 2022 Magenizr (https://www.magenizr.com)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace Magenizr\MediaGalleryFolder\Plugin\Config;

use Magento\Framework\Serialize\Serializer\Json;

class MetadataConfigTypeProcessor
{

    /**
     * @var SerializerInterface
     */
    protected $jsonSerializer;

    /**
     * Init constructor
     *
     * @param Json $jsonSerializer
     */
    public function __construct(
        Json $jsonSerializer
    ) {
        $this->jsonSerializer = $jsonSerializer;
    }

    /**
     * Init afterProcess
     *
     * @param \Magento\Framework\App\Config\MetadataConfigTypeProcessor $subject
     * @param array $result
     * @param array $rawData
     *
     * @return array
     */
    public function afterProcess(
        \Magento\Framework\App\Config\MetadataConfigTypeProcessor $subject,
        $result,
        $rawData
    ) {
        $isEnabled = boolval($result['default']['system']['magenizr_media_gallery_folder']['enabled']);

        // If module disabled in system configuration
        if (!$isEnabled) {
            return $result;
        }

        // Check if allowed resources exists ( 2.4.3-p1 or higher )
        if (!isset($result['default']['system']['media_storage_configuration']['allowed_resources'])) {
            return $result;
        }

        $folderList = $result['default']['system']['media_storage_configuration']['allowed_resources']['media_gallery_image_folders']; // phpcs:ignore
        $addFolderList = $this->jsonSerializer->unserialize($result['default']['system']['magenizr_media_gallery_folder']['folder_list']); // phpcs:ignore

        if (is_array($addFolderList)) {

            $addFolder = [];

            foreach ($addFolderList as $value) {

                $path = $value['path'];

                if (empty($path)) {
                    continue;
                }

                $identifier = str_replace(['/', '\\', ' ', '-'], '_', $path);
                $identifier = 'custom_' . $identifier;

                $addFolder[$identifier] = $path;
            }

            // Override allowed resources for media gallery
            $result['default']['system']['media_storage_configuration']['allowed_resources']['media_gallery_image_folders'] = array_merge($folderList, $addFolder); // phpcs:ignore
        }

        return $result;
    }
}
