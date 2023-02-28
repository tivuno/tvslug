# PrestaShop Greeklish module ”Nic”

## _How to use manually_

Tvgreeklish::convert($string, $level, $slug, $uppercase)

- $string: the genuine string
- $level: 0 => regular mode, 1 => advanced mode, 2 => super advanced mode\
Eg ”επικοινωνία” becomes ”epikinonia” in mode 2 which lets us get rid of most of the mis-spelling issues
- $slug: false => regular string, true => slug
- $uppercase: false => lowercase, true => uppercase

### Changelog

#### v1.0.7 - Tuesday, 28 Feb 2023

- Feature: Compatibility with PrestaShop v8 verified
- Bug: Improper ELOT conversion noted by [@sanctusmob](https://www.prestashop.com/forums/topic/741223-%CE%B1%CF%85%CF%84%CF%8C%CE%BC%CE%B1%CF%84%CE%B7-%CE%B4%CE%B7%CE%BC%CE%B9%CE%BF%CF%85%CF%81%CE%B3%CE%AF%CE%B1-greeklish-url-%CE%B1%CF%80%CF%8C-%CF%84%CE%BF-%CF%8C%CE%BD%CE%BF%CE%BC%CE%B1-%CF%84%CE%BF%CF%85-%CF%80%CF%81%CE%BF%CF%8A%CF%8C%CE%BD%CF%84%CE%BF%CF%82/#comment-3405016)

#### v1.0.6 - Friday, 09 Dec 2022

- Feature: Super advanced mode added
- Feature: Conversion choices of uppercase/lowercase & regular string/slug

#### v1.0.5 - Friday, 05 Aug 2022

- Bug: Many spaces were not being converted to single dash

#### v1.0.4 - Friday, 05 Aug 2022

- Feature: Regular/advanced mode
- Improvement: Removed letters that existed in both of the conversion sets, thanx to [@sanctusmob](https://www.prestashop.com/forums/topic/741223-%CE%B1%CF%85%CF%84%CF%8C%CE%BC%CE%B1%CF%84%CE%B7-%CE%B4%CE%B7%CE%BC%CE%B9%CE%BF%CF%85%CF%81%CE%B3%CE%AF%CE%B1-greeklish-url-%CE%B1%CF%80%CF%8C-%CF%84%CE%BF-%CF%8C%CE%BD%CE%BF%CE%BC%CE%B1-%CF%84%CE%BF%CF%85-%CF%80%CF%81%CE%BF%CF%8A%CF%8C%CE%BD%CF%84%CE%BF%CF%82/#comment-3405016)
