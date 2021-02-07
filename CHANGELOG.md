# Changelog

## unreleased

### Breaking Changes

* Requires php `>=7.3`, was `^5.5 || ^7.0`. 
* Complete rewrite/refactor.  
  Expect library classes/methods/functions to be removed, renamed or incompatible to previous versions.  
  Cli via `composer make-bom` did not change.

### Added 

* Support for php8.
* CLI: Support for output to _STDOUT_. Use option `--output-file=-`.

### Removed 

* Support for php<7.3.

### Fixed

* Some cases when the JSON BoM generator created schema-invalid data.

## 1.2

### Added

* Initial JSON support
  (via [#16](https://github.com/CycloneDX/cyclonedx-php-composer/pull/16))

### Fixed

* Some cases when the XML BoM generator created schema-invalid data.
  (via [#15](https://github.com/CycloneDX/cyclonedx-php-composer/pull/15))
* Added missing but needed composer requirements `ext-xmlwriter`
  (via [#11](https://github.com/CycloneDX/cyclonedx-php-composer/pull/11))

## 1.1

### Added

* Support for composer v2
  (via [#9](https://github.com/CycloneDX/cyclonedx-php-composer/pull/9))
  
## 1.0.1

### Fixed 

* Removed unneeded double forward slash from package URLs
  (via [#7](https://github.com/CycloneDX/cyclonedx-php-composer/pull/7))

### Misc

* Added release workflow
  (via [#8](https://github.com/CycloneDX/cyclonedx-php-composer/pull/8))

## 1.0

Initial release.