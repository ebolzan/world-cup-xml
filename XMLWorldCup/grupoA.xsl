<?xml version="1.0" encoding="ISO-8859-1"?>

<!--
    Document   : grupoA.xsl
    Created on : 27 de Dezembro de 2012, 14:43
    Author     : evandro
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:variable name="var">
        10
    </xsl:variable>
    
    <xsl:template match="/">
        <html>
            <head>
                <title>grupoA.xsl</title>
            </head>
            <body>
                <center>
                <h1>Jogos do grupo A</h1>                
                    <xsl:for-each select="//grupo[@id='a']/jogo">
                                <p>
                                <xsl:value-of select="time[1]/text()" />
                                <xsl:text> </xsl:text>                                                                                                                
                                <xsl:value-of select="time[1]/gols" />                                                                                                                                                   
                                <xsl:text> </xsl:text>
                                x
                                <xsl:text> </xsl:text>
                                <xsl:value-of select="time[2]/gols" />                                                                                   
                                <xsl:text> </xsl:text>
                                <xsl:value-of select="time[2]/text()" />                                                                                                                       
                                </p>
                    </xsl:for-each>
                </center>                        
                
                <!--usado para descobrir numero de gols de cada pais-->
                 <xsl:value-of select="sum(//grupo[@id='a']/jogo/time[contains(.,'Senegal')]/gols) " />
                 
                
                <center>
                    <xsl:for-each select="//grupo[@id='a']/jogo">                                                                                                                                                
                 
                        <xsl:if test="time[contains(.,'Senegal')]/gols &gt; 0">
                           tem
                           <xsl:value-of select="time[contains(.,'Senegal')]/gols"/>
                        </xsl:if>  
                                                           
                    </xsl:for-each>
                    
                    
                </center>
                
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
