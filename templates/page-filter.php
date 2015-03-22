<?php
global $FilterTaxonomy;

$Terms = get_terms($FilterTaxonomy);

print('<ul>');
print('<li class="filter" data-filter="all">All</li>');

foreach($Terms as $Term) {
?>

    <li class="filter" data-filter=".<?php print($Term->slug); ?>"><?php print($Term->name); ?></li>

<?php
}
?>