<?php

Route::middleware(['web'])->resource('crud', 'Cirote\Crud\Controllers\CrudController');
