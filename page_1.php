<?php
/*
 * vim: ts=3 sw=3 et wrap co=150 go-=b
 */

require_once '_common/init.php';
require_once '_common/CommonHtml.php';

[$htmlHeader, $indent] = CommonHtml::getHtmlForHeaderPlusIndent('Page 1');

$html  = $htmlHeader;
$html .= CommonHtml::getHtmlForLoremIpsumParagraph($indent);
$html .= CommonHtml::getHtmlForPageLinksUl($indent);
$html .= CommonHtml::getHtmlForFooter();

echo $html;
?>
