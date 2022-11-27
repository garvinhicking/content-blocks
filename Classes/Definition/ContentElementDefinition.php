<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\ContentBlocks\Definition;

final class ContentElementDefinition extends TypeDefinition
{
    private string $description = '';
    private string $contentElementIcon = '';
    private string $contentElementIconOverlay = '';
    private bool $saveAndClose = false;

    public static function createFromArray(array $array, string $table = 'tt_content'): static
    {
        $array['typeField'] = 'CType';
        // $self = parent::createFromArray($array, $table);
        $self = new static();
        $self->initParentCreateFromArray($array, $table);
        return $self
            ->withDescription($array['description'] ?? '')
            ->withContentElementIcon($array['contentElementIcon'] ?? '')
            ->withContentElementIconOverlay($array['contentElementIconOverlay'] ?? '')
            ->withSaveAndClose(!empty($array['saveAndClose']));
    }

    protected static function initParentCreateFromArray(array $array, string $table = 'tt_content'): void
    {
        parent::createFromArray($array, $table);
    }

    public function toArray(): array
    {
        $array = parent::toArray();
        $array += [
            'description' => $this->description,
            'contentElementIcon' => $this->contentElementIcon,
            'contentElementIconOverlay' => $this->contentElementIconOverlay,
            'saveAndClose' => $this->saveAndClose,
        ];
        return $array;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getContentElementIcon(): string
    {
        return $this->contentElementIcon;
    }

    public function getContentElementIconOverlay(): string
    {
        return $this->contentElementIconOverlay;
    }

    public function hasSaveAndClose(): bool
    {
        return $this->saveAndClose;
    }

    public function withDescription(string $description): self
    {
        $clone = clone $this;
        $clone->description = $description;
        return $clone;
    }

    public function withContentElementIcon(string $contentElementIcon): self
    {
        $clone = clone $this;
        $clone->contentElementIcon = $contentElementIcon;
        return $clone;
    }

    public function withContentElementIconOverlay(string $contentElementIconOverlay): self
    {
        $clone = clone $this;
        $clone->contentElementIconOverlay = $contentElementIconOverlay;
        return $clone;
    }

    public function withSaveAndClose(bool $saveAndClose): self
    {
        $clone = clone $this;
        $clone->saveAndClose = $saveAndClose;
        return $clone;
    }
}
