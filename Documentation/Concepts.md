//  - Code isActive:
//      - no: delete | move to _works
//      - yes:
//          - move to
//              - Concept
//              - Abstract/Partials
//              - Utility
//              - Service
//              - Settings
//          - add Concept-Documentation
//          - mark @todo-conceptClean
//          - ok

## *********** Concept: TypoScript ***********
- `gjo_site_package/Configuration/TypoScript/setup.typoscript`
- `gjo_site_package/Configuration/TypoScript/constants.typoscript`
- `gjo_site_package/Configuration/TCA/Overrides/sys_template.php`
  - Backend: `TypoScript: SiteRoot / Edit TS / Advanced / Include TypoScript`

## *********** Concept: Page TSConfig ***********
- `gjo_site_package/Configuration/TsConfig/Page/Page.tsconfig`
- `gjo_site_package/Configuration/TCA/Overrides/pages.php`
  - Backend: `Page: SiteRoot / Edit Page / Resources / Include Page TSConfig`

## *********** Concept: Page TSConfig - ContentElementWizard ***********
- `gjo_site_package/Configuration/TsConfig/Page/ContentElementWizard.tsconfig`
- `gjo_site_package/Configuration/TsConfig/Page/Page.tsconfig`

## *********** Concept: TCA Additional Column ***********
- `gjo_site_package/Configuration/TCA/Overrides/tt_content_gjo_site_package_tca_col_additional_css.php`
- `gjo_site_package/ext_tables.sql`

## *********** Concept: TCA addTcaSelectItemGroup() ***********
- `gjo_site_package/Configuration/TCA/Overrides/tt_content_add_tca_select_item_group.php`
- Alternative: `gjo_products/Configuration/TCA/Overrides/tt_content_add_tca_select_item_group.php`
- Usage: `gjo_products/Configuration/TCA/Overrides/tt_content_gjoproducts_productfinder.php`

## *********** Concept: Extbase tableMapping ***********
- `gjo_site_package/Classes/Domain/Model/Pages.php`
- `gjo_site_package/Configuration/Extbase/Persistence/Classes.php`

## *********** Concept: Image Cropping ***********
- Utility: `gjo_site_package/Classes/Utility/CroppingUtility.php`
- Usage in Default CE: `gjo_site_package/Configuration/TCA/Overrides/tt_content_element_image.php`
- Usage in Custom CE: `gjo_site_package/Configuration/TCA/Overrides/tx_gjositepackage_ce_carousel_items.php`
- Usage in Plugin: `gjo_products/Configuration/TCA/Overrides/tx_gjoproducts_domain_model_productset.php`

## *********** Concept: ViewHelper ***********
- `gjo_site_package/Classes/ViewHelpers/Products/GetMappedImageEngineeringDrawingRecordsToCERecordsViewHelper.php`

## *********** Concept: Container (ehem. Gridelements) ***********
- https://gjo-se.atlassian.net/wiki/spaces/BERKNOW/pages/3104047132/gjo_site_package
- `composer require b13/container`
- `gjo_site_package/Configuration/TCA/Overrides/container.php`
- `gjo_site_package/Configuration/TypoScript/Container/Container.typoscript`
- `gjo_site_package/Configuration/TypoScript/setup.typoscript`

## *********** Concept: Custom ContentElement CE ***********
- https://gjo-se.atlassian.net/wiki/spaces/BERKNOW/pages/3104047132/gjo_site_package#***********-Custom-Content-Elements-%26-Container-
- `gjo_site_package/Configuration/TypoScript/ContentElement/DynamicContent.typoscript`
- `gjo_site_package/Configuration/TypoScript/ContentElement/ContentElement.typoscript`
- Override Default CE: (add Template with corresponding Name)
  - `packages/gjo_site_package/Resources/Private/Templates/ContentElements/Header.html`
- Simple CE:
  - Backend:
    - `gjo_site_package/Configuration/TCA/Overrides/tt_content_gjo_site_package_ce_highlight.php`
    - `gjo_site_package/Configuration/FlexForms/gjo_site_package_ce_highlight.xml`
      - Alternative: `packages/gjo_site_package/ext_tables.sql`
    - `gjo_site_package/Configuration/TsConfig/Page/ContentElementWizard.tsconfig`
  - Frontend:
    - `gjo_site_package/Configuration/TypoScript/ContentElement/Elements/gjo_site_package_ce_highlight.typoscript`
    - `gjo_site_package/Resources/Private/Templates/ContentElements/Highlight.html`
- Complex CE:
    - Backend:
        - `gjo_site_package/Configuration/TCA/Overrides/tt_content_gjo_site_package_ce_carousel.php`
        - `gjo_site_package/Configuration/FlexForms/gjo_site_package_ce_carousel.xml`
        - `gjo_site_package/Configuration/TCA/tx_gjositepackage_ce_carousel_items.php`
        - `gjo_site_package/ext_tables.sql`
        - `gjo_site_package/Configuration/TsConfig/Page/ContentElementWizard.tsconfig`
  - Frontend:
      - `gjo_site_package/Configuration/TypoScript/ContentElement/Elements/gjo_site_package_ce_carousel.typoscript`
      - `gjo_site_package/Resources/Private/Templates/ContentElements/Carousel.html`

