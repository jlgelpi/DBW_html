#!/usr/bin/perl
#
# Manipulacio general Forms 
#
# Copyright 1996 Josep Ll. Gelpi
#

$progMail = "/usr/lib/sendmail";

"1";

sub parse_formp {
	$ENV{'QUERY_STRING'}=shift;
 	&parse_form("GET");
};

sub parse_form {
 local ($tipus) = @_[0];
# Get the input

if ($tipus eq "POST") {

  read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
}
else {
  $buffer = $ENV{'QUERY_STRING'}
}

# Split the name-value pairs

  @pairs = split(/&/, $buffer);

  foreach $pair (@pairs) {
    ($name, $value) = split(/=/, $pair);

# Un-Webify plus signs and %-encoding

    $value =~ tr/+/ /;
    $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
    $value =~ s/<!--(.|\n)*-->//g;

# Cas de doble " pasat com | per evitar problemes amb <input hidden>

    $value =~ s/\|/\"/g;

# Cas especial Selected Multiple acumula valors en lines succesives

    if (defined $FORM{$name}) {
      $FORM {$name} .= "\n".$value;
    }
    else {
      $FORM{$name} = $value;
    }
  }
}

# Mail

sub mail {
   local ($sub, $adr, $txt,$remite,$html)=@_;
   local ($tmpfile);
   if ($remite eq "") {$remite = "\"SEBBM - Web\" <sebbm\@sun.bq.ub.es>"};
   $tmpfile = "/usr/tmp/mailtmp_$$";
   open (OUTF, ">$tmpfile");
   print OUTF "From: $remite
To: $adr
Subject: $sub
";
if ($html) {
   print OUTF "Content-type: text/html\n\n";
}
else {
   print OUTF "Content-type: text/plain\n\n";
};
   print OUTF &NoAcc($txt);
#   print OUTF $txt;
   close (OUTF);
   $cmd = "$progMail $adr < $tmpfile";
   `$cmd`;
#   unlink ($tmpfile)
};    

sub NoAcc {
   local ($txt) =@_[0];
   $txt =~ s/\&(.)(acute|grave|uml);/$1/g;
   $txt =~ s/&ntilde;/ñ/gi;
   $txt =~ s/&ccedil;/ç/gi;
   $txt;
}
   

sub prlog {
  local ($arx,$txt)=@_;
  open (LOGF, ">>$arx");
  $avui = `date +[%y/%m/%d-%H:%M]`;
  chop $avui;
  print LOGF  "[" . localtime(time) . "] $txt";
  close (LOGF)
}
