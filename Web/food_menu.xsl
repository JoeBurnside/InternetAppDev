<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="html"
              doctype-system="about:legacy-compat"
              encoding="UTF-8"
              indent="yes" />

  <xsl:template match="/">
  <html>
  <head>
    <title>Joe's Food Palace</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
	<link rel="stylesheet" href="stylespf.css" type="text/css" media="print" />
	<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
  <![endif]-->
  </head>
  <body>
	  <div id="wrapper">
  		<header>
			<div id="logo">
			</div>
			<div id="titlebar">
				<h1>Joe's Food Palace</h1>
			</div>
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="menu.xml">Food &amp; Drink</a></li>
					<li><a href="form.html">Bookings</a></li>
					<li><a href="slideshow.html">Gallery</a></li>
					<li><a href="mobile.html">Mobile App</a></li>
					<li><a href="report.html">Report</a></li>
				</ul>
			</nav>
  		</header>
		<article>
		<h1>Starters</h1>
		<xsl:for-each select="menu/food/starter">
		<xsl:sort select="price"/>
          <DIV STYLE="background-color:#4C0000; color:white; padding:4px">
            <SPAN STYLE="font-weight:bold; color:white"><xsl:value-of select="name"/></SPAN>
            - <xsl:value-of select="price"/>
          </DIV>
          <DIV STYLE="margin-left:20px; margin:1em; font-size:12pt; color:white" >
            <xsl:value-of select="description"/>
          </DIV>
        </xsl:for-each>
		<h1>Main Courses</h1>
		<xsl:for-each select="menu/food/main">
		<xsl:sort select="price"/>
          <DIV STYLE="background-color:#4C0000; color:white; padding:4px">
            <SPAN STYLE="font-weight:bold; color:white"><xsl:value-of select="name"/></SPAN>
            - <xsl:value-of select="price"/>
          </DIV>
          <DIV STYLE="margin-left:20px; margin:1em; font-size:12pt; color:white" >
            <xsl:value-of select="description"/>
          </DIV>
        </xsl:for-each>
		<h1>Desserts</h1>
		<xsl:for-each select="menu/food/dessert">
		<xsl:sort select="price"/>
          <DIV STYLE="background-color:#4C0000; color:white; padding:4px">
            <SPAN STYLE="font-weight:bold; color:white"><xsl:value-of select="name"/></SPAN>
            - <xsl:value-of select="price"/>
          </DIV>
          <DIV STYLE="margin-left:20px; margin:1em; font-size:12pt; color:white" >
            <xsl:value-of select="description"/>
          </DIV>
        </xsl:for-each>
		<h1>Drinks</h1>
		<xsl:for-each select="menu/drink">
		<xsl:sort select="price"/>
          <DIV STYLE="background-color:#4C0000; color:white; padding:4px">
            <SPAN STYLE="font-weight:bold; color:white"><xsl:value-of select="name"/></SPAN>
            - <xsl:value-of select="price"/>
          </DIV>
          <DIV STYLE="margin-left:20px; margin:1em; font-size:12pt; color:white" >
            <xsl:value-of select="description"/>
          </DIV>
        </xsl:for-each>
		</article>
		<div id="sidebar">
		<img src="images/ad.png" alt="DG" width="100%"></img>
		</div>
        <footer>
		<h1>&#169; Joe Burnside 2014</h1>
    	</footer>
	  </div>	
  </body>
</html>
</xsl:template>
</xsl:stylesheet>