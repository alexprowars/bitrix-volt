<?php

Olympia\Volt\Engine::initialize();

function renderVoltTemplate($templateFile, $arResult, $arParams, $arLangMessages, $templateFolder, $parentTemplateFolder, $template)
{
	$templateFile = str_replace('.volt', '', $templateFile);

	echo Olympia\Volt\Engine::$_view->render($templateFile, 
	[
        'PARAMS'				=> $arParams,
        'RESULT'				=> $arResult,
        'LANG'					=> $arLangMessages,
        'template'				=> $template,
        'templateFolder'		=> $templateFolder,
        'parentTemplateFolder'	=> $parentTemplateFolder,
    ]);

    $component_epilog = $templateFolder . "/component_epilog.php";

    if (file_exists($_SERVER["DOCUMENT_ROOT"].$component_epilog))
    {
        $component = $template->__component;
        $component->SetTemplateEpilog([
            "epilogFile"		=> $component_epilog,
            "templateName"		=> $template->__name,
            "templateFile"		=> $template->__file,
            "templateFolder"	=> $template->__folder,
            "templateData"		=> false,
        ]);
    }
}