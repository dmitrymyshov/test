<?php

namespace App\GraphqQL\Resolver;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductCollectionResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(EntityManager $em, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function resolve(Argument $argument)
    {
        return ['products' => $this->productRepository->findAll()];
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'ProductCollection'
        ];
    }
}