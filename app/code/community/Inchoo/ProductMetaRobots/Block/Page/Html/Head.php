<?php
/**
 * Set meta <meta name="robots" content=""> tag.
 *
 * @package Inchoo
 * @subpackage ProductMetaRobots
 * @author Marko Martinović <marko.martinovic@inchoo.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 */

class Inchoo_ProductMetaRobots_Block_Page_Html_Head extends Mage_Page_Block_Html_Head
{
    /**
     * Customize meta robots tags when viewing product.
     *
     * @return string
     */
    public function getRobots()
    {
        parent::getRobots();

        if (($_product = Mage::registry('current_product')) &&
                ($robots = $_product->getAttributeText('inchoo_meta_robots'))) {
            $this->_data['robots'] = $robots;
        }

        return $this->_data['robots'];
    }
}