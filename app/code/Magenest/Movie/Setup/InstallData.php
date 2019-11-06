<?php
//
//
//namespace Magenest\Movie\Setup;
//
//
//use Magento\Framework\Setup\InstallDataInterface;
//use Magento\Framework\Setup\ModuleContextInterface;
//use Magento\Framework\Setup\ModuleDataSetupInterface;
//
//class InstallData implements InstallDataInterface
//{
//    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
//    {
//        $setup->startSetup();
//
//        $directorData = [
//            ['name' => 'Russo'],
//            ['name' => 'Johnston']
//        ];
//        foreach ($directorData as $item) {
//            $setup->getConnection()->insertForce($setup->getTable('magenest_director'), $item);
//        }
//
//        $actorData = [
//            ['name' => 'Robert'],
//            ['name' => 'Chris'],
//            ['name' => 'Scarlett']
//        ];
//        foreach ($actorData as $item) {
//            $setup->getConnection()->insertForce($setup->getTable('magenest_actor'), $item);
//        }
//
//        $movieData = [
//            ['name' => 'End Game',
//                'description' => 'good',
//                'rating' => 9,
//                'director_id' => 1],
//            ['name' => 'Captain America',
//            'description' => 'good',
//            'rating' => 8,
//            'director_id' => 2]
//        ];
//        foreach ($movieData as $item){
//            $setup->getConnection()->insertForce($setup->getTable('magenest_movie'), $item);
//        }
//        $setup->endSetup();
//    }
//}