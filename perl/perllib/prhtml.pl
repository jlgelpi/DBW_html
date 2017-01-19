#!/usr/local/bin/perl
#
# Rutines impresio HTML UBWeb
#
# Copyright 1996 Josep Ll. Gelpi
#

$CapHTML="Content-type: text/html\n\n";


"1";

sub plana_std {

#Parametres: Titol, Text

local ($outbuf);
$outbuf = &capSEBBMnetint ($_[0]);
$outbuf .= $_[1];
$outbuf .= &endSEBBMnetint(1);
}

sub redirect {
	my ($url)=shift;
	print "Location: $url\n\n";
};


sub CapSEBBM {
local ($titol,$rows,$cols)=@_;
local ($hcols)=2;

local ($outbuf, $titorg);
$titorg=$titol;
$titol =~ s/\&//g;
$titol =~ s/acute\;//g;
$titol =~ s/grave\;//g;
$titol =~ s/uml\;//g;
$titol =~ s/cedil\;//g;
$titol =~ s/tilde\;//g;
if ($rows)  {$rows = "rowspan=$rows"};
if ($cols)  {$hcols = $hcols + $cols; $cols = "colspan=$cols";};
$outbuf = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 3.2//EN\">
<HTML>
<HEAD>
<TITLE>$titol</TITLE>
   <META NAME=Author CONTENT=\"Josep Ll. Gelpi\">
<style type=\"text/css\">
<!--
BODY {font-family: Arial,Helvetica}
TD {font-family: Arial,Helvetica}
TH {font-family: Arial,Helvetica}
-->
</style>
</HEAD>
<BODY  background=/sebbm/icons/paper10g.jpg BGCOLOR=#FFFFcc TEXT=#006666 LINK=#008B8B VLINK=#008B8B >
<table cellpadding=0 cellspacing=0 border=0>

<tr><td colspan=$hcols valign=bottom><img src=/sebbm/sebbmbn.gif width=537 height=112 border=0 alt=\"Portada SEBBM\" usemap=#bn></td></tr>
<tr><td background=/sebbm/sebbmp2.gif width=86 valign=top $rows><img src=/sebbm/sebbmp2.gif width=86></td>
<td $cols><br>
<h3>$titorg</h3><hr>";
};

sub endSEBBM {

"</table>
<HR>
<font size=-1><em>&copy; 1996-98 SEBBM.<br>
Comentarios: <A HREF=\"mailto:webserv\@sun.bq.ub.es\">webserv\@sun.bq.ub.es</A></em></font>
<map name=bn>
<area coords=257,66,310,84 href=/sebbm/index.html alt=Portada>
<area coords=313,66,380,84 href=/sebbm/visit.html alt=Visitantes>
<area coords=381,66,436,84 href=/sebbm/noticias/index.html alt=Noticias>
<area coords=437,66,493,84 href=/sebbm/agenda/menu.cgi?agenda alt=\"Agenda de actividades\">
<area coords=298,85,365,103 href=/sebbm/direct.html alt=\"Directorio de socios\">
<area coords=366,85,411,103 href=mailto:sebbm\@sun.bq.ub.es alt=E-mail>
<area coords=412,85,460,103 href=/sebbm/privt/index.html alt=\"Zona privada de socios\">
</map>

</BODY>
</HTML>";
};

sub capSEBBMnet {
   local ($titol,$textb)=@_;
$txt = "<?include \"basedir.dat\"?>
<DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 3.2//EN\">
<HTML>
<HEAD>
   <TITLE>$titol</TITLE>
   <META NAME=\"Author\" CONTENT=\"Josep Ll. Gelpi\">
   <link rel=stylesheet href=\"/estil.css\">
</HEAD>
<BODY  background=\"\" BGCOLOR=\"#FFFFcc\" TEXT=\"#006666\" LINK=\"#008B8B\" VLINK=\"#008B8B\" >
<form name=search action=search.php method=post>
<table cellpadding=0 cellspacing=0 border=0 width=700>
<tr><td colspan=4><img src=\"/images/sebbmtop.gif\" WIDTH=\"700\" HEIGHT=\"120\" border=\"0\" alt=\"SEBBM\"></td>
<tr>
<td class=fonscol width=350>&nbsp;Búsqueda <select name=index><option>Directorio<option>SEBBM<option>Web</select> 
<input name=query size=15> <a href=\"javascript:document.search.submit ()\" class=blanc>ok</a></td>
<td class=fonscol width=100 align=Center><a href=/contact.php class=blanc>Contacto</a></td>
<td class=fonscol width=100 align=center><a href=/index.php class=blanc>Inicio</a></td>
<td class=fonscol width=100 align=center><a href=/index_an.htm class=blanc>English</a>&nbsp;</td></table></form>
<table cellpadding=5 cellspacing=0 border=0 width=700>
<tr><td align=center colspan=3>$textb</td>";
$txt;
};

sub endSEBBMnet {
"</td>
<tr><td colspan=3><HR>
<font size=-1><em>&copy; 2002 SEBBM. 
Comentarios: <A HREF=\"mailto:webmaster\@sebbm.net\">webmaster\@sebbm.net</A></em></font>
</td>
</table>
</form>
</BODY>
</HTML>";
};

sub capSEBBMnetint {
   local ($titol)=shift;
$txt = " <DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 3.2//EN\">
<HTML>
<HEAD>
   <TITLE>$titol</TITLE>
   <META NAME=\"Author\" CONTENT=\"Josep Ll. Gelpi\">
   <link rel=stylesheet href=\"/estil.css\">
</HEAD>
<BODY  background=\"\" BGCOLOR=\"#FFFFcc\" TEXT=\"#006666\" LINK=\"#008B8B\" VLINK=\"#008B8B\" onload=\"this.focus()\">
<table cellpadding=0 cellspacing=0 border=0 width=700>
<tr><td><img src=\"/images/sebbmtop.gif\" WIDTH=\"700\" HEIGHT=\"120\" border=\"0\" alt=\"SEBBM\"></td></table><br>
<table cellpadding=1 cellspacing=0 border=0 width=700 class=taulafons>
<tr><td><table cellpadding=5 cellspacing=0 border=0 width=100% class=fonsclar>
<tr><td class=titol>$titol</td>
<tr><td valign=top><br>";
$txt;
};

sub endSEBBMnetint {
local($close)=shift;
local($txt) ="</td></table></td></table>\n";
if ($close) {
   $txt .=" <p><a href=\"javascript:history.back()\"><i>[volver]</i></a></p>";
};
$txt .="
<p><font size=-1><em>&copy; 2002 SEBBM. 
Comentarios: <A HREF=\"mailto:webmaster\@sebbm.net\">webmaster\@sebbm.net</A></em></font></p>
</BODY>
</HTML>";
};
"1";
