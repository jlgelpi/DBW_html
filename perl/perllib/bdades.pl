#!/usr/bin/perl
#
# Gravació  i recuperació de dades 
#
# Copyright 1996,1997 Josep Ll. Gelpi 
#

"1";

sub Grava_Form_Arxius {
   local ($fname) = $_[0];
   local ($cmp);
   foreach $cmp (@agravar) {
      if (defined $FORM{$cmp}) {
         open (OUTCMP, ">$fname.$cmp");
         print OUTCMP $FORM{$cmp};
         close (OUTCMP);
      }
   }
}

sub Grava_Form_Camps {
   local ($fname) = $_[0];
   local ($cmp, %DISC);
   open (INCMP, "$fname.dat");
   while (<INCMP>) {
      ($cmp,$val)=split (/#/);
      chop $val;
      $DISC {$cmp} = $val;
   };
   close (INCMP);
   open (OUTCMP, ">$fname.dat")|| die "$!";
   foreach $cmp (@agravar) {
      if (defined $FORM{$cmp}) {
         $FORM{$cmp}=~ s/\&#(...);/pack("c",$1)/ge;
         $DISC{$cmp}= $FORM{$cmp};
      };
   };
   foreach $cmp (keys(%DISC)) {
      print OUTCMP "$cmp#$DISC{$cmp}\n";
   };
   close (OUTCMP);
}

sub Llegir_Form_Arxius {
   local ($fname) = $_[0];
   local ($cmp);
   foreach $cmp (@allegir) {
      if (-e "$fname.$cmp") {
      $FORM {$cmp} = `cat $fname.$cmp`
     };
  }
}
sub Llegir_Form_Camps {
  local ($fname) = $_[0];
  local ($cmp);
  open (INCMP, "$fname.dat");
  while (<INCMP>) {
     ($cmp,$val)=split (/#/);
     chop $val;
     $FORM {$cmp} = $val;
  };
  close (INCMP);
}
                      
sub llegir_def {
local ($proj)=$_[0];
open (DEFIN, $proj.".def");
while (<DEFIN>) {
  ($dades,$cmm) = split(/#/, $_,2);
  if ($dades ne "") {
    if (/TITOL/) {
      $titprojecte = $cmm
    }
    else {
      ($nom,$tip,$cl,$rw) = split (/,/,$dades,4);
      ($tipus{$nom},$col{$nom},$row{$nom},$comm{$nom})=($tip,$cl,$rw,$cmm);
      push (@camps,$nom);
      if ($tipus =~ /^S/) {
         $opts {$nom} = `cat $col{$nom}`
      }
    }
  }
}
close (DEFIN);
};

sub prcmp {
  local ($sz,$cmp,$txtf)=@_;
  local ($outb);
  if ($mod) {
    $outb = "<input type=text size=$sz name=$cmp value=\"$FORM{$cmp}\">$txtf";
  }
  else {
   $outb = $FORM{$cmp}.$txtf;
  }
  $outb;
};

sub prtxtarea {
  local ($co,$rw,$cmp,$txtf,$txt)=@_;
  local ($outb); 
  $txt=$FORM{$cmp};
  $txt =~ s/\n/<br>\n/g;
  if ($mod) {
    $outb = "<textarea  cols=$co rows=$rw name=$cmp wrap=virtual>$FORM{$cmp}</textarea>$txtf";
  }
  else {
   $outb = $txt.$txtf;
  }
  $outb;
};

sub prselect {
  local ($tipus,$opts,$cmp,$txtf)=@_;
  local ($outb,@arxitems,$i,@val,@txt);
  @arxitems = split (/\n/,$opts);
  for ($i=0;$i<=$#arxitems;$i++) {
     (@val[$i],@txt[$i]) = split (/#/,@arxitems[$i])
  };
  if (!$mod) {$outb = $FORM{$cmp}.$txtf}
  else {
     if ($tipus eq "S") {$mul= " multiple "}
     else {$mul = " "};
     if ($#arxitems > 10) {$mul .= " size=10 "};
     $outb = "<select name=$cmp $mul>";
     for ($i=0;$i<=$#arxitems;$i++) {
        $outb .= "<option value=$val[$i]>$txt[$i]\n";
     }
  };
  $outb .="</select>";
  $outb;
}

sub prcamp0 {
  local ($camp,$txtf)=@_;
  if ($tipus{$camp} eq "I") { &prcmp ($col{$camp},$camp,$txtf)}
  elsif ($tipus{$camp} eq "T") {&prtxtarea ($col{$camp},$row{$camp},$camp,$txtf)}
  else {&prselect ($tipus,$opts{$camp},$camp,$txtf)};
};
        
sub ferselect {
   local ($tipus,$opts,$cmp,$txtf)=@_;
   local ($outb,@arxitems,$i,@val,@txt);
   @arxitems = split (/\n/,$opts);
   for ($i=0;$i<=$#arxitems;$i++) {
     (@val[$i],@txt[$i]) = split (/#/,@arxitems[$i])
   };
   if (!$mod) {$outb = $FORM{$cmp}.$txtf}
   else {
     $outb = "<select name=$cmp>";
     for ($i=0;$i<=$#arxitems;$i++) {
       $outb .= "<option value=$val[$i]";
       if ($FORM{$cmp} eq $val[$i]) {$outb .= " selected "};
       $outb .= ">$txt[$i]\n";
     };
     $outb .= "</select>";
   };
   $outb;
}
     
 
