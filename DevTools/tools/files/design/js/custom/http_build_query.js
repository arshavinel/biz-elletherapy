/*******************************************************************************
    This file (http_build_query.js) is used at least by:
        - DevTools/helpers/functions/html.php - html()
        - App\Core\layout::compileJSHeader()
*******************************************************************************/
function http_build_query (obj) {
    return Object.entries(obj).map(pair => pair.map(encodeURIComponent).join("=")).join("&");
}
