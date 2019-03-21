<?php

namespace O0h\RectorCakePHP37FixtureImport\Tests\Rector\FixtureName\SnakeToCamel;

class ClassImportingFixturesWithSnakeCasedName
{
    protected $fixtures = [
        'app.users',
        'App.tags',
        'plugin.posts',
        'plugin.messages/deleted_messages',
    ];
}

?>
-----
<?php

namespace O0h\RectorCakePHP37FixtureImport\Tests\Rector\FixtureName\SnakeToCamel;

class ClassImportingFixturesWithSnakeCasedName
{
    protected $fixtures = [
        'app.Users',
        'app.Tags',
        'plugin.Posts',
        'plugin.Messages/DeletedMessages',
    ];
}

?>
