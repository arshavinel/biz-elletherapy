-- 05/06/2021 - Transforma SEO descrierile, tip input, in textarea
UPDATE views_site SET type = 9
    WHERE `global` = 0 AND type = 4 AND (info = 'description' OR info = 'SM:description');
