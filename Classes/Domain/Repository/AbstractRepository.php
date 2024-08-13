<?php
declare(strict_types=1);

// @todo-methodClean:
// - debugSqlQuery passt noch nicht! TypeDeklaracionen fehlen
namespace GjoSe\GjoSitePackage\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

abstract class AbstractRepository extends Repository
{
    /**
     * @param QueryInterface<Query> $query
     */
    protected function debugSqlQuery(Query $query, bool $params = false): void
    {
        /** @var Typo3DbQueryParser $typo3DbQueryParser */
        $typo3DbQueryParser = GeneralUtility::makeInstance(Typo3DbQueryParser::class);
        $queryBuilder = $typo3DbQueryParser->convertQueryToDoctrineQueryBuilder($query);
        DebuggerUtility::var_dump($queryBuilder->getSQL());
        if ($params) {
            DebuggerUtility::var_dump($queryBuilder->getParameters());
        }
    }
}
