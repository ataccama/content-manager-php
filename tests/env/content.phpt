<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $content = new \Ataccama\ContentManager\Env\Content(1, "default",
        new \Ataccama\ContentManager\Env\Language(1, "eng"), "Test content");

    Assert::same("Test content", $content->body);
    Assert::same(1, $content->id);
    Assert::same(1, $content->language->id);
    Assert::same('eng', $content->language->isoCode);

    $content->tags[] = new \Ataccama\ContentManager\Env\Tag(3, "Three");

    $content->addModifier(new \Ataccama\ContentManager\Modifiers\Changer(['Test'], ['New']));

    $contentContainer = new \Ataccama\ContentManager\Env\ContentContainer();
    $contentContainer->add($content);

    Assert::same("Test content", $contentContainer->default->body); // not modified
    Assert::same("New content", "$contentContainer->default"); // modified
    Assert::same("New content", $contentContainer->default->body); // stays modified

    Assert::same("Three", $contentContainer->default->tags[0]->name);

    $content = new \Ataccama\ContentManager\Env\Content(2, "foo", new \Ataccama\ContentManager\Env\Language(2, "cs"),
        "Old content");

    $contentContainer->add($content);

    $contentContainer->addModifier(new \Ataccama\ContentManager\Modifiers\Changer(['Test', 'content'],
        ['New', 'nothing']));

    Assert::same("New nothing", "$contentContainer->default");
    Assert::same("Old nothing", "$contentContainer->foo");

    Assert::count(2, $contentContainer);