- Container in site_package
- RTE?
- UserTSconfig / PageTSconfig
- CE Backend Layout
- Plugin BE layout (Flexforms)
-
## *********** Concept: Extbase tableMapping ***********
- `gjo_site_package/Classes/Domain/Model/Pages.php`
- `gjo_site_package/Configuration/Extbase/Persistence/Classes.php`

## *********** Concept: Image Cropping ***********
- Utility: `gjo_site_package/Classes/Utility/CroppingUtility.php`
- Usage in Default CE: `gjo_site_package/Configuration/TCA/Overrides/tt_content_element_image.php`
- Usage in Custom CE: `gjo_site_package/Configuration/TCA/Overrides/tx_gjositepackage_carousel_item.php`
- Usage in Plugin: `gjo_products/Configuration/TCA/Overrides/tx_gjoproducts_domain_model_productset.php`

## *********** Concept: ViewHelper ***********
- `gjo_site_package/Classes/ViewHelpers/Products/GetMappedImageEngineeringDrawingRecordsToCERecordsViewHelper.php`
