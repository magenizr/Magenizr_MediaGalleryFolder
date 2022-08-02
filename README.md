# Media Gallery Folder
Magento allows the media gallery access to the directory `wysiwyg` and `catalog` only. Unfortunately, other directories cannot be added easily, unless you create a module as explained in [Modify media library folder permissions
](https://developer.adobe.com/commerce/php/tutorials/backend/modify-image-library-permissions/) which is not suitable for most store owners.

We decided to close this problem by creating an interface where directories can be added easily to the Media Gallery.

![Magenizr MediaGalleryFolder - Backend](https://images2.imgbox.com/f3/33/hov9ZLw5_o.png)
![Magenizr MediaGalleryFolder - Backend](https://images2.imgbox.com/ed/f4/agWxA5oj_o.png)

## Business Value

* No development work required.
* Practical for small businesses, which cannot afford expensive agency support.

## System Requirements
- Magento 2.4.3-p1 or higher
- PHP 7.x

## Installation (Composer)

1. Update your composer.json `composer require "magenizr/magento2-mediagalleryfolder":"1.0.0" --no-update`
2. Install dependencies and update your composer.lock `composer update --lock`

```
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)              
Package operations: 1 install, 0 updates, 0 removals
  - Installing magenizr/magento2-mediagalleryfolder (1.0.0): Downloading (100%)
Writing lock file
Generating autoload files
```

## Installation (Composer 2)

1. Update your composer.json `composer require "magenizr/magento2-mediagalleryfolder":"1.0.0" --no-update`
2. Use `composer update --no-install` to update your composer.lock file.

```
Updating dependencies
Lock file operations: 1 install, 1 update, 0 removals
  - Locking magenizr/magento2-mediagalleryfolder (1.0.0)
```

3. And then `composer install` to install the package.

```
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 1 install, 0 update, 0 removals
  - Installing magenizr/magento2-mediagalleryfolder (1.0.0): Extracting archive
```

4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_MediaGalleryFolder --clear-static-content
php bin/magento setup:upgrade
```

## Installation (Manually)
1. Download the code.
2. Extract the downloaded tar.gz file. Example: `tar -xzf Magenizr_MediaGalleryFolder_1.0.0.tar.gz`.
3. Copy the code into `./app/code/Magenizr/MediaGalleryFolder/`.
4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_MediaGalleryFolder --clear-static-content
php bin/magento setup:upgrade
```

## Features
* Module can be disabled any time without touching the `config.php` file.
* Add as many directories as you want.

## Usage
* Navigate to `Stores > Configuration > Advanced > System > Media Gallery Folder` 
* Enable the module
* Add your directory ( relatively from `pub/media` ) and give it a label
* Clear the cache
* After that you should see the directory in your Media Gallery

## Roadmap
* Restrict directories to specific admin roles

## Support
If you experience any issues, don't hesitate to open an issue on [Github](https://github.com/magenizr/Magenizr_Debugger/issues). For a custom build, don't hesitate to contact us on [Magento Marketplace](https://marketplace.magento.com/partner/magenizr).

## Purchase
This module is available for free on [GitHub](https://github.com/magenizr). If you purchase the module on [Magenizr Shop](https://shop.magenizr.com) or [Magento Marketplace](https://marketplace.magento.com/partner/magenizr) we offer 60 days free support, 90 days warranty and 12 month free updates.

## Contact
Follow us on [GitHub](https://github.com/magenizr), [Twitter](https://twitter.com/magenizr) and [Facebook](https://www.facebook.com/magenizr).

## History
===== 1.0.0 =====
* Stable version

## License
[OSL - Open Software Licence 3.0](https://opensource.org/licenses/osl-3.0.php)
