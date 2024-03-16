function getMods()
{
    return [
        "admin",
        "colorpicker",
        "common",
        "menu",
        "frame",
        "tab",
        "echarts",
        "echartsTheme",
        "encrypt",
        "select",
        "drawer",
        "notice",
        "step",
        "tag",
        "popup",
        "treetable",
        "dtree",
        "tinymce",
        "area",
        "count",
        "topBar",
        "button",
        "card",
        "loading",
        "cropper",
        "convert",
        "yaml",
        "context",
        "http",
        "theme",
        "message",
        "toast",
        "iconPicker",
        "nprogress",
        "watermark",
        "fullscreen",
        "firstMod",
        "popover"
    ];
}


function formatSize(fileSizeInBytes)
{
    const sizeUnit = [
        "Bytes",
        "KB",
        "MB",
        "GB",
        "TB"
    ];

    const sizeType = parseInt(
        Math.floor(Math.log(fileSizeInBytes) / Math.log(1024)).toString()
    );

    const size = (fileSizeInBytes / Math.pow(1024, sizeType)).toFixed(2);
    return size + sizeUnit[sizeType];
}

// layui 通用设置
layui.use(getMods(), function () {
    let $ = layui.$;
    /*

     layui.laytpl.config({
     open : "{#",
     close: "#}"
     });

     */

    layui.form.verify({
        // 验证密码，且为必填项
        password: function (value, elem) {
            if (!/^[\S]{6,16}$/.test(value))
            {
                return "密码必须为 6 到 16 位的非空字符";
            }
        }
    });


    $(".single_img_preview").on({
        "click": function () {
            layer.photos({
                photos: {
                    "title": "预览图片",
                    "start": 0,
                    "data" : [
                        {
                            "alt": "预览图片",
                            "src": $(this).attr("src")
                        }
                    ]
                },
                footer: false
            });

        }
    });
});
