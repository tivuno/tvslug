<?php
/**
 * Slug module ”Nic”
 *
 * @author    Konstantinos A. Kogkalidis
 * @copyright 2018 - 2022 © tivuno PrestaShop specialists
 * @license   Basic license | One license per (sub)domain
 */

require_once _PS_MODULE_DIR_ . 'tvslug/models/Slug.php';

class Tvslug extends Module
{
    public function __construct()
    {
        $this->name = 'tvslug';
        $this->tab = 'administration';
        $this->version = '1.0.2';
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
        $hooks = ["actionCategorySave", "actionProductSave"];
        foreach ($hooks as $hook) {
            $this->registerHook($hook);
        }
        
        return true;
    }
    
    public function hookActionCategorySave($params)
    {
        foreach ($params['category']->name as $language_id => $name) {
            if (key_exists($language_id, $params['category']->link_rewrite)) {
                $params['category']->link_rewrite[$language_id] = Slug::convert($name);
            }
        }
        $params['category']->save();
    }
    
    public function hookActionProductSave($params)
    {
        foreach ($params['product']->name as $language_id => $name) {
            if (array_key_exists($language_id, $params['product']->link_rewrite)) {
                $params['product']->link_rewrite[$language_id] = Slug::convert($name);
            }
        }
        $params['product']->save();
    }
}
