/**
 * Created by mahdi on 18/04/2017.
 * http://www.hazaveh.net
 * mahdi@hazaveh.net
 */
$(document).ready(function(){
    $("#editor").height($(document).height() - 100);

});

var phpexec = new Vue({
    el: "#phpexec",
    data: {
        newSnippet: "",
        snippets: {}
    },
    methods: {
        saveSnippet: function() {
            a = this;
            $.post("lib/Snippets.php?action=store", {
                name: a.newSnippet,
                code: editor.getSession().getValue()
            }, function (res) {
               if (res.status == "success") {
                   $("#save-snippet").modal("hide");
                   a.snippets.push({
                       file: res.file,
                       name: a.newSnippet,
                       code: editor.getSession().getValue()
                   });
                   a.newSnippet = '';
               }
            });

        },
        loadSnippet: function(k) {
            if(confirm("You may lose your unsaved work if you load a saved snippet. Are you sure?")) {
                editor.setValue(this.snippets[k].code, 1);
            }
        },
        removeSnippet: function(s, i) {
            var a = this;
            if(confirm("Are you sure about deleting this snippet?")) {
                $.post("lib/Snippets.php?action=destroy", {file: s}, function(res){
                    a.$delete(a.snippets, i);
                });
            }
        }
    },
    mounted: function() {
        var a = this;
        $.get("lib/Snippets.php?action=get", function(data){
            a.snippets = data;
        });
    }
});

var editor = ace.edit("code-editor");
editor.setTheme("ace/theme/tomorrow");
editor.session.setMode({path:"ace/mode/php"});
editor.$blockScrolling = Infinity;
editor.setOptions({
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: true
});
editor.getSession().on("change", function () {
    $("#code").val(editor.getSession().getValue());
});

function parse(){
    $("#output").html(null);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'lib/Parser.php', true);
    xhr.send(editor.getSession().getValue());
    var timer;
    timer = window.setInterval(function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            window.clearTimeout(timer);
            $('#output').append(xhr.responseText);
        }
    }, 1000);
}

$(window).on("beforeunload", function() {
    return "You may lose any unsaved changes.";
});