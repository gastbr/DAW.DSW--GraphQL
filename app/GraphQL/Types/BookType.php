<?php

namespace App\GraphQL\Types;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Book',
        'description' => 'Collection of books',
        'model' => Book::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of book',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the book',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of the book',
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'Category of the book',
            ],
            'user' => [
                'type' => GraphQL::type('User'),
                'description' => 'Author of the book',
            ],
        ];
    }
}
