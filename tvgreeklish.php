<?php

/**
 * Greeklish module ”Nic”
 *
 * @author    Konstantinos A. Kogkalidis
 * @copyright 2018 - 2023 © tivuno PrestaShop specialists
 * @license   Basic license | One license per (sub)domain
 */
class Tvgreeklish extends Module
{
    public static $executed = false;
    protected static $basic = [
        '/[ἀἁἈἉᾶἄἅἌἍἆἇἎἏἂἃἊἋᾳᾼᾴᾲᾀᾈᾁᾉᾷᾆᾎᾇᾏᾂᾊᾃᾋὰαάΑΆᾄᾅᾌᾍᾺᾰᾱᾸᾹ]/u' => 'a',
        '/[βΒ]/u' => 'v',
        '/[γΓ]/u' => 'g',
        '/[δΔ]/u' => 'd',
        '/[ἐἑἘἙἔἕἜἝἒἓἚἛὲεέΕΈ]/u' => 'e',
        '/[ζΖ]/u' => 'z',
        '/[ἠἡἨἩἤἥἬἭῆἦἧἮἯἢἣἪἫῃῌῄῂᾐᾑᾘᾙᾖᾗᾞᾟᾒᾚᾛὴηήΗΉᾓᾔᾕῇᾜᾝῊ]/u' => 'i',
        '/[θΘ]/u' => 'th',
        '/[ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻῒῗὶιίϊΐΙΊΪΐῐῑῚῘῙ]/u' => 'i',
        '/[κΚ]/u' => 'k',
        '/[λΛ]/u' => 'l',
        '/[μΜ]/u' => 'm',
        '/[νΝ]/u' => 'n',
        '/[ξΞ]/u' => 'x',
        '/[ὀὁὈὉὄὅὌὍὂὃὊὋὸοόΟΌῸ]/u' => 'o',
        '/[πΠ]/u' => 'p',
        '/[ρΡ]/u' => 'r',
        '/[σςΣ]/u' => 's',
        '/[τΤ]/u' => 't',
        '/[ὐὑὙὔὕὝῦὖὗὒὓὛὺῒῧυύϋΰΥΎΫῢΰῠῡὟῪῨῩ]/u' => 'y',
        '/[φΦ]/iu' => 'f',
        '/[χΧ]/u' => 'ch',
        '/[ψΨ]/u' => 'ps',
        '/[ὠὡὨὩὤὥὬὭῶὦὧὮὯὢὣὪὫῳῼᾠᾡᾨᾩᾤᾥᾬᾭᾦᾧᾮᾯᾢᾣᾪᾫὼωώῲῷῴ]/iu' => 'o',
    ];
    protected static $diphthongs = [
        '/[αΑ][ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻὶιίΙΊ]/u' => 'ai',
        '/[οΟ][ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻὶιίΙΊ]/u' => 'oi',
        '/[Εε][ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻὶιίΙΊ]/u' => 'ei',
        '/[αΑ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'af$1',
        '/[αΑ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]/u' => 'av',
        '/[εΕ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'ef$1',
        '/[εΕ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]/u' => 'ev',
        '/[οΟ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]/u' => 'ou',
        '/(^|\s)[μΜ][πΠ]/u' => '$1b',
        '/[μΜ][πΠ](\s|$)/u' => 'b$1',
        '/[μΜ][πΠ]/u' => 'b',
        '/[νΝ][τΤ]/u' => 'nt',
        '/[τΤ][σΣ]/u' => 'ts',
        '/[τΤ][ζΖ]/u' => 'tz',
        '/[γΓ][γΓ]/u' => 'ng',
        '/[γΓ][κΚ]/u' => 'gk',
        '/[ηΗ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυΥ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'if$1',
        '/[ηΗ][υΥ]/u' => 'iu',
    ];
    protected static $simplified = [
        'before' => [
            // Diphthongs
            '/[αΑ][ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻὶιίΙΊ]/u' => 'e',
            '/[οΟ][ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻὶιίΙΊ]/u' => 'i',
            '/[Εε][ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻὶιίΙΊ]/u' => 'i',
            '/[αΑ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'af$1',
            '/[αΑ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]/u' => 'av',
            '/[εΕ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'ef$1',
            '/[εΕ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]/u' => 'ev',
            '/[οΟ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυύΥΎ]/u' => 'ou',
            '/(^|\s)[μΜ][πΠ]/u' => '$1b',
            '/[μΜ][πΠ](\s|$)/u' => 'b$1',
            '/[μΜ][πΠ]/u' => 'b',
            '/[νΝ][τΤ]/u' => 'nt',
            '/[τΤ][σΣ]/u' => 'ts',
            '/[τΤ][ζΖ]/u' => 'tz',
            '/[γΓ][γΓ]/u' => 'ng',
            '/[γΓ][κΚ]/u' => 'gk',
            '/[ηΗ][ὐὑὙὔὕὝῦὖὗὒὓὛὺυΥ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'if$1',
            '/[ηΗ][υΥ]/u' => 'iu'
        ],
        'after' => [
            // Regular letters
            '/[ὐὑὙὔὕὝῦὖὗὒὓὛὺῒῧυύϋΰΥΎΫῢΰῠῡὟῪῨῩ]/u' => 'i',
        ]
    ];
    
    public function __construct() {
        $this->name = 'tvgreeklish';
        $this->tab = 'administration';
        $this->version = '1.0.6';
        $this->author = 'tivuno.com - PrestaShop specialists';
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        $this->displayName = $this->l('Greeklish module ”Nic”');
        $this->description = $this->l(
            'It converts string from greek to latin characters for the content in your project.'
        );
        parent::__construct();
    }
    
    public function install() {
        return parent::install();// && $this->registerHooks();
    }
    
    private function registerHooks() {
        $hooks = ["actionCategoryAdd", "actionCategoryUpdate", "actionProductSave"];
        foreach ($hooks as $hook) {
            $this->registerHook($hook);
        }
        
        return true;
    }
    
    public function hookActionCategoryAdd($params) {
        $this->hookActionCategoryUpdate($params);
    }
    
    public function hookActionCategoryUpdate($params) {
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
    
    public function hookActionProductSave($params) {
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
    
    public function hookDisplayImportCreationLanguageExtraFields() {
        return [ # One language per line?
                 [
                     'type' => 'radio',
                     'label' => $this->l('Do you need the slug to be converted to greeklish?'),
                     'name' => 'language_slug',
                     'values' => [
                         [
                             'id' => 0,
                             'value' => 0,
                             'label' => $this->l('No conversion, every name is in plain english')
                         ],
                         [
                             'id' => 1,
                             'value' => 1,
                             'label' => $this->l('Basic conversion from modern greek')
                         ],
                         [
                             'id' => 2,
                             'value' => 2,
                             'label' => $this->l('Advanced conversion from ancient greek')
                         ]
                     ]
                 ]
        ];
    }
    
    public function hookActionAddImportLanguageSettings() {
        return ['slug'];
    }
    
    public static function convert(string $string, int $level = 0, bool $uppercase = false, $slug = false) {
        if ($level == 0) {
            $expressions = self::$basic;
        } elseif ($level == 1) {
            $expressions = array_merge(self::$diphthongs, self::$basic);
        } else {
            $rules = self::$simplified;
            $expressions = array_merge($rules['before'], self::$basic, $rules['after']);
        }
        $string = preg_replace(array_keys($expressions), array_values($expressions), $string);
        if ($uppercase === true) {
            $string = mb_strtoupper($string, "UTF-8");
        }
        if ($slug === true) {
            return self::toSlug($string);
        }
    }
    
    /**
     * @param string $string
     * @return string
     */
    public static function toSlug(string $string) {
        $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        
        return preg_replace("/[\s_]/", "-", $string);;
    }
}
