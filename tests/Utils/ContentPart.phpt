<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";

    $contentPart = new \Ataccama\ContentManager\Utils\ContentPart("test");

    Assert::same("test", $contentPart->text);