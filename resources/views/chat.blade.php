<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta name="description" content="Simplechat is based on Laravel PHP framework and BackboneJS.">
		<meta name="keywords" content="HTML, CSS, JS, JavaScript, web development, Laravel PHP framework, BackboneJS">
		<meta name="author" content="Somkiat Laowajeesart">
		<title>Simplechat - BackboneJS</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<!-- Templates -->
        <script type="text/template" id="message-template">
        <h3>Person <%- person %></h3>
        <span><%- created_at %></span>
        <div class="message"><%- message %></div>
        <textarea class="textarea-message"><%- message %></textarea>
        <div class="control">
            <a class="edit">edit</a>
            <a class="remove">remove</a>
        </div>
        </script>
        <script type="text/template" id="chat-template">
        <form id="search-form">
            <div id="chat-block-a" class="col-md-6">
    		    <textarea id="chat-a" placeholder="Person A"></textarea>
    		    <input type="button" id="btn-send-a" class="button" value="SEND" />
		    </div>
		    <div id="chat-block-b" class="col-md-6">
    		    <textarea id="chat-b" placeholder="Person B"></textarea>
    		    <input type="button" id="btn-send-b" class="button" value="SEND" />
		    </div>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		</form>
        </script>
		<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="js/underscore-min.js"></script>
		<script type="text/javascript" src="js/backbone-min.js"></script>
		<script type="text/javascript" src="js/app.simplechat.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
    		//--------------
    	    // Initializers
    	    //-------------- 
    	    app.chatView = new app.ChatView();
		});
		</script>
	</head>
	<body>
	<div id="title">Simplechat - BackboneJS</div>
	<div id="chat-screen"></div>
	<div id="input-bar" class="row"></div>
	</body>
</html>