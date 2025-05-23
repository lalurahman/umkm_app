$(function () {
    var e =
            "dark" === $("html").attr("data-bs-theme")
                ? "default-dark"
                : "default",
        t = $("#jstree-basic"),
        s = $("#jstree-custom-icons"),
        n = $("#jstree-context-menu"),
        c = $("#jstree-drag-drop"),
        a = $("#jstree-checkbox"),
        i = $("#jstree-ajax");
    t.length && t.jstree({ core: { themes: { name: e } } }),
        s.length &&
            s.jstree({
                core: {
                    themes: { name: e },
                    data: [
                        {
                            text: "css",
                            children: [
                                { text: "app.css", type: "css" },
                                { text: "style.css", type: "css" },
                            ],
                        },
                        {
                            text: "img",
                            state: { opened: !0 },
                            children: [
                                { text: "bg.jpg", type: "img" },
                                { text: "logo.jpg", type: "img" },
                                { text: "avatar.png", type: "img" },
                            ],
                        },
                        {
                            text: "js",
                            state: { opened: !0 },
                            children: [
                                { text: "jquery.js", type: "js" },
                                { text: "app.js", type: "js" },
                            ],
                        },
                        { text: "index.html", type: "html" },
                        { text: "page-one.html", type: "html" },
                        { text: "page-two.html", type: "html" },
                    ],
                },
                plugins: ["types"],
                types: {
                    default: { icon: "icon-base bx bx-folder" },
                    html: { icon: "icon-base bx bxl-html5 bg-danger" },
                    css: { icon: "icon-base bx bxl-css3 bg-info" },
                    img: { icon: "icon-base bx bx-image bg-success" },
                    js: { icon: "icon-base bx bxl-nodejs bg-warning" },
                },
            }),
        n.length &&
            n.jstree({
                core: {
                    themes: { name: e },
                    check_callback: !0,
                    data: [
                        {
                            text: "css",
                            children: [
                                { text: "app.css", type: "css" },
                                { text: "style.css", type: "css" },
                            ],
                        },
                        {
                            text: "img",
                            state: { opened: !0 },
                            children: [
                                { text: "bg.jpg", type: "img" },
                                { text: "logo.jpg", type: "img" },
                                { text: "avatar.png", type: "img" },
                            ],
                        },
                        {
                            text: "js",
                            state: { opened: !0 },
                            children: [
                                { text: "jquery.js", type: "js" },
                                { text: "app.js", type: "js" },
                            ],
                        },
                        { text: "index.html", type: "html" },
                        { text: "page-one.html", type: "html" },
                        { text: "page-two.html", type: "html" },
                    ],
                },
                plugins: ["types", "contextmenu"],
                types: {
                    default: { icon: "icon-base bx bx-folder" },
                    html: { icon: "icon-base bx bxl-html5 bg-danger" },
                    css: { icon: "icon-base bx bxl-css3 bg-info" },
                    img: { icon: "icon-base bx bx-image bg-success" },
                    js: { icon: "icon-base bx bxl-nodejs bg-warning" },
                },
            }),
        c.length &&
            c.jstree({
                core: {
                    themes: { name: e },
                    check_callback: !0,
                    data: [
                        {
                            text: "css",
                            children: [
                                { text: "app.css", type: "css" },
                                { text: "style.css", type: "css" },
                            ],
                        },
                        {
                            text: "img",
                            state: { opened: !0 },
                            children: [
                                { text: "bg.jpg", type: "img" },
                                { text: "logo.jpg", type: "img" },
                                { text: "avatar.png", type: "img" },
                            ],
                        },
                        {
                            text: "js",
                            state: { opened: !0 },
                            children: [
                                { text: "jquery.js", type: "js" },
                                { text: "app.js", type: "js" },
                            ],
                        },
                        { text: "index.html", type: "html" },
                        { text: "page-one.html", type: "html" },
                        { text: "page-two.html", type: "html" },
                    ],
                },
                plugins: ["types", "dnd"],
                types: {
                    default: { icon: "icon-base bx bx-folder" },
                    html: { icon: "icon-base bx bxl-html5 bg-danger" },
                    css: { icon: "icon-base bx bxl-css3 bg-info" },
                    img: { icon: "icon-base bx bx-image bg-success" },
                    js: { icon: "icon-base bx bxl-nodejs bg-warning" },
                },
            }),
        a.length &&
            a.jstree({
                core: {
                    themes: { name: e },
                    data: [
                        {
                            text: "css",
                            children: [
                                { text: "app.css", type: "css" },
                                { text: "style.css", type: "css" },
                            ],
                        },
                        {
                            text: "img",
                            state: { opened: !0 },
                            children: [
                                { text: "bg.jpg", type: "img" },
                                { text: "logo.jpg", type: "img" },
                                { text: "avatar.png", type: "img" },
                            ],
                        },
                        {
                            text: "js",
                            state: { opened: !0 },
                            children: [
                                { text: "jquery.js", type: "js" },
                                { text: "app.js", type: "js" },
                            ],
                        },
                        { text: "index.html", type: "html" },
                        { text: "page-one.html", type: "html" },
                        { text: "page-two.html", type: "html" },
                    ],
                },
                plugins: ["types", "checkbox", "wholerow"],
                types: {
                    default: { icon: "icon-base bx bx-folder" },
                    html: { icon: "icon-base bx bxl-html5 bg-danger" },
                    css: { icon: "icon-base bx bxl-css3 bg-info" },
                    img: { icon: "icon-base bx bx-image bg-success" },
                    js: { icon: "icon-base bx bxl-nodejs bg-warning" },
                },
            }),
        i.length &&
            i.jstree({
                core: {
                    themes: { name: e },
                    data: {
                        url: assetsPath + "json/jstree-data.json",
                        dataType: "json",
                        data: function (e) {
                            return { id: e.id };
                        },
                    },
                },
                plugins: ["types", "state"],
                types: {
                    default: { icon: "icon-base bx bx-folder" },
                    html: { icon: "icon-base bx bxl-html5 bg-danger" },
                    css: { icon: "icon-base bx bxl-css3 bg-info" },
                    img: { icon: "icon-base bx bx-image bg-success" },
                    js: { icon: "icon-base bx bxl-nodejs bg-warning" },
                },
            });
});
