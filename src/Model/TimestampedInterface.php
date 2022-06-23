<?php

namespace App\Model;

interface TimestampedInterface
{

    public function getCreatedAt(): DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createAt);

    // public function getUpdateAt(): DateTimeInterface;

    // public function setUpdateAt(\DateTimeInterface $updateAt);


}