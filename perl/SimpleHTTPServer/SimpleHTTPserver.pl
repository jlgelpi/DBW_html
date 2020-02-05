#!/usr/bin/perl
use HTTP::Daemon;
use HTTP::Status;

my $d = HTTP::Daemon->new || die;
print "Please contact me at: <URL: ".$d->url." >\n";
while (my $c = $d->accept) {
	while (my $r = $c->get_request) {
	  	if ($r->method eq "GET") {
			print $r->url->path."\n";
			my $path=$r->url->path;
			$path =~ s/^\///;
			if (!$path) {
				$path="index.htm";
			};
			$c->send_file_response($path);
		} else {
      		$c->send_error(RC_FORBIDDEN)
     		}	
	}
   $c->close;
   undef($c);
}
