<?php
declare(strict_types=1);

namespace GjoSe\GjoSitePackage\ViewHelpers\Products;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

class GetMappedImageEngineeringDrawingRecordsToCERecordsViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    protected $escapeOutput = false;

    #[Override]
    public function initializeArguments(): void
    {
        $this->registerArgument(
            'imageEngineeringDrawings',
            ObjectStorage::class,
            'ImageEngineeringDrawing',
            true
        );
    }

    /**
     * @return array<mixed, array<'data'|'image', mixed>>
     */
    public function render(): array
    {
        $imageEngineeringDrawingRecords = $this->arguments['imageEngineeringDrawings'];

        $mappedRecords = [];
        if ($imageEngineeringDrawingRecords instanceof ObjectStorage) {

            foreach ($imageEngineeringDrawingRecords as $key => $record) {
                /** @var FileReference $record */
                $mappedRecords[$key]['data']['productHeader'] = $record->getOriginalResource()->getTitle();
                $mappedRecords[$key]['data']['imageDescription'] = $record->getOriginalResource()->getDescription();
                $mappedRecords[$key]['image'] = $record;

            }
        }

        return $mappedRecords;
    }
}
