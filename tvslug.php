<?php

/**
 * Slug module ”Nic”
 *
 * @author    tivuno prestashop specialists
 * @copyright 2018 - 2022 © tivuno.com
 * @license   Basic license | You are allowed to use the software on one productive environment
 */
require_once _PS_MODULE_DIR_ . 'tvslug/models/Slug.php';
class Tvslug extends Module
{
    public static $executed = false;
    public function __construct()
    {
        $this->name = 'tvslug';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'tivuno.com';
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        $this->displayName = $this->l('Greeklish slug');
        $this->description = $this->l('It creates greeklish slugs for products & categories.');
        parent::__construct();
        $this->languages = Language::getLanguages(false, false, true);
    }


    public function install()
    {
        return parent::install()
            && $this->registerHook('actionCategorySave')
            && $this->registerHook('actionProductSave');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookActionCategorySave($params)
    {
        $executed = self::$executed;
        if ($executed == true) {
            return;
        }
        self::$executed = true;
        $category = $params['category'];
        $slug = new Slug();
        foreach ($category->name as $language_id => $name) {
            if (key_exists($language_id, $category->link_rewrite)) {
                $category->link_rewrite[$language_id] = $slug->createSlug($name);
            }
        }
        $category->save();
    }

    public function hookActionProductSave($params)
    {
        $executed = self::$executed;
        if ($executed == true) {
            return;
        }
        self::$executed = true;
        $product = $params['product'];
        $slug = new Slug();
        foreach ($product->name as $language_id => $name) {
            if (key_exists($language_id, $product->link_rewrite)) {
                $product->link_rewrite[$language_id] = $slug->createSlug($name);
            }
        }
        $product->save();
    }
}
