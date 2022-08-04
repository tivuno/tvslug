<?php
/**
 * Slug module ”Nic”
 *
 * @author    Konstantinos A. Kogkalidis
 * @copyright 2018 - 2022 © tivuno PrestaShop specialists
 * @license   Basic license | One license per (sub)domain
 */

class Category extends CategoryCore
{
    public function add($autoDate = true, $nullValues = false)
    {
        parent::add($autoDate, $nullValues);
        Hook::exec('actionCategorySave', ['category' => $this]);
    }
    
    public function update($nullValues = false)
    {
        parent::update($nullValues);
        Hook::exec('actionCategorySave', ['category' => $this]);
    }
}
