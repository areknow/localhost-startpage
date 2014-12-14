<?PHP

// list directory
$dirs = array_filter(glob('*'), 'is_dir');

// sort by last modified
usort($dirs, function($a, $b) {
    return filemtime($a) < filemtime($b);
});

// initialize stack
$stack = array();

// push divs to stack
foreach ($dirs as $dir) {
    $stack[] = "<div class='tile' onclick=\"location.href='$dir'\">".$dir."</div>";
}

// encode and return to JS
echo json_encode($stack);