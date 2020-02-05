#!/usr/bin/perl
# Master de bioinformatica
#
use DBI;
use Data::Dumper;
use strict;
require "bdconn.pl";
my ($idCode, $chain) = @ARGV;
if (!$idCode) {
	print "fetchProteinInfo.pl PDBCode\n"; 
	exit
}
my $dbh=connectDB();
my $sql = "SELECT * FROM dir_cla_scop WHERE protein='$idCode'";
if ($chain) {
	$sql .= " AND cadena like '$chain%'";
}
$sql.= "ORDER BY cadena";

my $rows = $dbh->selectall_hashref($sql, "ID");

foreach my $r (sort keys(%$rows)) {

	my $sth = $dbh->prepare ("SELECT description from dir_des_scop WHERE id=?");

	foreach my $field ('CLASS','FOLDING','SUPERF','FAMI','DMAIN','SP') {
#
		my $rc=$sth->execute ($rows->{$r}->{$field});
		my ($res)=$sth->fetchrow_array;
#
#		$sth->bind_param(1,$rows->{$r}->{$field});
#		my ($res)=$dbh->selectrow_array($sth);
#
		$rows->{$r}->{$field}=$res;
	}
	
	printRow($rows->{$r});
}

sub printRow {
	my $r = shift;
	print 
"Id:          $r->{ID}
Protein:     $r->{PROTEIN}
Chain:       $r->{CADENA}
Name:        $r->{NAME}
Classif:     $r->{CLASIFICATION}
Class:       $r->{CLASS}
Folding:     $r->{FOLDING}
Superfamily: $r->{SUPERF}
Family:      $r->{FAMI}
Domain:      $r->{DMAIN}
SP:          $r->{SP}

";
}
