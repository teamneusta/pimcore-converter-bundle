# Pimcore Converter Bundle

![CI](https://github.com/teamneusta/pimcore-translation-migration-bundle/actions/workflows/test-and-qa.yaml/badge.svg)

![Software License](https://img.shields.io/badge/license-GPLv3-informational.svg)

Some helpful converters and populators for Pimcore based upon teamneusta/converter-bundle.

## Installation

TODO

Require via Composer

```shell
composer require teamneusta/pimcore-converter-bundle
```

Add the bundle to your application. For example via the `Kernel.php`.

```shell
use Neusta\Pimcore\ConverterBundle\NeustaPimcoreConverterBundle;
...
    public function registerBundlesToCollection(BundleCollection $collection)
    {
        ...
        $collection->addBundle(new NeustaPimcoreConverterBundle());
    }
```

## Usage

The usage of all Converters and Populators should be the same as you have already seen
at [converter-bundle](https://github.com/teamneusta/converter-bundle).

For an example usage look at [documentation](docs/index.md).

## Contribution

Feel free to open issues for any bug, feature request, or other ideas.

Please remember to create an issue before creating large pull requests.

### Further development

Pipelines will tell you, when code does not meet our standards. To use the same tools in local development, take the
Docker command from above with other scripts from the `composer.json`. For example:

* cs:check
* phpstan

```shell
docker run -it --rm -v $(pwd):/app -w /app pimcore/pimcore:PHP8.1-cli composer install --ignore-platform-reqs
docker run -it --rm -v $(pwd):/app -w /app pimcore/pimcore:PHP8.1-cli composer <composer-script>
```

Only supported on Linux.
