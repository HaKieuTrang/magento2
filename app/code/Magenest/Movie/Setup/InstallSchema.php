<?php

namespace Magenest\Movie\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Zend\Captcha\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableDirector = $setup->getConnection()->newTable($setup->getTable('magenest_director'))
            ->addColumn('director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Director_ID')
            ->addColumn('name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Director Name')->setComment('Drector Table');
        $setup->getConnection()->createTable($tableDirector);

        $tableActor = $setup->getConnection()->newTable($setup->getTable('magenest_actor'))
            ->addColumn('actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Actor_ID')
            ->addColumn('name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Actor Name')->setComment('Actor Table');
        $setup->getConnection()->createTable($tableActor);

        $tableMovie = $setup->getConnection()->newTable($setup->getTable('magenest_movie'))
            ->addColumn('movie_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Movie_ID')
            ->addColumn('name',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Drector Name')
            ->addColumn('description',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                '200',
                ['nullable' => false],
                'Description')
            ->addColumn('rating',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false, 'unsigned' => true],
                'Rating')
            ->addColumn('director_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Director ID'
            )
            ->addForeignKey($setup->getFkName(
                'magenest_movie',
                'director_id',
                'magenest_director',
                'director_id'),
                'director_id',
                $setup->getTable('magenest_director'),
                'director_id',
                Table::ACTION_CASCADE)
            ->setComment('Movie Table');
        $setup->getConnection()->createTable($tableMovie);

        $tableMovieActor = $setup->getConnection()->newTable($setup->getTable('magenest_movie_actor'))
            ->addColumn('movie_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned'=>true, 'nullable'=>false],
                'Movie ID')
            ->addColumn('actor_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned'=>true, 'nullable'=>false],
                'Actor ID')
            ->addForeignKey($setup->getFkName(
                'magenest_movie_actor',
                'movie_id',
                'magenest_movie',
                'movie_id'),
                'movie_id',
                $setup->getTable('magenest_movie'),
                'movie_id',
                Table::ACTION_CASCADE)
            ->addForeignKey($setup->getFkName(
                'magenest_movie_actor',
                'actor_id',
                'magenest_actor',
                'actor_id'),
                'actor_id',
                $setup->getTable('magenest_actor'),
                'actor_id',
                Table::ACTION_CASCADE)
            ->setComment('Movie Actor Table');
        $setup->getConnection()->createTable($tableMovieActor);
        $setup->endSetup();
    }
}