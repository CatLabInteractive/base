<?php

use CatLab\Base\Helpers\StringHelper;

/**
 * Class StringHelperTest
 */
class DatabaseTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testQueryBuilder()
    {
        $query = new \CatLab\Base\Models\Database\SelectQueryParameters();

        $table = 'my_table';

        $query->where(
            (new \CatLab\Base\Models\Database\WhereParameter('name', '=', 'wololo', $table))
            ->or(new \CatLab\Base\Models\Database\WhereParameter('name', '=', 'wololo2', $table))
        );

        $query->join(new \CatLab\Base\Models\Database\JoinParameter(
            'joined_table',
            (new \CatLab\Base\Models\Database\OnParameter(
                [ 'joined_table', 'id' ],
                '=',
                [ $table, 'join_id' ]
            ))->and(new \CatLab\Base\Models\Database\WhereParameter(
                    [ 'joined_table', 'language' ],
                    '=',
                   'french')
            )
        ));

        $sql = $query->toSql('my_table');

        echo "\n\n" . $sql . "\n";
    }

    /**
     *
     */
    public function testQueryBuilderMultipleJoinConditions()
    {
        $query = new \CatLab\Base\Models\Database\SelectQueryParameters();

        $table = 'my_table';

        $query->join(new \CatLab\Base\Models\Database\JoinParameter(
            'joined_table',
            [ 'joined_table', 'id' ],
            '=',
            [ $table, 'join_id' ]
        ));

        $sql = $query->toSql('my_table');

        echo "\n\n" . $sql . "\n";
    }
}
