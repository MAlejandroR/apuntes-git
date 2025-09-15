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

namespace PhpOffice\PhpWord\Writer\Word2007\Part;

/**
 * Word2007 theme writer: word/theme/theme1.xml
 *
 * @todo Generate content dynamically
 * @since 0.10.0
 */
class Theme extends AbstractPart
{
    /**
     * Write part
     *
     * @return string
     */
    public function write()
    {
        $str = '';

        $str .= '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
        $str .= '<a:theme xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" name="Office Theme">';
        $str .= '<a:themeElements>';
        $str .= $this->writeColorScheme();
        $str .= $this->writeFontScheme();
        $str .= $this->writeFormatScheme();
        $str .= '</a:themeElements>';
        $str .= '<a:objectDefaults />';
        $str .= '<a:extraClrSchemeLst />';
        $str .= '</a:theme>';

        return $str;
    }

    /**
     * Write color scheme
     *
     * @return string
     */
    private function writeColorScheme()
    {
        $str = '';

        $str .= '<a:clrScheme name="Office">';
        $str .= '<a:dk1>';
        $str .= '<a:sysClr val="windowText" lastClr="000000" />';
        $str .= '</a:dk1>';
        $str .= '<a:lt1>';
        $str .= '<a:sysClr val="window" lastClr="FFFFFF" />';
        $str .= '</a:lt1>';
        $str .= '<a:dk2>';
        $str .= '<a:srgbClr val="1F497D" />';
        $str .= '</a:dk2>';
        $str .= '<a:lt2>';
        $str .= '<a:srgbClr val="EEECE1" />';
        $str .= '</a:lt2>';
        $str .= '<a:accent1>';
        $str .= '<a:srgbClr val="4F81BD" />';
        $str .= '</a:accent1>';
        $str .= '<a:accent2>';
        $str .= '<a:srgbClr val="C0504D" />';
        $str .= '</a:accent2>';
        $str .= '<a:accent3>';
        $str .= '<a:srgbClr val="9BBB59" />';
        $str .= '</a:accent3>';
        $str .= '<a:accent4>';
        $str .= '<a:srgbClr val="8064A2" />';
        $str .= '</a:accent4>';
        $str .= '<a:accent5>';
        $str .= '<a:srgbClr val="4BACC6" />';
        $str .= '</a:accent5>';
        $str .= '<a:accent6>';
        $str .= '<a:srgbClr val="F79646" />';
        $str .= '</a:accent6>';
        $str .= '<a:hlink>';
        $str .= '<a:srgbClr val="0000FF" />';
        $str .= '</a:hlink>';
        $str .= '<a:folHlink>';
        $str .= '<a:srgbClr val="800080" />';
        $str .= '</a:folHlink>';
        $str .= '</a:clrScheme>';

        return $str;
    }

    /**
     * Write fonts scheme
     *
     * @return string
     */
    private function writeFontScheme()
    {
        $str = '';

        $str .= '<a:fontScheme name="Office">';

        $str .= '<a:majorFont>';
        $str .= '<a:latin typeface="Cambria" />';
        $str .= '<a:ea typeface="" />';
        $str .= '<a:cs typeface="" />';
        $str .= '<a:fonts script="Jpan" typeface="ＭＳ ゴシック" />';
        $str .= '<a:fonts script="Hang" typeface="맑은 고딕" />';
        $str .= '<a:fonts script="Hans" typeface="宋体" />';
        $str .= '<a:fonts script="Hant" typeface="新細明體" />';
        $str .= '<a:fonts script="Arab" typeface="Times New Roman" />';
        $str .= '<a:fonts script="Hebr" typeface="Times New Roman" />';
        $str .= '<a:fonts script="Thai" typeface="Angsana New" />';
        $str .= '<a:fonts script="Ethi" typeface="Nyala" />';
        $str .= '<a:fonts script="Beng" typeface="Vrinda" />';
        $str .= '<a:fonts script="Gujr" typeface="Shruti" />';
        $str .= '<a:fonts script="Khmr" typeface="MoolBoran" />';
        $str .= '<a:fonts script="Knda" typeface="Tunga" />';
        $str .= '<a:fonts script="Guru" typeface="Raavi" />';
        $str .= '<a:fonts script="Cans" typeface="Euphemia" />';
        $str .= '<a:fonts script="Cher" typeface="Plantagenet Cherokee" />';
        $str .= '<a:fonts script="Yiii" typeface="Microsoft Yi Baiti" />';
        $str .= '<a:fonts script="Tibt" typeface="Microsoft Himalaya" />';
        $str .= '<a:fonts script="Thaa" typeface="MV Boli" />';
        $str .= '<a:fonts script="Deva" typeface="Mangal" />';
        $str .= '<a:fonts script="Telu" typeface="Gautami" />';
        $str .= '<a:fonts script="Taml" typeface="Latha" />';
        $str .= '<a:fonts script="Syrc" typeface="Estrangelo Edessa" />';
        $str .= '<a:fonts script="Orya" typeface="Kalinga" />';
        $str .= '<a:fonts script="Mlym" typeface="Kartika" />';
        $str .= '<a:fonts script="Laoo" typeface="DokChampa" />';
        $str .= '<a:fonts script="Sinh" typeface="Iskoola Pota" />';
        $str .= '<a:fonts script="Mong" typeface="Mongolian Baiti" />';
        $str .= '<a:fonts script="Viet" typeface="Times New Roman" />';
        $str .= '<a:fonts script="Uigh" typeface="Microsoft Uighur" />';
        $str .= '</a:majorFont>';

        $str .= '<a:minorFont>';
        $str .= '<a:latin typeface="Calibri" />';
        $str .= '<a:ea typeface="" />';
        $str .= '<a:cs typeface="" />';
        $str .= '<a:fonts script="Jpan" typeface="ＭＳ 明朝" />';
        $str .= '<a:fonts script="Hang" typeface="맑은 고딕" />';
        $str .= '<a:fonts script="Hans" typeface="宋体" />';
        $str .= '<a:fonts script="Hant" typeface="新細明體" />';
        $str .= '<a:fonts script="Arab" typeface="Arial" />';
        $str .= '<a:fonts script="Hebr" typeface="Arial" />';
        $str .= '<a:fonts script="Thai" typeface="Cordia New" />';
        $str .= '<a:fonts script="Ethi" typeface="Nyala" />';
        $str .= '<a:fonts script="Beng" typeface="Vrinda" />';
        $str .= '<a:fonts script="Gujr" typeface="Shruti" />';
        $str .= '<a:fonts script="Khmr" typeface="DaunPenh" />';
        $str .= '<a:fonts script="Knda" typeface="Tunga" />';
        $str .= '<a:fonts script="Guru" typeface="Raavi" />';
        $str .= '<a:fonts script="Cans" typeface="Euphemia" />';
        $str .= '<a:fonts script="Cher" typeface="Plantagenet Cherokee" />';
        $str .= '<a:fonts script="Yiii" typeface="Microsoft Yi Baiti" />';
        $str .= '<a:fonts script="Tibt" typeface="Microsoft Himalaya" />';
        $str .= '<a:fonts script="Thaa" typeface="MV Boli" />';
        $str .= '<a:fonts script="Deva" typeface="Mangal" />';
        $str .= '<a:fonts script="Telu" typeface="Gautami" />';
        $str .= '<a:fonts script="Taml" typeface="Latha" />';
        $str .= '<a:fonts script="Syrc" typeface="Estrangelo Edessa" />';
        $str .= '<a:fonts script="Orya" typeface="Kalinga" />';
        $str .= '<a:fonts script="Mlym" typeface="Kartika" />';
        $str .= '<a:fonts script="Laoo" typeface="DokChampa" />';
        $str .= '<a:fonts script="Sinh" typeface="Iskoola Pota" />';
        $str .= '<a:fonts script="Mong" typeface="Mongolian Baiti" />';
        $str .= '<a:fonts script="Viet" typeface="Arial" />';
        $str .= '<a:fonts script="Uigh" typeface="Microsoft Uighur" />';
        $str .= '</a:minorFont>';

        $str .= '</a:fontScheme>';

        return $str;
    }

    /**
     * Write format scheme
     *
     * @return string
     */
    private function writeFormatScheme()
    {
        $str = '';

        $str .= '<a:fmtScheme name="Office">';
        $str .= $this->writeFormatFill();
        $str .= $this->writeFormatLine();
        $str .= $this->writeFormatEffect();
        $str .= $this->writeFormatBackground();
        $str .= '</a:fmtScheme>';

        return $str;
    }

    /**
     * Write fill format scheme
     *
     * @return string
     */
    private function writeFormatFill()
    {
        $str = '';

        $str .= '<a:fillStyleLst>';
        $str .= '<a:solidFill>';
        $str .= '<a:schemeClr val="phClr" />';
        $str .= '</a:solidFill>';
        $str .= '<a:gradFill rotWithShape="1">';
        $str .= '<a:gsLst>';
        $str .= '<a:gs pos="0">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:tint val="50000" />';
        $str .= '<a:satMod val="300000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="35000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:tint val="37000" />';
        $str .= '<a:satMod val="300000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="100000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:tint val="15000" />';
        $str .= '<a:satMod val="350000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '</a:gsLst>';
        $str .= '<a:lin ang="16200000" scaled="1" />';
        $str .= '</a:gradFill>';
        $str .= '<a:gradFill rotWithShape="1">';
        $str .= '<a:gsLst>';
        $str .= '<a:gs pos="0">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:shade val="51000" />';
        $str .= '<a:satMod val="130000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="80000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:shade val="93000" />';
        $str .= '<a:satMod val="130000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="100000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:shade val="94000" />';
        $str .= '<a:satMod val="135000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '</a:gsLst>';
        $str .= '<a:lin ang="16200000" scaled="0" />';
        $str .= '</a:gradFill>';
        $str .= '</a:fillStyleLst>';

        return $str;
    }

    /**
     * Write line format scheme
     *
     * @return string
     */
    private function writeFormatLine()
    {
        $str = '';

        $str .= '<a:lnStyleLst>';
        $str .= '<a:ln w="9525" cap="flat" cmpd="sng" algn="ctr">';
        $str .= '<a:solidFill>';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:shade val="95000" />';
        $str .= '<a:satMod val="105000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:solidFill>';
        $str .= '<a:prstDash val="solid" />';
        $str .= '</a:ln>';
        $str .= '<a:ln w="25400" cap="flat" cmpd="sng" algn="ctr">';
        $str .= '<a:solidFill>';
        $str .= '<a:schemeClr val="phClr" />';
        $str .= '</a:solidFill>';
        $str .= '<a:prstDash val="solid" />';
        $str .= '</a:ln>';
        $str .= '<a:ln w="38100" cap="flat" cmpd="sng" algn="ctr">';
        $str .= '<a:solidFill>';
        $str .= '<a:schemeClr val="phClr" />';
        $str .= '</a:solidFill>';
        $str .= '<a:prstDash val="solid" />';
        $str .= '</a:ln>';
        $str .= '</a:lnStyleLst>';

        return $str;
    }

    /**
     * Write effect format scheme
     *
     * @return string
     */
    private function writeFormatEffect()
    {
        $str = '';

        $str .= '<a:effectStyleLst>';
        $str .= '<a:effectStyle>';
        $str .= '<a:effectLst>';
        $str .= '<a:outerShdw blurRad="40000" dist="20000" dir="5400000" rotWithShape="0">';
        $str .= '<a:srgbClr val="000000">';
        $str .= '<a:alpha val="38000" />';
        $str .= '</a:srgbClr>';
        $str .= '</a:outerShdw>';
        $str .= '</a:effectLst>';
        $str .= '</a:effectStyle>';
        $str .= '<a:effectStyle>';
        $str .= '<a:effectLst>';
        $str .= '<a:outerShdw blurRad="40000" dist="23000" dir="5400000" rotWithShape="0">';
        $str .= '<a:srgbClr val="000000">';
        $str .= '<a:alpha val="35000" />';
        $str .= '</a:srgbClr>';
        $str .= '</a:outerShdw>';
        $str .= '</a:effectLst>';
        $str .= '</a:effectStyle>';
        $str .= '<a:effectStyle>';
        $str .= '<a:effectLst>';
        $str .= '<a:outerShdw blurRad="40000" dist="23000" dir="5400000" rotWithShape="0">';
        $str .= '<a:srgbClr val="000000">';
        $str .= '<a:alpha val="35000" />';
        $str .= '</a:srgbClr>';
        $str .= '</a:outerShdw>';
        $str .= '</a:effectLst>';
        $str .= '<a:scene3d>';
        $str .= '<a:camera prst="orthographicFront">';
        $str .= '<a:rot lat="0" lon="0" rev="0" />';
        $str .= '</a:camera>';
        $str .= '<a:lightRig rig="threePt" dir="t">';
        $str .= '<a:rot lat="0" lon="0" rev="1200000" />';
        $str .= '</a:lightRig>';
        $str .= '</a:scene3d>';
        $str .= '<a:sp3d>';
        $str .= '<a:bevelT w="63500" h="25400" />';
        $str .= '</a:sp3d>';
        $str .= '</a:effectStyle>';
        $str .= '</a:effectStyleLst>';

        return $str;
    }

    /**
     * Write background format scheme
     *
     * @return string
     */
    private function writeFormatBackground()
    {
        $str = '';

        $str .= '<a:bgFillStyleLst>';
        $str .= '<a:solidFill>';
        $str .= '<a:schemeClr val="phClr" />';
        $str .= '</a:solidFill>';
        $str .= '<a:gradFill rotWithShape="1">';
        $str .= '<a:gsLst>';
        $str .= '<a:gs pos="0">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:tint val="40000" />';
        $str .= '<a:satMod val="350000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="40000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:tint val="45000" />';
        $str .= '<a:shade val="99000" />';
        $str .= '<a:satMod val="350000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="100000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:shade val="20000" />';
        $str .= '<a:satMod val="255000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '</a:gsLst>';
        $str .= '<a:path path="circle">';
        $str .= '<a:fillToRect l="50000" t="-80000" r="50000" b="180000" />';
        $str .= '</a:path>';
        $str .= '</a:gradFill>';
        $str .= '<a:gradFill rotWithShape="1">';
        $str .= '<a:gsLst>';
        $str .= '<a:gs pos="0">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:tint val="80000" />';
        $str .= '<a:satMod val="300000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '<a:gs pos="100000">';
        $str .= '<a:schemeClr val="phClr">';
        $str .= '<a:shade val="30000" />';
        $str .= '<a:satMod val="200000" />';
        $str .= '</a:schemeClr>';
        $str .= '</a:gs>';
        $str .= '</a:gsLst>';
        $str .= '<a:path path="circle">';
        $str .= '<a:fillToRect l="50000" t="50000" r="50000" b="50000" />';
        $str .= '</a:path>';
        $str .= '</a:gradFill>';
        $str .= '</a:bgFillStyleLst>';

        return $str;
    }
}
