<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\BlogRepository;
use App\Http\Services\BlogService;

class BlogServiceImpl implements BlogService
{
protected $blogRepository;
public function __construct(BlogRepository $blogRepository)
{
    $this->blogRepository= $blogRepository;
}
public function getAll()
{
    $blog = $this->blogRepository->getAll();
    return $blog;
}
public function destroy($id)
{
    $blog = $this->blogRepository->findById($id);
    $statusCode = 404;
    $message = "User not found";
    if ($blog) {
        $this->blogRepository->destroy($blog);
        $statusCode = 200;
        $message = "Delete success!";
    }

    $data = [
        'statusCode' => $statusCode,
        'message' => $message
    ];
    return $data;
}
public function update($request, $id)
{
    $oldBlog = $this->blogRepository->findById($id);
    if (!$oldBlog){
        $newBlog = null;
        $statusCode = 404;
    } else{
        $newBlog = $this->blogRepository->update($request,$oldBlog);
        $statusCode =200;
    }
    $data = [
        'statusCode' => $statusCode,
        'blog' => $newBlog
    ];
    return $data;
}
public function findById($id)
{
    $blog = $this->blogRepository->findById($id);
    $statusCode = 200;
    if (!$statusCode){
        $statusCode = 404;
    }
    $data = [
        'statusCode' => $statusCode,
        'blog' => $blog
    ];
    return $data;
}
public function create($request)
{
    $blog = $this->blogRepository->create($request);
    $statusCode = 201;
    if (!$blog)
        $statusCode = 500;

    $data = [
        'statusCode' => $statusCode,
        'customers' => $blog
    ];
    return $data;
}

}
