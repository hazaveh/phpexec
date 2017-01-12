<!-- CODED BY MAHDI HAZAVEH <mahdi@hazaveh.net> -->
<!DOCTYPE html>
<html>
<head>
    <title>phpExec | run php on the fly</title>
<link href="static/bootstrap.min.css" rel="stylesheet">
<script src="static/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="static/bootstrap.min.js" type="text/javascript"></script>
    <style type="text/css" media="screen">
        body {
            background-color: #f3f3f3;
        }
        #code-editor {
            width: 100%;
            height: 100%;
        }

        pre {
            border-radius: 0px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">phpExec</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tools <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#hints">Hints!</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a target="_blank" href="http://labs.hazaveh.net/phpexec">Project Page</a></li>
                        <li><a target="_blank" href="https://github.com/hazaveh/phpexec">Github</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-btn">
                    <form>
                        <textarea hidden id="code" name="content"><?php echo htmlspecialchars($content); ?></textarea>
                        <button onclick="parse();" type="button" href="#" class="btn btn-success">RUN</button>
                    </form>
                    </p>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-6" id="editor">
<pre id="code-editor">
<?php echo htmlspecialchars($content); ?>
</pre>
        </div>
        <div class="col-md-6 col-lg-6">
<pre id="output">
phpExec is awesome!
</pre>
        </div>
    </div>
</div>
<?php include("Hints.php"); ?>
<script src="static/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="static/ace/ext-language_tools.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $("#editor").height($(document).height() - 100);

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

</script>
</body>
</html>
<?php ob_end_flush(); ?>