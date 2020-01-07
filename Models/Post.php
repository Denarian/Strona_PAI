<?php


class Post {
    private $image;
    private $likes;
    private $dislikes;

    public function __construct(string $image, int $likes, int $dislikes)
    {
        $this->image = $image;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
    }

    public function getImage(): string 
    {
        return $this->image;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function getDislikes(): int
    {
        return $this->dislikes;
    }
}