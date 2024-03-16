layui.define(["jquery"], (function (exports) {
    var $               = layui.$;
    var modFile         = layui.cache.modules["tinymce"];
    var modPath         = modFile.substr(0, modFile.lastIndexOf("."));
    var setter          = layui.setter || {};
    var response        = setter.response || {};
    var plugin_filename = "tinymce.min.js";

    var settings = {
        base_url         : modPath,
        images_upload_url: "",
        language         : "zh_CN",
        response         : {
            statusName: response.statusName || "code",
            msgName   : response.msgName || "msg",
            dataName  : response.dataName || "data",
            statusCode: response.statusCode || {ok: 0}
        },
        success          : function (res, succFun, failFun) {
            if (res[this.response.statusName] == this.response.statusCode.ok)
            {
                succFun(res[this.response.dataName]);
            }
            else
            {
                failFun(res[this.response.msgName]);
            }
        }
    };

    var t    = {};
    t.render = function (options, callback) {
        initTinymce();
        var option = initOptions(options, callback),
            edit   = t.get(option.elem);
        if (edit)
        {
            edit.destroy();
        }
        tinymce.init(option);
        return t.get(option.elem);
    };

    t.init = t.render;
    t.get  = function (elem) {
        initTinymce();
        if (elem && /^#|\./.test(elem))
        {
            var id   = elem.substr(1);
            var edit = tinymce.editors[id];
            return edit;
        }
        else
        {
            return false;
        }
    };

    t.reload = function (elem, option, callback) {
        var options = {};
        if (typeof elem == "string")
        {
            option.elem = elem;
            options     = $.extend({}, option);
        }
        else if (typeof elem == "object" && typeof elem.elem == "string")
        {
            options  = $.extend({}, elem);
            callback = option;
        }
        var optionCache = layui.sessionData("layui-tinymce")[options.elem];
        delete optionCache.init_instance_callback;
        $.extend(optionCache, options);
        return t.render(optionCache, callback);
    };

    function initOptions(option, callback)
    {
        var admin                           = layui.admin || {};
        var form                            = option.form || {};
        var file_field                      = form.name || "edit";
        var form_data                       = form.data || {};
        option.suffix                       = isset(option.suffix) ? option.suffix : plugin_filename.indexOf(".min") > -1 ? ".min" : "";
        option.base_url                     = isset(option.base_url) ? option.base_url : settings.base_url;
        option.language                     = isset(option.language) ? option.language : settings.language;
        option.selector                     = isset(option.selector) ? option.selector : option.elem;
        option.quickbars_selection_toolbar  = isset(option.quickbars_selection_toolbar) ? option.quickbars_selection_toolbar : "cut copy | bold italic underline strikethrough ";
        option.plugins                      = isset(option.plugins) ? option.plugins : "code kityformula-editor quickbars print preview searchreplace autolink fullscreen image link media codesample table charmap hr advlist lists wordcount imagetools indent2em";
        option.toolbar                      = isset(option.toolbar) ? option.toolbar : "code undo redo | kityformula-editor forecolor backcolor bold italic underline strikethrough | indent2em alignleft aligncenter alignright alignjustify outdent indent | link bullist numlist image table codesample | formatselect fontselect fontsizeselect";
        option.resize                       = isset(option.resize) ? option.resize : false;
        option.elementpath                  = isset(option.elementpath) ? option.elementpath : false;
        option.branding                     = isset(option.branding) ? option.branding : false;
        option.contextmenu_never_use_native = isset(option.contextmenu_never_use_native) ? option.contextmenu_never_use_native : true;
        option.menubar                      = isset(option.menubar) ? option.menubar : "file edit insert format table";
        option.menu                         = isset(option.menu) ? option.menu : {
            file  : {
                title: "文件",
                items: "newdocument | print preview fullscreen | wordcount"
            },
            edit  : {
                title: "编辑",
                items: "undo redo | cut copy paste pastetext selectall | searchreplace"
            },
            format: {
                title: "格式",
                items: "bold italic underline strikethrough superscript subscript | formats | forecolor backcolor | removeformat"
            },
            table : {
                title: "表格",
                items: "inserttable tableprops deletetable | cell row column"
            }
        };

        option.init_instance_callback = isset(option.init_instance_callback) ? option.init_instance_callback : function (inst) {
            if (typeof callback == "function") callback(option, inst);
        };

        option.images_upload_url = isset(option.images_upload_url) ? option.images_upload_url : settings.images_upload_url;

        option.images_upload_handler = isset(option.images_upload_handler) ? option.images_upload_handler : function (blobInfo, succFun, failFun) {
            if (isEmpty(option.images_upload_url))
            {
                failFun("上传接口未配置");
                return console.error("images_upload_url未配置");
            }
            var formData = new FormData;
            formData.append(file_field, blobInfo.blob());
            if (typeof form_data == "object")
            {
                for (var key in form_data)
                {
                    formData.append(key, form_data[key]);
                }
            }
            var ajaxOpt = {
                url        : option.images_upload_url,
                dataType   : "json",
                type       : "POST",
                data       : formData,
                processData: false,
                contentType: false,
                success    : function (res) {
                    settings.success(res, succFun, failFun);
                },
                error      : function (res) {
                    failFun("网络错误：" + res.status);
                }
            };
            if (typeof admin.req == "function")
            {
                admin.req(ajaxOpt);
            }
            else
            {
                $.ajax(ajaxOpt);
            }
        };
        layui.sessionData("layui-tinymce", {
            key  : option.selector,
            value: option
        });
        return option;
    }

    function initTinymce()
    {
        if (typeof tinymce == "undefined")
        {
            $.ajax({
                url     : settings.base_url + "/" + plugin_filename,
                dataType: "script",
                cache   : true,
                async   : false
            });
        }
    }

    function isset(value)
    {
        return typeof value !== "undefined" && value !== null;
    }

    function isEmpty(value)
    {
        if (typeof value === "undefined" || value === null || value === "")
        {
            return true;
        }
        else if (value instanceof Array && value.length === 0)
        {
            return true;
        }
        else if (typeof value === "object" && Object.keys(value).length === 0)
        {
            return true;
        }
        return false;
    }

    exports("tinymce", t);
}));