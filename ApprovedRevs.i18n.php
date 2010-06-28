<?php
/**
 * Internationalization file for the Approved Revs extension.
 *
 * @file
 * @ingroup Extensions
*/

$messages = array();

/** English
 * @author Yaron Koren
 */
$messages['en'] = array(
	// user messages
	'approvedrevs-desc' => 'Set a single revision of a page as approved',
	'approvedrevs-logname' => 'Revision approval log',
	'approvedrevs-logdesc' => 'This is the log of revisions that have been approved.',
	'approvedrevs-approve' => 'approve',
	'approvedrevs-unapprove' => 'unapprove',
	'approvedrevs-approvesuccess' => 'This revision of the page has been set as the approved version.',
	'approvedrevs-unapprovesuccess' => 'There is no longer an approved version for this page.
Instead, the most recent revision will be shown.',
	'approvedrevs-approveaction' => 'set $2 as the approved revision for "[[$1]]"',
	'approvedrevs-unapproveaction' => 'unset approved revision for "[[$1]]"',
	'approvedrevs-notlatest' => 'This is the approved revision of this page; it is not the most recent.',
	'approvedrevs-approvedandlatest' => 'This is the approved revision of this page, as well as being the most recent.',
	'approvedrevs-viewlatest' => 'View most recent revision.',
	'approvedpages' => 'Approved pages',
	'approvedrevs-approvedpages-docu' => 'The following are the pages in the wiki that have an approved revision.',
	'right-approverevisions' => 'Set a certain revision of a wiki page as approved',
	'right-viewlinktolatest' => 'View explanatory text at the top of pages that have an approved revision',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 */
$messages['qqq'] = array(
	'approvedrevs-approve' => '{{Identical|Approve}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'approvedrevs-approve' => 'keur goed',
	'approvedrevs-viewlatest' => 'Wys mees onlangse hersiening.',
	'approvedpages' => 'Goedgekeurde bladsye',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'approvedrevs-desc' => 'Зацьвердзіць адну вэрсію старонкі',
	'approvedrevs-logname' => 'Журнал зацьверджаньня вэрсіяў',
	'approvedrevs-logdesc' => 'Гэта журнал зацьверджаных вэрсіяў.',
	'approvedrevs-approve' => 'зацьвердзіць',
	'approvedrevs-unapprove' => 'адхіліць',
	'approvedrevs-approvesuccess' => 'Гэтая вэрсія старонкі была зацьверджаная.',
	'approvedrevs-unapprovesuccess' => 'Болей не існуе зацьверджанай вэрсіі гэтай старонкі.
Замест яе будзе паказаная апошняя вэрсія.',
	'approvedrevs-approveaction' => 'зацьвердзіць $2 як зацьверджаную вэрсію старонкі «[[$1]]»',
	'approvedrevs-unapproveaction' => 'зьняць зацьверджаньне з вэрсіі старонкі «[[$1]]»',
	'approvedrevs-notlatest' => 'Гэта зацьверджаная вэрсія гэтай старонкі; гэта не апошняя вэрсія.',
	'approvedrevs-approvedandlatest' => 'Гэта зацьверджаная вэрсія гэтай старонкі, адначасова яна зьяўляецца апошняй вэрсіяй.',
	'approvedrevs-viewlatest' => 'Паказаць апошнюю вэрсію.',
	'approvedpages' => 'Зацьверджаныя старонкі',
	'approvedrevs-approvedpages-docu' => 'Ніжэй пададзеныя старонкі {{GRAMMAR:родны|{{SITENAME}}}}, якія маюць зацьверджаныя вэрсіі.',
	'right-approverevisions' => 'зацьверджаньне вызначаных вэрсіяў вікі-старонак',
);

/** Finnish (Suomi)
 * @author Centerlink
 * @author Crt
 * @author Nike
 */
$messages['fi'] = array(
	'approvedrevs-desc' => 'Aseta yksittäinen sivuversio hyväksytyksi',
	'approvedrevs-logname' => 'Versiohyväksynnän loki',
	'approvedrevs-logdesc' => 'Tämä on hyväksyttyjen versioiden loki.',
	'approvedrevs-approve' => 'hyväksy',
	'approvedrevs-unapprove' => 'älä hyväksy',
	'approvedrevs-approvesuccess' => 'Tämä sivuversio on asetettu hyväksytyksi versioksi.',
	'approvedrevs-unapprovesuccess' => 'Tästä sivusta ei ole enää hyväksyttyä versiota.
Sen sijaan, viimeisin versio näytetään.',
	'approvedrevs-notlatest' => 'Tämä on  tämän sivun hyväksytty versio; se ei ole viimeisin.',
	'approvedrevs-approvedandlatest' => 'Tämä on tämän sivun hyväksytty ja samalla viimeisin versio.',
	'approvedrevs-viewlatest' => 'Näytä viimeisin versio.',
	'approvedpages' => 'Hyväksytyt sivut',
	'approvedrevs-approvedpages-docu' => 'Seuraavat ovat wikisivuja, joilla on hyväksytty versio.',
	'right-approverevisions' => 'Asettaa wikisivun tietty versio hyväksytyksi',
	'right-viewlinktolatest' => 'Nähdä selittävä teksti niiden sivujen yläosassa, joilla on hyväksytty versio',
);

/** French (Français)
 * @author Peter17
 */
$messages['fr'] = array(
	'approvedrevs-desc' => 'Marquer une seule révision d’une page comme approuvée',
	'approvedrevs-logname' => 'Journal des approbations de révisions',
	'approvedrevs-logdesc' => 'Ceci est le journal des révisions qui ont été marquées comme approuvées.',
	'approvedrevs-approve' => 'approuver',
	'approvedrevs-unapprove' => 'désapprouver',
	'approvedrevs-approvesuccess' => 'Cette révision de la page a été marquée comme étant la version approuvée.',
	'approvedrevs-unapprovesuccess' => 'Il n’y a plus de version approuvée de cette page.
Au lieu de cela, la révision la plus récente sera affichée.',
	'approvedrevs-approveaction' => 'a marqué $2 comme la révision approuvée de « [[$1]] »',
	'approvedrevs-unapproveaction' => 'a annulé le marquage d’une révision approuvée pour « [[$1]] »',
	'approvedrevs-notlatest' => 'Ceci est la révision approuvée de cette page. Ce n’est pas la plus récente.',
	'approvedrevs-approvedandlatest' => 'Ceci est la révision approuvée de la page, et aussi la plus récente.',
	'approvedrevs-viewlatest' => 'Voir la révision la plus récente.',
	'approvedpages' => 'Pages approuvées',
	'approvedrevs-approvedpages-docu' => 'Voici les pages du wiki qui ont une révision approuvée.',
	'right-approverevisions' => 'Marquer une révision précise d’une page comme approuvée',
	'right-viewlinktolatest' => 'Voir le texte explicatif en haut des pages qui ont une révision approuvée',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'approvedrevs-desc' => 'Marcar un sol version de un pagina como approbate',
	'approvedrevs-logname' => 'Registro de approbation de versiones',
	'approvedrevs-logdesc' => 'Isto es le registro del versiones que ha essite approbate.',
	'approvedrevs-approve' => 'approbar',
	'approvedrevs-unapprove' => 'disapprobar',
	'approvedrevs-approvesuccess' => 'Iste version del pagina ha essite marcate como le version approbate.',
	'approvedrevs-unapprovesuccess' => 'Il non ha plus un version approbate de iste pagina.
In loco de isto, le version le plus recente essera monstrate.',
	'approvedrevs-approveaction' => 'marcava $2 como le version approbate de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'dismarcava le version approbate de "[[$1]]"',
	'approvedrevs-notlatest' => 'Isto es le version approbate de iste pagina; non es le plus recente.',
	'approvedrevs-approvedandlatest' => 'Isto es le version approbate de iste pagina, e tamben le plus recente.',
	'approvedrevs-viewlatest' => 'Vider le version le plus recente.',
	'approvedpages' => 'Paginas approbate',
	'approvedrevs-approvedpages-docu' => 'Le sequente paginas in le wiki ha un version approbate.',
	'right-approverevisions' => 'Marcar un certe version de un pagina wiki como approbate',
	'right-viewlinktolatest' => 'Vider le texto explicative in alto del paginas que ha un version approbate',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'approvedrevs-desc' => 'Eng eenzel Versioun vun enger Säit als nogekuckt markéieren',
	'approvedrevs-logname' => 'Logbuch vun den nogekuckt Säiten déi fräigi sinn',
	'approvedrevs-logdesc' => "Dëst ass d'Logbuch vun de Versiounen déi nogekuckt sinn.",
	'approvedrevs-approve' => 'zoustëmmen',
	'approvedrevs-approvesuccess' => 'Dës Versioun vun der Säit gouf als nogekuckte Versioun fräiginn.',
	'approvedrevs-unapprovesuccess' => 'Et gëtt vun dëser Säit  keng nogekuckte Versioun méi.
Dofir gëtt déi rezentst Versioun gewisen.',
	'approvedrevs-viewlatest' => 'Déi rezentst Versioun weisen.',
	'approvedpages' => 'Nogekuckte Säiten',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'approvedrevs-desc' => 'Поставање на една единствена ревизија на страницата како одобрена',
	'approvedrevs-logname' => 'Дневник на одобрени ревизии',
	'approvedrevs-logdesc' => 'Ова е дневникот на одобрени ревизии.',
	'approvedrevs-approve' => 'одобри',
	'approvedrevs-unapprove' => 'неодобрена',
	'approvedrevs-approvesuccess' => 'Оваа ревизија на страницата е поставена како одобрена.',
	'approvedrevs-unapprovesuccess' => 'Оваа страница повеќе нема одобрена верзија.
Наместо тоа ќе се прикажува најновата верзија.',
	'approvedrevs-approveaction' => 'постави ја $2 за одобрена верзија на „[[$1]]“',
	'approvedrevs-unapproveaction' => 'отстрани одобрена верзија на „[[$1]]“',
	'approvedrevs-notlatest' => 'Ова е одобрената ревизија на страницава, но не е најновата.',
	'approvedrevs-approvedandlatest' => 'Ова е одобрената ревизија на страницава, а воедно и најновата.',
	'approvedrevs-viewlatest' => 'Види најнова ревизија.',
	'approvedpages' => 'Одобрени страници',
	'approvedrevs-approvedpages-docu' => 'Ова се страници на викито што имаат одобрена ревизија.',
	'right-approverevisions' => 'Поставете извесна ревизија на вики-страница како одобрена',
	'right-viewlinktolatest' => 'Погледајте го објаснувањето на врвот од страниците што имаат одобрена верзија',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'approvedrevs-desc' => 'Een versie van een pagina als goedgekeurd instellen',
	'approvedrevs-logname' => 'Logboek versiegoedkeuring',
	'approvedrevs-logdesc' => 'Dit is het logboek met de versies die zijn goedgekeurd.',
	'approvedrevs-approve' => 'goedkeuren',
	'approvedrevs-unapprove' => 'afkeuren',
	'approvedrevs-approvesuccess' => 'Deze versie van de pagina is ingesteld als de goedgekeurde versie.',
	'approvedrevs-unapprovesuccess' => 'Deze pagina heeft niet langer een goedgekeurde versie.
Daarom wordt de laatste versie weergegeven.',
	'approvedrevs-approveaction' => 'heeft $2 ingesteld als de goedgekeurde versie voor "[[$1]]"',
	'approvedrevs-unapproveaction' => 'heeft de goedgekeurde versie verwijderd voor "[[$1]]"',
	'approvedrevs-notlatest' => 'Dit is de goedgekeurde versie van deze pagina.
Het is niet de meeste recente versie.',
	'approvedrevs-approvedandlatest' => 'Dit is de goedgekeurde versie van deze pagina. Er is geen nieuwere versie.',
	'approvedrevs-viewlatest' => 'Laatste versie bekijken',
	'approvedpages' => "Goedgekeurde pagina's",
	'approvedrevs-approvedpages-docu' => "De volgende pagina's in de wiki hebben een goedgekeurde versie.",
	'right-approverevisions' => 'Een versie van een wikipagina markeren als goedgekeurd.',
	'right-viewlinktolatest' => "De verklarende tekst bovenaan pagina's zien die die een goedgekeurde versie hebben",
);

/** Portuguese (Português)
 * @author Alchimista
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'approvedrevs-desc' => 'Marcar como aprovada uma das revisões de uma página',
	'approvedrevs-logname' => 'Registo de revisões aprovadas',
	'approvedrevs-logdesc' => 'Este é o registo das revisões que foram aprovadas.',
	'approvedrevs-approve' => 'aprovar',
	'approvedrevs-unapprove' => 'reprovar',
	'approvedrevs-approvesuccess' => 'Esta revisão da página foi definida como a versão aprovada.',
	'approvedrevs-unapprovesuccess' => 'Deixou de existir uma versão aprovada para esta página.
Em vez dela, será apresentada a revisão mais recente.',
	'approvedrevs-approveaction' => 'definir $2 como a revisão aprovada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desfazer a definição da revisão aprovada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisão aprovada desta página; não é a revisão mais recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisão aprovada desta página e também a revisão mais recente.',
	'approvedrevs-viewlatest' => 'Ver a revisão mais recente.',
	'approvedpages' => 'Páginas aprovadas',
	'approvedrevs-approvedpages-docu' => 'As seguintes páginas desta wiki têm uma revisão aprovada.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que têm uma revisão aprovada',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'approvedrevs-desc' => 'Установка одной из версий страниц как подтверждённой',
	'approvedrevs-logname' => 'Журнал подтверждения версий',
	'approvedrevs-logdesc' => 'Это журнал версий страниц, которые были подтверждены.',
	'approvedrevs-approve' => 'подтвердить',
	'approvedrevs-unapprove' => 'снять подтверждение',
	'approvedrevs-approvesuccess' => 'Это версия страницы была отмечена как подтверждённая.',
	'approvedrevs-unapprovesuccess' => 'Не существует подтверждённой версии этой страницы.
Вместо неё будет показана последняя версия.',
	'approvedrevs-approveaction' => 'установить $2 как подтверждённую версию «[[$1]]»',
	'approvedrevs-unapproveaction' => 'снять утверждённую версию для «[[$1]]»',
	'approvedrevs-notlatest' => 'Это утверждённая версия страницы. Существуют более свежие версии.',
	'approvedrevs-approvedandlatest' => 'Это утверждённая версия страницы. Она же является наиболее свежей версией.',
	'approvedrevs-viewlatest' => 'Просмотреть самую свежую версию.',
	'approvedpages' => 'Подтверждённые страницы',
	'approvedrevs-approvedpages-docu' => 'Ниже показан список вики-страниц, имеющих подтверждённые версии.',
	'right-approverevisions' => 'отметка определённых версий вики-страниц как подтверждённых',
	'right-viewlinktolatest' => 'просмотр пояснительного текста в верхней части страниц, имеющих утверждённые версии',
);

