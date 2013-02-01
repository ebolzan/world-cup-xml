<?xml version="1.0" encoding="ISO-8859-1"?>

<!--
    Document   : jogos.xsl
    Created on : 27 de Dezembro de 2012, 14:33
    Author     : evandro
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>jogos.xsl</title>
            </head>
            <body>
                <xsl:value-of select="//fase[@id='final']/jogo/time[1]" />
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
