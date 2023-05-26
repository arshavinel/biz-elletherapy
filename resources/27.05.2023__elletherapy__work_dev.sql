-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2023 at 12:10 AM
-- Server version: 10.6.12-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r109351arsh_customer__elletherapy__work_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `et_account_admin_logs`
--

CREATE TABLE `et_account_admin_logs` (
  `id_log` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `logged_in_at` int(11) NOT NULL,
  `from_cookie` tinyint(1) NOT NULL DEFAULT 0,
  `last_activity_at` int(11) DEFAULT NULL,
  `logged_out_at` int(11) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `os` varchar(200) DEFAULT NULL,
  `touch` tinyint(1) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `tablet` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `et_account_admin_logs`
--

INSERT INTO `et_account_admin_logs` (`id_log`, `id_profile`, `logged_in_at`, `from_cookie`, `last_activity_at`, `logged_out_at`, `browser`, `os`, `touch`, `mobile`, `tablet`) VALUES
(2, 1, 1684699591, 0, 1684699929, 1684699947, NULL, NULL, NULL, NULL, NULL),
(3, 1, 1684699975, 0, 1684702760, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 1684704612, 0, 1684705133, 1684705135, NULL, NULL, NULL, NULL, NULL),
(5, 1, 1684705142, 0, 1684705142, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 1684705172, 0, 1684705741, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 1684709880, 0, 1684710138, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 1684744335, 1, 1684744690, 1684744695, NULL, NULL, NULL, NULL, NULL),
(9, 1, 1684744770, 0, 1684745090, 1684745106, NULL, NULL, NULL, NULL, NULL),
(10, 1, 1684745114, 0, 1684745837, 1684747073, NULL, NULL, NULL, NULL, NULL),
(11, 1, 1684747075, 0, 1684748953, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 1684780361, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 1684783219, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 1684792362, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 1685130415, 0, 1685130415, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 1685133727, 1, 1685135328, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_account_admin_profiles`
--

CREATE TABLE `et_account_admin_profiles` (
  `id_profile` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_account_admin_profiles`
--

INSERT INTO `et_account_admin_profiles` (`id_profile`, `id_role`, `name`, `email`, `password`, `inserted_at`, `updated_at`) VALUES
(1, 1, 'Arshavin', 'arshavin@arshguide.ro', '$2y$10$U7SWCGUlmBemf51TR0gcSuWz8JourK7Ks7QYk.ezxrzWKL6FQJ4Fi', 1602709200, 1602867208),
(2, 2, 'Melena', 'contact@melena.ro', '$2y$10$EK5WhdzvYvzIGWpbuC0w7O5kjNu1mIOusYIs5Khb5xGMYpgfsV0ES', 1593032400, 1627394928);

-- --------------------------------------------------------

--
-- Table structure for table `et_account_admin_roles`
--

CREATE TABLE `et_account_admin_roles` (
  `id_role` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_account_admin_roles`
--

INSERT INTO `et_account_admin_roles` (`id_role`, `title`) VALUES
(1, 'Administrator'),
(2, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `et_articles`
--

CREATE TABLE `et_articles` (
  `id_article` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 0,
  `title_ro` varchar(200) NOT NULL,
  `description_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `seo_title_ro` varchar(200) NOT NULL,
  `seo_description_ro` text NOT NULL,
  `seo_keywords_ro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_articles`
--

INSERT INTO `et_articles` (`id_article`, `id_category`, `visible`, `title_ro`, `description_ro`, `inserted_at`, `updated_at`, `seo_title_ro`, `seo_description_ro`, `seo_keywords_ro`) VALUES
(1, 4, 1, 'Despre lene', '<!-- wp:paragraph -->\n<p>M-am g&acirc;ndit să abordez acest subiect despre care toată lumea știe la nivel de teorie c&acirc;t este de nociv și cum combaterea lui va duce la rezultate excepționale. Bla, bla, bla, da, așa este &icirc;nsă hai să spunem lucrurilor pe nume și să căutăm o soluție, c&acirc;t de c&acirc;t credibilă, vreți?<br /><br />De ce ne este lene?<br /><br />Părerea mea este următoarea: nu ne dorim suficient de mult acel obiectiv sau nu suntem aliniați cu obiectivul. De aici rezultă planificarea proastă a timpului, evenimente care apar peste zi și ne dau peste cap programul, lipsa de resurse financiare și multe alte motive pentru care lenea este fruntaș ; dar să nu uităm, niciodată nu recunoaștem că suntem leneși .<br /><br />Să presupunem că am identificat &sbquo;&rsquo;&rsquo;inamicul&rsquo;&rsquo;, ce facem? Cum devenim din leneși , persoane care &icirc;ntreprind acțiuni spre apropierea obiectivului?<br /><br />M-am g&acirc;ndit la următoarele variante :<br /><br />A. &Icirc;nchide telefonul ca și provocare și scrie pe o foaie ce plan de acțiune &icirc;ți propui zilnic ca tu să fii mai aproape de obiectivul tău; chiar dacă mintea iți vine cu argumente precum c&acirc;t ești de nerealist/ă, tu continuă să scrii ca și cum ai certitudinea că deja ai obținut acel lucru.<br /><br />B. Propune-ți o oră zilnic, o oră de focus personală, preferabil ar fi să iți pui și alarma să sune &icirc;n primele dăți, timp &icirc;n care tu cauți informații despre obiectivul tău, le scrii pe o agendă și recitești planul de acțiune. Daca &icirc;ntr-o zi oprești alarma și &icirc;ți găsești altă activitate mai &rsquo;&rsquo; importantă&rsquo;&rsquo;, &icirc;ți reprogramezi ora &icirc;n aceeași zi, cu aceeași metodă, eventual iți iei un prieten solidar care să te ajute cu un apel tip &rsquo;&rsquo; memento&rsquo;&rsquo; pentru ca tu să fii sigur/ă că nu trece ziua fără ora ta de focus.<br /><br />C. Poți să &icirc;ți iei un coach, dacă obiectivele tale sunt mari, zilele sunt solicitante și crezi ca ai nevoie de mai multa susținere , mai ales din partea unei persoane obiective , coaching-ul e varianta pe repede &icirc;nainte.</p>\n<!-- /wp:paragraph --><!-- wp:paragraph -->\n<p>Disciplina este cheia. &Icirc;n tine stă capacitatea să schimbi orice. Cu toții am avut cel puțin o dată stări de lene, și cu siguranță acum avem instrumentele necesare să ne ajutăm, informația este gratuită, multă, diversificată și la &icirc;ndem&acirc;na oricui &icirc;n aceste timpuri.</p>\n<!-- /wp:paragraph --><!-- wp:paragraph -->\n<p>Te &icirc;mbrățișez mai mult de 9 secunde.<br />Voi scrie &icirc;n altă postare de ce.<br /><br />Cu drag,<br />Aura M.</p>\n<!-- /wp:paragraph -->', 1603314000, 1604398480, 'M-am gândit să abordez acest subiect despre care toată lumea știe la nivel de teorie cât este de nociv și cum combaterea lui va duce la rezultate excepționale. Bla, bla, bla, da, așa este însă hai să ', 'M-am gândit să abordez acest subiect despre care toată lumea știe la nivel de teorie cât este de nociv și cum combaterea lui va duce la rezultate excepționale. Bla, bla, bla, da, așa este însă hai să spunem lucrurilor pe nume și să căutăm o soluție, cât de cât credibilă, vreți?\n', 'M-am gândit să abordez acest subiect despre care toată lumea știe la nivel de teorie cât este de nociv și cum combaterea lui va duce la rezultate excepționale. Bla, bla, bla, da, așa este însă hai să spunem lucrurilor pe nume și să căutăm o soluție, cât de cât credibilă, vreți?\n'),
(2, 2, 1, 'Panica este mai periculoasă decât orice virus', '<span style=\"font-weight: 400;\"><span style=\"font-weight: 400;\"><span style=\"font-size: 18pt;\">PANICA distruge &icirc;naintea inamicului invizibil</span><br /><br /></span></span>\n<p><span style=\"font-weight: 400;\">M-am tot g&acirc;ndit dacă să scriu ceva despre situația curentă sau să mă izolez din mediul online, &icirc;ntruc&acirc;t observ cum orice ai scrie, se trezesc două tabere să judece: cei care apără agitația, alerta și repetă non stop pe paginile de socializare cum să fugim, ascundem, pl&acirc;ngem ș.a.m.d. și ceilalți care ignoră orice regulă decentă ce trebuie respectată astfel &icirc;nc&acirc;t să trecem cu un vibe de recunoștiință peste acest eveniment universal.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Cele 2 tabere aruncă săgeți una &icirc;n alta, iar oamenii autentici observă și se minunează de tot ce e &icirc;n jur. Așadar haos total, &icirc;nsă prefer să nu judec ci să eman inclusiv prin scris și să &icirc;mi las amprenta energetică cu informații ALTFEL dec&acirc;t ce se mai regăsesc prin postările tuturor ,,luptătorilor&rsquo;&rsquo;.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Ce se &icirc;nt&acirc;mplă &icirc;n corpul celor din tabară PANICĂ este egal cu ceea ce li se &icirc;nt&acirc;mplă din tabăra IGNORANȚĂ, mai exact:</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Corpul nostru are nevoie să fie &icirc;n starea de homeostazie. Este o stare ce ne oferă siguranță, relaxare, integrare și acceptare &icirc;n mediul nostru actual.</span></p>\n<p><span style=\"font-weight: 400;\">&Icirc;n această stare, toate sistemele corpului lucrează armonios, nu se risipește energie, sistemul nervos este direct influențat și se poate manifesta o stare numită coerență. Coerența este str&acirc;ns legată de emoțiile pozitive puternice precum iubire, recunoștiință, pace, etc. Această stare &icirc;n corp se poate obține doar c&acirc;nd legăturile neuronale dintre creier și inimă funcționează optim, mai clar, cu c&acirc;t trăim stările superioare din inimă, se duce semnalul către creier, devenim creativi, raționali, concentrați, deschiși, calmi și sistemul nervos autonom &icirc;și modifică structura imediat &icirc;n acest program de coerență. Aceasta este starea naturală care ne protejează de orice virus și de orice din exterior.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Opusul acestei stări este incoerența. Aceasta este starea din care privim evenimentele din prisma supraviețuirii, ca un animal, primitiv, nimic bun nu are loc &icirc;n corp, ba chiar distructiv. Hormonii stresului se secretă &icirc;n corp pe baza tulburărilor din mediul extern, iar atunci se activează sistemul nervos simpatic. Acele emoții de nesiguranță, frică, nerăbdare, frustare, fac corpul să se lupte și &icirc;n această luptă, corpul dezvoltă multe alte simptome legate de stres. Zilnic cu această stare, corpul dezvoltă un stres cronic care se alimentează de acolo, noi avem &icirc;n jurul nostru un c&acirc;mp energetic invizibil (nu suntem doar corpuri fizice), astfel ne scurge de forța vitală și adio refacere, regenerare. Corpul devine dependent de hormonii de stres și costurile care credeți că sunt? Catastrofale, at&acirc;t pot să zic.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Dacă sistemul nostru imunitar este direct afectat de ceea ce vorbim, facem, acționăm, g&acirc;ndim, CREDEȚI CĂ AJUTĂ DOAR SĂ DEZINFECTĂM chestii?</span></p>\n<p><strong>Dezinfectarea este doar o parte din procesul de apărare, ACEA apărare din și cu IUBIRE.</strong></p>\n<p><span style=\"font-weight: 400;\"> </span></p>\n<p><span style=\"font-weight: 400;\">Un om care vrea să răm&acirc;nă sănătos și după trecerea evenimentului alarmant, are nevoie de schimbare și ordine &icirc;n viață, g&acirc;ndire, &icirc;ncep&acirc;nd cu ACUM.</span></p>\n<p><span style=\"font-weight: 400;\">Păm&acirc;ntul a fost sufocat cu at&acirc;tea reziduri, &icirc;n special emoționale, iar acum are nevoie să se curețe ca să poată să ne susțină mai departe.</span></p>\n<span style=\"font-weight: 400;\"><span style=\"font-weight: 400;\"><br /></span></span>\n<p><span style=\"font-weight: 400;\">Ce poți să faci pentru a fi IUBIRE din acest moment:</span></p>\n<p><span style=\"font-weight: 400;\">- respectă toate regulile de igienă recomandate și &icirc;nvață copilul să facă același lucru.</span></p>\n<p><span style=\"font-weight: 400;\">- separă informațiile DISTRUCTIVE de cele INFORMATIVE, caută să asculți opinii ale oamenilor de știință precum Bruce Lipton (biolog), preferatul meu.</span></p>\n<p><span style=\"font-weight: 400;\">- elimină mass-media, ascultă doar ceea ce ține de legislație, ca să știi ce reguli sociale sunt impuse și ce termene stabilite sunt definitivate.</span></p>\n<p><span style=\"font-weight: 400;\">- nu mai judeca, fii &icirc;n tabăra numită SCHIMBARE PENTRU IUBIRE, fii un exemplu pentru apropiați și susține-i.</span></p>\n<p><span style=\"font-weight: 400;\">- dacă ești agasat de panicoși și rău voitori, blochează accesul, pentru ca &icirc;n procesul tău de susținere a corpului, acești oameni și acele cuvinte alarmante sunt precum un microb &icirc;n c&acirc;mpuri.</span></p>\n<p><span style=\"font-weight: 400;\">- evită să discuți despre același subiect non stop, observă și respectă reguli pentru sănătate.</span></p>\n<p><span style=\"font-weight: 400;\">- sună pe cei dragi și &icirc;ncurajează-i, spune-le că &icirc;i iubești și că &icirc;ntr-o bună zi &icirc;i vei &icirc;mbrățișa str&acirc;ns de tot.</span></p>\n<p><span style=\"font-weight: 400;\">- apropie-te de partener, r&acirc;zi, fă planuri cu el, schimb de idei și de susținere continuă, are mare nevoie deși nu arată tot timpul.</span></p>\n<p><span style=\"font-weight: 400;\">- joacă-te cu copiii, fii prințesă sau luptător ninja, puneți cearșaf &icirc;n cap și aleargă prin casă, fii ponei, sau vultur, fii personajul din filmul copilului, acum are mare nevoie de atenția ta, asta te va apropia mult mai mult de copil și este un bun prilej să lași telefonul plin de avertismente..</span></p>\n<p><span style=\"font-weight: 400;\">- Ai &icirc;ncredere &icirc;n univers, va trece totul și vom fi iarăși &icirc;nvingători.</span></p>\n<p><span style=\"font-weight: 400;\">- &Icirc;nvață să meditezi, e sănătate curată.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Eu sunt dispusă să ajut prin sesiuni de coaching, cu oricine ai nevoie &icirc;n acest moment.</span></p>\n<p><span style=\"font-weight: 400;\">Se stabilesc &icirc;n privat programările și este strict confidențial, orice persoană poate beneficia.<br /><br /></span></p>\n<p><span style=\"font-weight: 400;\">Vă &icirc;mbrățișez virtual!</span></p>\n<p><span style=\"font-weight: 400;\">Mai mult de 9 secunde...</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,<br /></span><span style=\"font-weight: 400;\">Aura M</span></p>', 1606300330, NULL, 'Panica este mai periculoasă decât orice virus', 'M-am tot gândit dacă să scriu ceva despre situația curentă sau să mă izolez din mediul online, întrucât observ cum orice ai scrie, se trezesc două tabere să judece: cei care apără agitația, alerta și repetă non stop pe paginile de socializare cum să fugim, ascundem, plângem ș.a.m.d. și ceilalți care ignoră orice regulă decentă ce trebuie respectată astfel încât să trecem cu un vibe de recunoștiință peste acest eveniment universal.', 'panica,pandemie,probleme,stres'),
(3, 2, 1, 'Curajul de a te expune așa cum ești', '<p><span style=\"font-weight: 400;\">A avea curaj să te expui &icirc;n fața oamenilor așa cum ești, este destul de provocator. De regulă avem tendința să ne punem masca potrivită contextului, astfel să fim c&acirc;t mai acceptați de cei din jur și desigur facem asta din frica de a nu fi judecați. Aceste </span>măști nu fac dec&acirc;t să ne &icirc;ndepărteze de noi<span style=\"font-weight: 400;\">, și să ne creeze o realitate falsă, chiar ajungem să ne identificăm cu masca și bingo, apare dezamăgirea bazată pe așteptări nerealiste. Mai exact, una spunem, alta facem. Ne adaptăm după persoana din fața noastră, &icirc;ntreprindem acțiuni ce nu vrem &icirc;n realitate să le facem dar c&acirc;nd purtăm masca respectivă ajungem să acționăm &icirc;n defavoarea dorinței adevărate; interlocutorul citește intenția prin neuroni oglindă, iar atitudinea sa pe moment sau după un timp, va fi contrar așteptărilor noastre false. Mereu vom primi răspunsul din spatele intenției acțiunii respective, fie că ne place, fie că nu. Nevoia noastră de a fi acceptați provine din copilărie, c&acirc;nd ne-am format un sine fals pentru a fi pe placul părinților, profesorilor, ș.a.</span></p>\n<p><span style=\"font-weight: 400;\">C&acirc;nd ești &icirc;n frică și vocile din cap &icirc;ți tot repetă că nu e bine, că nu e frumos, că n-ai să reușești, că x sau y poate mai bine, etc, nu mai vezi altă cale de scăpare, dec&acirc;t să pui masca de om &ldquo;adaptabil&rdquo; și te deconectezi de la scopul tău, am&acirc;ni și te comporți altfel dec&acirc;t ai vrea, iar c&acirc;nd ești singur te &icirc;nvinovățești că nu ai procedat corect. E un cerc vicios al lipsei curajului de a fi tu &icirc;nsuți.</span></p>\n<p><span style=\"font-weight: 400;\">Cu toate astea, ai voie de o mie de ori să greșești, să &icirc;ți pui măști c&acirc;te vrei, &icirc;nsă să alegi să fii tu, e marea recompensă ce te va face să nu te mai &icirc;ntorci niciodată la masca de salvare.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Calea e simplă, implică doar sinceritate cu tine și imediat apar și beneficiile:</span></p>\n<ul>\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Elimini din viața ta oamenii care nu sunt propice dezvoltării tale</span></li>\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Atragi oameni noi de la care ai ce &icirc;nvăța și care te vor trata ca un suveran</span></li>\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Prinzi &icirc;ncredere &icirc;n tine pe zi ce trece, iar rezultatele tale vor prospera pe toate planurile</span></li>\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Ai posibilitatea să inspiri alți oameni, așadar lași &icirc;n urma ta un exemplu de curaj și naturalețe</span></li>\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">&Icirc;ți dezvolți creativitatea, descoperi lucruri la care ești bun/ă și lași deoparte teama că tu nu ești &icirc;n stare</span></li>\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Lista poate continua, &icirc;nsă prefer să o scriem &icirc;ntr-o sesiune de coaching, unde singur/ă răm&acirc;i uimit/ă de conștientizările tale.</span></li>\n</ul>\n<br />Dacă simți că timiditatea, aparent lipsa originalității și curajului, sunt o dificultate pentru tine acum, și nu reușești singur/ă să depășești obstacolul, pe l&acirc;ngă materiale te pot susține ca și coach &icirc;ntr-o sesiune de 1 la 1.<br /><br />\n<p><span style=\"font-weight: 400;\">Te &icirc;mbrățișez! (mai mult de 9 secunde...)</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,</span></p>\n<p><span style=\"font-weight: 400;\">Aura M.</span></p>', 1606687200, 1606730899, 'Curajul de a te expune așa cum ești', 'Când ești în frică și vocile din cap îți tot repetă că nu e bine, că nu e frumos, că n-ai să reușești, că x sau y poate mai bine, etc, nu mai vezi altă cale de scăpare, decât să pui masca de om “adaptabil” și te deconectezi de la scopul tău, amâni și te comporți altfel decât ai vrea, iar când ești singur te învinovățești că nu ai procedat corect. E un cerc vicios al lipsei curajului de a fi tu însuți.', 'curaj,frica,masca,adaptabilitate,judecata'),
(4, 1, 1, 'Străinii din aceeași casă', '<h3><span style=\"font-weight: 400;\">Cum oferi ceea ce nu primesti</span></h3>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">&Icirc;n această perioadă, &icirc;n care se discută mai mult despre frici de tot felul legate de situația actuală și viitor, majoritatea ignoră viața ce o trăiesc, se focusează doar pe supraviețuire și automat calitatea vieții cu noile schimbări temporare, devine un calvar.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Cuplurile au ieșit de pe pilot automat, mulți sunt nevoiți să locuiască non stop &icirc;mpreună, datorită noilor cerințe. Asta &icirc;nseamnă o &icirc;ntrerupere de rutină, mersul la job, timpul fiecăruia individual &icirc;nafara casei dispare, copiii solicită mai multă atenție dec&acirc;t &icirc;nainte iar cuplurile trec printr-o etapă cu totul nouă a relației, definitorie aș spune &icirc;n viitorul relației.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Dacă tratați cu superioritate, reiese că e foarte simplu să locuiești non stop cu partenerul, să faceți activități &icirc;mpreună, totul roz ca-n basme, etc. Oricine poate susține asta, &icirc;nsă lăs&acirc;nd fanteziile la o parte, știți foarte bine că realitatea se ascunde &icirc;n spatele vaselor de spălat, jucăriilor aruncate prin toată casa, momentul c&acirc;nd soțul devine mut și soția cicălitoare, plus la toate acestea, schimbările psihologice prin care trec cei doi și ieșirea la suprafață a gunoiului de sub preș, str&acirc;ns &icirc;n toți anii sau chiar &icirc;n etapa de &icirc;ndrăgostire.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Indiferent de stadiul relației, totul se &icirc;nt&acirc;mplă identic. Imaginați-vă c&acirc;t dezgust, ură, furie, emoții negative ies la suprafață din ambii parteneri. Din toate informațiile aflate și experimentate de mine, cred &icirc;ntr-o teorie valabilă pentru buna funcționare a unui cuplu.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Bărbatul are nevoie să se retragă sub anumite forme din relație, lunar, fie că iese din casă cu anumite pretexte, fie că nu răspunde la telefon, fie că se retrage la tv, etc. Este o nevoie esențială pentru ca bărbatul să g&acirc;ndească, &icirc;n solitudine, fără prezența iubitei/soției. El se va &icirc;ntoarce cu o mare disponibiltate de atenție și ascultare, dacă evident, nu este cicălit. Această nevoie a bărbatului este privită de către femei ca o lipsă de respect față de ele și ca mod de apărare acestea &icirc;ncep să &icirc;nvinuiască, critice, să se folosească de copii ca pretext, să manipuleze, etc. Femeile fac asta deoarece nici ele nu &icirc;nțeleg nevoia lor de a-și revărsa cumulul imens de emoții reprimate din copilările, iar acest lucru se &icirc;nt&acirc;mplă lunar &icirc;n creierul unei femei.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Femeia are nevoie lunar să &icirc;și exprime toate nemulțumirile legate de viață, de aspectul fizic, de evenimente, de lucruri pe care nu le &icirc;nțelege, toate bazate pe ceea ce i s-a &icirc;nt&acirc;mplat &icirc;n copilărie și nu a vindecat. Prima greșeală este că ea vrea acest lucru c&acirc;nd și la el intervine perioada lunară de retragere &icirc;n solitudine. Ce iese de aici? Sc&acirc;ntei mari, finalizate cu certuri, uneori agresiuni fizice, psihice, verbale. Devine un cerc lunar de conviețuire nesănătos. Oare cum arată așa un cuplu, nevoit să fie izolat la domiciliu pe perioadă nedeterminată?</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Probabil ați mai auzit de cuplurile longevive, care după mulți ani se &icirc;nțeleg de minune, au copii și afirmă că se ceartă foarte rar sau niciodată, ba chiar femeia din cuplu are titlul de femeie ascultătoare care nu pune niciodată &icirc;ntrebări și nu cere socoteală. Aici situația este și mai alarmantă. Femeia din acest cuplu acumulează frustrări c&acirc;t o adunătură de femei cicălitoare la un loc.&nbsp;&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Femeia și bărbatul au nevoie de organizare pentru a putea trece &icirc;mpreună peste ciclurile lunare emoționale. Astfel, femeia trebuie să ofere &icirc;nțelegere c&acirc;nd bărbatul are nevoie de intimitate, deoarece oric&acirc;t ar insista, el nu poate fi disponibil pentru ascultare, iar c&acirc;nd el revine din timpul său, va putea cel puțin să o asculte, iar &icirc;n acest timp recomandarea este ca femeia să &icirc;și caute altă persoană pentru destăinuri sau să facă diverse activități creative singură, să se bucure de timpul ei și să aștepte momentul oportun de comunicare cu partenerul. Femeia care nu este lăsată să-și exprime emoțiile, frustrările, desigur pe un ton cald și cu atenție, stă &icirc;ntr-o relație toxică, ce se va răsfr&acirc;nge asupra celorlalți, mai ales asupra copiilor.</span></p>\n<p><span style=\"font-weight: 400;\"> </span></p>\n<p><span style=\"font-weight: 400;\">Schimbări intervenite &icirc;n statul cu partenerul &icirc;n această perioadă:</span></p>\n<ul>\n<li><span style=\"font-weight: 400;\">ies la suprafață frustrări vechi</span></li>\n<li>monotonia se intalează rapid, astfel unul sau ambii vor simți nevoia să comunice și cu alte persoane de sex opus, iar acest lucru cauzează gelozie, frustrare extra, activarea rănilor din copilările precum nedreptate, respingere, trădare, abandon, umilință</li>\n<li>bărbatul se va izola de femeie cum poate iar femeia va &icirc;ncerca să oprească asta, cum am scris mai sus</li>\n<li>apar reproșuri din nimicuri, fondate pe emoții care nu sunt descifrate</li>\n<li>nemulțumiri, combinate cu frică pentru situația actuală</li>\n<li>stări de alertă care se pot transforma &icirc;n dezgust față de partener</li>\n<li>dorință mare de control asupra celuilalt</li>\n</ul>\n<p>&nbsp;</p>\n<p>Soluții pentru depășirea acestei perioade:</p>\n<ul>\n<li>să se elaboreze un plan &icirc;n care să fie trecute sarcinile fiecăruia din casă</li>\n<li>fiecare partener să aibe minim 2 ore pe zi intimitate &icirc;n altă cameră, fără să aibe contact cu celălalt</li>\n<li>c&acirc;nd apare o emoție distructivă, precum cele enumerate mai sus, imediat să se acționeze. Fie cu un coach, mai ales că sesiunile sunt gratis, fie cu un psiholog, fie singur cu pix și foaie</li>\n<li>fiecare partener să facă activități individuale, fie cu copiii, fie singuri, iar apoi să &icirc;i povestească celuilalt ce a &icirc;nvățat</li>\n<li>practicarea meditației, rugăciunii, sportului</li>\n<li>să existe constant gesturi de afecțiuni, atingeri și relații intime conștiente &icirc;ntre parteneri, fără condiționări și exagerări</li>\n<li>elaborarea unui plan pentru următoarele luni, preferabil scris</li>\n<li>este necesar să se creeze o relație de prietenie &icirc;ntre parteneri, &icirc;nafară de relația romantică, astfel cei doi să poată funcționa ca o echipă.</li>\n<li>ideal ar fi ca femeia să &icirc;și re&icirc;mprospăteze rolul de femeie, să facă lucrurile cu gingășie, inclusiv partea de curățenie, m&acirc;ncare, etc., astfel &icirc;și poate explora și creativitatea &icirc;n bucătărie</li>\n<li>cititul zinic, chiar 5 pagini minim dintr-o carte, &icirc;i ajută pe cei doi să aibe subiecte noi de discuție</li>\n<li>respectarea programului de activitate &icirc;n casă, mai ales cel &icirc;n intimitate, va ajuta cuplul să reziste.</li>\n</ul>\n<p><span style=\"font-weight: 400;\"><br />Această perioadă este dificilă pentru toată lumea, &icirc;nsă multe familii disfuncționale trăiesc &icirc;ntr-un mediu ostil și deprimant datorită ne&icirc;nțelegerii acestor aspecte.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Pandemia o să treacă, dar urmările lăsate &icirc;n cuplu vor răm&acirc;ne.</span></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Dacă vă regăsiți &icirc;n unele situații, alegeți să transformați izolarea &icirc;n oportunitate de creare a unei noi relații de prietenie cu partenerul. Este minunat să oferi ceea ce nu primești, sună bizar &icirc;nsă rezultatul este că vei primi la un moment dat &icirc;nzecit &icirc;napoi, c&acirc;nd nu te aștepți.</span></p>\n<p><span style=\"font-weight: 400;\">Vă &icirc;mbrățișez! (mai mult de 9 secunde...)</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,<br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1607464800, 1607523510, 'Străinii din aceeași casă', 'Femeia și bărbatul au nevoie de organizare pentru a putea trece împreună peste ciclurile lunare emoționale. Astfel, femeia trebuie să ofere înțelegere când bărbatul are nevoie de intimitate, deoarece oricât ar insista, el nu poate fi disponibil pentru ascultare, iar când el revine din timpul său, va putea cel puțin să o asculte, iar în acest timp recomandarea este ca femeia să își caute altă persoană pentru destăinuri sau să facă diverse activități creative singură, să se bucure de timpul ei și să aștepte momentul oportun de comunicare cu partenerul. Femeia care nu este lăsată să-și exprime emoțiile, frustrările, desigur pe un ton cald și cu atenție, stă într-o relație toxică, ce se va răsfrânge asupra celorlalți, mai ales asupra copiilor.', 'pandemie,izolare,emotie,intelegere'),
(5, 2, 1, 'Te simți Joker sau Grinch?', '<p><span style=\"font-weight: 400;\">Ați auzit de aceste personaje vreodată?</span></p>\n<p><span style=\"font-weight: 400;\">Dacă da, credeți că ele au fost inventate pur și simplu sau există o &icirc;ntreagă scenă psihologică &icirc;n spate?</span></p>\n<p><span style=\"font-weight: 400;\">Scenă care există pe bune, sau scenă media?</span></p>\n<p><span style=\"font-weight: 400;\">Acestea sunt doar c&acirc;teva &icirc;ntrebări care se &icirc;nv&acirc;rt &icirc;n jurul paradigmei psihologice ce &icirc;nvăluie aceste două personaje.</span></p>\n<p><span style=\"font-weight: 400;\">Iar eu afirm că DA, fie am fost sau suntem &icirc;n anumite momente fie JOKER, fie GRINCH.</span></p>\n<p><strong>Analiza acestor două personaje este de fapt analiza comportamentală a multora dintre noi.</strong></p>\n<p><span style=\"font-weight: 400;\">Chiar ar fi trist pentru mine să trăiesc fără să știu de ce, dar și mai trist ar fi să cred că psihologia este doar &icirc;n cărți iar restul sunt povești, așa cum se speculează.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Psihologie este peste tot, &icirc;n filme, &icirc;n desene animate, &icirc;n manipularea mass media, &icirc;n &icirc;ntalnirea cu prietenii care oferă sfaturi și ipoteze pentru defăimarea fostei / fostului, &icirc;n orice acțiune cu și despre oameni. Evident, se practică pe nivele separate &icirc;nsă tot cu mintea lucrăm.</span></p>\n<p><span style=\"font-weight: 400;\">Să &icirc;ncepem cu </span><strong>JOKER</strong><span style=\"font-weight: 400;\">:</span></p>\n<p><span style=\"font-weight: 400;\">Un personaj controversat, interpretat de actorul Joaquin Phoenix &icirc;n filmul lansat &icirc;n 2019.</span></p>\n<p><span style=\"font-weight: 400;\">Acest personaj ascunde &icirc;n spatele măștii de &lsquo;&rsquo;om malefic&lsquo;&rsquo;, un puști maltratat, chinuit, umilit, separat de inocența copilăriei sale chiar de cea care i-a dat viață.</span></p>\n<p><span style=\"font-weight: 400;\">Acțiunile sale, inclusiv crimele sale, aveau la bază setea de dreptate incurabilă, pentru că rănile sale erau at&acirc;t de ad&acirc;nci &icirc;nc&acirc;t a dezvoltat numeroase afecțiuni psihologice de-a lungul vieții, ba chiar a avut stări de amnezie ca și factor de protecție &icirc;mpotriva amintirilor dureroase.</span></p>\n<p><span style=\"font-weight: 400;\">Pe l&acirc;ngă faptul că era un om traumatizat și separat de sine, cu o personalitate bolnavă și un suflet de copil ascuns și uitat timpuriu, el a reușit </span><strong>singur</strong><span style=\"font-weight: 400;\"> să creeze o nouă variantă a sa, care prin acțiuni aparent teribile, i-a adus recunoștiința &icirc;ntregului popor și multă faimă, iar cel mai probabil și-a satisfăcut nevoia de a fi auzit, văzut, &icirc;ntr-un final, după ce societatea l-a tratat ani la r&acirc;nd ca un gunoi.</span></p>\n<p><span style=\"font-weight: 400;\">Lăs&acirc;nd la o parte filmul, &icirc;n noi toți există un joker mai mult sau mai puțin treaz.</span></p>\n<p><span style=\"font-weight: 400;\">Cum se manifestă:</span></p>\n<p><span style=\"font-weight: 400;\">Fiecare avem traume din copilărie, chiar dacă vrem sau nu vrem să admitem, deși sunt mulți care știu și acționează la fel pe pilot automat.</span></p>\n<p><span style=\"font-weight: 400;\">Ca și personajul din film, acești JOKERI ai societății noastre acționează asupra lor și asupra semenilor &icirc;n moduri neadecvate și fără să caute &icirc;n ad&acirc;ncurile minții pentru că le este frică, acolo &icirc;n spatele subconștientului se află originea fiecăruia, cele mai dure secrete și cele mai intense emoții negative din copilărie; necesită curaj și etape pentru vindecare.</span></p>\n<p><span style=\"font-weight: 400;\">Așadar, dacă sunt:</span></p>\n<ul>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Acțiuni care fac rău semenilor, copiilor și oamenilor care nu vă &icirc;ndeplinesc NEVOILE de orice fel, financiare, emoționale, aparent morale</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Intrigi, manipulare, depresii severe</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Mereu victimizare , atitudini care &icirc;ncearcă să schimbe mentalitatea cuiva, alienarea copiilor, maltratarea copiilor psihica sau fizică.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">B&Acirc;RFE la orice discuție</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Exces la cheltuieli pe lucruri scumpe, bunuri, mașini, haine, doar pentru a părea cineva &icirc;n societate</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">etc</span></li>\n</ul>\n<p><span style=\"font-weight: 400;\">Ăsta este JOKER. Nu trebuie neapărat să faci crime pentru a fi acest personaj.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">&Icirc;n spatele acestor atitudini stau bine mersi traumele.</span></p>\n<p><span style=\"font-weight: 400;\">Unii oameni, lucrează cu ele, alții citesc despre ele și continuă shopping-ul, iar altele aleg să meargă &icirc;n &icirc;ntuneric, să se teamă al naibii de tare și peste ceva vreme să aprindă lumina.</span></p>\n<p><span style=\"font-weight: 400;\">Drumul meu a fost &icirc;ntunecat de c&acirc;nd eram copil &icirc;nsă Sinele Meu mi-a dat o lanternă p&acirc;nă c&acirc;nd am stricat-o și a trebuit să o iau de la capăt după adolescență.</span></p>\n<p><span style=\"font-weight: 400;\">Ideea principală este că sunt momente &icirc;n viață c&acirc;nd suntem JOKER și singuri avem puterea de a ne transforma durerea &icirc;n putere.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Aceia sunt oamenii &icirc;nvingători.&nbsp;</span></p>\n<br />\n<p><strong>Grinch&nbsp;</strong></p>\n<p><span style=\"font-weight: 400;\">Cred că toată lumea a auzit de acest personaj, mai ales din desene animate.</span></p>\n<p><span style=\"font-weight: 400;\">Nu &icirc;i place Crăciunul</span></p>\n<p><span style=\"font-weight: 400;\">Nu suportă oamenii fericiți</span></p>\n<p><span style=\"font-weight: 400;\">Nu vrea pace sub nicio formă</span></p>\n<p><span style=\"font-weight: 400;\">Nu crede &icirc;n iubire</span></p>\n<p><span style=\"font-weight: 400;\">Nu &icirc;i place să fie printre oameni</span></p>\n<p><span style=\"font-weight: 400;\">Are o atitudine sfidătoare</span></p>\n<p><span style=\"font-weight: 400;\">Mereu face planuri pentru a face pe cineva nefericit</span></p>\n<p><span style=\"font-weight: 400;\">Se consideră superior</span></p>\n<p><span style=\"font-weight: 400;\">Este depresiv</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Prima ta impresie care e?&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">,,O ce personaj enervant...&rsquo;&rsquo; etc.</span></p>\n<p><span style=\"font-weight: 400;\">Acest personaj, oarecum și cu o doză de comedie &icirc;n acțiuni, este de fapt un adult care poartă &icirc;n suflet durerea copilăriei sale, crescut &icirc;ntr-un orfelinat, mereu singur, neglijat și forțat să vadă &icirc;n jurul său copii cu părinți &icirc;mpreună, mai ales de sărbători.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Crăciunul s-a dovedit pentru el a fi subiectul cel mai dureros care s-a declanșat &icirc;ntr-o dimineață, după Ajun, s-a trezit singur &icirc;n sufrageria imensă și veche a unui orfelinat, fără brad și fără nimic sub brad.</span></p>\n<p><span style=\"font-weight: 400;\">Vă puteți &icirc;nchipui ce &icirc;nseamnă asta pentru un copil?</span></p>\n<p><span style=\"font-weight: 400;\">De Moș Crăciun să nu găsești o bomboană sau&hellip; un brad luminos cu globuri de toate culorile?</span></p>\n<p><span style=\"font-weight: 400;\">Vrem nu vrem tradițiile există.</span></p>\n<p><span style=\"font-weight: 400;\">Sau poate știți ce &icirc;nseamnă acestă durere dar nu sunteți conștienți că uneori sunteți Grinch?</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Ce l-a determinat pe Grinch să &icirc;și simtă din nou copilul interior uitat?</span></p>\n<p><span style=\"font-weight: 400;\">Iubirea.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Iubirea prin puterea exemplului, unui copil.</span></p>\n<p><span style=\"font-weight: 400;\">Grinch nu a avut capacitatea să iasă singur din trauma sa, dar procesul de vindecare s-a declanșat la contactul cu puritatea, iubirea unui copil, sinceră, fără așteptări, fără manipulări și mai ales, fără egoism.</span></p>\n<p><span style=\"font-weight: 400;\">Da, unele suferințe se ascund at&acirc;t de bine &icirc;n noi, &icirc;nc&acirc;t nimic nu ne mai poate &icirc;nmuia, dec&acirc;t un factor la care suntem sensibili, &icirc;n acest caz, un copil cu o inimă specială.</span></p>\n<p><span style=\"font-weight: 400;\">C&acirc;nd suntem Grinch, ne &icirc;ndepartăm tot mai mult de ceea ce am vrea să fim.</span></p>\n<p><span style=\"font-weight: 400;\">Așadar, urm&acirc;nd regia desenului, soluția ar fi să găsim fiecare acel factor interior, acel declanșator care determină schimbarea, ca ulterior să apară transformarea realității.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Traumele nu pot fi șterse niciodată, &icirc;nsă pot fi acceptate, integrate, ceea ce este mult mai benefic.</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">&Icirc;nchei prin a va transmite că autocunoașterea nu doar salvează vieți, ci ne conduce la &icirc;ndeplinirea scopului pentru care de fapt, trăim.</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Vă &icirc;mbrățisez! (mai mult de 9 secunde)</span></p>', 1609279200, 1609347256, 'Te simți Joker sau Grinch?', 'Ați auzit de aceste personaje vreodată? Dacă da, credeți că ele au fost inventate pur și simplu sau există o întreagă scenă psihologică în spate? Scenă care există pe bune, sau scenă media? Acestea sunt doar câteva întrebări care se învârt în jurul paradigmei psihologice ce învăluie aceste două personaje. Iar eu afirm că DA, fie am fost sau suntem în anumite momente fie JOKER, fie GRINCH.', 'Joker,Grinch,traume,psihologie,personaje'),
(6, 1, 1, 'Inversarea rolurilor în relația de cuplu', '<p><span style=\"font-weight: 400;\">&Icirc;ntr-o relație de cuplu formată &icirc;ntre un bărbat și o femeie, rolurile sunt diferite și fiecare contribuie aliniat la esența sa. Asta &icirc;nseamnă că nativ, bărbatul are de &icirc;ndeplinit niște sarcini diferite de cele ale femeii.</span></p>\n<p><span style=\"font-weight: 400;\">Din cele mai vechi timpuri, bărbatul este cel care guvernează &icirc;n cuplu partea de stabilitate, asigurarea căminului dar &icirc;n esență cel mai important ar fi partea de supraviețuire. Nu ne raportăm la tradițiile și obiceiurile care desconsiderau femeia &icirc;n perioada geto dacilor, dar nici cazurile extreme de feminism din acest secol nu sunt bune ca exemplu. Vreau să scot &icirc;n evidență rolurile de bază, care conduc la armonie și echipă &icirc;n cuplu, la stabilizarea echilibrului energetic al fiecărui individ și la modul cum bărbatul și femeia, fiind energii complementare, riscă să deterioreze naturalețea unicității sexului propriu, prin schimbare involuntară de rol.</span></p>\n<p><strong>Ce rol elementar are bărbatul &icirc;n relația de cuplu?</strong></p>\n<p><span style=\"font-weight: 400;\">Except&acirc;nd argumentele și pl&acirc;ngerile femeilor referitoare la neimplicarea bărbatului &icirc;n activități casnice, ștersul lacrimilor cu batista de fiecare dată c&acirc;nd sunt emoții prea multe, timpul cu copiii, etc, eu consider că este necesar să se cunoască rolul elementar al bărbatului, de care chiar ar fi &icirc;ngrijorător să se lipsească. Rolul unui bărbat constă &icirc;n protecție asumată, responsabilitate, asigurarea căminului, contribuire la mărirea familiei matur, dacă se dorește asta de ambele părți, de asigurarea confortului potrivit pentru toți membrii familiei, mai concret, bărbatul n-are timp și nevoie de gestionarea emoțiilor femeii, el are altfel de creier, emisferele sale sunt invers active față de ale femeii, de aceea el se ocupă de partea de supraviețuire, iar apoi de restul de activități stabilite de comun acord cu partenera.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Bărbatul se naște cu energia la un nivel mai jos față de al femeii, de aceea el nu poate da naștere și de aceea el menține un anumit grad de responsabilități; chiar dacă ele par &icirc;n defavoarea femeii,&nbsp; exist&acirc;nd mereu lupta dintre sexe, bărbatul are nevoie de femeie &icirc;ncep&acirc;nd de la naștere; fără ea, el nu poate să experimenteze rolul masculin, dacă l-a ales.</span></p>\n<p><strong>Ce rol are femeia?</strong></p>\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">Femeia este responsabilă de armonia &icirc;n cuplu. Ea este un izvor de emoții, un izvor de idei, creativitate, capacitate de a fi mamă, energia o are mai sus ca a bărbatului, competențe extinse de adaptabilitate și un grad mai mare de intuiție. Femeia se naște cu alt creier, alt rol, ea are nevoie de bărbat nu doar pentru reproducere ci și pentru experimentarea iubirii divine, conectare la energia masculină și &icirc;mpreună cu bărbatul, creează noi potențiale linii de destin. Femeia trebuie să fie pentru bărbat ca o sursă de căldură, precum cea pe care el a primit-o &icirc;n p&acirc;ntec de la mama lui, ea hrănindu-l cu iubire și grijă, &icirc;i va oferi lui șansa să fie puternic, să realizeze orice, să &icirc;și &icirc;mplinească orice vis. &Icirc;nsă, imaginează-ți cum e c&acirc;nd el vine de la serviciu și ea &icirc;i tr&acirc;ntește niște facturi și o privire &icirc;n defensivă. Singurul lui vis va fi ca ea să dispară.</span></p>\n<p><strong>Ce &icirc;nseamnă inversarea rolurilor?</strong></p>\n<p><span style=\"font-weight: 400;\">Inversarea rolurilor e atunci c&acirc;nd femeia o face pe bărbatul și bărbatul devine femeie. Mai exact, conform noilor tendințe de independență feminină duse la extrem, femeia ajunge să repare acasă centrala, aragazul, să mute dulapuri, să monteze lustre, evident refuz&acirc;nd orice ajutor de la bărbat sau chiar acțion&acirc;nd direct, fără nicio comunicare. Femeia din această relație de cuplu transmite faptul că el e un papă-lapte și ar trebui să croșeteze, că și așa copilul e făcut, familia e ok, ea le știe pe toate. Este un exemplu distructiv, iar unele femei &icirc;l adoptă uneori involuntar. De asemenea nu este de ignorat tonalitatea vocii, modul cum femeia abordează bărbatul. Prin ordine și restricții ea devine un sergent și bărbatul se supune.</span></p>\n<p><span style=\"font-weight: 400;\">Legat de bărbatul ce &icirc;și schimbă rolul &icirc;n femeie, un exemplu bun poate fi alegerea lui de a sta &icirc;n concediu de creștere a copilului și femeia merge la serviciu. Cu toate scuzele și variantele, nu este o opțiune benefică, el este anihilat ca bărbat, rolul lui se schimbă și al ei implicit. Asta poate afecta personalitatea copilului și scade &icirc;ncrederea de sine a bărbatului, iar o dată cu această alegere, ori de c&acirc;te ori el va trebui să-și &icirc;ndeplinească rolul masculin, va avea un blocaj, disconfort și degradarea relației se va produce inevitabil.</span></p>\n<p><span style=\"font-weight: 400;\">Este foarte important să respectăm rolurile fiecăruia, prin acest echilibru, indiferent de c&acirc;tă parte masculină și feminină are fiecare &icirc;n el, energia se va &icirc;mprăștia din plin și comunicarea va fi fructuoasă.</span></p>\n<p><span style=\"font-weight: 400;\">Exemplele sunt variate, tu poți să identifici dacă &icirc;n relația de cuplu &icirc;ți respecți rolul prin analiza propriei persoane. Poți să &icirc;ncepi cu &icirc;ntrebarea: Ce pot face eu acum pentru buna continuitate a relației mele?&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Notează orice răspunsuri pe foaie. Apoi continuă cu &icirc;ntrebări legate de tine, nu te rezuma la partener.</span></p>\n<p><span style=\"font-weight: 400;\">Armonia din cuplu &icirc;ncepe cu armonia din tine. Dacă nu e armonie &icirc;n cuplu, posibil să ai nevoie de &icirc;nvățat doar o lecție.</span></p>\n<p><span style=\"font-weight: 400;\">&Icirc;ți doresc să te bucuri de rolul tău și să nu cauți afirmare prin rolul opus.</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Te &icirc;mbrățișez! (mai mult de 9 secunde...)</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,</span><span style=\"font-weight: 400;\"><br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1611921105, NULL, 'Inversarea rolurilor în relația de cuplu', 'Într-o relație de cuplu formată între un bărbat și o femeie, rolurile sunt diferite și fiecare contribuie aliniat la esența sa. Asta înseamnă că nativ, bărbatul are de îndeplinit niște sarcini diferite de cele ale femeii.', 'familie,relatie,roluri,barbat,femeie');
INSERT INTO `et_articles` (`id_article`, `id_category`, `visible`, `title_ro`, `description_ro`, `inserted_at`, `updated_at`, `seo_title_ro`, `seo_description_ro`, `seo_keywords_ro`) VALUES
(9, 2, 1, 'Manipularea mascată în lapte și miere', '<p><span style=\"font-weight: 400;\">Probabil te &icirc;ntrebi de ce am ales acest titlu, dar sunt sigură că vei face rapid legăturile.</span></p>\n<p><span style=\"font-weight: 400;\">Nu aș fi scris at&acirc;t de devreme despre manipulare dacă nu s-ar fi adunat așa multe resurse (exemple) &icirc;n jurul meu. Inclusiv eu de multe ori am căzut pradă manipulării, dar cum toate au un &icirc;nceput așa au și un sf&acirc;rșit.</span></p>\n<p><span style=\"font-weight: 400;\">Manipularea se manifestă &icirc;n cele mai sensibile variante, de la locul de muncă, la viața personală, incluz&acirc;nd familia. Cele mai frecvente manipulări sunt &icirc;ntocmite cu stil și diplomație &icirc;n familie.</span></p>\n<p><span style=\"font-weight: 400;\">De regulă o mamă tradițională, consideră că este rolul ei să controleze acțiunile copiilor și dacă nu funcționează cu impunere, aplică tot felul de tertipuri și șantaje emoționale specifice manipulării.</span></p>\n<p><span style=\"font-weight: 400;\">Ce ur&acirc;t este acest cuv&acirc;nt, precum frecvența sa. Tu ca și copil, ai anumite rețineri și te str&acirc;nge &icirc;n spate să pui punct &icirc;n relație cu părintele, de aceea se aplică conceptul&sbquo; &rsquo;&rsquo;c&acirc;t traiesc eu, ești copilul meu și eu răspund de tine&rsquo;&rsquo;, iar filmul continuă p&acirc;nă la ad&acirc;nci bătr&acirc;neți.</span></p>\n<p><span style=\"font-weight: 400;\">Cred că <span style=\"text-decoration: underline;\">sunt și părinți care o fac inconștient</span> și nu văd alte posibilități de comunicare cu un copil, fie el adult deja, &icirc;nsă &icirc;n multe cazuri, se folosesc de relația mamă/tată-copil doar ca să obțină rezultatul dorit de ei. Rezultatul care este? Ăla confortabil, unde lumea nu zice nimic, unde totul este conform credințelor din deceniile trecute, unde fricile sunt la locul lor și unde nu are ce căuta dezvoltarea personală, e prea nocivă și se poate pierde controlul asupra copiilor de 30+.</span></p>\n<p><span style=\"font-weight: 400;\">Manipularea cea mai puternică se manifestă prin cele mai frumoase acțiuni, replici, conjuncturi. Manipulatorul creează contextul necesar ca celălalt să nu aibă timp să realizeze dacă e potrivit sau nu pentru el, următoarea acțiune &icirc;n care se implică. Fiecare cuv&acirc;nt, fiecare gest este bine g&acirc;ndit, pot implica și alte persoane, precum copiii, astfel, cel/cea care manipulează să aibă argumentele necesare, aparent logice și corecte &icirc;n fața celuilalt, ca să &icirc;și c&acirc;știge autoritatea subtilă, mascată sub intenții bune, pline de entuziasm și &icirc;nțelepciune. Un bun manipulator, statisticile arată că sunt femeile, are mereu argumentul potrivit, acel argument care &icirc;l face pe celălalt sensibil, dual, flexibil, să se simtă vinovat, să simtă rușine sau să &icirc;și pună la &icirc;ndoială propria integritate, propriile dorințe și de asemenea &icirc;l face să &icirc;și &icirc;ncalce integritatea și moralitatea, de dragul unor frici bine scoase pe masă și subtil aruncate de manipulator, care joacă un rol de victimă uneori pentru a-și atinge scopul.</span></p>\n<p><span style=\"font-weight: 400;\">Acești oameni sunt peste tot &icirc;n jurul nostru, ei stau mai ales &icirc;n calea celor care vor să evolueze, caută să &icirc;ncurce, să se bage, să scormonească prin prisma credințelor nocive și să comită acțiuni de perturbare, să spună cuvinte puternic emoțional și de șantaj cu orice formă, doar pentru auto satisfacția proprie. Satisfacția lor constă &icirc;n a deține controlul, &icirc;n a obține de la alt om supunere, milă, lucruri materiale, financiare și cel mai sensibil, stabilitate pentru ei, aparentă.&nbsp;</span></p>\n<p><strong>Cum &icirc;ți dai seama că o persoană te manipulează?</strong></p>\n<ul>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Atunci c&acirc;nd ești singur/ă și ai o anumită viziune asupra lucrurilor, te simți bine, confortabil, stăp&acirc;n/ă pe sine, iar c&acirc;nd ești &icirc;n preajma manipulatorului &icirc;ți pui la &icirc;ndoială propriile acțiuni, propria g&acirc;ndire și te simți vinovat pentru orice ai face sau nu ai face.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">C&acirc;nd &icirc;ți uiți scopul, principiile și cauți să protejezi cealaltă persoană , să nu rănești, să nu &icirc;ți expui argumentele dec&acirc;t printr-un mod forțat și exagerat de diplomat astfel ca celălalt să nu se supere.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">C&acirc;nd accepți orice din partea celuilalt și cauți scuze pentru lipsa ta de acțiune, verticalitate.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">C&acirc;nd nu ai curajul să spui&sbquo; &rsquo;&rsquo;NU&rsquo;&rsquo;, asta e semn clar că manipulatorul &icirc;și face bine treaba, deoarece cu o persoană care te lasă liber/ă, cuv&acirc;ntul NU vine ușor și de la sine. Persoana care nu manipulează rareori are nevoie de confirmare sau să ceară ceva de la tine, fără să se asigure că se poate descurca singură.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Aparent &icirc;ți vrea binele, sau a celorlalte persoane implicate, și &icirc;ntreprinde acțiuni mai dese, de fațadă, ca să &icirc;ți arate bunele intenții.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Are un limbaj foarte bine conturat, controlat, lin și cu formule de politețe strecurate la fiecare frază.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Adoptă același stil de comportament ca al tău, limbaj, acțiuni, ca să arate de fapt că nu manipulează și că scopul este comun.</span></li>\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">Orice vine de la altcineva, contrar principiilor tale actuale, sub forma bunătății și iubirii nelimitate, cam așa aș rezuma manipularea, indiferent de la cine vine, rudă, prieten, sau etc.</span></li>\n</ul>\n<br />\n<p><span style=\"font-weight: 400;\">Sunt multe aspecte fine, cel mai ok e să fii atent/ă la orice g&acirc;ndești și să vezi dacă e congruent cu ce vrea cealaltă persoană să faci. &Icirc;ntreabă-te mereu și fii sincer cu tine. Merită? Te-ai putea g&acirc;ndi la ce poți pierde dacă nu te trezești?</span></p>\n<p><span style=\"font-weight: 400;\">Cum poți să recunoști un manipulator, mai ales dacă e din familie?</span></p>\n<p><span style=\"font-weight: 400;\">Simplu. Prin analiză și atenție activă. &Icirc;ți analizezi fiecare acțiune care vine ca și sugestie din partea celuilalt și &icirc;ți pui &icirc;ntrebarea: Vreau eu cu adevărat să fac asta?</span></p>\n<p><span style=\"font-weight: 400;\">E nevoie să fii singur/ă și să aștepți răspunsul potrivit. De multe ori facem lucruri că &rsquo;&rsquo;trebuie&rsquo;&rsquo;, că așa e firesc, că așa au făcut toți și că asta e normalitatea. Dar &icirc;n realitate se numește compromis, e călcare pe sine și pierdere a puterii interioare.</span></p>\n<p><span style=\"font-weight: 400;\">Cum este potrivit să tratăm aceste persoane?</span></p>\n<p><span style=\"font-weight: 400;\">Consider că aceste persoane merită un mare &rsquo;&rsquo;NU&rsquo;&rsquo;, <em>la orice solicitare</em>.</span></p>\n<p><span style=\"font-weight: 400;\">Dacă tu nu te stimezi pe tine și nu te respecți, nici un manipulator nu va &icirc;nceta să te trateze altfel. Aceste persoane acționează pe baza modelului cu care s-au obișnuit, pentru că o dată ce au reușit să manipuleze, o vor face iar și iar, de ce nu? At&acirc;ta timp c&acirc;t nu au văzut că celălalt pune STOP, &icirc;nseamnă că e &icirc;n regulă să continue.</span></p>\n<p><span style=\"font-weight: 400;\">C&acirc;nd spui STOP &icirc;ți dai șansa la o nouă viață. Vei funcționa &icirc;n alt mod și vei face exact ceea ce simți, obții libertate. Poți fi un model pentru copiii tăi, acel părinte care alege să fie stăp&acirc;n pe viața sa și care le oferă lor oportunitatea să identifice de tineri aceste neajunsuri.</span></p>\n<p><span style=\"font-weight: 400;\">Dacă ești manipulat &icirc;n viața personală, la fel de bine poți fi și &icirc;n afaceri sau pe alte planuri.</span></p>\n<p><span style=\"font-weight: 400;\">Alege să fii liber/ă, iubește-te, nu doar &icirc;n teorie!</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Te &icirc;mbrățișez! (mai mult de 9 secunde...)</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Cu drag,<br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1613080800, 1613144850, 'Manipularea mascată în lapte și miere', 'Manipularea se manifestă în cele mai sensibile variante, de la locul de muncă, la viața personală, incluzând familia. Cele mai frecvente manipulări sunt întocmite cu stil și diplomație în familie.', 'manipulare,viata,familie,relatii,libertate'),
(10, 2, 1, 'De ce jignesc oamenii?', '<p><span style=\"font-weight: 400;\">De unde vine nevoia de a jigni? De ce unele persoane simt să jignească prin vorbe adresate direct sau ironii?</span></p>\n<p><span style=\"font-weight: 400;\">Uite de ce: Oamenii care jignesc, sunt frustrați, &icirc;n tot sensul cuv&acirc;ntului. Unul din tipare ar fi acei oameni care fac orice pentru a fi &icirc;n r&acirc;nd cu lumea, confundă iubirea de sine cu grija exacerbată de corpul fizic prin fel de fel de intervenții, au ca scop un tipar comportamental universal, mai exact, ce face vecinul fac și eu, vor să &icirc;și &icirc;ntrețină o imagine &rdquo;impecabilă&rdquo; &icirc;n societate, iar rolul de victimă li se potrivește perfect. &Icirc;n continuarea descrierii portretului, voi adăuga faptul că ei nu au identitate proprie. &Icirc;și ghidează viața după ideile, acțiunile, sfaturile, altora, apropiați sau mai puțin.</span></p>\n<p><span style=\"font-weight: 400;\">Paradoxul e că unii chiar adoptă stilul de personalitate al celui jignit, judecat, pentru că asta le aduce plus valoare aparent. Le place ceea ce văd, dar pentru că ei nu au &icirc;ncredere &icirc;n propriile forțe și pentru că au invidie față de celălalt, mai bine spus: &rdquo;ăla uite ce face, eu nu am reușit așa ceva&rdquo;, judecă la suprafață dar copie cu bună știință.</span></p>\n<p><strong>De unde vine frustrarea?</strong></p>\n<p><span style=\"font-weight: 400;\">Din copilărie, acolo de unde au preluat de la părinți programele mentale și modele de atitudini. Ei nu știu asta, ei consideră că așa e natural, dacă mama a judecat, hop și eu.</span></p>\n<p><span style=\"font-weight: 400;\">C&acirc;nd sunteți jigniți de cineva, fie prin ironii, comentarii, acțiuni, cel mai ok e să nu răspundeți cu aceeași atitudine, &icirc;ntruc&acirc;t veți menține &icirc;n c&acirc;mpuri o energie joasă, emoții negative și toate acestea se răsfr&acirc;ng asupra corpului fizic. Indiferența e cea mai bună alegere pentru un om matur ce se iubește. Desigur și &icirc;ntreruperea relației, c&acirc;nd te iubești pe tine, nu mai ai nevoie de critici &icirc;n viața ta de la persoane ce &icirc;ndeplinesc roluri de &rdquo;bază&rdquo;, sau prietenii false.</span></p>\n<p><span style=\"font-weight: 400;\">Este dificil să gestionăm uneori așa zise micile atacuri, &icirc;nsă putem să alegem mereu varianta de sănătate optimă pentru noi. Cu siguranță există un adevăr spiritual, pentru care o persoană ajunge &icirc;n realitatea noastră și ne jigneste, b&acirc;rfește, etc, dar o să dezbat &icirc;n altă postare specială legată de zona spiritualității.</span></p>\n<p><span style=\"font-weight: 400;\">Așadar, ce ne poate face să nu reacționăm la atacurile acestor indivizi, este să &icirc;nțelegem că ei c&acirc;ndva, au fost copii ca noi, fără judecăți, fără etichete, fără emoții distructive. Au avut părinți care au avut grijă să le inducă această atitudine prin diferitele evenimente din viață. Putem alege noi, non judecata, indiferența, &icirc;ndepărtarea, liniștea, iertarea.</span></p>\n<p><span style=\"font-weight: 400;\">Ce se &icirc;nt&acirc;mplă mai departe&hellip; noi sigur ne alegem cu sănătate radiantă și &icirc;nțelepciune.????</span></p>\n<p><span style=\"font-weight: 400;\"><br />Vă &icirc;mbrățișez! (mai mult de 9 secunde&hellip;)<br /></span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,<br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1614699786, NULL, 'De ce jignesc oamenii?', 'De unde vine nevoia de a jigni? De ce unele persoane simt să jignească prin vorbe adresate direct sau ironii?', 'jignire,umilire,rautate,coaching,sfaturi,viata'),
(12, 2, 1, 'Pot să iert când vreau / Pot să accept dacă vreau', '<p><span style=\"font-weight: 400;\">Ce &icirc;nseamnă să ierți pe cineva?</span></p>\n<p><span style=\"font-weight: 400;\">A ierta o persoană care ne-a cauzat suferința la un moment dat &icirc;n viață, reprezintă un act de curaj, de maturitate, dar este de fapt o alegere ce vine de la sine, după faza acceptării. Nu putem ierta, fără acceptare. A ierta, &icirc;nseamnă a accepta că ai fost rănit/ă, luat de fraier, batjocorit, umilit, ignorat, etc, de cei apropiați sau de oameni importanți din viața ta. Oameni pe baza cărora ți-ai construit existența, cu care ai crezut că poți să pui bazele unui scop pe termen lung, exemple sunt mii. Poți să accepți DACĂ VREI, cu scopul de a IERTA C&Acirc;ND VREI, c&acirc;nd ești pregătit/ă.</span></p>\n<p><strong>Ce NU &icirc;nseamnă iertarea?</strong></p>\n<p><span style=\"font-weight: 400;\">&ndash; nu &icirc;nseamnă că ești obligat/ă să mai ai vreun anume fel de relație cu acel om, după ce l-ai iertat;</span></p>\n<p><span style=\"font-weight: 400;\">&ndash; nu &icirc;nseamnă că trebuie să ai compasiune și să fii salvator, pentru că acea persoană face parte din familie sau aveți un istoric comun;</span></p>\n<p><span style=\"font-weight: 400;\">&ndash; nu presupune toleranță de dragul motivului din subconștient, precum că, tu ești un om evoluat și poți suporta orice vine spre tine;</span></p>\n<p><span style=\"font-weight: 400;\">&ndash; nu &icirc;nseamnă &icirc;ntotdeauna reluarea legăturii cu acea persoană pentru o bună funcționare a sănătății altor persoane implicate; mai ales dacă nu simți cu adevărat că vrei să o iei de la capăt;</span></p>\n<p><span style=\"font-weight: 400;\">&ndash; nu &icirc;nseamnă autoamăgire. Nimeni nu se schimbă, doar noi ne schimbăm prin conștientizări;</span></p>\n<p><span style=\"font-weight: 400;\">&ndash; nu &icirc;nseamnă vinovăție, din nicio parte. Dacă ai acceptat și iertat, se opresc acuzele, judecata, b&acirc;rfa;</span></p>\n<p><span style=\"font-weight: 400;\">&ndash; multe altele ...</span></p>\n<br />\n<p><strong>Care e scopul iertării?</strong></p>\n<p><span style=\"font-weight: 400;\">Eliberare. Te eliberezi pe tine, de acea emoție ce o cari cu tine din trecut și implicit eliberezi și cealaltă persoană.</span></p>\n<p><span style=\"font-weight: 400;\">Foarte important să o faci c&acirc;nd esti pregatit/ă. Sunt situații &icirc;n viață, c&acirc;nd nu putem ierta.</span></p>\n<p><span style=\"font-weight: 400;\">Nu are sens să fim ipocriți, nu putem, pentru că suntem umani și durerea uneori este prea intensă. &Icirc;nsă suntem responsabili să acceptăm, să ne vindecăm, să &icirc;nțelegem că deși nu putem ierta &icirc;ntotdeauna, putem să ne &icirc;ndepărtăm cu &icirc;nțelepciune și analiză a durerii, fără să &icirc;i mai permitem să ne controleze viața.</span></p>\n<p><span style=\"font-weight: 400;\">Dacă dorești să descoperi mai multe din interiorul tău, o poți face &icirc;ntr-o sesiune de coaching. Sunt prezente informații scurte, ce au la bază și &icirc;n spate un mare căutător de mistere ale personalității umane și un curios veșnic, adică eu. Așadar, orice pe lumea asta vine și cu soluție atașată, important e să vezi dincolo de ceea ce pare &ldquo;firesc&rdquo;.</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Te &icirc;mbrățișez! (mai mult de 9 secunde...)</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,<br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1614636000, 1625766436, 'Pot să iert când vreau / Pot să accept dacă vreau', 'A ierta o persoană care ne-a cauzat suferința la un moment dat în viață, reprezintă un act de curaj, de maturitate, dar este de fapt o alegere ce vine de la sine, după faza acceptării. Nu putem ierta, fără acceptare. A ierta, înseamnă a accepta că ai fost rănit/ă, luat de fraier, batjocorit, umilit, ignorat, etc, de cei apropiați sau de oameni importanți din viața ta.', 'iertare,suferinta,acceptare,intelegere,viata,coaching'),
(13, 4, 1, 'Ieșirea din șocul emoțional', '<p><span style=\"font-weight: 400;\">Cu toții avem &icirc;n viață momente dificile emoțional, cauzate de o pierdere sub orice formă, ce ne crează disconfort &icirc;n menținerea capacității de concentrare &icirc;n activitățile zilnice și pot să dăuneze &icirc;n realizarea planurilor.</span></p>\n<p><span style=\"font-weight: 400;\">C&acirc;nd te-ai simțit ultima oară sensibil emoțional, ce ai simțit? Că nu mai ai chef de viață, că nimic nu va mai fi ca &icirc;nainte, că nu ești suficient de puternic/ă, etc.</span></p>\n<p><span style=\"font-weight: 400;\">Hai să-ți spun ceva: totul este temporar! Corpul tău, creierul tău are nevoie de recuperare, de acele momente &icirc;n care să fii plin de emoții ce izbucnesc din tine ca un vulcan, de nopți nedormite, dar toate astea controlat și pe o perioadă decentă. Dă-ți voie să simți durere, nu să o renegi, nu căuta vinovați, nu te raporta la exterior, doar caută să &icirc;ți fii umărul pe care pl&acirc;ngi.</span></p>\n<p><span style=\"font-weight: 400;\">Orice șoc emoțional poate cauza modificări la nivel fizic, poate ai impresia că pici in depresie, sau nu &icirc;ți mai găsești motivația. Este perfect normal, sunt niște etape peste care e necesar să treci, orice eveniment bazat pe șoc emoțional, are menirea de a te face mai &icirc;nțelept/&icirc;nțeleaptă.</span></p>\n<p><span style=\"font-weight: 400;\">Orice pierdere reprezintă pentru moment o pierdere, de fapt nu pierzi nimic, ți se schimbă realitatea, ești pus &icirc;n fața unui alt viitor cu alți actori implicați, devii din omul familiarizat cu o situație, omul aruncat &icirc;n necunoscut. Foarte bine! Evoluția presupune a renunța la vechi.</span></p>\n<p><span style=\"font-weight: 400;\">Pentru a putea ieși c&acirc;t mai repede din șocul emoțional, recomand următoarele acțiuni:</span></p>\n<p><span style=\"font-weight: 400;\">- &Icirc;n faza de &icirc;nceput, dă-ți voie să petreci timp singur/ă, pentru a asimila noua situație, stai &icirc;n liniște, fără b&acirc;rfe, acuzații și acțiuni defensive. C&acirc;nd e prima etapă a șocului, creierul va &icirc;ncepe să aducă argumente, scenarii și g&acirc;ndurile distructive te vor invada, așadar, poți să respiri c&acirc;t mai profund și să stai c&acirc;t mai mult &icirc;n liniștea din spațiul tău de relaxare;</span></p>\n<p><span style=\"font-weight: 400;\">- Scrie pe foaie toate emoțiile pe care le simți, scrie ca o poveste, cum ai fi vrut să fie, pentru ce ești recunoscător, c&acirc;t de repede ai vrea să &icirc;ți revii, poți să scrii (deși creierul se opune), c&acirc;t ești de puternic/ă, efectiv toate g&acirc;ndurile așternute pe foaie;</span></p>\n<p><span style=\"font-weight: 400;\">- &Icirc;ncepe să comunici. &Icirc;ncepe să vorbești cu oameni cu care nu ai discutat at&acirc;t de mult, despre subiecte ce te pasionează, &icirc;ndrăznește să vorbești deschis, ieși la &icirc;nt&acirc;lniri de tot felul, caută mereu schimbul de idei și ideal ar fi să fii &icirc;nconjurat de oameni care te fac să r&acirc;zi;</span></p>\n<p><span style=\"font-weight: 400;\">- Evită contactul cu oamenii b&acirc;rfitori, rudele băgărețe, tot ce aduce conotație negativă asupra evenimentului ce a dus la șocul emoțional. Ai nevoie de pauză de la energii de acest gen, deoarece &icirc;n procesul de vindecare, creierul are nevoie să vadă că noul stil de viață aduce beneficii, iar dacă tu &icirc;i oferi drame, va fi &icirc;n alertă și nu poți progresa;</span></p>\n<p><span style=\"font-weight: 400;\">- Acordă mai mare atenție corpului și felului &icirc;n care arăți; schimbă unele haine, schimbă look-ul, practică un sport, răsfață-te;</span></p>\n<p><span style=\"font-weight: 400;\">- &Icirc;mbrățișează! Deși nu ești &icirc;nvățat și educația nu permite acest lucru rațional, acest act al &icirc;mbrățișării este un dar pentru tine și pentru celălalt. &Icirc;ți schimbă starea și &icirc;ți poate marca ziua respectivă. O să simți că ești susținut energetic și te vei vindeca mult mai repede.</span></p>\n<p><span style=\"font-weight: 400;\">Dacă un șoc emoțional persistă și nu &icirc;ți găsești energia pentru a parcruge vreuna din sugestii, ai posibilitatea să ceri ajutor specializat. Este foarte bine să cauți ajutor și să nu te dai bătut/ă niciodată. De asta există coachi, terapeuți, psihologi, etc. Totul constă &icirc;n alegere.</span></p>\n<p><span style=\"font-weight: 400;\">&Icirc;ți doresc să fii &icirc;n echilibru minte-spirit-corp, iar dacă vrei să afli mai multe, ești la un click distanță.</span></p>\n<br />\n<p><span style=\"font-weight: 400;\">Te &icirc;mbrățișez! (mai mult de 9 secunde&hellip;)</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,<br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1614700292, NULL, 'Ieșirea din șocul emoțional', 'Cu toții avem în viață momente dificile emoțional, cauzate de o pierdere sub orice formă, ce ne crează disconfort în menținerea capacității de concentrare în activitățile zilnice și pot să dăuneze în realizarea planurilor.', 'emotie,viata,soc,durere,pierdere'),
(14, 4, 1, 'Zona de confort', '<p><strong>Ce este zona de confort?</strong></p>\n<p><span style=\"font-weight: 400;\">Din toate definițiile auzite și din tot ce se speculează despre acest &ldquo;paradis&rdquo;, am tras concluzia că majoritatea oamenilor trăiesc toată viața acolo bine merci. Bine&icirc;nțeles, cu prețul destul de mare, acela de a fi condus de frică și de a fi un pilon al societății și al propriilor g&acirc;nduri care nici nu le aparțin.</span></p>\n<p><span style=\"font-weight: 400;\">Zona de confort are legătură cu tot ce &icirc;nseamnă inacțiune, stagnare, am&acirc;nare, indecizie și lista poate continua. Reprezintă punctul culminant al fricii, este indusă de stadiul de supraviețuire, ceea ce face ca partea din creier, de altfel prima dezvoltată la reptile , creierul reptilian, să aibe intenția de a ne proteja de pericole.</span></p>\n<p><span style=\"font-weight: 400;\">Acest creier reptilian, denumit și creierul limbic, sau creierul &ldquo;instinctiv&rdquo;, reprezintă cea mai veche parte a creierului nostru, de aici izvorăsc comportamentele instinctive, animalice aș putea spune: supraviețuire, alimentație, sex, sete. Tot &icirc;n acest creier avem și emoțiile care izbucnesc precum un vulcan: furia, frica, excitația.</span></p>\n<p><span style=\"font-weight: 400;\">Fiind partea din creier care ne-a protejat de la &icirc;nceputurile evoluției, are rolul de a ne menține obișnuiți cu familiarul, cunoscutul, locurile și acțiunile ce ne țin acolo la loc călduț.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">C&acirc;nd ambientul dispare și apare ceva necunoscut din toate cele enumerate, apare starea de rău, boală și disconfort la toate nivelurile, deoarece creierului reptilian nu &icirc;i place schimbarea, &icirc;i este frică de necunoscut și ne persecută, sabotează, c&acirc;nd vrem să facem ceva diferit. El dorește să existe ceea ce a fost mereu, fără tentative de evoluție.</span></p>\n<p><strong>Cum ne afectează?</strong></p>\n<p><span style=\"font-weight: 400;\">Depinde c&acirc;t devenim de conștienți, dar de afectat ne afectează.</span></p>\n<p><span style=\"font-weight: 400;\">De ce unii oameni se lasă de un sport la scurt timp după ce se apucă?</span></p>\n<p><span style=\"font-weight: 400;\">De ce ne unii oameni se apucă de diete fantastice ce nu reușesc să le termine niciodată?</span></p>\n<p><span style=\"font-weight: 400;\">De ce unii oameni suferă relații abuzive cel puțin emoțional &icirc;nsă nu pun capăt relației?</span></p>\n<p><span style=\"font-weight: 400;\">Și lista poate continua, gravitatea menținerii &icirc;n zona de confort ca individ, are multe laturi, mai ales &icirc;n sfera personală. C&acirc;nd vorbim de echilibrul unei familii și de alegeri, decizii, totul este c&acirc;ntărit prin reptilian &icirc;nt&acirc;i, &icirc;n loc să mai folosim și creierul rațional. Argumentele venite din minte, &icirc;n momentul luării unei decizii inconfortabile pentru reptilian, sunt at&acirc;t de multe și at&acirc;t de plauzibile &icirc;nc&acirc;t un om renunță imediat, se calcă pe sine at&acirc;t de ușor...</span></p>\n<p><strong>Cum să ieși din zona de confort?</strong></p>\n<p><span style=\"font-weight: 400;\">A ieși din zona de confort necesită pregătire. Este necesar să &icirc;i dăm creierului informație, dar asta nu &icirc;nseamnă că te poți lungi la infinit cu alegerea. După ce ne alimentăm creierul cu informație, fie dintr-o carte, video, curs, coaching, sau orice lucru ce are legatură cu acel obiectiv, urmează partea de introspecție. Mai exact, să ne adunăm cu noi, preferabil cu pix și foaie, divizăm foaia &icirc;n două categorii: Ce beneficii am dacă răm&acirc;n unde sunt acum / Ce beneficii am dacă fac acțiunea nouă.</span></p>\n<p><span style=\"font-weight: 400;\">De aici urmează partea mea favorită. Acțiunea. Cu toate vocile din cap, cu toată frica și anxietatea, mergi către obiectivul tău. &Icirc;n timp ce parcurgi acțiunea, reptilianul va &icirc;ncerca să te aducă la nivelul inițial, așadar recomand ca foaia divizată să &icirc;și aibă locul la vedere, pe frigider, &icirc;n mașină, pe telefon, oriunde. Făc&acirc;nd asta, vei prinde &icirc;ncredere &icirc;n tine pe zi ce trece, av&acirc;nd totul la vedere și mai ales, vei simți cum e să ai rezultate din curajul de a fi diferit.</span></p>\n<p><span style=\"font-weight: 400;\">Te &icirc;mbrățișez (mai mult de 9 secunde...)</span></p>\n<p><span style=\"font-weight: 400;\">Cu drag,</span><span style=\"font-weight: 400;\"><br /></span><span style=\"font-weight: 400;\">Aura M.</span></p>', 1615635496, NULL, 'Zona de confort', 'Zona de confort are legătură cu tot ce înseamnă inacțiune, stagnare, amânare, indecizie și lista poate continua. Reprezintă punctul culminant al fricii, este indusă de stadiul de supraviețuire, ceea ce face ca partea din creier, de altfel prima dezvoltată la reptile , creierul reptilian, să aibe intenția de a ne proteja de pericole.', 'frica,minte,viata,confort,teama,curaj');

-- --------------------------------------------------------

--
-- Table structure for table `et_article_categories`
--

CREATE TABLE `et_article_categories` (
  `id_article_category` int(11) NOT NULL,
  `title_ro` varchar(200) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_article_categories`
--

INSERT INTO `et_article_categories` (`id_article_category`, `title_ro`, `inserted_at`, `updated_at`) VALUES
(1, 'Familie', 1603131286, NULL),
(2, 'Viață', 1603054800, 1604054469),
(3, 'Inspirație', 1603054800, 1604054481),
(4, 'Minte', 1603131303, NULL),
(5, 'Corp', 1603131307, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_configs`
--

CREATE TABLE `et_configs` (
  `title` varchar(200) NOT NULL,
  `value` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_configs`
--

INSERT INTO `et_configs` (`title`, `value`) VALUES
('email', 'contact@elletherapy.ro'),
('industries_per_row__lg', '2'),
('industries_per_row__md', '2'),
('industries_per_row__xl', '3'),
('phone_romania', '0752 415 127'),
('phone_moldova', '+373 79084963');

-- --------------------------------------------------------

--
-- Table structure for table `et_contact_forms`
--

CREATE TABLE `et_contact_forms` (
  `id_contact_form` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `inserted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_contact_forms`
--

INSERT INTO `et_contact_forms` (`id_contact_form`, `name`, `email`, `phone`, `message`, `inserted_at`) VALUES
(6, 'Gigi Burlacu', 'gogibro@gmail.com', '0743 033 393', 'Îmi place site-ul, simplu, dar practic şi la obiect! Îmi permit un mic sfat: din punct de vedere psihologic, ca fundal al site-ului, culorile calde, dar nu opulente numaidecât, eventual nuanţe palide, sunt mult mai eficiente, pozitive, optimiste şi mai plăcute ochiului, implicit psihicului. ', 1614027225),
(7, 'Diaconescu Anna', 'diaconescuanna25@gmail.com', '078212189', '', 1616275998),
(8, 'Liviu', 'liviu.homescu14@gmail.com', '0723049798', 'Super!', 1616527485),
(9, 'Țapelea Ligia Elena', 'ligia.tapelea@gmail.com', '0763648723', 'Inscriere', 1616538682),
(10, 'Tanasescu Valentin', 'arsavinwallentyn@gmail.com', '0757 201 412', 'Multumesc voua :)', 1623678055);

-- --------------------------------------------------------

--
-- Table structure for table `et_event_groups`
--

CREATE TABLE `et_event_groups` (
  `id_meeting` int(11) NOT NULL,
  `title_ro` varchar(250) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `et_event_meetings`
--

CREATE TABLE `et_event_meetings` (
  `id_meeting` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `slug_ro` varchar(250) NOT NULL,
  `title_ro` varchar(250) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_event_meetings`
--

INSERT INTO `et_event_meetings` (`id_meeting`, `id_group`, `slug_ro`, `title_ro`, `inserted_at`, `updated_at`) VALUES
(1, 0, 'cine-nu-te-place-de-fapt-te-iubeste', 'Cine nu te place, de fapt te iubește', 1626642000, 1626712064);

-- --------------------------------------------------------

--
-- Table structure for table `et_event_promo_discounts`
--

CREATE TABLE `et_event_promo_discounts` (
  `id_discount` int(11) NOT NULL,
  `id_meeting` int(11) DEFAULT NULL,
  `slug_ro` varchar(250) NOT NULL,
  `title_ro` varchar(250) NOT NULL,
  `text_ro` text NOT NULL,
  `seo_title_ro` varchar(50) NOT NULL,
  `seo_description_ro` text NOT NULL,
  `seo_keywords_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_event_promo_discounts`
--

INSERT INTO `et_event_promo_discounts` (`id_discount`, `id_meeting`, `slug_ro`, `title_ro`, `text_ro`, `seo_title_ro`, `seo_description_ro`, `seo_keywords_ro`, `inserted_at`, `updated_at`) VALUES
(1, 1, '10-la-terapie-individuala', '10% la terapie individuala', '<h4>Adaugă-ți email-ul pentru reducerea de 10%</h4>\nScrie-ți adresa de email pe care te contactez', '10% la terapie individuala', 'Adaugă-ți email-ul pentru reducerea de 10%.\nScrie-ți adresa de email pe care te contactez.', 'webinar,tombola,terapie,gratis', 1626790587, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_event_promo_discount_joins`
--

CREATE TABLE `et_event_promo_discount_joins` (
  `id_join` int(11) NOT NULL,
  `id_discount` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_event_promo_discount_joins`
--

INSERT INTO `et_event_promo_discount_joins` (`id_join`, `id_discount`, `email`, `inserted_at`, `updated_at`) VALUES
(1, 1, 'contact@melena.ro', 1626790833, NULL),
(2, 1, 'cimpoesu.catalina11@gmail.com', 1626793050, NULL),
(3, 1, 'imagorunxyz@gmail.com', 1626793121, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_event_promo_raffles`
--

CREATE TABLE `et_event_promo_raffles` (
  `id_raffle` int(11) NOT NULL,
  `id_meeting` int(11) DEFAULT NULL,
  `winner` int(11) DEFAULT NULL,
  `slug_ro` varchar(250) NOT NULL,
  `title_ro` varchar(250) NOT NULL,
  `text_ro` text NOT NULL,
  `seo_title_ro` varchar(50) NOT NULL,
  `seo_description_ro` text NOT NULL,
  `seo_keywords_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_event_promo_raffles`
--

INSERT INTO `et_event_promo_raffles` (`id_raffle`, `id_meeting`, `winner`, `slug_ro`, `title_ro`, `text_ro`, `seo_title_ro`, `seo_description_ro`, `seo_keywords_ro`, `inserted_at`, `updated_at`) VALUES
(1, 1, 22, 'terapie-individuala-gratis', 'Terapie individuala gratis', '<h4>Adaugă-ți datele pentru a participa la extragere</h4>\r\nPentru a te contacta, nu uita de <span style=\"text-decoration: underline;\">telefon</span> sau <span style=\"text-decoration: underline;\">email</span>', 'Terapie individuala gratis', 'Scrie-ți adresa de email pe care te contactez dacă vei fi norocosul câștigător', 'webinar,tombola,terapie,gratis', 1626642000, 1684747962);

-- --------------------------------------------------------

--
-- Table structure for table `et_event_promo_raffle_joins`
--

CREATE TABLE `et_event_promo_raffle_joins` (
  `id_join` int(11) NOT NULL,
  `id_raffle` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_event_promo_raffle_joins`
--

INSERT INTO `et_event_promo_raffle_joins` (`id_join`, `id_raffle`, `name`, `phone`, `email`, `inserted_at`, `updated_at`) VALUES
(2, 1, 'Arsavin', '0757 201 412', 'arsavinwallentyn+1@gmail.com', 1626786929, NULL),
(4, 1, 'Melena', '', 'contact@melena.ro', 1626789182, NULL),
(5, 1, 'Valentin Tanasescu', '', 'valentin_tanasescu_888@yahoo.com', 1626792319, NULL),
(8, 1, 'Strugariu Denisa', '', 'strugariudenisa@yahoo.com', 1626793029, NULL),
(9, 1, 'Cimpoesu', '', 'cimpoesu.catalina11@gmail.com', 1626793043, NULL),
(15, 1, 'Valentin ISB', '', 'valentin@iscreambrands.ro', 1627311462, NULL),
(21, 1, 'Valentin Tănăsescu', '0757 201 412', 'arsavinwallentyn+4@gmail.com', 1627389374, 1627391069),
(22, 1, 'AURELIA-ELENA XYZ', '40752415127', 'imagorunxyz@gmail.com', 1627395090, 1627395225);

-- --------------------------------------------------------

--
-- Table structure for table `et_form_appointments`
--

CREATE TABLE `et_form_appointments` (
  `id_appointment` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `id_service` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `message` text NOT NULL,
  `inserted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_form_appointments`
--

INSERT INTO `et_form_appointments` (`id_appointment`, `firstname`, `lastname`, `email`, `phone`, `id_service`, `date`, `message`, `inserted_at`) VALUES
(1, 'Valentin', 'Tanasescu', 'arsavinwallentyn@gmail.com', '0757 201 412', 3, 1624654800, '', 1623608161),
(2, 'Valentin', 'Tanasescu', 'arsavinwallentyn@gmail.com', '0757 201 412', 1, 1624741200, '', 1623678918),
(3, 'Cristi', 'Fonea', 'cristifonea@gmail.com', '762944890', 3, 1624482000, 'Ard de nerabdare sa descopar cum ma poate ajuta un coaching individual!', 1623704400),
(4, 'Cosmin', 'T?t?ru?anu ', 'cosmint7@yahoo.com', '0753905800', 3, 1623704400, 'Da', 1623748549),
(5, 'Jsjsbshaj', 'Ksjsjsik', 'cosmint7@gmail.com', '0753905800', 3, 1623704400, 'Iaisjsj', 1623749733);

-- --------------------------------------------------------

--
-- Table structure for table `et_identity_logos`
--

CREATE TABLE `et_identity_logos` (
  `id_logo` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_identity_logos`
--

INSERT INTO `et_identity_logos` (`id_logo`, `visible`, `inserted_at`, `updated_at`) VALUES
(1, 1, 1618002000, 1626353980);

-- --------------------------------------------------------

--
-- Table structure for table `et_industries`
--

CREATE TABLE `et_industries` (
  `id_industry` int(11) NOT NULL,
  `order` smallint(4) NOT NULL DEFAULT 0,
  `title_ro` varchar(100) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_industries`
--

INSERT INTO `et_industries` (`id_industry`, `order`, `title_ro`, `inserted_at`, `updated_at`) VALUES
(1, 2, 'Terapie', 1598043600, 1618307996),
(2, 4, 'Coaching', 1602882000, 1618308011),
(3, 3, 'NLP', 1618303728, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_industry_characteristics`
--

CREATE TABLE `et_industry_characteristics` (
  `id_characteristic` int(11) NOT NULL,
  `order` smallint(4) NOT NULL DEFAULT 0,
  `id_industry` int(11) NOT NULL,
  `hidden` int(11) NOT NULL DEFAULT 0,
  `text_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_industry_characteristics`
--

INSERT INTO `et_industry_characteristics` (`id_characteristic`, `order`, `id_industry`, `hidden`, `text_ro`, `inserted_at`, `updated_at`) VALUES
(4, 3, 1, 0, 'Facilităm dezvoltarea corectă a personalității.', 1597006800, 1618335122),
(5, 5, 2, 0, 'Ne axăm pe sarcini și obiective concrete.', 1597006800, 1618312863),
(6, 8, 1, 1, 'Lucrăm împreună la dezechilibrele psiho-fizice.', 1597006800, 1618335045),
(7, 4, 2, 0, 'Sprijin o persoană care învață în realizarea unui obiectiv personal sau profesional concret.', -7200, 1618313063),
(10, 10, 2, 1, 'Rezolv deficiențe de comunicare.', 1604613600, 1618313053),
(11, 2, 2, 0, 'Hai să-ți creștem încrederea în tine și modul de abordare a conflictelor.', 1604613600, 1618313029),
(12, 9, 2, 1, 'Ajută în depășirea unei stări de anxietate.', 1604613600, 1618336746),
(13, 7, 2, 1, 'Te ghidez în eliminarea unei dependențe.', 1604613600, 1618336390),
(14, 9, 3, 0, 'NLP-ul te ajută să descoperi ce este în mintea ta.', 1618308077, NULL),
(18, 2, 1, 0, 'Ajută în rezolvarea deficiențelor de comunicare.', 1618261200, 1618336770),
(19, 1, 1, 0, 'Identificăm traumele din copilărie sau cele formate pe perioada adultă.', 1618313186, NULL),
(20, 7, 1, 1, 'Ajută în alinierea cu copilul interior.', 1618261200, 1618336731),
(21, 6, 1, 1, 'Te sprijin în cazul dezechilibrelor psiho-somatice.', 1618313257, NULL),
(22, 5, 1, 1, 'Facem exerciții pentru dezvoltarea sănătoasă a personalității adolescentului.', 1618330468, NULL),
(23, 4, 1, 0, 'Te sprijin în depășirea evenimentelor cu impact emoțional puternic: deces, divorț, separare, etc.', 1618330569, NULL),
(24, 18, 3, 1, 'Te ghidez în rezolvarea problemelor interioare.', 1618335296, NULL),
(25, 16, 3, 1, 'Ajută să-ți crești stima de sine.', 1618261200, 1618336792),
(26, 15, 3, 1, 'Implementăm noi obiective / credințe ca și stil de viață.', 1618335352, NULL),
(27, 14, 3, 1, 'Înțelegem mai bine lumea exterioară.', 1618335381, NULL),
(28, 11, 3, 0, 'Îți ofer suport pentru stresul post traumatic.', 1618335399, NULL),
(29, 12, 3, 0, 'Lucrăm la eliminarea unei fobii.', 1618335415, NULL),
(30, 17, 3, 1, 'Apelăm la hipnoză atunci când te-ar ajuta.', 1618335461, NULL),
(31, 10, 3, 0, 'Ne focusăm pe schimbarea stărilor emoționale cu efect rapid.', 1618335484, NULL),
(32, 13, 3, 0, 'Instalăm o relaxare generală sănătoasă.', 1618335528, NULL),
(33, 8, 2, 1, 'Îmbinăm tehnicile de NLP și Hipnoză în procesul tău de susținere.', 1618335649, NULL),
(34, 6, 2, 1, 'Te ghidez în stabilirea unor obiective clare și a unui plan de acțiune.', 1618335682, NULL),
(35, 3, 2, 0, 'Dezvoltăm autocunoașterea prin întrebări potrivite care să pornească procesul de conexiuni / revelații.', 1618335718, NULL),
(36, 9, 1, 1, 'Folosim tehnici de psiho-analiză mereu când este cazul.', 1618335784, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_interesting`
--

CREATE TABLE `et_interesting` (
  `id_interesting` int(11) NOT NULL,
  `order` smallint(4) NOT NULL DEFAULT 0,
  `text_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_interesting`
--

INSERT INTO `et_interesting` (`id_interesting`, `order`, `text_ro`, `inserted_at`, `updated_at`) VALUES
(1, 3, 'M-am &icirc;ntreținut singură toată viața și ce am acum erau c&acirc;ndva vise', 1597006800, 1638269498),
(2, 2, '<span style=\"font-weight: 400;\">&Icirc;mi place să-mi creez hobby-uri. Precum să dansez, să &icirc;not, să pictez</span>', 1597006800, 1638269490),
(3, 1, '<span style=\"font-weight: 400;\">Am &icirc;nceput &icirc;n 2013 să renunț la TV definitiv și să creez armonie completă &icirc;n cămin</span>', 1597006800, 1638269384),
(4, 4, '<span style=\"font-weight: 400;\">Am &icirc;nceput să citesc de c&acirc;nd aveam 8 ani cărți pe care nu le &icirc;nțelegeam dar mă fascinau deoarece erau din domeniul Psihologiei clinice</span>', 1597006800, 1638269483);

-- --------------------------------------------------------

--
-- Table structure for table `et_media`
--

CREATE TABLE `et_media` (
  `id_media` int(11) NOT NULL,
  `src` varchar(200) NOT NULL,
  `title_ro` varchar(200) NOT NULL,
  `description_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_media`
--

INSERT INTO `et_media` (`id_media`, `src`, `title_ro`, `description_ro`, `inserted_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/embed/J5Q6gt5LH80', 'Rănile din copilărie - Rana de nedreptate', '<p>Masca unei persoane care suferă de această rană este cea a rigidului.</p>\n<p>Un rigid &icirc;ncearcă mereu să pară plin de energie chiar și atunci c&acirc;nd este obosit. Admite greu că are vreo dificultate sau că &icirc;l deranjează ceva. Dacă perfecțiunea &icirc;i este pusă la &icirc;ndoială poate &icirc;ncerca să &icirc;i controleze pe ceilalți pentru a se apăra. Rigidul nu vrea să simtă. Cu greu &icirc;și manifestă sentimentele pentru că nu știe să &icirc;și manifeste sensibilitatea.</p>\n<p>La această persoană totul trebuie să fie corect, justificat și explicabil.</p>', 1603227600, 1604309928),
(2, 'https://www.youtube.com/embed/WpGyQYmS8QQ', 'Rănile din copilărie - Rana de trădare', '<p>Masca unei persoane care suferă de această rană este cea a controlantului.</p>\n<p>Această persoană face totul pentru a-i convinge pe ceilalți de forța personalității sale. Are nevoie ca ceilalți să știe c&acirc;t este de puternic. Crede ca a fi responsabil &icirc;nseamnă a fi șef, are nevoie ca ceilalți să &icirc;l trateze responsabil. Reputația este foarte importantă pentru el și dacă și-o simte amenințată este gata să o distrugă pe a celui care i-o pune &icirc;n pericol. Nu are &icirc;ncredere &icirc;n cei de sex opus.<br /><br />Mai multe &icirc;n video.</p>', 1603227600, 1604321862),
(3, 'https://www.youtube.com/embed/km-Qk79DQkk', 'Rănile din copilărie - Rana de umilință', '<p>Masca unei persoane care suferă de această rană este cea a masochistului. Se manifestă des prin frică. Are mereu senzația că Dumnezeu (sau &icirc;n ce formă spirituală crede) &icirc;l judecă permanent. Face orice pentru a se arăta demn &icirc;n fața celorlalți, face acțiuni prin care să arate cum &icirc;i servește pe cei la care ține, pun&acirc;ndu-i pe primul plan, &icirc;naintea sa.</p>\n<p>Refuză să &icirc;și recunoască senzualitatea și plăcerile pe care care acestea i le oferă. De obicei &icirc;și reprimă libertatea.<br /><br />Mai multe &icirc;n video.</p>', 1603227600, 1604329160),
(4, 'https://www.youtube.com/embed/eSGjBEur_ok', 'Rănile din copilărie - Rana de abandon', '<p>Masca unei persoane care suferă de această rană este cea a dependentului.</p>\n<p>Pe această persoană singurătatea o &icirc;nspăim&acirc;ntă, caută &icirc;ntotdeauna prezența și afecțiunea altora. &Icirc;și provoacă inconștient boli sau situații dramatice doar pentru a atrage atenția și mila celorlalți. Manipulează ușor oamenii, pătrunde &icirc;n emoțiile lor doar pentru a atrage atenția asupra sa.</p>\n<p>Crede că dacă cineva este de acord cu părerea sa, aceasta este o dovadă de dragoste.</p>\n<p>Mai multe &icirc;n video.</p>', 1603227600, 1604321892),
(5, 'https://www.youtube.com/embed/fObtmlW8BbA', 'Rănile din copilărie - Rana de respingere', '<p>Masca unei persoane care suferă de această rană este cea a fugarului.</p>\n<p>Fugarul crede profund că nu valorează nimic , este mereu nemulțumit de ceea ce reprezintă ca om.</p>\n<p>Are foarte puțină stimă de sine, se simte deseori singur, ne&icirc;nțeles.</p>\n<p>Are multe modalități de fugă precum: jocuri virtuale, alcool, droguri, somn, etc.</p>\n<p>Mai multe &icirc;n video.</p>', 1604268000, 1604329256);

-- --------------------------------------------------------

--
-- Table structure for table `et_nlp_faqs`
--

CREATE TABLE `et_nlp_faqs` (
  `id_faq` int(11) NOT NULL,
  `order` smallint(4) NOT NULL DEFAULT 0,
  `question_ro` varchar(200) NOT NULL,
  `answer_ro` text NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_nlp_faqs`
--

INSERT INTO `et_nlp_faqs` (`id_faq`, `order`, `question_ro`, `answer_ro`, `visible`, `inserted_at`, `updated_at`) VALUES
(1, 0, 'NLP-ul poate ajuta o persoană care se confruntă cu anxietatea și depresia?', 'Bine&icirc;nțeles. NLP-ul ne pune la dispoziție foarte multe tehnici ce pot fi folosite de către orice om imediat după sesiunea &icirc;n sine. Totul este despre autocontrol. Cu c&acirc;t cineva exersează mai mult ceea ce a &icirc;nvățat &icirc;n urma unei sesiuni, cu at&acirc;t efectele apar mai rapid. NLP devine stil de viață pentru cei ce doresc vindecare.', 1, 1611678113, NULL),
(2, 0, 'Este NLP o variantă dacă vreau să devin milionar?', 'NLP este o metodă prin care te reconstruiești &icirc;n varianta ta nouă, cea care vrei să fii, iar dacă vrei să fii milionar, cu siguranță ai nevoie de atitudine de milionar iar apoi de acțiuni repetate și un <em>mind set</em> pregătit și adaptat dorinței din interior, așadar, NLP te ajută să menții atitudinea și perseverenta &icirc;n acțiunile tale zilnice care peste un timp specific te aduc față &icirc;n față cu acel vis, dacă e relevant pentru spirit și minte :)', 1, 1611678132, NULL),
(3, 0, 'De la ce vine cuvântul NLP? Ajută NLP-ul și în domeniul business-ului?', 'NLP = neuro - linguistic - programming (PROGRAMARE NEURO - LINGVISTICĂ) reprezintă un ansamblu de tehnici create de Richard Bandler și John Grinder, &icirc;n anii 1970, &icirc;n California, Statele Unite.<br />Da, ajută &icirc;n orice segment al vieții, spre exemplu una din aplicațiile &icirc;n business este determinată de succesul &icirc;n colaborarea de echipă, &icirc;mbunătățirea comunicării dintre departamente și &icirc;ndeplinirea obiectivelor companiei cu succes.', 1, 1611678147, NULL),
(4, 0, 'NLP poate dăuna persoanelor cu boli psihice?', 'NLP nu dăunează grav sănătății nimănui pentru că nu este un medicament și nu reprezintă o modificare a patologiei creierului. Acesta acționează natural din propria voință și &icirc;n propriul control al persoanei care dorește să exploreze prin NLP.&nbsp;<br />NLP este o călătorie &icirc;n interior, nu este o alterate a e-ului și nici nu reprezintă un risc pentru persoanele afectate psihic.', 1, 1611678159, NULL),
(5, 0, 'De ce se zice că NLP este manipulare?', 'Simplu, pentru că rezultatele NLP și &icirc;ntrebările neașteptate pe care o persoană le primește &icirc;n timpul tranșei, sunt nemai&icirc;nt&acirc;lnite pentru necunoscători. Tot ce este benefic pentru calitatea vieții, este privit de către oamenii care sunt &icirc;n frică constantă, ceva rău, ceva interzis, că așa au fost inspirați de religie de-a lungul vieții și de societate. Tot ce e nou e de speriat și tot ce e benefic e interzis. Cei care aleg să iasă din zona de confort, sunt ghidați de curaj și dorința de vindecare mai mare.<br />Suntem diferiți și unici iar dacă conștientizăm că răspunsurile sunt &icirc;n NOI, NLP devine relevant.', 1, 1611678318, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `et_services`
--

CREATE TABLE `et_services` (
  `id_service` int(11) NOT NULL,
  `order` smallint(4) NOT NULL DEFAULT 0,
  `title_ro` varchar(200) NOT NULL,
  `price_ro` varchar(200) NOT NULL,
  `description_ro` text NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `has_page` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_services`
--

INSERT INTO `et_services` (`id_service`, `order`, `title_ro`, `price_ro`, `description_ro`, `inserted_at`, `updated_at`, `visible`, `has_page`) VALUES
(1, 3, 'Coaching de grup (business)', '100€/sesiune', '<span style=\"font-weight: 400;\">Daca ești manager, administrator sau team leader-ul din compania ta, este bine să știi că acest tip de coaching de grup ajută la transformarea angajaților din colegi standard, cu un grad de competiție negativă, &icirc;n colegi de echipă cu păstrarea unui grad de competiție pozitivă care să motiveze și nu să denigreze. De asemenea ajută la definirea scopului comun al angajaților, la stabilirea obiectivelor către succesul la care aspiră politica firmei și de asemenea contribuie la schimbarea mindset-ului angajaților. Totul se desfășoară prin jocuri, tehnici și subiecte interesante care au loc &icirc;ntr-un cadru vesel și relaxant cu toți membrii echipei implicați &icirc;n departamentul dorit.</span>', 1603054800, 1612722777, 1, 0),
(2, 2, 'Coaching de familie', '100€/sesiune', '<span style=\"font-weight: 400;\">Este o metodă magnifică de a vă cunoaște membrii familiei mult mai bine, de a socializa la alt nivel, de a rezolva conflictele prin propriile alegeri raționale. De asemenea ajută la restabilirea legăturilor emoționale pierdute de-a lungul timpului &icirc;n familie. Pot participa at&acirc;t copiii c&acirc;t și adulții.</span>', 1603054800, 1612722670, 1, 0),
(3, 1, 'Coaching individual', '100€/2 sesiuni (1 + 1 gratis)', '<span style=\"font-weight: 400;\">Clientul alege ce obiective are de &icirc;ndeplinit iar coach-ul, prin tehnici specifice și prin gradul său de pregătire, &icirc;l ghidează către soluțiile potrivite pe care acesta le furnizează coach-ului, pe măsură ce trece prin proces. Este foarte important de știut de la &icirc;nceput că toate soluțiile sunt &icirc;n mintea clientului și că acesta este ajutat să le descopere. De exemplu, eu folosesc NLP de fiecare dată &icirc;n interacțiunile cu clienții deoarece ajută enorm &icirc;n procesul de relaxare inițial.<br /><br />&Icirc;n <strong>Coaching-ul individual</strong> eu lucrez cu tehnici de NLP și hipnoză.<br />Este ceea ce iubesc și &icirc;nvăț continuu pentru a mă perfecționa.<br />Orice tehnică NLP este magnifică, simplă și eficientă, oferă rezultate incredibile pentru orice client.<br /><br />Așadar, &icirc;ntr-o sesiune de o oră, clientul beneficiază de ascultare activă obligatoriu și &icirc;n funcție de nevoile sale, se aleg variantele de tehnici NLP sau hipnoză create și adaptate pentru acel client, pentru nevoile și obiectivele sale.<br /><br />Prețul de 100 &euro; include 1 oră + 1 gratuită.&nbsp;<br />Așadar 2 sesiuni (online sau live), de 1 oră fiecare, la prețul menționat.<br /></span>', 1603054800, 1613002561, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `et_social_media`
--

CREATE TABLE `et_social_media` (
  `id_media` int(11) NOT NULL,
  `order` smallint(4) NOT NULL DEFAULT 0,
  `link` varchar(200) NOT NULL,
  `text_ro` varchar(200) NOT NULL,
  `inserted_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_social_media`
--

INSERT INTO `et_social_media` (`id_media`, `order`, `link`, `text_ro`, `inserted_at`, `updated_at`) VALUES
(1, 0, 'https://www.linkedin.com/', 'Urmărește-mi activitatea profesională', 1603749600, 1604148477),
(2, 0, 'https://www.instagram.com/', 'Aici pun poze din timpul meu liber', 1603749600, 1604148461),
(3, 0, 'https://www.facebook.com/www.melena.ro', 'Află noutăți de pe pagina mea', 1603749600, 1621178411);

-- --------------------------------------------------------

--
-- Table structure for table `et_validations_cms`
--

CREATE TABLE `et_validations_cms` (
  `error` varchar(100) NOT NULL,
  `vars` int(3) DEFAULT 0,
  `ro` mediumtext NOT NULL,
  `message_ro` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_validations_cms`
--

INSERT INTO `et_validations_cms` (`error`, `vars`, `ro`, `message_ro`) VALUES
('file', 1, '', ''),
('files', 1, '', ''),
('image', 1, '', ''),
('small_image_width', 3, '', ''),
('small_image_height', 3, '', ''),
('required', 0, '', 'Camp obligatoriu'),
('requiredFile', 0, '', 'Fisier obligatoriu'),
('requiredFiles', 0, '', 'Fisiere obligatorii'),
('int', 0, '', 'Doar numere permise'),
('min', 2, '', '({$1}) Numarul minim permis este {$2}'),
('max', 2, '', '({$1}) Numarul maxim permis este {$2}'),
('minLength', 2, '', '({$1}) Numarul minim de caractere permis este {$2}'),
('length', 2, '', '({$1}) Trebuie sa fie {$2} caractere'),
('maxLength', 2, '', '({$1}) Numarul maxim de caractere permis este {$2}'),
('regex', 0, '', 'Formatul nu este corect'),
('url', 0, '', 'URL invalid'),
('alphaNumeric', 0, '', 'Doar cifre si litere acceptate'),
('letters', 0, '', 'Doar litere acceptate'),
('numeric', 0, '', 'Doar numere permise'),
('float', 0, '', 'Doar numere rationale permise'),
('array', 0, '', 'Doar liste sunt permise'),
('inArray', 1, '', 'Doar aceste valori sunt permise: {$1}'),
('notInArray', 1, '', 'Aceste valori nu sunt permise: {$1}'),
('minCount', 1, '', 'Trebuie selectate minim {$1}'),
('count', 1, '', 'Trebuie selectate {$1}'),
('maxCount', 1, '', 'Trebuie selectate maxim {$1}'),
('email', 0, '', 'Email invalid'),
('date', 0, '', 'Data invalida'),
('dateMultiple', 1, '', 'Aceste date sunt invalide: {$1}'),
('distinct', 0, '', 'Valorile listei trebuie sa fie unice'),
('match', 1, '', 'Trebuie sa aiba aceeasi valoarea ca {$1}'),
('notMatch', 1, '', 'Nu trebuie sa aiba aceeasi valoarea ca {$1}'),
('dbExists', 0, '', 'Nu exista in baza de date'),
('dbUnique', 0, '', 'Exista deja in baza de date'),
('dbLike', 0, '', 'Nu exista in baza de date'),
('dbNotLike', 0, '', 'Exista in baza de date'),
('notEqual', 0, '', 'Aceasta valoare nu este permisa'),
('cnp', 0, '', 'CNP invalid'),
('json', 0, '', 'JSON invalid'),
('exceeded_php_size', 0, '', 'Fisierul depaseste marimea maxima stabilita de server'),
('exceeded_html_size', 0, '', 'Fisierul depaseste marimea maxima stabilita de browser'),
('partially_uploaded', 0, '', 'Fisier incarcat doar partial'),
('no_file', 0, '', 'Niciun fisier incarcat'),
('missing_tmp_folder', 0, '', 'Folder-ul temporar lipseste de pe server'),
('error_writing_disk', 0, '', 'Eroare in scrierea fisierului pe disk'),
('php_extension_problem', 0, '', 'Fisierul nu s-a putut incarca din cauza altei extensii de php'),
('small_file_size', 3, '', 'Marimea fisierului ({$1}) este prea mica: {$2}. Minim {$3}'),
('big_file_size', 3, '', 'Marimea fisierului ({$1}) este prea mare: {$2}. Maxim {$3}'),
('small_image', 3, '', 'Imaginea ({$1}) este prea mica: {$2}. Minim {$3}'),
('no_image_type', 0, '', 'Fisierul nu este de tip imagine');

-- --------------------------------------------------------

--
-- Table structure for table `et_validations_site`
--

CREATE TABLE `et_validations_site` (
  `error` varchar(100) NOT NULL,
  `vars` int(3) DEFAULT 0,
  `ro` mediumtext NOT NULL,
  `en` mediumtext NOT NULL,
  `message_ro` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_validations_site`
--

INSERT INTO `et_validations_site` (`error`, `vars`, `ro`, `en`, `message_ro`) VALUES
('file', 1, '', '', ''),
('files', 1, '', '', ''),
('image', 1, '', '', ''),
('small_image_width', 3, '', '', ''),
('small_image_height', 3, '', '', ''),
('required', 0, '', '', 'Camp obligatoriu'),
('requiredFile', 0, '', '', 'Fisier obligatoriu'),
('requiredFiles', 0, '', '', 'Fisiere obligatorii'),
('int', 0, '', '', 'Doar numere permise'),
('min', 2, '', '', '({$1}) Numarul minim permis este {$2}'),
('max', 2, '', '', '({$1}) Numarul maxim permis este {$2}'),
('minLength', 2, '', '', '({$1}) Numarul minim de caractere permis este {$2}'),
('length', 2, '', '', '({$1}) Trebuie sa fie {$2} caractere'),
('maxLength', 2, '', '', '({$1}) Numarul maxim de caractere permis este {$2}'),
('regex', 0, '', '', 'Formatul nu este corect'),
('url', 0, '', '', 'URL invalid'),
('alphaNumeric', 0, '', '', 'Doar cifre si litere acceptate'),
('letters', 0, '', '', 'Doar litere acceptate'),
('numeric', 0, '', '', 'Doar numere permise'),
('float', 0, '', '', 'Doar numere rationale permise'),
('array', 0, '', '', 'Doar liste sunt permise'),
('inArray', 1, '', '', 'Doar aceste valori sunt permise: {$1}'),
('notInArray', 1, '', '', 'Aceste valori nu sunt permise: {$1}'),
('minCount', 1, '', '', 'Trebuie selectate minim {$1}'),
('count', 1, '', '', 'Trebuie selectate {$1}'),
('maxCount', 1, '', '', 'Trebuie selectate maxim {$1}'),
('email', 0, '', '', 'Email invalid'),
('date', 0, '', '', 'Data invalida'),
('dateMultiple', 1, '', '', 'Aceste date sunt invalide: {$1}'),
('distinct', 0, '', '', 'Valorile listei trebuie sa fie unice'),
('match', 1, '', '', 'Trebuie sa aiba aceeasi valoarea ca {$1}'),
('notMatch', 1, '', '', 'Nu trebuie sa aiba aceeasi valoarea ca {$1}'),
('dbExists', 0, '', '', 'Nu exista in baza de date'),
('dbUnique', 0, '', '', 'Exista deja in baza de date'),
('dbLike', 0, '', '', 'Nu exista in baza de date'),
('dbNotLike', 0, '', '', 'Exista in baza de date'),
('notEqual', 0, '', '', 'Aceasta valoare nu este permisa'),
('cnp', 0, '', '', 'CNP invalid'),
('json', 0, '', '', 'JSON invalid'),
('exceeded_php_size', 0, '', '', 'Fisierul depaseste marimea maxima stabilita de server'),
('exceeded_html_size', 0, '', '', 'Fisierul depaseste marimea maxima stabilita de browser'),
('partially_uploaded', 0, '', '', 'Fisier incarcat doar partial'),
('no_file', 0, '', '', 'Niciun fisier incarcat'),
('missing_tmp_folder', 0, '', '', 'Folder-ul temporar lipseste de pe server'),
('error_writing_disk', 0, '', '', 'Eroare in scrierea fisierului pe disk'),
('php_extension_problem', 0, '', '', 'Fisierul nu s-a putut incarca din cauza altei extensii de php'),
('small_file_size', 3, '', '', 'Marimea fisierului ({$1}) este prea mica: {$2}. Minim {$3}'),
('big_file_size', 3, '', '', 'Marimea fisierului ({$1}) este prea mare: {$2}. Maxim {$3}'),
('small_image', 3, '', '', 'Imaginea ({$1}) este prea mica: {$2}. Minim {$3}'),
('no_image_type', 0, '', '', 'Fisierul nu este de tip imagine');

-- --------------------------------------------------------

--
-- Table structure for table `et_views_cms`
--

CREATE TABLE `et_views_cms` (
  `id_view_cms` int(11) NOT NULL,
  `source` mediumtext NOT NULL,
  `global` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT 'se/te/co/sSEO/img/imgs/ch/vd/tSEO/imgSEO',
  `info` varchar(100) NOT NULL,
  `vars` tinyint(4) NOT NULL,
  `value_ro` mediumtext NOT NULL,
  `order` int(11) NOT NULL,
  `updated_at` int(10) DEFAULT NULL,
  `selected_at` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_views_cms`
--

INSERT INTO `et_views_cms` (`id_view_cms`, `source`, `global`, `type`, `info`, `vars`, `value_ro`, `order`, `updated_at`, `selected_at`) VALUES
(1, '', 1, 1, 'route.site.story', 0, 'Povestea mea', 1, NULL, 1684748552),
(2, '', 1, 1, 'route.site.home', 0, 'Acasă', 2, NULL, 1684748552),
(4, '', 1, 1, 'route.site.blog.all', 0, 'Blog', 4, NULL, 1684748552),
(5, '', 1, 1, 'route.site.media', 0, 'Media', 5, NULL, 1684748552),
(6, '', 1, 1, 'pieces/site/industry-comparison', 0, 'Comparare industrii', 6, NULL, 1684747782),
(7, '', 1, 1, 'route.site.contact', 0, 'Contact', 7, NULL, 1684748552),
(8, '', 1, 1, 'route.site.blog.show', 0, 'Articol', 8, NULL, NULL),
(9, '', 1, 1, 'route.404.site', 0, '404', 9, NULL, 1684748552),
(13, '', 1, 1, 'route.site.nlp', 0, 'NLP', 13, NULL, 1684748552),
(14, '', 1, 1, 'route.site.legal.privacy', 0, 'Politica de confidențialitate', 14, NULL, 1684748552),
(15, '', 1, 1, 'route.site.legal.terms', 0, 'Termeni și condiții', 15, NULL, 1684748552),
(16, '', 1, 1, 'view.global', 0, 'Conținut global', 16, NULL, 1684747782),
(17, '', 1, 1, 'route.site.coaching.info', 0, 'Coaching', 17, NULL, 1684748552),
(18, '', 1, 1, 'route.site.legal.cookies', 0, 'Politica de cookies', 18, NULL, 1684748552),
(22, '', 1, 1, 'pieces/site/services', 0, 'Servicii', 22, NULL, 1684747782),
(23, '', 1, 1, 'route.site.coaching.service', 0, 'Serviciu', 23, NULL, 1684748552),
(25, '', 1, 1, 'route.site.appoint', 0, 'Programează-te', 25, NULL, 1684748552),
(40, '', 1, 1, 'crons/appointments/new.php', 0, '{{ crons/appointments/new.php }}', 40, NULL, 1684747782),
(41, '', 1, 1, 'route.404.maintenance', 0, '{{ route.404.maintenance }}', 41, NULL, 1684748552),
(42, '', 1, 1, 'crons/contacts/new.php', 0, '{{ crons/contacts/new.php }}', 42, NULL, 1684747782),
(43, '', 1, 1, 'mails/appointments/confirmation', 0, '{{ mails/appointments/confirmation }}', 43, NULL, 1684747782),
(48, '', 1, 1, 'route.site.events.promo.raffle', 0, '{{ route.site.events.promo.raffle }}', 48, NULL, 1684748552),
(49, '', 1, 1, 'route.site.events.promo.discount', 0, '{{ route.site.events.promo.discount }}', 49, NULL, 1684748552);

-- --------------------------------------------------------

--
-- Table structure for table `et_views_site`
--

CREATE TABLE `et_views_site` (
  `id_view_site` int(11) NOT NULL,
  `source` mediumtext NOT NULL,
  `global` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT 'se/te/co/sSEO/img/imgs/ch/vd/tSEO/imgSEO',
  `info` varchar(100) NOT NULL,
  `vars` tinyint(4) NOT NULL,
  `value_ro` mediumtext NOT NULL,
  `order` int(11) NOT NULL,
  `updated_at` int(10) DEFAULT NULL,
  `selected_at` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `et_views_site`
--

INSERT INTO `et_views_site` (`id_view_site`, `source`, `global`, `type`, `info`, `vars`, `value_ro`, `order`, `updated_at`, `selected_at`) VALUES
(1, 'site.home', 0, 4, 'title', 0, 'Melena Therapy', 1, 1618402056, 1685135332),
(2, 'site.home', 0, 9, 'description', 0, 'Scopul meu este să susțin oamenii care vor să afle cine sunt și caută soluții pentru ei în primul rând.', 2, 1618402056, 1685135332),
(3, 'site.home', 0, 4, 'keywords', 0, 'terapie,NLP,coaching,meditatii,psihoterapie', 3, 1618402056, 1685135332),
(4, 'site.home', 0, 5, 'banner.background', 0, '', 4, 1617878717, 1685135332),
(5, 'site.home', 0, 3, 'box.1.text', 0, '<span style=\"font-weight: 400;\">Un coach implicat va identifica care este metoda prin care să ajute orice client să ajungă la variantele potrivite și să elimine acele blocaje interioare, deoarece metoda focusată pe soluții nu dă niciodată greș, mai ales c&acirc;nd lucrezi cu oamenii din pasiune, dintr-o forță interioară dincolo de dorința de a face bani și de a fi renumit.</span>', 5, 1618402056, 1685135332),
(6, 'site.home', 0, 5, 'despre-mine.poza', 0, '', 6, 1616883205, 1685135332),
(7, 'site.home', 0, 3, 'despre-mine.descriere', 0, '<strong>Te salut!<br /></strong><br />Numele meu este Aurelia-Elena, sunt din orașul Piatra Neamț, dar locuiesc &icirc;n Suceava și Republica Moldova.<br /><br />Melena este numele meu prescurtat și totodată are legătură cu noile proiecte literare, dar despre asta voi reveni cu detalii &icirc;n cur&acirc;nd. Am diferite calificări &icirc;n Coaching precum specializarea de <span style=\"text-decoration: underline;\">Master Coach</span>, <span style=\"text-decoration: underline;\">Life Coach</span> și <span style=\"text-decoration: underline;\">Business Coach</span>. Sunt <em>formator</em> (trainer), <em>practic NLP</em> (programarea neurolingvistică a creierului), <em>hipnoză</em> și de asemenea studiez pentru certificarea de <em>Psihoterapeut</em> &icirc;n Brașov.<br /><br />Aceste titluri pentru mine nu sunt relevante, dar totuși le menționez deoarece știu că pentru unii contează. Pentru mine este relevantă propria experiență, apoi experiența cu oamenii. De-a lungul timpului am observat că &icirc;n interiorul meu s-au pus bazele unui nou obiectiv: acela de a-mi dedica viața cercetării permanente.<br /><br />Nu sunt aici pentru a vinde ceva sau pentru a convinge oamenii de ceva.<br />Sunt aici pentru a fi ghid, susținător al tinerilor și adulților care din propria inițiativă vor să simtă o continuă schimbare.<br /><br />&Icirc;mi place sa fiu discretă cu viața mea personală și de asemenea sunt discretă și c&acirc;nd vine vorba de clienții mei. P&acirc;nă &icirc;n acest moment am trecut prin diverse stagii ale vieții, precum sărăcie și bogăție, boală și sănătate, lipsuri emoționale și vindecare pe acest plan. Nu sunt naivă, dar cred &icirc;n oameni &icirc;n continuare. <strong>Cred &icirc;n puterea din TINE</strong> și &icirc;n capacitatea ta de a-ți &icirc;mbunătăți calitatea vieții.<br /><br />Respect copiii și adolescenții la fel cum respect un adult.<br /><br />Am &icirc;nceput călătoria spre mine acum 8 ani. De atunci s-au schimbat multe.<br /><br />Tu c&acirc;t de pregătit te simți?<br /><br />&Icirc;ți mulțumesc pentru prezența pe acest site.<br />Te &icirc;mbrățișez !<br />Mai mult de 9 secunde<br /><br />Melena', 7, 1618402056, 1685135332),
(8, 'site.home', 0, 3, 'box.2.text', 0, 'Scopul meu este să susțin oamenii care vor să afle cine sunt și caută soluții pentru ei &icirc;n primul r&acirc;nd.', 8, 1618402056, 1685135332),
(9, 'site.home', 0, 1, 'box.2.link.text', 0, 'Povestea mea', 9, 1618402056, 1685135332),
(10, 'pieces/site/industry-comparison', 1, 1, 'comparare-industrii.titlu', 0, 'Cum putem deveni o versiune mai bună', 10, 1618308433, 1685135332),
(11, 'site.home', 0, 1, 'servicii.link.text', 0, 'Mai multe despre coaching', 11, 1618402056, 1685135332),
(12, 'site.home', 0, 5, 'servicii.background', 0, '', 12, 1617878700, 1685135332),
(13, 'site.story', 0, 4, 'title', 0, 'Povestea mea', 13, 1638269216, 1684747026),
(14, 'site.story', 0, 9, 'description', 0, 'Sunt Master Coach, Trainer, certificarea de psiholog este în lucru, încă studiez la Facultatea de Psihologie Spiru Haret din Brașov, însă experiența mea ca și coach a pus bazele reușitei în lucrul cu oamenii, astfel, am reușit să văd cum minunile există și se întâmplă sub ochii mei, ceva fantastic.', 14, 1638269216, 1684747026),
(15, 'site.story', 0, 4, 'keywords', 0, 'terapeut,terapie,NLP,coach,coaching,trainer,meditatii,psihoterapie', 15, 1638269216, 1684747026),
(16, 'site.story', 0, 5, 'banner.imagine', 0, '', 16, 1616880666, 1684747026),
(17, 'site.story', 0, 1, 'banner.text', 0, 'Te regăsești în povestea mea?', 17, 1638269216, 1684747026),
(18, 'site.story', 0, 1, 'banner.pagina', 0, 'POVESTEA MEA', 18, 1638269216, 1684747026),
(19, 'site.story', 0, 3, 'poveste', 0, '<p><span style=\"font-weight: 400;\">Mă numesc Elena, dar vei auzi de mine și sub denumirea logo-ului </span><strong><em>Melena, </em></strong><span style=\"font-weight: 400;\">ce reprezintă pagina mea de business din sfera dezvoltării personale.</span></p>\n<p><span style=\"font-weight: 400;\">Am obținut certificări internaționale precum&nbsp; </span><span style=\"font-weight: 400;\">Master Coach</span><span style=\"font-weight: 400;\">, </span><span style=\"font-weight: 400;\">Life Coach</span><span style=\"font-weight: 400;\"> și </span><span style=\"font-weight: 400;\">Business Coach</span><span style=\"font-weight: 400;\">. Sunt </span><em><span style=\"font-weight: 400;\">formator</span></em><span style=\"font-weight: 400;\"> (trainer), practic </span><em><span style=\"font-weight: 400;\">NLP</span></em><span style=\"font-weight: 400;\"> (programarea neurolingvistică a creierului), </span><em><span style=\"font-weight: 400;\">hipnoză</span></em><span style=\"font-weight: 400;\"> și de asemenea am trecut și pragul Facultății de Psihologie din Brașov; &icirc;nsă, experiența mea cu oamenii, și cu </span><strong>mine inclusiv,</strong><span style=\"font-weight: 400;\"> au pus bazele unei noi dorințe, aceea de a-mi dedica viața cercetării permanente, fapt care a condus către rezultate excepționale și astfel, am reușit să văd cum minunile există și se &icirc;nt&acirc;mplă sub ochii mei, ceva fantastic.</span></p>\n<p><span style=\"font-weight: 400;\">Acum 8 ani nu credeam așa ceva, am pornit la drum cu speranțe doar și mii de probleme de tot felul.&nbsp;</span></p>\n<span style=\"font-weight: 400;\">Astăzi &icirc;mi asum faptul că am ajuns să cunosc rețeta anti programare socială și sunt gata să ajut, pentru că asta e menirea mea, am venit aici cu un scop, </span><strong>NU de Salvator</strong><span style=\"font-weight: 400;\"> ci de </span><strong>Susținător</strong><span style=\"font-weight: 400;\">.</span>', 19, 1638269216, 1684747026),
(20, 'site.story', 0, 1, 'lucruri.interesante', 0, 'Lucruri interesante despre mine', 20, 1638269216, 1684747026),
(23, 'site.story', 0, 1, 'video.titlu', 0, 'Și acum un video scurt', 23, 1638269216, 1638269629),
(24, 'site.story', 0, 3, 'video.descriere', 0, '&Icirc;n majoritatea timpului mă ocup cu gestionarea&nbsp;afacerii personale&nbsp;și de asemenea cu plăcerea sufletului meu, psihologia, studiul diverselor terapii la care muncesc pentru a obține noi calificări, deoarece doresc să mă &icirc;mbunătățesc continuu și să fiu maxim pregătită pentru orice provocare &icirc;nt&acirc;mpinată &icirc;n cadrul sesiunilor.', 24, 1638269216, 1638269629),
(25, 'site.coaching.info', 0, 4, 'title', 0, 'Coaching', 25, 1616880925, 1684747032),
(26, 'site.coaching.info', 0, 9, 'description', 0, '{= description =}', 26, 1616880925, 1684747032),
(27, 'site.coaching.info', 0, 4, 'keywords', 0, '{= keywords =}', 27, 1616880925, 1684747032),
(28, 'site.coaching.info', 0, 5, 'banner.imagine', 0, '', 28, 1616880925, 1684747032),
(29, 'site.coaching.info', 0, 1, 'banner.text', 0, 'Te încrezi mereu în părerea celorlalți?', 29, 1616880925, 1684747032),
(30, 'site.coaching.info', 0, 1, 'banner.pagina', 0, 'COACHING', 30, 1616880925, 1684747032),
(31, 'site.coaching.info', 0, 3, 'box.1.text', 0, 'Sunt profund recunoscătoare universului că nu am avut o viață ușoară și roz, că nu am crescut &icirc;ntr-o familie completă, că nu am avut niciodată fiind copil, bicicleta dorită și alte jucării, altfel am putut &icirc;nțelege și integra &icirc;nțelepciunea ca adult prin disciplina cu mine constantă, &icirc;n căutarea de răspunsuri.<br /><br />Mai presus de toate &icirc;mi sunt mie, că am crezut &icirc;n Sinele Meu, &icirc;n puterea mea incontestabilă, pentru că atunci c&acirc;nd &icirc;mi era dificil să &icirc;nțeleg noroiul din jurul meu, am mers &icirc;nainte cu o &icirc;ncredere de fier, am profitat de fiecare informație și am acționat contrar minții mele, care se opunea &icirc;ntotdeauna pentru a mă ține &icirc;n zona de confort.', 31, 1616880925, 1684747032),
(32, 'site.coaching.info', 0, 1, 'sectiune.title', 0, 'CE SE ÎNTÂMPLĂ, de fapt, într-o sesiune de coaching, focusată pe soluții', 32, 1616880925, 1684747032),
(33, 'site.coaching.info', 0, 3, 'sectiune.descriere', 0, '<p><span style=\"font-weight: 400;\">&Icirc;ntr-o sesiune, 1 la 1, are loc o sesiune de &icirc;ntrebări țintite de la coach către client, astfel &icirc;nc&acirc;t acesta să aibe conștientizări, viziuni noi și să se apropie c&acirc;t mai repede de o soluție potrivită pentru obiectivul propus la &icirc;nceputul sesiunii.</span></p>\n<p><span style=\"font-weight: 400;\">O sesiune durează maxim 1 oră jumătate iar de asemenea, se pot aplica diferite <strong>tehnici precum NLP (programare neurolingvistică)</strong>, pentru a aduce noi conștientizări din subconștient, &icirc;n fața obiectivului dorit.</span></p>\n<p><span style=\"font-weight: 400;\">Sesiunile pot avea loc <span style=\"text-decoration: underline;\">live sau online</span>, &icirc;n funcție de circumstanțe.</span></p>\n<p><span style=\"font-weight: 400;\">Coach-ul pune doar &icirc;ntrebări, nu face afirmații, nu &icirc;și spune părerea la absolut nicio reacție sau argument al clientului, este atent să pună &icirc;ntrebările potrivite la momentul potrivit.<br /><br />Un coach implicat va identifica care este metoda prin care să ajute orice client să ajungă la variantele potrivite și să elimine acele blocaje interioare, deoarece metoda focusată pe soluții nu dă niciodată greș, mai ales c&acirc;nd lucrezi cu oameni din pasiune, dintr-o forță interioară dincolo de dorința de a face bani și de a fi renumit.<br /><br /><strong>Coaching-ul va funcționa pentru orice persoană</strong> care are obiective, mai popular spus, acea persoană care dorește să obțină ceva pentru propriul beneficiu, care are un scop de orice fel, care are dorință de cunoaștere de sine și care știe că un coach nu are rolul de a-i fi mentor sau sfătuitor, ci de a-l provoca prin &icirc;ntrebări la care nu s-a g&acirc;ndit niciodată, pentru ca răspunsurile să apară cu scopul conștientizării, retrospecției. &Icirc;mi place să spun des &lsquo;&rsquo;simți că te-a atins un fulger&rsquo;&rsquo;, dar &icirc;n sensul pozitiv, bine&icirc;nțeles.<br /></span></p>', 33, 1616880925, 1684747032),
(34, 'site.coaching.info', 0, 3, 'box.2.text', 0, '<span style=\"font-weight: 400;\">Studiez continuu tehnici de <em><strong>NLP, HIPNOZĂ și psihologie</strong></em> datorită cărora &icirc;mi pot ajuta clienții &icirc;n procesul de coaching.</span>', 34, 1616880925, 1684747032),
(35, 'site.coaching.info', 0, 1, 'servicii.link.text', 0, 'Contactează-mă', 35, 1616880925, 1684747032),
(36, 'site.blog.all', 0, 4, 'title', 0, 'Blog', 36, 1616880947, 1684747029),
(37, 'site.blog.all', 0, 9, 'description', 0, '{= description =}', 37, 1616880947, 1684747029),
(38, 'site.blog.all', 0, 4, 'keywords', 0, '{= keywords =}', 38, 1616880947, 1684747029),
(39, 'site.blog.all', 0, 5, 'banner.imagine', 0, '', 39, 1616880948, 1684747029),
(40, 'site.blog.all', 0, 1, 'banner.text', 0, 'Gânduri și experiențe din viață', 40, 1616880947, 1684747029),
(41, 'site.blog.all', 0, 1, 'banner.pagina', 0, 'BLOG', 41, 1616880947, 1684747029),
(42, 'site.blog.all', 0, 5, 'articles.background', 0, '', 42, 0, 1684747029),
(43, 'site.media', 0, 4, 'title', 0, 'Media', 43, 1616880915, 1638269780),
(44, 'site.media', 0, 9, 'description', 0, 'sfaturi,media,coaching', 44, 1616880915, 1638269780),
(45, 'site.media', 0, 4, 'keywords', 0, '{= keywords =}', 45, 1616880915, 1638269780),
(46, 'site.media', 0, 5, 'banner.imagine', 0, '', 46, 1616880915, 1638269780),
(47, 'site.media', 0, 1, 'banner.text', 0, 'Câteva sfaturi pentru tine', 47, 1616880915, 1638269780),
(48, 'site.media', 0, 1, 'banner.pagina', 0, 'MEDIA', 48, 1616880915, 1638269780),
(49, 'site.media', 0, 5, 'media.background', 0, '', 49, 0, 1638269780),
(50, 'site.contact', 0, 4, 'title', 0, 'Contact', 50, 1617878029, 1684748563),
(51, 'site.contact', 0, 9, 'description', 0, '{= description =}', 51, 1617878029, 1684748563),
(52, 'site.contact', 0, 4, 'keywords', 0, '{= keywords =}', 52, 1617878029, 1684748563),
(53, 'site.contact', 0, 5, 'banner.imagine', 0, '', 53, 1617878030, 1684748563),
(54, 'site.contact', 0, 1, 'banner.text', 0, 'Citesc mesajele tale cu mult drag', 54, 1617878029, 1684748563),
(55, 'site.contact', 0, 1, 'banner.pagina', 0, 'CONTACT', 55, 1617878029, 1684748563),
(56, 'site.contact', 0, 1, 'contact.titlu', 0, 'Hai să ne cunoaștem!', 56, 1617878029, 1684748563),
(57, 'site.contact', 0, 1, 'contact.telefon', 0, 'Telefon:', 57, 1617878029, 1684748563),
(58, 'site.contact', 0, 1, 'contact.email', 0, 'Email:', 58, 1617878029, 1684748563),
(59, 'site.contact', 0, 1, 'contact.adresa', 0, 'Adresă:', 59, 1617878029, 1684748563),
(60, 'site.contact', 0, 5, 'letter.imagine', 0, '', 60, 0, 1684748563),
(64, 'site.home', 0, 5, 'banner.imagine', 0, '', 64, 1617878090, 1685135332),
(65, '404.site', 0, 5, 'banner.background', 0, '', 65, 0, 1684744584),
(66, '404.site', 0, 1, 'banner.text', 0, 'Nu am găsit ce căutai', 66, 1604087270, 1684744584),
(67, '404.site', 0, 1, 'banner.pagina', 0, '404', 67, 1604087270, 1684744584),
(68, 'site.media', 0, 3, 'box.1.text', 0, '<p>De ce există atatea sinucideri? De ce există o mulțime de oameni care devin dependenți de substanțe care &icirc;i adorm, care &icirc;i &icirc;mpiedică să fie conștienți de o problemă reală -&nbsp; vicii precum droguri, tutun, alcool, medicamente, dulciuri? De ce există din &icirc;n ce mai multe boli nou apărute, &icirc;n ciuda evoluției medicinei?</p>\nDe ce există at&acirc;tea cupluri care ajung la separări? &Icirc;nafara motivului că <strong>nu sunt</strong> menite spiritual să evolueze &icirc;mpreună, majoritatea au &icirc;n spate alt motiv principal.<br /><br /><strong>Pentru că oamenii nu vor să simtă toată durerea din sufletul lor.<br /></strong>', 68, 1616880915, 1638269780),
(69, 'site.legal.terms', 0, 4, 'title', 0, 'Termeni și condiții', 69, 1684748453, 1684748977),
(70, 'site.legal.terms', 0, 9, 'description', 0, '{= description =}', 70, 1684748453, 1684748977),
(71, 'site.legal.terms', 0, 4, 'keywords', 0, '{= keywords =}', 71, 1684748453, 1684748977),
(72, 'site.legal.terms', 0, 3, 'box.1.text', 0, '<p><strong>Termeni si condiţii generale de utilizare a site-ului web www.elletherapy.ro</strong></p>\r\n<p align=\"left\"><strong>I.1. Domeniu de aplicare şi prestaţii</strong></p>\r\n<p align=\"left\">(1) Aceste Condiţii generale de utilizare se referă la utilizarea site-urilor web puse la dispoziţie de Imagorun SRL, respectiv www.elletherapy.ro&nbsp;</p>\r\n<p align=\"left\">(2) Această pagină Conţine condiţiile generale de utilizare a site-ului web. Prin accesarea sau utilizarea site-ului web, toţi utilizatorii şi vizitatorii acceptă valabilitatea Condiţiilor generale de utilizare a site-ului web. Imagorun SRL &icirc;şi rezervă dreptul de a modifica oric&acirc;nd Condiţiile generale de utilizare a site-ului, după cum consideră necesar.</p>\r\n<p align=\"left\">(3) Imagorun SRL oferă pe site-ul web informaţii despre coaching și contact pentru lămuriri legate de acest serviciu.</p>\r\n<p align=\"left\">(4) Imagorun SRL &icirc;şi rezervă dreptul de a suspenda total sau parțial site-ul web sau a modifica conţinutul acestuia sau serviciile legate de acesta. Imagorun &nbsp;SRL nu garantează &icirc;n niciun fel disponibilitatea permanentă a site-ului web al Imagorun SRL. Nimeni nu este &icirc;ndreptăţit să ridice pretenţii legate de utilizarea sau menţinerea site-ului web al Imagorun SRL.</p>\r\n<p align=\"left\"><strong>I.2. Drepturi de proprietate intelectuală</strong></p>\r\n<p align=\"left\">(1) &Icirc;ntregul conţinut al site-ului web (ilustraţii, texte, formulări, mărci, imagini, filme video, elemente grafice) constituie proprietatea intelectuală a Imagorun SRL sau a partenerilor contractuali ai acestuia. Prin utilizarea site-ului web al Imagorun SRL utilizatorului nu i se transmite niciun drept de licenţă sau alt drept care i-ar permite să se folosească de drepturi legate de site-ul web www.elletherapy.ro (de exemplu drepturi de proprietate industrială, drepturi de autor şi drepturi conexe etc.). Sunt interzise modificarea, copierea, multiplicarea, folosirea, completarea sau orice alt fel de utilizare a mărcilor, designului, imaginilor, textelor, unor fragmente de text sau a oricărui alt conţinut de pe site-ul web al Imagorun SRL, fără acordul &icirc;n scris prealabil al acestuia. O excepţie o constituie multiplicarea, valorificarea sau utilizarea materialelor puse la dispoziţie pe site &icirc;n mod explicit pentru a fi folosite cu acest scop.</p>\r\n<p align=\"left\"><strong>I.3. Răspundere</strong></p>\r\n<p align=\"left\">&nbsp;(1) Imagorun SRL a depus toate eforturile posibile pentru ca informaţiile puse la dispoziţie pe site-ul web al Imagorun SRL să fie corecte şi complete la momentul publicării lor pe site. Imagorun SRL nu &icirc;şi asumă niciun fel de obligaţii, nu răspunde legal pentru lipsa de conformitate şi nu garantează &icirc;n niciun fel pentru informaţii puse la dispoziţie pe site-ul web, ca de exemplu fişiere descărcabile, servicii oferite de terţi, linkuri externe sau alte conţinuturi care pot fi accesate &icirc;n mod direct sau indirect pe site-ul web <a href=\"http://www.elletherapy.ro/\" target=\"_blank\" rel=\"noopener\">www.elletherapy.ro</a> , pornind de la acest site. De asemenea, Imagorun SRL &icirc;şi rezervă dreptul de a modifica şi completa informaţiile puse la dispoziţie fără informare prealabilă.</p>\r\n<p align=\"left\">(2) Imagorun SRL nu răspunde pentru daune provocate de utilizarea necorespunzătoare sau abuzivă a contului de utilizator de către utilizatorul &icirc;nsuşi, de utilizarea abuzivă sau pierderea datelor de identificare sau a datelor salvate de către utilizator.</p>\r\n<p align=\"left\"><strong>I.4. Disponibilitate</strong></p>\r\n<p align=\"left\">(1) Imagorun SRL depune toate eforturile pentru a asigura continuitatea administrării şi punerii la dispoziţie a site-ului web - &icirc;n măsura posibilităţilor tehnice, economice, organizatorice şi specifice companiei.</p>\r\n<p align=\"left\">(2) Imagorun SRL nu răspunde legal pentru lipsa de conformitate şi nu garantează &icirc;n niciun fel că site-ul web al Imagorun SRL sau conţinutul său se vor afla &icirc;n mod continuu la dispoziţia utilizatorilor, că acestea sunt puse la dispoziţia utilizatorilor, că nu conţin greşeli sau că greşelile se corectează, şi că site-ul web al Imagorun SRL sau alte resurse care servesc la existenţa acestuia (de exemplu serverul) nu sunt afectate de viruşi sau alte elemente periculoase. Imagorun SRL &icirc;şi declină &icirc;n mod explicit, &icirc;n limitele permise de lege, orice răspundere pentru daune de orice fel provocate de punerea la dispoziţie a site-ului web <a href=\"http://www.elletherapy.ro/\" target=\"_blank\" rel=\"noopener\">www.elletherapy.ro</a>&nbsp;sau a resurselor anexe care servesc la existenţa acestuia.</p>\r\n<p align=\"left\">(3) Imagorun SRL &icirc;şi declină orice răspundere pentru perioadele de timp &icirc;n care site-ul nu se poate accesa din motive tehnice sau datorită altor probleme.</p>\r\n<p align=\"left\"><strong>I.5. &Icirc;ncărcarea de material nociv</strong></p>\r\n<p align=\"left\">Imagorun SRL interzice &icirc;ncărcarea pe site-ul web de programe pentru calculator, fişiere şi alte materiale conţin&acirc;nd elemente capabile să distrugă şi/sau să &icirc;ntrerupă funcţionalitatea site-ului, ca de exemplu viruşi, fişiere manipulate, fişiere \"ascunse\" (de exemplu imagini integrate &icirc;n fişiere audio), viermi, troieni sau boţi pentru scrolling, afişarea mai multor ecrane sau pentru alte tipuri de activităţi, care afectează integritatea şi funcţionalitatea site-ului web sau a comunicării online &icirc;n general.</p>\r\n<p align=\"left\"><strong>I.6. Atacuri electronice</strong></p>\r\n<p align=\"left\">(1) Sunt interzise orice fel de atacuri electonice &icirc;mpotriva site-ului web&nbsp;<a href=\"http://www.elletherapy.ro/\" target=\"_blank\" rel=\"noopener\">www.elletherapy.ro</a> sau a oricăror alte date ale Imagorun SRL aflate &icirc;n corelaţie cu site-ul precum şi orice atacuri electronice &icirc;mpotriva datelor utilizatorilor.</p>\r\n<p align=\"left\">(2) Fiecare atac electronic va avea ca urmare excluderea imediată a utilizatorului care l-a cauzat şi va atrage după sine consecinţe de drept penal şi civil.</p>\r\n<h2 class=\"western\" align=\"left\"><strong>ll. Informaţii generale privind protecţia datelor personale</strong></h2>\r\n<p align=\"left\"><strong>II.1. Baza legală</strong></p>\r\n<p align=\"left\">Imagorun SRL va trata toate datele transmise sau puse la dispoziţie prin intermediul site-ului web <a href=\"http://www.elletherapy.ro/\" target=\"_blank\" rel=\"noopener\">www.elletherapy.ro</a>, respect&acirc;nd prevederile &icirc;n vigoare ale legii privind protecţia datelor personale.</p>\r\n<p align=\"left\"><strong>II.2. Acordul utilizatorului privind folosirea datelor</strong></p>\r\n<p align=\"left\">(1) Utilizatorul acceptă să primească pe cale electronică (de exemplu prin e-mail) informaţii, buletine informative şi material publicitar de la Imagorun SRL. Vă puteţi retrage consimţăm&acirc;ntul &icirc;n orice moment, fie acces&acirc;nd linkul de dezabonare &icirc;n buletinul informativ, fie trimiţ&acirc;nd un e-mail la adresa de email afișată pe site.</p>\r\n<p align=\"left\">(2) &Icirc;n conformitate cu setările browserului său, utilizatorul acceptă &icirc;n mod explicit folosirea şi mai ales stocarea de cookie-uri pe calculatorul său de către Imagorun SRL.</p>\r\n<p align=\"left\">(3) Utilizatorul &icirc;şi poate retrage oric&acirc;nd consimţăm&acirc;ntul &icirc;n legătură cu colectarea şi memorarea datelor personale de către Imagorun SRL. &Icirc;n acest scop, utilizatorul va trimite un e-mail la adresa de email afișată pe site.</p>\r\n<p align=\"left\"><strong>II.3. Dreptul de acces la date, dreptul de a solicita rectificarea sau ștergerea datelor</strong></p>\r\n<p align=\"left\">Utilizatorul are oric&acirc;nd dreptul de a solicita informaţii legate de datele memorate, precum şi rectificarea şi ştergerea acestora, cu respectarea prevederilor legii privind protecţia datelor personale. &Icirc;n acest scop, utilizatorul poate să contacteze Imagorun SRL folosind adresa de email afișată pe site.</p>\r\n<p align=\"left\"><strong>II.4. Siguranţa datelor</strong></p>\r\n<p align=\"left\">Imagorun SRL face tot ce e posibil pentru a asigura securitatea transferului de date prin intermediul mediilor online. &Icirc;n acelaşi timp &icirc;nsă, ține de utilizator să depună toate eforturile rezonabile pentru folosirea internetului &icirc;n condiţii de siguranţă (folosirea unei versiuni actuale de browser, confidențialitatea datelor de acces la platformele online).</p>\r\n<p align=\"left\"><strong>II.5. Cookie-uri</strong></p>\r\n<p align=\"left\">(1) Pentru lărgirea funcţionalităţii prezenţei noastre web şi creşterea confortului de folosire a acesteia de către utilizator sunt folosite aşa-numite \"cookie-uri\".</p>\r\n<p align=\"left\">(1.1) Majoritatea cookies-lor utilizate de Imagorun SRL sunt șterse automat de pe hard disk-ul utilizatorului (cookies temporare) la finalul sesiunii de navigare. Cookies temporare sunt necesare, pentru a oferi, de exemplu, utilizatorului anumite tipuri de funcții ale unor formulare pe mai multe pagini. &Icirc;n plus, firma Imagorun SRL folosește de asemenea cookies care răm&acirc;n pe hard disk-ul utilizatorului (cookies permanente). Aceste cookies permanente au o durată de viață de 1 lună p&acirc;nă la 10 ani și se șterg singure, după o perioadă de timp predeterminată, sau pot fi șterse manual de utilizator. Scopul exclusiv al acestor cookies (cookies permanente) constă &icirc;n a adapta oferta de pe internet c&acirc;t mai bine &icirc;n funcție de dorințele clientului și a face c&acirc;t mai confortabilă utilizarea site-ului web de către utilizatori.</p>\r\n<p align=\"left\">&nbsp;(1.2) Cookies nu conțin date personale. Sunt colectate &icirc;nsă date anonime cu un cod ID pentru utilizatori. Aici este vorba, de exemplu, despre date referitoare la paginile accesate de utilizatori, conținuturile căutate, etc. Aceste date anonime nu sunt niciodată combinate cu datele personale ale utilizatorului.</p>\r\n<p align=\"left\">(1.3) Utilizatorul poate influența utilizarea cookies prin setări adecvate operate &icirc;n browser-ul utilizatorului. Este posibil, de exemplu, să acceptăm sau să refuzăm cookies generale sau individuale. Această setare, ce nu permite stocarea, poate avea ca rezultat restricţionarea funcţiunilor puse la dispoziţie de prezenţa web a Imagorun SRL.</p>\r\n<p align=\"left\"><strong>II.6. Pluginuri pentru Social Media</strong></p>\r\n<p align=\"left\">(1) Pe unele pagini ale site-ului web al Imagorun SRL se pot găsi aplicaţii ale unor terţi (de exemplu Facebook, Google Plus, Twitter) precum şi conţinuturi stocate pe platforme ale unor terţi (de exemplu Youtube). &Icirc;n ciuda controlului minuţios şi a măsurilor active luate &icirc;n scopul protecţiei datelor, Imagorun SRL nu are nicio influenţă asupra modului &icirc;n care terţii folosesc datele utilizatorului colectate pe site-ul web al Imagorun SRL. Răspunderea &icirc;n legătură cu aceste date revine exclusiv companiilor care oferă următoarele aplicaţii.</p>\r\n<p align=\"left\"><strong>II.7. Publicitate &icirc;n funcție de interesele specifice / Re-Targeting</strong></p>\r\n<p align=\"left\">Site-ul web www.elletherapy.ro poate folosi așa numitele tehnici pentru Re-Targeting. Imagorun SRL poate folosi aceste tehnici, pentru a face mai interesantă oferta internet pentru utilizatori. Această tehnică ne oferă posibilitatea de a ne adresa utilizatorilor, care deja s-au interesat pentru site-ul web și pentru serviciile sau produsele lui Imagorun SRL, cu reclamă pe site-ul unor terți.</p>\r\n<h2 class=\"western\" align=\"left\"><strong>lll. Prevederi suplimentare</strong></h2>\r\n<p align=\"left\"><strong>III.1. Instanţa judecătorească</strong></p>\r\n<p align=\"left\">Prezentul contract este guvernat de legea rom&acirc;nească. Instanţa competentă pentru soluţionarea conflictelor este Tribunalul Bucuresti.</p>\r\n<p align=\"left\"><strong>III.2. Modificări şi completări, nulitate parţială</strong></p>\r\n<p align=\"left\">(1) Orice modificări şi completări ale prezentului contract pot avea doar formă scrisă. Convenţiile verbale accesorii nu produc efecte juridice.</p>\r\n<p align=\"left\">(2) &Icirc;n cazul &icirc;n care una sau mai multe dintre prevederile prezentului contract sunt - din orice motiv - lovite de nulitate, aceasta nu aduce atingere aplicabilităţii celorlalte prevederi contractuale.</p>', 72, 1684748453, 1684748977),
(73, 'site.legal.privacy', 0, 4, 'title', 0, 'Politica de confidențialitate', 73, 1684748497, 1684748980),
(74, 'site.legal.privacy', 0, 9, 'description', 0, '{= description =}', 74, 1684748497, 1684748980),
(75, 'site.legal.privacy', 0, 4, 'keywords', 0, '{= keywords =}', 75, 1684748497, 1684748980),
(76, 'site.legal.privacy', 0, 3, 'box.1.text', 0, '<h5 class=\"western\">Politica de confidentialitate www.elletherapy.ro</h5>\r\n<p>1.1. Imagorun SRL, respectiv site-ul www.elletherapy.ro poate acumula date cu caracter personal si date cu caracter special, pe pagina siteului: www.elletherapy.ro, numai cu acordul voluntar al Vizitatorului, in urmatoarele scopuri:</p>\r\n<p>- pentru a facilita accesul acestuia la serviciu;</p>\r\n<p>- trimiterea de newslettere si/sau alerte periodice, in format exclusiv electronic (e-mail) si/sau telefonic (apel telefonic, SMS);</p>\r\n<p>- scopuri statistice.</p>\r\n<p>Imagorun S.R.L poate sa colecteze involuntar si alte date (adresa IP, ora vizitei, locul de unde se face accesul, nume si versiune browser internet, sistem de operare, inclusiv alti parametri) furnizati de catre browserul internet prin intermediul caruia se face accesul la site si pot fi folosite de catre www.elletherapy.ro pentru a imbunatati serviciile oferite Clientilor sau Utilizatorilor sai, sau cu scop statistic; exceptie face cazul in care sunt incalcate prevederi ale documentului, in eventualitatea cazului in care rezultatul actiunilor Vizitatorului contravine intereselor sau produce pagube de orice natura de partea Imagorun S.R.L si/sau al eventualilor terti cu care Imagorun S.R.L are contracte de parteneriat in acel moment.</p>\r\n<p>1.2. Vizitatorul are dreptul de a se opune colectarii datelor sale personale si sa solicite stergerea acestora, revocandu-si astfel acordul dat pentru document, si renuntand astfel la orice drept implicit specificat in acesta si fara nicio obligatie ulterioara a vreunei parti fata de cealalta sau fara ca vreo parte sa poata pretinde celeilalte daune-interese.</p>\r\n<p>1.3. Pentru exercitarea drepturilor, Vizitatorul se va adresa www.elletherapy.ro, conform datelor de contact disponibile pe site, valabile la acea data.</p>\r\n<p>1.4. Folosindu-se de formularele disponibile pe site, Vizitatorul are dreptul de a modifica datele pe care le-a declarat initial pentru a reflecta orice modificare survenita, in cazul in care aceasta exista.</p>\r\n<p>1.5. Politica de confidentialitate www.elletherapy.ro se refera doar la datele furnizate voluntar de catre Vizitator exclusiv pe site. Imagorun S.R.L nu raspunde pentru politica de confidentialitate practicata de catre oricare alt tert la care se poate ajunge prin legaturi, indiferent de natura acestora, in afara siteului.</p>\r\n<p>1.6. Imagorun S.R.L se obliga ca datele colectate ale Vizitatorului sa fie folosite numai in conformitate cu scopurile declarate si sa nu faca publica, sa vanda, inchirieze, licentieze, transfere, etc. baza de date continand informatii referitoare la datele cu caracter personal sau special ale Vizitatorului vreunui tert neimplicat in indeplinirea scopurilor declarate.</p>\r\n<p>1.7. Exceptie va face situatia in care transferul/accesarea/vizualizarea/etc este ceruta de catre organele abilitate in cazurile prevazute de reglementarile in vigoare la data producerii evenimentului.</p>\r\n<p>1.8. www.elletherapy.ro garanteaza ca datele personale ale unui Utilizator, colectate prin intermediul formularului de contact, vor fi folosite numai pana la solutionarea problemei comunicate de acesta, dupa care vor deveni date cu caracter exclusiv statistic.</p>\r\n<p>1.9. www.elletherapy.ro nu raspunde pentru defectiunile care pot periclita securitatea serverului pe care este gazduita baza de date care contine aceste date.</p>', 76, 1684748497, 1684748980),
(77, 'site.legal.cookies', 0, 4, 'title', 0, 'Politica de cookies', 77, 1684748532, 1685134162),
(78, 'site.legal.cookies', 0, 9, 'description', 0, '{= description =}', 78, 1684748532, 1685134162),
(79, 'site.legal.cookies', 0, 4, 'keywords', 0, '{= keywords =}', 79, 1684748532, 1685134162),
(80, 'site.legal.cookies', 0, 3, 'box.1.text', 0, '<h4 class=\"western\">Politica de cookie-uri pe siteul www.elletherapy.ro</h4>\r\n<p>Cookie-ul este un fisier de mici dimensiuni, un text special, deseori codificat, trimis de un server unui navigator web si apoi trimis inapoi (nemodificat) de catre navigator, de fiecare data cand acceseaza acel server. Cookie-ul este instalat prin solicitarea emisa de catre un web-server unui browser (ex: Internet Explorer, Chrome, Mozilla) si este complet &ldquo;pasiv&rdquo; (nu contine programe software, virusi sau spyware si nu poate accesa informatiile de pe hard driverul utilizatorului). Cookie-urile sunt folosite pentru autentificare precum si pentru urmarirea comportamentului utilizatorilor; aplicatii tipice sunt retinerea preferintelor utilizatorilor si implementarea sistemului de &bdquo;cos de cumpărături&rdquo;. Aceste fisiere fac posibila recunoasterea terminalului utilizatorului si prezentarea continutului intr-un mod relevant, adaptat preferintelor utilizatorului. Cookie-urile asigura utilizatorilor o experienta placuta de navigare si sustin eforturile Imagorun S.R.L pentru a oferi servicii comfortabile utilizatorilor: ex: &ndash; preferintele in materie de confidentialitate online si istoricul cosului de cumparaturi. De asemenea, sunt utilizate in pregatirea unor statistici anonime agregate care ajuta la intelegerea modalitatii in care un utilizator beneficiaza de www.elletherapy.ro, permitand imbunatatirea structurii si continutului dar excluzand indentificarea personala a utilizatorului.</p>\r\n<p>Imagorun S.R.L poate folosi doua tipuri de Cookie-uri: per sesiune si fixe (fisiere temporare ce raman in terminalul utilizatorului pana la terminarea sesiunii sau inchiderea aplicatiei/browser-ului web). Fisierele fixe raman pe terminalul utilizatorului pe o perioada in parametrii Cookie-ului sau pana sunt sterse manual de utilizator. Cookie-urile folosite de partenerii operatorului unei pagini web, incluzand fara limitari utlizatorii paginii web, fac obiectul Politicii de Confidentialitate respective.</p>\r\n<p>O vizita pe www.elletherapy.ro poate plasa: Cookie-uri de performanta a site-ului, Cookie-uri de analiza a vizitatorilor, Cookie-uri pentru geotargetting, Cookie-uri de inregistrare, Cookie-uri pentru publicitate sau Cookie-uri ale furnizorilor de publicitate.</p>\r\n<p>Datele personale colectate prin utilizarea Cookie-urilor pot fi colectate doar pentru a facilita anumite functionalitati pentru utilizator si sunt criptate intr-un mod care face imposibil accesul persoanelor neautorizate la ele. In general, o aplicatie folosita pentru accesarea paginilor web permite salvarea Cookie-urilor pe terminal in mod implicit. Aceste setari pot fi schimbate in asa fel incat administrarea automata a Cookie-urilor sa fie blocata de browser-ul web sau utilizatorul sa fie informat de fiecare data cand cookie-urile sunt trimise catre terminalul sau. Informatii detaliate despre posibilitatile si modurile de administrare a Cookie-urilor pot fi gasite in zona de setari a aplicatiei (browser-ului web). Limitarea folosirii Cookie-urilor poate afecta anumite functionalitati ale www.elletherapy.ro. Cookie-urile reprezinta punctul central al functionarii eficiente a Internetului, ajutand la generarea unei experiente de navigare prietenoase si adaptata preferintelor si intereselor fiecarui utilizator. Refuzarea sau dezactivarea cookie-urilor poate face unele site-uri imposibil de folosit. Datorita flexibilitatii lor si a faptului ca majoritatea dintre cele mai vizitate site-uri si cele mai mari folosesc cookie-uri, acestea sunt aproape inevitabile; dezactivarea cookie-urilor nu va permite accesul utilizatorului pe site-urile cele mai raspandite si utilizate printre care Youtube, Gmail, Yahoo si altele.</p>\r\n<p><strong>Exemple de intrebuintari importante ale cookie-urilor:</strong></p>\r\n<p>Continut si servicii adaptate preferintelor utilizatorului &ndash; categorii de produse si servicii.</p>\r\n<p>Acces adaptat pe interesele utilizatorilor &ndash; retinerea parolelor.</p>\r\n<p>Retinerea filtrelor de protectie a copiilor privind continutul pe Internet (optiuni family mode, functii de safe search).</p>\r\n<p>Masurarea, optimizarea si caracteristicile de analytics &ndash; cum ar fi confirmarea unui anumit nivel de trafic pe un website, ce tip de continut este vizualizat si modul cum un utilizator ajunge pe un website (ex prin motoare de cautare, direct, din alte website-uri etc). Website-urile deruleaza aceste analize a utilizarii lor pentru a imbunatati site-urile in beneficiul userilor.</p>\r\n<p><strong>Securitate si probleme legate de confidentialitate</strong></p>\r\n<p>Cookie-urile NU sunt virusi si folosesc formate tip plain text; nu sunt alcatuite din bucati de cod asa ca nu pot fi executate nici nu pot auto-rula. In consecinta, nu se pot duplica sau replica pe alte retele pentru a se rula sau replica din nou. Deoarece nu pot indeplini aceste functii, nu pot fi considerate virusi. Intrucat cookie-urile pot fi folosite pentru scopuri negative deoarece stocheaza informatii despre preferintele si istoricul de navigare al utilizatorilor, atat pe un anume site cat si pe mai multe alte siteuri, fiind folosite ca o forma de Spyware (spionaj privind activitatea consumatorului), multe produse anti-spyware marcheaza cookie-urile in mod constant pentru a fi sterse in cadrul procedurilor de stergere/scanare anti-virus/anti-spyware.</p>\r\n<p>In general browserele au integrate setari de confidentialitate care furnizeaza diferite nivele de acceptare a cookie-urilor, perioada de valabilitate si stergere automata dupa ce utilizatorul a vizitat un anumit site. Deoarece protectia identitatii este foarte valoroasa si reprezinta dreptul fiecarui utilizator de internet, este indicat sa se stie ce eventuale probleme pot crea cookie-urile. Pentru ca prin intermediul lor se transmit in mod constant in ambele sensuri informatii intre browser si website, daca un atacator sau persoana neautorizata intervine in parcursul de transmitere a datelor, informatiile continute de cookie pot fi interceptate. Desi foarte rar, acest lucru se poate intampla daca browserul se conecteaza la server folosind o retea necriptata (ex: o retea WiFi nesecurizata). Alte atacuri bazate pe cookie implica setari gresite ale cookie-urilor pe servere. Este foarte important ca Utilizatorul sa aleaga metoda cea mai potrivita de protectie a informatiilor personale si sa:</p>\r\n<p>Particularizeze setarile browserului in ceea ce priveste cookie-urile pentru a reflecta un nivel confortabil pentru voi al securitatii utilizarii cookie-urilor.</p>\r\n<p>Seteze termene lungi de expirare pentru stocarea istoricului de navigare si al datelor personale de acces.</p>\r\n<p>Ia in considerare setarea browserului pentru a sterge datele individuale de navigare de fiecare data cand inchideti browserul. Aceasta este o varianta de a accesa site-urile care plaseaza cookie-uri si de a sterge orice informatie de vizitare la inchiderea sesiunii navigare.</p>', 80, 1684748532, 1685134162),
(81, 'site.story', 0, 5, 'video.thumbnail', 0, '', 81, 1618779344, 1638269629),
(82, 'site.story', 0, 8, 'video', 0, '', 82, 1618779344, 1638269629),
(83, '', 1, 1, 'video.incompatibil', 0, 'Video incompatibil', 83, 1621177486, 1638269629),
(84, 'site.nlp', 0, 4, 'title', 0, 'NLP', 84, 1616880861, 1684747039),
(85, 'site.nlp', 0, 9, 'description', 0, 'NLP-ul te ajută să descoperi ce este în mintea ta. E ca și cum ai planta semințe de bucurie, curaj, iubire, pe un pământ foarte fertil. Tu deja conții toate lucrurile de care ai nevoie pentru vindecare, însă nu întotdeauna reușești singur să le scoți la suprafață deoarece datorită programării sociale, ai fost învățat să nu îți atribui merite și acțiuni binefăcătoare. Uităm de noi și credem că ne cunoaștem foarte bine, dar noi cunoaștem conștient doar ceea ce alții au spus despre noi sau ce am auzit din familie.', 85, 1616880861, 1684747039),
(86, 'site.nlp', 0, 4, 'keywords', 0, 'NLP,programare,neuro,lingivistica', 86, 1616880861, 1684747039),
(87, 'site.nlp', 0, 5, 'banner.imagine', 0, '', 87, 1616880862, 1684747039),
(88, 'site.nlp', 0, 1, 'banner.text', 0, 'Află cum te pot ajuta', 88, 1616880861, 1684747039),
(89, 'site.nlp', 0, 1, 'banner.pagina', 0, 'NLP', 89, 1616880861, 1684747039),
(90, 'site.nlp', 0, 3, 'box.1.text', 0, '<p><span style=\"font-weight: 400;\">NLP-ul te ajută să descoperi ce este &icirc;n mintea ta. </span><span style=\"font-weight: 400;\">E ca și cum ai planta semințe de bucurie, curaj, iubire, pe un păm&acirc;nt foarte fertil.&nbsp;</span><span style=\"font-weight: 400;\">Tu deja conții toate lucrurile de care ai nevoie pentru vindecare, &icirc;nsă nu &icirc;ntotdeauna reușești singur să le scoți la suprafață deoarece datorită programării sociale, ai fost &icirc;nvățat să nu &icirc;ți atribui merite și acțiuni binefăcătoare.</span></p>\n<p><span style=\"font-weight: 400;\">Uităm de noi și credem că ne cunoaștem foarte bine, dar noi cunoaștem conștient doar ceea ce alții au spus despre noi sau ce am auzit din familie. </span><span style=\"font-weight: 400;\">Adevărații &bdquo;noi&rdquo; sunt cei care sunt cu adevărat bucuroși, &icirc;mpliniți, pot realiza absolut orice &icirc;și doresc, trăiesc liber și au vise mărețe. Ca să ajungem la noi, putem alege NLP. Eu aleg asta de fiecare dată.</span></p>', 90, 1616880861, 1684747039),
(111, 'pieces/site/services', 1, 1, 'serviciu.link.text', 0, 'Află mai multe', 111, 1612559990, 1685135332),
(112, 'pieces/site/services', 1, 1, 'buton.extinde', 0, 'Citește mai mult', 112, 1612559990, 1685135332),
(113, 'pieces/site/services', 1, 1, 'buton.restrânge', 0, 'Citește mai puțin', 113, 1612559990, 1685135332),
(128, '', 1, 3, 'adresă.romania', 0, '<em>Datorită situației actuale &icirc;nt&acirc;lnirile vor avea loc doar online.</em>', 128, 1621177486, 1684748563),
(129, '', 1, 3, 'adresă.moldova', 0, 'Orașul Bălți (zona centrală, detalii &icirc;n privat).', 129, 1621177486, 1684748563),
(130, 'site.coaching.service', 0, 1, 'banner.subtitlu', 0, '{= banner.subtitlu =}', 130, NULL, 1684747036),
(131, 'site.home', 0, 4, 'SM:title', 0, '{= SM:title =}', 131, NULL, 1685135332),
(132, 'site.home', 0, 9, 'SM:description', 0, '{= SM:description =}', 132, NULL, 1685135332),
(133, 'site.home', 0, 10, 'SM:image', 0, '', 133, NULL, 1685135332),
(148, 'site.coaching.info', 0, 4, 'SM:title', 0, '{= SM:title =}', 148, NULL, 1684747032),
(149, 'site.coaching.info', 0, 9, 'SM:description', 0, '{= SM:description =}', 149, NULL, 1684747032),
(150, 'site.coaching.info', 0, 10, 'SM:image', 0, '', 150, NULL, 1684747032),
(152, 'site.contact', 0, 4, 'SM:title', 0, '{= SM:title =}', 152, NULL, 1684748563),
(153, 'site.contact', 0, 9, 'SM:description', 0, '{= SM:description =}', 153, NULL, 1684748563),
(154, 'site.contact', 0, 10, 'SM:image', 0, '', 154, NULL, 1684748563),
(155, 'site.legal.privacy', 0, 4, 'SM:title', 0, '{= SM:title =}', 155, 1684748497, 1684748980),
(156, 'site.legal.privacy', 0, 9, 'SM:description', 0, '{= SM:description =}', 156, 1684748497, 1684748980),
(176, 'site.story', 0, 4, 'SM:title', 0, '{= SM:title =}', 176, 1638269216, 1684747026),
(177, 'site.story', 0, 9, 'SM:description', 0, '{= SM:description =}', 177, 1638269216, 1684747026),
(178, 'site.story', 0, 10, 'SM:image', 0, '', 178, NULL, 1684747026),
(179, 'site.blog.all', 0, 4, 'SM:title', 0, '{= SM:title =}', 179, NULL, 1684747029),
(180, 'site.blog.all', 0, 9, 'SM:description', 0, '{= SM:description =}', 180, NULL, 1684747029),
(181, 'site.blog.all', 0, 10, 'SM:image', 0, '', 181, NULL, 1684747029),
(182, 'site.nlp', 0, 4, 'SM:title', 0, '{= SM:title =}', 182, NULL, 1684747039),
(183, 'site.nlp', 0, 9, 'SM:description', 0, '{= SM:description =}', 183, NULL, 1684747039),
(184, 'site.nlp', 0, 10, 'SM:image', 0, '', 184, NULL, 1684747039),
(185, 'site.media', 0, 4, 'SM:title', 0, '{= SM:title =}', 185, NULL, 1638269780),
(186, 'site.media', 0, 9, 'SM:description', 0, '{= SM:description =}', 186, NULL, 1638269780),
(187, 'site.media', 0, 10, 'SM:image', 0, '', 187, NULL, 1638269780),
(219, '', 1, 1, 'email.programare.subiect', 0, '{= email.programare.subiect =}', 219, NULL, 1623749733),
(222, 'site.appoint', 0, 4, 'title', 0, '{= title =}', 222, 1684745835, 1684847132),
(223, 'site.appoint', 0, 9, 'description', 0, '{= description =}', 223, 1684745835, 1684847132),
(224, 'site.appoint', 0, 4, 'keywords', 0, '{= keywords =}', 224, 1684745835, 1684847132),
(225, 'site.appoint', 0, 4, 'SM:title', 0, '{= SM:title =}', 225, 1684745835, 1684847132),
(226, 'site.appoint', 0, 9, 'SM:description', 0, '{= SM:description =}', 226, 1684745835, 1684847132),
(227, 'site.appoint', 0, 10, 'SM:image', 0, '', 227, NULL, 1684847132),
(228, 'site.appoint', 0, 5, 'banner.imagine', 0, '', 228, 1684745835, 1684847132),
(229, 'site.appoint', 0, 1, 'banner.text', 0, 'Programează-te', 229, 1684745835, 1684847132),
(230, 'site.appoint', 0, 1, 'banner.pagina', 0, 'Arzi de nerăbdare să descoperi cum te poate ajuta o ședință cu mine?', 230, 1684745835, 1684847132),
(231, 'site.appoint', 0, 1, 'form.câmp.nume.label', 0, 'Nume', 231, 1684745835, 1684847132),
(232, 'site.appoint', 0, 1, 'form.câmp.nume.placeholder', 0, 'ex: Popescu', 232, 1684745835, 1684847132),
(233, 'site.appoint', 0, 1, 'form.câmp.prenume.label', 0, 'Prenume', 233, 1684745835, 1684847132),
(234, 'site.appoint', 0, 1, 'form.câmp.prenume.placeholder', 0, 'ex: Cristi', 234, 1684745835, 1684847132),
(235, 'site.appoint', 0, 1, 'form.câmp.email.label', 0, 'Email', 235, 1684745835, 1684847132),
(236, 'site.appoint', 0, 1, 'form.câmp.email.placeholder', 0, 'ex: cristi.popescu@yahoo.com', 236, 1684745835, 1684847132),
(237, 'site.appoint', 0, 1, 'form.câmp.telefon.label', 0, 'Telefon', 237, 1684745835, 1684847132),
(238, 'site.appoint', 0, 1, 'form.câmp.telefon.placeholder', 0, 'ex: 0712 345 678', 238, 1684745835, 1684847132),
(239, 'site.appoint', 0, 1, 'form.câmp.serviciu.label', 0, 'Serviciu', 239, 1684745835, 1684847132),
(240, 'site.appoint', 0, 1, 'form.câmp.serviciu.placeholder', 0, 'Alege un serviciu', 240, 1684745835, 1684847132),
(241, 'site.appoint', 0, 1, 'form.câmp.dată.label', 0, 'Dă-mi o dată aproximativă', 241, 1684745835, 1684847132),
(242, 'site.appoint', 0, 1, 'form.câmp.dată.placeholder', 0, '{= form.câmp.dată.placeholder =}', 242, 1684745835, 1623618981),
(243, 'site.appoint', 0, 1, 'form.câmp.mesaj.label', 0, 'Mesaj', 243, 1684745835, 1684847132),
(244, 'site.appoint', 0, 1, 'form.câmp.mesaj.placeholder', 0, 'Dorești să menționezi ceva?', 244, 1684745835, 1684847132),
(245, 'site.appoint', 0, 1, 'form.politică.link.text', 0, 'Politica de confidențialitate', 245, 1684745835, 1684847132),
(246, 'site.appoint', 0, 1, 'form.politică', 1, 'Sunt de acord cu {$1}', 246, 1684745835, 1684847132),
(247, 'site.appoint', 0, 1, 'form.submit.text', 0, 'Salvează', 247, 1684745835, 1684847132),
(248, 'site.appoint', 0, 1, 'form.răspuns', 0, 'Mulțumesc de programare', 248, 1684745835, 1684847132),
(249, 'site.appoint', 0, 2, 'contactează-mă', 2, 'Mă poți contacta oricând la {$1} sau din pagina {$2}.', 249, 1684745835, 1684847132),
(250, 'site.appoint', 0, 1, 'servicii', 0, 'Servicii', 250, 1684745835, 1684847132),
(251, 'site.appoint', 0, 2, 'programări.făcute', 3, 'Ai făcut {$1} programări. De asemenea, mă poți contacta oricând la {$2} sau din pagina {$3}.', 251, 1684745835, 1623749738),
(354, 'crons/appointments/new.php', 1, 1, 'subiect', 0, '{{ subiect }}', 354, NULL, 1623762980),
(355, 'crons/appointments/new.php', 1, 1, 'titlu', 0, '{{ titlu }}', 355, NULL, 1623762980),
(356, 'crons/appointments/new.php', 1, 3, 'conținut', 0, '{{ conținut }}', 356, NULL, 1623762980),
(357, 'crons/appointments/new.php', 1, 1, 'tabel.coloană.id', 0, '{{ tabel.coloană.id }}', 357, NULL, 1623762980),
(358, 'crons/appointments/new.php', 1, 1, 'tabel.coloană.nume', 0, '{{ tabel.coloană.nume }}', 358, NULL, 1623762980),
(359, 'crons/appointments/new.php', 1, 1, 'tabel.coloană.telefon', 0, '{{ tabel.coloană.telefon }}', 359, NULL, 1623762980),
(360, 'crons/appointments/new.php', 1, 1, 'tabel.coloană.adăugat', 0, '{{ tabel.coloană.adăugat }}', 360, NULL, 1623762980),
(361, 'crons/appointments/new.php', 1, 1, 'programări.link.text', 0, '{{ programări.link.text }}', 361, NULL, 1623762980),
(362, 'crons/appointments/new.php', 1, 3, 'programări', 1, '{{ programări [1] }}', 362, NULL, 1623762980),
(363, 'crons/contacts/new.php', 1, 1, 'subiect', 0, '{{ subiect }}', 363, NULL, NULL),
(364, 'crons/contacts/new.php', 1, 1, 'titlu', 0, '{{ titlu }}', 364, NULL, NULL),
(365, 'crons/contacts/new.php', 1, 3, 'conținut', 0, '{{ conținut }}', 365, NULL, NULL),
(366, 'crons/contacts/new.php', 1, 1, 'tabel.coloană.id', 0, '{{ tabel.coloană.id }}', 366, NULL, NULL),
(367, 'crons/contacts/new.php', 1, 1, 'tabel.coloană.nume', 0, '{{ tabel.coloană.nume }}', 367, NULL, NULL),
(368, 'crons/contacts/new.php', 1, 1, 'tabel.coloană.email', 0, '{{ tabel.coloană.email }}', 368, NULL, NULL),
(369, 'crons/contacts/new.php', 1, 1, 'tabel.coloană.telefon', 0, '{{ tabel.coloană.telefon }}', 369, NULL, NULL),
(370, 'crons/contacts/new.php', 1, 1, 'tabel.coloană.adăugat', 0, '{{ tabel.coloană.adăugat }}', 370, NULL, NULL),
(371, 'crons/contacts/new.php', 1, 1, 'contacte.link.text', 0, '{{ contacte.link.text }}', 371, NULL, NULL),
(372, 'crons/contacts/new.php', 1, 3, 'contacte', 1, '{{ contacte [1] }}', 372, NULL, NULL),
(373, '404.maintenance', 0, 1, 'titlu', 0, '{{ titlu }}', 373, NULL, NULL),
(374, '404.maintenance', 0, 1, 'subtext', 0, '{{ subtext }}', 374, NULL, NULL),
(375, 'mails/appointments/confirmation', 1, 1, 'titlu', 0, '{{ titlu }}', 375, NULL, 1623749733),
(376, 'mails/appointments/confirmation', 1, 3, 'conținut', 7, '{{ conținut [7] }}', 376, NULL, 1623749733),
(439, 'site.events.promo.raffle', 0, 1, 'buton.alege.text', 0, 'Alege norocos', 439, 1627397487, 1684676996),
(440, 'site.events.promo.raffle', 0, 1, 'titlu.event', 0, 'Eveniment:', 440, 1627397487, 1684676996),
(441, 'site.events.promo.raffle', 0, 1, 'titlu.tombolă', 0, 'Tombolă:', 441, 1627397487, 1684676996),
(442, 'site.events.promo.raffle', 0, 3, 'tombolă.expirată.text', 0, 'Tombola s-a terminat. C&acirc;știgătorul a fost ales.', 442, 1627397487, 1684676996),
(443, 'site.events.promo.discount', 0, 2, 'confirmare', 1, 'Ți-ai adăugat email-ul {$1}. Dacă dorești să îl schimbi, adaugă unul nou.', 443, 1627297636, 1684677081),
(444, 'site.events.promo.discount', 0, 1, 'titlu.event', 0, 'Eveniment:', 444, 1627297636, 1684677081);
INSERT INTO `et_views_site` (`id_view_site`, `source`, `global`, `type`, `info`, `vars`, `value_ro`, `order`, `updated_at`, `selected_at`) VALUES
(445, 'site.events.promo.discount', 0, 1, 'titlu.tombolă', 0, 'Reducere:', 445, 1627297636, 1684677081),
(446, 'site.events.promo.discount', 0, 1, 'form.câmp.email.placeholder', 0, 'Adaugă email', 446, 1627297636, 1684677081),
(447, 'site.events.promo.discount', 0, 1, 'form.politică.link.text', 0, 'Politica de confidențialitate', 447, 1627297636, 1684677081),
(448, 'site.events.promo.discount', 0, 1, 'form.politică', 1, 'Sunt de acord cu {$1}', 448, 1627297636, 1684677081),
(449, 'site.events.promo.discount', 0, 1, 'form.submit.text', 0, 'Doresc reducerea', 449, 1627297636, 1684677081),
(450, 'site.events.promo.discount', 0, 1, 'form.răspuns', 0, 'Felicitări. Ai acumulat reducerea de 10%!', 450, 1627297636, 1684677081),
(451, 'site.events.promo.discount', 0, 3, 'tombolă.expirată.text', 0, 'Oferta s-a terminat. Ne vedem data viitoare. Urmărește-mă și pe Facebook.', 451, 1627297636, 1684677081),
(452, 'site.events.promo.raffle', 0, 2, 'confirmare', 1, 'Felicitări {$1}. Te-ai înscris în tombolă. Dacă dorești să schimbi datele, trimite-mi unele noi.', 452, 1627397487, 1627395215),
(453, 'site.events.promo.raffle', 0, 1, 'form.câmp.email.placeholder', 0, 'Email', 453, 1627397487, 1627395215),
(454, 'site.events.promo.raffle', 0, 1, 'form.politică.link.text', 0, 'Politica de confidențialitate', 454, 1627397487, 1627395215),
(455, 'site.events.promo.raffle', 0, 1, 'form.politică', 1, 'Sunt de acord cu {$1}', 455, 1627397487, 1627395215),
(456, 'site.events.promo.raffle', 0, 1, 'form.submit.text', 0, 'Participă la tombolă', 456, 1627397487, 1684676996),
(457, 'site.events.promo.raffle', 0, 1, 'form.răspuns', 0, 'Te-ai înscris la tombolă cu succes', 457, 1627397487, 1627395215),
(458, 'site.events.promo.raffle', 0, 1, 'form.câmp.prenume.placeholder', 0, 'Prenume', 458, 1627397487, 1627395215),
(459, 'site.events.promo.raffle', 0, 1, 'form.câmp.nume.placeholder', 0, 'Nume', 459, 1627397487, 1627395215),
(460, 'site.events.promo.raffle', 0, 1, 'form.câmp.telefon.placeholder', 0, 'Telefon', 460, 1627397487, 1627395215),
(461, 'site.legal.cookies', 0, 4, 'SM:title', 0, '{{ SM:title }}', 461, 1684748532, 1685134162),
(462, 'site.legal.cookies', 0, 9, 'SM:description', 0, '{{ SM:description }}', 462, 1684748532, 1685134162),
(463, 'site.legal.terms', 0, 4, 'SM:title', 0, '{{ SM:title }}', 463, 1684748453, 1684748977),
(464, 'site.legal.terms', 0, 9, 'SM:description', 0, '{{ SM:description }}', 464, 1684748453, 1684748977);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `et_account_admin_logs`
--
ALTER TABLE `et_account_admin_logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `et_account_admin_profiles`
--
ALTER TABLE `et_account_admin_profiles`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `et_account_admin_roles`
--
ALTER TABLE `et_account_admin_roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `et_articles`
--
ALTER TABLE `et_articles`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `et_article_categories`
--
ALTER TABLE `et_article_categories`
  ADD PRIMARY KEY (`id_article_category`);

--
-- Indexes for table `et_configs`
--
ALTER TABLE `et_configs`
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `et_contact_forms`
--
ALTER TABLE `et_contact_forms`
  ADD PRIMARY KEY (`id_contact_form`);

--
-- Indexes for table `et_event_groups`
--
ALTER TABLE `et_event_groups`
  ADD PRIMARY KEY (`id_meeting`);

--
-- Indexes for table `et_event_meetings`
--
ALTER TABLE `et_event_meetings`
  ADD PRIMARY KEY (`id_meeting`);

--
-- Indexes for table `et_event_promo_discounts`
--
ALTER TABLE `et_event_promo_discounts`
  ADD PRIMARY KEY (`id_discount`);

--
-- Indexes for table `et_event_promo_discount_joins`
--
ALTER TABLE `et_event_promo_discount_joins`
  ADD PRIMARY KEY (`id_join`);

--
-- Indexes for table `et_event_promo_raffles`
--
ALTER TABLE `et_event_promo_raffles`
  ADD PRIMARY KEY (`id_raffle`);

--
-- Indexes for table `et_event_promo_raffle_joins`
--
ALTER TABLE `et_event_promo_raffle_joins`
  ADD PRIMARY KEY (`id_join`);

--
-- Indexes for table `et_form_appointments`
--
ALTER TABLE `et_form_appointments`
  ADD PRIMARY KEY (`id_appointment`);

--
-- Indexes for table `et_identity_logos`
--
ALTER TABLE `et_identity_logos`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `et_industries`
--
ALTER TABLE `et_industries`
  ADD PRIMARY KEY (`id_industry`);

--
-- Indexes for table `et_industry_characteristics`
--
ALTER TABLE `et_industry_characteristics`
  ADD PRIMARY KEY (`id_characteristic`);

--
-- Indexes for table `et_interesting`
--
ALTER TABLE `et_interesting`
  ADD PRIMARY KEY (`id_interesting`);

--
-- Indexes for table `et_media`
--
ALTER TABLE `et_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `et_nlp_faqs`
--
ALTER TABLE `et_nlp_faqs`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `et_services`
--
ALTER TABLE `et_services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `et_social_media`
--
ALTER TABLE `et_social_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `et_views_cms`
--
ALTER TABLE `et_views_cms`
  ADD PRIMARY KEY (`id_view_cms`);

--
-- Indexes for table `et_views_site`
--
ALTER TABLE `et_views_site`
  ADD PRIMARY KEY (`id_view_site`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `et_account_admin_logs`
--
ALTER TABLE `et_account_admin_logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `et_account_admin_profiles`
--
ALTER TABLE `et_account_admin_profiles`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `et_account_admin_roles`
--
ALTER TABLE `et_account_admin_roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `et_articles`
--
ALTER TABLE `et_articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `et_article_categories`
--
ALTER TABLE `et_article_categories`
  MODIFY `id_article_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `et_contact_forms`
--
ALTER TABLE `et_contact_forms`
  MODIFY `id_contact_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `et_event_groups`
--
ALTER TABLE `et_event_groups`
  MODIFY `id_meeting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `et_event_meetings`
--
ALTER TABLE `et_event_meetings`
  MODIFY `id_meeting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `et_event_promo_discounts`
--
ALTER TABLE `et_event_promo_discounts`
  MODIFY `id_discount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `et_event_promo_discount_joins`
--
ALTER TABLE `et_event_promo_discount_joins`
  MODIFY `id_join` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `et_event_promo_raffles`
--
ALTER TABLE `et_event_promo_raffles`
  MODIFY `id_raffle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `et_event_promo_raffle_joins`
--
ALTER TABLE `et_event_promo_raffle_joins`
  MODIFY `id_join` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `et_form_appointments`
--
ALTER TABLE `et_form_appointments`
  MODIFY `id_appointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `et_identity_logos`
--
ALTER TABLE `et_identity_logos`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `et_industries`
--
ALTER TABLE `et_industries`
  MODIFY `id_industry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `et_industry_characteristics`
--
ALTER TABLE `et_industry_characteristics`
  MODIFY `id_characteristic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `et_interesting`
--
ALTER TABLE `et_interesting`
  MODIFY `id_interesting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `et_media`
--
ALTER TABLE `et_media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `et_nlp_faqs`
--
ALTER TABLE `et_nlp_faqs`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `et_services`
--
ALTER TABLE `et_services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `et_social_media`
--
ALTER TABLE `et_social_media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `et_views_cms`
--
ALTER TABLE `et_views_cms`
  MODIFY `id_view_cms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `et_views_site`
--
ALTER TABLE `et_views_site`
  MODIFY `id_view_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
