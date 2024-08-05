/***************************************************************/
// Name              : Javascript Textarea BBCode Markup Editor
// Version           : 1.3
// Author            : Balakrishnan
// Last Modified Date: 25/jan/2009
// License           : Free
// URL               : [url]http://www.corpocrat.com[/url]
//
// Erweitert und mit neuen Funktionen versehen 24/03/2010
// Cerberus bei [url="http://www.netvision-technik.de"]NetVision-Technik[/url]
/*************************************************************/

let textarea;
let content;

function edToolbar(obj, url, png, full) {
    const end = png === 'true' ? 'png' : 'gif';

    const fontoptions = [
        "Arial", "Arial Black", "Arial Narrow", "Book Antiqua", "Century Gothic", "Comic Sans MS",
        "Courier New", "Fixedsys", "Franklin Gothic Medium", "Garamond", "Georgia", "Impact",
        "Lucida Console", "Lucida Sans Unicode", "Microsoft Sans Serif", "Palatino Linotype",
        "System", "Tahoma", "Times New Roman", "Trebuchet MS", "Verdana"
    ];

    const sizeoptions = [1, 2, 3, 4, 5, 6, 7];
    const coloroptions = [
        "#000000", "#8A4117", "#667C26", "#254117", "#2B3856", "#000080", "#4B0082",
        "#2F4F4F", "#8B0000", "#FF8C00", "#808000", "#008000", "#008080", "#0000FF",
        "#708090", "#696969", "#FF0000", "#F4A460", "#9ACD32", "#48D1CC", "#4169E1",
        "#800080", "#808080", "#FF00FF", "#FFA500", "#FFFF00", "#00FF00", "#00FFFF",
        "#00BFFF", "#9932CC", "#C0C0C0", "#FFC0CB", "#F5DEB3", "#FFFACD", "#98FB98",
        "#AFEEEE", "#ADD8E6", "#DDA0DD", "#FFFFFF"
    ];

    document.write(`
        <div class="toolbar">
            <div style="float: left;">
                <img class="button" src="${url}/removeformat.${end}" name="btnBold" title="Formatierung entfernen" onClick="doRemoveTags('${obj}')" />
                <img src="${url}/separator.gif" />
            </div>
            <div style="float: left;">
                <img class="button" src="${url}/bold.${end}" name="btnBold" title="Fett" onClick="doAddTags('[b]','[/b]','${obj}')" />
                <img class="button" src="${url}/italic.${end}" name="btnItalic" title="Kursiv" onClick="doAddTags('[i]','[/i]','${obj}')" />
                <img class="button" src="${url}/underline.${end}" name="btnUnderline" title="Unterstrichen" onClick="doAddTags('[u]','[/u]','${obj}')" />
    `);

    if (full === 'yes') {
        document.write(`<img class="button" src="${url}/pre.${end}" name="btnPre" title="Blockschrift" onClick="doAddTags('[pre]','[/pre]','${obj}')" />`);
    }

    document.write(`
                <img src="${url}/separator.gif" />
            </div>
            <div style="float: left;">
                <div style="float:left;"><img class="button" src="${url}/color.${end}" id="popColor" title="Textfarbe" onClick="showpopup('color','popColor')" /></div>
                <div style="float:left;"><img class="button" src="${url}/menupop.${end}" id="popColorMenu" onClick="showpopup('color','popColor')" /></div>
                <img src="${url}/separator.gif" />
            </div>
            <div style="float: left;">
    `);

    if (full === 'yes') {
        document.write(`<img class="button" src="${url}/center.${end}" name="btnLink" title="zentriert" onClick="doAddTags('[center]','[/center]','${obj}')" />`);
    }

    document.write(`
                <img class="button" src="${url}/link.${end}" name="btnLink" title="URL Link" onClick="doURL('${obj}')" />
                <img class="button" src="${url}/unlink.${end}" name="btnunLink" title="Links entfernen" onClick="doRemoveURL('${obj}')" />
                <img class="button" src="${url}/image.${end}" name="btnPicture" title="Bild" onClick="doImage('${obj}')" />
    `);

    if (full === 'yes') {
        document.write(`
                    <img src="${url}/separator.gif" />
                    <img class="button" src="${url}/orderedlist.${end}" name="btnList" title="nummerierte Liste" onClick="doList('[list=1]','[/list]','${obj}')" />
                    <img class="button" src="${url}/unorderedlist.${end}" name="btnList" title="normale Liste" onClick="doList('[list]','[/list]','${obj}')" />
                    <img src="${url}/separator.gif" />
                    <img class="button" src="${url}/quote.${end}" name="btnQuote" title="Zitat" onClick="doAddTags('[quote]','[/quote]','${obj}')" />
                    <img src="${url}/separator.gif" />
                    <img class="button" src="${url}/smilie.${end}" name="btnSmilie" title="Smileys anzeigen/ausblenden" onClick="doViewSmilie('smiliebar')" />
        `);
    }

    document.write(`
            </div>
        </div>
        <br style="clear: left;" />
    `);

    document.write(`<div id="font" style="display: none; z-index: 100; border: 1px solid black; overflow: auto; width: 120px; height: 120px;">`);
    for (let i = 0; i < fontoptions.length; i++) {
        document.write(`<div class="button" style="font-family:'${fontoptions[i]}'; color: #000000;" onClick="doSetFont('${fontoptions[i]}','${obj}')">${fontoptions[i]}</div>`);
    }
    document.write(`</div>`);

    document.write(`<div id="size" style="display: none; z-index: 100; border: 1px solid black; text-align: center;">`);
    for (let i = 0; i < sizeoptions.length; i++) {
        document.write(`<font class="button" size="${sizeoptions[i]}" color="#000000" onClick="doSetSize('${sizeoptions[i]}','${obj}')">${sizeoptions[i]}</font><br />`);
    }
    document.write(`</div>`);

    document.write(`<div id="color" style="display: none; z-index: 100; border: 1px solid black; text-align: center;">`);
    for (let i = 0; i < coloroptions.length; i++) {
        if (i % 8 === 0 && i !== 0) {
            document.write(`<br style="clear: left;" />`);
        }
        document.write(`<div class="button" style="background-color: ${coloroptions[i]}; width: 15px; height: 15px; float: left;" onClick="doSetColor('${coloroptions[i]}','${obj}')"></div>`);
    }
    document.write(`</div>`);

    document.write(`<div id="bbcode" style="display: none; z-index: 200; overflow: auto;"></div>`);
}


const smilieliste = [
    { code: ':)', bild: 'smile.png' },
    { code: ':D', bild: 'laugh.png' },
    { code: ';)', bild: 'wink.png' },
    // Weitere Smileys hinzufügen
];

function edSmilye(obj, url, anz) {
    anz = parseInt(anz);
    if (isNaN(anz) || anz <= 0) {
        console.error('Invalid value for "anz":', anz);
        return;
    }

    const smilieBar = document.createElement('div');
    smilieBar.className = 'smiliebar';
    smilieBar.id = 'smiliebar';
    smilieBar.style.float = 'left';

    for (let i = 0; i < smilieliste.length; i++) {
        const einzel = smilieliste[i];
        const code = einzel.code;
        const bild = einzel.bild;

        if (i % anz === 0 && i !== 0) {
            const br = document.createElement('br');
            br.style.clear = 'left';
            smilieBar.appendChild(br);
        }

        const smilieDiv = document.createElement('div');
        smilieDiv.style.cssText = 'float:left; text-align:center; width:30px; height:30px;';
        const smilieImg = document.createElement('img');
        smilieImg.className = 'button';
        smilieImg.src = `${url}/${bild}`;
        smilieImg.title = code;
        smilieImg.onclick = function() {
            doAddTags(code, '', obj);
        };

        smilieDiv.appendChild(smilieImg);
        smilieBar.appendChild(smilieDiv);
    }

    document.body.appendChild(smilieBar);
}

function doViewSmilie(div) {
    const box = document.getElementById(div);

    if (box) {
        box.style.display = (box.style.display === "none" || box.style.display === "") ? "inline" : "none";
    } else {
        console.error('Element with id "' + div + '" not found.');
    }
}

function doRemoveTags(obj) {
    const textarea = document.getElementById(obj);
    let txt = textarea.value;
    const simpel_strip = ['b', 'i', 'u', 'center', 'pre', 'quote'];
    const complex_strip = ['font', 'color', 'size'];

    // Einfache Tags entfernen
    simpel_strip.forEach(tag => {
        const opentag = '[' + tag + ']';
        const closetag = '[/' + tag + ']';

        while (txt.indexOf(opentag) !== -1) {
            const startindex = txt.indexOf(opentag);
            const stopindex = txt.indexOf(closetag, startindex);

            if (stopindex !== -1) {
                const text = txt.substring(startindex + opentag.length, stopindex);
                txt = txt.substring(0, startindex) + text + txt.substring(stopindex + closetag.length);
            } else {
                break;
            }
        }
    });

    // Komplexe Tags mit Parametern entfernen
    complex_strip.forEach(tag => {
        const opentag = '[' + tag + '=';
        const closetag = '[/' + tag + ']';

        while (txt.indexOf(opentag) !== -1) {
            const startindex = txt.indexOf(opentag);
            const stopindex = txt.indexOf(closetag, startindex);

            if (stopindex !== -1) {
                const openend = txt.indexOf(']', startindex);
                if (openend !== -1 && openend > startindex && openend < stopindex) {
                    const text = txt.substring(openend + 1, stopindex);
                    txt = txt.substring(0, startindex) + text + txt.substring(stopindex + closetag.length);
                } else {
                    break;
                }
            } else {
                break;
            }
        }
    });

    // Bereinigten Code zurückgeben
    textarea.value = txt;
}


function doRemoveURL(obj) {
    const textarea = document.getElementById(obj);
    let txt = textarea.value;
    const iterations = -1;

    const removeTag = (opentag, closetag) => {
        let stopindex = 0;
        let startindex = 0;
        let openend = 0;

        while ((startindex = txt.indexOf(opentag)) !== -1 && iterations != 0) {
            if ((stopindex = txt.indexOf(closetag)) !== -1) {
                openend = txt.indexOf(']', startindex);
                if (openend !== -1 && openend > startindex && openend < stopindex) {
                    const text = txt.substring(openend + 1, stopindex);
                    txt = txt.substring(0, startindex) + text + txt.substring(stopindex + closetag.length);
                } else {
                    break;
                }
            } else {
                break;
            }
        }
    };

    removeTag('[url=', '[/url]');
    removeTag('[url]', '[/url]');

    textarea.value = txt;
}

function doImage(obj) {
    const textarea = document.getElementById(obj);
    const url = prompt('Bitte Bild-URL angeben:', 'http://');
    const scrollTop = textarea.scrollTop;
    const scrollLeft = textarea.scrollLeft;

    if (url) {
        if (document.selection) {
            textarea.focus();
            const sel = document.selection.createRange();
            sel.text = '[img]' + url + '[/img]';
        } else {
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const rep = '[img]' + url + '[/img]';

            textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
            textarea.scrollTop = scrollTop;
            textarea.scrollLeft = scrollLeft;
        }
    }
}

function doURL(obj) {
    const textarea = document.getElementById(obj);
    const url = prompt('Bitte eine URL angeben:', 'http://');
    const scrollTop = textarea.scrollTop;
    const scrollLeft = textarea.scrollLeft;

    if (url) {
        if (document.selection) {
            textarea.focus();
            const sel = document.selection.createRange();

            if (sel.text == "") {
                sel.text = '[url]' + url + '[/url]';
            } else {
                sel.text = '[url=' + url + ']' + sel.text + '[/url]';
            }
        } else {
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const sel = textarea.value.substring(start, end);
            const rep = sel ? '[url=' + url + ']' + sel + '[/url]' : '[url]' + url + '[/url]';

            textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
            textarea.scrollTop = scrollTop;
            textarea.scrollLeft = scrollLeft;
        }
    }
}

function doAddTags(tag1, tag2, obj) {
    const textarea = document.getElementById(obj);

    if (document.selection) {
        textarea.focus();
        const sel = document.selection.createRange();
        sel.text = tag1 + sel.text + tag2;
    } else {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const sel = textarea.value.substring(start, end);
        const rep = tag1 + sel + tag2;

        textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
        textarea.scrollTop = textarea.scrollTop;
        textarea.scrollLeft = textarea.scrollLeft;
    }
    textarea.focus();
}

function doSetSize(size, obj) {
    const textarea = document.getElementById(obj);
    size = parseInt(size);

    if (document.selection) {
        textarea.focus();
        const sel = document.selection.createRange();
        sel.text = "[size=" + size + "]" + sel.text + "[/size]";
    } else {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const sel = textarea.value.substring(start, end);
        const rep = "[size=" + size + "]" + sel + "[/size]";

        textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
        textarea.scrollTop = textarea.scrollTop;
        textarea.scrollLeft = textarea.scrollLeft;
    }

    document.getElementById("size").style.display = "none";
}

function doSetFont(font, obj) {
    const textarea = document.getElementById(obj);

    if (document.selection) {
        textarea.focus();
        const sel = document.selection.createRange();
        sel.text = "[font=" + font + "]" + sel.text + "[/font]";
    } else {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const sel = textarea.value.substring(start, end);
        const rep = "[font=" + font + "]" + sel + "[/font]";

        textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
        textarea.scrollTop = textarea.scrollTop;
        textarea.scrollLeft = textarea.scrollLeft;
    }

    document.getElementById("font").style.display = "none";
}

function doSetColor(color, obj) {
    const textarea = document.getElementById(obj);

    if (document.selection) {
        textarea.focus();
        const sel = document.selection.createRange();
        sel.text = "[color=" + color + "]" + sel.text + "[/color]";
    } else {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const sel = textarea.value.substring(start, end);
        const rep = "[color=" + color + "]" + sel + "[/color]";

        textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
        textarea.scrollTop = textarea.scrollTop;
        textarea.scrollLeft = textarea.scrollLeft;
    }

    document.getElementById("color").style.display = "none";
}

function doList(tag1, tag2, obj) {
    const textarea = document.getElementById(obj);

    if (document.selection) {
        textarea.focus();
        const sel = document.selection.createRange();
        const list = sel.text.split('\n');

        for (let i = 0; i < list.length; i++) {
            list[i] = '[*]' + list[i];
        }
        sel.text = tag1 + '\n' + list.join("\n") + '\n' + tag2;
    } else {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const sel = textarea.value.substring(start, end);
        const list = sel.split('\n');

        for (let i = 0; i < list.length; i++) {
            list[i] = '[*]' + list[i];
        }

        const rep = tag1 + '\n' + list.join("\n") + '\n' + tag2;

        textarea.value = textarea.value.substring(0, start) + rep + textarea.value.substring(end);
        textarea.scrollTop = textarea.scrollTop;
        textarea.scrollLeft = textarea.scrollLeft;
    }
}

function stripos(f_haystack, f_needle, f_offset = 0) {
    const haystack = f_haystack.toLowerCase();
    const needle = f_needle.toLowerCase();
    const index = haystack.indexOf(needle, f_offset);

    return index !== -1 ? index : false;
}

function showpopup(div, wer) {
    const menu = document.getElementById(div);
    const sender = document.getElementById(wer);

    if (menu.style.display === "none") {
        const pos = getPosition(sender);

        if (wer === "popFont") {
            menu.style.left = (pos.x - 58) + "px";
        } else if (wer === "popColor") {
            menu.style.left = pos.x + "px";
        } else {
            menu.style.left = (pos.x - 40) + "px";
        }

        menu.style.top = (pos.y + 17) + "px";
        menu.style.backgroundColor = "#FFFFFF";
        menu.style.padding = "3px";
        menu.style.position = "absolute";
        menu.style.display = "inline";
    } else {
        menu.style.display = "none";
    }
}

function getPosition(was) {
    let div = was;
    let x = 0;
    let y = 0;

    while (div && typeof div.tagName !== "undefined") {
        const tagname = div.tagName.toUpperCase();
        y += div.offsetTop;
        x += div.offsetLeft;

        if (tagname === "BODY") {
            div = null;
        } else {
            div = div.offsetParent;
        }
    }

    return { x, y };
}

function doHelp() {
    const popup = document.getElementById('bbcode');
    const divwidth = 800;
    const divheight = 700;
    const scrolly = Ywindow();
    let setX = (window.innerWidth - divwidth) / 2;
    let setY = (window.innerHeight - divheight) / 2 + scrolly;

    ajax_nv('6', '0');

    setX = Math.max(setX, 0);
    setY = Math.max(setY, 0);

    popup.style.padding = "3px";
    popup.style.width = divwidth + "px";
    popup.style.height = divheight + "px";
    popup.style.left = setX + "px";
    popup.style.top = setY + "px";
    popup.style.backgroundColor = "#000000";
    popup.style.position = "absolute";
    popup.style.display = "block";
}

function Ywindow() {
    return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
}

function doHideHelp() {
    const popup = document.getElementById('bbcode');

    popup.innerHTML = "";
    popup.style.display = "none";
}