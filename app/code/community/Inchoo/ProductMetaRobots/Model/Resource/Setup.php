<?php
/**
 * Inchoo
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Please do not edit or add to this file if you wish to upgrade
 * Magento or this extension to newer versions in the future.
 * Inchoo developers (Inchooer's) give their best to conform to
 * "non-obtrusive, best Magento practices" style of coding.
 * However, Inchoo does not guarantee functional accuracy of
 * specific extension behavior. Additionally we take no responsibility
 * for any possible issue(s) resulting from extension usage.
 * We reserve the full right not to provide any kind of support for our free extensions.
 * Thank you for your understanding.
 *
 * @category Inchoo
 * @package ProductMetaRobots
 * @author Marko Martinović <marko.martinovic@inchoo.net>
 * @copyright Copyright (c) Inchoo (http://inchoo.net/)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Inchoo_ProductMetaRobots_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup
{
    /**
     * Add our custom attributes
     *
     * @return Mage_Eav_Model_Entity_Setup
     */
    public function installCustomProductAttributes()
    {
        $attributes = $this->_getCustomProductAttributes();

        foreach ($attributes as $code => $attr) {
            $this->addAttribute('catalog_product', $code, $attr);
        }

        return $this;
    }

    /**
     * Remove custom attributes
     *
     * @return Mage_Eav_Model_Entity_Setup
     */
    public function removeCustomProductAttributes()
    {
        $attributes = $this->_getCustomProductAttributes();

        foreach ($attributes as $code => $attr) {
            $this->removeAttribute('catalog_product', $code);
        }

        return $this;
    }

    /**
     * Returns entities array to be used by
     * Mage_Eav_Model_Entity_Setup::installEntities()
     *
     * @return array Custom entities
     */
    protected function _getCustomProductAttributes()
    {
        return array(
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
        );
    }
}
