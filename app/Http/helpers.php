<?php
  function sistem($pengaturan = NULL)
  {
     return array_get(app(App\Sistem::class), $pengaturan);
  }
