<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\ODText\Style;

/**
 * Font style writer
 *
 * @since 0.10.0
 */
class Font extends AbstractStyle
{
    /**
     * Write style.
     */
    public function write()
    {
        $style = $this->getStyle();
        if (!$style instanceof \PhpOffice\PhpWord\Style\Font) {
            return;
        }
        $xmlWriter = $this->getXmlWriter();

        $xmlWriter->startElement('style:style');
        $xmlWriter->writeAttribute('style:name', $style->getStyleName());
        $xmlWriter->writeAttribute('style:family', 'text');
        $xmlWriter->startElement('style:text-properties');

        // Name
        $font = $style->getName();
        $xmlWriter->writeAttributeIf($font != '', 'style:fonts-name', $font);
        $xmlWriter->writeAttributeIf($font != '', 'style:fonts-name-complex', $font);
        $size = $style->getSize();

        // Size
        $xmlWriter->writeAttributeIf(is_numeric($size), 'fo:fonts-size', $size . 'pt');
        $xmlWriter->writeAttributeIf(is_numeric($size), 'style:fonts-size-asian', $size . 'pt');
        $xmlWriter->writeAttributeIf(is_numeric($size), 'style:fonts-size-complex', $size . 'pt');

        // Color
        $color = $style->getColor();
        $xmlWriter->writeAttributeIf($color != '', 'fo:color', '#' . $color);

        // Bold & italic
        $xmlWriter->writeAttributeIf($style->isBold(), 'fo:fonts-weight', 'bold');
        $xmlWriter->writeAttributeIf($style->isBold(), 'style:fonts-weight-asian', 'bold');
        $xmlWriter->writeAttributeIf($style->isItalic(), 'fo:fonts-style', 'italic');
        $xmlWriter->writeAttributeIf($style->isItalic(), 'style:fonts-style-asian', 'italic');
        $xmlWriter->writeAttributeIf($style->isItalic(), 'style:fonts-style-complex', 'italic');

        // Underline
        // @todo Various mode of underline
        $underline = $style->getUnderline();
        $xmlWriter->writeAttributeIf($underline != 'none', 'style:text-underline-style', 'solid');

        // Strikethrough, double strikethrough
        $xmlWriter->writeAttributeIf($style->isStrikethrough(), 'style:text-line-through-type', 'single');
        $xmlWriter->writeAttributeIf($style->isDoubleStrikethrough(), 'style:text-line-through-type', 'double');

        // Small caps, all caps
        $xmlWriter->writeAttributeIf($style->isSmallCaps(), 'fo:fonts-variant', 'small-caps');
        $xmlWriter->writeAttributeIf($style->isAllCaps(), 'fo:text-transform', 'uppercase');

        //Hidden text
        $xmlWriter->writeAttributeIf($style->isHidden(), 'text:display', 'none');

        // Superscript/subscript
        $xmlWriter->writeAttributeIf($style->isSuperScript(), 'style:text-position', 'super');
        $xmlWriter->writeAttributeIf($style->isSubScript(), 'style:text-position', 'sub');

        // @todo Foreground-Color

        // @todo Background color

        $xmlWriter->endElement(); // style:text-properties
        $xmlWriter->endElement(); // style:style
    }
}
