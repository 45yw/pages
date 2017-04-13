#!perl
use strict;
use warnings;

use Imager;
use Text::AAlib qw(:all);

my $img = Imager->new(file => 'sample.png');
my ($width, $height) = ($img->getwidth, $img->getheight);

my $aa = Text::AAlib->new(
    width  => $width,
    height => $height,
    mask   => AA_REVERSE_MASK,
);

$aa->put_image(image => $img);
print $aa->render();
