<?php

function buildDefinitionList(array $definitions): string
{
    $definitions_list = '<dl>';

    foreach ($definitions as $definition) {
        $definitions_list .= "<dt>$definition[0]</dt><dd>$definition[1]</dd>";
    }

    $definitions_list .= '</dl>';

    return htmlspecialchars($definitions_list);
}

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

echo buildDefinitionList($definitions);
//=> '<dl><dt>Блямба</dt><dd>Выпуклость, утолщение на поверхности чего-либо</dd><dt>Бобр</dt><dd>Живтоное из отряда грызунов</dd></dl>';