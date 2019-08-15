<?php
namespace PHPReportMaker12\project1;
?>
<?php
namespace PHPReportMaker12\project1;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(1, "mi_avaliacoes", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("1", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "avaliacoesrpt.php", -1, "", IsLoggedIn() || AllowListMenu('{53975D99-68EC-47DF-8A09-F92A43852C9C}avaliacoes'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(2, "mi_avaliacoes_AVALIACOES___CLINICA_DA_FAMILIA_WALTER_BORGES", $ReportLanguage->phrase("ChartReportMenuItemPrefix") . $ReportLanguage->menuPhrase("2", "MenuText") . $ReportLanguage->phrase("ChartReportMenuItemSuffix"), "avaliacoesrpt.php#cht_avaliacoes_AVALIACOES___CLINICA_DA_FAMILIA_WALTER_BORGES", 1, "", IsLoggedIn() || AllowListMenu('{53975D99-68EC-47DF-8A09-F92A43852C9C}avaliacoes'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>