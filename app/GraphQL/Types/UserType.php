<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Collection of authors',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of user',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the user',
            ],
            'books' => [
                'type' => Type::listOf(GraphQL::type('Book')),
                'description' => 'List of books'
            ]
        ];
    }
}
