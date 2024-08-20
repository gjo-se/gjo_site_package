<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\ViewHelpers\Products;

use GjoSe\GjoProducts\Domain\Model\ProductSetVariantGroup;
use TYPO3\CMS\Fluid\Core\ViewHelper\Exception;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetProductSetVariantFiltersViewHelper extends AbstractViewHelper
{
    #[\Override]
    public function initializeArguments(): void
    {
        $this->registerArgument(
            'productSetVariantGroup',
            ProductSetVariantGroup::class,
            'ProductSet',
            true
        );
    }

    public function render(): array
    {
        if (!isset($this->arguments['productSetVariantGroup'])) {
            throw new Exception('Attribute "productSetVariantGroup" missing for GetProductSetVariantFiltersViewHelper');
        }

        $productSetVariantGroup = $this->arguments['productSetVariantGroup'];
        $productSetVariants     = $productSetVariantGroup->getProductSetVariants();
        $variantFilters         = [];

        if ($productSetVariants) {
            foreach ($productSetVariants as $productSetVariant) {

                if ($productSetVariant->getLength()) {
                    $variantFilters['length'][$productSetVariant->getLength()] = $productSetVariant->getLength();
                }

                if ($productSetVariant->getVersion()) {
                    $variantFilters['version'][$productSetVariant->getVersion()] = $productSetVariant->getVersion();
                }

                if ($productSetVariant->getMaterial()) {
                    $variantFilters['material'][$productSetVariant->getMaterial()] = $productSetVariant->getMaterial();
                }
            }
        }

        return $variantFilters;
    }
}
