<?php
/**
 * Greeklish PrestaShop module - Nic
 *
 * @author    tivuno.com <hi@tivuno.com>
 * @copyright 2018 - 2024 © tivuno.com
 * @license   https://tivuno.com/blog/business-news/basic-license
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class Tvgreeklish extends Module
{
    public static $executed = false;
    protected static $basic = [
        // Special symbols
        '/["]/iu' => ' inches',
        '/[ἀἁᾶἄἅἆἇἂἃᾳᾴᾲᾀᾁᾷᾆᾇᾂᾃὰαάᾄᾅᾰᾱἈἉἌἍἎἏἊἋᾼᾈᾉᾎᾏᾊᾋΑΆᾌᾍᾺᾸᾹ]/u' => 'a',
        '/[βΒ]/u' => 'v',
        '/[γΓ]/u' => 'g',
        '/[δΔ]/u' => 'd',
        '/[ἐἑἔἕἒἓὲεέἘἙἜἝἚἛΕΈ]/u' => 'e',
        '/[ζΖ]/u' => 'z',
        '/[ἠἡἤἥῆἦἧἢἣῃῄῂᾐᾑᾖᾗᾒὴηήᾓᾔᾕῇἨἩἬἭἮἯἪἫῌᾘᾙᾞᾟᾚᾛΗΉᾜᾝῊ]/u' => 'i',
        '/[θΘ]/u' => 'th',
        '/[ἰἱἴἵῖἶἷἲἳῒῗὶιίϊΐΐῐῑἸἹἼἽἾἿἺἻΙΊΪῚῘῙΪ]/u' => 'i',
        '/[κΚ]/u' => 'k',
        '/[λΛ]/u' => 'l',
        '/[μΜ]/u' => 'm',
        '/[νΝ]/u' => 'n',
        '/[ξΞ]/u' => 'x',
        '/[ὀὁὄὅὂὃὸοόὈὉὌὍὊὋΟΌῸ]/u' => 'o',
        '/[πΠ]/u' => 'p',
        '/[ρΡ]/u' => 'r',
        '/[σςΣ]/u' => 's',
        '/[τΤ]/u' => 't',
        '/[ὐὑὔὕῦὖὗὒὓὺῧυύϋΰῢΰῠῡὙὝὛΥΎΫὟῪῨῩ]/u' => 'y',
        '/[φΦ]/iu' => 'f',
        '/[χΧ]/u' => 'ch',
        '/[ψΨ]/u' => 'ps',
        '/[ὠὡὤὥῶὦὧὢὣῳᾠᾡᾤᾥᾦᾧᾢᾣὼωώῲῷῴὨὩὬὭὮὯὪὫῼᾨᾩᾬᾭᾮᾯᾪᾫ]/iu' => 'o',
        // International accents
        '/[áàȧâäǎăāãåąⱥấầắằǡǻǟẫẵảȁȃẩẳạḁậặæǽǣÁÀȦÂÄǍĂĀÃÅĄȺẤẦẮẰǠǺǞẪẴẢȀȂẨẲẠḀẬẶÆǼǢ]/iu' => 'a',
        '/[ḃƀɓḅḇƃḂɃƁḄḆƂ]/iu' => 'b',
        '/[ćċĉčçȼḉƈɔ̃ĆĊĈČÇȻḈƇ]/iu' => 'c',
        '/[ḋďḑđƌɗḍḓḏðǳǆḊĎḐĐƋƊḌḒḎÐǱǲǄǅ]/iu' => 'd',
        '/[éèėêëěĕēẽęȩɇếềḗḕễḝẻȅȇểẹḙḛệɛÉÈĖÊËĚĔĒẼĘȨɆẾỀḖḔỄḜẺȄȆỂẸḘḚỆƐ]/iu' => 'e',
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
        '/[śṡŝšşṥṧṣșṩßʂɕŚṠŜŠŞṤṦṢȘṨẞꟅ]/iu' => 's',
        '/[ṫẗťţƭṭʈțṱṯⱦþŧt͡ṪŤŢƬṬƮȚṰṮȾÞŦT͡]/iu' => 't',
        '/[úùûüǔŭūũůųűʉǘǜǚṹǖṻủȕȗưụṳứừṷṵữửựÚÙÛÜǓŬŪŨŮŲŰɄǗǛǙṸǕṺỦȔȖƯỤṲỨỪṶṴỮỬỰ]/iu' => 'u',
        '/[ṽṿʋṼṾƲ]/iu' => 'v',
        '/[ẃẁẇŵẅẘẉⱳẂẀẆŴẄẈⱲ]/iu' => 'w',
        '/[ẋẍẊẌ]/iu' => 'x',
        '/[ýỳẏŷÿȳỹẙɏỷƴỵÝỲẎŶŸȲỸɎỶƳỴ]/iu' => 'y',
        '/[źżẑžƶȥẓẕⱬʐŹŻẐŽƵȤẒẔⱫʐ]/iu' => 'z',
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
        '/[Ϊ][́]/u' => 'i', // Really rare case eg. Παΐσιος in uppercase
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
        $this->version = '1.1.0';
        $this->author = 'tivuno.com';
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_,
        ];
        $this->bootstrap = true;
        $this->displayName = $this->l('Greeklish PrestaShop module - Nic');
        $this->description = $this->l(
            'It converts string from greek (either with accents or not) and accented latin to plain latin characters for the content in your project.'
        );
        parent::__construct();
    }

    public function install()
    {
        require_once _PS_MODULE_DIR_ . 'tvcore/tvcore.php';

        return parent::install() && Tvcore::registerHooks($this->name);
    }

    public function hookDisplayImportCreationLanguageExtraFields()
    {
        return [
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

    public function hookActionObjectProductAddBefore(&$params)
    {
        self::setLinkRewrite($params);
    }

    public function hookActionObjectProductUpdateBefore(&$params)
    {
        self::setLinkRewrite($params);
    }

    public function hookActionObjectCategoryAddBefore(&$params)
    {
        self::setLinkRewrite($params);
    }

    public function hookActionObjectCategoryUpdateBefore(&$params)
    {
        self::setLinkRewrite($params);
    }

    public function hookActionObjectSimpleBlogCategoryAddBefore(&$params)
    {
        self::setLinkRewrite($params);
    }

    public function hookActionObjectSimpleBlogCategoryUpdateBefore(&$params)
    {
        self::setLinkRewrite($params);
    }

    public function hookActionObjectMetaUpdateBefore(&$params)
    {
        self::setLinkRewrite($params, 'title', 'url_rewrite');
    }

    public function hookActionObjectSimpleBlogPostAddBefore(&$params)
    {
        self::setLinkRewrite($params, 'title');
    }

    public function hookActionObjectSimpleBlogPostUpdateBefore(&$params)
    {
        self::setLinkRewrite($params, 'title');
    }

    private static function setLinkRewrite($params, $name_field = 'name', $link_rewrite_field = 'link_rewrite')
    {
        $executed = self::$executed;
        if ($executed) {
            return;
        }

        self::$executed = true;
        //Tvimport::debug($params['object']->name);
        foreach (Language::getLanguages(false, false, true) as $lang_id) {
            if (array_key_exists($lang_id, $params['object']->{$name_field})) {
                $name = $params['object']->{$name_field}[$lang_id];
                if ($name === null) {
                    $name = $params['object']->{$name_field}[(int) Configuration::get('PS_LANG_DEFAULT')];
                }
                $params['object']->{$link_rewrite_field}[$lang_id] = pSQL(self::convert($name));
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
    public static function convert(string $string, int $level = 1, bool $slug = true, bool $uppercase = false)
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

    public static function toSlug(string $string): string
    {
        // Replaces all spaces with hyphens
        $string = str_replace(' ', '-', $string);

        // Removes special chars
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

        // Replaces multiple hyphens with single one
        return preg_replace('/-+/', '-', $string);
    }
}
