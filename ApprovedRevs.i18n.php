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
	'approvedrevs-unapprovesuccess2' => 'There is no longer an approved version for this page.
Instead, a blank page will be shown.',
	'approvedrevs-approveaction' => 'set $2 as the approved revision for "[[$1]]"',
	'approvedrevs-unapproveaction' => 'unset approved revision for "[[$1]]"',
	'approvedrevs-notlatest' => 'This is the approved revision of this page; it is not the most recent.',
	'approvedrevs-approvedandlatest' => 'This is the approved revision of this page, as well as being the most recent.',
	'approvedrevs-viewlatest' => 'View most recent revision.',
	'approvedrevs-blankpageshown' => 'No revision has been approved for this page.',
	'approvedrevs-editwarning' => 'Please note that you are now editing the latest revision of this page, which is not the approved one shown by default.',
	'approvedpages' => 'Approved pages',
	'approvedrevs-approvedpages-docu' => 'The following are the pages in the wiki that have an approved revision.',
	'unapprovedpages' => 'Unapproved pages',
	'approvedrevs-unapprovedpages-docu' => 'The following are the pages in the wiki that do not have an approved revision.',
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

/** Arabic (العربية)
 * @author Moemin05
 */
$messages['ar'] = array(
	'approvedrevs-approve' => 'موافقة',
	'approvedrevs-unapprove' => 'إزالة موافقة',
	'approvedpages' => 'صفحات تمّت الموافقة عليها',
	'approvedrevs-approvedpages-docu' => 'صفحات الويكي التالية لها مراجعات موافق عليها.',
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
	'approvedrevs-unapprovesuccess2' => 'Болей не існуе зацьверджанай вэрсіі гэтай старонкі.
Замест яе будзе паказаная пустая старонка.',
	'approvedrevs-approveaction' => 'зацьвердзіць $2 як зацьверджаную вэрсію старонкі «[[$1]]»',
	'approvedrevs-unapproveaction' => 'зьняць зацьверджаньне з вэрсіі старонкі «[[$1]]»',
	'approvedrevs-notlatest' => 'Гэта зацьверджаная вэрсія гэтай старонкі; гэта не апошняя вэрсія.',
	'approvedrevs-approvedandlatest' => 'Гэта зацьверджаная вэрсія гэтай старонкі, адначасова яна зьяўляецца апошняй вэрсіяй.',
	'approvedrevs-viewlatest' => 'Паказаць апошнюю вэрсію.',
	'approvedrevs-blankpageshown' => 'Для гэтай старонкі няма зацьверджанай вэрсіі.',
	'approvedrevs-editwarning' => 'Калі ласка, памятайце, што зараз Вы рэдагуеце апошнюю вэрсію гэтай старонкі, якая яшчэ не зьяўляецца зацьверджанай і не паказваецца па змоўчваньні.',
	'approvedpages' => 'Зацьверджаныя старонкі',
	'approvedrevs-approvedpages-docu' => 'Ніжэй пададзеныя старонкі {{GRAMMAR:родны|{{SITENAME}}}}, якія маюць зацьверджаныя вэрсіі.',
	'unapprovedpages' => 'Незацьверджаныя старонкі',
	'approvedrevs-unapprovedpages-docu' => 'Ніжэй пададзеныя старонкі {{GRAMMAR:родны|{{SITENAME}}}}, якія ня маюць зацьверджаных вэрсіяў.',
	'right-approverevisions' => 'зацьверджаньне вызначаных вэрсіяў вікі-старонак',
	'right-viewlinktolatest' => 'прагляд тлумачальнага тэксту ў версе старонак, якія маюць зацьверджаныя вэрсіі',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'approvedrevs-desc' => 'Na verkañ nemet un adweladenn eus ur bajenn evel aprouet',
	'approvedrevs-logname' => 'Marilh aprouadennoù an adweladennoù',
	'approvedrevs-logdesc' => 'Hemañ eo Marilh an adweladennoù bet aprouet.',
	'approvedrevs-approve' => 'aprouiñ',
	'approvedrevs-unapprove' => 'dizaprouiñ',
	'approvedrevs-approvesuccess' => 'An adweladenn-mañ eus ar bajenn eo zo bet merket evel ar stumm aprouet.',
	'approvedrevs-unapprovesuccess' => "N'eus stumm aprouet ebet ken eus ar bajenn-mañ.
En e lec'h e vo lakaet an adweladenn nevesañ.",
	'approvedrevs-unapprovesuccess2' => "N'eus stumm aprouet ebet ken eus ar bajenn-mañ.
En e lec'h e vo lakaet ur bajenn wenn.",
	'approvedrevs-approveaction' => 'en deus merket $2 evel adweladenn aprouet "[[$1]]"',
	'approvedrevs-unapproveaction' => 'en deus nullet merkadur un adweladenn aprouet evit "[[$1]]"',
	'approvedrevs-notlatest' => "Homañ eo an adweladenn aprouet evit ar bajenn-mañ; n'eo ket ar stumm nevesañ.",
	'approvedrevs-approvedandlatest' => "Homañ eo an adweladenn aprouet evit ar bajenn-mañ; bez' eo ivez ar stumm nevesañ.",
	'approvedrevs-viewlatest' => 'Gwelet an adweladenn diwezhañ.',
	'approvedrevs-blankpageshown' => "N'eus bet aprouet adweladenn ebet evit ar bajenn-mañ.",
	'approvedrevs-editwarning' => "Taolit evezh emaoc'h o tegas kemmoù e stumm diwezhañ ar bajenn-mañ; n'eo ket hemañ ar stumm aprouet zo lakaet war wel dre ziouer.",
	'approvedpages' => 'Pajennoù aprouet',
	'approvedrevs-approvedpages-docu' => 'Setu aze pajennoù ar wiki zo bet aprouet un adweladenn anezho.',
	'unapprovedpages' => "Pajennoù n'int ket bet aprouet",
	'approvedrevs-unapprovedpages-docu' => "Setu aze pajennoù ar wiki n'eus bet aprouet adweladenn ebet anezho.",
	'right-approverevisions' => 'Merkañ un adweladenn bennak eus ur bajenn wiki evel aprouet',
	'right-viewlinktolatest' => 'Gwelet an destenn displegañ e penn uhelañ ar pajennoù zo bet aprouet un adweladenn anezho',
);

/** Bosnian (Bosanski)
 * @author CERminator
 * @author Palapa
 */
$messages['bs'] = array(
	'approvedrevs-desc' => 'Postavljanje jedne revizije stranice kao odobrene',
	'approvedrevs-logname' => 'Zapisnik odobravanje revizija',
	'approvedrevs-logdesc' => 'Ovo je zapis revizija koje su odobrene.',
	'approvedrevs-approve' => 'odobri',
	'approvedrevs-unapprove' => 'neodobreno',
	'approvedrevs-approvesuccess' => 'Ova revizija stranice je postavljena kao odobrena verzija.',
	'approvedrevs-unapprovesuccess' => 'Više ne postoji odobrena verzija ove stranice.
Umjesto toga, zadnja revizija će biti prikazana.',
	'approvedrevs-unapprovesuccess2' => 'Više ne postoji odobrena verzija ove stranice.
Umjesto toga, bit će prikazana prazna stranica.',
	'approvedrevs-approveaction' => 'postavi $2 kao odobrenu reviziju za "[[$1]]"',
	'approvedrevs-unapproveaction' => 'ukloni odobrenu reviziju za "[[$1]]"',
	'approvedrevs-notlatest' => 'Ovo je odobrena verzija ove stranice; to nije najnovija verzija.',
	'approvedrevs-approvedandlatest' => 'Ovo je odobrena verzija ove stranice, a ujedno i najnovija.',
	'approvedrevs-viewlatest' => 'Pogledaj zadnju reviziju.',
	'approvedrevs-blankpageshown' => 'Nijedna revizija nije odobrena za ovu stranicu.',
	'approvedrevs-editwarning' => 'Molimo vas da imate u vidu da sada uređujete posljednju reviziju ove stranice, koja nije odobrena što je prikazano po postavkama.',
	'approvedpages' => 'Odobrene stranice',
	'approvedrevs-approvedpages-docu' => 'Slijede stranice na ovoj wiki koje imaju odobrene revizije.',
	'unapprovedpages' => 'Neodobrene stranice',
	'approvedrevs-unapprovedpages-docu' => 'Slijede stranice na wiki koje nemaju odobrene revizije.',
	'right-approverevisions' => 'Postavi određenu reviziju wiki stranice kao odobrenu',
	'right-viewlinktolatest' => 'Vidi tekst objašnjenja na vrhu stranica koje imaju odobrenu reviziju',
);

/** Czech (Česky) */
$messages['cs'] = array(
	'approvedrevs-approve' => 'schválit',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'approvedrevs-desc' => 'Ermöglicht es, stets eine bestimmte Version einer Seite als bestätigte Version anzuzeigen',
	'approvedrevs-logname' => 'Versionsbestätigungs-Logbuch',
	'approvedrevs-logdesc' => 'In diesem Logbuch werden die Versionsbestätigungen von Seiten protokolliert.',
	'approvedrevs-approve' => 'bestätigen',
	'approvedrevs-unapprove' => 'ablehnen',
	'approvedrevs-approvesuccess' => 'Diese Version der Seite wurde als bestätigte Version festgelegt.',
	'approvedrevs-unapprovesuccess' => 'Nunmehr gibt es keine bestätigte Version dieser Seite.
Stattdessen wird die neueste Version angezeigt.',
	'approvedrevs-unapprovesuccess2' => 'Nunmehr gibt es keine bestätigte Version dieser Seite.
Stattdessen wird eine leere Seite angezeigt.',
	'approvedrevs-approveaction' => '$2 als bestätigte Version für „[[$1]]“ festlegen',
	'approvedrevs-unapproveaction' => 'bestätigte Version für „[[$1]]“ zurücknehmen',
	'approvedrevs-notlatest' => 'Dies ist die bestätigte Version dieser Seite, allerdings nicht die neueste Version.',
	'approvedrevs-approvedandlatest' => 'Dies ist die bestätigte sowie die neueste Version dieser Seite.',
	'approvedrevs-viewlatest' => 'Die neueste Version ansehen.',
	'approvedrevs-blankpageshown' => 'Keine Version dieser Seite wurde bislang bestätigt.',
	'approvedrevs-editwarning' => 'Beachte bitte, dass du gerade die neueste Version dieser Seite bearbeitest. Sie entspricht nicht der bestätigten Version, die standardmäßig angezeigt wird.',
	'approvedpages' => 'Bestätigte Seiten',
	'approvedrevs-approvedpages-docu' => 'Die folgenden Seiten sind die Seiten dieses Wikis, die eine bestätigte Version haben.',
	'unapprovedpages' => 'Nicht bestätigte Seiten',
	'approvedrevs-unapprovedpages-docu' => 'Die folgenden Seiten sind die Seiten dieses Wikis, die keine bestätigte Version haben.',
	'right-approverevisions' => 'Eine bestimmte Version einer Wikiseite als bestätigt festlegen',
	'right-viewlinktolatest' => 'Erläuternde Hinweise im Kopf der Seiten anzeigen, die eine bestätigte Version haben.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'approvedrevs-desc' => 'Wěstu wersiju boka ako pśizwólonu nastajiś',
	'approvedrevs-logname' => 'Protokol pśizwólonych wersijow',
	'approvedrevs-logdesc' => 'To jo protokol wersijow, kótarež su se pśizwólili.',
	'approvedrevs-approve' => 'pśizwóliś',
	'approvedrevs-unapprove' => 'zakazaś',
	'approvedrevs-approvesuccess' => 'Toś ta wersija boka jo se ako pśizwólona wersija nastajiła.',
	'approvedrevs-unapprovesuccess' => 'Njejo wěcej pśizwólona wersija za toś ten bok.
Město togo nejnowša wersija se pokažo.',
	'approvedrevs-approveaction' => '$2 ako pśizwólonu wersiju za "[[$1]]" nastajiś',
	'approvedrevs-unapproveaction' => 'Pśizwólonu wersiju za "[[$1]]" anulěrowaś',
	'approvedrevs-notlatest' => 'To jo pśizwólona wersija toś togo boka; njejo nejnowša.',
	'approvedrevs-approvedandlatest' => 'To jo pśizwólona wersija toś togo boka a teke nejnowša.',
	'approvedrevs-viewlatest' => 'Nejnowšu wersiju pokazaś',
	'approvedpages' => 'Pśizwólone boki',
	'approvedrevs-approvedpages-docu' => 'Slědujuce boki we wikiju maju pśizwólonu wersiju.',
	'right-approverevisions' => 'Wěstu wersiju wikiboka ako pśizwólonu nastajiś',
	'right-viewlinktolatest' => 'Tekst wujasnjenja górjejce na bokach pokazaś, kótarež maju pśizwólonu wersiju',
);

/** Greek (Ελληνικά)
 * @author Περίεργος
 */
$messages['el'] = array(
	'approvedrevs-desc' => 'Καθορίζει μια ενιαία αναθεώρηση μιας σελίδας όπως έχει εγκριθεί',
	'approvedrevs-logname' => 'Ημερολόγιο καταγραφής της αποδοχής των αναθεωρήσεων',
	'approvedrevs-logdesc' => 'Αυτό είναι το ημερολόγιο των αναθεωρήσεων που έχουν εγκριθεί.',
	'approvedrevs-approve' => 'έγκριση',
	'approvedrevs-unapprove' => 'μη έγκριση',
	'approvedrevs-approvesuccess' => 'Αυτή η αναθεώρηση της σελίδας έχει οριστεί ως η εγκεκριμένη έκδοση.',
	'approvedrevs-unapprovesuccess' => 'Δεν υπάρχει πλέον μια εγκεκριμένη έκδοση για αυτή τη σελίδα.
Σε αντικατάσταση, θα εμφανιστεί η πιο πρόσφατη αναθεώρηση.',
	'approvedrevs-notlatest' => 'Αυτή είναι η εγκεκριμένη αναθεώρηση αυτής της σελίδας· δεν είναι η πιο πρόσφατη.',
	'approvedrevs-approvedandlatest' => 'Αυτή είναι η εγκεκριμένη αναθεώρηση αυτής της σελίδας, καθώς και η πιο πρόσφατη.',
	'approvedrevs-viewlatest' => 'Δείτε την πιο πρόσφατη αναθεώρηση.',
	'approvedpages' => 'Εγκεκριμένες σελίδες',
	'approvedrevs-approvedpages-docu' => 'Οι ακόλουθες σελίδες είναι αυτές που έχουν εγκεκριμένη αναθεώρηση σε αυτό το βίκι.',
	'right-viewlinktolatest' => 'Προβολή επεξηγηματικού κειμένου στο επάνω μέρος των σελίδων που έχουν εγκεκριμένη αναθεώρηση',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'approvedrevs-approve' => 'aprobi',
	'approvedrevs-unapprove' => 'malaprobi',
	'approvedrevs-approvesuccess' => 'Ĉi tiu revizio de la paĝo estis aprobita kiel la aprobita versio.',
	'approvedrevs-unapprovesuccess' => 'Ne plu estas aprobita versio por ĉi tiu paĝo.
Anstataŭe, la plej lasta revizio estos montrita.',
	'approvedpages' => 'Aprobitaj paĝoj',
	'approvedrevs-approvedpages-docu' => 'Jen paĝoj en la vikio kiu havas aprobitan revizion.',
	'unapprovedpages' => 'Malaprobitaj paĝoj',
	'approvedrevs-unapprovedpages-docu' => 'Jen paĝoj en la vikio tiu ne havas aprobitan revizion.',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Locos epraix
 * @author Translationista
 */
$messages['es'] = array(
	'approvedrevs-desc' => 'Establecer una revisión única de una página como aprovada',
	'approvedrevs-logname' => 'Registro de revisiones aprobadas',
	'approvedrevs-logdesc' => 'Este es el registro de las revisiones que han sido aprobadas.',
	'approvedrevs-approve' => 'aprobar',
	'approvedrevs-unapprove' => 'desaprobar',
	'approvedrevs-approvesuccess' => 'Esta revisión de la página ha sido establecida como la versión aprobada.',
	'approvedrevs-unapprovesuccess' => 'Ya no hay una versión aprobada para esta página.
En su lugar, se muestra la revisión más reciente.',
	'approvedrevs-unapprovesuccess2' => 'Ya no hay una versión aprobada para esta página. 
En su lugar, se mostrará una página en blanco.',
	'approvedrevs-approveaction' => 'establecer $2 como la revisión aprobada para para "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desestablecer la revisión aprobada para "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta es la revisión aprobada de esta página, no es la más reciente.',
	'approvedrevs-approvedandlatest' => 'Esta es la revisión aprobada de esta página, siendo también la más reciente.',
	'approvedrevs-viewlatest' => 'Ver revisión más reciente.',
	'approvedrevs-blankpageshown' => 'No se ha aprobado una revisión de esta página.',
	'approvedrevs-editwarning' => 'Tenga en cuenta que ahora está editando la última revisión de esta página, que no es la aprobada, que es la que se muestra de forma predeterminada.',
	'approvedpages' => 'Páginas aprobadas',
	'approvedrevs-approvedpages-docu' => 'Las siguientes son las páginas en la wiki que tienen una versión aprobada.',
	'unapprovedpages' => 'Páginas reprobadas',
	'approvedrevs-unapprovedpages-docu' => 'Las siguientes son las páginas en la wiki que tienen una versión aprobada.',
	'right-approverevisions' => 'Establecer una cierta revisión de una página wiki como aprobada',
	'right-viewlinktolatest' => 'Ver texto explicativo en la parte superior de las páginas que tienen una revisión aprobada',
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
À la place, la révision la plus récente sera affichée.',
	'approvedrevs-unapprovesuccess2' => 'Il n’y a plus de version approuvée de cette page.
À la place, une page vide sera affichée.',
	'approvedrevs-approveaction' => 'a marqué $2 comme la révision approuvée de « [[$1]] »',
	'approvedrevs-unapproveaction' => 'a annulé le marquage d’une révision approuvée pour « [[$1]] »',
	'approvedrevs-notlatest' => 'Ceci est la révision approuvée de cette page. Ce n’est pas la plus récente.',
	'approvedrevs-approvedandlatest' => 'Ceci est la révision approuvée de la page, et aussi la plus récente.',
	'approvedrevs-viewlatest' => 'Voir la révision la plus récente.',
	'approvedrevs-blankpageshown' => 'Aucune version n’a été approuvée pour cette page.',
	'approvedrevs-editwarning' => "Veuillez noter que vous modifiez actuellement la dernière version de cette page, qui n'est pas celle approuvée affichée par défaut.",
	'approvedpages' => 'Pages approuvées',
	'approvedrevs-approvedpages-docu' => 'Voici les pages du wiki qui ont une révision approuvée.',
	'unapprovedpages' => 'Pages non approuvées',
	'approvedrevs-unapprovedpages-docu' => 'Voici les pages du wiki qui n’ont pas de révision approuvée.',
	'right-approverevisions' => 'Marquer une révision précise d’une page comme approuvée',
	'right-viewlinktolatest' => 'Voir le texte explicatif en haut des pages qui ont une révision approuvée',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'approvedrevs-logname' => 'Jornal de les aprobacions de vèrsions',
	'approvedrevs-approve' => 'aprovar',
	'approvedrevs-unapprove' => 'dèsaprovar',
	'approvedrevs-approveaction' => 'at marcâ $2 coment la vèrsion aprovâ de « [[$1]] »',
	'approvedrevs-unapproveaction' => 'at anulâ lo marcâjo d’una vèrsion aprovâ por « [[$1]] »',
	'approvedrevs-viewlatest' => 'Vêre la vèrsion la ples novèla.',
	'approvedpages' => 'Pâges aprovâs',
	'unapprovedpages' => 'Pâges pas aprovâs',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'approvedrevs-desc' => 'Marcar como aprobada unha única revisión dunha páxina',
	'approvedrevs-logname' => 'Rexistro de aprobación de revisións',
	'approvedrevs-logdesc' => 'Este é o rexistro das revisións aprobadas.',
	'approvedrevs-approve' => 'aprobar',
	'approvedrevs-unapprove' => 'desaprobar',
	'approvedrevs-approvesuccess' => 'Esta é a revisión aprobada da páxina.',
	'approvedrevs-unapprovesuccess' => 'Esta páxina xa non ten ningunha versión aprobada.
No canto dela, móstrase a revisión máis recente.',
	'approvedrevs-unapprovesuccess2' => 'Esta páxina xa non ten ningunha versión aprobada.
No canto dela, móstrase unha páxina en branco.',
	'approvedrevs-approveaction' => 'marcou $2 como a revisión aprobada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'anulou unha revisión aprobada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisión aprobada da páxina, pero non é a máis recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisión aprobada da páxina, e tamén a máis recente.',
	'approvedrevs-viewlatest' => 'Ollar a revisión máis recente.',
	'approvedrevs-blankpageshown' => 'Esta páxina non ten ningunha revisión aprobada.',
	'approvedrevs-editwarning' => 'Teña en conta que está a editar a última revisión desta páxina, e non a aprobada que se mostra por defecto.',
	'approvedpages' => 'Páxinas aprobadas',
	'approvedrevs-approvedpages-docu' => 'A continuación están as páxinas do wiki que posúen unha revisión aprobada.',
	'unapprovedpages' => 'Páxinas suspendidas',
	'approvedrevs-unapprovedpages-docu' => 'A continuación están as páxinas do wiki que non posúen unha revisión aprobada.',
	'right-approverevisions' => 'Marcar como aprobada unha revisión específica dunha páxina do wiki',
	'right-viewlinktolatest' => 'Ollar o texto explicativo ao comezo das páxinas que posúen unha revisión aprobada',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'approvedrevs-desc' => 'E Version vun eree Syte as „aagluegt“ markiere',
	'approvedrevs-logname' => 'Versions-Markierigs-Logbuech',
	'approvedrevs-logdesc' => 'Des isch s Logbuech vu dr aagluegte Version',
	'approvedrevs-approve' => "As ''aagluegt'' markiere",
	'approvedrevs-unapprove' => 'nit frejgee',
	'approvedrevs-approvesuccess' => 'Die Version vu dr Syte isch as „aagluegti Version“ gsetzt wore.',
	'approvedrevs-unapprovesuccess' => 'S git kei bstetigti Version me vu däre Syte. 
Statt däm wird di nejscht Version aazeigt.',
	'approvedrevs-unapprovesuccess2' => 'S git kei bstetigti Version me vu däre Syte. 
Statt däm wird e lääri Syte aazeigt.',
	'approvedrevs-approveaction' => '$2 as aaglugti Version fir „[[$1]]“ setze',
	'approvedrevs-unapproveaction' => 'd Markierig as aagluegti Version fir „[[$1]]“ uuseneh',
	'approvedrevs-notlatest' => 'Des isch di aagluegt Version vu däre Syte; s isch nit di nejscht Version.',
	'approvedrevs-approvedandlatest' => 'Des isch di aagluegt Version vu däre Syte un au di nejscht.',
	'approvedrevs-viewlatest' => 'Di nejscht Version aaluege.',
	'approvedrevs-blankpageshown' => 'Kei Version vu däre Syte isch bishär bstetigt wore.',
	'approvedpages' => 'Aagluegti Syte',
	'approvedrevs-approvedpages-docu' => 'Des sin d Syte, wu s e aagluegti Version het.',
	'unapprovedpages' => 'Nit bstetigti Syte',
	'approvedrevs-unapprovedpages-docu' => 'Die Syte sin d Syte vu däm Wiki, wu kei bstetigti Version hän.',
	'right-approverevisions' => 'E sicheri Version vun ere Wikisyte as aagluegt markiere',
	'right-viewlinktolatest' => 'Dr Erklerigstext aaluege obe uf Syte, wu s e aagluegti Version git',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'approvedrevs-desc' => 'Jednotliwu wersiju strony jako schwalenu stajić',
	'approvedrevs-logname' => 'Protokol schwalenja wersijow',
	'approvedrevs-logdesc' => 'To je protokol wersije, kotrež buchu schwalene.',
	'approvedrevs-approve' => 'schwalić',
	'approvedrevs-unapprove' => 'zakazać',
	'approvedrevs-approvesuccess' => 'Tuta wersija strony je so jako schwalena wersija stajiła.',
	'approvedrevs-unapprovesuccess' => 'Schwalena wersija za tutu stronu wjace njeje.
Město toho so najnowša wersija pokaza.',
	'approvedrevs-approveaction' => 'je $2 jako schwalenu wersiju za "[[$1]]" nastajił',
	'approvedrevs-unapproveaction' => 'je status schwalena wersija za "[[$1]]" wotstronił',
	'approvedrevs-notlatest' => 'To je schwalena wersija tuteje strony; njeje najnowša.',
	'approvedrevs-approvedandlatest' => 'To je schwalena wersija tuteje strony, kotraž je tež najnowša.',
	'approvedrevs-viewlatest' => 'Najnowšu wersiju pokazać',
	'approvedpages' => 'Schwalene wersije',
	'approvedrevs-approvedpages-docu' => 'Slědowace strony we wikiju maja schwalenu wersiju.',
	'right-approverevisions' => 'Wěstu wersiju wikistrony jako schwalenu nastajić',
	'right-viewlinktolatest' => 'Rozłožowacy tekst horjeka na stronach pokazać, kotrež maja schwalenu wersiju.',
);

/** Hungarian (Magyar)
 * @author Misibacsi
 */
$messages['hu'] = array(
	'approvedrevs-approve' => 'elfogadás',
	'approvedpages' => 'Ellenőrzött lapok',
	'approvedrevs-approvedpages-docu' => 'Ezen a wikin a következő lapoknak létezik ellenőrzött változata.',
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
In loco de illo, le version le plus recente essera monstrate.',
	'approvedrevs-unapprovesuccess2' => 'Il non ha plus un version approbate de iste pagina.
In loco de illo, un pagina vacue essera monstrate.',
	'approvedrevs-approveaction' => 'marcava $2 como le version approbate de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'dismarcava le version approbate de "[[$1]]"',
	'approvedrevs-notlatest' => 'Isto es le version approbate de iste pagina; non es le plus recente.',
	'approvedrevs-approvedandlatest' => 'Isto es le version approbate de iste pagina, e tamben le plus recente.',
	'approvedrevs-viewlatest' => 'Vider le version le plus recente.',
	'approvedrevs-blankpageshown' => 'Nulle version de iste pagina ha essite approbate.',
	'approvedrevs-editwarning' => 'Nota ben que tu modifica ora le ultime version de iste pagina, le qual non es le version approbate que es monstrate normalmente.',
	'approvedpages' => 'Paginas approbate',
	'approvedrevs-approvedpages-docu' => 'Le sequente paginas in le wiki ha un version approbate.',
	'unapprovedpages' => 'Paginas non approbate',
	'approvedrevs-unapprovedpages-docu' => 'Le sequente paginas in le wiki non ha un version approbate.',
	'right-approverevisions' => 'Marcar un certe version de un pagina wiki como approbate',
	'right-viewlinktolatest' => 'Vider le texto explicative in alto del paginas que ha un version approbate',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 */
$messages['id'] = array(
	'approvedrevs-desc' => 'Tetapkan revisi tunggal halaman ini sebagai disetujui',
	'approvedrevs-logname' => 'Log penyetujuan revisi',
	'approvedrevs-logdesc' => 'Ini adalah log revisi yang telah disetujui.',
	'approvedrevs-approve' => 'setujui',
	'approvedrevs-unapprove' => 'tidak setujui',
	'approvedrevs-approvesuccess' => 'Revisi halaman ini telah ditetapkan sebagai revisi disetujui.',
	'approvedrevs-unapprovesuccess' => 'Tidak ada lagi versi disetujui untuk halaman ini.
Revisi terkini akan ditampilkan.',
	'approvedrevs-unapprovesuccess2' => 'Tidak ada lagi versi disetujui untuk halaman ini.
Halaman kosong akan ditampilkan.',
	'approvedrevs-approveaction' => 'tetapkan $2 sebagai revisi disetujui untuk "[[$1]]"',
	'approvedrevs-unapproveaction' => 'jangan tetapkan revisi disetujui untuk "[[$1]]"',
	'approvedrevs-notlatest' => 'Ini adalah revisi disetujui dari halaman ini; bukan revisi terkini.',
	'approvedrevs-approvedandlatest' => 'Ini adalah revisi disetujui dari halaman ini, juga revisi terkini.',
	'approvedrevs-viewlatest' => 'Lihat revisi terkini.',
	'approvedrevs-blankpageshown' => 'Tidak ada revisi yang disetujui untuk halaman ini.',
	'approvedpages' => 'Halaman yang disetujui',
	'approvedrevs-approvedpages-docu' => 'Berikut adalah halaman di wiki yang memiliki revisi disetujui.',
	'unapprovedpages' => 'Halaman tidak disetujui',
	'approvedrevs-unapprovedpages-docu' => 'Berikut adalah halaman di wiki yang tidak punya revisi disetujui.',
	'right-approverevisions' => 'Tetapkan revisi tertentu dari halaman wiki sebagai disetujui',
	'right-viewlinktolatest' => 'Lihat penjelasan di atas halaman yang memiliki revisi disetujui',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'approvedrevs-approve' => 'kwé',
	'approvedrevs-unapprove' => 'ékwèkwàlà',
	'approvedpages' => 'Ihü hé kwèrè',
);

/** Japanese (日本語)
 * @author W.CC
 * @author 青子守歌
 */
$messages['ja'] = array(
	'approvedrevs-desc' => 'ページから版を1つだけ選んで、承認済みに設定する',
	'approvedrevs-logname' => '版承認の記録',
	'approvedrevs-logdesc' => '以下は、承認された版の記録です。',
	'approvedrevs-approve' => '承認',
	'approvedrevs-unapprove' => '非承認',
	'approvedrevs-approvesuccess' => 'この版は承認済みの版として設定されました。',
	'approvedrevs-unapprovesuccess' => 'このページには承認済みの版がなくなりました。
代わりに、最新版が表示されます。',
	'approvedrevs-unapprovesuccess2' => 'このページには承認済みの版がなくなりました。
代わりに、空白のページが表示されます。',
	'approvedrevs-approveaction' => '$2を「[[$1]]」の承認済み版として設定',
	'approvedrevs-unapproveaction' => '「[[$1]]」の承認版を取り消し',
	'approvedrevs-notlatest' => 'これは、このページの承認済み版です。最新版ではありません。',
	'approvedrevs-approvedandlatest' => 'これは、このページの承認済み版で、また、最新版です。',
	'approvedrevs-viewlatest' => '最新版を閲覧する。',
	'approvedrevs-blankpageshown' => 'このページには、承認済みの版がありません。',
	'approvedrevs-editwarning' => '現在編集中のものは、このページの最新版であり、既定で表示されている承認済みの版ではありません。',
	'approvedpages' => '承認されたページ',
	'approvedrevs-approvedpages-docu' => '以下は、承認済みの版があるウィキのページです。',
	'unapprovedpages' => '未承認ページ',
	'approvedrevs-unapprovedpages-docu' => '以下は、承認済みの版がないウィキのページです。',
	'right-approverevisions' => 'ウィキページの特定の版を承認済みに設定',
	'right-viewlinktolatest' => '承認済みの版があるページの冒頭に説明文を表示',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Les Meloures
 * @author Robby
 */
$messages['lb'] = array(
	'approvedrevs-desc' => 'Eng eenzel Versioun vun enger Säit als nogekuckt markéieren',
	'approvedrevs-logname' => 'Logbuch vun den nogekuckte Säiten déi fräigi sinn',
	'approvedrevs-logdesc' => "Dëst ass d'Logbuch vun de Versiounen déi nogekuckt sinn.",
	'approvedrevs-approve' => 'zoustëmmen',
	'approvedrevs-unapprove' => 'Zoustëmmung zréckzéien',
	'approvedrevs-approvesuccess' => 'Dës Versioun vun der Säit gouf als nogekuckte Versioun fräiginn.',
	'approvedrevs-unapprovesuccess' => 'Et gëtt vun dëser Säit  keng nogekuckte Versioun méi.
Dofir gëtt déi rezentst Versioun gewisen.',
	'approvedrevs-unapprovesuccess2' => 'Et gëtt vun dëser Säit keng nogekuckte Versioun méi.
Aplaz, gëtt eng eidel Säit gewisen.',
	'approvedrevs-approveaction' => '$2 als nogekuckt Versioun fir "[[$1]]" festleeën',
	'approvedrevs-unapproveaction' => 'nogekuckt Versioun fir "[[$1]]" zréckzéien',
	'approvedrevs-notlatest' => 'Dëst ass déi nogekuckte Versioun vun dëser Säit; et ass net déi rezentst.',
	'approvedrevs-approvedandlatest' => 'Dëst ass esouwuel déi nogekuckt wéi och déi rezentst Versioun vun dëser Säit.',
	'approvedrevs-viewlatest' => 'Déi rezentst Versioun weisen.',
	'approvedrevs-blankpageshown' => 'Keng Versioun vun dëser Säit gouf nogekuckt.',
	'approvedrevs-editwarning' => 'Informatioun: Dir ännert déi lescht Versioun vun dëser Säit, déi net déi nogekuckten ass déi standardméisseg gewise gëtt.',
	'approvedpages' => 'Nogekuckte Säiten',
	'approvedrevs-approvedpages-docu' => 'Dës Säiten an der Wiki hunn eng nogekuckte Versioun.',
	'unapprovedpages' => 'Net nogekuckte Säiten',
	'approvedrevs-unapprovedpages-docu' => 'Dës Säiten an der Wiki hu keng nogekuckte Versioun.',
	'right-approverevisions' => 'Eng bestëmmte Versioun vun enger Säit als nogekuckt markéieren',
	'right-viewlinktolatest' => 'Kuckt den Erklärungstext uewen op de Säiten déi nogekuckt Versiounen hunn',
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
	'approvedrevs-unapprovesuccess2' => 'Оваа страница повеќе нема одобрена верзија.
Наместо тоа ќе се прикажува празна страница.',
	'approvedrevs-approveaction' => 'постави ја $2 за одобрена верзија на „[[$1]]“',
	'approvedrevs-unapproveaction' => 'отстрани одобрена верзија на „[[$1]]“',
	'approvedrevs-notlatest' => 'Ова е одобрената ревизија на страницава, но не е најновата.',
	'approvedrevs-approvedandlatest' => 'Ова е одобрената ревизија на страницава, а воедно и најновата.',
	'approvedrevs-viewlatest' => 'Види најнова ревизија.',
	'approvedrevs-blankpageshown' => 'Нема одобрена ревизија за страницава.',
	'approvedrevs-editwarning' => 'Имајте предвид дека сега ја уредувате најновата верзија на страницава, која не е одобрената што се прикажува по основно.',
	'approvedpages' => 'Одобрени страници',
	'approvedrevs-approvedpages-docu' => 'Ова се страници на викито што имаат одобрена ревизија.',
	'unapprovedpages' => 'Неодобрени страници',
	'approvedrevs-unapprovedpages-docu' => 'Ова се страници на викито што немаат одобрена ревизија.',
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
	'approvedrevs-unapprovesuccess2' => 'Er is niet langer een goedgekeurde versie voor deze pagina.
Er wordt een lege pagina weergegeven.',
	'approvedrevs-approveaction' => 'heeft $2 ingesteld als de goedgekeurde versie voor "[[$1]]"',
	'approvedrevs-unapproveaction' => 'heeft de goedgekeurde versie verwijderd voor "[[$1]]"',
	'approvedrevs-notlatest' => 'Dit is de goedgekeurde versie van deze pagina.
Het is niet de meeste recente versie.',
	'approvedrevs-approvedandlatest' => 'Dit is de goedgekeurde versie van deze pagina. Er is geen nieuwere versie.',
	'approvedrevs-viewlatest' => 'Laatste versie bekijken',
	'approvedrevs-blankpageshown' => 'Deze pagina heeft geen goedgekeurde versie.',
	'approvedrevs-editwarning' => 'U bewerkt de meest recente versie van deze pagina die nog niet goedgekeurd is en standaard niet wordt weergegeven.',
	'approvedpages' => "Goedgekeurde pagina's",
	'approvedrevs-approvedpages-docu' => "De volgende pagina's in de wiki hebben een goedgekeurde versie.",
	'unapprovedpages' => "Niet-goedgekeurde pagina's",
	'approvedrevs-unapprovedpages-docu' => "De onderstaande pagina's in de wiki hebben geen goedgekeurde versie.",
	'right-approverevisions' => 'Een versie van een wikipagina markeren als goedgekeurd.',
	'right-viewlinktolatest' => "De verklarende tekst bovenaan pagina's zien die die een goedgekeurde versie hebben",
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'approvedrevs-desc' => 'Sett en enkelt revisjon av en side som godkjent',
	'approvedrevs-logname' => 'Godkjenningslogg for revisjoner',
	'approvedrevs-logdesc' => 'Dette er loggen over revisjoner som har blitt godkjent.',
	'approvedrevs-approve' => 'godkjenn',
	'approvedrevs-unapprove' => 'ikke godkjenn',
	'approvedrevs-approvesuccess' => 'Denne revisjonen av siden har blitt satt som den godkjente versjonen.',
	'approvedrevs-unapprovesuccess' => 'Det er ikke lenger en godkjent versjon av denne siden.
I stedet vil den nyeste revisjonen bli vist.',
	'approvedrevs-unapprovesuccess2' => 'Det er ikke lenger en godkjent versjon av denne siden.
I stedet vil en blank side bli vist.',
	'approvedrevs-approveaction' => 'sett $2 som den godkjente revisjonen for «[[$1]]»',
	'approvedrevs-unapproveaction' => 'fjern godkjenning av revisjon for «[[$1]]»',
	'approvedrevs-notlatest' => 'Dette er den godkjente revisjonen av denne siden; det er ikke den nyeste.',
	'approvedrevs-approvedandlatest' => 'Dette er den godkjente revisjonen av denne siden, samt den nyeste.',
	'approvedrevs-viewlatest' => 'Se den nyeste revisjonen.',
	'approvedrevs-blankpageshown' => 'Ingen revisjon har blitt godkjent for denne siden.',
	'approvedrevs-editwarning' => 'Merk at du nå redigerer den nyeste revisjonen av denne siden, som ikke er den godkjente siden som vises som standard.',
	'approvedpages' => 'Godkjente sider',
	'approvedrevs-approvedpages-docu' => 'De følgende sidene er de som har en godkjent revisjon i wikien.',
	'unapprovedpages' => 'Ikke-godkjente sider',
	'approvedrevs-unapprovedpages-docu' => 'De følgende sidene er de som ikke har en godkjent revisjon i wikien.',
	'right-approverevisions' => 'Sett en viss revisjon av en wikiside som godkjent',
	'right-viewlinktolatest' => 'Vis forklarende tekst på toppen av sider som har en godkjent revisjon',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'approvedrevs-desc' => 'Pozwala na zatwierdzenie pojedynczej wersji strony',
	'approvedrevs-logname' => 'Rejestr zatwierdzonych wersji',
	'approvedrevs-logdesc' => 'To jest rejestr wersji, które zostały zatwierdzone.',
	'approvedrevs-approve' => 'zatwierdź',
	'approvedrevs-unapprove' => 'cofnij zatwierdzenie',
	'approvedrevs-approvesuccess' => 'Ta wersja strony została zatwierdzona.',
	'approvedrevs-unapprovesuccess' => 'Dla tej strony brak jest wersji zatwierdzonej.
W zamian prezentowana będzie ostatnia wersja.',
	'approvedrevs-unapprovesuccess2' => 'Nie ma już zatwierdzonej wersji tej strony.
W zamian zostanie wyświetlona pusta strona.',
	'approvedrevs-approveaction' => 'zatwierdził wersję $2 strony „[[$1]]”',
	'approvedrevs-unapproveaction' => 'usunął zatwierdzenie strony „[[$1]]”',
	'approvedrevs-notlatest' => 'To jest zatwierdzona wersja strony. To nie jest ostatnia jej wersja.',
	'approvedrevs-approvedandlatest' => 'To jest nie tylko zatwierdzona wersja strony, ale również ostatnia jej wersja.',
	'approvedrevs-viewlatest' => 'Zobacz najnowsze zmiany.',
	'approvedrevs-blankpageshown' => 'Żadna wersja tej strony nie została zatwierdzona.',
	'approvedrevs-editwarning' => 'Zauważ, że edytujesz ostatnią wersję strony. Wersję, która nie została zatwierdzona i nie jest pokazywana domyślnie.',
	'approvedpages' => 'Zatwierdzone strony',
	'approvedrevs-approvedpages-docu' => 'Poniższe strony wiki mają jakąś zatwierdzoną wersję.',
	'unapprovedpages' => 'Niezatwierdzone strony',
	'approvedrevs-unapprovedpages-docu' => 'Następujące strony w tej wiki nie mają żadnej zatwierdzonej wersji.',
	'right-approverevisions' => 'Zatwierdzenie wybranych wersji stron wiki',
	'right-viewlinktolatest' => 'Pokazuj tekst wyjaśniający w górnej części tych stron, które mają zatwierdzoną wersję',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'approvedrevs-desc' => 'Ampòsta na sola revision ëd na pàgina com aprovà',
	'approvedrevs-logname' => "Registr d'aprovassion dle revision",
	'approvedrevs-logdesc' => "Sto-sì a l'é ël registr dle revision ch'a son ëstàite aprovà.",
	'approvedrevs-approve' => 'apreuva',
	'approvedrevs-unapprove' => 'apreuva pa',
	'approvedrevs-approvesuccess' => "Costa revision-sì ëd la pàgina a l'é stàita ampostà com la version aprovà.",
	'approvedrevs-unapprovesuccess' => 'A-i é pa pi na version aprovà për sta pàgina-sì.
Al pòst, a sarà mostrà la revision pi recenta.',
	'approvedrevs-unapprovesuccess2' => 'A-i é pa pi na version aprovà për sta pàgina-sì.
Al pòst, a sarà mostrà na pàgina bianca.',
	'approvedrevs-approveaction' => 'a l\'ha marcà $2 tanme revision aprovà për "[[$1]]"',
	'approvedrevs-unapproveaction' => 'gava ampostassion ëd la revision aprovà për "[[$1]]"',
	'approvedrevs-notlatest' => "Costa a l'é la revision aprovà ëd sa pàgina; a l'é pa la pi recenta.",
	'approvedrevs-approvedandlatest' => "Costa a l'é la revision aprovà ëd sa pàgina, e a l'é ëdcò la pi recenta.",
	'approvedrevs-viewlatest' => 'Varda la revision pi recenta.',
	'approvedrevs-blankpageshown' => 'Gnun-e revision a son ëstàite aprovà për sta pàgina.',
	'approvedrevs-editwarning' => "Për piasì, ch'a nòta ch'a l'é an camin ch'a modìfica l'ùltima revision ëd la pàgina, ch'a l'é pa cola aprovà smonùa për stàndard.",
	'approvedpages' => 'Pàgine aprovà',
	'approvedrevs-approvedpages-docu' => "Cole sì-sota a son le pàgine ant la wiki che a l'han na revision aprovà.",
	'unapprovedpages' => 'Pàgine pa aprovà',
	'approvedrevs-unapprovedpages-docu' => "Cole sì-sota a son le pàgine ant la wiki che a l'han pa na revision aprovà.",
	'right-approverevisions' => 'Ampòsta na certa revision ëd na pàgina wiki com aprovà',
	'right-viewlinktolatest' => "Vëdde ël test dë spiegassion an cò dle pàgine ch'a l'han na revision aprovà",
);

/** Portuguese (Português)
 * @author Alchimista
 * @author GoEThe
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
	'approvedrevs-unapprovesuccess2' => 'Deixou de existir uma versão aprovada para esta página.
Em vez dela, será apresentada uma página em branco.',
	'approvedrevs-approveaction' => 'definir $2 como a revisão aprovada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desfazer a definição da revisão aprovada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisão aprovada desta página; não é a revisão mais recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisão aprovada desta página e também a revisão mais recente.',
	'approvedrevs-viewlatest' => 'Ver a revisão mais recente.',
	'approvedrevs-blankpageshown' => 'Esta página não tem nenhuma revisão aprovada.',
	'approvedrevs-editwarning' => 'Note, por favor, que está agora a editar a revisão mais recente desta página e não a versão aprovada que é mostrada por omissão.',
	'approvedpages' => 'Páginas aprovadas',
	'approvedrevs-approvedpages-docu' => 'As seguintes páginas desta wiki têm uma revisão aprovada.',
	'unapprovedpages' => 'Páginas reprovadas',
	'approvedrevs-unapprovedpages-docu' => 'As seguintes páginas desta wiki não têm uma revisão aprovada.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que têm uma revisão aprovada',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 */
$messages['pt-br'] = array(
	'approvedrevs-desc' => 'Marcar como aprovada uma das revisões de uma página',
	'approvedrevs-logname' => 'Registro de revisões aprovadas',
	'approvedrevs-logdesc' => 'Este é o registro das revisões que foram aprovadas.',
	'approvedrevs-approve' => 'aprovar',
	'approvedrevs-unapprove' => 'desaprovar',
	'approvedrevs-approvesuccess' => 'Esta revisão da página foi definida como a versão aprovada.',
	'approvedrevs-unapprovesuccess' => 'Não há mais uma versão aprovada para esta página.
Em vez dela, será apresentada a revisão mais recente.',
	'approvedrevs-unapprovesuccess2' => 'Não há mais uma versão aprovada para esta página.
Em vez dela, será apresentada uma página em branco.',
	'approvedrevs-approveaction' => 'definir $2 como a revisão aprovada de "[[$1]]"',
	'approvedrevs-unapproveaction' => 'desfazer a definição da revisão aprovada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisão aprovada desta página; não é a revisão mais recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisão aprovada desta página e também a revisão mais recente.',
	'approvedrevs-viewlatest' => 'Ver a revisão mais recente.',
	'approvedrevs-blankpageshown' => 'Esta página não tem nenhuma revisão aprovada.',
	'approvedrevs-editwarning' => 'Note, por favor, que agora você está editando a revisão mais recente desta página e não a versão aprovada que é mostrada por padrão.',
	'approvedpages' => 'Páginas aprovadas',
	'approvedrevs-approvedpages-docu' => 'As seguintes páginas desta wiki têm uma revisão aprovada.',
	'unapprovedpages' => 'Páginas não aprovadas',
	'approvedrevs-unapprovedpages-docu' => 'As seguintes páginas desta wiki não têm uma revisão aprovada.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que têm uma revisão aprovada',
);

/** Romanian (Română)
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'approvedrevs-approve' => 'aprobă',
	'approvedrevs-unapprove' => 'dezaprobă',
	'approvedrevs-approvesuccess' => 'Această revizie a paginii a fost stabilită ca versiunea aprobată.',
	'approvedpages' => 'Pagini aprobate',
	'approvedrevs-approvedpages-docu' => 'Următoarele sunt pagini în wiki care au o revizie aprobată.',
	'unapprovedpages' => 'Pagini neaprobate',
	'approvedrevs-unapprovedpages-docu' => 'Următoarele sunt pagini în wiki care nu au o revizie aprobată.',
);

/** Russian (Русский)
 * @author MaxSem
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
	'approvedrevs-unapprovesuccess2' => 'Больше не существует подтверждённой версии этой страницы.
Вместо неё будет показана пустая страница.',
	'approvedrevs-approveaction' => 'установить $2 как подтверждённую версию «[[$1]]»',
	'approvedrevs-unapproveaction' => 'снять утверждённую версию для «[[$1]]»',
	'approvedrevs-notlatest' => 'Это утверждённая версия страницы. Существуют более свежие версии.',
	'approvedrevs-approvedandlatest' => 'Это утверждённая версия страницы. Она же является наиболее свежей версией.',
	'approvedrevs-viewlatest' => 'Просмотреть самую свежую версию.',
	'approvedrevs-blankpageshown' => 'Для этой страницы нет утверждённых версий.',
	'approvedrevs-editwarning' => 'Пожалуйста, обратите внимание, сейчас вы редактируете последнюю версию этой страницы, но она не показывается по умолчанию, так как не подтверждена.',
	'approvedpages' => 'Подтверждённые страницы',
	'approvedrevs-approvedpages-docu' => 'Ниже показан список вики-страниц, имеющих подтверждённые версии.',
	'unapprovedpages' => 'Неутверждённые страницы',
	'approvedrevs-unapprovedpages-docu' => 'Ниже показан список вики-страниц, не имеющих подтверждённых версий.',
	'right-approverevisions' => 'отметка определённых версий вики-страниц как подтверждённых',
	'right-viewlinktolatest' => 'просмотр пояснительного текста в верхней части страниц, имеющих утверждённые версии',
);

/** Swedish (Svenska)
 * @author Ainali
 * @author Cohan
 */
$messages['sv'] = array(
	'approvedrevs-desc' => 'Sätt en enskild version av en sida till godkänd',
	'approvedrevs-logname' => 'Godkänningslogg för revisioner',
	'approvedrevs-logdesc' => 'Detta är loggen över revisioner som har godkänts.',
	'approvedrevs-approve' => 'godkänn',
	'approvedrevs-approvesuccess' => 'Denna version av sidan har ställts in som den godkända versionen.',
	'approvedrevs-unapprovesuccess' => 'Det finns inte längre en godkänd version för den här sidan. 
 Istället kommer den senaste redigeringen att visas.',
	'approvedrevs-unapprovesuccess2' => 'Det finns inte längre en godkänd version av den här sidan. 
Istället kommer en tom sida att visas.',
	'approvedrevs-approveaction' => 'sätt $2 som den godkända revisionen av "[[$1]]"',
	'approvedrevs-notlatest' => 'Detta är den godkända version av denna sida; det är inte den senaste.',
	'approvedrevs-approvedandlatest' => 'Detta är den godkända version av denna sida, samt den senaste.',
	'approvedrevs-viewlatest' => 'Visa senaste versionen.',
	'approvedrevs-blankpageshown' => 'Ingen revidering har godkänts för denna sida.',
	'approvedrevs-editwarning' => 'Observera att du nu redigerar den senaste versionen av denna sida, vilket inte är den godkända som visas som standard.',
	'approvedpages' => 'Godkända sidor',
	'approvedrevs-approvedpages-docu' => 'Följande sidor i wikin har en godkänd revision.',
	'unapprovedpages' => 'Icke godkända sidor',
	'approvedrevs-unapprovedpages-docu' => 'Följande sidor i wikin saknar en godkänd revision.',
	'right-approverevisions' => 'Sätt en viss revidering av en wiki-sida som godkänd',
	'right-viewlinktolatest' => 'Se förklarande text högst upp på sidor som har en godkänd revision',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'approvedrevs-approve' => 'அனுமதிக்கவும்',
	'approvedrevs-unapprove' => 'அனுமதிக்க வேண்டாம்',
	'approvedrevs-viewlatest' => 'மிக அண்மையில் செய்யப்பட்ட திருத்தங்களை பார்க்கவும்.',
	'approvedpages' => 'ஏற்றுக் கொள்ளப்பட்ட பக்கங்கள்',
	'unapprovedpages' => 'ஏற்றுக் கொள்ளப்படாத பக்கங்கள்',
	'right-approverevisions' => 'விக்கி பக்கத்தில் ஒரு சில மாற்றங்களை அனுமதிக்கப்பட்டதாக குறித்துக்கொள்ளவும்',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'approvedrevs-logname' => 'కూర్పుల అనుమతులు చిట్టా',
	'approvedrevs-approve' => 'అనుమతించు',
	'approvedpages' => 'అనుమతించిన పుటలు',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'approvedrevs-desc' => 'Itakda ang isang nagiisang rebisyon ng isang pahina bilang pinayagan',
	'approvedrevs-logname' => 'Tala ng pagpayag sa rebisyon',
	'approvedrevs-logdesc' => 'Ito ang tala ng mga rebisyon na pinayagan na.',
	'approvedrevs-approve' => 'payagan',
	'approvedrevs-unapprove' => 'huwag payagan',
	'approvedrevs-approvesuccess' => 'Ang rebisyon ng pahina ay naitakda bilang pinayagang bersyon.',
	'approvedrevs-unapprovesuccess' => 'Wala nang isang pinayagang bersyon para sa pahinang ito.
Sa halip, ang pinaka kamakailang rebisyon ang ipapakita.',
	'approvedrevs-unapprovesuccess2' => 'Wala na ngayong isang pinayagang bersyon ng pahinang ito.
Sa halip, ipapakita ang isang pahinang walang laman.',
	'approvedrevs-approveaction' => 'itakda ang $2 bilang pinayagang rebisyon para sa "[[$1]]"',
	'approvedrevs-unapproveaction' => 'huwag itakda ang rebisyon para sa "[[$1]]"',
	'approvedrevs-notlatest' => 'Ito ang pinayagang rebisyon ng pahinang ito; hindi ito ang pinaka kamakailan.',
	'approvedrevs-approvedandlatest' => 'Ito ang pinayagang rebisyon ng pahinang ito, pati na ang pagiging pinaka kamakailan.',
	'approvedrevs-viewlatest' => 'Tingan ang pinaka kamakailang rebisyon.',
	'approvedrevs-blankpageshown' => 'Wala pang rebisyong pinayagan para sa pahinang ito.',
	'approvedpages' => 'Mga pahinang pinayagan',
	'approvedrevs-approvedpages-docu' => 'Ang sumusunod ay ang mga pahina sa wiki na may rebisyong pinayagan.',
	'unapprovedpages' => 'Hindi pinayagang mga pahina',
	'approvedrevs-unapprovedpages-docu' => 'Ang sumusunod ay mga pahinang nasa loob ng wiki na walang pinayagang rebisyon.',
	'right-approverevisions' => 'Itakda ang isang partikular na rebisyon ng isang pahina ng wiki bilang pinayagan',
	'right-viewlinktolatest' => 'Tingnan ang teksto ng paliwanag na nasa itaas ng mga pahina na may pinayagang rebisyon',
);

/** Turkish (Türkçe)
 * @author Srhat
 */
$messages['tr'] = array(
	'approvedrevs-desc' => 'Bir sayfanın belirli bir revizyonunu onaylanmış olarak ayarla',
	'approvedrevs-logname' => 'Revizyon onay günlüğü',
	'approvedrevs-logdesc' => 'Bu liste onaylanmış revizyon günlüğüdür.',
	'approvedrevs-approve' => 'onayla',
	'approvedrevs-unapprove' => 'onayı kaldır',
	'approvedrevs-approvesuccess' => 'Sayfaya ait bu revizyon onaylanmış revizyon olarak ayarlandı.',
	'approvedrevs-unapprovesuccess' => 'Bu sayfanın artık onaylanmış sürümü yok.
Onun yerine, en son revizyon gösterilecektir.',
	'approvedrevs-approveaction' => '$2 revizyonunu "[[$1]]" sayfasının onaylanmış revizyonu olarak ayarladı',
	'approvedrevs-unapproveaction' => '"[[$1]]" sayfasının onaylanmış revizyonunun onayını kaldırdı.',
	'approvedrevs-notlatest' => 'Bu sayfanın onaylanmış revizyonudur; en son revizyon değildir.',
	'approvedrevs-approvedandlatest' => 'Bu revizyon, sayfanın hem onaylanmış hem de en son revizyonudur.',
	'approvedrevs-viewlatest' => 'En son revizyonu görüntüle',
	'approvedpages' => 'Onaylanmış sayfalar',
	'approvedrevs-approvedpages-docu' => 'Aşağıdakiler, onaylanmış revizyonu bulunan viki sayfalardır.',
	'right-approverevisions' => 'Bir viki sayfasının belirli bir revizyonunu onaylanmış olarak ayarla',
	'right-viewlinktolatest' => 'Onaylanmış revizyonu bulunan sayfaların başındaki açıklayıcı metni görüntüle',
);

/** Ukrainian (Українська)
 * @author Alex Khimich
 */
$messages['uk'] = array(
	'approvedrevs-desc' => 'Встановити єдиний перегляд сторінки як затверджуючий',
	'approvedrevs-logname' => 'Журнал одобрень та переглядів',
	'approvedrevs-logdesc' => 'Це протокол переглядів, які були затверджуючими.',
	'approvedrevs-approve' => 'Затвердити',
	'approvedrevs-unapprove' => 'Відхилити',
	'approvedrevs-approvesuccess' => 'Цей перегляд сторінки був встановлений як затверджуючий.',
	'approvedrevs-unapprovesuccess' => 'Існує не затверджений варіант для цієї сторінки. 
Замість цього, самий останній затверджений варіант буде показаний.',
	'approvedrevs-unapprovesuccess2' => 'Існує не затверджений варіант для цієї сторінки. 
Замість цього буде показано порожню сторінку.',
	'approvedrevs-approveaction' => 'встановити $2 як затверджену версію для "[[$1]]"',
	'approvedrevs-unapproveaction' => 'відкликати стверджену версію для "[[$1]]"',
	'approvedrevs-notlatest' => 'Це затверджений перегляд цієї сторінки, це не остання версія.',
	'approvedrevs-approvedandlatest' => 'Це затверджений перегляд цієї сторінки, вын э найновішим.',
	'approvedrevs-viewlatest' => 'Відкрити найсвіжіший перегляд.',
	'approvedrevs-blankpageshown' => 'Не було знайдено схвалювальних переглядів для цієї сторінки.',
	'approvedrevs-editwarning' => 'Зверніть увагу, що в даний час ви редагуєте найновіший перегляд цієї сторінки, який не є схваленим і відображатися за замовчуванням.',
	'approvedpages' => 'Затверджені сторінки',
	'approvedrevs-approvedpages-docu' => 'Наступні сторінки у вікі є схваленими при перегляді.',
	'unapprovedpages' => 'Несхвалені сторінки',
	'approvedrevs-unapprovedpages-docu' => 'Наступні сторінки у вікі, які не не мають схвалених версій.',
	'right-approverevisions' => 'Встановити єдиний перегляд сторінки як затверджуючий',
	'right-viewlinktolatest' => 'Переглянути пояснювальний текст у верхній частині сторінки яка має схвалену версію.',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'approvedrevs-logname' => 'Nhật trình chấp nhận phiên bản',
	'approvedrevs-approve' => 'chấp nhận',
	'approvedrevs-unapprove' => 'bỏ chấp nhận',
	'approvedrevs-approveaction' => 'đặt $2 là phiên bản chấp nhận của “[[$1]]”',
	'approvedrevs-unapproveaction' => 'bỏ phiên bản chấp nhận của “[[$1]]”',
	'approvedrevs-viewlatest' => 'Xem phiên bản gần đây nhất.',
	'approvedpages' => 'Các trang đã chấp nhận',
	'right-approverevisions' => 'Đặt một phiên bản của trang wiki là phiên bản chấp nhận',
	'right-viewlinktolatest' => 'Xem văn bản giải thích ở đầu các trang có phiên bản chấp nhận',
);

