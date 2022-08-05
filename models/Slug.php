<?php
/**
 * Slug module ”Nic”
 *
 * @author    Konstantinos A. Kogkalidis
 * @copyright 2018 - 2022 © tivuno PrestaShop specialists
 * @license   Basic license | One license per (sub)domain
 */

class Slug
{
    public static function initConversion($string): string
    {
        $string = mb_strtolower(urldecode($string), 'UTF-8');
        // Many spaces to one & space to dash conversion
        $string = preg_replace('!\s+!', ' ', str_replace(' ', '-', $string));
        return $string;
    }

    /**
     * It converts greeklish slug from ancient greek
     *
     * @param string $string
     * @return string
     */
    public static function fromAncient(string $string): string
    {
        // We convert poly-tonic to modern greek
        $string = self::initConversion($string);
        $expressions = [
            '/[ἀἁἂἃἄἅἆἇὰᾀᾁᾂᾃᾄᾅᾆᾇᾰᾱᾲᾳᾴᾶᾷ]/u' => 'α',
            '/[ἐἑἒἓἔἕὲ]/u' => 'ε',
            '/[ἠἡἢἣἤἥἦἧὴᾐᾑᾒᾓᾔᾕᾖᾗῂῃῄῆῇ]/u' => 'η',
            '/[ἰἱἲἳἴἵἶἷὶῐῑῒῖῗ]/u' => 'ι',
            '/[ὀὁὂὃὄὅὸ]/u' => 'ο',
            '/[ὐὑὒὓὔὕὖὗὺῠῡῢῦῧ]/u' => 'υ',
            '/[ὠὡὢὣὤὥὦὧὼᾠᾡᾢᾣᾤᾥᾦᾧῲῳῴῶῷ]/u' => 'ω',
        ];
        $string = preg_replace(array_keys($expressions), array_values($expressions), $string);
        $string = self::toSlug($string, false);
        return $string;
    }

    /**
     * It converts greeklish slug from modern greek
     *
     * @param string $in
     * @param boolean $init Set to false when converting from ancient, in order to avoid double execution
     * @return string
     */
    public static function toSlug(string $in, bool $init = true): string
    {
        if ($init) {
            $in = self::initConversion($in);
        }
        $diph_aei = ['α', 'ε', 'η'];
        $diph_yps = ['υ', 'ύ'];
        $diph_vita = [
            'α', 'ά', 'ε', 'έ', 'η', 'ή', 'ο', 'ό', 'ω', 'ώ',
            'ι', 'ί', 'ϊ', 'ΐ', 'υ', 'ύ', 'ϋ', 'ΰ',
            'β', 'γ', 'δ', 'ζ', 'λ', 'μ', 'ν', 'ρ',
        ];
        $diphthongs = ['γγ' => 'ng', 'γξ' => 'nx', 'γχ' => 'nch', 'ου' => 'ou', 'ού' => 'ou'];
        $doubles = ['θ' => 'th', 'χ' => 'ch', 'ψ' => 'ps'];
        $singles = [
            'α' => 'a', 'ά' => 'a',
            'β' => 'v',
            'γ' => 'g',
            'δ' => 'd',
            'ε' => 'e', 'έ' => 'e',
            'ζ' => 'z',
            'η' => 'i', 'ή' => 'i',
            # θ in doubles
            'ι' => 'i', 'ί' => 'i', 'ϊ' => 'i', 'ΐ' => 'i',
            'κ' => 'k',
            'λ' => 'l',
            'μ' => 'm',
            'ν' => 'n',
            'ξ' => 'x',
            'ο' => 'o', 'ό' => 'o',
            'π' => 'p',
            'ρ' => 'r',
            'σ' => 's', 'ς' => 's',
            'τ' => 't',
            'υ' => 'y', 'ύ' => 'y', 'ϋ' => 'y', 'ΰ' => 'y',
            'φ' => 'f',
            # χ in doubles
            # ψ in doubles
            'ω' => 'o', 'ώ' => 'o',
        ];
        $out = '';
        $l = mb_strlen($in);
        $i = 0;
        while ($i < $l) {
            $cm = $i > 0 ? mb_substr($in, $i - 1, 1) : '';
            $c0 = mb_substr($in, $i, 1);
            $c1 = mb_substr($in, $i + 1, 1);
            $c2 = mb_substr($in, $i + 2, 1);
            if (mb_strtolower($c0 . $c1) == 'μπ' && (mb_ereg('^\W$|^_$|^$', $cm) || mb_ereg('^\W$|^_$|^$', $c2))) {
                # μπ as b rule
                $out .= mb_strtoupper($c0) == $c0 ? mb_strtoupper('b') : 'b';
                $i += 2;
            } elseif (in_array(mb_strtolower($c0), $diph_aei) && in_array(mb_strtolower($c1), $diph_yps)) {
                # diphthong υ rule
                $t = $singles[mb_strtolower($c0)];
                $out .= mb_strtoupper($c0) == $c0 ? mb_strtoupper(mb_substr($t, 0, 1)) : mb_substr($t, 0, 1);
                if (in_array(mb_strtolower($c2), $diph_vita))
                    $out .= mb_strtoupper($c1) == $c1 ? mb_strtoupper('v') : 'v';
                else
                    $out .= mb_strtoupper($c1) == $c1 ? mb_strtoupper('f') : 'f';
                $i += 2;
            } elseif (array_key_exists(mb_strtolower($c0 . $c1), $diphthongs)) {
                # diphthongs rule
                $t = $diphthongs[mb_strtolower($c0 . $c1)];
                $out .= mb_strtoupper($c0) == $c0 ? mb_strtoupper(mb_substr($t, 0, 1)) : mb_substr($t, 0, 1);
                $t = mb_substr($t, 1);
                $out .= mb_strtoupper($c1) == $c1 ? mb_strtoupper($t) : $t;
                $i += 2;
            } elseif (array_key_exists(mb_strtolower($c0), $doubles)) {
                # doubles rule
                $t = $doubles[mb_strtolower($c0)];
                $out .= mb_strtoupper($c0) == $c0 ? mb_strtoupper(mb_substr($t, 0, 1)) : mb_substr($t, 0, 1);
                $t = mb_substr($t, 1);
                $out .= mb_strtoupper($c0 . $c1) == $c0 . $c1 ? mb_strtoupper($t) : $t;
                $i += 1;
            } elseif (array_key_exists(mb_strtolower($c0), $singles)) {
                # single rule
                $t = $singles[mb_strtolower($c0)];
                $out .= mb_strtoupper($c0) == $c0 ? mb_strtoupper($t) : $t;
                $i += 1;
            } else {
                # no rule
                $out .= $c0;
                $i += 1;
            }
        }
        $out = preg_replace("/[^a-z0-9-\s]+/i", "", $out);
        return $out;
    }
}
