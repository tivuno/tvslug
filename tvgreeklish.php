<?php
/**
 * Greeklish module ”Nic”
 *
 * @author    tivuno.com <hi@tivuno.com>
 * @copyright 2018 - 2023 © tivuno.com
 * @license   https://tivuno.com/blog/business-news/basic-license
 */
class Tvgreeklish extends Module
{
    public static $executed = false;
    protected static $basic = [
        // Special symbols
        '/["]/iu' => ' inches',
        '/[ἀἁἈἉᾶἄἅἌἍἆἇἎἏἂἃἊἋᾳᾼᾴᾲᾀᾈᾁᾉᾷᾆᾎᾇᾏᾂᾊᾃᾋὰαάΑΆᾄᾅᾌᾍᾺᾰᾱᾸᾹ]/u' => 'a',
        '/[βΒ]/u' => 'v',
        '/[γΓ]/u' => 'g',
        '/[δΔðÐ]/u' => 'd',
        '/[ἐἑἘἙἔἕἜἝἒἓἚἛὲεέΕΈ]/u' => 'e',
        '/[ζΖ]/u' => 'z',
        '/[ἠἡἨἩἤἥἬἭῆἦἧἮἯἢἣἪἫῃῌῄῂᾐᾑᾘᾙᾖᾗᾞᾟᾒᾚᾛὴηήΗΉᾓᾔᾕῇᾜᾝῊ]/u' => 'i',
        '/[θΘ]/u' => 'th',
        '/[ἰἱἸἹἴἵἼἽῖἶἷἾἿἲἳἺἻῒῗὶιίϊΐΙΊΪΐῐῑῚῘῙìÌíÍîÎïÏ]/u' => 'i',
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
        // International accents
        '/[áàȧâäǎăāãåąⱥấầắằǡǻǟẫẵảȁȃẩẳạḁậặæǽǣÁÀȦÂÄǍĂĀÃÅĄȺẤẦẮẰǠǺǞẪẴẢȀȂẨẲẠḀẬẶÆǼǢ]/iu' => 'a',
        '/[ḃƀɓḅḇƃḂɃƁḄḆƂ]/iu' => 'b',
        '/[ćċĉčçȼḉƈĆĊĈČÇȻḈƇ]/iu' => 'c',
        '/[ḋďḑđƌɗḍḓḏðǳǆḊĎḐĐƋƊḌḒḎÐǱǲǄǅ]/iu' => 'd',
        '/[éèėêëěĕēẽęȩɇếềḗḕễḝẻȅȇểẹḙḛệÉÈĖÊËĚĔĒẼĘȨɆẾỀḖḔỄḜẺȄȆỂẸḘḚỆ]/iu' => 'e',
        '/[ḟƒḞƑ℉]/iu' => 'f',
        '/[ǵġĝǧğḡģǥɠǴĠĜǦĞḠĢǤƓ]/iu' => 'g',
        '/[ḣĥḧȟḩħḥḫⱨḢĤḦȞḨĦḤḪⱧ]/iu' => 'h',
        '/[íìıîïǐĭīĩįɨḯỉȉȋịḭĳÍÌİÎÏǏĬĪĨĮƗḮỈȈȊỊḬĲ]/iu' => 'i',
        '/[ĵǰɉĴɈ]/iu' => 'j',
        '/[ḱǩķƙḳḵⱪḰǨĶƘḲḴⱩ]/iu' => 'k',
        '/[ĺŀľⱡļƚłḷḽḻḹǉĹĿĽⱠĻȽŁḶḼḺḸǇǈ]/iu' => 'l',
        '/[ḿṁṃḾṀṂ]/iu' => 'm',
        '/[ńǹṅňñņɲƞṇṋṉǌŋŃǸṄŇÑŅƝȠṆṊṈǊǋŊ]/iu' => 'n',
        '/[óòȯôöǒŏōõǫőốồøṓṑȱṍȫỗṏǿȭǭỏȍȏơổọớờỡộƣởợœÓÒȮÔÖǑŎŌÕǪŐỐỒØṒṐȰṌȪỖṎǾȬǬỎȌȎƠỔỌỚỜỠỘƢỞỢŒ]/iu' => 'o',
        '/[ṕṗᵽƥṔṖⱣƤ]/iu' => 'p',
        '/[ɋɊ]/iu' => 'q',
        '/[ŕṙřŗɍɽȑȓṛṟṝŔṘŘŖɌⱤȐȒṚṞṜ]/iu' => 'r',
        '/[śṡŝšşṥṧṣșṩßŚṠŜŠŞṤṦṢȘṨẞ]/iu' => 's',
        '/[ṫẗťţƭṭʈțṱṯⱦþŧṪŤŢƬṬƮȚṰṮȾÞŦ]/iu' => 't',
        '/[úùûüǔŭūũůųűʉǘǜǚṹǖṻủȕȗưụṳứừṷṵữửựÚÙÛÜǓŬŪŨŮŲŰɄǗǛǙṸǕṺỦȔȖƯỤṲỨỪṶṴỮỬỰ]/iu' => 'u',
        '/[ṽṿʋṼṾƲ]/iu' => 'v',
        '/[ẃẁẇŵẅẘẉⱳẂẀẆŴẄẈⱲ]/iu' => 'w',
        '/[ẋẍẊẌ]/iu' => 'x',
        '/[ýỳẏŷÿȳỹẙɏỷƴỵÝỲẎŶŸȲỸɎỶƳỴ]/iu' => 'y',
        '/[źżẑžƶȥẓẕⱬŹŻẐŽƵȤẒẔⱫ]/iu' => 'z',
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
    protected static $__simplified = [
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
            '/[ηΗ][υΥ]/u' => 'iu',
        ],
        'after' => [
            // Regular letters
            '/[ὐὑὙὔὕὝῦὖὗὒὓὛὺῒῧυύϋΰΥΎΫῢΰῠῡὟῪῨῩ]/u' => 'i',
        ],
    ];

    public function __construct()
    {
        $this->name = 'tvgreeklish';
        $this->tab = 'administration';
        $this->version = '1.0.8';
        $this->author = 'tivuno.com';
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        $this->displayName = $this->l('Greeklish module ”Nic”');
        $this->description = $this->l(
            'It converts string from greek to latin characters for the content in your project.'
        );
        parent::__construct();
    }

    public function install()
    {
        return parent::install() && $this->registerHooks();
    }

    private function registerHooks()
    {
        $hooks = [
            'actionCategoryAdd',
            'actionCategoryUpdate',
            'actionProductSave',
            'actionObjectSimpleBlogPostAddAfter',
            'actionObjectSimpleBlogPostUpdateAfter',
        ];
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
        foreach ($category->name as $language_id => $name) {
            if (array_key_exists($language_id, $category->link_rewrite)) {
                Db::getInstance()->update(
                    'category_lang',
                    [
                        'link_rewrite' => pSQL(self::convert($name)),
                    ],
                    'id_category = ' . (int) $category->id . ' AND `id_lang` = ' . (int) $language_id
                );
            }
        }
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
                Db::getInstance()->update(
                    'product_lang',
                    [
                        'link_rewrite' => pSQL(self::convert($name)),
                    ],
                    'id_product = ' . (int) $product->id . ' AND `id_lang` = ' . (int) $language_id
                );
            }
        }
    }

    public function hookDisplayImportCreationLanguageExtraFields()
    {
        return [ # One language per line?
            [
                'type' => 'radio',
                'label' => $this->l('Do you need the slug to be converted to greeklish?'),
                'name' => 'language_slug',
                'values' => [
                    [
                        'id' => 0,
                        'value' => 0,
                        'label' => $this->l('No conversion, every name is in plain english'),
                    ],
                    [
                        'id' => 1,
                        'value' => 1,
                        'label' => $this->l('Basic conversion from modern greek'),
                    ],
                    [
                        'id' => 2,
                        'value' => 2,
                        'label' => $this->l('Advanced conversion from ancient greek'),
                    ],
                ],
            ],
        ];
    }

    public function hookActionAddImportLanguageSettings()
    {
        return ['slug'];
    }

    public function hookActionObjectSimpleBlogPostAddAfter($params)
    {
        self::setSimpleBlogPostLinkRewrite($params);
    }

    public function hookActionObjectSimpleBlogPostUpdateAfter($params)
    {
        self::setSimpleBlogPostLinkRewrite($params);
    }

    private static function setSimpleBlogPostLinkRewrite($params)
    {
        $executed = self::$executed;
        if ($executed) {
            return;
        }

        self::$executed = true;
        $obj = $params['object'];
        foreach (Language::getLanguages(false, false, true) as $lang_id) {
            if (array_key_exists($lang_id, $obj->title)) {
                Db::getInstance()->update(
                    'simpleblog_post_lang',
                    [
                        'link_rewrite' => pSQL(self::convert($obj->title[$lang_id])),
                    ],
                    'id_product = ' . (int) $obj->id . ' AND `id_lang` = ' . (int) $lang_id
                );
            }
        }
    }

    /**
     * @param string $string
     * @param int $level
     * @param bool $slug
     * @param bool $uppercase
     * @return string
     */
    public static function convert(string $string, int $level = 1, bool $slug = true, bool $uppercase = false,): string
    {
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
            $string = mb_strtoupper($string, 'UTF-8');
        } else {
            $string = mb_strtolower($string, 'UTF-8');
        }
        if ($slug === true) {
            return self::toSlug($string);
        }

        return $string;
    }

    /**
     * @param string $string
     * @return string
     */
    public static function toSlug(string $string): string
    {
        $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
        $string = preg_replace('/[\s-]+/', ' ', $string);

        return preg_replace('/[\s_]/', '-', $string);;
    }
}
