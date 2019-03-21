<?php declare(strict_types=1);

namespace O0h\CakePHP37Rector\Rector\FixtureName;

use Cake\Utility\Inflector;
use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use Rector\NodeTypeResolver\Node\Attribute;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\CodeSample;
use Rector\RectorDefinition\RectorDefinition;

/**
 * Class FixtureImportRector
 * Replace underscored fixture names to CamelCase-ed names.
 *
 * @package O0h\RectorCakePHP37FixtureImport\Rector
 * @see https://github.com/cakephp/cakephp/pull/12560
 */
final class SnakeToCamel extends AbstractRector
{

    public function getDefinition(): RectorDefinition
    {
        new CodeSample(
            <<<'CODE_SAMPLE'
class SomeTest
{
    protected $fixtures = [
        'app.posts',
        'app.users',
        'some_plugin.posts/deleted_posts',
    ];
CODE_SAMPLE
            ,
            <<<'CODE_SAMPLE'
class SomeTest
{
    protected $fixtures = [
         'app.Posts',
         'app.Users',
         'SomePlugin.Posts/DeletedPosts',
    ];
CODE_SAMPLE
        );
    }

    /**
     * @inheritDoc
     */
    public function getNodeTypes(): array
    {
        return [Property::class];
    }

    /**
     * @param Property $node
     * @return Node|null
     */
    public function refactor(Node $node): ?Node
    {
        $classNode = $node->getAttribute(Attribute::CLASS_NODE);
        if ($classNode === null) {
            return null;
        }
        if (!$this->isName($node, 'fixtures')) {
            return null;
        }

        foreach ($node->props as &$prop) {
            foreach ($prop->default as &$items) {
               /** @var Node\Expr\ArrayItem $item  */
                foreach ($items as &$item) {
                    if (!$item->value instanceof Node\Scalar\String_) {
                        continue;
                    }
                    $value = $item->value;
                    [$prefix, $table] = explode('.', $value->value);
                    $table = array_map(
                        function ($token) {
                            return Inflector::camelize($token);
                        },
                        explode('/', $table)
                    );
                    $table = implode('/', $table);
                    $newValue = Inflector::variable($prefix) . '.' . $table;
                    $item->value = new Node\Scalar\String_($newValue, $item->value->getAttributes());
                }
            }
        }

        return $node;
    }
}