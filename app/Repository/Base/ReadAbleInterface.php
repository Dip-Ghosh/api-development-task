<?php

namespace App\Repository\Base;

interface ReadAbleInterface
{
    public function search($id);

    public function fetchAll();
}
