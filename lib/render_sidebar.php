<?php

function render_sidebar($href, $links, $title)
{
  if (array_key_exists("QUERY_STRING", $_SERVER)) {
    $href = $href . "?" . $_SERVER["QUERY_STRING"];

    $links = array_map(function ($l) {
      $l["href"] = $l["href"] . "?" . $_SERVER["QUERY_STRING"];
      return $l;
    }, $links);
  }

  $linkClass = "hover:text-purple-500 hover:bg-purple-50";
  $activeLinkClass = "bg-purple-500 text-white";

  echo '
  <aside class="fixed top-0 left-0 bottom-0 w-80 border-r flex flex-col">
    <div class="block text-center text-2xl font-bold p-5 border-b capitalize">
      ' . $title . '
    </div>
    <div class="flex flex-col p-5 gap-1">';

  foreach ($links as $link) {

    $className = $link["href"] == $href ? $activeLinkClass : $linkClass;

    echo '
      <a class="block px-5 py-3 rounded ' . $className . '" href="' . $link["href"] . '">'
      . $link["label"] .
      '</a>
    ';
  }

  echo '
    </div>
  </aside>';
}
