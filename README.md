## Greeklish module for PrestaShop 1.7.x

### _How to use manually_
Slug::fromAncient($string) will convert ancient (poly-tonic) greek to greeklish slug

Slug::toSlug($string) will convert modern greek to greeklish slug

### Changelog
#### v1.0.5 - 05 Aug 2022
- Bug: Many spaces were not being converted to single dash
#### v1.0.4 - 05 Aug 2022
- Feature: Can use regular or strict mode
- Improvement: Removed letters that existed in both of the conversion sets
Thanx to [@sanctusmob](https://www.prestashop.com/forums/topic/741223-%CE%B1%CF%85%CF%84%CF%8C%CE%BC%CE%B1%CF%84%CE%B7-%CE%B4%CE%B7%CE%BC%CE%B9%CE%BF%CF%85%CF%81%CE%B3%CE%AF%CE%B1-greeklish-url-%CE%B1%CF%80%CF%8C-%CF%84%CE%BF-%CF%8C%CE%BD%CE%BF%CE%BC%CE%B1-%CF%84%CE%BF%CF%85-%CF%80%CF%81%CE%BF%CF%8A%CF%8C%CE%BD%CF%84%CE%BF%CF%82/#comment-3405016)
