<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/Language.php";

    $language = new \Ataccama\ContentManager\Utils\Language(5, 'cs');

    Assert::same(5, $language->id);
    Assert::same('cs', $language->short);

    \Ataccama\ContentManager\Utils\Language::setDefaults(8, "sk");

    $defaultLanguage = \Ataccama\ContentManager\Utils\Language::default();

    Assert::same(\Ataccama\ContentManager\Utils\Language::$DEFAULT_ID, $defaultLanguage->id);
    Assert::same(\Ataccama\ContentManager\Utils\Language::$DEFAULT_SHORT, $defaultLanguage->short);