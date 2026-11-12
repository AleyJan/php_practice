<?php
$elements = require __DIR__ . '/data.php';

$categoryLabels = [
    'alkali-metal'     => 'Alkali metal',
    'alkaline-earth'   => 'Alkaline earth metal',
    'transition-metal' => 'Transition metal',
    'post-transition'  => 'Post-transition metal',
    'metalloid'        => 'Metalloid',
    'nonmetal'         => 'Reactive nonmetal',
    'noble-gas'        => 'Noble gas',
    'lanthanide'       => 'Lanthanide',
    'actinide'         => 'Actinide',
    'unknown'          => 'Unknown properties',
];

// element tile + grid position.
function renderCell($e, $col, $row) {
    [$num, $sym, $name, $mass, $cat] = $e;
    $title = htmlspecialchars("$num - $name ($mass)");
    echo "<div class='element {$cat}' style='grid-column:{$col};grid-row:{$row};' title='{$title}'>"
       . "<span class='num'>{$num}</span>"
       . "<span class='sym'>{$sym}</span>"
       . "<span class='mass'>{$mass}</span>"
       . "<span class='name'>" . htmlspecialchars($name) . "</span>"
       . "</div>";
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Periodic Table</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { background:#0f172a; color:#e2e8f0; }
    .table-scroll { overflow-x:auto; padding-bottom:1rem; }
    .ptable {
        display:grid;
        grid-template-columns: repeat(18, minmax(56px, 1fr));
        grid-auto-rows: 64px;
        gap:4px;
        min-width:1040px;
        margin-inline:auto;
    }
    .element {
        border-radius:6px;
        padding:4px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        color:#0f172a;
        cursor:default;
        transition:transform .1s ease, box-shadow .1s ease;
        overflow:hidden;
    }
    .element:hover { transform:scale(1.12); box-shadow:0 0 0 2px #fff; z-index:5; }
    .element .num  { font-size:.6rem; align-self:flex-start; line-height:1; }
    .element .sym  { font-size:1.15rem; font-weight:700; line-height:1.1; }
    .element .mass { font-size:.55rem; line-height:1; }
    .element .name { font-size:.5rem; text-align:center; line-height:1; }
    .series-ref {
        border-radius:6px; display:flex; align-items:center; justify-content:center;
        font-size:.7rem; font-weight:600; background:#334155; color:#e2e8f0;
    }

    
    .alkali-metal     { background:#ff6b6b; }
    .alkaline-earth   { background:#ffa94d; }
    .transition-metal { background:#ffd43b; }
    .post-transition  { background:#74c0fc; }
    .metalloid        { background:#63e6be; }
    .nonmetal         { background:#8ce99a; }
    .noble-gas        { background:#da77f2; }
    .lanthanide       { background:#f783ac; }
    .actinide         { background:#e599f7; }
    .unknown          { background:#ced4da; }

    .legend span.swatch { display:inline-block; width:16px; height:16px; border-radius:3px; margin-right:6px; vertical-align:middle; }
</style>
</head>
<body>
<div class="container-fluid py-4">
    <h1 class="h3 text-center mb-4">Periodic Table of the Elements</h1>

    <div class="table-scroll">
        <div class="ptable">
        <?php
            foreach ($elements as $e) {
                $cat = $e[4];
                if ($cat === 'lanthanide' || $cat === 'actinide') continue; 
                renderCell($e, $e[5], $e[6]); 
            }

            echo "<div class='series-ref' style='grid-column:3;grid-row:6;'>57-71</div>";
            echo "<div class='series-ref' style='grid-column:3;grid-row:7;'>89-103</div>";

            foreach ($elements as $e) {
                if ($e[4] === 'lanthanide') renderCell($e, 3 + ($e[0] - 57), 9);
                if ($e[4] === 'actinide')   renderCell($e, 3 + ($e[0] - 89), 10);
            }
        ?>
        </div>
    </div>

    <div class="legend d-flex flex-wrap gap-3 justify-content-center mt-4">
        <?php
            foreach ($categoryLabels as $key => $label) {
            echo "<div><span class='swatch {$key}'></span>{$label}</div>";
            }
        ?>
    </div>
</div>
</body>
</html>