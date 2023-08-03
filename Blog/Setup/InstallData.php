<?php

namespace Omnipro\Blog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Install data
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $data = [
                [
                    'data_title' => 'Omni PRO!',
                    'data_content' => 'Omnipro Blog Primero.',
                    'is_active' => 1
                ],
                [
                    'data_title' => 'Hola de Nuevo!',
                    'data_content' => 'Segundo Contenido.',
                    'is_active' => 1
                ],
                [
                    'data_title' => 'Bienvenio al Tercerercer',
                    'data_content' => 'Aqui tenemos la descripcion. inactivo',
                    'is_active' => 0
                ],
                [
                    'data_title' => 'Cuarto blog ya viene',
                    'data_content' => 'Este es el Cuarto.',
                    'is_active' => 1
                ],
                [
                    'data_title' => 'Quinto no malo',
                    'data_content' => 'Inactivo por el momento.',
                    'is_active' => 0
                ]
            ];

            foreach ($data as $datum) {
                $setup->getConnection()
                    ->insertForce($setup->getTable('omnipro_blog_data'), $datum);
            }
        }
    }
}
