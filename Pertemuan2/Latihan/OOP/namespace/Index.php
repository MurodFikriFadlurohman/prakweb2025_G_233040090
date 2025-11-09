<?php

require_once 'App/Init.php';

use App\Service\User as ServiceUser;

use App\Produk\User as ProdukUser;

new ServiceUser();
echo "<br>";
new ProdukUser();