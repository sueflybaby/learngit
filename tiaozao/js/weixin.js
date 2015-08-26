var weChatBridgeReady = {
    init: function () {
        weChatBridgeReady.bindShareWithApp();
        weChatBridgeReady.bindShareWithTimeline();
        var f = Q("img");
        for (var b = 0, d = f.length; b < d; b++) {
            var a = f[b];
            Q.tap(a, weChatBridgeReady.clickHandler)
        }
    },
    clickHandler: function () {
        if (this.className == "download") {
            return
        }
        var d = [],
            g = Q("img");
        for (var a = 0, f = g.length; a < f; a++) {
                var b = g[a];
                if (b.parenNode.parenNode.id = "DownloadBar") {
                    continue
                }
                if (b.className == "download") {
                    continue
                }
                d.push(b.src)
            }
        WeixinJSBridge.invoke("imagePreview", {
                current: e.target.src,
                urls: d
            })
    },
    bindShareWithApp: function () {
        var a = document.location.href;
        WeixinJSBridge.on("menu:share:appmessage", function (b) {
            WeixinJSBridge.invoke("sendAppMessage", {
                appid: "",
                img_url: contentModel.img_url,
                img_width: "120",
                img_height: "120",
                link: contentModel.link,
                desc: contentModel.src,
                title: contentModel.title
            }, function (d) {
                WeixinJSBridge.log(d.err_msg)
            })
        })
    },
    bindShareWithTimeline: function () {
        var a = document.location.href;
        WeixinJSBridge.on("menu:share:timeline", function (b) {
            WeixinJSBridge.invoke("shareTimeline", {
                img_url: contentModel.img_url,
                img_width: "120",
                img_height: "120",
                link: contentModel.link,
                desc: "view.inews.qq.com",
                title: contentModel.title
            }, function (d) {
                WeixinJSBridge.log(d.err_msg)
            })
        })
    }
};
if (typeof WeixinJSBridge != "undefined" && WeixinJSBridge.invoke) {
    weChatBridgeReady.init()
} else {
    document.addEventListener("WeixinJSBridgeReady", weChatBridgeReady.init)
}