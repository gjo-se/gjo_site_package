<?php

declare(strict_types=1);
// @todo-conceptClean:
// clear Dependency: move logic to productSetVariantGroupRepository

namespace GjoSe\GjoSitePackage\ViewHelpers\Products;

use GjoSe\GjoProducts\Domain\Model\ProductSet;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class GetMappedProductRecordsToCERecordsViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    protected $escapeOutput = false;

    #[\Override]
    public function initializeArguments(): void
    {
        $this->registerArgument(
            'productSet',
            ProductSet::class,
            'ProductSet',
            true
        );
    }

    /**
     * @return array<mixed, array<'data'|'images', mixed>>
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext,
    ): array {

        /** @var ProductSet $productSet */
        $productSet = $arguments['productSet'];
        $productSetVariantGroups = $productSet->getProductSetVariantGroups();

        $mappedRecords = [];
        foreach ($productSetVariantGroups as $productSetVariantGroup) {
            $products = $productSetVariantGroup->getProducts();
            foreach ($products as $key => $record) {
                $additionalInformation = '';
                if ($record->getArticleNumber() && $record->getAdditionalInformation()) {
                    $additionalInformation = $record->getArticleNumber() . ', ' . $record->getAdditionalInformation();
                }

                if ($record->getArticleNumber() && !$record->getAdditionalInformation()) {
                    $additionalInformation = $record->getArticleNumber();
                }

                if (!$record->getArticleNumber() && $record->getAdditionalInformation()) {
                    $additionalInformation = $record->getAdditionalInformation();
                }

                $mappedRecords[$key]['data']['productHeader'] = $record->getName();
                $mappedRecords[$key]['data']['productAdditionalInformation'] = $additionalInformation;
                $mappedRecords[$key]['image'] = $record->getImage();

            }
        }

        return $mappedRecords;
    }
}
