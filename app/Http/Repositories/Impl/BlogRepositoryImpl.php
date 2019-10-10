<?php


namespace App\Http\Repositories\Impl;


use App\Blog;
use App\Http\Repositories\BlogRepository;
use App\Http\Repositories\Eloquent\Eloquent;

class BlogRepositoryImpl extends Eloquent implements BlogRepository
{
public function getMode()
{
   $model = Blog::class;
   return $model;
}
}
