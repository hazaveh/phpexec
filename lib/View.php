<!-- CODED BY MAHDI HAZAVEH <mahdi@hazaveh.net> -->
<!DOCTYPE html>
<html>
<head>
    <title>phpExec | run php on the fly</title>
<link href="static/bootstrap.min.css" rel="stylesheet">
<link href="static/phpexec.css" rel="stylesheet">
<script src="static/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="static/vue.min.js" type="text/javascript"></script>
<script src="static/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<div id="phpexec">
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Snippets <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li v-for="(v, k) in snippets"><a href="#" v-on:click="loadSnippet(k)">{{v.name}}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" data-toggle="modal" data-target="#save-snippet">Create New</a></li>
                            <li v-if="snippets.length > 0" ><a href="#" data-toggle="modal" data-target="#manage-snippet">Manage Snippets</a></li>
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
    <?php include("features.php"); ?>
</div>
<script src="static/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="static/ace/ext-language_tools.js" type="text/javascript"></script>
<script src="static/phpexec.js" type="text/javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>