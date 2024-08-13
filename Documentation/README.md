
## TypoScript
- gjo_ext/Configuration/TypoScript/setup.typoscript
  - @import 'EXT:gjo_ext/Configuration/TypoScript/XYZ.typoscript'
- gjo_ext/Configuration/TypoScript/constants.typoscript
  - all EXT Constants
- gjo_ext/Configuration/TCA/Overrides/sys_template.php
    - addStaticFile()
- TYPO3 Backend: Site Managemant/TypoScript: Root
  - Include static (from extensions) TypoScript

## Page TSConfig
- https://docs.typo3.org/m/typo3/reference-tsconfig/12.4/en-us/Index.html
- Global: gjo_ext/Configuration/page.tsconfig
  - @import 'EXT:gjo_ext/Configuration/TsConfig/XYZ.tsconfig'
- Page: gjo_ext/Configuration/TsConfig/Page/Page.tsconfig
  - @import 'EXT:gjo_ext/Configuration/TsConfig/XYZ.tsconfig'
  - gjo_ext/Configuration/TCA/Overrides/pages.php
      - registerPageTSConfigFile()
    - TYPO3 Backend: Web/Page Root
      - Edit Page/Resources/Page TSConfig
      - Include static (from extensions) Page TSConfig
- Control: Site Managemant/Page TSconfig: Included Page TSConfig



## ExtController

* Constants
* Request
* Response
* InitializeAction
* Forwarding and Redirect
* FlashMassage

DOCU TYPO3 CONCEPTS
==============================================================

# BackendLayout:

- Rootpage / Module Page / Resources / Include Page TSconfig
- Rootpage / Module Page / Appearance/ Backend Layout (this & sub)
