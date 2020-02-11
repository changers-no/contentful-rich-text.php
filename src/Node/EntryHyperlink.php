<?php

/**
 * This file is part of the contentful/rich-text package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\RichText\Node;

use Contentful\Core\Resource\ResourceInterface;
use Contentful\RichText\NodeMapper\Reference\EntryReferenceInterface;

class EntryHyperlink extends InlineNode
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var EntryReferenceInterface
     */
    protected $reference;

    /**
     * AssetHyperlink constructor.
     *
     * @param NodeInterface[] $content
     */
    public function __construct(array $content, string $title, EntryReferenceInterface $reference)
    {
        parent::__construct($content);
        $this->title = $title;
        $this->reference = $reference;
    }

    public function getEntry(): ResourceInterface
    {
        return $this->reference->getEntry();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public static function getType(): string
    {
        return 'entry-hyperlink';
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'nodeType' => self::getType(),
            'data' => [
                'title' => $this->title,
                'target' => $this->reference,
            ],
            'content' => $this->content,
        ];
    }
}
