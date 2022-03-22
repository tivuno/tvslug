<?php
/**
 * Slug module ”Nic”
 *
 * @author    tivuno prestashop specialists
 * @copyright 2018 - 2022 © tivuno.com
 * @license   Basic license | You are allowed to use the software on one productive environment
 */

class Category extends CategoryCore
{
    public function add($autodate = true, $null_values = false)
    {
        parent::add($autodate, $null_values);
        Hook::exec('actionCategorySave', ['category' => $this]);
    }

    public function update($null_values = false)
    {
        parent::update($null_values);
        Hook::exec('actionCategorySave', ['category' => $this]);
    }
}
