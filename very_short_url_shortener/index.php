<?php

//~ Very short url shortener! | Nico KraZhtest | ponyhacks.com | krazhtest|@|ya.ru

ini_set('display_errors', 'Off');
error_reporting(0);

$toshort = $_POST["bigurl"];

$name = $_POST["name"];

$reduce = $_REQUEST["to_short"];

$host = "http://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";

$bookmarklet = 'javascript:void(window.location=&#39;'.$host.'?to_short=&#39+encodeURIComponent(window.location.href));';

echo '<html><h1>';

if (empty ($toshort)) {

	echo'
	<big class="hi">
       <a href="#" title="@!" onclick="rstr()">Hello!</a>
		 <a title="Fourchette moi sur Github" href="https://github.com/webdev23/very_short_url_shortener">🍴 </a>
	         </big>
	            <br>I am very short url shortener<br>

	I need urls to exist
		<br>
			<i>Feed me now</i>
				<br>Or use: 
					<a href="'.$bookmarklet.'" id="bkm" rel="sidebar" title="@">the bookmarklet</a> !
	
	<p>';

    echo'
		<textarea style="display:none" id="bktxt">'.$bookmarklet.'</textarea>
	        <form method="post">
				<input type="input" name="bigurl" autofocus placeholder="//url, or whatever" value="'.$_REQUEST["to_short"].'" id="main" />
					<p>		
						<input type="input" name="name" placeholder="Optional: give a name" value="'.$_REQUEST["name"].'" />
							<p>	
							  <input type="submit" value="@" id="shr" />											
	</form>';
 }

if (!empty ($toshort)) {
	
	$token = bin2hex(openssl_random_pseudo_bytes(2));
	
 }
	
if (!empty ($name)) {
		
	$token = $name;
		
 }

if (!empty ($toshort)) {	

	file_put_contents($token, $toshort . PHP_EOL, FILE_APPEND);

    echo $toshort;

    echo'<h1><br>is now linked to:<br>';

    echo'<a href="?s='.$token.'">?s='.$token.'</a></h1>';

 }

if (!empty ($_GET["s"])) {	

     echo"<br>";

	$sid = $_GET["s"];
	
	$linked = file_get_contents($sid);
	
	if (get_headers($linked) === false) {
		
       header("Location: $sid");
    
        die();

   } 

    if (empty ($linked)) {

     echo"Error 404 gone to party.";

     }

    if (!empty ($linked)) {			

     echo'
	 You are going to be redirected to:<p>   
	          
	        <a href="'.$linked.'" id="lnk">'.$linked.'</a>';
	
     echo'
	<script>
		window.onload = function() {
			setTimeout(function() {
			document.getElementById("lnk").click();
	                         }, 1400)};
			   </script>';
       }	
 }

if (!empty ($_REQUEST["to_short"])) {

      echo'
	  <script>
	         window.onload = function() {
			 setTimeout(function() {
			     if (document.getElementById("shr") != null) { 
                         document.getElementById("shr").click();
		                  }}, 2000)}
		     </script>';
 }

echo '
<script>
function rstr() {
	 navigator.registerProtocolHandler("urn","'.$host.'?to_short=%s","Reduce with @!")};
    if (document.getElementById("main") != null) {                       
	    let check = document.getElementById("main").value;                          
			if (check.includes("urn") === true && check.includes("http") === true) {
			          document.getElementById("main").value=check.replace("urn:", "")
		           } else if (check.includes("urn") === true && check.includes("http") === false) {
	                     document.getElementById("main").value="http://"+document.getElementById("main").value.replace("urn:", "")
	                     }};                             
    </script>';
?>		
 <style>
		body{
			text-align:center;
			font:caption;
			background-color:#f5b041;
			padding:12%;
			max-width:100%;
			transform: scale(1.2,1.2);
		    }
		input{
			font-size:1.1em;
			margin:3px;
			box-shadow: -1px -1px 3px 5px black;
			}
		input,a{
			transition:.4s ease-in .1s
			}	
		a:hover{
			margin:0 7px 0 7px;
			color:teal;
			}
		input:hover{
		    background-color:silver;
			transform: scale(1.3,1.3);
			}
		input[type=submit]{
			cursor:pointer;
			margin:15px;
			padding: 5px;
			border: 5px solid black;
			font-size:2.2em;
			border-radius:8px
			}
		input[type=submit]:hover{
			background-color:teal;
			font-size:2.6em;
		    color:#f5b041;
			margin:15px;
			border-radius:80px
			}							
		.hi{
			font-size:2em
			}
		#m8 {

			top:60%
		    }			
</style>
	
      
      
	
