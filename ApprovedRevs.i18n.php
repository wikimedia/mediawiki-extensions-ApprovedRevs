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
	'approvedrevs-blankpageshown' => 'No revision has been approved for this page.',
	'approvedrevs-editwarning' => 'Please note that you are now editing the latest revision of this page, which is not the approved one shown by default.',
	'approvedrevs' => 'Approved revisions',
	'approvedrevs-approvedpages' => 'All pages with an approved revision',
	'approvedrevs-notlatestpages' => 'Pages whose approved revision is not their latest',
	'approvedrevs-unapprovedpages' => 'Unapproved pages',
	'approvedrevs-view' => 'View:',
	'approvedrevs-revisionnumber' => 'revision $1',
	'approvedrevs-approvedby' => 'approved by {{GENDER:$3|$1}} on $4 at $5',
	'approvedrevs-difffromlatest' => 'diff from latest',
	'approvedrevs-approvelatest' => 'approve latest',
	'approvedrevs-approvethisrev' => 'Approve this revision.',
	'approvedrevs-viewlatestrev' => 'View the most recent revision.',
	'right-approverevisions' => 'Set a certain revision of a wiki page as approved',
	'right-viewlinktolatest' => 'View explanatory text at the top of pages that have an approved revision',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Kghbln
 * @author Nemo bis
 * @author Purodha
 * @author Shirayuki
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'approvedrevs-desc' => '{{desc|name=Approved Revs|url=http://www.mediawiki.org/wiki/Extension:Approved_Revs}}',
	'approvedrevs-logname' => '{{doc-logpage}}',
	'approvedrevs-approve' => '{{Identical|Approve}}',
	'approvedrevs-approveaction' => 'This is a log entry. Thus "set" is past tense and not imperative.',
	'approvedrevs-unapproveaction' => 'This is a log entry. Thus "unset" is past tense and not imperative.',
	'approvedrevs-view' => '{{Identical|View}}',
	'approvedrevs-revisionnumber' => '{{Identical|Revision}}',
	'approvedrevs-approvedby' => '*$1 - username (or link)
*$3 - username
*$4 - date
*$5 - time',
	'right-approverevisions' => '{{doc-right|approverevisions}}',
	'right-viewlinktolatest' => '{{doc-right|viewlinktolatest}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'approvedrevs-approve' => 'keur goed',
	'approvedrevs-approvedpages' => 'Goedgekeurde bladsye', # Fuzzy
	'approvedrevs-view' => 'Weergawe:',
	'approvedrevs-revisionnumber' => 'weergawe $1',
);

/** Arabic (العربية)
 * @author Moemin05
 * @author روخو
 */
$messages['ar'] = array(
	'approvedrevs-approve' => 'موافقة',
	'approvedrevs-unapprove' => 'إزالة موافقة',
	'approvedrevs' => 'أقر المراجعات',
	'approvedrevs-approvedpages' => 'صفحات تمّت الموافقة عليها', # Fuzzy
	'approvedrevs-unapprovedpages' => 'صفحات لم تتم الموافقة عليها',
	'approvedrevs-view' => 'عرض:',
	'approvedrevs-revisionnumber' => 'تنقيح $1',
	'approvedrevs-approvedby' => 'وافق لكل $1 على $2',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'approvedrevs-approve' => 'ܩܘܒܠܐ',
	'approvedrevs-unapprove' => 'ܠܐ ܩܘܒܠܐ',
	'approvedrevs-approvedpages' => 'ܟܠ ܦܐܬܬ̈ܐ ܥܡ ܬܢܝܬ̈ܐ ܩܒܝܠܬ̈ܐ',
	'approvedrevs-unapprovedpages' => 'ܦܐܬܬ̈ܐ ܠܐ ܩܒܝܠܬ̈ܐ',
);

/** Azerbaijani (azərbaycanca)
 * @author Cekli829
 * @author Vago
 */
$messages['az'] = array(
	'approvedrevs-approve' => 'təsdiq etmək',
	'approvedrevs-unapprove' => 'təsdiq etmənin ləğvi',
	'approvedrevs-view' => 'Görünüş:',
);

/** South Azerbaijani (تورکجه)
 * @author E THP
 * @author Mousa
 */
$messages['azb'] = array(
	'approvedrevs-desc' => 'بیر صحیفه‌نین تک نوسخه‌سینی اونایلا',
	'approvedrevs-logname' => 'اونایلاما قئیدلری',
	'approvedrevs-logdesc' => 'بو اونایلانمیش نوسخه‌لرین قئیدلر لیستی‌دیر.',
	'approvedrevs-approve' => 'اونایلا',
	'approvedrevs-unapprove' => 'اونایلاماغی قایتار',
	'approvedrevs-approvesuccess' => 'صحیفه‌نین او نوسخه‌سی، اونایلانمیش نوسخه اولوندو.',
	'approvedrevs-unapprovesuccess' => 'بو صحیفه‌یه داها بیر اونایلانمیش نوسخه یوخدور.
اونون یئرینه، ان سون نوسخه گؤستریله‌جکدیر.',
	'approvedrevs-unapprovesuccess2' => 'بو صحیفه‌یه داها بیر اونایلانمیش نوسخه یوخدور.
اونون یئرینه، بوش صحیفه گؤستریله‌جکدیر.',
	'approvedrevs-approveaction' => '«[[$1]]» اوچون، $2 اونایلانمیش نوسخه اولوندو',
	'approvedrevs-unapproveaction' => '«[[$1]]» اوچون اونایلانمیش نوسخه‌نی قایتار',
	'approvedrevs-notlatest' => 'بورا بو صحیفه‌نین اونایلانمیش نوسخه‌سی‌دیر؛ سون نوسخه دئییل.',
	'approvedrevs-approvedandlatest' => 'بورا بو صحیفه‌نین اونایلانمیش نوسخه‌سی‌دیر، و هم ده سون نوسخه‌سی‌دیر.',
	'approvedrevs-blankpageshown' => 'بو صحیفه اوچون بیر نوسخه اونایلانماییب‌دیر.',
	'approvedrevs-editwarning' => 'لوطفاً دیقت ائدین کی سیز بو صحیفه‌نین سون نوسخه‌سینی دَییشدیریرسینیز، او حالداکی بو نوسخه اونایلانان دئییل.',
	'approvedrevs' => 'اونایلانمیش نوسخه‌لر',
	'approvedrevs-approvedpages' => 'اونایلانمیش نوسخه‌لری اولان بوتون صحیفه‌لر',
	'approvedrevs-notlatestpages' => 'اونایلانمیش نوسخه‌لری، اون سون نوسخه اولمایان صحیفه‌لر',
	'approvedrevs-unapprovedpages' => 'اونایلانمامیش صحیفه‌لر',
	'approvedrevs-view' => 'گؤرونوش:',
	'approvedrevs-revisionnumber' => 'نوسخه $1',
	'approvedrevs-approvedby' => '$4، $5-ده {{GENDER:$3|$1}} ایله اونایلانمیش',
	'approvedrevs-difffromlatest' => 'سون ایله فرق',
	'approvedrevs-approvelatest' => 'سونو اونایلا',
	'approvedrevs-approvethisrev' => 'بو نوسخه‌نی اونایلا.',
	'approvedrevs-viewlatestrev' => 'ان سون نوسخه‌یه باخینیز.',
	'right-approverevisions' => 'بیر ویکی صحیفه‌سینین بیر خاص نوسخه‌سینی اونایلا',
	'right-viewlinktolatest' => 'اونیلانمیش نوسخه‌لری اولان صحیفه‌لرین باشیندا آچیقلاما یازیسی اولسون',
);

/** Bashkir (башҡортса)
 * @author Assele
 * @author Comp1089
 * @author Haqmar
 * @author Sagan
 */
$messages['ba'] = array(
	'approvedrevs-desc' => 'Биттең бер өлгөһөн раҫланған тип билдәләү',
	'approvedrevs-logname' => 'Өлгөләрҙе раҫлау яҙмалары журналы',
	'approvedrevs-logdesc' => 'Был — биттәрҙең раҫланған өлгөләре журналы.',
	'approvedrevs-approve' => 'раҫларға',
	'approvedrevs-unapprove' => 'раҫлауҙы алырға',
	'approvedrevs-approvesuccess' => 'Биттең был өлгөһө раҫланған тип билдәләнде.',
	'approvedrevs-unapprovesuccess' => 'Был биттең раҫланған өлгөһө юҡ.
Уның урынына һуңғы өлгө күрһәтеләсәк.',
	'approvedrevs-unapprovesuccess2' => 'Был биттең башҡа раҫланған өлгөһө юҡ.
Уның урынына буш бит күрһәтеләсәк.',
	'approvedrevs-approveaction' => '$2 өлгөһөн "[[$1]]" битенең раҫланған өлгөһө тип билдәләргә',
	'approvedrevs-unapproveaction' => '"[[$1]]" битенең раҫланған өлгөһөнөң раҫланыуын алырға',
	'approvedrevs-notlatest' => 'Был — биттең раҫланған өлгөһө. Яңыраҡ өлгөләр бар.',
	'approvedrevs-approvedandlatest' => 'Был — биттең раҫланған өлгөһө, ул — шулай уҡ биттең яңы өлгөһө.',
	'approvedrevs-blankpageshown' => 'Был бит өсөн раҫланған өлгөләр юҡ.',
	'approvedrevs-editwarning' => 'Зинһар, иғтибар итегеҙ, һеҙ хәҙер был биттең һуңғы өлгөһөн мөхәррирләйһегеҙ, әммә ул күрһәтелмәй, сөнки ул раҫланмаған.',
	'approvedrevs' => 'Раҫланған өлгөләр',
	'approvedrevs-approvedpages' => 'Раҫланған верисиялары булған биттәр',
	'approvedrevs-notlatestpages' => 'Был — биттең раҫланған өлгөһө. Яңыраҡ өлгөләр бар.',
	'approvedrevs-unapprovedpages' => 'Раҫланмаған биттәр',
	'approvedrevs-view' => 'Ҡарап сығыу:',
	'approvedrevs-revisionnumber' => '$1 өлгө',
	'approvedrevs-approvedby' => '$2 $1 тарафынан раҫланған',
	'approvedrevs-difffromlatest' => 'һуңғы менән айырма',
	'approvedrevs-approvelatest' => 'иң һуңғыһын раҫларға',
	'approvedrevs-approvethisrev' => 'Был өлгөнө раҫларға.',
	'approvedrevs-viewlatestrev' => 'Иң һуңғы өлгөнө ҡарау',
	'right-approverevisions' => 'Вики-биттәрҙең ҡайһы бер өлгөләрен раҫланған тип билдәләү',
	'right-viewlinktolatest' => 'Раҫланған өлгөләре булған биттәрҙең өҫкө өлөшөндә аңлатманы ҡарау',
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
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
	'approvedrevs-blankpageshown' => 'Для гэтай старонкі няма зацьверджанай вэрсіі.',
	'approvedrevs-editwarning' => 'Калі ласка, памятайце, што зараз Вы рэдагуеце апошнюю вэрсію гэтай старонкі, якая яшчэ не зьяўляецца зацьверджанай і не паказваецца па змоўчваньні.',
	'approvedrevs' => 'Зацьверджаныя вэрсіі',
	'approvedrevs-approvedpages' => 'Усе старонкі з зацьверджанымі вэрсіямі',
	'approvedrevs-notlatestpages' => 'Старонкі, зацьверджаныя вэрсіі якіх не зьяўляюцца апошнімі',
	'approvedrevs-unapprovedpages' => 'Незацьверджаныя старонкі',
	'approvedrevs-view' => 'Прагляд:',
	'approvedrevs-revisionnumber' => 'вэрсія $1',
	'approvedrevs-approvedby' => 'зацьверджаная $1 $2',
	'approvedrevs-difffromlatest' => 'адрозьненьне з апошняй',
	'approvedrevs-approvelatest' => 'зацьвердзіць апошнюю',
	'approvedrevs-approvethisrev' => 'Зацьвердзіць гэтую вэрсію.',
	'approvedrevs-viewlatestrev' => 'Паказаць апошнюю вэрсію.',
	'right-approverevisions' => 'зацьверджаньне вызначаных вэрсіяў вікі-старонак',
	'right-viewlinktolatest' => 'прагляд тлумачальнага тэксту ў версе старонак, якія маюць зацьверджаныя вэрсіі',
);

/** Bulgarian (български)
 * @author DCLXVI
 * @author පසිඳු කාවින්ද
 */
$messages['bg'] = array(
	'approvedrevs-approve' => 'одобрява',
	'approvedrevs' => 'Одобрени редакции',
	'approvedrevs-view' => 'Изглед:',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Wikitanvir
 */
$messages['bn'] = array(
	'approvedrevs-approve' => 'অনুমোদন',
	'approvedrevs-unapprove' => 'অনুনমোদন',
	'approvedrevs' => 'গ্রহণকৃত সংস্করণ',
	'approvedrevs-approvedpages' => 'গ্রহণকৃত সংস্করণসহ সকল পাতা', # Fuzzy
	'approvedrevs-notlatestpages' => 'যেসকল পাতার গ্রহণকৃত সংস্করণসমূহ তাদের সাম্প্রতিকতম নয় সেই পাতাগুলি',
	'approvedrevs-unapprovedpages' => 'অগ্রহণকৃত পাতাসমূহ',
	'approvedrevs-view' => 'দেখাও:',
	'approvedrevs-revisionnumber' => 'সংস্করণ $1',
	'approvedrevs-approvedby' => '$1 দ্বারা $2 তারিখে গৃহীত হয়েছে',
	'approvedrevs-difffromlatest' => 'সাম্প্রতিকতম সংস্করণ থেকে পার্থক্য',
	'approvedrevs-approvelatest' => 'সাম্প্রতিককালে গৃহীত',
	'approvedrevs-approvethisrev' => 'এই সংস্করণটি গ্রহণ করো।',
	'approvedrevs-viewlatestrev' => 'সবচেয়ে সাম্প্রতিকতম সংস্করণটি দেখাও।',
);

/** Breton (brezhoneg)
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
	'approvedrevs-blankpageshown' => "N'eus bet aprouet adweladenn ebet evit ar bajenn-mañ.",
	'approvedrevs-editwarning' => "Taolit evezh emaoc'h o tegas kemmoù e stumm diwezhañ ar bajenn-mañ; n'eo ket hemañ ar stumm aprouet zo lakaet war wel dre ziouer.",
	'approvedrevs' => 'Adweladennoù degemeret',
	'approvedrevs-approvedpages' => 'Pajennoù aprouet', # Fuzzy
	'approvedrevs-notlatestpages' => "Pajennoù n'eo ket an adweladennoù aprouet evito ar stumm nevesañ anezho.",
	'approvedrevs-unapprovedpages' => "Pajennoù n'int ket bet aprouet",
	'approvedrevs-view' => 'Gwelet :',
	'approvedrevs-revisionnumber' => 'Adweladenn $1',
	'approvedrevs-approvedby' => "aprouet gant $1 d'an $2",
	'approvedrevs-difffromlatest' => "diforc'h e-keñver ar stumm a-vremañ",
	'approvedrevs-approvelatest' => 'Aprouiñ an hini diwezhañ',
	'approvedrevs-approvethisrev' => 'Aprouiñ an adweladenn-mañ.',
	'approvedrevs-viewlatestrev' => 'Gwelet an adweladenn ziwezhañ.',
	'right-approverevisions' => 'Merkañ un adweladenn bennak eus ur bajenn wiki evel aprouet',
	'right-viewlinktolatest' => 'Gwelet an destenn displegañ e penn uhelañ ar pajennoù zo bet aprouet un adweladenn anezho',
);

/** Bosnian (bosanski)
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
	'approvedrevs-blankpageshown' => 'Nijedna revizija nije odobrena za ovu stranicu.',
	'approvedrevs-editwarning' => 'Molimo vas da imate u vidu da sada uređujete posljednju reviziju ove stranice, koja nije odobrena što je prikazano po postavkama.',
	'approvedrevs' => 'Odobrene revizije',
	'approvedrevs-approvedpages' => 'Odobrene stranice', # Fuzzy
	'approvedrevs-notlatestpages' => 'Stranice čija odobrena revizija nije njihova najnovija',
	'approvedrevs-unapprovedpages' => 'Neodobrene stranice',
	'approvedrevs-view' => 'Pregled:',
	'approvedrevs-revisionnumber' => 'revizija $1',
	'approvedrevs-approvedby' => 'odobreno od strane $1 dana $2',
	'approvedrevs-difffromlatest' => 'razl od posljednje',
	'approvedrevs-approvelatest' => 'odobri posljednju',
	'approvedrevs-approvethisrev' => 'Odobri ovu reviziju',
	'approvedrevs-viewlatestrev' => 'Pogledaj posljednju reviziju',
	'right-approverevisions' => 'Postavi određenu reviziju wiki stranice kao odobrenu',
	'right-viewlinktolatest' => 'Vidi tekst objašnjenja na vrhu stranica koje imaju odobrenu reviziju',
);

/** Catalan (català)
 * @author El libre
 * @author Pitort
 * @author SMP
 * @author Toniher
 */
$messages['ca'] = array(
	'approvedrevs-desc' => "Estableix una única revisió d'una pàgina com aprovada",
	'approvedrevs-logname' => 'Registre de revisions aprovades',
	'approvedrevs-logdesc' => 'Aquest és el registre de les revisions que han estat aprovades.',
	'approvedrevs-approve' => 'aprova',
	'approvedrevs-unapprove' => 'desaprova',
	'approvedrevs-approvesuccess' => 'Aquesta revisió de la pàgina ha estat establerta com la versió aprovada.',
	'approvedrevs-unapprovesuccess' => 'Ja no hi ha una versió aprovada de la pàgina.
Com a alternativa, es mostrarà la versió més recent.',
	'approvedrevs-unapprovesuccess2' => 'Ja no hi ha una versió aprovada de la pàgina.
Com a alternativa, es mostrarà una pàgina en blanc.',
	'approvedrevs-approveaction' => 'estableix $2 com la revisió aprovada per a «[[$1]]»',
	'approvedrevs-unapproveaction' => "deixa d'establir la revisió aprovada per a «[[$1]]»",
	'approvedrevs-notlatest' => "Aquesta és la revisió aprovada d'aquesta pàgina, no la més recent.",
	'approvedrevs-approvedandlatest' => "Aquesta és la revisió aprovada d'aquesta pàgina, així com la més recent.",
	'approvedrevs-blankpageshown' => "No s'ha aprovat cap revisió d'aquesta pàgina.",
	'approvedrevs-editwarning' => "Tingueu en compte que esteu editant la darrera revisió d'aquesta pàgina, que no és l'aprovada que es mostra per defecte.",
	'approvedrevs' => 'Revisions aprovades',
	'approvedrevs-approvedpages' => 'Totes les pàgines amb una revisió aprovada',
	'approvedrevs-notlatestpages' => 'Pàgines les quals llur versió aprovada no és la més recent',
	'approvedrevs-unapprovedpages' => 'Pàgines no aprovades',
	'approvedrevs-view' => 'Mostra:',
	'approvedrevs-revisionnumber' => 'revisió $1',
	'approvedrevs-approvedby' => 'aprovat per $1 el $2',
	'approvedrevs-difffromlatest' => 'difereix del darrer',
	'approvedrevs-approvelatest' => 'aprova la darrera',
	'approvedrevs-approvethisrev' => 'Aprova aquesta revisió.',
	'approvedrevs-viewlatestrev' => 'Mostra la revisió més recent.',
	'right-approverevisions' => "Marca com aprovada una certa revisió d'una pàgina wiki",
	'right-viewlinktolatest' => 'Mostra un text explicatiu en la part superior de les pàgines que tenen una revisió aprovada',
);

/** Chechen (нохчийн)
 * @author Sasan700
 */
$messages['ce'] = array(
	'approvedrevs-view' => 'Хьажа:',
);

/** Czech (česky)
 * @author Paxt
 */
$messages['cs'] = array(
	'approvedrevs-desc' => 'Nastavit jednu stránkovou revizi jako schválenou',
	'approvedrevs-logname' => 'Seznam schválených revizí',
	'approvedrevs-logdesc' => 'Toto je seznam schválených revizí.',
	'approvedrevs-approve' => 'schválit',
	'approvedrevs-unapprove' => 'neschválit',
	'approvedrevs-approvesuccess' => 'Tato stránková revize byla nastavena jako schválená verze.',
	'approvedrevs-unapprovesuccess' => 'Pro tuto stránku neexistuje schválená verze.
Místo ní se zobrazí poslední revize.',
	'approvedrevs-unapprovesuccess2' => 'Pro tuto stránku již neexistuje schválená verze.
Místo ní se zobrazí prázdná stránka.',
	'approvedrevs-approveaction' => 'Jako schválená revize pro  "[[$1]]" nastavena $2',
	'approvedrevs-unapproveaction' => 'zrušena schválená revize pro "[[$1]]"',
	'approvedrevs-notlatest' => 'Toto je schválená revize této stránky, nikoli nejnovější.',
	'approvedrevs-approvedandlatest' => 'Toto je schválená revize této stránky, a zároveň nejnovější.',
	'approvedrevs-blankpageshown' => 'Pro tuto stránku nebyla schválena žádná revize.',
	'approvedrevs-editwarning' => 'Prosím všimněte si, že nyní upravujete poslední revizi této stránky, která se ve výchozím nastavení nezobrazuje jako schválená.',
	'approvedrevs' => 'Schválené revize',
	'approvedrevs-approvedpages' => 'Všechny stránky se schválenou revizí',
	'approvedrevs-notlatestpages' => 'Stránky, jejichž schválená revize není nejnovější',
	'approvedrevs-unapprovedpages' => 'Neschválené stránky',
	'approvedrevs-view' => 'Prohlédnout:',
	'approvedrevs-revisionnumber' => 'revize $1',
	'approvedrevs-approvedby' => 'schváleno $1 $2', # Fuzzy
	'approvedrevs-difffromlatest' => 'rozdíl od poslední',
	'approvedrevs-approvelatest' => 'schválit nejnovější',
	'approvedrevs-approvethisrev' => 'Schválit tuto revizi.',
	'approvedrevs-viewlatestrev' => 'Prohlédnout poslední revizi.',
	'right-approverevisions' => 'Nastavit určitou revizi wiki stránky jako schválenou',
	'right-viewlinktolatest' => 'Prohlédnout vysvětlivky v záhlaví stránek se schválenou revizí',
);

/** Danish (dansk)
 * @author Tjernobyl
 */
$messages['da'] = array(
	'approvedrevs-desc' => 'Angiv en enkelt version af siden til godkendt',
	'approvedrevs-logdesc' => 'Dette er en log over godkendte versioner.',
	'approvedrevs-approve' => 'godkend',
	'approvedrevs-unapprove' => 'afvis',
	'approvedrevs-unapprovedpages' => 'Afviste sider',
	'approvedrevs-view' => 'Vis:',
	'approvedrevs-revisionnumber' => 'version $1',
	'approvedrevs-approvelatest' => 'godkend seneste',
	'approvedrevs-approvethisrev' => 'Godkend denne version.',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Purodha
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
	'approvedrevs-approveaction' => 'legte Version $2 als bestätigte Version für „[[$1]]“ fest',
	'approvedrevs-unapproveaction' => 'nahm die bestätigte Version für „[[$1]]“ zurück',
	'approvedrevs-notlatest' => 'Dies ist die bestätigte Version dieser Seite, allerdings nicht deren neueste Version.',
	'approvedrevs-approvedandlatest' => 'Dies ist die bestätigte sowie die neueste Version dieser Seite.',
	'approvedrevs-blankpageshown' => 'Keine Version dieser Seite ist bestätigt worden.',
	'approvedrevs-editwarning' => 'Beachte bitte, dass du gerade die neueste Version dieser Seite bearbeitest. Sie entspricht nicht der bestätigten Version, die standardmäßig angezeigt wird.',
	'approvedrevs' => 'Bestätigte Versionen',
	'approvedrevs-approvedpages' => 'Alle Seiten mit bestätigten Versionen',
	'approvedrevs-notlatestpages' => 'Alle Seiten, deren bestätigte Version nicht die Neueste ist',
	'approvedrevs-unapprovedpages' => 'Alle Seiten mit unbestätigten Versionen',
	'approvedrevs-view' => 'Ansehen:',
	'approvedrevs-revisionnumber' => 'Version $1',
	'approvedrevs-approvedby' => 'von $1 am $2 bestätigt',
	'approvedrevs-difffromlatest' => 'Unterschied zur neuesten Version',
	'approvedrevs-approvelatest' => 'neueste Version bestätigen',
	'approvedrevs-approvethisrev' => 'Diese Version bestätigen.',
	'approvedrevs-viewlatestrev' => 'Die neueste Version ansehen.',
	'right-approverevisions' => 'Eine bestimmte Version einer Seite als bestätigt festlegen',
	'right-viewlinktolatest' => 'Erläuternde Hinweise im Kopfbereich der Seiten anzeigen, die eine bestätigte Version haben',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'approvedrevs-editwarning' => 'Beachten Sie bitte, dass Sie gerade die neueste Version dieser Seite bearbeiten. Sie entspricht nicht der bestätigten Version, die standardmäßig angezeigt wird.',
);

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 */
$messages['diq'] = array(
	'approvedrevs-approve' => 'Tesdiq ke',
	'approvedrevs-unapprove' => 'Tesdiqi wedarne',
	'approvedrevs-unapprovedpages' => 'Pela bêtesdiqın',
	'approvedrevs-view' => 'Bıvin:',
	'approvedrevs-revisionnumber' => 'Revizyonê $1',
	'approvedrevs-approvelatest' => 'Tesdiq kerdeno peyên',
	'approvedrevs-approvethisrev' => 'Nê rewizyonni tesdiq ke',
);

/** Lower Sorbian (dolnoserbski)
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
	'approvedrevs-unapprovesuccess2' => 'Njejo wěcej wobkšuśona wersija za toś ten bok.
Město togo prozna wersija se pokažo.',
	'approvedrevs-approveaction' => '$2 ako pśizwólonu wersiju za "[[$1]]" nastajiś',
	'approvedrevs-unapproveaction' => 'Pśizwólonu wersiju za "[[$1]]" anulěrowaś',
	'approvedrevs-notlatest' => 'To jo pśizwólona wersija toś togo boka; njejo nejnowša.',
	'approvedrevs-approvedandlatest' => 'To jo pśizwólona wersija toś togo boka a teke nejnowša.',
	'approvedrevs-blankpageshown' => 'Za toś ten bok njejo se žedna wersija wobkšuśiła.',
	'approvedrevs-editwarning' => 'Pšosym źiwaj na to, až wobźěłujoš něnto nejnowšu wersiju toś togo boka, kótaraž njejo wobkšuśona, kotraž so pó standarźe pokazujo.',
	'approvedrevs' => 'Wobkšuśone wersije',
	'approvedrevs-approvedpages' => 'Wšykne boki z pśizwóloneju wersiju',
	'approvedrevs-notlatestpages' => 'Boki, kótarychž pśizwólona wersija jo nejnowša',
	'approvedrevs-unapprovedpages' => 'Njewobkšuśone boki',
	'approvedrevs-view' => 'Naglěd:',
	'approvedrevs-revisionnumber' => 'wersija $1',
	'approvedrevs-approvedby' => 'wót $1 dnja $2 wobkšuśona',
	'approvedrevs-difffromlatest' => 'Rozdźěl k nejnowšej wersiji',
	'approvedrevs-approvelatest' => 'nejnowšu wersiju wobkšuśiś',
	'approvedrevs-approvethisrev' => 'Toś tu wersiju wobkšuśiś.',
	'approvedrevs-viewlatestrev' => 'Nejnowšu wersiju pokazaś.',
	'right-approverevisions' => 'Wěstu wersiju wikiboka ako pśizwólonu nastajiś',
	'right-viewlinktolatest' => 'Tekst wujasnjenja górjejce na bokach pokazaś, kótarež maju pśizwólonu wersiju',
);

/** Greek (Ελληνικά)
 * @author Aral
 * @author Glavkos
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
	'approvedrevs-unapprovesuccess2' => 'Δεν υπάρχει πλέον εγκεκριμένη έκδοση για αυτή τη σελίδα.
Αντί για αυτό, θα εμφανίζεται μια κενή σελίδα.',
	'approvedrevs-approveaction' => 'Ορίστε  $2 ως την εγκεκριμένη αναθεώρηση για "[[$1]]"',
	'approvedrevs-unapproveaction' => 'Ακυρώστε την εγκεκριμένη θεώρηση για [[$1]]',
	'approvedrevs-notlatest' => 'Αυτή είναι η εγκεκριμένη αναθεώρηση αυτής της σελίδας· δεν είναι η πιο πρόσφατη.',
	'approvedrevs-approvedandlatest' => 'Αυτή είναι η εγκεκριμένη αναθεώρηση αυτής της σελίδας, καθώς και η πιο πρόσφατη.',
	'approvedrevs-blankpageshown' => 'Καμία αναθεώρηση δεν έχει εγκριθεί για αυτή τη σελίδα.',
	'approvedrevs-editwarning' => 'Παρακαλώ λάβετε υπόχη σας ότι τώρα επεξεργάζεστε την τελευταία αναθεώρηση αυτή της σελίδας, η οποία δεν είναι η εγκεκριμένη να εμφανίζεται, από προεπιλογή.',
	'approvedrevs' => 'Εγκεκριμένες αναθεωρήσεις',
	'approvedrevs-approvedpages' => 'Όλες οι σελίδες με εγκεκριμένη αναθεώρηση',
	'approvedrevs-notlatestpages' => 'Σελίδες των οποίων οι εγκεκριμένες αναθεωρήσεις δεν είναι οι πιο πρόσφατες',
	'approvedrevs-unapprovedpages' => 'Μη εγκεκριμένες σελίδες',
	'approvedrevs-view' => 'Προβολή',
	'approvedrevs-revisionnumber' => 'αναθεώρηση $1',
	'approvedrevs-approvedby' => 'εγκρίθηκε από $1 στη  $2',
	'approvedrevs-difffromlatest' => 'diff από το τελευταίο',
	'approvedrevs-approvelatest' => 'εγκρίνετε την πιο πρόσφατη',
	'approvedrevs-approvethisrev' => 'Εγκρίνετε αυτή την αναθεώρηση.',
	'approvedrevs-viewlatestrev' => 'Δείτε την πιο πρόσφατη αναθεώρηση.',
	'right-approverevisions' => 'Ορίστε μια συγκεκριμένη αναθεώρηση μιας σελίδας wiki ως εγκεκριμένη',
	'right-viewlinktolatest' => 'Προβολή επεξηγηματικού κειμένου στο επάνω μέρος των σελίδων που έχουν εγκεκριμένη αναθεώρηση',
);

/** Esperanto (Esperanto)
 * @author Objectivesea
 * @author Yekrats
 */
$messages['eo'] = array(
	'approvedrevs-desc' => 'Marki solan revizion de paĝo kiel aprobita',
	'approvedrevs-logname' => 'Protokolo pri aprobado de revizioj',
	'approvedrevs-logdesc' => 'Jen protokolo de revizioj aprobitaj.',
	'approvedrevs-approve' => 'aprobi',
	'approvedrevs-unapprove' => 'malaprobi',
	'approvedrevs-approvesuccess' => 'Ĉi tiu revizio de la paĝo estis aprobita kiel la aprobita versio.',
	'approvedrevs-unapprovesuccess' => 'Ne plu estas aprobita versio por ĉi tiu paĝo.
Anstataŭe, la plej lasta revizio estos montrita.',
	'approvedrevs-unapprovesuccess2' => 'Ne plu estas aprobita verzio de ĉi tiu paĝo.
Anstataŭe, nula paĝo estos montrita.',
	'approvedrevs-approveaction' => 'Establi $2 kiel la aprobita revizio por "[[$1]]"',
	'approvedrevs-unapproveaction' => 'malestabli apbrobitan revizion por "[[$1]]"',
	'approvedrevs-notlatest' => 'Jen la aprobita revizio de ĉi tiu paĝo; ĝi ne estas la plej lastatempa.',
	'approvedrevs-approvedandlatest' => 'Jen la aprobita revizio de ĉi tiu paĝo, kaj ankaŭ estis la plej lastatempa.',
	'approvedrevs-blankpageshown' => 'Neniu revizio estis aprobita por ĉi tiu paĝo.',
	'approvedrevs-editwarning' => 'Bonvolu noti ke vi nun redaktas la lastan revizion de ĉi tiu paĝo, kiu ne estas la aprobita revizio montrita defaŭlte.',
	'approvedrevs' => 'Aprobitaj revizioj',
	'approvedrevs-approvedpages' => 'Ĉiujn pagojn kun aprobitaj revizioj',
	'approvedrevs-notlatestpages' => 'Paĝoj kies aprobita revizio ne estas la plej lasta.',
	'approvedrevs-unapprovedpages' => 'Malaprobitaj paĝoj',
	'approvedrevs-view' => 'Vidi:',
	'approvedrevs-revisionnumber' => 'revizio $1',
	'approvedrevs-approvedby' => 'aprobita de $1 je $2',
	'approvedrevs-difffromlatest' => 'Diferenco de la lasta revizio',
	'approvedrevs-approvelatest' => 'aprobi lastan revizion',
	'approvedrevs-approvethisrev' => 'Aprobi ĉi tiun revizion.',
	'approvedrevs-viewlatestrev' => 'Vidi la plej lastan revizion.',
	'right-approverevisions' => 'Marki certan revizion de vikipaĝo kiel aprobita',
	'right-viewlinktolatest' => 'Vidi eksplikantan tekston ĉe la paĝo-kapo kiu havas aprobitan revizion',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Crazymadlover
 * @author DJ Nietzsche
 * @author Dferg
 * @author Jurock
 * @author Locos epraix
 * @author Mashandy
 * @author Mor
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
	'approvedrevs-blankpageshown' => 'No se ha aprobado una revisión de esta página.',
	'approvedrevs-editwarning' => 'Tenga en cuenta que ahora está editando la última revisión de esta página, que no es la aprobada, que es la que se muestra de forma predeterminada.',
	'approvedrevs' => 'Revisiones aprobadas',
	'approvedrevs-approvedpages' => 'Todas las páginas con una revisión aprobada',
	'approvedrevs-notlatestpages' => 'Páginas cuya revisión aprobada no es la más reciente',
	'approvedrevs-unapprovedpages' => 'Páginas reprobadas',
	'approvedrevs-view' => 'Ver:',
	'approvedrevs-revisionnumber' => 'revisión $1',
	'approvedrevs-approvedby' => 'autorizada por $1 a las $2',
	'approvedrevs-difffromlatest' => 'diff con la última revisión',
	'approvedrevs-approvelatest' => 'aprueba última',
	'approvedrevs-approvethisrev' => 'Aprobar esta revisión.',
	'approvedrevs-viewlatestrev' => 'Ver la revisión más reciente.',
	'right-approverevisions' => 'Establecer una cierta revisión de una página wiki como aprobada',
	'right-viewlinktolatest' => 'Ver texto explicativo en la parte superior de las páginas que tienen una revisión aprobada',
);

/** Estonian (eesti)
 * @author Pikne
 */
$messages['et'] = array(
	'approvedrevs-desc' => 'Võimaldab lehekülje üksiku redaktsiooni heaks kiita.',
	'approvedrevs-logname' => 'Redaktsioonide heakskiidu logi',
	'approvedrevs-logdesc' => 'Selles logis on heakskiidetud redaktsioonid.',
	'approvedrevs-approve' => 'kiida heaks',
	'approvedrevs-unapprove' => 'tühista heakskiit',
	'approvedrevs-approvesuccess' => 'Lehekülje see redaktsioon on märgitud heakskiidetud versiooniks.',
	'approvedrevs-unapprovesuccess' => 'Sellel leheküljel pole enam heakskiidetud versiooni.
Selle asemel näidatakse viimast redaktsiooni.',
	'approvedrevs-unapprovesuccess2' => 'Sellel leheküljel pole enam heakskiidetud versiooni.
Selle asemel näidatakse tühja lehekülge.',
	'approvedrevs-approveaction' => 'märkis lehekülje "[[$1]]" heakskiidetud redaktsiooniks $2',
	'approvedrevs-unapproveaction' => 'tühistas lehekülje "[[$1]]" redaktsiooni heakskiidu',
	'approvedrevs-notlatest' => 'See on selle lehekülje heakskiidetud redaktsioon, mitte kõige viimane.',
	'approvedrevs-approvedandlatest' => 'See on selle lehekülje heakskiidetud redaktsioon, ühtlasi ka kõige viimane.',
	'approvedrevs-blankpageshown' => 'Ühtki selle lehekülje redaktsiooni pole heaks kiidetud.',
	'approvedrevs-editwarning' => 'Pane tähele, et redigeerid nüüd selle lehekülje viimast redaktsiooni, mitte heakskiidetud redaktsiooni, mida vaikimisi näidatakse.',
	'approvedrevs' => 'Heakskiidetud redaktsioonid',
	'approvedrevs-approvedpages' => 'Kõik heakskiidetud redaktsiooniga leheküljed',
	'approvedrevs-notlatestpages' => 'Leheküljed, mille heakskiidetud redaktsioon pole ühtlasi viimane',
	'approvedrevs-unapprovedpages' => 'Heakskiitmata leheküljed',
	'approvedrevs-view' => 'Vaata:',
	'approvedrevs-revisionnumber' => 'redaktsioon $1',
	'approvedrevs-approvedby' => 'heaks kiitnud {{GENDER:$3|$1}} kuupäeval $4, kell $5',
	'approvedrevs-difffromlatest' => 'erinevus viimasest',
);

/** Persian (فارسی)
 * @author Leyth
 * @author Mjbmr
 */
$messages['fa'] = array(
	'approvedrevs-approve' => 'تصویب',
	'approvedrevs-unapprove' => 'واگردانی تصویب',
	'approvedrevs-view' => 'مشاهده:',
	'approvedrevs-revisionnumber' => 'نسخهٔ $1',
);

/** Finnish (suomi)
 * @author Beluga
 * @author Centerlink
 * @author Crt
 * @author Nike
 * @author Stryn
 * @author VezonThunder
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
	'approvedrevs-unapprovesuccess2' => 'Tästä sivusta ei enää ole hyväksyttyä versiota.
Sellaisen sijaan esitetään tyhjä sivu.',
	'approvedrevs-approveaction' => 'asetti version $2 sivun "[[$1]]" hyväksytyksi versioksi',
	'approvedrevs-unapproveaction' => 'perui sivun "[[$1]]" hyväksytyn version',
	'approvedrevs-notlatest' => 'Tämä on  tämän sivun hyväksytty versio; se ei ole viimeisin.',
	'approvedrevs-approvedandlatest' => 'Tämä on tämän sivun hyväksytty ja samalla viimeisin versio.',
	'approvedrevs-blankpageshown' => 'Tästä sivusta ei ole hyväksyttyä versiota.',
	'approvedrevs-editwarning' => 'Huomaa, että muokkaat nyt sivun viimeisintä versiota, joka ei ole oletuksena esitetty hyväksytty versio.',
	'approvedrevs' => 'Hyväksytyt versiot',
	'approvedrevs-approvedpages' => 'Kaikki sivut, joista on hyväksytyt versiot',
	'approvedrevs-notlatestpages' => 'Sivut, joiden hyväksytty versio ei ole viimeisin',
	'approvedrevs-unapprovedpages' => 'Hyväksymättömät sivut',
	'approvedrevs-view' => 'Katso:',
	'approvedrevs-revisionnumber' => 'versio $1',
	'approvedrevs-approvedby' => 'hyväksynyt {{GENDER:$3|$1}} $4 kello $5',
	'approvedrevs-difffromlatest' => 'ero nykyiseen',
	'approvedrevs-approvelatest' => 'hyväksy viimeisin',
	'approvedrevs-approvethisrev' => 'Hyväksy tämä versio.',
	'approvedrevs-viewlatestrev' => 'Näytä viimeisin versio.',
	'right-approverevisions' => 'Asettaa wikisivun tietty versio hyväksytyksi',
	'right-viewlinktolatest' => 'Nähdä selittävä teksti niiden sivujen yläosassa, joilla on hyväksytty versio',
);

/** French (français)
 * @author Gomoko
 * @author IAlex
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
	'approvedrevs-blankpageshown' => 'Aucune version n’a été approuvée pour cette page.',
	'approvedrevs-editwarning' => "Veuillez noter que vous modifiez actuellement la dernière version de cette page, qui n'est pas celle approuvée affichée par défaut.",
	'approvedrevs' => 'Révisions approuvées',
	'approvedrevs-approvedpages' => 'Toutes les pages avec une révision approuvée',
	'approvedrevs-notlatestpages' => 'Pages dont la révision approuvée n’est pas la plus récente',
	'approvedrevs-unapprovedpages' => 'Pages non approuvées',
	'approvedrevs-view' => 'Voir :',
	'approvedrevs-revisionnumber' => 'modification $1',
	'approvedrevs-approvedby' => 'approuvé par $1 le $2',
	'approvedrevs-difffromlatest' => 'diff par rapport à actuel',
	'approvedrevs-approvelatest' => 'approuver la plus récente',
	'approvedrevs-approvethisrev' => 'Approuver cette révision.',
	'approvedrevs-viewlatestrev' => 'Voir la dernière révision.',
	'right-approverevisions' => 'Marquer une révision précise d’une page comme approuvée',
	'right-viewlinktolatest' => 'Voir le texte explicatif en haut des pages qui ont une révision approuvée',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'approvedrevs-desc' => 'Mârque una solèta vèrsion d’una pâge coment aprovâ.',
	'approvedrevs-logname' => 'Jornal de les aprobacions de vèrsions',
	'approvedrevs-logdesc' => 'O est lo jornal de les vèrsions que sont étâyes aprovâyes.',
	'approvedrevs-approve' => 'aprovar',
	'approvedrevs-unapprove' => 'dèsaprovar',
	'approvedrevs-approvesuccess' => 'Ceta vèrsion de la pâge est étâye marcâye coment la vèrsion aprovâye.',
	'approvedrevs-unapprovesuccess' => 'Y at gins de vèrsion aprovâ de ceta pâge.
A la place, la vèrsion la ples novèla serat montrâ.',
	'approvedrevs-unapprovesuccess2' => 'Y at gins de vèrsion aprovâ de ceta pâge.
A la place, una pâge voueda serat montrâ.',
	'approvedrevs-approveaction' => 'at marcâ $2 coment la vèrsion aprovâye de « [[$1]] »',
	'approvedrevs-unapproveaction' => 'at anulâ lo marcâjo d’una vèrsion aprovâ por « [[$1]] »',
	'approvedrevs-notlatest' => 'O est la vèrsion aprovâ de cela pâge ; o est pas la ples novèla.',
	'approvedrevs-approvedandlatest' => 'O est la vèrsion aprovâ de cela pâge, et pués la ples novèla.',
	'approvedrevs-blankpageshown' => 'Niona vèrsion at étâ aprovâ por cela pâge.',
	'approvedrevs-editwarning' => 'Volyéd notar que vos éte ora aprés changiér la dèrriére vèrsion de cela pâge, qu’est pas cela aprovâ montrâ per dèfôt.',
	'approvedrevs' => 'Vèrsions aprovâs',
	'approvedrevs-approvedpages' => 'Totes les pâges avouéc na vèrsion aprovâye',
	'approvedrevs-notlatestpages' => 'Pâges que la vèrsion aprovâ est pas la ples novèla',
	'approvedrevs-unapprovedpages' => 'Pâges pas aprovâs',
	'approvedrevs-view' => 'Vêre :',
	'approvedrevs-revisionnumber' => 'vèrsion $1',
	'approvedrevs-approvedby' => 'aprovâ per $1 lo $2',
	'approvedrevs-difffromlatest' => 'dif per rapôrt a la ples novèla',
	'approvedrevs-approvelatest' => 'aprovar la ples novèla',
	'approvedrevs-approvethisrev' => 'Aprovar cela vèrsion.',
	'approvedrevs-viewlatestrev' => 'Vêre la vèrsion la ples novèla.',
	'right-approverevisions' => 'Marcar una vèrsion cllâra d’una pâge coment aprovâ',
	'right-viewlinktolatest' => 'Vêre lo tèxto èxplicatif d’amont les pâges qu’ont una vèrsion aprovâ',
);

/** Galician (galego)
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
	'approvedrevs-blankpageshown' => 'Esta páxina non ten ningunha revisión aprobada.',
	'approvedrevs-editwarning' => 'Teña en conta que está a editar a última revisión desta páxina, e non a aprobada que se mostra por defecto.',
	'approvedrevs' => 'Revisións aprobadas',
	'approvedrevs-approvedpages' => 'Todas as páxinas cunha revisión aprobada',
	'approvedrevs-notlatestpages' => 'Páxinas cuxa revisión aprobada non é a máis recente',
	'approvedrevs-unapprovedpages' => 'Páxinas suspendidas',
	'approvedrevs-view' => 'Ver:',
	'approvedrevs-revisionnumber' => 'revisión $1',
	'approvedrevs-approvedby' => 'aprobada por $1 o $2',
	'approvedrevs-difffromlatest' => 'diferenzas coa última',
	'approvedrevs-approvelatest' => 'aprobar a última',
	'approvedrevs-approvethisrev' => 'Aprobar esta revisión.',
	'approvedrevs-viewlatestrev' => 'Ollar a última revisión.',
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
	'approvedrevs-blankpageshown' => 'Kei Version vu däre Syte isch bishär bstetigt wore.',
	'approvedrevs-editwarning' => 'Bitte gib Acht, ass Du grad an dr nejschte Version vu däre Syte schaffsch. Des isch nit di bstetigt Version, wu standardmäßig aazeigt wird.',
	'approvedrevs' => 'Aagluegti Versione',
	'approvedrevs-approvedpages' => 'Aagluegti Syte', # Fuzzy
	'approvedrevs-notlatestpages' => 'Syte, wu di aagluegt Version nit di nejscht isch',
	'approvedrevs-unapprovedpages' => 'Nit bstetigti Syte',
	'approvedrevs-view' => 'Aaluege:',
	'approvedrevs-revisionnumber' => 'Version $1',
	'approvedrevs-approvedby' => 'vu $1 am $2 bstetigt',
	'approvedrevs-difffromlatest' => 'Unterschid zue dr nejschte Version',
	'approvedrevs-approvelatest' => 'nejschti Version bstetige',
	'approvedrevs-approvethisrev' => 'Die Version bstetige.',
	'approvedrevs-viewlatestrev' => 'Di nejscht Version aaluege.',
	'right-approverevisions' => 'E sicheri Version vun ere Wikisyte as aagluegt markiere',
	'right-viewlinktolatest' => 'Dr Erklerigstext aaluege obe uf Syte, wu s e aagluegti Version git',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Inkbug
 */
$messages['he'] = array(
	'approvedrevs-desc' => 'הגדרת גרסה אחת של דף כגרסה מאושרת',
	'approvedrevs-logname' => 'יומן אישור גרסאות',
	'approvedrevs-logdesc' => 'זהו יומן של גרסאות שאושרו.',
	'approvedrevs-approve' => 'לאשר',
	'approvedrevs-unapprove' => 'לבטל אישור',
	'approvedrevs-approvesuccess' => 'הגרסה הזאת של הדף הוגדרה כגרסה מאושרת.',
	'approvedrevs-unapprovesuccess' => 'אין עוד גרסה מאושרת לדף זה.
במקום זאת תוצג הגרסה העדכנית ביותר.',
	'approvedrevs-unapprovesuccess2' => 'אין עוד גרסה מאושרת לדף זה.
במקום זאת יוצג דף ריק.',
	'approvedrevs-approveaction' => 'להגדיר את $2 בתור הגרסה המאושרת עבור "[[$1]]"',
	'approvedrevs-unapproveaction' => 'לבטל אישור גרסה עבור "[[$1]]"',
	'approvedrevs-notlatest' => 'זוהי הגרסה המאושרת של הדף הזה; היא לא העדכנית ביותר.',
	'approvedrevs-approvedandlatest' => 'זוהי הגרסה המאושרת של הדף הזה, והיא גם העדכנית ביותר.',
	'approvedrevs-blankpageshown' => 'שום גרסה של דף זה לא אושרה.',
	'approvedrevs-editwarning' => 'יש לשים לב לכך שעכשיו נערכת הגרסה העדכנית ביותר של הדף הזה, ולא המאושרת שמוצגת כבררת מחדל.',
	'approvedrevs' => 'גרסאות מאושרות',
	'approvedrevs-approvedpages' => 'כל הדפים עם גרסה מאושרת',
	'approvedrevs-notlatestpages' => 'דפים שהגרסה המאושרת שלהם אינה הגרסה העדכנית ביותר',
	'approvedrevs-unapprovedpages' => 'דפים לא מאושרים',
	'approvedrevs-view' => 'תצוגה:',
	'approvedrevs-revisionnumber' => 'גרסה $1',
	'approvedrevs-approvedby' => 'אושר על־ידי $1 ב־$2',
	'approvedrevs-difffromlatest' => 'השוואה עם הגרסה האחרונה',
	'approvedrevs-approvelatest' => 'לאשר את האחרונה',
	'approvedrevs-approvethisrev' => 'לאשר את הגרסה הזאת.',
	'approvedrevs-viewlatestrev' => 'להציג את הגרסה האחרונה.',
	'right-approverevisions' => 'הגדר גרסה מסוימת של דף הוויקי כמאושרת',
	'right-viewlinktolatest' => 'הצגת הסבר בחלק העליון של העמודים שיש להם גרסה מאושרת',
);

/** Hindi (हिन्दी)
 * @author Ansumang
 * @author Siddhartha Ghai
 */
$messages['hi'] = array(
	'approvedrevs-logname' => 'अवतरण अनुमोदन लॉग',
	'approvedrevs-approve' => 'अनुमोदित करें',
	'approvedrevs-unapprove' => 'अनुमोदन रद्द करें',
	'approvedrevs' => 'अनुमोदित अवतरण',
	'approvedrevs-view' => 'देखें:',
	'approvedrevs-revisionnumber' => 'अवतरण $1',
	'approvedrevs-approvethisrev' => 'इस अवतरण को अनुमोदीत करें।',
);

/** Upper Sorbian (hornjoserbsce)
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
	'approvedrevs-unapprovesuccess2' => 'Schwalena wersija za tutu stronu wjace njeje.
Město toho so prózdna strona pokaza.',
	'approvedrevs-approveaction' => 'je $2 jako schwalenu wersiju za "[[$1]]" nastajił',
	'approvedrevs-unapproveaction' => 'je status schwalena wersija za "[[$1]]" wotstronił',
	'approvedrevs-notlatest' => 'To je schwalena wersija tuteje strony; njeje najnowša.',
	'approvedrevs-approvedandlatest' => 'To je schwalena wersija tuteje strony, kotraž je tež najnowša.',
	'approvedrevs-blankpageshown' => 'Za tutu stronu njeje so žana wersija schwaliła.',
	'approvedrevs-editwarning' => 'Prošu dźiwaj na to, zo nětko wobdźěłuješ najnowšu wersiju strony, kotraž schwalenej, kotraž so jako standard pokazuje, njewotpowěduje.',
	'approvedrevs' => 'Schwalene wersije',
	'approvedrevs-approvedpages' => 'Wšě strony ze schwalenej wersiju',
	'approvedrevs-notlatestpages' => 'Strony, kotrychž wersija njeje jich najnowša',
	'approvedrevs-unapprovedpages' => 'Njeschwalene strony',
	'approvedrevs-view' => 'Wobhladać sej',
	'approvedrevs-revisionnumber' => 'wersija $1',
	'approvedrevs-approvedby' => 'wot $1 dnja $2 schwalena',
	'approvedrevs-difffromlatest' => 'rozdźěl k najnowšej wersiji',
	'approvedrevs-approvelatest' => 'najnowšu wersiju schwalić',
	'approvedrevs-approvethisrev' => 'Tutu wersiju schwalić.',
	'approvedrevs-viewlatestrev' => 'Najnowšu wersiju pokazać.',
	'right-approverevisions' => 'Wěstu wersiju wikistrony jako schwalenu nastajić',
	'right-viewlinktolatest' => 'Rozłožowacy tekst horjeka na stronach pokazać, kotrež maja schwalenu wersiju.',
);

/** Hungarian (magyar)
 * @author Dj
 * @author Misibacsi
 * @author Tacsipacsi
 */
$messages['hu'] = array(
	'approvedrevs-approve' => 'elfogadás',
	'approvedrevs-approvedpages' => 'Valamennyi lap ellenőrzött szerkesztéssel',
	'approvedrevs-difffromlatest' => 'Eltérés az aktuális változattól',
);

/** Interlingua (interlingua)
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
	'approvedrevs-blankpageshown' => 'Nulle version de iste pagina ha essite approbate.',
	'approvedrevs-editwarning' => 'Nota ben que tu modifica ora le ultime version de iste pagina, le qual non es le version approbate que es monstrate normalmente.',
	'approvedrevs' => 'Versiones approbate',
	'approvedrevs-approvedpages' => 'Tote le paginas con un version approbate',
	'approvedrevs-notlatestpages' => 'Paginas del quales le version approbate non es lor ultime',
	'approvedrevs-unapprovedpages' => 'Paginas non approbate',
	'approvedrevs-view' => 'Vider:',
	'approvedrevs-revisionnumber' => 'version $1',
	'approvedrevs-approvedby' => 'approbate per $1 le $2',
	'approvedrevs-difffromlatest' => 'differentias del ultime version',
	'approvedrevs-approvelatest' => 'approbar le plus recente',
	'approvedrevs-approvethisrev' => 'Approbar iste version.',
	'approvedrevs-viewlatestrev' => 'Vider le version le plus recente.',
	'right-approverevisions' => 'Marcar un certe version de un pagina wiki como approbate',
	'right-viewlinktolatest' => 'Vider le texto explicative in alto del paginas que ha un version approbate',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 * @author IvanLanin
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
	'approvedrevs-blankpageshown' => 'Tidak ada revisi yang disetujui untuk halaman ini.',
	'approvedrevs-editwarning' => 'Harap perhatikan bahwa Anda sekarang menyunting revisi terbaru halaman ini, yang secara bawaan bukan merupakan revisi yang disetujui.',
	'approvedrevs' => 'Revisi yang disetujui',
	'approvedrevs-approvedpages' => 'Semua halaman dengan revisi yang disetujui',
	'approvedrevs-notlatestpages' => 'Halaman yang revisi disetujuinya bukanlah revisi terakhir',
	'approvedrevs-unapprovedpages' => 'Halaman tidak disetujui',
	'approvedrevs-view' => 'Lihat:',
	'approvedrevs-revisionnumber' => 'revisi $1',
	'approvedrevs-approvedby' => 'disetujui oleh $1 pada $2',
	'approvedrevs-difffromlatest' => 'perbedaan dengan yang terbaru',
	'approvedrevs-approvelatest' => 'setujui yang terbaru',
	'approvedrevs-approvethisrev' => 'Setujui revisi ini.',
	'approvedrevs-viewlatestrev' => 'Lihat revisi terbaru.',
	'right-approverevisions' => 'Tetapkan revisi tertentu dari halaman wiki sebagai disetujui',
	'right-viewlinktolatest' => 'Lihat penjelasan di atas halaman yang memiliki revisi disetujui',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'approvedrevs-approve' => 'kwé',
	'approvedrevs-unapprove' => 'ékwèkwàlà',
	'approvedrevs-approvedpages' => 'Ihü hé kwèrè',
	'approvedrevs-view' => 'Lèzí:',
);

/** Italian (italiano)
 * @author Beta16
 * @author Rippitippi
 */
$messages['it'] = array(
	'approvedrevs-desc' => 'Imposta una singola versione di una pagina come approvata',
	'approvedrevs-logname' => 'Registro di approvazione delle versioni',
	'approvedrevs-logdesc' => 'Questo è il registro delle versioni che sono state approvate.',
	'approvedrevs-approve' => 'approva',
	'approvedrevs-unapprove' => 'non approvare',
	'approvedrevs-approvesuccess' => 'Questa versione della pagina è stata impostata come quella approvata.',
	'approvedrevs-unapprovesuccess' => 'Non ci sono ancora versioni approvate per questa pagina.
Al suo posto verrà mostrata la versione più recente.',
	'approvedrevs-unapprovesuccess2' => 'Non ci sono ancora versioni approvate per questa pagina.
Al suo posto verrà mostrata una pagina vuota.',
	'approvedrevs-approveaction' => 'impostare $2 come la versione approvata per "[[$1]]"',
	'approvedrevs-unapproveaction' => 'rimuovi l\'impostazione della versione approvata per "[[$1]]"',
	'approvedrevs-notlatest' => 'Questa è la versione approvata di questa pagina, non è la più recente.',
	'approvedrevs-approvedandlatest' => 'Questa è la versione approvata di questa pagina, oltre ad essere la più recente.',
	'approvedrevs-blankpageshown' => 'Per questa pagina non è stata approvata alcuna versione.',
	'approvedrevs-editwarning' => "Si prega di notare che si sta modificando l'ultima versione di questa pagina, che non è quella approvata e visualizzata come impostazione predefinita.",
	'approvedrevs' => 'Versioni approvate',
	'approvedrevs-approvedpages' => 'Tutte le pagine con una versione approvata',
	'approvedrevs-notlatestpages' => 'Pagine la cui versione approvata non è la loro ultima',
	'approvedrevs-unapprovedpages' => 'Pagine non approvate',
	'approvedrevs-view' => 'Visualizzare:',
	'approvedrevs-revisionnumber' => 'versione $1',
	'approvedrevs-approvedby' => 'approvato da $1 su $2',
	'approvedrevs-difffromlatest' => 'differenza dal più recente',
	'approvedrevs-approvelatest' => 'approvare i più recenti',
	'approvedrevs-approvethisrev' => 'Approva questa versione.',
	'approvedrevs-viewlatestrev' => 'Visualizza la versione più recente.',
	'right-approverevisions' => 'Imposta una versione di una pagina wiki come approvata',
	'right-viewlinktolatest' => 'Visualizza del testo esplicativo nella parte superiore delle pagine che hanno una versione approvata',
);

/** Japanese (日本語)
 * @author Iwai.masaharu
 * @author Ohgi
 * @author Shirayuki
 * @author W.CC
 * @author 青子守歌
 */
$messages['ja'] = array(
	'approvedrevs-desc' => 'ページの版のうち 1 つを承認済みにする',
	'approvedrevs-logname' => '版の承認記録',
	'approvedrevs-logdesc' => '以下は、承認された版の記録です。',
	'approvedrevs-approve' => '承認',
	'approvedrevs-unapprove' => '非承認',
	'approvedrevs-approvesuccess' => 'この版を承認済み版として指定しました。',
	'approvedrevs-unapprovesuccess' => 'このページには承認済み版がなくなりました。
代わりに、最新版を表示します。',
	'approvedrevs-unapprovesuccess2' => 'このページには承認済み版がなくなりました。
代わりに、白紙のページを表示します。',
	'approvedrevs-approveaction' => '「[[$1]]」の承認済み版として$2を指定',
	'approvedrevs-unapproveaction' => '「[[$1]]」の承認済み版の指定を解除',
	'approvedrevs-notlatest' => 'これは、このページの承認済み版です。最新版ではありません。',
	'approvedrevs-approvedandlatest' => 'これは、このページの承認済み版であり、最新版でもあります。',
	'approvedrevs-blankpageshown' => 'このページには、承認済み版がありません。',
	'approvedrevs-editwarning' => '現在編集しているのはこのページの最新版であり、既定で表示される承認済み版とは異なることにご注意ください。',
	'approvedrevs' => '承認済み版',
	'approvedrevs-approvedpages' => '承認済の版があるすべてのページ',
	'approvedrevs-notlatestpages' => '承認済み版が、最新版ではないページ',
	'approvedrevs-unapprovedpages' => '未承認ページ',
	'approvedrevs-view' => '表示:',
	'approvedrevs-revisionnumber' => '版 $1',
	'approvedrevs-approvedby' => '{{GENDER:$3|$1}} によって $4 $5 に承認されました',
	'approvedrevs-difffromlatest' => '最新版との差分',
	'approvedrevs-approvelatest' => '最新版を承認',
	'approvedrevs-approvethisrev' => 'この版を承認',
	'approvedrevs-viewlatestrev' => '最新版を閲覧',
	'right-approverevisions' => 'ウィキページの特定の版を承認済みに設定',
	'right-viewlinktolatest' => '承認済み版があるページの冒頭に説明文を表示',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'approvedrevs-approve' => 'დამოწმება',
	'approvedrevs-unapprove' => 'დამოწმების მოხსნა',
	'approvedrevs' => 'შემოწმებული ვერსიები',
	'approvedrevs-approvedpages' => 'ყველა გვერდი შემოწმებული ვერსიით',
	'approvedrevs-notlatestpages' => 'გვერდები, რომელთა შემოწმებული ვერსიები ბოლო არ არის',
	'approvedrevs-unapprovedpages' => 'შეუმოწმებელი გვერდები',
	'approvedrevs-view' => 'ხილვა:',
	'approvedrevs-revisionnumber' => 'ვერსია $1',
	'approvedrevs-approvedby' => 'შეამოწმა მომხმარებელმა {{GENDER:$3|$1}} $4 $5',
	'approvedrevs-difffromlatest' => 'განსხვავება ბოლოსთან',
	'approvedrevs-approvelatest' => 'ბოლოს შემოწმება',
	'approvedrevs-approvethisrev' => 'ამ ვერსიის შემოწმება.',
	'approvedrevs-viewlatestrev' => 'ბოლო ვერსიის ხილვა.',
);

/** Khmer (ភាសាខ្មែរ)
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'approvedrevs-approve' => 'អនុម័ត',
	'approvedrevs-unapprove' => 'មិនអនុម័ត',
);

/** Korean (한국어)
 * @author 아라
 */
$messages['ko'] = array(
	'approvedrevs-desc' => '확인한 문서의 개정판 하나를 설정합니다',
	'approvedrevs-logname' => '개정판 확인 기록',
	'approvedrevs-logdesc' => '개정판을 확인한 기록입니다.',
	'approvedrevs-approve' => '확인',
	'approvedrevs-unapprove' => '미확인',
	'approvedrevs-approvesuccess' => '이 문서의 개정판을 확인한 판으로 설정했습니다.',
	'approvedrevs-unapprovesuccess' => '더 이상 이 문서에 대해 확인한 판이 없습니다.
대신에 최근의 개정판이 보여집니다.',
	'approvedrevs-unapprovesuccess2' => '더 이상 이 문서에 대해 확인한 판이 없습니다.
대신에 빈 문서가 보여집니다.',
	'approvedrevs-approveaction' => '"[[$1]]"에 대해 확인한 개정판 $2(으)로 설정',
	'approvedrevs-unapproveaction' => '"[[$1]]"에 대해 확인한 개정판 해제',
	'approvedrevs-notlatest' => '이 문서의 확인한 개정판은 최근 판이 아닙니다.',
	'approvedrevs-approvedandlatest' => '이 문서의 확인한 개정판은 최근 판입니다.',
	'approvedrevs-blankpageshown' => '이 문서에 대한 개정판의 확인이 없습니다.',
	'approvedrevs-editwarning' => '기본으로 하나만 보여지지 않는 이 문서의 최근 개정판을 지금 편집하고 있다는 것을 알아두세요.',
	'approvedrevs' => '확인한 개정판',
	'approvedrevs-approvedpages' => '확인한 개정판의 모든 문서',
	'approvedrevs-notlatestpages' => '확인한 개정판의 문서는 최신 판이 아닙니다.',
	'approvedrevs-unapprovedpages' => '확인하지 않은 문서',
	'approvedrevs-view' => '보기:',
	'approvedrevs-revisionnumber' => '$1 판',
	'approvedrevs-approvedby' => '$2에 $1에 의해 확인함',
	'approvedrevs-difffromlatest' => '최신판과의 비교',
	'approvedrevs-approvelatest' => '최신판 확인',
	'approvedrevs-approvethisrev' => '이 개정판을 확인합니다.',
	'approvedrevs-viewlatestrev' => '최근 개정판을 봅니다.',
	'right-approverevisions' => '확인한 위키 문서의 특정 개정판 설정',
	'right-viewlinktolatest' => '확인한 개정판이 있는 문서의 위에 대한 설명 텍스트 보기',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'approvedrevs-desc' => 'Määd et müjjelesch, vun ener Sigg en beshtemmpte Version jood_ze_heiße.',
	'approvedrevs-logname' => 'Logbooch vum Versione vun Sigge Joodheiße',
	'approvedrevs-logdesc' => 'En heh däm Logbooch wääde de joodjeheiße Versione vun Sigge faßjehallde.',
	'approvedrevs-approve' => 'joodheiße',
	'approvedrevs-unapprove' => 'nit joodheiße',
	'approvedrevs-approvesuccess' => 'Heh di Version vun dä Sigge wood joodjeheiße.',
	'approvedrevs-unapprovesuccess' => 'Jäz jidd_et kein joodjeheiße Version vun dä Sigg mieh.
Doför kritt mer de neuste Version aanjezeish.',
	'approvedrevs-unapprovesuccess2' => 'Jäz jidd_et kein joodjeheiße Version vun dä Sigg mieh.
Doför kritt mer en läddije Sigg aanjezeish.',
	'approvedrevs-approveaction' => 'hät $2 vun dä Sigg „[[$1]]“ joodjeheiße',
	'approvedrevs-unapproveaction' => 'donn kein Version vun dä Sigg „[[$1]]“ mieh joodheiße',
	'approvedrevs-notlatest' => 'Dat heh es de joodjeheiße Version vun dä Sigg, es ävver nit de neuste Version.',
	'approvedrevs-approvedandlatest' => 'Dat heh es de joodjeheiße Version vun dä Sigg, un och de Neuste.',
	'approvedrevs-blankpageshown' => 'Vun heh dä Sigg jidd_et kein joodjeheiße Version.',
	'approvedrevs-editwarning' => 'Opjepaß: Do bes de neuste Version vun heh dä Sigg aam ändere. Dat es nit de joodjeheiße Version, di mer shtandmääßesch aanjezeish kritt.',
	'approvedrevs' => 'Joodjeheiße Versione',
	'approvedrevs-approvedpages' => 'Alle Sigge med en joodjeheiße Version',
	'approvedrevs-notlatestpages' => 'Sigge, woh de joodjeheiße Version nit de neuste es.',
	'approvedrevs-unapprovedpages' => 'De nit joodjeheiße Sigge',
	'approvedrevs-view' => 'Aanloore:',
	'approvedrevs-revisionnumber' => 'Version $1',
	'approvedrevs-approvedby' => 'joodjeheiße {{GENDER:$1|vum|vum|vum Metmaacher|vun dä|vum}} $1 aam $2',
	'approvedrevs-difffromlatest' => 'der Ongerscheid zor neuste Version',
	'approvedrevs-approvelatest' => 'de neuste Verson joodheiße',
	'approvedrevs-approvethisrev' => 'Heh di Version joodheiße',
	'approvedrevs-viewlatestrev' => 'De neuste Version aanloore',
	'right-approverevisions' => 'En beshtemmpte Version vun ene Sigg em Wiki jooheiße',
	'right-viewlinktolatest' => 'Täx met Henwies drövver op Sigge met joodjeheiße Version aanzeije',
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
	'approvedrevs-blankpageshown' => 'Keng Versioun vun dëser Säit gouf nogekuckt.',
	'approvedrevs-editwarning' => 'Informatioun: Dir ännert déi lescht Versioun vun dëser Säit, déi net déi nogekuckten ass déi standardméisseg gewise gëtt.',
	'approvedrevs' => 'Nogekuckte Versiounen',
	'approvedrevs-approvedpages' => 'All Säite mat enger nogekuckter Versioun',
	'approvedrevs-notlatestpages' => 'Säiten deenen hir nogekuckte Versioun net déi rezentst ass',
	'approvedrevs-unapprovedpages' => 'Net nogekuckte Säiten',
	'approvedrevs-view' => 'Weisen:',
	'approvedrevs-revisionnumber' => 'Versioun $1',
	'approvedrevs-approvedby' => 'confirméiert vum $1 de(n) $2',
	'approvedrevs-difffromlatest' => 'Ënnerscheed vun der rezenster',
	'approvedrevs-approvelatest' => 'lescht Versioun confirméieren',
	'approvedrevs-approvethisrev' => 'Dës Versioun confirméieren.',
	'approvedrevs-viewlatestrev' => 'Déi lescht Versioun weisen.',
	'right-approverevisions' => 'Eng bestëmmte Versioun vun enger Säit als nogekuckt markéieren',
	'right-viewlinktolatest' => 'Kuckt den Erklärungstext uewen op de Säiten déi nogekuckt Versiounen hunn',
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 * @author Homo
 * @author Ignas693
 */
$messages['lt'] = array(
	'approvedrevs-desc' => 'Nustatyti vieną puslapį su patvirtinta peržiūros',
	'approvedrevs-logname' => 'Pakeitimo patvirtinimo žurnalas',
	'approvedrevs-logdesc' => 'Tai yra pataisymų, kurie buvo patvirtinti žurnalą.',
	'approvedrevs-approve' => 'Patvirtinti',
	'approvedrevs-unapprove' => 'Patvirtinti',
	'approvedrevs-approvesuccess' => 'Puslapio peržiūros yra nustatytas kaip patvirtintą versiją.',
	'approvedrevs-unapprovesuccess' => 'Nebėra patvirtintų versija šio puslapio.
Vietoj to, rodoma paskutinio peržiūrėjimo.',
	'approvedrevs-unapprovesuccess2' => 'Nebėra patvirtintų versija šio puslapio.
Vietoj to, rodoma paskutinio peržiūrėjimo.',
	'approvedrevs-approveaction' => 'nustatyti  $2  kaip patvirtinta peržiūros dėl "[[ $1 ]]"', # Fuzzy
	'approvedrevs-unapproveaction' => 'nustatyti  $2  kaip patvirtinta peržiūros dėl "[[ $1 ]]"', # Fuzzy
	'approvedrevs-notlatest' => 'Tai yra patvirtintos peržiūrėjimo šio puslapio; tai ne pačius naujausius.',
	'approvedrevs-approvedandlatest' => 'Tai yra patvirtintos peržiūrėjimo šio puslapio; tai ne pačius naujausius.',
	'approvedrevs-blankpageshown' => 'Nr peržiūros buvo patvirtintas šio puslapio.',
	'approvedrevs-editwarning' => 'Atkreipkite dėmesį, kad dabar redaguojate šiame puslapyje, kurie nėra patvirtinti vėliausios peržiūros vienas rodomi pagal numatytuosius parametrus.',
	'approvedrevs' => 'Patvirtintos versijos',
	'approvedrevs-approvedpages' => 'Visi puslapiai su patvirtinta peržiūros', # Fuzzy
	'approvedrevs-notlatestpages' => 'Puslapiai, kurių patvirtinto pakeitimo nėra jų naujausia',
	'approvedrevs-unapprovedpages' => 'Nepatvirtintas puslapių',
	'approvedrevs-view' => 'Žiūrėti:',
	'approvedrevs-revisionnumber' => 'versija $1',
	'approvedrevs-approvedby' => 'patvirtintas  $1  dėl$2',
	'approvedrevs-difffromlatest' => 'diff iš vėliau kaip',
	'approvedrevs-approvelatest' => 'patvirtinti naujausią',
	'approvedrevs-approvethisrev' => 'Patvirtinti šios peržiūros.',
	'approvedrevs-viewlatestrev' => 'Peržiūrėti naujausių peržiūrėjimo.',
	'right-approverevisions' => 'Nustatyti vieną puslapį su patvirtinta peržiūros',
	'right-viewlinktolatest' => 'Peržiūrėti paaiškinamasis tekstas viršuje, puslapiai, kurie patvirtintų peržiūros',
);

/** Basa Banyumasan (Basa Banyumasan)
 * @author StefanusRA
 */
$messages['map-bms'] = array(
	'approvedrevs-approve' => 'setujuni',
);

/** Macedonian (македонски)
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
	'approvedrevs-blankpageshown' => 'Нема одобрена ревизија за страницава.',
	'approvedrevs-editwarning' => 'Имајте предвид дека сега ја уредувате најновата верзија на страницава, која не е одобрената што се прикажува по основно.',
	'approvedrevs' => 'Одобрени ревизии',
	'approvedrevs-approvedpages' => 'Сите страници со одобрена ревизија',
	'approvedrevs-notlatestpages' => 'Страници чиишто одобрени ревизии не се најновите',
	'approvedrevs-unapprovedpages' => 'Неодобрени страници',
	'approvedrevs-view' => 'Преглед:',
	'approvedrevs-revisionnumber' => 'ревизија $1',
	'approvedrevs-approvedby' => 'одобрено од $1 на $2',
	'approvedrevs-difffromlatest' => 'разл. од послед.',
	'approvedrevs-approvelatest' => 'одобри најнова',
	'approvedrevs-approvethisrev' => 'Одобри ја ревизијава.',
	'approvedrevs-viewlatestrev' => 'Најнова ревизија.',
	'right-approverevisions' => 'Поставете извесна ревизија на вики-страница како одобрена',
	'right-viewlinktolatest' => 'Погледајте го образложението на врвот од страниците што имаат одобрена верзија',
);

/** Malayalam (മലയാളം)
 * @author Junaidpv
 * @author Praveenp
 */
$messages['ml'] = array(
	'approvedrevs-desc' => 'ഒരു താളിന്റെ ഒരൊറ്റ നാൾപ്പതിപ്പ് അംഗീകരിച്ചതായി സജ്ജീകരിക്കുക',
	'approvedrevs-logname' => 'നാൾപ്പതിപ്പ് അംഗീകരണ രേഖ',
	'approvedrevs-logdesc' => 'ഇത് നാൾപ്പതിപ്പുകൾ അംഗീകരിച്ചതിന്റെ രേഖയാണ്.',
	'approvedrevs-approve' => 'അംഗീകരിക്കുക',
	'approvedrevs-unapprove' => 'അംഗീകാരം നീക്കുക',
	'approvedrevs-approvesuccess' => 'താളിന്റെ ഈ നാൾപ്പതിപ്പ് അംഗീകരിച്ച പതിപ്പായി സജ്ജീകരിച്ചിരിക്കുന്നു.',
	'approvedrevs-unapprovesuccess' => 'ഈ താളിൽ അംഗീകരിച്ച പതിപ്പ് ഇല്ല.
പകരം, ഏറ്റവും പുതിയ നാൾപ്പതിപ്പ് പ്രദർശിപ്പിക്കുന്നു.',
	'approvedrevs-unapprovesuccess2' => 'ഈ താളിന് അംഗീകരിച്ച പതിപ്പ് ഇല്ല.
പകരം, ശൂന്യമായ താൾ പ്രദർശിപ്പിക്കുന്നു.',
	'approvedrevs-approveaction' => '"[[$1]]" താളിന്റെ അംഗീകരിച്ച പതിപ്പായി $2 സജ്ജീകരിക്കുക',
	'approvedrevs-unapproveaction' => '"[[$1]]" എന്നതിന്റെ അംഗീകൃത നാൾപ്പതിപ്പ് സജ്ജീകരണം നീക്കുക',
	'approvedrevs-notlatest' => 'ഇത് ഈ താളിന്റെ അംഗീകരിച്ച നാൾപ്പതിപ്പ് ആണ്; ഇത് ഏറ്റവും പുതിയത് അല്ല.',
	'approvedrevs-approvedandlatest' => 'ഇത് ഈ താളിന്റെ അംഗീകരിച്ച പതിപ്പ് ആണ്, അതേ പോലെ ഏറ്റവും പുതിയതുമാണ്.',
	'approvedrevs-blankpageshown' => 'ഈ താളിന്റെ ഒരു നാൾപ്പതിപ്പും അംഗീകരിച്ചിട്ടില്ല.',
	'approvedrevs-editwarning' => 'ഈ താളിന്റെ ഏറ്റവും പുതിയ നാൾപ്പതിപ്പ് അല്ല താങ്കൾ തിരുത്തുന്നതെന്ന് ശ്രദ്ധിക്കുക, അത് സ്വതേ പ്രദർശിപ്പിച്ചിരിക്കുന്ന പതിപ്പ് അല്ല.',
	'approvedrevs' => 'അംഗീകരിച്ച നാൾപ്പതിപ്പുകൾ',
	'approvedrevs-approvedpages' => 'അംഗീകരിച്ച താളുകൾ', # Fuzzy
	'approvedrevs-notlatestpages' => 'താളിന്റെ ഏറ്റവും പുതിയ നാൾപ്പതിപ്പ് അംഗീകരിച്ചതല്ലാത്ത താളുകൾ',
	'approvedrevs-unapprovedpages' => 'അംഗീകരിച്ചിട്ടില്ലാത്ത താളുകൾ',
	'approvedrevs-view' => 'കാണുക:',
	'approvedrevs-revisionnumber' => 'നാൾപ്പതിപ്പ് $1',
	'approvedrevs-approvedby' => '$2-നു $1 അംഗീകരിച്ചത്',
	'approvedrevs-difffromlatest' => 'ഏറ്റവും പുതിയ പതിപ്പിൽ നിന്നുള്ള വ്യത്യാസം',
	'approvedrevs-approvelatest' => 'ഒടുവിലേത്തത് അംഗീകരിക്കുക',
	'approvedrevs-approvethisrev' => 'ഈ നാൾപ്പതിപ്പ് അംഗീകരിക്കുക.',
	'approvedrevs-viewlatestrev' => 'ഏറ്റവും പുതിയ നാൾപ്പതിപ്പ് കാണുക.',
	'right-approverevisions' => 'വിക്കി താളിന്റെ ഒരു പ്രത്യേക നാൾപ്പതിപ്പ് അംഗീകരിച്ചതായി സജ്ജീകരിക്കുക',
	'right-viewlinktolatest' => 'അംഗീകരിച്ച നാൾപ്പതിപ്പുള്ള താളുകളുടെ മുകളിലായി ഒരു വിശദീകരണ കുറിപ്പ് പ്രദർശിപ്പിക്കുക',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'approvedrevs-desc' => 'Tetapkan satu semakan laman sebagai diluluskan',
	'approvedrevs-logname' => 'Log pelulusan semakan',
	'approvedrevs-logdesc' => 'Inilah log semakan yang diluluskan.',
	'approvedrevs-approve' => 'luluskan',
	'approvedrevs-unapprove' => 'tarik balik kelulusan',
	'approvedrevs-approvesuccess' => 'Semakan ini telah disetkan sebagai versi yang diluluskan bagi laman ini.',
	'approvedrevs-unapprovesuccess' => 'Tiada lagi versi yang diluluskan bagi laman ini.
Sebaliknya, semakan terkini ditunjukkan.',
	'approvedrevs-unapprovesuccess2' => 'Tiada lagi versi yang diluluskan bagi laman ini.
Sebaliknya, laman kosong ditunjukkan.',
	'approvedrevs-approveaction' => 'tetapkan $2 sebagai semakan yang diluluskan untuk "[[$1]]"',
	'approvedrevs-unapproveaction' => 'tarik balik semakan yang diluluskan untuk "[[$1]]"',
	'approvedrevs-notlatest' => 'Inilah semakan yang diluluskan untuk laman ini, tetapi bukan yang terkini.',
	'approvedrevs-approvedandlatest' => 'Inilah semakan yang diluluskan untuk laman ini, dan juga yang terkini.',
	'approvedrevs-blankpageshown' => 'Tiada semakan yang diluluskan untuk laman ini.',
	'approvedrevs-editwarning' => 'Sila ambil perhatian bahawa anda sedang menyunting semakan terkini bagi laman ini yang bukan versi diluluskan yang ditunjukkan secara asali.',
	'approvedrevs' => 'Semakan yang diluluskan',
	'approvedrevs-approvedpages' => 'Semua laman yang mempunyai semakan yang diluluskan',
	'approvedrevs-notlatestpages' => 'Laman yang semakan diluluskannya bukan semakan terkini',
	'approvedrevs-unapprovedpages' => 'Laman yang tidak diluluskan',
	'approvedrevs-view' => 'Lihat:',
	'approvedrevs-revisionnumber' => 'semakan $1',
	'approvedrevs-approvedby' => 'diluluskan oleh $1 pada $2',
	'approvedrevs-difffromlatest' => 'perbezaan daripada semakan terkini',
	'approvedrevs-approvelatest' => 'luluskan semakan terkini',
	'approvedrevs-approvethisrev' => 'Luluskan semakan ini.',
	'approvedrevs-viewlatestrev' => 'Lihat semakan terkini.',
	'right-approverevisions' => 'Memberikan kelulusan kepada semakan dalam laman wiki',
	'right-viewlinktolatest' => 'Melihat teks penjelasan di bahagian atas laman yang mempunyai semakan diluluskan',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'approvedrevs-approve' => 'approva',
	'approvedrevs-unapprove' => 'tapprovax',
	'approvedrevs-approvesuccess' => 'Din ir-reviżjoni tal-paġna ġiet imposta bħala l-waħda approvata.',
	'approvedrevs-unapprovedpages' => 'Paġni mhux approvati',
	'approvedrevs-view' => 'Ara:',
	'approvedrevs-revisionnumber' => 'reviżjoni $1',
);

/** Norwegian Bokmål (norsk (bokmål)‎)
 * @author Nghtwlkr
 */
$messages['nb'] = array(
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
	'approvedrevs-blankpageshown' => 'Ingen revisjon har blitt godkjent for denne siden.',
	'approvedrevs-editwarning' => 'Merk at du nå redigerer den nyeste revisjonen av denne siden, som ikke er den godkjente siden som vises som standard.',
	'approvedrevs' => 'Godkjente revisjoner',
	'approvedrevs-approvedpages' => 'Alle sider med godkjente versjoner',
	'approvedrevs-notlatestpages' => 'Sider der den godkjente revisjonen ikke er deres nyeste.',
	'approvedrevs-unapprovedpages' => 'Ikke-godkjente sider',
	'approvedrevs-view' => 'Vis:',
	'approvedrevs-revisionnumber' => 'revisjon $1',
	'approvedrevs-approvedby' => 'godkjent av $1, $2',
	'approvedrevs-difffromlatest' => 'diff fra siste',
	'approvedrevs-approvelatest' => 'godkjenn siste',
	'approvedrevs-approvethisrev' => 'Godkjenn denne revisjonen.',
	'approvedrevs-viewlatestrev' => 'Vis den nyeste revisjonen.',
	'right-approverevisions' => 'Sett en viss revisjon av en wikiside som godkjent',
	'right-viewlinktolatest' => 'Vis forklarende tekst på toppen av sider som har en godkjent revisjon',
);

/** Dutch (Nederlands)
 * @author SPQRobin
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
	'approvedrevs-blankpageshown' => 'Deze pagina heeft geen goedgekeurde versie.',
	'approvedrevs-editwarning' => 'U bewerkt de meest recente versie van deze pagina die nog niet goedgekeurd is en standaard niet wordt weergegeven.',
	'approvedrevs' => 'Goedgekeurde versies',
	'approvedrevs-approvedpages' => "Alle pagina's met een goedgekeurde versie",
	'approvedrevs-notlatestpages' => "Pagina's waarvan de goedgekeurde versie niet de laatste versie is",
	'approvedrevs-unapprovedpages' => "Niet-goedgekeurde pagina's",
	'approvedrevs-view' => 'Weergave:',
	'approvedrevs-revisionnumber' => 'versie $1',
	'approvedrevs-approvedby' => 'goedgekeurd door $1 op $2',
	'approvedrevs-difffromlatest' => 'verschil met de meest recente versie',
	'approvedrevs-approvelatest' => 'laatste versie goedkeuren',
	'approvedrevs-approvethisrev' => 'Deze versie goedkeuren',
	'approvedrevs-viewlatestrev' => 'Laatste versie bekijken',
	'right-approverevisions' => 'Een versie van een wikipagina markeren als goedgekeurd.',
	'right-viewlinktolatest' => "De verklarende tekst bovenaan pagina's zien die die een goedgekeurde versie hebben",
);

/** Nederlands (informeel)‎ (Nederlands (informeel)‎)
 * @author Siebrand
 */
$messages['nl-informal'] = array(
	'approvedrevs-editwarning' => 'Je bewerkt de meest recente versie van deze pagina die nog niet goedgekeurd is en standaard niet wordt weergegeven.',
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Odisha1
 * @author ଆଶୁତୋଷ କର
 */
$messages['or'] = array(
	'approvedrevs-logname' => 'ସଂଶୋଧନ ଅନୁମୋଦନ ସୂଚୀ',
	'approvedrevs-approve' => 'ଅନୁମୋଦନ',
	'approvedrevs-unapprove' => 'ଅନୁମୋଦନ ହୋଇନଥିବା',
	'approvedrevs' => 'ଅନୁମୋଦିତ ସଂଶୋଧନ ଗୁଡିକ',
	'approvedrevs-approvedpages' => 'ଅନୁମୋଦିତ ସଂଶୋଧନ ଥିବା ପ୍ରୁଷ୍ଠା ଗୁଡିକ',
	'approvedrevs-unapprovedpages' => 'ଅନୁମୋଦନ ହୋଇନଥିବା ପ୍ରୁଷ୍ଠା ଗୁଡିକ',
	'approvedrevs-view' => 'ଦେଖଣା',
	'approvedrevs-revisionnumber' => 'ସଂଶୋଧନ $1',
	'approvedrevs-approvethisrev' => 'ଏହି ସଂଶୋଧନକୁ ଅନୁମୋଦନ କରନ୍ତୁ।',
);

/** Polish (polski)
 * @author BeginaFelicysym
 * @author Sp5uhe
 * @author Woytecr
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
	'approvedrevs-blankpageshown' => 'Żadna wersja tej strony nie została zatwierdzona.',
	'approvedrevs-editwarning' => 'Zauważ, że edytujesz ostatnią wersję strony. Wersję, która nie została zatwierdzona i nie jest pokazywana domyślnie.',
	'approvedrevs' => 'Zatwierdzone wersje',
	'approvedrevs-approvedpages' => 'Wszystkie strony z zatwierdzoną wersją',
	'approvedrevs-notlatestpages' => 'Strony, których zatwierdzona wersja nie jest ich ostatnią',
	'approvedrevs-unapprovedpages' => 'Niezatwierdzone strony',
	'approvedrevs-view' => 'Widok',
	'approvedrevs-revisionnumber' => 'wersja $1',
	'approvedrevs-approvedby' => 'zatwierdzone $2 przez $1',
	'approvedrevs-difffromlatest' => 'porównaj z najnowszą',
	'approvedrevs-approvelatest' => 'zatwierdź ostatnią',
	'approvedrevs-approvethisrev' => 'Zatwierdź te zmiany.',
	'approvedrevs-viewlatestrev' => 'Zobacz najnowszą wersję.',
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
	'approvedrevs-blankpageshown' => 'Gnun-e revision a son ëstàite aprovà për sta pàgina.',
	'approvedrevs-editwarning' => "Për piasì, ch'a nòta ch'a l'é an camin ch'a modìfica l'ùltima revision ëd la pàgina, ch'a l'é pa cola aprovà smonùa për stàndard.",
	'approvedrevs' => 'Revision aprovà',
	'approvedrevs-approvedpages' => 'Tute le pàgine con na revision aprovà',
	'approvedrevs-notlatestpages' => "Pàgine dont la revision aprovà a l'é pa l'ùltima",
	'approvedrevs-unapprovedpages' => 'Pàgine pa aprovà',
	'approvedrevs-view' => 'Vardé:',
	'approvedrevs-revisionnumber' => 'revision $1',
	'approvedrevs-approvedby' => 'aprovà da $1 su $2',
	'approvedrevs-difffromlatest' => "diferense da l'ùltima",
	'approvedrevs-approvelatest' => "aprové l'ùltima",
	'approvedrevs-approvethisrev' => 'Aprové sta revision.',
	'approvedrevs-viewlatestrev' => "Vardé l'ùltima revision.",
	'right-approverevisions' => 'Ampòsta na certa revision ëd na pàgina wiki com aprovà',
	'right-viewlinktolatest' => "Vëdde ël test dë spiegassion an cò dle pàgine ch'a l'han na revision aprovà",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'approvedrevs-view' => 'کتل:',
);

/** Portuguese (português)
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
	'approvedrevs-unapproveaction' => 'desfazer a aprovação da revisão aprovada de "[[$1]]"',
	'approvedrevs-notlatest' => 'Esta é a revisão aprovada desta página; não é a revisão mais recente.',
	'approvedrevs-approvedandlatest' => 'Esta é a revisão aprovada desta página e também a revisão mais recente.',
	'approvedrevs-blankpageshown' => 'Esta página não tem nenhuma revisão aprovada.',
	'approvedrevs-editwarning' => 'Note, por favor, que está agora a editar a revisão mais recente desta página e não a versão aprovada que é mostrada por omissão.',
	'approvedrevs' => 'Revisões aprovadas',
	'approvedrevs-approvedpages' => 'Todas as páginas com uma revisão aprovada',
	'approvedrevs-notlatestpages' => 'Páginas cuja revisão aprovada não é a revisão mais recente',
	'approvedrevs-unapprovedpages' => 'Páginas reprovadas',
	'approvedrevs-view' => 'Ver:',
	'approvedrevs-revisionnumber' => 'revisão $1',
	'approvedrevs-approvedby' => 'aprovada por $1 a $2',
	'approvedrevs-difffromlatest' => 'diferenças para a revisão mais recente',
	'approvedrevs-approvelatest' => 'aprovar a mais recente',
	'approvedrevs-approvethisrev' => 'Aprovar esta revisão.',
	'approvedrevs-viewlatestrev' => 'Ver a revisão mais recente.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que tenham uma revisão aprovada',
);

/** Brazilian Portuguese (português do Brasil)
 * @author Giro720
 * @author Pedroca cerebral
 * @author TheGabrielZaum
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
	'approvedrevs-blankpageshown' => 'Esta página não tem nenhuma revisão aprovada.',
	'approvedrevs-editwarning' => 'Note, por favor, que agora você está editando a revisão mais recente desta página e não a versão aprovada que é mostrada por padrão.',
	'approvedrevs' => 'Revisões aprovadas',
	'approvedrevs-approvedpages' => 'Todas as páginas com uma revisão aprovada',
	'approvedrevs-notlatestpages' => 'Páginas cuja revisão aprovada não é a revisão mais recente',
	'approvedrevs-unapprovedpages' => 'Páginas não aprovadas',
	'approvedrevs-view' => 'Ver:',
	'approvedrevs-revisionnumber' => 'revisão $1',
	'approvedrevs-approvedby' => 'aprovada por $1 em $2',
	'approvedrevs-difffromlatest' => 'diff da última versão',
	'approvedrevs-approvelatest' => 'aprovar a mais recente',
	'approvedrevs-approvethisrev' => 'Aprovar esta revisão.',
	'approvedrevs-viewlatestrev' => 'Ver a revisão mais recente.',
	'right-approverevisions' => 'Definir como aprovada uma revisão específica de uma página da wiki',
	'right-viewlinktolatest' => 'Ver um texto explicativo no topo das páginas que têm uma revisão aprovada',
);

/** Romanian (română)
 * @author Firilacroco
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'approvedrevs-desc' => 'Setează o singură versiune a unei pagini ca aprobată',
	'approvedrevs-logname' => 'Jurnal aprobare versiuni',
	'approvedrevs-logdesc' => 'Acesta este jurnalul versiunilor care au fost aprobate.',
	'approvedrevs-approve' => 'aprobă',
	'approvedrevs-unapprove' => 'dezaprobă',
	'approvedrevs-approvesuccess' => 'Această versiune a paginii a fost marcată ca versiunea aprobată.',
	'approvedrevs-blankpageshown' => 'Nicio versiune nu a fost aprobată pentru această pagină.',
	'approvedrevs' => 'Modificări aprobate',
	'approvedrevs-approvedpages' => 'Toate paginile cu o revizuire aprobată',
	'approvedrevs-unapprovedpages' => 'Pagini neaprobate',
	'approvedrevs-view' => 'Vedeți:',
	'approvedrevs-revisionnumber' => 'versiunea $1',
	'approvedrevs-approvedby' => 'aprobat de {{GENDER:$3|$1}} pe $4 la $5',
	'approvedrevs-difffromlatest' => 'diff de la ultima',
	'approvedrevs-approvelatest' => 'aprobare ultima',
	'approvedrevs-approvethisrev' => 'Aprobați această modificare.',
	'approvedrevs-viewlatestrev' => 'Vizualizează versiunea cea mai recentă.',
	'right-approverevisions' => 'Marchează o anumită versiune a unei pagini ca aprobată',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'approvedrevs-logname' => 'Archivije de le approvaziune de le revisiune',
	'approvedrevs-approve' => 'approve',
	'approvedrevs-unapprove' => 'scitte',
	'approvedrevs' => 'Revisiune approvate',
	'approvedrevs-approvedpages' => "Tutte le pàggene cu 'na revisione approvate",
	'approvedrevs-unapprovedpages' => 'Pàggene none approvate',
	'approvedrevs-view' => 'Vide:',
	'approvedrevs-revisionnumber' => 'revisione $1',
	'approvedrevs-approvedby' => "approvate da $1 'u $2",
	'approvedrevs-difffromlatest' => "differenze da l'urteme",
	'approvedrevs-approvelatest' => "approve l'urteme",
	'approvedrevs-approvethisrev' => 'Approve sta revisione.',
	'approvedrevs-viewlatestrev' => 'Vide le revisiune urteme urteme.',
);

/** Russian (русский)
 * @author Kaganer
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
	'approvedrevs-blankpageshown' => 'Для этой страницы нет подтверждённых версий.',
	'approvedrevs-editwarning' => 'Пожалуйста, обратите внимание, сейчас вы редактируете последнюю версию этой страницы, но она не показывается по умолчанию, так как не подтверждена.',
	'approvedrevs' => 'Подтверждённые версии',
	'approvedrevs-approvedpages' => 'Все страницы, имеющие подтверждённые версии',
	'approvedrevs-notlatestpages' => 'Страницы, чьи подтверждённые версии не являются последними',
	'approvedrevs-unapprovedpages' => 'Неутверждённые страницы',
	'approvedrevs-view' => 'Просмотр:',
	'approvedrevs-revisionnumber' => 'версия $1',
	'approvedrevs-approvedby' => 'подтверждена $1 $2',
	'approvedrevs-difffromlatest' => 'разн. с последней',
	'approvedrevs-approvelatest' => 'подтвердить последнюю',
	'approvedrevs-approvethisrev' => 'Подтвердить эту версию.',
	'approvedrevs-viewlatestrev' => 'Просмотр последней версии.',
	'right-approverevisions' => 'отметка определённых версий вики-страниц как подтверждённых',
	'right-viewlinktolatest' => 'просмотр пояснительного текста в верхней части страниц, имеющих утверждённые версии',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'approvedrevs-desc' => 'අනුමත කර ඇති ලෙස පිටුවක තනි සංශෝධනයක් සකසන්න',
	'approvedrevs-logname' => 'සංශෝධන අනුමැති ලොගය',
	'approvedrevs-logdesc' => 'මෙය අනුමත කර ඇති ලඝු සංශෝධනයන් වේ.',
	'approvedrevs-approve' => 'අනුමත කරන්න',
	'approvedrevs-unapprove' => 'නොපිළිගන්න',
	'approvedrevs-approvesuccess' => 'පිටුවේ මෙම සංශෝධනය අනුමත කරන ලද අනුවාදය ලෙස සකසා ඇත.',
	'approvedrevs-approveaction' => '"[[$1]]" සඳහා අනුමත සංශෝධනය ලෙස $2 සකසන්න',
	'approvedrevs-unapproveaction' => '"[[$1]]" සඳහා අනුමත කරන ලද සංශෝධනය සැකසුමෙන් ඉවත් කරන්න',
	'approvedrevs-notlatest' => 'මෙය මෙම පිටුවේ අනුමත කරන ලද සංශෝධනයයි, මෑතම එකක් නොවේ.',
	'approvedrevs-approvedandlatest' => 'මෙය මෙම පිටුවේ අනුමත කරන ලද සංශෝධනයයි, මෑතම එකක් ද වේ.',
	'approvedrevs-blankpageshown' => 'මෙම පිටුව සඳහා කිසිදු සංශෝධනයක් අනුමත කර නොමැත.',
	'approvedrevs' => 'අනුමත කල සංශෝධන',
	'approvedrevs-approvedpages' => 'අනුමත කල සංශෝධනයක් සහිත සියලුම පිටු',
	'approvedrevs-notlatestpages' => 'ඒවායේ නවතමය නොවන අනුමත කරන ලද සංශෝධන පිටු',
	'approvedrevs-unapprovedpages' => 'අනුමත නොකෙරූ පිටු',
	'approvedrevs-view' => 'නරඹන්න:',
	'approvedrevs-revisionnumber' => '$1 සංශෝධනය',
	'approvedrevs-approvedby' => '$4 හී $5 දී {{GENDER:$3|$1}} විසින් අනුමත කරන ලදී',
	'approvedrevs-difffromlatest' => 'නවතමයෙන් වෙනස',
	'approvedrevs-approvelatest' => 'නවතමය අනුමත කරන්න',
	'approvedrevs-approvethisrev' => 'මෙම සංශෝධනය අනුමත කරන්න.',
	'approvedrevs-viewlatestrev' => 'ගොඩක් මෑත සංශෝධනය පෙන්වන්න.',
	'right-approverevisions' => 'අනුමත කර ඇති ලෙස විකි පිටුවක කිසියම් සංශෝධනයක් සකසන්න',
);

/** Slovak (slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'approvedrevs-desc' => 'Stanoviť jedinú revíziu stránky ako schválenú',
	'approvedrevs-logname' => 'Záznam schválení revízií',
	'approvedrevs-logdesc' => 'Toto je záznam revízií, ktoré boli schválené.',
	'approvedrevs-approve' => 'schváliť',
	'approvedrevs-unapprove' => 'neschváliť',
	'approvedrevs' => 'Schválené revízie',
	'approvedrevs-unapprovedpages' => 'Neschválené stránky',
	'approvedrevs-view' => 'Zobraziť:',
	'approvedrevs-revisionnumber' => 'revízia $1',
	'approvedrevs-approvedby' => 'schválil $1 $2',
	'approvedrevs-difffromlatest' => 'rozdiel od najnovších',
	'approvedrevs-approvelatest' => 'schváliť najnovšie',
	'approvedrevs-approvethisrev' => 'Schváliť túto revíziu.',
	'approvedrevs-viewlatestrev' => 'Zobraziť najnovšiu revíziu.',
);

/** Slovenian (slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'approvedrevs-desc' => 'Označi eno redakcijo strani kot odobreno',
	'approvedrevs-logname' => 'Dnevnik odobritev redakcij',
	'approvedrevs-logdesc' => 'To je dnevnik redakcij, ki so bile odobrene.',
	'approvedrevs-approve' => 'odobri',
	'approvedrevs-unapprove' => 'zavrni',
	'approvedrevs-approvesuccess' => 'Ta redakcija strani je bila označena kot odobrena različica.',
	'approvedrevs-unapprovesuccess' => 'Ni več odobrene različice te strani.
Namesto tega bo prikazana najnovejša redakcija.',
	'approvedrevs-unapprovesuccess2' => 'Ni več odobrene različice te strani.
Namesto tega bo prikazana prazna stran.',
	'approvedrevs-approveaction' => 'označil(-a) $2 kot odobreno redakcijo »[[$1]]«',
	'approvedrevs-unapproveaction' => 'odznačil(-a) odobreno redakcijo »[[$1]]«',
	'approvedrevs-notlatest' => 'To je odobrena redakcija te strani; ni najnovejša.',
	'approvedrevs-approvedandlatest' => 'To je odobrena redakcija te strani, prav tako tudi najnovejša.',
	'approvedrevs-blankpageshown' => 'Za to stran ni bila odobrena nobena redakcija.',
	'approvedrevs-editwarning' => 'Pomnite, da sedaj urejate najnovejšo redakcijo te strani, ki ni odobrena, po privzetem prikazana.',
	'approvedrevs' => 'Odobrene redakcije',
	'approvedrevs-approvedpages' => 'Vse strani z odobrenimi redakcijami',
	'approvedrevs-notlatestpages' => 'Strani, katerih odobrena redakcija ni njihova najnovejša',
	'approvedrevs-unapprovedpages' => 'Neodobrene strani',
	'approvedrevs-view' => 'Pogled:',
	'approvedrevs-revisionnumber' => 'redakcija $1',
	'approvedrevs-approvedby' => 'odobril(-a) $1 dne $2',
	'approvedrevs-difffromlatest' => 'spremembe od najnovejše',
	'approvedrevs-approvelatest' => 'odobri najnovejšo',
	'approvedrevs-approvethisrev' => 'Odobri to redakcijo.',
	'approvedrevs-viewlatestrev' => 'Ogled najnovejše redakcije.',
	'right-approverevisions' => 'Označevanje določenih redakcij wikistrani kot odobrene',
	'right-viewlinktolatest' => 'Ogled pojasnjevalnega besedila na vrhu strani, ki imajo odobrene redakcije',
);

/** Serbian (Cyrillic script) (српски (ћирилица)‎)
 * @author Rancher
 */
$messages['sr-ec'] = array(
	'approvedrevs' => 'Одобрене измене',
	'approvedrevs-approvedpages' => 'Све странице са одобреном изменом',
	'approvedrevs-notlatestpages' => 'Странице чија одобрена измена није најновија',
	'approvedrevs-unapprovedpages' => 'Неодобрене странице',
	'approvedrevs-view' => 'Преглед:',
	'approvedrevs-revisionnumber' => 'измена $1',
	'approvedrevs-approvedby' => '{{GENDER:$3|одобрио|одобрила|одобрио}} $1 дана $4 у $5',
	'approvedrevs-difffromlatest' => 'разлика од последње',
	'approvedrevs-approvelatest' => 'одобри последњу',
	'approvedrevs-approvethisrev' => 'Одобри ову измену.',
	'approvedrevs-viewlatestrev' => 'Погледајте последњу измену.',
	'right-approverevisions' => 'постављање одређене измене на вики страници као одобрене',
	'right-viewlinktolatest' => 'преглед образложења на врху страница које имају одобрену измену',
);

/** Swedish (svenska)
 * @author Ainali
 * @author Cohan
 * @author Lokal Profil
 * @author Martinwiss
 * @author Tobulos1
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'approvedrevs-desc' => 'Sätt en enskild version av en sida till godkänd',
	'approvedrevs-logname' => 'Godkänningslogg för revisioner',
	'approvedrevs-logdesc' => 'Detta är loggen över revisioner som har godkänts.',
	'approvedrevs-approve' => 'godkänn',
	'approvedrevs-unapprove' => 'godkänn ej',
	'approvedrevs-approvesuccess' => 'Denna version av sidan har ställts in som den godkända versionen.',
	'approvedrevs-unapprovesuccess' => 'Det finns inte längre en godkänd version för den här sidan. 
 Istället kommer den senaste redigeringen att visas.',
	'approvedrevs-unapprovesuccess2' => 'Det finns inte längre en godkänd version av den här sidan. 
Istället kommer en tom sida att visas.',
	'approvedrevs-approveaction' => 'sätt $2 som den godkända revisionen av "[[$1]]"',
	'approvedrevs-unapproveaction' => 'ångra godkänd revision för  "[[$1]]"',
	'approvedrevs-notlatest' => 'Detta är den godkända version av denna sida; det är inte den senaste.',
	'approvedrevs-approvedandlatest' => 'Detta är den godkända version av denna sida, samt den senaste.',
	'approvedrevs-blankpageshown' => 'Ingen revidering har godkänts för denna sida.',
	'approvedrevs-editwarning' => 'Observera att du nu redigerar den senaste versionen av denna sida, vilket inte är den godkända som visas som standard.',
	'approvedrevs' => 'Godkända revideringar',
	'approvedrevs-approvedpages' => 'Alla sidor med en godkänd revision',
	'approvedrevs-notlatestpages' => 'Sidor vars godkända version inte är den senaste.',
	'approvedrevs-unapprovedpages' => 'Icke godkända sidor',
	'approvedrevs-view' => 'Visa:',
	'approvedrevs-revisionnumber' => 'version $1',
	'approvedrevs-approvedby' => 'godkänd av $1, $2',
	'approvedrevs-difffromlatest' => 'diff från senaste',
	'approvedrevs-approvelatest' => 'godkänn senaste',
	'approvedrevs-approvethisrev' => 'Godkänn denna versionen.',
	'approvedrevs-viewlatestrev' => 'Visa den senaste versionen.',
	'right-approverevisions' => 'Sätt en viss revidering av en wiki-sida som godkänd',
	'right-viewlinktolatest' => 'Se förklarande text högst upp på sidor som har en godkänd revision',
);

/** Swahili (Kiswahili)
 * @author Kwisha
 * @author Stephenwanjau
 */
$messages['sw'] = array(
	'approvedrevs-approve' => 'idhinisha',
	'approvedrevs-view' => 'Tazama:',
	'approvedrevs-revisionnumber' => 'Pitio $1',
	'approvedrevs-approvedby' => 'Imeidhinishwa na {{GENDER:$3|$1}} mnamo $4 saa $5',
	'approvedrevs-approvelatest' => 'idhinisha ya hivi karibuni',
	'approvedrevs-approvethisrev' => 'idhinisha toleo hili',
);

/** Tamil (தமிழ்)
 * @author Karthi.dr
 * @author TRYPPN
 */
$messages['ta'] = array(
	'approvedrevs-approve' => 'அனுமதிக்கவும்',
	'approvedrevs-unapprove' => 'அனுமதிக்க வேண்டாம்',
	'approvedrevs' => 'ஏற்றுக்கொள்ளப்பட்ட திருத்தங்கள்',
	'approvedrevs-approvedpages' => 'ஏற்றுக் கொள்ளப்பட்ட திருத்தங்கள் கொண்ட அனைத்துப் பக்கங்கள்',
	'approvedrevs-unapprovedpages' => 'ஏற்றுக் கொள்ளப்படாத பக்கங்கள்',
	'approvedrevs-view' => 'பார்வையிடு:',
	'approvedrevs-revisionnumber' => 'திருத்தம் $1',
	'right-approverevisions' => 'விக்கி பக்கத்தில் ஒரு சில மாற்றங்களை அனுமதிக்கப்பட்டதாக குறித்துக்கொள்ளவும்',
);

/** Telugu (తెలుగు)
 * @author Chaduvari
 * @author Veeven
 */
$messages['te'] = array(
	'approvedrevs-logname' => 'కూర్పుల అనుమతులు చిట్టా',
	'approvedrevs-logdesc' => 'ఇది ఆమోదం పొందని కూర్పుల లాగ్.',
	'approvedrevs-approve' => 'అనుమతించు',
	'approvedrevs-unapprove' => 'ఆమోదించవద్దు',
	'approvedrevs-approvesuccess' => 'ఈ పేజీ యొక్క ఈ కూర్పు ఆమోదింపబడిన కూర్పుగా సెట్ చేసి ఉంది.',
	'approvedrevs-unapprovesuccess' => 'ఇక ఈ పేజీకి ఆమోదించబడిన కూర్పేదీ లేదు.
దాని బదులు, ఇట్టీవలి కూర్పును చూపిస్తాం.',
	'approvedrevs-unapprovesuccess2' => 'ఇక ఈ పేజీకి ఆమోదించబడిన కూర్పేదీ లేదు.
దాని బదులు, ఖాళీ పేజీని చూపిస్తాం.',
	'approvedrevs-approveaction' => '"[[$1]]" కోసం $2  ను ఆమోదించబడిన కూర్పుగా చూపించు',
	'approvedrevs-unapproveaction' => '"[[$1]]" కోసం సెట్ చేసిన ఆమోదించబడిన కూర్పును తీసెయ్యి',
	'approvedrevs-notlatest' => 'ఇది ఈ పేజీ యొక్క ఆమోదించబడిన కూర్పు; ఇది అన్నిటి కంటే కొత్త కూర్పు కాదు.',
	'approvedrevs-approvedandlatest' => 'ఇది ఈ పేజీ యొక్క ఆమోదించబడిన కూర్పు, అన్నిటి కంటే కొత్త కూర్పు కూడా.',
	'approvedrevs-blankpageshown' => 'ఈ పేజీ కూర్పుల్లో ఏది కూడా ఆమోదించబడి లేదు.',
	'approvedrevs-editwarning' => 'మీరు మారుస్తున్నది ఈ పేజీ యొక్క ఇట్టీవలి కూర్పునని గమనించండి. డిఫాల్టుగా ఆమోదించబడినట్లు చూపించినది ఈ కూర్పు కాదు.',
	'approvedrevs' => 'ఆమోదించబడిన కూర్పులు',
	'approvedrevs-approvedpages' => 'అనుమతించిన పుటలు', # Fuzzy
	'approvedrevs-notlatestpages' => 'పేజీలు - ఆమోదించబడిన కూర్పులు ఇట్టీవలివి కానివి',
	'approvedrevs-unapprovedpages' => 'ఆమోదించబడని పేజీలు',
	'approvedrevs-revisionnumber' => 'కూర్పు $1',
	'approvedrevs-approvedby' => '$2 న, $1 ఆమోదించినది',
	'approvedrevs-difffromlatest' => 'ఇట్టీవలి కూర్పుతో తేడాలు',
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
	'approvedrevs-blankpageshown' => 'Wala pang rebisyong pinayagan para sa pahinang ito.',
	'approvedrevs-editwarning' => 'Pakitandaan na binabago mo na sa ngayon ang pinakahuling rebisyon ng pahinang ito, na hindi ang pinayagang likas na nakatakda.',
	'approvedrevs' => 'Pinayagang mga rebisyon',
	'approvedrevs-approvedpages' => 'Lahat ng mga pahinang may pinayagang rebisyon',
	'approvedrevs-notlatestpages' => 'Mga pahinang ang pinayagang rebisyon ay hindi ang kanilang pinaka kamakailan',
	'approvedrevs-unapprovedpages' => 'Hindi pinayagang mga pahina',
	'approvedrevs-view' => 'Tingnan:',
	'approvedrevs-revisionnumber' => 'rebisyong $1',
	'approvedrevs-approvedby' => 'pinayagan ni $1 noong $2',
	'approvedrevs-difffromlatest' => 'pagkakaiba mula sa pinakakamakailan',
	'approvedrevs-approvelatest' => 'payagan ang pinaka kamakailan',
	'approvedrevs-approvethisrev' => 'Payagan ang rebisyong ito.',
	'approvedrevs-viewlatestrev' => 'Tingnan ang pinaka kamakailang rebisyon.',
	'right-approverevisions' => 'Itakda ang isang partikular na rebisyon ng isang pahina ng wiki bilang pinayagan',
	'right-viewlinktolatest' => 'Tingnan ang teksto ng paliwanag na nasa itaas ng mga pahina na may pinayagang rebisyon',
);

/** Turkish (Türkçe)
 * @author Emperyan
 * @author Incelemeelemani
 * @author Khutuck
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
	'approvedrevs-unapprovesuccess2' => 'Bu sayfanın artık onaylanmış sürümü yok.
Onun yerine, boş bir sayfa gösterilecektir.',
	'approvedrevs-approveaction' => '$2 revizyonunu "[[$1]]" sayfasının onaylanmış revizyonu olarak ayarladı',
	'approvedrevs-unapproveaction' => '"[[$1]]" sayfasının onaylanmış revizyonunun onayını kaldırdı.',
	'approvedrevs-notlatest' => 'Bu sayfanın onaylanmış revizyonudur; en son revizyon değildir.',
	'approvedrevs-approvedandlatest' => 'Bu revizyon, sayfanın hem onaylanmış hem de en son revizyonudur.',
	'approvedrevs-blankpageshown' => 'Bu sayfa için onaylanmış sürüm yok.',
	'approvedrevs-editwarning' => 'Lütfen dikkat: Şu an onaylanmış sürümü değil, son sürümü değitirmektesiniz.',
	'approvedrevs' => 'Onaylanan düzeltmeler',
	'approvedrevs-approvedpages' => 'Onaylanmış revizyon olan bütün sayfalar',
	'approvedrevs-notlatestpages' => 'Bu sayfanın onaylanmış revizyonudur; en son revizyon değildir.',
	'approvedrevs-unapprovedpages' => 'Onaylanmamış sayfalar',
	'approvedrevs-view' => 'Görüntüle:',
	'approvedrevs-revisionnumber' => 'Revizyon: $1',
	'approvedrevs-approvedby' => "$1 tarafından $2'de onaylandı.",
	'approvedrevs-difffromlatest' => 'öncekiyle fark',
	'approvedrevs-approvelatest' => 'en günceli onayla',
	'approvedrevs-approvethisrev' => 'Bu sürümü onayla.',
	'approvedrevs-viewlatestrev' => 'En son sürümü görüntüleyin.',
	'right-approverevisions' => 'Bir viki sayfasının belirli bir revizyonunu onaylanmış olarak ayarla',
	'right-viewlinktolatest' => 'Onaylanmış revizyonu bulunan sayfaların başındaki açıklayıcı metni görüntüle',
);

/** Uyghur (Arabic script) (ئۇيغۇرچە)
 * @author Arlin
 */
$messages['ug-arab'] = array(
	'approvedrevs-approve' => 'تەستىق',
	'approvedrevs-unapprove' => 'تەستىقلىما',
	'approvedrevs' => 'تەستىقلىغان ئۆزگەرتىش',
	'approvedrevs-unapprovedpages' => 'تەستىقلىمىغان بەتلەر',
	'approvedrevs-view' => 'كۆرۈنۈش:',
	'approvedrevs-revisionnumber' => 'تۈزىتىلگەن نەشرى $1',
	'approvedrevs-approvedby' => '{{GENDER:$3|$1}} $4 $5 ماقۇللىدى',
	'approvedrevs-difffromlatest' => 'يېڭىسى بىلەن پەرقى',
	'approvedrevs-approvelatest' => 'ئەڭ يېڭىنى تەستىقلاش',
	'approvedrevs-approvethisrev' => 'بۇ ئۆزگەرتىشنى ماقۇللاش',
	'approvedrevs-viewlatestrev' => 'ئەڭ يېقىنقى ئۆزگەرتىشنى كۆرۈش.',
);

/** Ukrainian (українська)
 * @author Alex Khimich
 * @author Olvin
 * @author Sodmy
 * @author Vox
 * @author Тест
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
	'approvedrevs-approveaction' => 'встановити $2 як затверджену версію для «[[$1]]»',
	'approvedrevs-unapproveaction' => 'відкликати стверджену версію для "[[$1]]"',
	'approvedrevs-notlatest' => 'Це затверджена версія цієї сторінки; вона не є останньою.',
	'approvedrevs-approvedandlatest' => 'Це затверджений перегляд цієї сторінки, вын э найновішим.',
	'approvedrevs-blankpageshown' => 'Не було знайдено схвалювальних переглядів для цієї сторінки.',
	'approvedrevs-editwarning' => 'Зверніть увагу, що в даний час ви редагуєте найновіший перегляд цієї сторінки, який не є схваленим і відображатися за замовчуванням.',
	'approvedrevs' => 'Затверджені версії',
	'approvedrevs-approvedpages' => 'Усі сторінки, що мають затверджені версії.',
	'approvedrevs-notlatestpages' => 'Сторінки, чиї затверджені версії не є останніми',
	'approvedrevs-unapprovedpages' => 'Несхвалені сторінки',
	'approvedrevs-view' => 'Перегляд:',
	'approvedrevs-revisionnumber' => 'версія $1',
	'approvedrevs-approvedby' => 'затверджена $1 $2',
	'approvedrevs-difffromlatest' => 'різниця з останньою',
	'approvedrevs-approvelatest' => 'затвердити останній',
	'approvedrevs-approvethisrev' => 'Затвердити цю версію.',
	'approvedrevs-viewlatestrev' => 'Перегляд останньої версії.',
	'right-approverevisions' => 'Встановити єдиний перегляд сторінки як затверджуючий',
	'right-viewlinktolatest' => 'Переглянути пояснювальний текст у верхній частині сторінки яка має схвалену версію.',
);

/** Urdu (اردو)
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'approvedrevs-approve' => 'منظور',
	'approvedrevs-view' => 'دیکھیں:',
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
	'approvedrevs' => 'Phiên bản được chấp nhận',
	'approvedrevs-approvedpages' => 'Các trang có phiên bản đã chấp nhận',
	'approvedrevs-unapprovedpages' => 'Trang chưa được chấp nhận',
	'approvedrevs-view' => 'Xem:',
	'approvedrevs-revisionnumber' => 'phiên bản $1',
	'approvedrevs-approvedby' => 'được $1 chấp nhận vào $2',
	'approvedrevs-difffromlatest' => 'so với phiên bản hiện tại',
	'approvedrevs-approvelatest' => 'chấp nhận mới nhất',
	'approvedrevs-approvethisrev' => 'Chấp nhận phiên bản này.',
	'approvedrevs-viewlatestrev' => 'Xem phiên bản gần đây nhất.',
	'right-approverevisions' => 'Đặt một phiên bản của trang wiki là phiên bản chấp nhận',
	'right-viewlinktolatest' => 'Xem văn bản giải thích ở đầu các trang có phiên bản chấp nhận',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Hydra
 * @author Liangent
 * @author PhiLiP
 * @author Xiaomingyan
 */
$messages['zh-hans'] = array(
	'approvedrevs-desc' => '设置单个页所批准的修订',
	'approvedrevs-logname' => '修订批准日志',
	'approvedrevs-logdesc' => '这是已获批准的修订的日志。',
	'approvedrevs-approve' => '批准',
	'approvedrevs-unapprove' => '不批准',
	'approvedrevs-approvesuccess' => '此版本的页面已被设为批准的版本。',
	'approvedrevs-unapprovesuccess' => '此页不再有一个批准的版本。
相反，将显示最新的修订版。',
	'approvedrevs-unapprovesuccess2' => '此页不再是一个批准的版本。
相反，将显示一个空白页。',
	'approvedrevs-approveaction' => '将把 $2 作为"[[$1]]"批准修订',
	'approvedrevs-unapproveaction' => '取消"[[$1]]"的设置批准的修订',
	'approvedrevs-notlatest' => '这是此页 批准的修订； 它不是最新的。',
	'approvedrevs-approvedandlatest' => '这是此页批准，以及是最近的修订。',
	'approvedrevs-blankpageshown' => '没有修订已获批准的此页。',
	'approvedrevs-editwarning' => '请注意现在正在编辑的此页，不是核准的最新版本默认情况下显示的其中一个。',
	'approvedrevs' => '获批准的修订',
	'approvedrevs-approvedpages' => '所有有被批准的版本的页面',
	'approvedrevs-notlatestpages' => '其核准的修订不是他们最新的页面',
	'approvedrevs-unapprovedpages' => '不备批准的页面',
	'approvedrevs-view' => '查看:',
	'approvedrevs-revisionnumber' => '版本$1',
	'approvedrevs-approvedby' => '在 $2 时被 $1 批准',
	'approvedrevs-difffromlatest' => '最新的比较',
	'approvedrevs-approvelatest' => '最新批准',
	'approvedrevs-approvethisrev' => '批准这项修订',
	'approvedrevs-viewlatestrev' => '查看最新版本',
	'right-approverevisions' => '通过wiki页面的单个修订',
	'right-viewlinktolatest' => '视图中的解释性文本在具有一个已批准的修订页面的顶部',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Justincheng12345
 * @author Oapbtommy
 */
$messages['zh-hant'] = array(
	'approvedrevs-desc' => '設置單個頁所批准的修訂',
	'approvedrevs-logname' => '修訂批准日誌',
	'approvedrevs-logdesc' => '這是已獲批准的修訂的日誌。',
	'approvedrevs-approve' => '批准',
	'approvedrevs-unapprove' => '不批准',
	'approvedrevs-approvesuccess' => '此版本的頁面已被設為批准的版本。',
	'approvedrevs-unapprovesuccess' => '此頁不再有一個批准的版本。
相反，將顯示最新的修訂版。',
	'approvedrevs-unapprovesuccess2' => '此頁不再是一個批准的版本。
相反，將顯示一個空白頁。',
	'approvedrevs-approveaction' => '將把 $2 作為"[[$1]]"批准修訂',
	'approvedrevs-unapproveaction' => '取消"[[$1]]"的設置批准的修訂',
	'approvedrevs-notlatest' => '這是此頁 批准的修訂； 它不是最新的。',
	'approvedrevs-approvedandlatest' => '這是此頁批准，以及是最近的修訂。',
	'approvedrevs-blankpageshown' => '沒有修訂已獲批准的此頁。',
	'approvedrevs-editwarning' => '請注意現在正在編輯的此頁，不是核准的最新版本默認情況下顯示的其中一個。',
	'approvedrevs' => '獲批准的修訂',
	'approvedrevs-approvedpages' => '所以含已批准版本的頁面',
	'approvedrevs-notlatestpages' => '其核准的修訂不是他們最新的頁面',
	'approvedrevs-unapprovedpages' => '不備批准的頁面',
	'approvedrevs-view' => '檢視：',
	'approvedrevs-revisionnumber' => '版本$1',
	'approvedrevs-approvedby' => '在 $2 時被 $1 批准',
	'approvedrevs-difffromlatest' => '最新的比較',
	'approvedrevs-approvelatest' => '最新批准',
	'approvedrevs-approvethisrev' => '批准這項修訂',
	'approvedrevs-viewlatestrev' => '查看最新版本',
	'right-approverevisions' => '通過wiki頁面的單個修訂',
	'right-viewlinktolatest' => '視圖中的解釋性文本在具有一個已批准的修訂頁面的頂部',
);

/** Chinese (Hong Kong) (‪中文(香港)‬)
 * @author Oapbtommy
 */
$messages['zh-hk'] = array(
	'approvedrevs-view' => '檢視：',
);
