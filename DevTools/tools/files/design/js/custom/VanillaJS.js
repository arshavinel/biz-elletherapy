/*******************************************************************************
    This file (VanillaJS.js) is used at least by:
        - DevTools/helpers/functions/html.php - html()
        - App\Core\layout::compileJSHeader()
*******************************************************************************/

// insertAfter doesnt exist in Javascript Vanilla
Element.prototype.insertAfter = function(item, reference) {
    if (reference.nextSibling) {
        reference.parentNode.insertBefore(item, reference.nextSibling);
    }
    else {
        reference.parentNode.appendChild(item);
    }
};

class VanillaJS { // helps you with functions you need

    static fadeIn (el, display) { // fadeIn
        el.style.opacity = 0;
        el.style.display = display || 'block';

        (function fade() {
            var val = parseFloat(el.style.opacity);
            if ((val += 0.08) <= 1) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }

    static fadeOut (el) { // fadeOut
        el.style.opacity = 1;

        (function fade() {
            if ((el.style.opacity -= 0.1) < 0) {
                el.style.display = 'none';
            }
            else {
                requestAnimationFrame(fade);
            }
        })();
    }

    static getPathTo (element) { // the unique element path in html tree
        if (element.tagName == 'HTML') {
            return '/HTML[1]';
        }
        if (element === document.body) {
            return '/HTML[1]/BODY[1]';
        }

        var ix = 0;
        var siblings = element.parentNode.childNodes;
        for (var i=0; i<siblings.length; i++) {
            var sibling = siblings[i];
            if (sibling === element) {
                return (VanillaJS.getPathTo(element.parentNode) +'/'+ element.tagName +'['+(ix+1)+']');
            }
            if (sibling.nodeType === 1 && sibling.tagName === element.tagName) {
                ix++;
            }
        }
    }
}
