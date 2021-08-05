-- Editeaza noile tipuri de content in CMS
-- 06/06/2021
UPDATE `views_cms` SET `value_ro` = "Serviciu"                      WHERE `global` = 1 AND type = 1 AND info = 'route.site.coaching.service';
-- 12/06/2021
UPDATE `views_cms` SET `value_ro` = "Programează-te"                WHERE `global` = 1 AND type = 1 AND info = 'route.site.appoint';
-- 14/06/2021
UPDATE `views_cms` SET `value_ro` = "Mail confirmare programare"    WHERE `global` = 1 AND type = 1 AND info = 'mails/appointments/confirmation';
UPDATE `views_cms` SET `value_ro` = 'Mail contactări noi'           WHERE `global` = 1 AND type = 1 AND info = 'crons/contacts/new.php';
UPDATE `views_cms` SET `value_ro` = 'Mail programări noi'           WHERE `global` = 1 AND type = 1 AND info = 'crons/appointments/new.php';
-- 15/06/2021
UPDATE `views_cms` SET `value_ro` = 'Mentenanță'                    WHERE `global` = 1 AND type = 1 AND info = 'route.404.maintenance';
-- 18/07/2021
UPDATE `views_cms` SET `value_ro` = 'Webinar - tombolă'             WHERE `global` = 1 AND type = 1 AND info = 'route.site.campaigns.raffle';
UPDATE `views_cms` SET `value_ro` = 'Webinar - reducere'            WHERE `global` = 1 AND type = 1 AND info = 'route.site.campaigns.discount';
