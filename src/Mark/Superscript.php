<?php

/**
 * This file is part of the contentful/rich-text package.
 *
 * @copyright 2015-2022 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\RichText\Mark;

class Superscript implements MarkInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getType(): string
    {
        return 'superscript';
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'object' => 'mark',
            'type' => self::getType(),
        ];
    }
}
