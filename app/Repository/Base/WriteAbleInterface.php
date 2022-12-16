<?php

namespace App\Repository\Base;

interface WriteAbleInterface
{
    public function save(array $data);

    public function update(array $data, $id);

    public function remove($id);
}
