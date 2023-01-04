<?php

function render_navbar($title)
{
  echo '
  <nav class="p-6 border-b flex items-center justify-between">
    <div class="text-xl font-medium">
      ' . $title . '
    </div>
    <div class="flex items-center gap-5">
      <a href="/" class="font-medium uppercase text-blue-600">Home</a>
    </div>
  </nav>
  ';
}
