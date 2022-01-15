<!DOCTYPE html>
<html>

<title>Sistema</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/w3.css">
<link rel="stylesheet" href="./fonts/font-awesome-4.7.0/css/css.css">
<link rel="stylesheet" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<body class="w3-light-grey">
<!-- Top container -->
	<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
	  <span class="w3-bar-item w3-left"><img src="images/logo2.jpg" class="w3-round" style="width:40%"></span>
	  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
	  <span class="w3-bar-item w3-right">Logo</span>
	</div>


<section id="identifica">
<!-- Identifica usuario e inclui sidebar correspondente
	@yield('identifica')
</section>  


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" 
onclick="w3_close()" 
style="cursor:pointer" 
title="Fechar Menu Lateral" 
id="myOverlay"></div>

<section id="conteudo">
	<!-- CONTEÚDO DA PÁGINA -->
	<div class="w3-main" style="margin-left:300px;margin-top:43px;">

	  <!-- Header -->
	  <header class="w3-container" style="padding-top:22px">
		<h5><b><i class="fa fa-dashboard"></i>My Dashboard</b></h5>
	  </header>
	  
	  @yield('conteudo')
	  
	</div>
</section>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
