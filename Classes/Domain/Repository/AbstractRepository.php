<?php

declare(strict_types=1);

// @todo-methodClean:
// - debugSqlQuery passt noch nicht! TypeDeklaracionen fehlen

namespace GjoSe\GjoSitePackage\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

abstract class AbstractRepository extends Repository
{
    protected ?Typo3DbQueryParser $typo3DbQueryParser = null;

    public function injectTypo3DbQueryParser(Typo3DbQueryParser $typo3DbQueryParser): void
    {
        $this->typo3DbQueryParser = $typo3DbQueryParser;
    }

    /**
     * @param QueryInterface<Query> $query
     */
    protected function debugSqlQuery(Query $query, bool $params = false): void
    {
        if ($this->typo3DbQueryParser instanceof Typo3DbQueryParser) {
            $queryBuilder = $this->typo3DbQueryParser->convertQueryToDoctrineQueryBuilder($query);
            DebuggerUtility::var_dump($queryBuilder->getSQL());
            if ($params) {
                DebuggerUtility::var_dump($queryBuilder->getParameters());
            }
        }
    }
}
