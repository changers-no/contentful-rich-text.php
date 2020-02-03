<?php

/**
 * This file is part of the contentful/rich-text package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\RichText\NodeMapper;

use Contentful\Core\Api\Link;
use Contentful\Core\Api\LinkResolverInterface;
use Contentful\RichText\Node\EmbeddedEntryBlock as NodeClass;
use Contentful\RichText\Node\NodeInterface;
use Contentful\RichText\NodeMapper\Reference\EntryReference;
use Contentful\RichText\ParserInterface;

class EmbeddedEntryBlock implements NodeMapperInterface
{
    /**
     * {@inheritdoc}
     */
    public function map(ParserInterface $parser, LinkResolverInterface $linkResolver, array $data): NodeInterface
    {
        $linkData = $data['data']['target']['sys'];

        return new NodeClass(
            $parser->parseCollection($data['content']),
            new EntryReference(
                new Link($linkData['id'], $linkData['linkType']),
                $linkResolver
            )
        );
    }
}
