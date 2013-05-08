<?php
/**
 * Extends Mage_Eav_Model_Entity_Setup.
 *
 * @package Inchoo
 * @subpackage ProductMetaRobots
 * @author Marko Martinović <marko.martinovic@inchoo.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 */

class Inchoo_ProductMetaRobots_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup
{
    /**
     * Add our custom attributes
     *
     * @return Mage_Eav_Model_Entity_Setup
     */
    public function installCustomAttributes()
    {
        $entities = $this->_getCustomEntities();

        $this->installEntities($entities);

        return $this;
    }

    /**
     * Remove custom attributes
     *
     * @return Mage_Eav_Model_Entity_Setup
     */
    public function removeCustomAttributes()
    {
        $entities = $this->_getCustomEntities();

        foreach ($entities as $entityName=>$entity) {
            foreach ($entity['attributes'] as $attrCode => $attr) {
                $this->removeAttribute($entityName, $attrCode);
            }
        }

        return $this;
    }

    /**
     * Returns entities array to be used by
     * Mage_Eav_Model_Entity_Setup::installEntities()
     *
     * @return array Custom entities
     */
    protected function _getCustomEntities()
    {
        return array(
            'catalog_product' => array(
                'entity_model'      => 'catalog/product',
                'attribute_model'   => 'catalog/resource_eav_attribute',
                'table'             => 'catalog/product',
                'additional_attribute_table' => 'catalog/eav_attribute',
                'entity_attribute_collection' => 'catalog/product_attribute_collection',
                'attributes'        => array(
                    'inchoo_meta_robots' => array(
                        'group'             => 'Meta Information',
                        'label'             => 'Meta Robots',
                        'type'              => 'varchar',
                        'input'             => 'select',
                        'default'           => '',
                        'class'             => '',
                        'backend'           => '',
                        'frontend'          => '',
                        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'visible'           => true,
                        'required'          => false,
                        'user_defined'      => false,
                        'searchable'        => false,
                        'filterable'        => false,
                        'comparable'        => false,
                        'visible_on_front'  => false,
                        'visible_in_advanced_search' => false,
                        'unique'            => false,
                        'option' => array (
                            'value' => array(
                                'INDEX,FOLLOW' => array(0=>'INDEX,FOLLOW'),
                                'NOINDEX,FOLLOW' => array(0=>'NOINDEX,FOLLOW'),
                                'NOINDEX,NOFOLLOW' => array(0=>'NOINDEX,NOFOLLOW'),
                                'INDEX,NOFOLLOW' => array(0=>'INDEX,NOFOLLOW')
                            )
                        )
                    )
               )
           )
        );
    }
}