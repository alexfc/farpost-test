<?php

namespace BlogBundle\Tests\Entity;


use BlogBundle\Entity\Post;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testSetCreatedAt()
    {
        $model = new Post();
        $datetime = Carbon::now();
        $model->setCreatedAt($datetime);
        $this->assertEquals((string)$model->getCreatedAt(), (string)$datetime);
    }
}