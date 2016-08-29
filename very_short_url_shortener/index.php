<?php

//~ Very short url shortener! | Nico KraZhtest | ponyhacks.com | krazhtest|@|ya.ru

ini_set('display_errors', 'Off');
error_reporting(0);

$toshort = $_POST["bigurl"];

$name = $_POST["name"];

$reduce = $_REQUEST["to_short"];

$host = "http://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";

$bookmarklet = 'javascript:void(window.location=&#39;'.$host.'?to_short=&#39+encodeURIComponent(window.location.href));';

echo '<html><meta name="referrer" content="no-referrer"><h1>';

if (empty ($toshort)) {

	echo'
	<big class="hi">
       <a href="#" title="@!" onclick="rstr()">Hello @!</a>
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
			<input type="input" name="bigurl" autofocus placeholder="//url, or whatever"
			        value="'.$_REQUEST["to_short"].'" id="main" />
				  <p>		
					<input type="input" id="inam" name="name" placeholder="Optional: give a name"
					        value="'.$_REQUEST["name"].'" />
						<p>	
						  <input type="submit" value="@" id="shr" 
						     onmouseover="let rdm = (&#39;00000&#39;+(Math.random()*(1<<24)|0).toString(16)).slice(-6);
						                      crdm = &#39;#&#39; + rdm;
						                    this.style.backgroundColor = rdm;
						                      this.style.color = 0xffffff ^ this.style.backgroundColor;
						                        document.getElementById(&#39;inam&#39;).value = rdm;
						                          document.body.style.backgroundColor = crdm" />											
	</form>';
 }

if (!empty ($toshort)) {
	
	$token = substr(md5(rand()), 0, 6);
	
 }
	
if (!empty ($name)) {
		
	$token = $name;
		
 }

if (!empty ($toshort)) {	

	file_put_contents($token, $toshort . PHP_EOL, FILE_APPEND);

    echo $toshort;

    echo'<h1><br>is now linked to:<br>';

    echo'<a rel="noreferrer" crossorigin="anonymous" href="?s='.$token.'">'.$token.'</a></h1>';

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
	          
	        <a rel="noreferrer" crossorigin="anonymous" href="'.$linked.'" id="lnk">'.$linked.'</a>';
	
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
echo '	
 <style>
		body{
			text-align:center;
			font:caption;
			color:#ffA;
			background-color:#f5b041;
			background-color:#'.$token.';
			padding:12%;
			max-width:100%;
			transform: scale(1.2,1.2);
			transition:.44s ease-in .12s;
			text-shadow: 1px 1px #00f;
		    }
          a, a:active, a:visited{
			text-shadow: 1px 1px #00f
		    }		    
		input{
			font-size:1.1em;
			margin:3px;
			box-shadow: -1px -1px black;
			border-radius:5px
			}
		input,a{
			transition:.44s ease-in .12s;
			filter:invert(17%)
			}	
		a:hover{
			margin:0 7px 0 7px;
			color:teal
			}
		input:hover{
		    background-color:silver;
			transform: scale(1.3,1.3)
			}
		input[type=submit]{
			cursor:pointer;
			margin:15px;
			padding: 5px;
			border: 5px solid black;
			font-size:2.2em;
			border-radius:50px;
			text-shadow: 3px 3px #ff0000;
			transition:1s ease-out .19s
			}
		input[type=submit]:hover{
			background-color:teal;
			font-size:2.6em;
		    color:#f5b041;
			margin:15px;
			border-radius:80px;
			transform: rotate(36000deg)			
			}								
		.hi{
			font-size:2em;
			text-shadow: 3px 3px #ff0000
			}
		#m8 {
			top:60%
		    }			
</style>';
	
      
      
	
