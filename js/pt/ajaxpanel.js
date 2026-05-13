window.AjaxPanel = AjaxPanel = {
    init: function(panel) {
        if (panel.filterId == null) {
            panel.filterId = panel.id;
        }
        panel.docLocation = document.location.href.toString();
        if(!panel.location) panel.location = panel.docLocation;
        panel.href = panel.location;
        panel.relPanels = [];
        panel.addFormFilter = true;
    },

    reload: function(panel) {
        if (!panel.location)
            return;	
        var requestUrl = panel.location;
        if (panel.addFormFilter) requestUrl = AjaxPanel._addParam(requestUrl, "FormFilter", panel.filterId);
        AjaxPanel._showProgress();
        new Ajax.Request(requestUrl, {
            method: 'get',
            requestHeaders: ['If-Modified-Since', new Date(0)],
            onSuccess: function(transport) {
                panel.location = requestUrl;
                AjaxPanel._hideProgress();
                AjaxPanel._update(panel, transport.responseText);
                // BEGIN my change
                //AjaxPanel._reloadRelPanels(panel);
                // END my change
            }
        });
    },

    configPanel: function(panel) {
        var diffLoc = !AjaxPanel._matchPages(panel.href, panel.docLocation);
        // if panel has same location as document
        if (!diffLoc) {
            if (panel.childrenAsTriggers) AjaxPanel._bind(panel);
            window.setTimeout(panel.id + "_bind(window)", 0);
        } else { panel.addFormFilter = false; }
        // if panel has different location then document
        if (diffLoc && panel.startOnLoad) AjaxPanel.reload(panel);
    },

    _bind: function(panel) {
        var links = $$("#" + panel.id + " a");
        var inputs = $$("#" + panel.id + " input");
        var forms = $$("#" + panel.id + " form");
        for (var i = 0; i < links.length; i++) {
            var link = links[i];
            if (link.target == "" || link.target.toLowerCase() == "_self")
            if (AjaxPanel._matchPages(panel.href, link.href)) {
                link.panel = panel;
                link.onclick = function() { return false; }
                link.observe("click", AjaxPanel._linkClick);
            } else {
                // BEGIN my change
                var divs = document.body.getElementsByTagName('div');

                for (var j = 0; j < divs.length; j++) {
                    if (divs[j].location && AjaxPanel._matchPages(divs[j].location, link.href)) {
                        link.panel = panel;
                        link.onclick = function () {
                            var divs = document.getElementsByTagName('div');
                            var _href = this.getAttribute("href");
                            var p = String(_href.substring(_href.indexOf("?") + 1)).toQueryParams();

                            for (var i = 0; i < divs.length; i++)
                                if (divs[i].location && AjaxPanel._matchPages(divs[i].location, _href)) {
                                    // adding new params
                                    if (divs[i].parentParams) {
                                        for (var n in p) {
                                            if (n != "FormFilter" && n != "ccsForm") {
                                                divs[i].location = AjaxPanel._addParam(divs[i].location, n, p[n]);
                                            }
                                        }
                                    }
                                    // clearing empty params
                                    divs[i].location = AjaxPanel._removeEmptyParams(divs[i].location);
                                    // adding divs[i].id to relPanels
                                    AjaxPanel._addToRelPanels(divs[i], this.panel.id);
                                    // refresh
                                    AjaxPanel.reload(divs[i]);
                            }

                            return false;
                        };
                    }
                }
                // END my change
            }
        }
        if (forms.length > 0) {
            window.ccs_ap_f = function (currentFormId) {
                var currentForm = document.getElementById(currentFormId);
                if (!currentForm) currentForm = document.forms[currentFormId];
                var existingSubmit = currentForm.onsubmit ? currentForm.onsubmit : function() {};
                currentForm.onsubmit = function(e) {
                    if (existingSubmit.apply(this) != false && typeof this.submitted == "undefined") {
                        try {
                            if(typeof(FCKeditorAPI) == "object") {
                                var textareas = this.getElementsByTagName("textarea");
                                for (var t = 0; t < textareas.length; t++) {
                                    var textareaId = textareas[t].getAttribute("id");
                                    if (textareaId && textareaId != "")
                                    {
                                        var fckInstance = FCKeditorAPI.GetInstance(textareaId);
                                        if (fckInstance) fckInstance.UpdateLinkedField();
                                    }
                                }
                            }
                        }
                        catch(err) { }
                        // BEGIN my change
                        if (AjaxPanel._matchPages(this.panel.location, this.action)) {
                            AjaxPanel._submitForm(this);

                            // currentForm.submitted:
                            // is needed for YUI because it submits a from twice when pressing Enter for submitting,
                            // first, on a form keypress, second, on a button keypress (if it is a submit button)
                            this.submitted = true;
                            //this.onsubmit = function () { return false; alert(1); }
                        } else {
                            var divs = document.getElementsByTagName('div');
                            var h = $(this).serialize();
                            var p = h.toQueryParams();

                            for (var i = 0; i < divs.length; i++)
                                if (divs[i].location && AjaxPanel._matchPages(divs[i].location, this.action)) {
                                    // adding new params
                                    for (var n in p) {
                                        divs[i].location = AjaxPanel._addParam(divs[i].location, n, p[n]);
                                    }
                                    // clearing empty params
                                    divs[i].location = AjaxPanel._removeEmptyParams(divs[i].location);
                                    // refresh
                                    AjaxPanel.reload(divs[i]);
                                }
                            }
                        // END my change
                    }
                    return false;
                };
            };
            for (var i = 0; i < forms.length; i++) {
                var currentForm = forms[i];
                currentForm.panel = panel;
                currentForm.firstInput = null;
                var inputs = currentForm.getElementsByTagName('input');
                for (var j = 0; j < inputs.length; j++) {
                    var input = inputs[j];
                    if (input.type != null && (input.type.toLowerCase() == "submit" || input.type.toLowerCase() == "image")) {
                        if (currentForm.firstInput == null) {
                            currentForm.firstInput = input;
                        }
                        input.panel = panel;
                        input.observe("click", AjaxPanel._inputClick);
                    }
                }
                // setTimemout is used because of YUI binding approach, they bind events with setTimeout.
                // To add our events to the end of an event chain, after yui events, we have to use setTimeout, too.
                var currentFormId = (currentForm.getAttribute("id") ? currentForm.getAttribute("id") : currentForm.name);
                window.setTimeout("try { window.ccs_ap_f('" + currentFormId + "'); } catch (e) { }", 0);
            }
            window.setTimeout("try { delete window.ccs_ap_f; } catch (e) { window.ccs_ap_f = null; }", 1000);
        }
        if(panel.onrefresh) {
            panel.onrefresh.apply(panel);
        }
    },

    _inputClick: function(event) {
        var sender = Event.element(event);
        sender.form.lastClick = sender;
    },

    _submitForm: function(form) {
        if (form != null) {
            AjaxPanel._showProgress();
            var submitButton = false;
            if (form.lastClick) {
                submitButton = form.lastClick.name;
            } else if (form.firstInput){
                submitButton = form.firstInput.name;
            }
            var method = "post";
            if (form.hasAttribute('method')) {
              method = form.method;
            }
            var action = form.readAttribute('action') || '';
            if (action.blank()) action = form.panel.location;
            if (method == "get" && action.indexOf("?") != -1) {
                action = action.substring(0, action.indexOf("?"));
            }
            if (form.panel.addFormFilter) action = AjaxPanel._addParam(action, "FormFilter", form.panel.filterId);
            var formInputs = $A($(form).getElementsByTagName('*')).inject([],
                function(elements, child) {
                    if (Form.Element.Serializers[child.tagName.toLowerCase()]) {
                        if (!child.type || (child.type != "image" && child.type != "submit") || submitButton == child.name) {
                            elements.push(Element.extend(child));
                        }
                    }
                    return elements;
                }
            );
            var parameters = Form.serializeElements(formInputs, {submit: submitButton});
            
            new Ajax.Request(action, {
                method: method,
                requestHeaders: ['If-Modified-Since', new Date(0)],
                parameters: parameters,
                onSuccess: function(transport) {
                    form.panel.location = action;
                    AjaxPanel._hideProgress();
                    if (!form.panel.sendCloseEvent)
                        AjaxPanel._update(form.panel, transport.responseText);
                    // BEGIN my change
                    AjaxPanel._reloadRelPanels(form.panel);
                    // END my change
                    // BEGIN code for __onclose event
                    if (form.panel.sendCloseEvent) {
                        if (!AjaxPanel._sendCloseEvent(form.panel.id)) {
                            AjaxPanel._update(form.panel, transport.responseText);
                        }
                    }
                    // BEGIN code for __onclose event
                }
            });
        }
        return false;
    },

    _linkClick: function(event) {
        var sender = Event.element(event);
        while (!sender.panel) sender = sender.parentNode;
        if (sender.href.indexOf("javascript:") == 0)
            return false;
        var getUrl = sender.href;
        if (sender.panel.addFormFilter) getUrl = AjaxPanel._addParam(getUrl, "FormFilter", sender.panel.filterId);
        AjaxPanel._showProgress();
        new Ajax.Request(getUrl, {
            method: "get",
            requestHeaders: ['If-Modified-Since', new Date(0)],
            onSuccess: function(transport) {
                sender.panel.location = getUrl;
                AjaxPanel._hideProgress();
                AjaxPanel._update(sender.panel, transport.responseText);
            }
        });
        return false;
    },

    _update: function(panel, content) {
        AjaxPanel._showProgress();
        this._getPageScripts();
        // IE removes a <script> tag if it goes first, so we should add something before it
        if ((new RegExp("^<script", "m")).test(content)) content = "<span style='display:none;'>&nbsp;</span>" + content;       
        //panel.style.display = "none";
        panel.innerHTML = content;
        var scripts = panel.getElementsByTagName('script');
        for (var i = 0; i < scripts.length; i++) {
            var s = scripts[i];
            var a = s.getAttribute("src") ? s.getAttribute("src") : "";
            var name = this._toPSFormat(a);
            if (a != "" && !this._inPageScripts(name)) {
                var re = /(\/\/)|(^\/)/m;
                if (!re.test(a)) { // relative url
                    a = String(panel.location).substring(0, String(panel.location).lastIndexOf("/") + 1) + a;
                }
                AjaxPanel._showProgress();
                AjaxPanel._addToPageScripts(a);
                new Ajax.Request(a, {
                    method: "get",
                    requestHeaders: ['If-Modified-Since', new Date(0)],
                    onSuccess: function(transport) { 
                        if (window.execScript) window.execScript(transport.responseText);
                        else window.eval(transport.responseText);
                        if (AjaxPanel._scriptsInPageScripts(panel)) AjaxPanel.__update(panel);
                        AjaxPanel._hideProgress();
                    }
                });
            }
        }
        if (this._scriptsInPageScripts(panel)) AjaxPanel.__update(panel);
        AjaxPanel._hideProgress();
    },

    __update: function(panel) {
        var scrs = panel.getElementsByTagName('script');
        // if there is a javascript inside a HTML comment IE will not exec this script
        var re1 = /^\s*<!--/m, re2 = /-->\s*$/m;
        for(var i = 0; i < scrs.length; i++){
            if (!scrs[i].getAttribute("src") || scrs[i].getAttribute("src") == "") {
                var script = scrs[i].innerHTML.replace(re1, "").replace(re2, "");
                if (window.execScript) window.execScript(script);
                else window.eval(script);
            }
        }
        AjaxPanel._bind(panel);
        try {
            window.setTimeout(panel.id + "_bind(window)", 0);
            var servicePageName = String(panel.location).substring(0, String(panel.location).lastIndexOf("?"));
            servicePageName = String(servicePageName).substring(String(servicePageName).lastIndexOf("/") + 1, String(servicePageName).lastIndexOf("."));
            window.setTimeout("try{" + servicePageName + "_bind_events(window)}catch(e){}", 0);
        } catch(e) {};
    },

    _matchPages: function(pageUrl, linkUrl) {
        if (linkUrl == null || linkUrl == "#" || linkUrl == "") { return false; }
        if (AjaxPanel._getScriptPath(pageUrl).toLowerCase() == AjaxPanel._getScriptPath(linkUrl).toLowerCase()) {
            return true;
        }
        return false;
    },

    _getScriptPath: function(fullUrl) {
        // BEGIN my change
        if (!(new RegExp("\\/\\/")).test(fullUrl)) { fullUrl = String(location).substring(0, String(location).lastIndexOf("/") + 1) + fullUrl; }
        // END my change
        var questPos = fullUrl.indexOf("?");
        if (questPos == -1) { return fullUrl };
        return fullUrl.substring(0, questPos);
    },

    __showProgressLinks: 0,

    _showProgress: function() {
        this.__showProgressLinks++;
        if ($("AjaxPanelProgress") != null) {
            return false;
        }
        var progressSpan = document.createElement("div");
        progressSpan.style.position = "absolute";
        progressSpan.style.zIndex = 1000;
        progressSpan.style.top = "3px";
        progressSpan.style.right = "3px";
        progressSpan.id = "AjaxPanelProgress";
        progressSpan.innerHTML = "<div style=\"background-color: #D33333; font-family: Tahoma; font-size: 8pt; padding:1px; color: #FFFFFF;\">&nbsp;Loading...&nbsp;</div>";
        document.body.appendChild(progressSpan);
        addOpacity(true); // to lock the screen while smth is loading
    },

    _hideProgress: function() {
        this.__showProgressLinks--;
        if ($("AjaxPanelProgress") == null) {
            return false;
        }
        if (this.__showProgressLinks == 0) {
            document.body.removeChild($("AjaxPanelProgress"));
            window.setTimeout("removeOpacity()", 100); // unlock the screen when smth's been loaded
        }
    },

    _addParam: function(queryStr, paramName, paramValue) {
        queryStr = decodeURI(queryStr);
        queryStr = queryStr.replace(/\+/g, " ");
        var queryParts = queryStr.split("?");
        var params = new Hash();
        if (queryParts.length > 1) {
            params = new Hash(queryStr.toQueryParams());
        }
        params.set(paramName, paramValue);
        return queryParts[0] + "?" + params.toQueryString();
    },

    _removeParam: function(queryStr, paramName) {
        var queryParts = queryStr.split("?");
        var params = new Hash();
        if (queryParts.length > 1) {
            params = new Hash(queryStr.toQueryParams());
            params.unset(paramName);
        }
        return queryParts[0] + "?" + params.toQueryString();
    },

    _removeEmptyParams: function(loc) {
        var q = loc.indexOf("?");
        var qs = loc;
        if (q != -1) {
            qs = loc.substring(q + 1);
            loc = loc.substring(0, q);
        }
        var p1 = qs.toQueryParams();
        // ccsForm should be removed cause some errors when submitting forms
        for (n in p1) if (n != "ccsForm" && p1[n] != "") loc = AjaxPanel._addParam(loc, n, p1[n]);
        return loc;
    },

    _inRelPanels: function(panel, name) {
        for (var i = 0; i < panel.relPanels.length; i++) {
            if (panel.relPanels[i] == name) return true;
        }
        return false;
    },

    _addToRelPanels: function(panel, name) {
        if (AjaxPanel._inRelPanels(panel, name) || panel.id == name) return;
        panel.relPanels[panel.relPanels.length] = name;
    },

    _reloadRelPanels: function(panel) {
        for (var i = 0; i < panel.relPanels.length; i++) {
            var id = panel.relPanels[i];
            var p = $(id);
            if (p && p.innerHTML != "") AjaxPanel.reload(p);
        }
    }, 

    _pageScripts: [],

    _inPageScripts: function (s) {
        for (var i = 0; i < this._pageScripts.length; i++)
            if (this._pageScripts[i].toLowerCase() == s.toLowerCase()) return true;
        return false;
    },

    _getPageScripts: function () {
        var h = document.getElementsByTagName("head")[0];
        var s = h.getElementsByTagName("script");

        for (var i = 0; i < s.length; i++) {
            var itm = s[i];
            var src = itm.getAttribute("src") ? this._toPSFormat(itm.getAttribute("src")) : "";
            if (src != "" && !this._inPageScripts(src)) {
                this._pageScripts[this._pageScripts.length] = src;
            }
        }
    },

    _addToPageScripts: function (s) {
        if (!this._inPageScripts(s)) {
            this._pageScripts[this._pageScripts.length] = this._toPSFormat(s);
        }
    },

    _toPSFormat: function (src) {
        // http://www.aaa.com/folder/file.js -> file.js
        if (src.indexOf("/") == -1) return src;
        else return String(src).substring(String(src).lastIndexOf("/") + 1);
    },

    _scriptsInPageScripts: function (panel) {
        var scripts = panel.getElementsByTagName('script');
        for (var i = 0; i < scripts.length; i++) {
            var s = scripts[i];
            var src = s.getAttribute("src") ? this._toPSFormat(s.getAttribute("src")) : "";
            if (src != "" && !this._inPageScripts(src)) return false;
        }
        return true;
    },

    _sendCloseEvent: function (id) {
        var ret = false;
        var el = document.getElementById(id);

        while (el) {
            if (typeof el.__onclose != "undefined") {
                el.__onclose(el);
                ret = true;
                break;
            }

            el = el.parentNode;
        }

        return ret;
    }
}
