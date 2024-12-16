<?php

namespace App\GraphQL\Mutations\Book;

use App\Models\Book;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createBook',
        'description' => 'Create a book'
    ];

    public function type(): Type
    {
        return GraphQL::type('Book');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'category_id' => [
                'name' => 'category_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:categories,id']
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:users,id']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $book = new Book();
        $book->fill($args);
        $book->save();

        return $book;
    }
}
