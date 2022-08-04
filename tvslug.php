<?php
/**
 * Slug module ”Nic”
 *
 * @author    Konstantinos A. Kogkalidis
 * @copyright 2018 - 2022 © tivuno PrestaShop specialists
 * @license   Basic license | One license per (sub)domain
 */

require_once _PS_MODULE_DIR_ . 'tvimport/tvimport.php';
require_once _PS_MODULE_DIR_ . 'tvslug/models/Slug.php';

class Tvslug extends Module
{
    public static bool $executed = false;
    
    public function __construct()
    {
        $this->name = 'tvslug';
        $this->tab = 'administration';
        $this->version = '1.0.3';
        $this->author = 'tivuno.com';
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        $this->displayName = $this->l('Greeklish slug');
        $this->description = $this->l('It creates greeklish slugs for the content in your project.');
        parent::__construct();
    }
    
    public function install(): bool
    {
        return parent::install() && $this->registerHooks();
    }
    
    private function registerHooks(): bool
    {
        $hooks = ["actionCategoryAdd", "actionCategoryUpdate", "actionProductSave"];
        foreach ($hooks as $hook) {
            $this->registerHook($hook);
        }
        
        return true;
    }
    
    public function hookActionCategoryAdd($params)
    {
        $this->hookActionCategoryUpdate($params);
    }
    
    public function hookActionCategoryUpdate($params)
    {
        $executed = self::$executed;
        if ($executed) {
            return;
        }
        
        self::$executed = true;
        $category = $params['category'];
        $submitted_name = Tools::getValue('category')['name'];
        foreach ($submitted_name as $language_id => $name) {
            if (array_key_exists($language_id, $category->link_rewrite)) {
                $category->link_rewrite[$language_id] = pSQL(Slug::convert($name));
            }
        }
        $category->update();
    }
    
    public function hookActionProductSave($params)
    {
        $executed = self::$executed;
        if ($executed) {
            return;
        }
        
        self::$executed = true;
        $product = $params['product'];
        foreach ($product->name as $language_id => $name) {
            if (array_key_exists($language_id, $product->link_rewrite)) {
                $product->link_rewrite[$language_id] = pSQL(Slug::convert($name));
            }
        }
        $product->save();
    }
}
